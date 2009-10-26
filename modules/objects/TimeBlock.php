<?php
require_once('./modules/autoload.php');

class TimeBlock
{
	public $startDate;
	public $endDate;
	public $startDateDisplay;
	public $endDateDisplay;
	
	public $startTimestamp;
	public $endTimestamp;
	
	
	function setByOffset($dayOffset, $startTime, $duration) {
		$this->setTimeFrame($dayOffset, $startTime, $duration);
	}
	// sets the start and end dates based on the number of days away from today and the time specified
	private function setTimeFrame($dayOffset, $startTime, $duration) 
	{	 		
		$year=date('Y');
		$month=date('m');
		$day=date('d');
		
		$tsLength = strlen($startTime);
		
		$startHour = substr($startTime, 0, $tsLength-2);
		$startMinutes =  substr($startTime,$tsLength-2,$tsLength);	
		
		$this->startTimestamp = mktime($startHour,$startMinutes,0,$month,$day+$dayOffset,$year);		
		$this->endTimestamp = mktime($startHour,$startMinutes+$duration,0,$month,$day+$dayOffset,$year);
		
		$this->startDate = date('Y-m-d G:i:s', $this->startTimestamp);	
		$this->endDate = 	date('Y-m-d G:i:s',$this->endTimestamp);	
		
		$this->startDateDisplay = date('g:i a - F d, Y',$this->startTimestamp);	
		$this->endDateDisplay = 	date('g:i a - F d, Y',$this->endTimestamp);	
	 
	}
	function getStartTime($format) {
		return date($format,$this->startTimestamp);
	}
	function getEndTime($format) {
		return date($format,$this->endTimestamp);
	}
	
	// returns the number of resources identified by the passed in resource id that are being used during this time block
	 function checkResourceAvailability($resourceId){
		require_once('./modules/mysql_connect.php');
		
		$q = "select count(apt_id) as used from appointments as a, resources_used as r where a.id=r.apt_id and ('$this->startDate'>=start_time and '$this->startDate'<end_time or '$this->endDate'>start_time and '$this->endDate'<=end_time) and r.description_id='$resourceId';";	
		
		$result = @mysql_query($q);
		
		$usedRooms = @mysql_fetch_assoc($result);		
		
		return $usedRooms['used'];
	 
	 }
	 // gets a list of all available resources during this time block
	 function getAvailableResources($type)
	 {
	 	require_once('./modules/mysql_connect.php');
	 	$resources = new MyCollection();
		
		// check all the resources for this time and find out how many of each are being used
		$q = "select d.id, d.name, d.price, d.total, count(a.id) as used from resource_descriptions as d left join resources_used as u on d.id=u.description_id left join appointments as a on a.id=u.apt_id and ('$this->startDate'>=start_time and '$this->startDate'<end_time or '$this->endDate'>start_time and '$this->endDate'<=end_time) where d.type='$type' group by d.id;";
		
		$result = @mysql_query($q);				
		$i=0;
		while($availableResource = @mysql_fetch_assoc($result)) {
			// if the number being used at this time exceeds the total number of that resource, don't add it	
			if($availableResource['used']<$availableResource['total']) {
				$i++;	
				$usedResource = new UsedResource($availableResource['id'], $availableResource['name'], $availableResource['price'], $availableResource['total'], $availableResource['used']);
				$resources->add($usedResource);
			}
		}
		if($i==0)
			return null;
		else return $resources;
	 }
	
}
?>
<?php
require_once('./modules/autoload.php');
require_once('./modules/mysql_connect.php');

class Appointment extends TimeBlock
{	public $id;
	public $customer;	
	public $service;
	public $helpStatus;
	
	// this function would be better suited to be a constructor if only php allowed function overloading
	function setByOffset($customer, $serviceId, $dayOffset, $startTime, $helpStatus) {
		$this->service = new Service($serviceId);
		$this->customer = $customer;
		$this->helpStatus = $helpStatus;
		parent::setByOffset($dayOffset, $startTime, $this->service->duration);
	}
	// this function would be better suited to be a constructor if only php allowed function overloading
	function setById($appointmentId) {
		require_once('./modules/mysql_connect.php');	
		$q = "select * from appointments where id=$appointmentId;";
		$result = @mysql_query($q);
		
		if(@mysql_num_rows($result)>0) {
			 $appointment = @mysql_fetch_object($result);
			 $this->id = $appointmentId;
			 $this->service = new Service($appointment->service_id);
			 $this->helpStatus = $appointment->help_status;
			 $this->startTimestamp = strtotime($appointment->start_time);
			 $this->endTimestamp = strtotime($appointment->end_time);
		}
			 
	}
	
	function getBids() {
		$bids = new MyCollection();	
		
		$q = "select b.id, u.username, b.amount, b.date from bids as b, users as u where b.mechanic_id = u.id and b.appointment_id = $this->id order by b.date;";
		$result = @mysql_query($q);				
		if(@mysql_num_rows($result)>0) {
			while($bid = @mysql_fetch_object($result)) 
				$bids->add($bid);	
		}
		else return null;
		
		return $bids;
		
	}
	function reserveAppointment(){			
		$customerId =  $this->customer->id;	
		$serviceId = $this->service->id;	

		$q = "INSERT INTO appointments (service_id, customer_id, start_time, end_time, help_status) values('$serviceId', '$customerId', '$this->startDate','$this->endDate','$this->helpStatus');";
		
		$r = @mysql_query($q);	
		
		if($r) {	
			$this->id = mysql_insert_id();
			return true;
		}	
	 	else return false;
	}
	function reserveResource($resourceId){
		$q = "INSERT INTO resources_used values('$this->id', '$resourceId');";
		
		$r = @mysql_query($q);
		
		if($r)
			return true;
	 	else return false;
			
	}
	
	// resources that have already been attached to this appointment
	function getAttachedResources($type) {
		// see if this service requires a special room type
		$q = "select d.id, d.name, d.price, d.total from resource_descriptions as d, resources_used as u where d.id=u.description_id and u.apt_id='$this->id' and d.type='$type';";
		
		$result = @mysql_query($q);
		
		if(@mysql_num_rows($result)>0) {
			$requiredResource = @mysql_fetch_assoc($result);
			return new Resource($requiredResource['id'],$requiredResource['name'], $requiredResource['price'],$requiredResource['total']);
		}
		else return null;
	 		
	}
	
}
?>
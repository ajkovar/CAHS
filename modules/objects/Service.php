<?php
require_once('./modules/autoload.php');
require_once('./modules/mysql_connect.php');
class Service
{
	public $id;
	public $name;
	public $duration;
	public $cost;	
	
	function __construct($serviceId)
	{	 		
		$q = "SELECT id ,name, duration, cost FROM services WHERE id='$serviceId'";
		
		$result = @mysql_query($q);
		
		$serviceRequested = @mysql_fetch_assoc($result);	
		
		$this->id = $serviceRequested['id'];
		$this->name = $serviceRequested['name'];
		$this->duration = $serviceRequested['duration'];
		$this->cost = $serviceRequested['cost'];		
		
	 }
	 // gets any resources this particular service requires
	 function getResourceRequirements($type) {
		// see if this service requires a special room type
		$q = "select d.id, d.name, d.price, d.total from resource_descriptions as d, resource_requirements as r where d.id=r.resource_id and r.service_id='$this->id' and d.type='$type';";
		
		$result = @mysql_query($q);
		
		if(@mysql_num_rows($result)>0) {
			$requiredResource = @mysql_fetch_assoc($result);
			return new Resource($requiredResource['id'], $requiredResource['name'], $requiredResource['price'], $requiredResource['total']);
		}
		else return null;
	 }	
}
?>
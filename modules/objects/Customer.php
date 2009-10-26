<?php
// TODO add ORM framework
require_once('./modules/autoload.php');
require_once('./modules/mysql_connect.php');
class Customer extends User
{	
	public $type="C";
	
	function __construct($id, $username,$firstName, $lastName)
	{
		parent::__construct($id, $username, $firstName, $lastName);
	}	
	// gets all jobs this customer has currently scheduled that haven't expired
	function getCurrentJobs() {
		$jobs = new MyCollection();		
	
		$q = "select a.id, s.name, a.start_time, a.end_time, a.help_status from appointments as a, services as s where a.service_id=s.id and customer_id='$this->id' and a.start_time>=CURDATE() order by a.start_time;";		
		$result = @mysql_query($q);	
		
		$i=0;
		while($job = @mysql_fetch_object($result)) {
			$i++;					
			$jobs->add($job);			
		}
		if($i==0)
			return null;
		else return $jobs;		
	}
	// selects a bid for a job
	function selectBid($bidId) {
		$q = "select appointment_id from bids where id=$bidId;";
		$result = @mysql_query($q);
		$bid = @mysql_fetch_object($result);
		
		// update appointment table
		$q = "update appointments set bid_id=$bidId, help_status='F' where id=$bid->appointment_id;";
		$result = @mysql_query($q);
		
		// update appointment table
		$q = "update bids set bid_status='S' where id='$bidId'";
		$result = @mysql_query($q);			
	}
}
?>

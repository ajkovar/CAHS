<?php
require_once('./modules/autoload.php');
class Mechanic extends User
{	
	public $type="M";
	public $abilities;
	
	function __construct($id, $username, $firstName, $lastName)
	{
		parent::__construct($id, $username, $firstName, $lastName);
		$this->abilities = $this->getServiceAbilities();
	}
	// places a bid on the desired appointment
	function placeBid($appointmentId, $amount) {
		require_once('./modules/mysql_connect.php');	
		$now = date('Y-m-d G:i:s');
		$q = "insert into bids (mechanic_id, appointment_id, amount, date) values ($this->id, $appointmentId, $amount, '" . $now . "');";
		$result = @mysql_query($q);	
		return $result;
	}	
	// gets all services this mechanic is capable of performing
	function getServiceAbilities() {
	
	
	 	$abilities = new MyCollection();
		
		// see if abilities is being stored in the session, if not then get them from the database
		if($this->abilities==null) {
			require_once('./modules/mysql_connect.php');			
			
			$q = "select s.id, s.name from users as u, mechanic_abilities as m, services as s where m.mechanic_id=u.id and m.service_id=s.id and u.id=$this->id";
			
			$result = @mysql_query($q);				
			$i=0;
			while($ability = @mysql_fetch_object($result)) {
				$i++;					
				$abilities->add($ability);			
			}
			if($i==0)
				return null;
			
			else return $abilities;
		} //otherwise just return what is stored in the session
		else return $this->abilities;
		
	}
	// gets all jobs that have been scheduled that this mechanic is capable of performing
	function getAvailableJobs() {
	
		$jobs = new MyCollection();
		$abilities = $this->getServiceAbilities();
		if($abilities!=null) {		
			require_once('./modules/mysql_connect.php');
			
			$q = "select a.id, s.name, a.start_time, a.end_time from appointments as a, services as s where a.service_id=s.id and a.help_status='Y' and a.start_time>CURDATE() and (";
			$i=0;
			//echo $abilities->next->name;		
			foreach ($abilities as $ability) {		
				if($i==0)
					$q .= "a.service_id=$ability->id";
				else $q .= " or a.service_id=$ability->id";
				$i++;
			}
			$q .=") order by a.start_time;";
			
			$result = @mysql_query($q);
			
			$i=0;
			while($job = @mysql_fetch_object($result)) {
				$i++;
				$q="select amount, username from bids as b, users as u where b.mechanic_id=u.id and b.appointment_id=$job->id order by b.amount;";
				$bidResult = @mysql_query($q);	
				$bid = @mysql_fetch_object($bidResult);
				if($bid!=null) {	
					$job->amount=$bid->amount;
					$job->username=$bid->username;
				}
				$jobs->add($job);			
			}
			
			if($i==0)
				return null;
			else return $jobs;
		}
		else return null;
	}
	// gets all bids on current jobs that this mechanic has won
	function getWinningBids() {
		require_once('./modules/mysql_connect.php');	
		$bids = new MyCollection();		
		
		// check all the resources for this time and find out how many of each are being used
		$q = "select s.name, a.start_time, a.end_time, b.amount from bids as b, appointments as a, services as s where b.appointment_id=a.id and a.service_id=s.id and bid_status='S' and a.start_time>CURDATE() and b.mechanic_id=$this->id;";		
		$result = @mysql_query($q);	
		
		$i=0;
		while($bid = @mysql_fetch_object($result)) {
			$i++;					
			$bids->add($bid);			
		}
		if($i==0)
			return null;
		else return $bids;	
	}
	
}
?>
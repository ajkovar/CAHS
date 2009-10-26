<?php
include('./modules/wrappers/header.php');
		require_once('./modules/mysql_connect.php');	
		$mechanics = new MyCollection();		
		$q = "select * from users where user_type='M';";
		$result = @mysql_query($q);
		$i=0;	
		while($mechanic = @mysql_fetch_object($result)) {
			$i++;	
			// select a count of all appointments this mechanic has been accepted for that have already passed
			// (we are assuming he actually showed up to these appointments and hence has gained experience from it)		
			$q = "select count(*) as count from bids as b, appointments as a where b.appointment_id = a.id and b.bid_status='S' and b.mechanic_id=$mechanic->id and a.end_time<NOW();";		
			$expResult = @mysql_query($q);			
			
			while($exp = @mysql_fetch_object($expResult)) {									
				$mechanic->exp = 	$exp->count;	
			}
			$mechanics->add($mechanic);
		}
		if($i==0)
			$mechanics = null;
?>
			<div class="infoBox">
				<h2>Mechanics</h2>
				<p><strong>List of available mechanics for hire:</strong></p>
<?php

		if($mechanics!=null) {	
?>
				<table class="result_table" border="1px"><tr><th>First Name</th><th>Last Name</th><th>Experience Rating</th></tr>
<?php
			
		foreach ($mechanics as $mechanic) {
			echo "<tr><td>" . $mechanic->first_name . "</td><td>" . $mechanic->last_name . "</td><td>" . $mechanic->exp . "</td></tr>";
	
		}
?>
				</table>
<?php
		}
		else echo "<p>There are no mechanics.</p>";
?>
<p id="mednote">Note: Experience is based on the number of services this mechanic has performed.  
The mechanics service must first be performed before they will get gain any experience from it.  No experience will
be rewarded for appointments scheduled in the future.</p>
</div>			
			
<?php
include('./modules/wrappers/footer.html');
?>
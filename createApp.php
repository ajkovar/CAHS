<?php
include('./modules/wrappers/header-customer-required.php');
require_once('./modules/autoload.php');
?>
	<div class="infoBox">
<?php

if(isset($_POST['submitted1'])) {
	
	// note validation SHOULD occur here (user input should never be trusted), but this is outside the scope of this project	
	$serviceId=trim($_POST['service']);
	$dayOffset=trim($_POST['day']);
	$startTime=trim($_POST['time']);
	$help=trim($_POST['helpRequired']);
	
	echo "<h2>Create an appointment - Step 2</h2>";
	
	echo "<p>Please select or confirm any resources you may be needing for this service.</p>";
	
	echo "<form action='createApp.php' method='post'>";
	echo "<input type='hidden' name='submitted2' value='true' />";
	echo "<input type='hidden' name='service' value='$serviceId' />";
	echo "<input type='hidden' name='day' value='$dayOffset' />";
	echo "<input type='hidden' name='time' value='$startTime' />";
	echo "<input type='hidden' name='helpRequired' value='$help' />";
		
	$appointment = new Appointment();
	$appointment->setByOffset($user,$serviceId, $dayOffset, $startTime, $help);
	echo "<p><strong><u>Requested Service Details:</u></strong></p><div class='indented'>";		
	echo "<strong>Service name:</strong> " . $appointment->service->name . "<br /><strong>Price:</strong> $" . $appointment->service->cost . "<br /><strong>Duration:</strong> " . $appointment->service->duration;
	echo " minutes<br /><strong>Start day:</strong> " . $appointment->startDateDisplay . "<br /><strong>End day:</strong> " . $appointment->endDateDisplay ."<br /><strong>Help:</strong> ";
	if($help=="N")
		echo "No help requested<br /><br /></div>";	
	else echo "Help requested<br /><br /></div>";
	
	$requiredSpace = $appointment->service->getResourceRequirements('S');
	
	if($requiredSpace!=null) {	
		
		if($appointment->checkResourceAvailability($requiredSpace->id)>=$requiredSpace->total) {
			echo "<p><strong>We are sorry.  The the service you are requesting requires the following work space:</strong></p>";
			echo "<p class='indented'>" . $requiredSpace->name ."</p><p>This workspace is unavailable during the time frame you requested. </p><p>Please try again.</p>";
		}
		else	{
			echo "A <strong>" . $requiredSpace->name . "</strong> is needed for this service.  This room is a <strong>$" . $requiredSpace->price . "</strong> charge.";
			echo "<input type='hidden' name='roomRequest' value='$requiredSpace->id' /><br /><br /><br /><input type='submit' align='right' value='Reserve appointment' />";
		}
	}
	else {
		// get all available workspaces for this time frame
		$availableResources = $appointment->getAvailableResources('S');
		
		// if workspaces are available, display them
		if($availableResources!=null) {
			echo "<p><strong>The following rooms are available during those hours.  Select which one you'd like*: </strong><br />";
			echo "<select name='roomRequest' style='width:225px;'>";
			foreach ($availableResources as $resource) 				
				echo "<option value='$resource->id'>$resource->name ($$resource->price)</option>";
			echo "</select></p><br /><br /><input type='submit' align='right' value='Reserve appointment' /></form>";			
			echo "<p id='mednote'>*Note: Only the available rooms are displayed here.  If there is a room you would like that you don't see";
			echo " in the drop down list, then please select another time to try again.</p>";
		} // otherwise give appropriate message
		else echo "We are sorry.  There are no spaces available to rent for that time period.  Please select another time and try again.";
	}
}
else if(isset($_POST['submitted2'])) { 
	// note validation SHOULD occur here (user input should never be trusted), but this is outside the scope of this project	
	$serviceId=trim($_POST['service']);
	$dayOffset=trim($_POST['day']);
	$startTime=trim($_POST['time']);
	$help=trim($_POST['helpRequired']);
	$roomRequest=trim($_POST['roomRequest']);		

	echo "<h2>Create an appointment - Complete</h2>";
	
	$appointment = new Appointment();
	
	$appointment->setByOffset($user, $serviceId, $dayOffset, $startTime, $help);
	
	$appointment->reserveAppointment();
	
	$appointment->reserveResource($roomRequest);
	
	$workSpace = $appointment->getAttachedResources('S');
	
	echo "<p>Congratulations! Your appointment has been reserved!</p>";	
	
	echo "<p><strong><u>Appointment Details:</u></strong></p><div class='indented'>";		
	echo "<strong>Service name:</strong> " . $appointment->service->name . "<br /><strong>Service cost:</strong> $" . $appointment->service->cost;
	echo "<br /><strong>Start time:</strong> " . $appointment->startDateDisplay . "<br /><strong>End time:</strong> " . $appointment->endDateDisplay . "<br /><strong>Workspace:</strong> " . $workSpace->name . "<br /><strong>Workspace cost:</strong> $" . $workSpace->price;	
	echo "<br /><strong>Help:</strong> ";
	if($help==null)
		echo "No help requested<br /><br /></div>";	
	else echo "Help requested<br /><br /></div>";
	
	$total =  $appointment->service->cost+$workSpace->price;	
	
	echo "<br /><strong><u>Total Amount Owed:</u></strong> $" .	$total . "<br /><br />";
	
	if($help!=null) {
		echo "<p><strong><u>Please Note:</u></strong><br /> You have requested help for this service.  Mechanics will now be able to place bids on this service.  You can log back in at a later 
		date to select which mechanic you desire to perform this service.  If you do not select a mechanic, one will be chosen for you when you come in.</p> <p>Amount owed must be payed prior to appointment.</p>";
	}	
}
else {
?>
			
				<h2>Create an appointment - Step 1</h2>
				<p>Please select the time you'd like to start as well as the service you'll be performing.
				If you require help from a mechanic for any of these services, place a check in the box to indicate this.</p>
				<form action="createApp.php" method="post">	
				<input type="hidden" name="submitted1" value="true" />
				<table>
					<tr><td> Type of service: </td><td><select name="service">
				
						
<?php
	
	require_once('./modules/mysql_connect.php');

	$q = "SELECT id, name, cost FROM services;";
	
	$r = @mysql_query($q);
	
	while($row = @mysql_fetch_assoc($r))
	{	echo "<option value='" . $row['id'] . "'>" . $row['name'] . " ($" . $row['cost'] . ") </option>";
	}
?>
				</select></td></tr>
				<tr><td>What date do you want?</td><td><select name="day" />
<?php
$today=getdate();
$year=date('Y');
$month=date('m');
$day=date('d');

for($i=1;$i<16;$i++){
	echo "<option value='" . $i . "'>" . date('Y-m-d',mktime(0,0,0,$month,$day+$i,$year)) . "</option>";
}
?>

				</select>
				</td></tr>
				<tr>
					<td>What time would you like to start?</td>
					<td>
						<select name="time">
							<option value='8:00'>8:00</option>
							<option value='8:30'>8:30</option>
							<option value='9:00'>9:00</option>
							<option value='9:00'>9:30</option>
							<option value='10:00'>10:00</option>
							<option value='10:30'>10:30</option>
							<option value='11:00'>11:00</option>
							<option value='11:30'>11:30</option>
							<option value='12:00'>12:00</option>
							<option value='12:30'>12:30</option>
							<option value='13:00'>1:00</option>
							<option value='13:30'>1:30</option>
							<option value='14:00'>2:00</option>
							<option value='14:30'>2:30</option>
							<option value='15:00'>3:00</option>
							<option value='15:30'>3:30</option>
							<option value='16:00'>4:00</option>
							<option value='16:30'>4:30</option>
						</select>
					</td>
				</tr>
				<tr><td>Do you require help*?</td>
				<td>
					<input name="helpRequired" type="radio" value = "Y" checked /> Yes 
					<input name="helpRequired" type="radio" value = "N"/> No
				</td></tr>
				<tr><td style="padding-top:25px;"><input type="submit" value="Continue" /></input></td></tr>
			</table>	
			</form>
			<p id="mednote">*If you select yes, the available mechanics who are 
			capable of performing that service will begin to place bids for who would like to perform your service.
			At a later time, you can log back in and select which mechanic you wish to choose.</p>
<?php
}
?>
</div>
<?php
include('./modules/wrappers/footer.html');
?>
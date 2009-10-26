<?php
include('./modules/wrappers/header-customer-required.php');
?>
			<div class="infoBox">
				<h2>Current Jobs</h2>
<?php
		$jobs = $user->getCurrentJobs();
		if($jobs!=null) {	
?>
				<table class="result_table" border="1px"><tr><th>Service Name</th><th>Start Time</th><th>End Time</th><th>Bids</th><th>&nbsp;</th></tr>
<?php
			
		foreach ($jobs as $job) {
			echo "<tr><td>" . $job->name . "</td><td>" . $job->start_time . "</td><td>" . $job->end_time . "</td><td>";
			if($job->help_status=="Y")			
				echo "<a href='selectBid.php?job=" . $job->id . "'>View Bids</a></td>";
			else if($job->help_status=="F")
				echo "Help has been selected.</td>";
			else echo "No Help Requested</td>";
			if($job->help_status!="F")
				echo "<td><a href='deleteJob.php?job=" . $job->id . "'>Delete</a></td></tr>";
			else echo "<td>&nbsp;</td></tr>";
		}
			
?>
				</table>
<?php
		}
		else echo "<p>You haven't scheduld any jobs yet!</p><p><a href='createApp.php'>Click here to set one up.</a></p>";
?>
			</div>			
<?php
include('./modules/wrappers/footer.html');
?>
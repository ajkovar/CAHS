<?php
include('./modules/wrappers/header-mechanic-required.php');
?>
			<div class="infoBox">
				<h2>Requested Help</h2>
				<p>Here you can view all the jobs that are currently scheduled that are in need of assistance.</p>
				<p>You will only be able to assist with jobs that you are capable of performing.</p>
				<p>Our records show you have the following service abilities:</p>
				<ul>
				<?php
				$abilities = $user->getServiceAbilities();
				if($abilities!=null) {			
					foreach ($abilities as $ability) {
					echo "<li>" . $ability->name . "</li>";
					}
				}
				?>
				</ul>
				<p><strong>The following jobs are open for bidding based on your skill set:</strong> </p>
				<?php
				
				$jobs = $user->getAvailableJobs();
				echo "<table border='1' class='result_table'><tr><th>Job Type</th><th>Start Time</th><th>End Time</th><th>Lowest Bid</th><th>Lowest Bidder</th><th>&nbsp;</th></tr>";
				if($jobs!=null) {			
					foreach ($jobs as $job) {
					echo "<tr><td>" . $job->name . "</td><td>" . $job->start_time . "</td><td>" . $job->end_time . "</td><td>";
					
					if($job->amount!=null)
						echo $job->amount;
					else echo "&nbsp;";
					
					echo "</td><td>";
					
					if($job->username!=null)
						echo $job->username;
					else echo "&nbsp;";					
					
					echo "</td><td><a href='placeBid?job=" . $job->id . "'>Place Bid</a></td></tr>";
					}
				}
				echo "</table>";
				?>
				
				<p id="smallnote">Note: If you think something is wrong with your currently listed set of service abilities, please contact
				one of the site's administrators to have it corrected.</p>			
				
			</div>			
<?php
include('./modules/wrappers/footer.html');
?>
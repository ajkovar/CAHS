<?php
include('./modules/wrappers/header-mechanic-required.php');
?>
			<div class="infoBox">
				<h2>Winning Bids</h2>
				<?php
		$jobs = $user->getWinningBids();
		if($jobs!=null) {	
?>
				<p><strong>Bids You have Won:</strong></p>
				<table class="result_table" border="1px"><tr><th>Service Name</th><th>Amount</th><th>Start Time</th><th>End Time</th></tr>
<?php
			
			foreach ($jobs as $job) {
				echo "<tr><td>" . $job->name . "</td><td>" . $job->amount . "</td><td>" . $job->start_time . "</td><td>" . $job->end_time . "</td>";
			}
			echo "</table>";
		}
		else echo "<p>You haven't won any bids.</p>";
?>
				
			</div>
<?php
include('./modules/wrappers/footer.html');
?>
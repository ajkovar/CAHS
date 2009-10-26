<?php
include('./modules/wrappers/header-customer-required.php');
?>
			<div class="infoBox">
				<h2>Choose a Bid</h2>
				<?php
				if(isset($_GET['bid'])) {
					$bidId=$_GET['bid'];
					$user->selectBid($bidId);
					echo "<p><strong>Bid has been accepted.</strong></p><p>This mechanic will now assist you with your service on the day of your appointment.
							You will be required to pay for the full amount of your services prior to the appointment.</p>";
				}
				else if(isset($_GET['job'])) {
					$appointmentId = $_GET['job'];
					$appointment = new Appointment();
					$appointment->setById($appointmentId)		
					?>
					<p>Here are the bids that have currently been placed on your <strong><?php echo $appointment->getStartTime('g:i a') . " " 
					. $appointment->service->name; ?></strong> on <strong><?php echo $appointment->getStartTime('F d, Y'); ?></strong>.  
					Choose one of these bids to select the mechanic as your service provider.</p>	
					<p><strong>Current Bids</strong></p>
					<?php
					$bids = $appointment->getBids();
					echo "<table border='1' class='result_table'><tr><th>Username</th><th>Bid Amount</th><th>Bid Date</th><th>&nbsp;</th></tr>";
					if($bids!=null) {			
						foreach ($bids as $bid) {
						echo "<tr><td>" . $bid->username . "</td><td>" . $bid->amount . "</td><td>" . $bid->date 
						. "</td><td><a href='selectBid.php?bid=" . $bid->id . "'>Select</a></td></tr>";
						}
					}
					else echo "<tr><td colspan=4 style='padding:20px;'>No bids have been placed on this appointment.</td></tr>";
					echo "</table>";
				}
				else echo "<p>You must select an appointment to view the bids!</p>";
				?>
			</div>			
<?php
include('./modules/wrappers/footer.html');
?>
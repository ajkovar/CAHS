<?php
include('./modules/wrappers/header-mechanic-required.php');
?>
			<div class="infoBox">
				<h2>Place Bid</h2>
			<?php
			if(isset($_POST['submitted'])) {
				$appointmentId=trim($_POST['appointmentId']);
				$amount=trim($_POST['amount']);
				if(is_numeric($amount)&&$amount<=99999&&$amount>0) {
					if($user->placeBid($appointmentId, $amount))
						echo "<p><strong>Your bid has been placed.</strong></p>
						<p>Once the customer accepts this bid, you will be assigned to this job.  Bids can not be retracted once
						they have been placed.  If the customer fails
						to accept a bid, a mechanic will be assigned to them on the day of their appointment.</p>";
					else echo "<p><strong>Your bid failed.</strong></p><p>Please contact one of the site administrators if you think there is a problem.</p>";
								
				}
				else { 
					$error=true;
					$errorMessage = "You must submit a valid number for the amount.";
				}
			}
			if(isset($_GET['job'])||isset($_POST['submitted'])&&$error==true) {
			?>				
				<p>You have selected to place a bid on the following appointment:</p>
					
			<?php
				$appointment = new Appointment();
				$appointment->setById($_GET['job']);
				echo "<table><tr><td><strong>Service Type:</strong></td><td>" . $appointment->service->name . "</td></tr>";
				echo "<tr><td><strong>Start time:</strong></td><td>" . $appointment->getStartTime('g:i a - F d, Y') . "</td></tr>";
				echo "<tr><td><strong>End time:</strong></td><td>" . $appointment->getEndTime('g:i a - F d, Y'). "</td></tr></table>";
				echo "<strong>Bidding History</strong>";
				$bids = $appointment->getBids();
				echo "<table border='1' class='result_table'><tr><th>Username</th><th>Bid Amount</th><th>Bid Date</th></tr>";
				if($bids!=null) {			
					foreach ($bids as $bid) {
					echo "<tr><td>" . $bid->username . "</td><td>" . $bid->amount . "</td><td>" . $bid->date . "</td></tr>";
					}
				}
				else echo "<tr><td colspan=3 style='padding:20px;'>No bids have been placed on this appointment.</td></tr>";
				echo "</table>";
				?>
				<form action='placeBid.php' method='post'>
					<input type="hidden" name="submitted" value="true" />
					<input type="hidden" name="appointmentId" value="<?php echo $_GET['job']?>" />
					<?php
						if($error==true)
							echo "<p style='color:#e22;'><strong>Error:</strong><br />" . $errorMessage . "</p>";
					?>					
					<p><strong>Enter your new bid amount:</strong> </p>					
					<p><strong>Amount:</strong> <input type="text" name="amount" id="amount" size="5" /></p>	
					<p><input type="submit" value="Place bid" /></p>
				</form>		
			<?php
			}
			else if(!isset($_GET['job'])&&!isset($_POST['submitted']))
				echo "No job has been selected!";
			?>
			</div>			
<?php
include('./modules/wrappers/footer.html');
?>
<?php
include('./modules/wrappers/header.php');
?>
			<div class="infoBox">
				<h2>Error</h2>
				<?php
				if(!isset($_GET['type']))
					echo "<p>You must be logged in to do that!</p>";			
				else if($_GET['type']=="M")
					echo "<p>You must be logged in as a mechanic to do that!</p>";
				else if($_GET['type']=="C")
				echo "<p>You must be logged in as a customer to do that!</p>";

				?>				
				<p>Click <a href="register.php">here to register.</a></p>
			</div>			
<?php
include('./modules/wrappers/footer.html');
?>
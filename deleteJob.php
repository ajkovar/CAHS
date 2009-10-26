<?php
include('./modules/wrappers/header-customer-required.php');
require_once('./modules/mysql_connect.php');
require_once('./modules/login_functions.php');
	echo "<div class='infoBox'>";
	$jobId=$_GET['job'];
	
	$q = "delete from appointments where id = $jobId";
	
	$result = @mysql_query($q);
	
	
	if($result)
	{
	$q = "delete from bids where appointment_id = $jobId";
	$result = @mysql_query($q);	
	echo "<p>Your job and all corresponding bids have been deleted.</p>";
	}
	
	
	//else echo "We are sorry.  Please enter a valid job to delete.";
	//	$bid = @mysql_fetch_object($result);


echo "</div>";
include('./modules/wrappers/footer.html');
?>


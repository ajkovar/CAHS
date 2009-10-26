<?php
session_start();
require_once('./modules/objects/Customer.php');
require_once('./modules/objects/Mechanic.php');

$user = unserialize($_SESSION['user']);
if($user==null) {
	require_once('./modules/login_functions.php');
	$url=absolute_url();
	header("Location: $url");
	exit();
}
else {
	$_SESSION = array();
	session_destroy();
	setcookie('PHPSESSID','',time()-3600,'/','',0,0);
}
include('./modules/wrappers/header.php');
?>
<div class="infoBox">		
	<h2>You have been logged out.</h2>
	<p><a href="index.php">Click here to return to the homepage.</a></p>
</div>
<?php
include('./modules/wrappers/footer.html');
?>
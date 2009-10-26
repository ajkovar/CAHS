<?php
session_start();
require_once('./modules/login_functions.php');
require_once('./modules/objects/Customer.php');
require_once('./modules/objects/Mechanic.php');

$user = unserialize($_SESSION['user']);
if($user!=null) {
	
	$url=absolute_url();
	header("Location: $url");
	exit();
}
else {
	// note validation SHOULD occur here, but this is outside the scope of this project	
	$un=trim($_POST['username']);
	$pw=trim($_POST['password']);
	
	require_once('./modules/mysql_connect.php');
	
	// check if this username/password combo is in database
	$q = "SELECT id, user_type, first_name, last_name FROM users where username='$un' and password='$pw';";
	
	$r = @mysql_query($q);
	
	if(@mysql_num_rows($r)>0)	// if row a row is retrieved, then this person is in the database
	{		
		$row = @mysql_fetch_assoc($r);
		
		// save this user to the session so their data can be accessed later (in other words, log them in)
		if($row['user_type']=='C')
  			$_SESSION['user']= serialize(new Customer($row['id'], $un, $row['first_name'],$row['last_name']));	
  		else $_SESSION['user']= serialize(new Mechanic($row['id'], $un, $row['first_name'],$row['last_name']));		
	
		$url=absolute_url();
		header("Location: $url");
		exit();
	}
}
include('./modules/wrappers/header.php');
?>
<div class="infoBox">	
	<h2>Invalid Login.</h2>
	<p>We are sorry, that username/password combination was not found in the database. We'd like
	to tell you more, but we'd rather not reveal any other information about whats in the database.</p>
	
	
</div>
<?php
include('./modules/wrappers/footer.html');
?>
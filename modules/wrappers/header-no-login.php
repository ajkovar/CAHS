<?php
session_start();
require_once('./modules/objects/Customer.php');
require_once('./modules/objects/Mechanic.php');

$user = unserialize($_SESSION['user']);
if($user==null)
	$loggedIn=false;
else $loggedIn=true;

if(!isset($_POST['submitted']))	
	$formSubmitted=false;
else $loggedIn=true;
?>
<!DOCTYPE.php PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/.php1/DTD/.php1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text.php; charset=utf-8" />
<title>Chicago Auto Hobby Shop</title>
<link href="styles/default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">	
<?php
if($loggedIn==false&&$formSubmitted==false) {
?>
	<div id="loginBox" >
		<form action="login.php" method="post" name="login">	
			<div class="login">
				Username: <br />
				<input type="text" size="10" />
			</div>
			<div class="login">
				Password: <br />
				<input type="password" size="10" /> 
			</div>
			<input id="loginButton" type="button" value="Login" onclick="document.login.submit();" />
		</form>
		<div style="clear:both;"></div>		
		<div id="register">Not a user? Register <a href="register.php">here</a>.</div>

	</div>
<?php
}
?>
	<div id="header">
		<h1><a href="index.php">chicago auto hobby shop </a></h1>
		<h2>do it yourself!</h2>
	</div>
	
	<div style="clear: both;"></div>
	<div id="content">
		<div id="colOne">	
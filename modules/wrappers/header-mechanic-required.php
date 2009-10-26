<?php
session_start();
require_once('./modules/objects/Customer.php');
require_once('./modules/objects/Mechanic.php');

$user = unserialize($_SESSION['user']);
if($user==null||$user->type!="M") {
	require_once('./modules/login_functions.php');
	$url=absolute_url("noLogin.php?type=M");
	header("Location: $url");
	exit();
}
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
echo "<div id='loggedInBox'>" . date('F j, Y') . "<br />";
	echo "Logged in as <strong>" . $user->username . "</strong>";
	echo "<br /><strong><a style='color:#999;' href='logout.php'>Logout</a></strong></div>";
?>
	<div id="header">
		<h1><a href="index.php">chicago auto hobby shop </a></h1>
		<h2>do it yourself!</h2>
	</div>
	
	<div style="clear: both;"></div>
	<div id="content">
		<div id="colOne">
		
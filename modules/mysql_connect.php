<?php  # mysql_connect.php

// Define constants for connection
define ('DB_USER', 'fsem08g1');              // replace xxxx with your mysql username    
define ('DB_PASSWORD', '1qaz2wsx');  // replace yyyy with your mysql password
define ('DB_HOST', 'localhost');
define ('DB_NAME', 'fsem08g1');            // replace zzzzzz with your database name

// Connect to DB and select main DB
$dbc = @mysql_connect( DB_HOST, DB_USER, DB_PASSWORD) or
    die('Could not connect to  MySQL: '. mysql_error());
   // echo 'Could not connect to  MySQL: '. mysql_error();

@mysql_select_db(DB_NAME) or
die('Could not select the database: '. mysql_error());
//echo 'Could not select the database: '. mysql_error();

?>

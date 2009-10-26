<?php
function absolute_url($page='index.php') {
	$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	//$url = rtrim($url, '/\\');
	$url.="/" . $page;
	return $url;
}
?>
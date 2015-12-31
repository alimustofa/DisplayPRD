<?php
	$request = explode("/", $_SERVER['REQUEST_URI']);
	define("BASEURL", "http://".$_SERVER['SERVER_NAME']."/".$request[1]."/");
	// define("BASEURL", "http://".$_SERVER['SERVER_NAME']."/");
?>
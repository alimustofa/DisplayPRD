<?php
	$kon = mysqli_connect("localhost","root","","db_display") or die("Koneksi Gagal");
	
	ini_set('memory_limit', '-1');
	ini_set('max_execution_time', -1);
	date_default_timezone_set("Asia/Bangkok");
?>
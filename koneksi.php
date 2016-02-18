<?php

	$host = "localhost";
	$username = "root";
	$password = "kus@261291";
	$database = "absen";
	
	$koneksi = mysql_connect($host,$username,$password);
	$pilihdb = mysql_select_db($database,$koneksi);
	

?>

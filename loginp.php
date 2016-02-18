<?php
session_start();
include "koneksi.php";
$username = $_POST['user'];
$password = $_POST['password'];
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

if (empty($user) && empty($password)){ 
	header('location:login.php?error=1');
	break;
}
else {
	$perintah = "select count(*) as hasil from user where username=BINARY('$username') and password=BINARY('$password');";
	$qry_perintah = mysql_query($perintah);
	$result = mysql_fetch_array($qry_perintah);
	
	if ($result['hasil'] == 0) {
		header('location:login.php?error=2');
	}
	elseif ($result['hasil'] == 1) {
		$_SESSION['username'] = $username;
		header('location:menu.php');		
	}
}

?>
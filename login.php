<?php
	include "koneksi.php";
?>

<html>
<head>
<title>SYSTEM ABSEN WEBSERVER</title>
<link rel="shortcut icon" href="image/absen.jpg" />
<script language="JavaScript" type="text/javascript" src="myJS.js">
</script>
<link rel="stylesheet" type="text/csss" href="mycss.css" />
<style type="text/css">
@import url(mycss.css);
</style>

</head>

<body onLoad="javascript:document.login.user.focus();">
<div id="content">
	<div id="header">
		<p align="center">SYSTEM ABSEN WEBSERVER</p>
	</div>
	<br/>
	<div id="menu">
		<ul id="nav">
			<li><a href="absen.php">[ A B S E N ]</a></li>
			<li><a href="about.php">[ A B O U T ]</a></li>	
		</ul>
	</div>
	<br/>
	<div id="main">
		<center>
		<div id="login">
			<font class="big">L O G I N</font>
			<hr/><br/>
			  <form name="login" action="loginp.php" method="POST">
			<div id="fotlog">
				<image name="logpic" src="image/login.png" width="200px" height="200px" onClick="submit()" />
			</div>
			<div id="f_log">
				<table cellpadding=0px cellspacing=10px>
					<tr>
						<td><font color="white">USERNAME</font></td>
						<td><input name="user" type="text" class="box" autocomplete="off" /></td>
					</tr>
						<td><font color="white">PASSWORD</font></td>
						<td><input name="password" type="password" class="box"/><input type="submit" id="s_hid"></td>
					<tr>
					</tr>
				</table>
				<hr/>
			  </form>
				<div id="msg_log">
				</div>
			</div>
		</div>
		</center>

	</div>
	<br/>
	<div id="footer">
	<p align="center">&copy Copyright is protected by Kusnadi @ ilmu-kompie.blogspot.com</p>
	</div>

</div>
<script language="JavaScript">

var kalimat = "SILAHKAN ANDA MASUKAN USERNAME DAN PASSWORD";

<?php
	$error = $_GET['error'];
	$success = $_GET['success'];
	
	if($error == 1){ $psn = "USERNAME ATAU PASSWORD MASIH KOSONG, SILAHKAN ANDA PERIKSA TERLEBIH DAHULU";}
	elseif($error == 2) { $psn = "USERNAME DAN PASSWORD YANG ANDA MASUKAN SALAH, SILAHKAN COBA LAGI"; }

	echo "kalimat = '".$psn."';";
?>

var pisah = kalimat.split("");
 
 var looptimer;
 
 function ketik(){
	if(pisah.length > 0) 
	{
		document.getElementById("msg_log").innerHTML += pisah.shift();
	}
	else
	{
		clearTimeout(looptimer);
	}
	looptimer = setTimeout('ketik()',50)
 }
  ketik();
 
</script>
<div id="dummy">
</div>
</body>
</html>
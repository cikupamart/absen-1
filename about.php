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

<body>
<div id="content">
	<div id="header">
		<p align="center">SYSTEM ABSEN WEBSERVER</p>
	</div>
	<br/>
	<div id="menu">
		<ul id="nav">
			<li><a href="absen.php">[ A B S E N ]</a></li>
			<li><a href="menu.php">[ M E N U ]</a></li>
			<li><a href="about.php">[ A B O U T ]</a></li>	
		</ul>
	</div>
	<br/>
	<div id="main">
		<center>
		<div id="abouth">
			<font class="big">A B O U T</font>
			<hr/><br/>
			<div id="about">
				<marquee behaviour="scroll" direction="up" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 4, 3);">
				<center>
				<h2>SYSTEM ABSEN WEBSERVER V.1.0</h2><br/>
				Designed & Developed By : <br/>
				<img src="foto/develop.jpg" height=200px width=150px/>
				<h1>KUSNADI</h1>
				kus.UnderDos@gmail.com / 08988509446
				</center>
				</marquee>			
			</div>
		</div>
	</div>
	<br/>
	<div id="footer">
	<p align="center">&copy Copyright is protected by Kusnadi @ ilmu-kompie.blogspot.com</p>
	</div>
</div>
</body>
</html>
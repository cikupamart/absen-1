<?php
	include "koneksi.php";
	include "ceklog.php";
?>
<html>
<head>
<title>SYSTEM ABSEN WEBSERVER</title>
<link rel="shortcut icon" href="image/absen.jpg" />
<link href="CalenderControl.css" rel="stylesheet" type="text/css">
<script src="CalenderControl.js"language="javascript"></script>
<script language="JavaScript" type="text/javascript" src="myJS.js">
</script>
<link rel="stylesheet" type="text/csss" href="mycss.css" />
<style type="text/css">
@import url(mycss.css);
</style>

</head>

<body onLoad="ketik()">

<div id="content">
	<div id="header">
		<p align="center">SYSTEM ABSEN WEBSERVER</p>
	</div>
	<br/>
	<div id="menu">
		<ul id="nav">
			<li><a href="absen.php">[ A B S E N ]</a></li>
			<li><a href="logout.php">[ L O G O U T ]</a></li>
			<li><a href="about.php">[ A B O U T ]</a></li>
		</ul>
	</div>
	<br/>
	<div id="main">
		<center>
		<div id="menu_adm">
		<font class="big">A D M I N I S T R A T O R</font><hr/>
			<table id="menu_adm1" cellpadding=0px cellspacing=3px>
				<tr>
					<td align="center"><a href="entry.php"><image src="image/add.png" height="125px" width="150px" onMouseOver="javascript:this.src='image/add_press.png';" onMouseOut="javascript:this.src='image/add.png';"></a></td>
					<td align="center"><a href="kon_abs.php"><image src="image/kon_abs.png" height="125px" width="150px" onMouseOver="javascript:this.src='image/kon_abs_press.png';" onMouseOut="javascript:this.src='image/kon_abs.png';"></a></td>
					<td align="center"><a href="list_peg.php"><image src="image/lihat_data.png" height="125px" width="150px" onMouseOver="javascript:this.src='image/lihat_data_press.png';" onMouseOut="javascript:this.src='image/lihat_data.png';"></a></td>
					<td align="center"><a href="list_peg.php"><image src="image/cari.png" height="125px" width="150px" onMouseOver="javascript:this.src='image/cari_press.png';" onMouseOut="javascript:this.src='image/cari.png';"></a></td>
				</tr>
				<tr class="label">
					<td align="center">ADD/EDIT DATA</td>
					<td align="center">ABSEN CONTROL</td>
					<td align="center">RECORD EMPLOYES</td>
					<td align="center">SEARCH</td>
				</tr>
				<tr>
					<td align="center"><a href="lap_har.php"><image src="image/laphar.png" height="125px" width="150px" onMouseOver="javascript:this.src='image/laphar_press.png';" onMouseOut="javascript:this.src='image/laphar.png';"></a></td>
					<td align="center"><a href="lap_bul.php"><image src="image/rekap.png" height="125px" width="150px" onMouseOver="javascript:this.src='image/rekap_press.png';" onMouseOut="javascript:this.src='image/rekap.png';"></a></td>
					<td align="center"><a href="list_peg.php"><image src="image/add_admin.png" height="125px" width="150px" onMouseOver="javascript:this.src='image/add_admin_press.png';" onMouseOut="javascript:this.src='image/add_admin.png';"></a></td>
					<td align="center"><a href="list_peg.php"><image src="image/setting.png" height="125px" width="150px" onMouseOver="javascript:this.src='image/setting_press.png';" onMouseOut="javascript:this.src='image/setting.png';"></a></td>
				</tr>
				<tr class="label">
					<td align="center">DAILY REPORT</td>
					<td align="center">SUMMARY REPORT</td>
					<td align="center">ADD ADMIN</td>
					<td align="center">SETTING</td>
				</tr>				
			</table>
		</div>
		</center>
	</div>
	<br/>
	<div id="footer">
	<p align="center">&copy Copyright is protected by Kusnadi @ ilmu-kompie.blogspot.com</p>
	</div>

</div>

<script language="JavaScript">

 var pisah = kalimat.split("");
 
 var looptimer;
 
 function ketik(){
	if(pisah.length > 0) 
	{
		document.getElementById("msg2").innerHTML += pisah.shift();
	}
	else
	{
		clearTimeout(looptimer);
	}
	looptimer = setTimeout('ketik()',50)
 }
 
 ketik();
</script>

</body>


</html>
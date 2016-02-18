<?php
	$thn1 = $_GET['thn1'];
	$bln1 = $_GET['bln1'];
	$tgl1 = $_GET['tgl1'];
	$thn2 = $_GET['thn2'];
	$bln2 = $_GET['bln2'];
	$tgl2 = $_GET['tgl2'];
	if($_GET['cetak_x']>0){header('location:lap_bul_p.php?tgl1='.$tgl1.'&bln1='.$bln1.'&thn1='.$thn1.'&tgl2='.$tgl2.'&bln2='.$bln2.'&thn2='.$thn2);}
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
		<div id="main1h">
			<div id="main11h">
			<form name="laphar" action="lap_bul.php" method="GET">
				PILIH TANGGAL <br/><br/>
				MULAI DARI : </br>
				<select name="tgl1">
					<option value="<?php echo $tgl1; ?>"><?php echo $tgl1; ?></option>
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>
				/
				<select name="bln1">
					<option value="<?php echo $bln1; ?>"><?php echo $bln1; ?></option>
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
				</select>
				/
				<input name="thn1" type="text" size=10  value="2013"/>
				<br/><br/>
				SAMPAI DENGAN :</br>
				<select name="tgl2">
					<option value="<?php echo $tgl2; ?>"><?php echo $tgl2; ?></option>
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>
				/
				<select name="bln2">
					<option value="<?php echo $bln2; ?>"><?php echo $bln2; ?></option>
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
				</select>
				/
				<input name="thn2" type="text" size=10  value="2013"/>
				<h6/><br/>
				<input type="submit" value="GO"/>
			</div>
			<div id="main22h">
				<input type="image" width="90px" name="cetak" height="60px" src="image/print.png" onClick="cetak()"/>
			</div>
			</form>
		</div>
		<div id="main2h">
			<div id="jdl_tblh">
			<p align="center">REKAPITULASI ABSEN</p>
			</div>
			
			<div id="tblh">
			<table id="tbl_absenh">
				<tr color="white">
					<th width=5%>NO</th>
					<th width=15%>NIP</th>
					<th width=25%>NAMA</th>
					<th width=20%>BAGIAN</th>
					<th width=12%>MASUK</th>
					<th width=12%>IZIN</th>
					<th width=12%>SAKIT</th>
					<th width=12%>JUMLAH</th>
				</tr>
				<?php
					$ambildb2 = "select tbl_pegawai.id, tbl_pegawai.nama, tbl_pegawai.bagian, sum(if(tbl_absen.ket='m',1,0)) as masuk, sum(if(tbl_absen.ket='i',1,0)) as izin, sum(if(tbl_absen.ket='s',1,0)) as sakit, count(*) as jumlah from tbl_absen inner join tbl_pegawai on tbl_pegawai.id = tbl_absen.id and tbl_absen.tgl between '".$thn1."-".$bln1."-".$tgl1."' and '".$thn2."-".$bln2."-".$tgl2."' group by id order by bagian;";
					$qr_ambildb2 = mysql_query($ambildb2);
					for($i=1;$hasil2 = mysql_fetch_array($qr_ambildb2);$i++){
						echo "<tr class='isi'>";
						echo "<td align='center'>".$i."</td>";
						echo "<td align='center'>".$hasil2['id']."</td>";
						echo "<td align='left'>".$hasil2['nama']."</td>";
						echo "<td align='left'>".$hasil2['bagian']."</td>";
						echo "<td align='center'>".$hasil2['masuk']."</td>";
						echo "<td align='center'>".$hasil2['izin']."</td>";
						echo "<td align='center'>".$hasil2['sakit']."</td>";
						echo "<td align='center'>".$hasil2['jumlah']."</td>";
						echo "</tr>";
					}
				?>
			</table>
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
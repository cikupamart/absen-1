<?php
	$datac = $_GET['h_val'];
	if($_GET['cetak_x']>0){header('location:list_peg_p.php?h_val='.$datac);}
	include "koneksi.php";
	include "ceklog.php";
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

		<div id="listpeg">
			<font class="big">BIODATA KARYAWAN</font><hr/>
			
			<table id="t_bio" >
				<tr>
					<th width="3%">NO</th>
					<th width="12%">NIP</th>
					<th width="20%">NAMA</th>
					<th width="8%">TEMPAT LAHIR</th>
					<th width="10%">TANGGAL LAHIR</th>
					<th width="10%">BAGIAN</th>
					<th width="27%">ALAMAT</th>
					<th width="10%">TELP</th>
				</tr>				
			</table>
			<div id="isi_tab">
			<table id="t_bio" >
				<?php
				$data = $_GET['h_val'];
				if ($data < 1){$data = 0;}
				$ambildb = "select * from tbl_pegawai limit ".$data.",40;";
				$qr_ambildb = mysql_query($ambildb);
				for ($i=1; $hasil = mysql_fetch_array($qr_ambildb); $i++){
				echo "<tr class='isi'>";
				echo "<td width='3%' align='center'>".($i+$data)."</td>";
				echo "<td width='12%' align='center'>".$hasil['id']."</td>";
				echo "<td width='20%'>".$hasil['nama']."</td>";
				echo "<td width='8%'>".$hasil['tpt_lahir']."</td>";
				echo "<td width='10%' align='center'>".$hasil['tgl_lahir']."</td>";
				echo "<td width='10%'>".$hasil['bagian']."</td>";
				echo "<td width='27%'>".$hasil['alamat']."</td>";
				echo "<td width='10%' align='center'>".$hasil['telp']."</td>";
				echo "</tr>";
				}
				?>
			</table>
			</div>
			<div>
			<form name="page" action="list_peg.php" method="get">
			<script language="JavaScript">
			function next(){
				<?php
				$ctr = $_GET['h_val'];
				if ($ctr<1){$ctr=0;}
				echo "ctr_awal = ".$ctr.";";
				?>
				if(ctr_awal == 0) { ctr_awal+=40;}
				else {ctr_awal+=40; }
				document.getElementById('h_val').value=ctr_awal;
			}
			function back(){
				<?php
				$ctr = $_GET['h_val'];
				if ($ctr<1){$ctr=0;}
				echo "ctr_awal = ".$ctr.";";
				?>
				if(ctr_awal == 0) { ctr_awal-=40;}
				else {ctr_awal-=40; }
				document.getElementById('h_val').value=ctr_awal;
			}
			function cetak(){
				<?php
				$ctr = $_GET['h_val'];
				if ($ctr<1){$ctr=0;}
				echo "ctr_awal = ".$ctr.";";
				?>
				document.getElementById('h_val').value=ctr_awal;
			}
			</script>
				<pre><input type="image" height="60px" width="70px" src="image/back.png" onClick="back()"/><input type="image" height="60px" width="70px" src="image/next.png" onClick="next()" />                                                                                                     <input type="image" width="90px" name="cetak" height="60px" src="image/print.png" onClick="cetak()"/></pre>
				<input type="hidden" id="h_val" name="h_val" />
			</form>
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
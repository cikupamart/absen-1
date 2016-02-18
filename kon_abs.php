<?php
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
 <script type="text/javascript" language="JavaScript">
	var namahari = new Array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
	var namabulan = new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	waktuku = new Date;
	hari = waktuku.getDay();
	tgl = waktuku.getDate();
	bln = waktuku.getMonth();
	function fresh(){
		waktu = new Date();
		var id = new Array;
		var nama = new Array;
		var bagian = new Array;
		var foto = new Array;
		var id_abs = new Array;
		<?php
			$ambildb = "select * from tbl_pegawai";
			$qr_ambildb = mysql_query($ambildb);
			while($hasil = mysql_fetch_array($qr_ambildb)){
				echo "id['".$hasil['id']."']"."= '".$hasil['id']."';";				
				echo "nama['".$hasil['id']."']"."= '".$hasil['nama']."';";
				echo "bagian['".$hasil['id']."']"."= '".$hasil['bagian']."';";
				echo "foto['".$hasil['id']."']"."= '".$hasil['foto']."';";
			}
			
			$ambildb1 = "select * from tbl_absen where tgl=curdate()";
			$qr_ambildb1 = mysql_query($ambildb1);
			while($hasil1 = mysql_fetch_array($qr_ambildb1)){
				echo "id_abs['".$hasil1['id']."']"."= '".$hasil1['id']."';";
			}
		?>
		noid = document.getElementById('noid').value;
		document.getElementById('nama').value = nama[noid];
		document.getElementById('fotpeg').src = "foto/"+foto[noid];
		setTimeout('fresh()',1000);
	}
	
 </script>
</head>

<body onLoad="fresh()"; >
<div id="content">
	<div id="header">
		<p align="center">SYSTEM ABSEN WEBSERVER</p>
	</div>
	<br/>
	<div id="menu">
		<ul id="nav">
			<li><a href="absen.php">[ A B S E N ]</a></li>
			<li><a href="menu.php">[ B A C K ]</a></li>		
			<li><a href="logout.php">[ L O G O U T ]</a></li>
			<li><a href="about.php">[ A B O U T ]</a></li>
		</ul>
	
	</div>
	<br/>
	<div id="main">
		<div id="main1">
			<div id="foto">
				<image src="foto/no_foto.png" id="fotpeg" name="fotpeg" width=200px height=300px />
			</div>
			<form name="finput" id="finput" method="POST" action="proses3.php" >
			<div id="input">
				ID : <br/>
				<input type="text" name="noid" id="noid" class="box1"><br/>
				NAMA : <br/>
				<input type="text" id="nama" name="nama" class="box1" /></br>
				KETERANGAN: <br/>
				<select id="ket" name="ket" class="box1">
					<option value="i">IZIN
					<option value="s">SAKIT
					<option value="m">MASUK
				</select></br>
				KOMENTAR: <br/>
				<textarea name="komen" id="komen" ></textarea></br>
				<h4/>
			</div>

			<div id="main22">
				<input type="image" name="save" src="image/save.png" height=60px width=60px onMouseOver="javascript:this.src='image/save_1.png';" onMouseOut="javascript:this.src='image/save.png';" />
				<input type="image" name="delete" src="image/delete.png" height=60px width=60px onMouseOver="javascript:this.src='image/delete_1.png';" onMouseOut="javascript:this.src='image/delete.png';"  />
				<input type="image" name="update" src="image/update.png" height=60px width=60px onMouseOver="javascript:this.src='image/update_1.png';" onMouseOut="javascript:this.src='image/update.png';"  />
				<image name="reset" src="image/reset.png" height=60px width=60px onMouseOver="javascript:this.src='image/reset_1.png';" onMouseOut="javascript:this.src='image/reset.png';" onClick="kosong()"/>
				<div id="msg2"></div>
			</div>
			</form>
		</div>
		<div id="main2">
			<div id="jdl_tbl">
			<p align="center">DAFTAR PEGAWAI YANG HADIR</p>
			</div>
			<br/>
			<div id="tbl">
			<table id="tbl_absen">
				<tr color="white">
					<th width=10%>NO</th>
					<th width=40%>NAMA</th>
					<th width=20%>Jam Masuk</th>
					<th width=20%>Jam Pulang</th>
					<th width=10%>Ket</th>
				</tr>
				<?php 
					$ambildb2 = "select tbl_absen.id, tbl_pegawai.nama, tbl_absen.jam_dat, tbl_absen.jam_pul,tbl_absen.ket from tbl_absen,tbl_pegawai where tbl_absen.id = tbl_pegawai.id and tbl_absen.tgl = curdate()";
					$qr_ambildb2 = mysql_query($ambildb2);
					while($hasil2 = mysql_fetch_array($qr_ambildb2)){
						echo "<tr class='isi'>";
						echo "<td align='center'>".$hasil2['id']."</td>";
						echo "<td align='left'>".$hasil2['nama']."</td>";
						echo "<td align='center'>".$hasil2['jam_dat']."</td>";
						echo "<td align='center'>".$hasil2['jam_pul']."</td>";
						echo "<td align='center'>".$hasil2['ket']."</td>";
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

<script language="JavaScript">

var kalimat = "";
var status = "";
<?php
	$sukses = $_GET['success'];
	$eror = $_GET['error'];
	if($sukses == 1){ $psn = "Terimakasih";} 
	elseif ($eror == 1){ $psn = "Silahkan coba lagi";}
	else { $psn = "SILAHKAN ANDA LETAKAN ID CARD ATAU JARI ANDA DI MESIN ABSEN";}
	echo "kalimat = '".$psn."';";
	echo "status = '".$status."';";
?>


var pisah = kalimat.split("");
 
 var looptimer;
 
 function ketik(){
	if(pisah.length > 0) 
	{
		document.getElementById("msg").innerHTML += pisah.shift();
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
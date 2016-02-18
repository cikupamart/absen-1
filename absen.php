<?php
	include "koneksi.php";
	session_start();
	session_destroy();
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
		j11 = waktu.getHours();
		j11 = j11.toString();
		m11 = waktu.getMinutes();
		m11 = m11.toString();
		d11 = waktu.getSeconds();
		d11 = d11.toString();
		if (j11<10) {j11="0"+j11;};
		if (m11<10) {m11="0"+m11;};
		if (d11<10) {d11="0"+d11;};
		
		document.finput.j1.src="DG/"+j11.substring(0,1)+".png";
		document.finput.j2.src="DG/"+j11.substring(1,2)+".png";
		document.finput.m1.src="DG/"+m11.substring(0,1)+".png";
		document.finput.m2.src="DG/"+m11.substring(1,2)+".png";
		document.finput.d1.src="DG/"+d11.substring(0,1)+".png";
		document.finput.d2.src="DG/"+d11.substring(1,2)+".png";
		
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
		
		document.getElementById('noid').focus();
		i_noid = document.getElementById('noid').value;
		document.getElementById('nama').value = nama[i_noid];
		document.getElementById('bagian').value = bagian[i_noid];
		document.getElementById('fotpeg').src = "foto/"+foto[i_noid];
		document.getElementById('pulang').value = "masuk";
		if(id_abs[i_noid]===undefined){ //cek jika id tersebut belum absen
			if(id[i_noid]===undefined && i_noid!=""){ playSound('audio/gagal.mp3'); document.getElementById('noid').value=""; //cek jika id tersebut tidak terdaftar pada database
			}
			else {	// printah dialakukan saat id terdaftar
				if (i_noid != "") { // cek box id kosong atau tidak, jika tidak kosong maka akan diproses
					setTimeout('inn_absen()',1000);
					}
			}
		}
		else{
			document.getElementById('pulang').value = "pulang";
			setTimeout('inn_absen()',1000);
			
		}
		setTimeout('fresh()',1000);
	

	}
	
 </script>
</head>

<body onLoad="fresh(); <?php $sukses = $_GET['success']; $eror = $_GET[error];if($sukses == 1){echo"playSound('audio/sukses.mp3')";}elseif($eror ==1){echo"playSound('audio/gagal.mp3')";} ?>;">
<div id="content">
	<div id="header">
		<p align="center">SYSTEM ABSEN WEBSERVER</p>
	</div>
	<br/>
	<div id="menu">
		<ul id="nav">
			<li><a href="absen.php">[ A B S E N ]</a></li>
			<li><a href="login.php">[ A D M I N I S T R A T O R ]</a></li>		
			<li><a href="about.php">[ A B O U T ]</a></li>
		</ul>
	
	</div>
	<br/>
	<div id="main">
		<div id="main1">
			<div id="foto">
				<image src="foto/no_foto.png" id="fotpeg" name="fotpeg" width=200px height=300px />
			</div>
			<form name="finput" id="finput" method="POST" action="proses2.php"/>
			<div id="input">
				ID : <br/>
				<input type="text" name="noid" id="noid" class="box"><br/>
				NAMA : <br/>
				<input type="text" id="nama" name="nama" class="box" /></br>
				DIVISI : <br/>
				<input type="text" id="bagian" name="bagian" class="box" /><input type="hidden" id="pulang"/ name="pulang" value="pulang"></br><h4/>
				<div id="jam">
					<center>
					<image class="jam" name="j1" src="DG/0.jpg" height="70px" width="32px" />
					<image class="jam" name="j2" src="DG/0.jpg" height="70px" width="32px" /><image class="jam1" src="" height=70px width=5px />
					<image class="jam" name="m1" src="DG/0.jpg" height="70px" width="32px" />
					<image class="jam" name="m2" src="DG/0.jpg" height="70px" width="32px" /><image class="jam1" src="" height=70px width=5px />
					<image class="jam" name="d1" src="DG/0.jpg" height="70px" width="32px" />
					<image class="jam" name="d2" src="DG/0.jpg" height="70px" width="32px" />
					</center>
				</div>
				<div id="tgl">
					<center>
					<hr/>
					<script language="JavaScript">document.write(namahari[hari]+", "+tgl+" "+namabulan[bln]+" 2012");</script>
					</center>
				</div>
			</div>
			</form>
			<div id="msg">
			
			</div>
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
					<th width=25%>Jam Masuk</th>
					<th width=25%>Jam Pulang</th>
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
<?php
	include "koneksi.php"
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
@import url(CalenderContro.css);
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
			<li><a href="menu.php">[ B A C K ]</a></li>
			<li><a href="logout.php">[ L O G O U T ]</a></li>
			<li><a href="about.php">[ A B O U T ]</a></li>
		</ul>
	</div>
	<br/>
	<div id="main">
	<form name="entri" action="proses1.php" method="POST" enctype="multipart/form-data" >
		<div id="main1">
		FORM INPUT BIODATA PEGAWAI
		<table id="i_form" cellspacing=10px>
			<tr>
				<td width=25%>No ID</td>
				<td width=1%>:</td>
				<td width=74%><input type="text" class="box1" name="noid" id="noid" onFocus="ptnjk1()" /></td>
			</tr>
			<tr>
				<td >Nama</td>
				<td >:</td>
				<td ><input type="text" class="box1" name="nama" id="nama"  onFocus="ptnjk2()" /></td>
			</tr>
			<tr>
				<td >Tempat Lahir</td>
				<td >:</td>
				<td ><input type="text" class="box1" name="tpt_lahir" id="tpt_lahir" onFocus="ptnjk3()" /></td>
			</tr>
			<tr>
				<td >Tanggal Lahir</td>
				<td >:</td>
				<td ><input type="text" class="box1" name="tgl_lahir" id="tgl_lahir" onFocus="ptnjk4()"/></td>
			</tr>
			<tr>
				<td >Bagian</td>
				<td >:</td>
				<td %><input type="text" class="box1" name="divisi" id="divisi" onFocus="ptnjk5()" /></td>
			</tr>
			<tr>
				<td >Alamat</td>
				<td >:</td>
				<td ><textarea name="alamat" id="alamat" onFocus="ptnjk6()" ></textarea></td>
			</tr>
			<tr>
				<td >No Telp</td>
				<td >:</td>
				<td ><input type="text" class="box1" name="telp" id="telp" onFocus="ptnjk7()"/></td>
			</tr>
			<tr>
				<td >Foto Pegawai</td>
				<td >:</td>
				<td ><input type="file" name="foto_up" id="foto_up" onChange="ganti()" /></td>
			</tr>
		</table>
		</div>
		<div id="main2" >
			<div id="tbl">
			<table id="tbl_absen">
				<tr color="white">
					<th width=10%>ID</th>
					<th width=40%>NAMA</th>
					<th width=25%>DIVISI</th>
				</tr>
				<?php
					$ambildb = "select * from tbl_pegawai order by id asc";
					$qry_ambildb = mysql_query($ambildb);
					while($hasil = mysql_fetch_array($qry_ambildb)){
						echo "<tr class='isi'>";
						echo "<td align='center'>".$hasil['id']."</td>";
						echo "<td>".$hasil['nama']."</td>";
						echo "<td align='center'>".$hasil['bagian']."</td>";
						echo "</tr>";
					}
				?>
			</table>
			</div>
			<hr/>
			<div id="main22">
				<input type="image" name="save" src="image/save.png" height=60px width=60px onMouseOver="javascript:this.src='image/save_1.png';" onMouseOut="javascript:this.src='image/save.png';" />
				<input type="image" name="delete" src="image/delete.png" height=60px width=60px onMouseOver="javascript:this.src='image/delete_1.png';" onMouseOut="javascript:this.src='image/delete.png';"  />
				<input type="image" name="update" src="image/update.png" height=60px width=60px onMouseOver="javascript:this.src='image/update_1.png';" onMouseOut="javascript:this.src='image/update.png';"  />
				<image name="reset" src="image/reset.png" height=60px width=60px onMouseOver="javascript:this.src='image/reset_1.png';" onMouseOut="javascript:this.src='image/reset.png';" onClick="kosong()"/>
				<div id="msg2"></div>
			</div>
		</div>
	</form>
	</div>
	<br/>
	<div id="footer">
	<p align="center">&copy Copyright is protected by Kusnadi @ ilmu-kompie.blogspot.com</p>
	</div>

</div>

<script language="JavaScript">
<?php
	$sukses = $_GET['success'];
	$eror = $_GET['error'];
	if($sukses==1){ $psn = "DATABASE PEGAWAI TELAH DISIMPAN";	}
	elseif($sukses==2){ $psn = "DATABASES PEGAWAI TELAH DIHAPUS"; }
	elseif($sukses==3){ $psn = "DATABASES PEGAWAI BERHASIL DI UPDATE"; }
	elseif($eror==1){ $psn = "GAGAL MEMPROSES DATA"; }
	elseif($eror==2) { $psn = "SILAHKAN DIPERKSA KEMBALI, MASIH ADA BIODATA YANG BELUM TERIISI";}
	elseif($eror==3) { $psn = "DATA GAGAL DISIMPAN KARENA MEMILIKI ID PEGAWAI YANG SAMA ATAU GANDA";}
	elseif($eror==4) { $psn = "GAGAL MENGHAPUS DATA PEGAWAI, DIKARENAKAN ID PEGAWAI YANG DIMASUKAN TIDAK TERDAFTAR PADA DATABASE";}
	elseif($eror==5) { $psn = "DATABASE PEGAWAI GAGAL DIUPDATE";}	
	else{ $psn = "SILAHKAN ANDA ISI FORM REGISTRASI PEGAWAI, LANGKAH PERTAMA ISI NOMOR ID PEGAWAI TERLEBIH DAHULU";}
	
	echo "var kalimat = '".$psn."';";
?>

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

<script language="javascript">

function ptnjk1(){
	document.getElementById("msg2").innerHTML = "SEKARANG MASUKAN ID PEGAWAI";
}
function ptnjk2(){
	document.getElementById("msg2").innerHTML = "MASUKAN NAMA PEGAWAI";
}
function ptnjk3(){
	document.getElementById("msg2").innerHTML = "MASUKAN TEMPAT LAHIR PEGAWAI";
}
function ptnjk4(){
	document.getElementById("msg2").innerHTML = "MASUKAN TANGGAL LAHIR PEGAWAI DENGAN FORMAT YYYY-MM-DD, CONTOH PEGAWAI YANG LAHIR 26 DESEMBER 1991 MAKA DITULIS 1991-12-26";
}
function ptnjk5(){
	document.getElementById("msg2").innerHTML = "MASUKAN BAGIAN, DIVISI, ATAU JABATAN PEGAWAI";
}
function ptnjk6(){
	document.getElementById("msg2").innerHTML = "MASUKAN ALAMAT LENGKAP PEGAWAI";
}
function ptnjk7(){
	document.getElementById("msg2").innerHTML = "MASUKAN NO TELP ATAU HP PEGAWAI, KEMUDIAN PILIH FOTO PEGAWAI DENGAN FORMAT JPG ATAU PNG";
}

</script>
</body>


</html>
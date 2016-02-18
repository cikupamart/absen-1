<?php
	include "koneksi.php";
	$noid = $_POST['noid'];
	$pulang = $_POST['pulang'];

	if($pulang == "masuk"){
		$absen = "insert into tbl_absen values(curdate(),'$noid',curtime(),'','m','')";
		$qry_absen = mysql_query($absen);
		if($qry_absen){header('location:absen.php?success=1');}
		else { header('location:absen.php?error=1');}
	}
	elseif ($pulang == "pulang"){
		$pulang = "update tbl_absen set jam_pul=curtime() where id='$noid'";
		$qry_pulang = mysql_query($pulang);
		if($qry_pulang){header('location:absen.php?success=1');}
		else { header('location:absen.php?error=1');}
	}

?>
<?php

	include "koneksi.php";
	
	$noid = $_POST['noid'];
	$nama = $_POST['nama'];
	$ket = $_POST['ket'];
	$komen = $_POST['komen'];
	
	$save = "insert into tbl_absen values(curdate(), '$noid', '', '', '$ket', '$komen');";
	$update = "update tbl_absen set ket='$ket', komentar='$komen' where id = '$noid' and tgl=curdate();";
	$delete = "delete from tbl_absen where id='$noid' and tgl=curdate();";
	if($_POST['save_x']){
		$qry_save = mysql_query($save);
		if ($qry_save) {
			header('location:kon_abs.php?success=1');
			break;
		}
		else {
			header('location:kon_abs.php?error=1');
		}
	}
	elseif($_POST['update_x']) {
		$qry_update = mysql_query($update);
		if ($qry_update) {
			header('location:kon_abs.php?success=2');
			break;
		}
		else {
			header('location:kon_abs.php?error=2');
		}
	}
	elseif($_POST['delete_x']) {
		$qry_delete = mysql_query($delete);
		if ($qry_delete) {
			header('location:kon_abs.php?success=3');
		}
		else {
			header('location:kon_abs.php?error=3');
		}
	}


?>
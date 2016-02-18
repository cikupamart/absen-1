<?php

	include "koneksi.php";

	$noid = $_POST['noid'];
	$nama = $_POST['nama'];
	$tpt_lahir = $_POST['tpt_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$divisi = $_POST['divisi'];
	$alamat = $_POST['alamat'];
	$telp = $_POST['telp'];
	$fotname = $noid.".jpg";
	$fotloc = $_FILES['foto_up']['tmp_name'];
	$foterr = $FILES['foto_up']['error'];
	
	$simpan = "insert into tbl_pegawai values('$noid','$nama','$tpt_lahir','$tgl_lahir','$divisi','$alamat','$telp','$fotname');";
	$hapus = "delete from tbl_pegawai where id='$noid'";
	$update = "update tbl_pegawai set nama='$nama', tpt_lahir='$tpt_lahir', tgl_lahir='$tgl_lahir', bagian='$divisi', alamat='$alamat', telp='$telp', foto='$fotname' where id='$noid';";

	
//	if($noid!="" && $nama!="" && $tpt_lahir!="" && $tgl_lahir!="" && $divisi!="" && $alamat!="" && $telp!="" ){
		if($_POST['save_x']) {
			$qry_simpan = mysql_query($simpan);
			if($qry_simpan){
				move_uploaded_file($fotloc,"foto/".$fotname);
				header('location:entry.php?success=1');
			}
			else{
				header('location:entry.php?error=3');
			}
				
		}
		elseif($_POST['delete_x']){
			$qry_hapus = mysql_query($hapus);
			if($qry_hapus){
				if (file_exists("foto/".$fotname)){
					unlink("foto/".$fotname);
					header('location:entry.php?success=2');
				}
				else {
					header('location:entry.php?success=2');
				}
			}
			else {
				header('location:entry.php?error=4');
			}
				
		}
		elseif($_POST['update_x']){
			$qry_update = mysql_query($update);
			if(qry_update){
				unlink("foto/".$fotname);
				header('location:entry.php?success=3');
				move_uploaded_file($fotloc,"foto/".$fotname);
			}
			else{
				header('location:entry.php?error=5');
			}
		}
		else{
			header('location;entry.php?error=1');
		}
//	}
//	else {
//		header('location:entry.php?error=2');
//	}
?>
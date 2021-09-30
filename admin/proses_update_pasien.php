<?php  
	session_start();
	include "../library/alert.php"; 
	$alert = new Alert();
	include "../config/database.php"; 
    $db = new database();

	$id_pasien = $_POST['id_pasien'];
	$nama_pasien = $_POST['nama_pasien'];
	$jk_pasien = $_POST['jk_pasien'];
	$alamat_pasien = $_POST['alamat_pasien'];
	$no_hp_pasien = $_POST['no_hp_pasien'];
	$username = $_POST['username'];
	$pass = $_POST['password'];
	$password = md5($pass);

	if ($pass != null || $pass != '') {
		$data = "nama_pasien='$nama_pasien', jk_pasien='$jk_pasien', alamat_pasien='$alamat_pasien', no_hp_pasien='$no_hp_pasien', username='$username', password='$password'";
	}else{
		$data = "nama_pasien='$nama_pasien', jk_pasien='$jk_pasien', alamat_pasien='$alamat_pasien', no_hp_pasien='$no_hp_pasien', username='$username'";
	} 

	$query ="UPDATE tbl_pasien SET $data WHERE id_pasien='$id_pasien'";
    $update_pasien = $db->query($query);

	if ($update_pasien) {		
		$_SESSION['alert'] = $alert->alert_success('Data pasien berhasil diupdate.');
		header("Location: index.php?x=data_pasien&&nav=pasien&&alt=1");
	}else{
		$_SESSION['alert'] = $alert->alert_failed('Data pasien gagal diupdate.');
		header("Location: index.php?x=data_pasien&&nav=pasien&&alt=1");
	}
?>
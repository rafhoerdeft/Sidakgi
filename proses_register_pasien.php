<?php 
	
	session_start();
	include "library/alert.php"; 
	$alert = new Alert();
	include "config/database.php"; 
    $db = new database();	

	$nama = $_POST['nama_pasien'];
	$alamat = $_POST['alamat_pasien'];
	$jk_pasien = $_POST['jk_pasien'];
	$no_hp = $_POST['no_hp_pasien'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$query ="INSERT INTO tbl_pasien (nama_pasien, alamat_pasien, jk_pasien, no_hp_pasien, username, password) VALUES ('$nama', '$alamat', '$jk_pasien', '$no_hp', '$username', '$password')";
    $simpan_pasien = $db->query($query);

	if ($simpan_pasien) {	
		$_SESSION['alert'] = $alert->alert_success('Register pasien berhasil! Silahkan login untuk periksa.');
		header("Location: index.php?alt=1");
	}else{
		$_SESSION['alert'] = $alert->alert_failed('Register pasien gagal! Silahkan register kembali.');
		header("Location: index.php?alt=1");
	}
	
?>
<?php  
	session_start();
	include "../library/alert.php"; 
	$alert = new Alert();
	include "../config/database.php"; 
    $db = new database();

	$id_pasien = $_POST['id_pasien'];
	$nama = $_POST['nama_pasien'];
	$alamat = $_POST['alamat_pasien'];
	$jk_pasien = $_POST['jk_pasien'];
	$no_hp = $_POST['no_hp_pasien'];

	$query ="UPDATE tbl_pasien SET nama_pasien='$nama', jk_pasien='$jk_pasien', alamat_pasien='$alamat', no_hp_pasien='$no_hp' WHERE id_pasien='$id_pasien'";
    $update_pasien = $db->query($query);

	if ($update_pasien) {		
		$_SESSION['alert'] = $alert->alert_success('Data profil Anda berhasil diupdate.');
		header("Location: index.php?x=profil&&nav=profil&&alt=1");
	} else {
		$_SESSION['alert'] = $alert->alert_failed('Data profil Anda gagal diupdate.');
		header("Location: index.php?x=profil&&nav=profil&&alt=1");
	}

	
?>
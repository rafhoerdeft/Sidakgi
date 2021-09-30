<?php  
	session_start();
	include "../library/alert.php"; 
	$alert = new Alert();
	include "../config/database.php"; 
    $db = new database();

	$id_pasien = $_POST['id_pasien'];
	$username = $_POST['username'];
	$oldPass = md5($_POST['oldPass']);
	$password = md5($_POST['password']);

	$query_cek = "SELECT password FROM tbl_pasien WHERE id_pasien = '$id_pasien'"; //Pasien
    $cek_pass = $db->query($query_cek);
    while ($val = $db->fetch_assoc($cek_pass)) {
    	$passOri = $val['password'];
    }
    if ($oldPass == $passOri) {
    	$query ="UPDATE tbl_pasien SET username='$username', password='$password' WHERE id_pasien='$id_pasien'";
	    $update_pasien = $db->query($query);

		if ($update_pasien) {		
			$_SESSION['alert'] = $alert->alert_success('Akun login Anda berhasil diupdate.');
			header("Location: index.php?x=akun_login&&nav=akun&&alt=1");
		} else {
			$_SESSION['alert'] = $alert->alert_failed('Akun login Anda gagal diupdate.');
			header("Location: index.php?x=akun_login&&nav=akun&&alt=1");
		}
    } else {
		$_SESSION['alert'] = $alert->alert_failed('Password lama Anda tidak sesuai! Silahkan ulangi lagi.');
		header("Location: index.php?x=akun_login&&nav=akun&&alt=1");
	}

	
?>
<?php  
	session_start();
	include "../library/alert.php"; 
	$alert = new Alert();
	include "../config/database.php"; 
    $db = new database();

	$id_user = $_POST['id_user'];
	$nama = $_POST['nama_user'];
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$password=md5($pass);

	if ($pass != null || $pass != '') {
		$data = "nama_user='$nama', username='$user', password='$password'";
	}else{
		$data = "nama_user='$nama', username='$user'";
	} 

	$query ="UPDATE tbl_user SET $data WHERE id_user='$id_user'";
    $update_user = $db->query($query);

	if ($update_user) {		
		$_SESSION['alert'] = $alert->alert_success('Data user berhasil diupdate.');
		header("Location: index.php?x=data_user&&nav=user&&alt=1");
	}else{
		$_SESSION['alert'] = $alert->alert_failed('Data user gagal diupdate.');
		header("Location: index.php?x=data_user&&nav=user&&alt=1");
	}
?>
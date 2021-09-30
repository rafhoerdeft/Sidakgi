<?php  
	session_start();
	include "../library/alert.php"; 
	$alert = new Alert();
	include "../config/database.php"; 
    $db = new database();

	$nama = $_POST['nama_user'];
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$password=md5($pass);

	// $simpan_user = mysqli_query($conn,"INSERT INTO tbl_user (nama_user, alamat_user, username, password, id_role) VALUES ('$nama', '$alamat', '$user', '$password', '$role')") or die(mysql_error());

	$query ="INSERT INTO tbl_user (nama_user, username, password) VALUES ('$nama', '$user', '$password')";
    $simpan_user = $db->query($query);

	if ($simpan_user) {		
		$_SESSION['alert'] = $alert->alert_success('Data user berhasil disimpan.');
		header("Location: index.php?x=data_user&&nav=user&&alt=1");
	}else{
		$_SESSION['alert'] = $alert->alert_failed('Data user gagal disimpan.');
		header("Location: index.php?x=data_user&&nav=user&&alt=1");
	}
?>
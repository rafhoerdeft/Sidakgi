<?php  
	session_start();
	include "../library/alert.php"; 
	$alert = new Alert();
	include "../config/database.php"; 
    $db = new database();

	$jenis_gigi = $_POST['jenis_gigi'];

	// $simpan_user = mysqli_query($conn,"INSERT INTO tbl_user (nama_user, alamat_user, username, password, id_role) VALUES ('$nama', '$alamat', '$user', '$password', '$role')") or die(mysql_error());

	$query ="INSERT INTO tbl_jenis_gigi (jenis_gigi) VALUES ('$jenis_gigi')";
    $simpan_gigi = $db->query($query);

	if ($simpan_gigi) {		
		$_SESSION['alert'] = $alert->alert_success('Data jenis gigi berhasil disimpan.');
		header("Location: index.php?x=data_gigi&&nav=gigi&&alt=1");
	}else{
		$_SESSION['alert'] = $alert->alert_failed('Data jenis gigi gagal disimpan.');
		header("Location: index.php?x=data_gigi&&nav=gigi&&alt=1");
	}
?>
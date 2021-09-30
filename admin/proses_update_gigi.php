<?php  
	session_start();
	include "../library/alert.php"; 
	$alert = new Alert();
	include "../config/database.php"; 
    $db = new database();

	$id_jenis_gigi = $_POST['id_jenis_gigi'];
	$jenis_gigi = $_POST['jenis_gigi'];

	$query ="UPDATE tbl_jenis_gigi SET jenis_gigi='$jenis_gigi' WHERE id_jenis_gigi='$id_jenis_gigi'";
    $update_gigi = $db->query($query);

	if ($update_gigi) {		
		$_SESSION['alert'] = $alert->alert_success('Data jenis gigi berhasil diupdate.');
		header("Location: index.php?x=data_gigi&&nav=gigi&&alt=1");
	}else{
		$_SESSION['alert'] = $alert->alert_failed('Data jenis gigi gagal diupdate.');
		header("Location: index.php?x=data_gigi&&nav=gigi&&alt=1");
	}
?>
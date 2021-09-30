<?php  
	session_start();
	include "../library/alert.php"; 
	$alert = new Alert();
	include "../config/database.php"; 
    $db = new database();

	$id_kasus = $_POST['id_kasus'];
	$gigi = $_POST['gigi'];
	$gusi = $_POST['gusi'];
	$nyeri = $_POST['nyeri'];
	$ngilu = $_POST['ngilu'];
	$label = $_POST['label'];

	$query ="UPDATE tbl_kasus SET gigi='$gigi', gusi='$gusi', nyeri='$nyeri', ngilu='$ngilu', label='$label' WHERE id_kasus='$id_kasus'";
    $update_kasus = $db->query($query);

	if ($update_kasus) {		
		$_SESSION['alert'] = $alert->alert_success('Data kasus berhasil diupdate.');
		header("Location: index.php?x=data_kasus&&nav=kasus&&alt=1");
	}else{
		$_SESSION['alert'] = $alert->alert_failed('Data kasus gagal diupdate.');
		header("Location: index.php?x=data_kasus&&nav=kasus&&alt=1");
	}
?>
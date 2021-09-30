<?php  
	session_start();
	include "../library/alert.php"; 
	$alert = new Alert();
	include "../config/database.php"; 
    $db = new database();

	$gigi = $_POST['gigi'];
	$gusi = $_POST['gusi'];
	$nyeri = $_POST['nyeri'];
	$ngilu = $_POST['ngilu'];
	$label = $_POST['label'];

	$query ="INSERT INTO tbl_kasus (gigi, gusi, nyeri, ngilu, label) VALUES ('$gigi', '$gusi', '$nyeri', '$ngilu', '$label')";
    $simpan_kasus = $db->query($query);

	if ($simpan_kasus) {		
		$_SESSION['alert'] = $alert->alert_success('Data kasus berhasil disimpan.');
		header("Location: index.php?x=data_kasus&&nav=kasus&&alt=1");
	}else{
		$_SESSION['alert'] = $alert->alert_failed('Data kasus gagal disimpan.');
		header("Location: index.php?x=data_kasus&&nav=kasus&&alt=1");
	}
?>
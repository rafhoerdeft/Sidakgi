<?php 

    session_start();
    include "../library/alert.php"; 
    $alert = new Alert();
    include "../config/database.php"; 
    $db = new database();

    $query = "TRUNCATE tbl_kasus";
    $del_kasus = $db->query($query);

    if ($del_kasus) {   
      $_SESSION['alert'] = $alert->alert_success('Semua data kasus berhasil dihapus.');
      header("Location: index.php?x=data_kasus&&nav=kasus&&alt=1");
    }else{
      $_SESSION['alert'] = $alert->alert_failed('Semua data kasus gagal dihapus.');
      header("Location: index.php?x=data_kasus&&nav=kasus&&alt=1");
    }
?>
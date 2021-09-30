<?php 

    session_start();
    include "../library/alert.php"; 
    $alert = new Alert();
    include "../config/database.php"; 
    $db = new database();

    $query = "TRUNCATE tbl_keputusan";
    $del_keputusan = $db->query($query);

    if ($del_keputusan) {   
      $_SESSION['alert'] = $alert->alert_success('Semua data pohon keputusan berhasil dihapus.');
      header("Location: index.php?x=pohon_keputusan&&nav=keputusan&&alt=1");
    }else{
      $_SESSION['alert'] = $alert->alert_failed('Semua data pohon keputusan gagal dihapus.');
      header("Location: index.php?x=pohon_keputusan&&nav=keputusan&&alt=1");
    }
?>
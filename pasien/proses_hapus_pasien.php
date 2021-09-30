<?php 
  if(isset($_POST['id'])){   
    session_start();
    include "../library/alert.php"; 
    $alert = new Alert();
    include "../config/database.php"; 
    $db = new database();

    $id_pasien = $_POST['id'];   

    $sql = "SELECT * FROM tbl_pasien WHERE id_pasien = '$id_pasien'"; 
    $result = $db->query($sql);
    
    if($db->num_rows($result) == 0){ 
      echo '<script>window.history.back()</script>';   
    }else{ 
        $query = "DELETE FROM tbl_pasien WHERE id_pasien='$id_pasien'";
        $del_pasien = $db->query($query);

        if ($del_pasien) {   
          $_SESSION['alert'] = $alert->alert_success('Data pasien berhasil dihapus.');
          echo "Success";
        }else{
          $_SESSION['alert'] = $alert->alert_failed('Data pasien gagal dihapus.');
          echo "Gagal";
        }
    }  
  }else{   
    echo '<script>window.history.back()</script>';  
  } 
?>
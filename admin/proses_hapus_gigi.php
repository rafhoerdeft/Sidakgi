<?php 
  if(isset($_POST['id'])){   
    session_start();
    include "../library/alert.php"; 
    $alert = new Alert();
    include "../config/database.php"; 
    $db = new database();

    $id_jenis_gigi = $_POST['id'];   

    $sql = "SELECT * FROM tbl_jenis_gigi WHERE id_jenis_gigi = '$id_jenis_gigi'"; 
    $result = $db->query($sql);
    
    if($db->num_rows($result) == 0){ 
      echo '<script>window.history.back()</script>';   
    }else{ 
        $query = "DELETE FROM tbl_jenis_gigi WHERE id_jenis_gigi='$id_jenis_gigi'";
        $del_gigi = $db->query($query);

        if ($del_gigi) {   
          $_SESSION['alert'] = $alert->alert_success('Data jenis gigi berhasil dihapus.');
          echo "Success";
        }else{
          $_SESSION['alert'] = $alert->alert_failed('Data jenis gigi gagal dihapus.');
          echo "Gagal";
        }
    }  
  }else{   
    echo '<script>window.history.back()</script>';  
  } 
?>
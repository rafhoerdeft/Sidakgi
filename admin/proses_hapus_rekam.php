<?php 
  if(isset($_POST['id'])){   
    session_start();
    include "../library/alert.php"; 
    $alert = new Alert();
    include "../config/database.php"; 
    $db = new database();

    $id_rm = $_POST['id'];   

    $sql = "SELECT * FROM tbl_rekam_medik WHERE id_rm = '$id_rm'"; 
    $result = $db->query($sql);
    
    if($db->num_rows($result) == 0){ 
      echo '<script>window.history.back()</script>';   
    }else{ 
        $query = "DELETE FROM tbl_rekam_medik WHERE id_rm='$id_rm'";
        $del_rm = $db->query($query);

        if ($del_rm) {   
          $_SESSION['alert'] = $alert->alert_success('Data rekam medik berhasil dihapus.');
          echo "Success";
        }else{
          $_SESSION['alert'] = $alert->alert_failed('Data rekam medik gagal dihapus.');
          echo "Gagal";
        }
    }  
  }else{   
    echo '<script>window.history.back()</script>';  
  } 
?>
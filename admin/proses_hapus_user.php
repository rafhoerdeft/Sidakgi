<?php 
  if(isset($_POST['id'])){   
    session_start();
    include "../library/alert.php"; 
    $alert = new Alert();
    include "../config/database.php"; 
    $db = new database();

    $id_user = $_POST['id'];   

    $sql = "SELECT * FROM tbl_user WHERE id_user = '$id_user'"; 
    $result = $db->query($sql);
    
    if($db->num_rows($result) == 0){ 
      echo '<script>window.history.back()</script>';   
    }else{ 
        $query = "DELETE FROM tbl_user WHERE id_user='$id_user'";
        $del_user = $db->query($query);

        if ($del_user) {   
          $_SESSION['alert'] = $alert->alert_success('Data user berhasil dihapus.');
          echo "Success";
        }else{
          $_SESSION['alert'] = $alert->alert_failed('Data user gagal dihapus.');
          echo "Gagal";
        }
    }  
  }else{   
    echo '<script>window.history.back()</script>';  
  } 
?>
<?php 
  if(isset($_POST['id'])){   
    session_start();
    include "../library/alert.php"; 
    $alert = new Alert();
    include "../config/database.php"; 
    $db = new database();

    $id_kasus = $_POST['id'];   

    $sql = "SELECT * FROM tbl_kasus WHERE id_kasus = '$id_kasus'"; 
    $result = $db->query($sql);
    
    if($db->num_rows($result) == 0){ 
      echo '<script>window.history.back()</script>';   
    }else{ 
        $query = "DELETE FROM tbl_kasus WHERE id_kasus='$id_kasus'";
        $del_kasus = $db->query($query);

        if ($del_kasus) {   
          $_SESSION['alert'] = $alert->alert_success('Data kasus berhasil dihapus.');
          echo "Success";
        }else{
          $_SESSION['alert'] = $alert->alert_failed('Data kasus gagal dihapus.');
          echo "Gagal";
        }
    }  
  }else{   
    echo '<script>window.history.back()</script>';  
  } 
?>
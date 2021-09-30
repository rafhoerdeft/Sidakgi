<?php 
    date_default_timezone_set('Asia/Jakarta');

    $get_page = $_GET['x'];
    $get_nav = $_GET['nav'];
    
    include "header.php"; 
    include "navigation.php"; 
    
    if ($get_page == '' || $get_page == null) {
       include ('diagnosa.php');
    }else{
        include ($get_page.'.php');
    }
    
    include "footer.php"; 
?>
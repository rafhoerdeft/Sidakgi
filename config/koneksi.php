<?php 
  $host = "localhost";   
  $user = "root";  
  $pass = "";   
  $name = "db_sidakgi"; 
 
  $conn = mysqli_connect($host, $user, $pass, $name) or die("Koneksi ke database gagal!"); 
 // mysql_select_db($name, $koneksi) or die("Tidak ada database yang dipilih!"); 
?>
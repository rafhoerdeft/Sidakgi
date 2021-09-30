<?php
	session_start();
	include("config/koneksi.php");
	$user=$_POST['username'];
	$password=$_POST['password'];
	$pass=md5($password);

	$login=mysqli_query($conn, "SELECT * FROM tbl_user WHERE username='$user' AND password='$pass'");
	$num=mysqli_num_rows($login);
	$log=mysqli_fetch_array($login);
	
	if($num >= 1){
		// $dataRole = mysqli_query($conn, "SELECT * FROM tbl_role WHERE id_role='$log[id_role]'");
		// $role=mysqli_fetch_array($dataRole);
		// $_SESSION['id_login']=$log['id_login'];
		$_SESSION['id_user']=$log['id_user'];
		$_SESSION['nama_user']=$log['nama_user'];
		$_SESSION['username']=$log['username'];
		$_SESSION['role']='admin';

		if ($_SESSION['role'] == 'dokter') {
			echo "Dokter";
		}else{
			echo "Admin";
		}
	}else{
		echo "Gagal";
		// echo "
		// <script type='text/javascript'>
		// alert('Username & Password Anda Salah!');
		// history.back(self);
		// </script>
		// ";
	}
?>
<?php
	session_start();
	include("config/koneksi.php");
	$user=$_POST['username'];
	$password=$_POST['password'];
	$pass=md5($password);

	$login=mysqli_query($conn, "SELECT * FROM tbl_pasien WHERE username='$user' AND password='$pass'");
	$num=mysqli_num_rows($login);
	$log=mysqli_fetch_array($login);
	
	if($num >= 1){
		// $dataRole = mysqli_query($conn, "SELECT * FROM tbl_role WHERE id_role='$log[id_role]'");
		// $role=mysqli_fetch_array($dataRole);
		// $_SESSION['id_login']=$log['id_login'];
		$_SESSION['id_pasien']=$log['id_pasien'];
		$_SESSION['nama_user']=$log['nama_pasien'];
		$_SESSION['username']=$log['username'];
		$_SESSION['role']='pasien';

		if ($_SESSION['role'] == 'pasien') {
			echo "Pasien";
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
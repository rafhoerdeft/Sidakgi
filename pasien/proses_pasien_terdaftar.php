<?php  
	session_start();
	include "../library/alert.php"; 
	$alert = new Alert();
	include "../config/database.php"; 
    $db = new database();

    function atribut($db=''){

		$atribut = array(); 
		$query ="SELECT COLUMN_NAME as atribut FROM information_schema.columns WHERE table_schema='$db->db_name' AND table_name='tbl_kasus'";
		$sql_attr = $db->query($query);
      	while($row = $db->fetch_assoc($sql_attr)){
      		if ($row['atribut'] != 'id_kasus' AND $row['atribut'] != 'label') {
				$atribut[] = $row['atribut'];
			}
      	}

      	return $atribut;
	}

	$hasil = prosesKlasifikasi($db);

	function prosesKlasifikasi($db){
		$atribut = atribut($db);
		$inputAttr = array();
		foreach ($atribut as $attr) {
			$inputAttr[$attr] = $_POST[$attr];
		}

		// var_dump($inputAttr);

		$query_keputusan = "SELECT * FROM `tbl_keputusan`"; //ISI ATRIBUT
		$sql = $db->query($query_keputusan);
		// $kondisi = array();
		$keputusan = '';
		while ($val = $db->fetch_assoc($sql)) {

			// $kondisi[] = $val['kondisi'].' => '.$val['label'];

			$pecahKondisi = explode(" AND ", $val['kondisi']);

			$cek = array();
			foreach ($pecahKondisi as $kond) {
				$z = 0;
				foreach ($inputAttr as $key => $value) {
					$inputKond = "$key = $value";
					if ($kond == $inputKond) {
						$z++;
					}
				}

				if ($z > 0) {
					$cek[] = 'TRUE';
				}else{
					$cek[] = 'FALSE';
				}

			}

			$hasil = 0;
			foreach ($cek as $x) {
				if ($x == 'FALSE') {
					$hasil++;
				}
			}

			if ($hasil==0) {
				$keputusan = $val['label'];
				break;
			}

		}

		// echo '<pre>'; print_r($kondisi);

		return $keputusan;	

	}
	

    $id_pasien = $_POST['id_pasien'];	
	$tgl_periksa = date('Y-m-d');
	$gigi = $_POST['gigi'];	
	$gusi = $_POST['gusi'];	
	$nyeri = $_POST['nyeri'];	
	$ngilu = $_POST['ngilu'];	
	$diagnosa = $hasil;	

	$query ="INSERT INTO tbl_rekam_medik (id_pasien, tgl_periksa, gigi, gusi, nyeri, ngilu, diagnosa) VALUES ('$id_pasien', '$tgl_periksa', '$gigi', '$gusi', '$nyeri', '$ngilu', '$diagnosa')";
    $simpan_rm = $db->query($query);

    if ($simpan_rm) {
    	// $_SESSION['alert'] = $alert->alert_success('Data user berhasil disimpan.');
		header("Location: index.php?x=hasil_diagnosa&&nav=terdaftar");
	}else{
		$_SESSION['alert'] = $alert->alert_failed('Data diagnosa pasien gagal disimpan.');
		header("Location: index.php?x=pasien_baru&&nav=baru&&alt=1");
	}

?>
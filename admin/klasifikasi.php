<!DOCTYPE html>
<?php 
	include_once("config/database.php");
	$db = new database();
?>
<html>
<head>
	<title>Klasifikasi C4.5</title>
</head>
<body>
	<form method="POST" action="">
		<?php  
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
	      	
	      	$atribut = atribut($db);	
	      	foreach ($atribut as $attr) {
		?>
				<!-- <input type="text" name="<?= $attr ?>" value="<?= $attr ?>"> -->
				<div style="float: left; margin-right: 20px">
					<label><?= $attr ?></label> <br>
					<select name="<?= $attr ?>">
						<?php  
							$query_isi = "SELECT $attr as attr FROM `tbl_kasus` GROUP BY $attr"; //ISI ATRIBUT
							$sql_isi = $db->query($query_isi);
							
							while ($val = $db->fetch_assoc($sql_isi)) {
						?>
								<option value="<?= $val['attr'] ?>"><?= $val['attr'] ?></option>

						<?php } ?>
					</select>
				</div>
		<?php } ?>

		<div>
			<br>
			<input type="submit" name="proses" value="Proses">
		</div>
	</form>
	<br>
	<?php  

		if (isset($_POST['proses'])) {
			$hasil = prosesKlasifikasi($db);
			echo $hasil;
		}

		function prosesKlasifikasi($db){
			$atribut = atribut($db);
			$inputAttr = array();
			foreach ($atribut as $attr) {
				$inputAttr[$attr] = $_POST[$attr];
			}

			// var_dump($inputAttr);

			$query_keputusan = "SELECT * FROM `tbl_keputusan`"; //ISI ATRIBUT
			$sql = $db->query($query_keputusan);
			$kondisi = array();
			$keputusan = '';
			while ($val = $db->fetch_assoc($sql)) {

				$kondisi[] = $val['kondisi'].' => '.$val['label'];

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

	?>
</body>
</html>
        <div style="z-index: 20; top: 40%; left: 47%; position: fixed; display:none;" id="loading-show">
            <img src="../assets/loading/loading3.gif" width="100">
        </div>  

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-6 align-self-center">
                    <h3 class="text-themecolor">Proses Mining C.45</h3>
                </div>

                <!-- <div>
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div> -->
            </div>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <?= (isset($_SESSION['alert'])?$_SESSION['alert']:'') ?>

                <div class="row">
                    <div id="loading" class="col-md-12" style="margin-bottom: -25px; margin-top: -50px; text-align: center; display:none;">
                        <img src="../assets/loading/loading1.gif" width="100" >
                    </div>
                </div>


                <div class="card">
                    <div class="card-body p-b-20">
                        
                        <form method="POST" action="">
							<button type="submit" class="btn waves-effect waves-light btn-inverse float-right" name="proses"><i class="fa fa-gear"></i> Proses Mining</button>
						</form>
						<br>

						<?php  

							if (isset($_POST['proses'])) {
								$query = "TRUNCATE tbl_keputusan";
								$db->query($query);

								$jml_kasus = totalKasus($db);
								echo "Jumlah Kasus: ".$jml_kasus."<br>";

								$query ="SELECT id_kasus FROM tbl_kasus";
                                $result = $db->query($query);
                                $jmlKasus = $db->num_rows($result);

                                if ($jmlKasus == 0) {
                                	echo "<script>alert('Data kasus masih kosong! Isi dahulu data kasus.')</script>";   
                                } else {
                                	$mining = prosesMining($db, "", "", ""); 
                                }
							}

							function format_decimal($value){
							    return round($value, 6);
							}

							function atribut($db='', $pangkas=''){ //Mendapatkan nama atribut pada tabel kasus ($db=>Koneksi, $pangkas=>ex(prakarsa,kehadiran))
								$pangkas = explode(",", $pangkas);
								$atribut = array(); 
								$query ="SELECT COLUMN_NAME as atribut FROM information_schema.columns WHERE table_schema='$db->db_name' AND table_name='tbl_kasus'";
								$sql_attr = $db->query($query);
						      	while($row = $db->fetch_assoc($sql_attr)){
						      		$id = 0;
									foreach ($pangkas as $key) {
										if ($key == $row['atribut']) {
											$id++;
										}
									}

									if ($id==0) {
										$atribut[] = $row['atribut'];
									}
						      	}

						      	return $atribut;
							}

							function totalKasus($db='', $kondisi=''){ //Menghitung jumlah kasus

								$query ="SELECT * FROM tbl_kasus $kondisi";
								$sql_kasus = $db->query($query);
								$jml_kasus = $db->num_rows($sql_kasus);

								return $jml_kasus;
							}

							function dataLabel($db='', $kondisi=''){ //Mengambil data pada kolom label beserta jumlahnya 
								$Si_Tot = array();
								$query_Si_Tot = "SELECT label, COUNT(label) jml FROM `tbl_kasus` $kondisi GROUP BY label";
								$sql_Si_Tot = $db->query($query_Si_Tot);
								while ($row = $db->fetch_assoc($sql_Si_Tot)) {
									$Si_Tot[] = array(
										'label'=>$row['label'],
										'jml' => (int)$row['jml']
									);
								}

								return $Si_Tot;
								// var_dump($Si_Tot[0]['label']);
							}

							function entrophyTot($db='', $S='', $kondisi=''){ //Menghitung entrophy
								$Si_Tot = dataLabel($db, $kondisi);
								// $S = totalKasus($db, $kondisi);
								$entrophy_tot = 0;
								foreach ($Si_Tot as $key) {
									// echo "Jml label (".$key['label'].'): '.$key['jml'].'<br>';
									if ($S == 0) {
										$entrophy_tot += 0;
									}else{
										$entrophy_tot += (-($key['jml'])/$S)*log($key['jml']/$S,2); //Rumus Entrophy
									}
									
								}

								return $entrophy_tot;
							}


							function cabangPohon($db, $kondx='', $kondisi='', $cabang='', $pangkas=''){ //Membuat percabangan pohon keputusan
								prosesMining($db, $kondx, $kondisi, $cabang, $pangkas);
							}


							function prosesMining($db='', $kondx='', $kondisi='', $cabang='', $pangkas=''){ //Proses Mining
								if ($cabang != '') {
									$addKondisi = " AND $cabang"; //$kondisi => ex: (prakarsa = 'tidak inisiatif')
								}else{
									$addKondisi = "";
								}

								if ($kondx != '') {
									$konds = " WHERE $kondx";
								} else {
									$konds = '';
								}

								$S_tot = totalKasus($db, $konds);
								$entrop_tot = entrophyTot($db, $S_tot, $konds);

								// echo "Entrop Total: $entrop_tot <br><br>";

								$Si_Tot = dataLabel($db, $konds);
								$dataAtr = array();
								$atribut = atribut($db, $pangkas);//$pangkas => ex: (prakarsa,kehadiran)
								foreach ($atribut as $attr) { //NAMA ATRIBUT

									if ($attr != 'id_kasus' AND $attr != 'label') {

										$gain_att = 0;
										$split_info = 0;

										$valAttr = array();

										$query_isi = "SELECT $attr as attr FROM `tbl_kasus` GROUP BY $attr"; //ISI ATRIBUT
										$sql_isi = $db->query($query_isi);
										
										while ($val = $db->fetch_assoc($sql_isi)) {


											$Si = array();
											$S_atr = 0;
											foreach ($Si_Tot as $key) {

												$label = $key['label'];
												$jml_label = 0;


												$query_Si = "SELECT label, COUNT(label) jml FROM `tbl_kasus` WHERE $attr = '$val[attr]' $addKondisi GROUP BY label";
												$sql_Si = $db->query($query_Si);
												while ($isi = $db->fetch_assoc($sql_Si)) {	

													if ($key['label']==$isi['label']) {
														$jml_label = $isi['jml'];
													}

												}

												$Si[] = array(
													'label'=>$label,
													'jml' => (int)$jml_label
												);

												$S_atr += $jml_label;
											}

											// =======================================================

											$entrophy = 0;
											foreach ($Si as $key) {
												if ($S_atr == 0) {
													$entrophy += 0;
												}else{
													if ($key['jml'] == 0) {
														$entrophy += 0;
													} else {
														$entrophy += (-($key['jml'])/$S_atr)*log($key['jml']/$S_atr,2); //Rumus ENTROPHY
													}
												}
											}

											// ========================================================

											$valAttr[] = array(
												'value_attr' => $val['attr'],
												'entrophy_attr' => $entrophy,
												'label_attr' => $Si
											);

											// =======================================================

											$gain_att += (($S_atr/$S_tot)*$entrophy); //Rumus GAIN

											if ($S_atr == 0) {
												$split_info += 0;
											}else{
												$split_info += (-($S_atr/$S_tot)*log($S_atr/$S_tot,2));
											}
										}

										$gainAtt = $entrop_tot - $gain_att; //Rumus GAIN

										$gainRatio = $gainAtt/$split_info; //Rumus Gain Ratio

										$dataAttr[] = array(
											'atribut' => $attr,
											'gain' => $gainAtt,
											'gain_ratio' => $gainRatio,
											'valAttr' => $valAttr
										);
									}
								}

								// ===========================================================

								foreach ($dataAttr as $key => $dt) {
									echo '====================<br>';
									echo strtoupper($dt['atribut']).'<br>';
									echo '====================<br>';

									foreach ($dt['valAttr'] as $val) {
										echo $val['value_attr'].'<br>';

										foreach ($val['label_attr'] as $lbl) {
											echo "- $lbl[label]: $lbl[jml] <br>";
										}

										echo 'Entrophy: '.format_decimal($val['entrophy_attr']).'<br>-----------------<br>';
									}

									echo 'Gain: '.format_decimal($dt['gain']).'<br>';
									echo 'Gain Ratio: '.format_decimal($dt['gain_ratio']).'<br><br>';
								}

								// GAIN RATIO TERTINGGI ===============================
								$lengthArr = count($dataAttr);
								$maxGain = 0;
								$keyArr = 0;
								foreach ($dataAttr as $key => $dt) {

									$x = $key+1;
									// echo "<br>Gain $x: $dt[gain]";

									if ($maxGain <=  $dt['gain_ratio']) {
										$maxGain = $dt['gain_ratio'];
										$keyArr = $key;
									}
										
									// echo "<br>$maxGain<br>";

								}

								$attrPilih = $dataAttr[$keyArr]['atribut'];
								echo '<br>Gain Ratio tertinggi: '.format_decimal($dataAttr[$keyArr]['gain_ratio']);
								echo '<br>Atribut terpilih: '.$attrPilih.'<br>';
								// echo '<br>Key array: '.$keyArr.'<br>';

								$keyEntrop = array();
								$pilihEntrop = 0;
								$valAtrib = $dataAttr[$keyArr]['valAttr'];
								// echo '<pre>';print_r($valAtrib);exit();
								$end = FALSE;
								for ($i=0; $i < count($valAtrib); $i++) { 

									$val_attr = $valAtrib[$i]['value_attr'];
									if ($kondisi != '') {
										$cond = "$kondisi AND $attrPilih = $val_attr";
									}else{
										$cond = "$attrPilih = $val_attr";
									}

									if ($kondx != '') {
										$condx = "$kondx AND $attrPilih = '$val_attr'";
									}else{
										$condx = "$attrPilih = '$val_attr'";
									}

									$ent = $valAtrib[$i]['entrophy_attr'];

									if ($ent == 0 || $ent == null) {
										$label_attr = $valAtrib[$i]['label_attr'];
										$jml_lbl = count($label_attr);
										$maxLabel = 0;
										$keyLbl = 0;
										foreach ($label_attr as $key => $lb) {

											// Cari label terbanyak
											if ($maxLabel <=  $lb['jml']) {
												$maxLabel = $lb['jml'];
												$keyLbl = $key;
											}

										}

										if ($maxLabel != 0) {
											$labelPilih = $label_attr[$keyLbl]['label'];

											$query_tree = "INSERT INTO tbl_keputusan (kondisi, label) VALUES ('$cond', '$labelPilih')";
											$db->query($query_tree); //INSERT INTO tbl_keputusan
										}					

										$end = TRUE;
										
									}
									else{

										if ($cabang != '') {
											$cb = "$cabang AND $attrPilih = '$val_attr'";
										}else{
											$cb = "$attrPilih = '$val_attr'";
										}

										if ($pangkas != '') {
											$pk = "$pangkas,$attrPilih";
										}else{
											$pk = "$attrPilih";
										}
										// echo $kondisi.'<br>';
										cabangPohon($db, $condx, $cond, $cb, $pk);

										// $end = FALSE;
									}
								}

								return $end;

							}

						?>


                    </div>
                </div>

            </div>

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            

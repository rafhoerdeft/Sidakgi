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
                    <h3 class="text-themecolor">Diagnosa Pasien</h3>
                </div>

                <div class="col-md-6 align-self-center">
                    <ol class="breadcrumb">
                        <!-- <label>Jenis Perlengkapan</label> -->
                        <!-- <li class="breadcrumb-item"><a href="" class="text-danger">Data User</a></li> -->
                        <li class="breadcrumb-item active">Diagnosa Pasien</li>
                    </ol>
                </div>
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

                <div class="ribbon-wrapper card">
                    <div class="ribbon ribbon-danger">Jenis Gigi :</div>
                    <div class="ribbon-content">
                        <!-- <p>Ini contoh gambar jenis gigi untuk mempermudah Anda dalam menentukan gigi mana yang sakit ^_^</p> -->
                        <div class="row">
                            <div class="col-md-4">
                                <img src="../assets/assets/images/jenis-gigi/jenis-gigi.jpg" width="100%">
                            </div>
                            <div class="col-md-2 m-t-10 text-center">
                                <img src="../assets/assets/images/jenis-gigi/gigi-1.png" width="100%">
                                <label>Gigi 1</label>
                            </div>
                            <div class="col-md-2 m-t-10 text-center">
                                <img src="../assets/assets/images/jenis-gigi/gigi-1.png" width="100%">
                                <label>Gigi 2</label>
                            </div>
                            <div class="col-md-2 m-t-10 text-center">
                                <img src="../assets/assets/images/jenis-gigi/gigi-1.png" width="100%">
                                <label>Gigi 3</label>
                            </div>
                            <div class="col-md-2 m-t-10 text-center">
                                <img src="../assets/assets/images/jenis-gigi/gigi-1.png" width="100%">
                                <label>Gigi 4</label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body p-b-20">
                        <!-- <h4 class="card-title">Step wizard</h4> -->
                        <!-- <h6 class="card-subtitle">You can find the <a href="http://www.jquery-steps.com" target="_blank">offical website</a></h6> -->
                        <form action="proses_diagnosa.php" method="POST">

                            <div class="form-group">
                                <label for="jk_pasien" class="control-label">Jenis Gigi : *</label>
                                <div class="controls">
                                    <select required name="jenis_gigi" class="select2 form-control required" style="width: 100%; height:36px;">
                                        <option selected value="" disabled style="color: #d6d6d6">Pilih jenis gigi</option>
                                        <?php  
                                            $query_gigi = "SELECT * FROM tbl_jenis_gigi"; //Jenis Gigi
                                            $sql_gigi = $db->query($query_gigi);
                                            
                                            while ($val = $db->fetch_assoc($sql_gigi)) {
                                        ?>
                                                <option value="<?= $val['id_jenis_gigi'] ?>"><?= $val['jenis_gigi'] ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                            <hr>
                            <label for="jk_pasien" class="control-label">Gejala yang dialami : *</label>
                            <div class="row">
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
                                        <div class="form-group col-md-6">
                                            <!-- <label for="jk_pasien" class="control-label"><?= ucfirst($attr) ?> : *</label> -->
                                            <div class="controls">
                                                <select required name="<?= $attr ?>" class="form-control required" style="width: 100%; height:36px;">
                                                    <option selected value="" disabled style="color: #d6d6d6">Pilih gejala <?= $attr ?></option>
                                                    <?php  
                                                        $query_isi = "SELECT $attr as attr FROM `tbl_kasus` GROUP BY $attr"; //ISI ATRIBUT
                                                        $sql_isi = $db->query($query_isi);
                                                        
                                                        while ($val = $db->fetch_assoc($sql_isi)) {
                                                    ?>
                                                            <option value="<?= $val['attr'] ?>"><?= $val['attr'] ?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                <?php } ?>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-8"></div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-6 m-b-5">
                                            <button type="reset" class="btn btn-danger btn-block waves-effect waves-light" id="simpan_pasien"><i class="fa fa-undo"></i> Reset</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-info btn-block waves-effect waves-light" id="simpan_pasien"><i class="fa fa-check"></i> Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>                            

                        </form>

                    </div>
                </div>

            </div>

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->


        <!-- HAPUS USER ================================= -->
        <script type="text/javascript">
            function showConfirmMessage(id) {
                swal({
                    title: "Anda yakin data akan dihapus?",
                    text: "Data tidak akan dapat di kembalikan lagi!!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya, Hapus!",
                    closeOnConfirm: false
                }, function () {
                    $.ajax({
                        type : "POST",
                        url  : "proses_hapus_rekam.php",
                        dataType : "html",
                        data : {id:id},
                        success: function(data){

                            if(data=='Success'){
                                // location.reload();
                                window.location.replace("index.php?x=data_rekam&&nav=rekam&&alt=1");
                            }else{
                                window.location.replace("index.php?x=data_rekam&&nav=rekam&&alt=1");
                            } 
                        }
                    });
                    return false;
                    // swal("Hapus!", "Data telah berhasil dihapus.", "success");
                });
            }
        </script>
            
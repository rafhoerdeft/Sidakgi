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
                    <h3 class="text-themecolor">Diagnosa Pasien Baru</h3>
                </div>

                <div class="col-md-6 align-self-center">
                    <ol class="breadcrumb">
                        <!-- <label>Jenis Perlengkapan</label> -->
                        <!-- <li class="breadcrumb-item"><a href="" class="text-danger">Data User</a></li> -->
                        <li class="breadcrumb-item active">Diagnosa Pasien Baru</li>
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


                <div class="card">
                    <div class="card-body wizard-content p-b-20">
                        <!-- <h4 class="card-title">Step wizard</h4> -->
                        <!-- <h6 class="card-subtitle">You can find the <a href="http://www.jquery-steps.com" target="_blank">offical website</a></h6> -->
                        <form action="proses_pasien_baru.php" method="POST" class="valid-wizard wizard-circle">
                            <!-- Step 1 -->
                            <h6>Input Data Pasien</h6>
                            <section>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="nama_pasien" class="control-label">Nama Pasien : *</label>
                                        <div class="controls">
                                            <input type="text" class="form-control required" name="nama_pasien" id="nama_pasien" placeholder="Isi nama pasien">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="jk_pasien" class="control-label">Jenis Kelamin : *</label>
                                        <div class="controls">
                                            <select  id="jk_pasien" name="jk_pasien" class="form-control required" style="width: 100%; height:36px;">
                                                <option selected value="" disabled style="color: #d6d6d6">Pilih jenis kelamin</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat_pasien" class="control-label">Alamat : *</label>
                                        <div class="controls">
                                            <textarea required class="form-control required" id="alamat_pasien" name="alamat_pasien"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="no_hp_pasien" class="control-label">Nomor HP : *</label><br>
                                        <div class="controls">
                                            <input  type="text"  onkeypress="return inputAngka(event);" class="form-control required" name="no_hp_pasien" id="no_hp_pasien">
                                        </div>
                                    </div>

                                </div>
                            </section>

                            <!-- Step 2 -->
                            <h6>Gejala Pasien</h6>
                            <section>
                                
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
                                        <div class="form-group">
                                            <label for="jk_pasien" class="control-label"><?= ucfirst($attr) ?> : *</label>
                                            <div class="controls">
                                                <select name="<?= $attr ?>" class="form-control required" style="width: 100%; height:36px;">
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

                            </section>
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
            
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
                    <h3 class="text-themecolor">Data Profil Pasien</h3>
                </div>

                <div class="col-md-6 align-self-center">
                    <ol class="breadcrumb">
                        <!-- <label>Jenis Perlengkapan</label> -->
                        <!-- <li class="breadcrumb-item"><a href="" class="text-danger">Data User</a></li> -->
                        <li class="breadcrumb-item active">Data Profil Pasien</li>
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
                    <div class="card-body p-b-20">
                        <!-- <h4 class="card-title">Step wizard</h4> -->
                        <!-- <h6 class="card-subtitle">You can find the <a href="http://www.jquery-steps.com" target="_blank">offical website</a></h6> -->
                        <form action="proses_update_profil.php" method="POST">
                            <div class="modal-body">

                                <?php  
                                    $id_pasien = $_SESSION['id_pasien'];
                                    $query_pasien = "SELECT * FROM tbl_pasien WHERE id_pasien = '$id_pasien'"; //Pasien
                                    $sql_pasien = $db->query($query_pasien);
                                    
                                    while ($val = $db->fetch_assoc($sql_pasien)) {
                                ?>

                                    <input type="hidden" name="id_pasien" value="<?= $val['id_pasien'] ?>">

                                    <div class="form-group">
                                        <label for="nama_pasien" class="control-label">Nama Pasien : *</label>
                                        <div class="controls">
                                            <input required type="text" class="form-control" name="nama_pasien" id="nama_pasien" placeholder="Isi nama pasien" value="<?= $val['nama_pasien'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="jk_pasien" class="control-label">Jenis Kelamin : *</label>
                                        <div class="controls">
                                            <select required id="jk_pasien" name="jk_pasien" class="form-control" style="width: 100%; height:36px;">
                                                <option selected value="" disabled style="color: #d6d6d6">Pilih jenis kelamin</option>
                                                <option value="Laki-Laki" <?= $val['jk_pasien']=='Laki-Laki'?'selected':'' ?>> Laki-Laki </option>
                                                <option value="Perempuan" <?= $val['jk_pasien']=='Perempuan'?'selected':'' ?>> Perempuan </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat_pasien" class="control-label">Alamat : *</label>
                                        <div class="controls">
                                            <textarea required class="form-control" id="alamat_pasien" name="alamat_pasien"><?= $val['alamat_pasien'] ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="no_hp_pasien" class="control-label">Nomor HP : *</label><br>
                                        <div class="controls">
                                            <input required type="text" maxlength="13" onkeypress="return inputAngka(event);" class="form-control" name="no_hp_pasien" id="no_hp_pasien" value="<?= $val['no_hp_pasien'] ?>">
                                        </div>
                                    </div>

                                <?php } ?>

                            </div>

                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> -->
                                <button type="submit" class="btn btn-info waves-effect waves-light" id="simpan_akun"><i class="fa fa-save"></i> Simpan</button>
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
            
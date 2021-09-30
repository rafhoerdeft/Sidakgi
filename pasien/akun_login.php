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
                <div class="col-md-8 align-self-center">
                    <h3 class="text-themecolor">Akun Login</h3>
                </div>
                <div class="col-md-4">
                </div>
                

                <!-- <div>
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div> -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
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
                        <form id="simpanAkun" method="POST" action="proses_update_akun.php">
                            <div class="modal-body">

                                <?php  
                                    $id_pasien = $_SESSION['id_pasien'];
                                    $query_pasien = "SELECT * FROM tbl_pasien WHERE id_pasien = '$id_pasien'"; //Pasien
                                    $sql_pasien = $db->query($query_pasien);
                                    
                                    while ($val = $db->fetch_assoc($sql_pasien)) {
                                ?>
                                    <input type="hidden" name="id_pasien" value="<?= $val['id_pasien'] ?>">

                                    <div class="form-group">
                                        <label for="username" class="control-label">Username :</label>
                                        <div class="controls">
                                            <input required type="text" class="form-control" name="username" id="username" placeholder="Isi username untuk login" value="<?= $val['username'] ?>">
                                        </div>
                                    </div>

                                <?php } ?>

                                <div class="form-group">
                                    <label for="oldPass" class="control-label">Password Lama:</label>
                                    <div class="controls">
                                        <input required type="password" class="form-control" name="oldPass" id="oldPass" placeholder="Isi password lama">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="newPass" class="control-label">Password Baru:</label>
                                    <div class="controls">
                                        <input required type="password" id="newPass" onkeyup="newPasss(this)" class="form-control" name="password" placeholder="Isi password baru">
                                    </div>
                                </div>

                                <div id="form-validate" class="form-group">
                                    <label for="rePass" class="control-label">Ulangi Password :</label>
                                    <div class="controls">
                                        <input required type="password" onkeyup="rePasss(this)" class="form-control" name="rePass" id="rePass" placeholder="Ulangi password baru">
                                        <div class="help-block"></div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> -->
                                <button disabled type="submit" class="btn btn-info waves-effect waves-light" id="simpan_akun"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

            <script type="text/javascript">
                function newPasss(data) {
                    var newPass = $(data).val();
                    var rePass = $('#rePass').val();

                    if (newPass == rePass) {
                        if(newPass == '' || newPass == null){
                            if (rePass == '' || rePass == null) {
                                $('#form-validate').removeClass('error');
                                $('#form-validate').removeClass('validate');
                                $('#simpan_akun').attr('disabled',true);
                                $('.help-block').html('');
                            } else {
                                $('#form-validate').addClass('validate');
                                $('#form-validate').removeClass('error');
                                $('#simpan_akun').attr('disabled',false);
                                $('.help-block').html('');
                            }
                        } else {
                            $('#form-validate').addClass('validate');
                            $('#form-validate').removeClass('error');
                            $('#simpan_akun').attr('disabled',false);
                            $('.help-block').html('');
                        }
                    } else {
                        if(newPass == '' || newPass == null || rePass == '' || rePass == null){
                            $('#form-validate').removeClass('error');
                            $('#form-validate').removeClass('validate');
                            $('#simpan_akun').attr('disabled',true);
                            $('.help-block').html('');
                        } else {
                            $('#form-validate').removeClass('validate');
                            $('#form-validate').addClass('error');
                            $('#simpan_akun').attr('disabled',true);
                            $('.help-block').html('<ul role="alert"><li>Password tidak cocok</li></ul>');
                        }
                    }
                }

                function rePasss(data) {
                    var rePass = $(data).val();
                    var newPass = $('#newPass').val();

                    if (newPass == rePass) {
                        if(newPass == '' || newPass == null){
                            if (rePass == '' || rePass == null) {
                                $('#form-validate').removeClass('error');
                                $('#form-validate').removeClass('validate');
                                $('#simpan_akun').attr('disabled',true);
                                $('.help-block').html('');
                            } else {
                                $('#form-validate').addClass('validate');
                                $('#form-validate').removeClass('error');
                                $('#simpan_akun').attr('disabled',false);
                                $('.help-block').html('');
                            }
                        } else {
                            $('#form-validate').addClass('validate');
                            $('#form-validate').removeClass('error');
                            $('#simpan_akun').attr('disabled',false);
                            $('.help-block').html('');
                        }
                    } else {
                        if(newPass == '' || newPass == null || rePass == '' || rePass == null){
                            $('#form-validate').removeClass('error');
                            $('#form-validate').removeClass('validate');
                            $('#simpan_akun').attr('disabled',true);
                            $('.help-block').html('');
                        } else {
                            $('#form-validate').removeClass('validate');
                            $('#form-validate').addClass('error');
                            $('#simpan_akun').attr('disabled',true);
                            $('.help-block').html('<ul role="alert"><li>Password tidak cocok</li></ul>');
                        }
                    }
                }

            </script>




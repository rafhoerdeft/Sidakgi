<?php  
    session_start();
    if (!isset($_GET['alt'])) {
        unset($_SESSION['alert']);
    }
    session_destroy();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/assets/images/logo/logo_dental_sm.png">
    <title>SiDakgi</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--alerts CSS -->
    <link href="assets/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="assets/main/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="assets/main/css/colors/yellow.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(assets/assets/images/background/sidakgi.jpg);">
        <div class="login-box card">
            <div class="card-body">
                <br>
                <form class="form-horizontal form-material" id="loginform">
                    <a href="javascript:void(0)" class="text-center db">
                        <img width="100" src="assets/assets/images/logo/logo_dental.png" alt="Home" /><br/>
                        <label style="font-size: 25pt; color: grey"><b>SiDakgi</b></label><br>
                        <label style="font-size: 15pt; color: grey">Aplikasi Diagnosa Karies Gigi</label><br>
                        <!-- <label>(Login Pasien)</label> -->
                    </a>
                    <?= (isset($_SESSION['alert'])?$_SESSION['alert']:'') ?>
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="username" id="username" required="" placeholder="Username" style="text-align: center;">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" id="password" required="" placeholder="Password" style="text-align: center;">
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                    <!-- <label class="text-center">Belum memiliki akun? Silahkan register dahulu!</label> -->
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-inverse btn-lg btn-block text-uppercase waves-effect waves-light" onclick="showModalRegister()" type="button">Register</button>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                            <div class="social"><a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a> <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a> </div>
                        </div>
                    </div> -->
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Anda Admin? <a href="auth_admin.php" class="text-primary m-l-5"><b>Login disini</b></a></p>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>

    <!-- Modal Register -->
    <div id="modal-register" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Register Pasien Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form id="registerPasien" method="POST" action="proses_register_pasien.php">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="nama_pasien" class="control-label">Nama Pasien : *</label>
                            <div class="controls">
                                <input type="text" required class="form-control required" name="nama_pasien" id="nama_pasien" placeholder="Isi nama pasien">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jk_pasien" class="control-label">Jenis Kelamin : *</label>
                            <div class="controls">
                                <select required id="jk_pasien" name="jk_pasien" class="form-control required" style="width: 100%; height:36px;">
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

                        <div class="form-group">
                            <label for="username" class="control-label">Username : *</label>
                            <div class="controls">
                                <input type="text" required class="form-control required" name="username" id="username" placeholder="Isi username untuk login">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="control-label">Password : *</label>
                            <div class="controls">
                                <input type="password" required class="form-control required" name="password" id="password" placeholder="Isi password untuk login">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light" id="simpan_user"><i class="fa fa-user"></i> Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="assets/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/main/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="assets/main/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="assets/main/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="assets/main/js/custom.min.js"></script>
    <!-- Sweet-Alert  -->
    <script src="assets/assets/plugins/sweetalert/sweetalert.min.js"></script>
    <!-- <script src="assets/assets/plugins/sweetalert/jquery.sweet-alert.custom.js"></script> -->

    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <script type="text/javascript">
        $('#loginform').submit(function(){
            // e.preventDefault();
            var username = $('#username').val();
            var password = $('#password').val();
            // alert(password);
            // $('#coba').html(sabar);
            // $('.page-loader-wrapper2').show();
            if (username != '' && password != '') {
                $.ajax({
                    type : "POST",
                    url  : "proses_login_pasien.php",
                    // beforeSend: $('.page-loader-wrapper').show(),
                    dataType : "html",
                    data : {username:username , password:password},
                    success: function(data){
                        // alert(data);
                        if(data=='Pasien'){   
                            window.location = "pasien/index.php?x=diagnosa&&nav=diagnosa";
                        }else {
                            // showFailedMessage('Username atau Password Salah!');
                            swal({
                                title: "Gagal!",
                                text: 'Username atau Password Salah!',
                                type: "error",
                                timer: 1000,
                                showConfirmButton: false
                            });
                        }
                    }
                });
                return false;
            }        
        });
    </script>

    <script type="text/javascript">
        function inputAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            // alert(charCode);
            if (charCode > 31 && (charCode < 46 || charCode > 57))

            return false;
            return true;
        }
    </script>

    <script type="text/javascript">
        function showModalRegister(argument) {
            $('#modal-register').modal('show');
        }
    </script>    
   
</body>

</html>

<?php  
    session_start();
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
    <section id="wrapper" class="login-register" style="background-image:url(assets/assets/images/background/sidakgi.jpg);">
        <div class="login-box card">
            <div class="card-body">
                <br>
                <form class="form-horizontal form-material" id="loginform">
                    <a href="javascript:void(0)" class="text-center db">
                        <img width="100" src="assets/assets/images/logo/logo_dental.png" alt="Home" /><br/>
                        <label style="font-size: 25pt; color: grey"><b>SiDakgi</b></label><br>
                        <label style="font-size: 15pt; color: grey">Aplikasi Diagnosa Karies Gigi</label><br>
                        <label class="text-danger">(Login Admin)</label>
                    </a>
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
                    <!-- <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Remember me </label>
                            </div>
                            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
                    </div> -->
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-danger btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                    
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <a href="index.php" class="text-primary text-bold"><i class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
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
                    url  : "proses_login_admin.php",
                    // beforeSend: $('.page-loader-wrapper').show(),
                    dataType : "html",
                    data : {username:username , password:password},
                    success: function(data){
                        // alert(data);
                        if(data=='Dokter'){   
                            window.location = "dokter/index.php?x=dashboard&&nav=dashboard";
                        }else if(data=='Admin'){
                             window.location = "admin/index.php?x=dashboard&&nav=dashboard";
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

    

    <!-- Fungsi Dialog -->
    <script type="text/javascript">
        //These codes takes from http://t4t5.github.io/sweetalert/
        function showBasicMessage() {
            swal("Here's a message!");
        }

        function showWithTitleMessage() {
            swal("Here's a message!", "It's pretty, isn't it?");
        }

        function validasiMessage(){
            swal({
                title: "Dilarang!",
                text: "Data tidak boleh lebih dari jumlah permintaan!",
                type: "error",
                timer: 1000,
                showConfirmButton: false
            });
        }

        function showSuccessMessage(input) {
            swal({
                title: input+"!",
                text: "Data Berhasil "+input+"!",
                type: "success",
                timer: 1000,
                showConfirmButton: false
            });
        }

        function showFailedMessage(input) {
            swal({
                title: "Gagal!",
                text: input,
                type: "error",
                timer: 1000,
                showConfirmButton: false
            });
        }

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
                    type : "GET",
                    url  : "<?php echo base_url('Damkar/deleteUnit')?>",
                    dataType : "html",
                    data : {id:id},
                    success: function(data){
                        // alert(data);

                        $('#tbl-unit').DataTable().destroy();
                        showUnit();
                        $('#tbl-unit').DataTable().draw();
                        // kode_otomatis();
                        // $('#editModal #pilihBrg').attr('selected','');
                        // $('#editModal').modal('hide');

                        if(data=='Success'){
                            showSuccessMessage('Dihapus');
                        }else{
                            showFailedMessage('Dihapus');
                        } 
                    }
                });
                return false;
                // swal("Hapus!", "Data telah berhasil dihapus.", "success");
            });
        }

        function showCancelMessage() {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        }
    </script>

   
</body>

</html>

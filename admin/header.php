<?php 
    include "../config/database.php"; 
    $db = new database();
    
    session_start();

    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] != 'admin') {
            header('Location: ../auth_admin.php');
        }
    } else {
        header('Location: ../auth_admin.php');
    }

    if (!isset($_GET['alt'])) {
        unset($_SESSION['alert']);
    }
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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/assets/images/logo/logo_dental_sm.png">
    <title>SiDakgi</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="../assets/assets/plugins/wizard/steps.css" rel="stylesheet">

    <link href="../assets/assets/plugins/select2/dist/css/select2.css" rel="stylesheet">
    <link href="../assets/assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
    <link href="../assets/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/main/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="../assets/main/css/colors/default.css" id="theme" rel="stylesheet">

    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
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
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="javascript:void(0)">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img width="45" src="../assets/assets/images/logo/logo_dental_sm.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <!-- <img src="<?//= base_url() ?>assets/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" /> -->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                            <label style="font-size: 18pt; color: grey"><b style="font-weight: bold; color:  grey">SiDakgi</b></label>
                        </span> 
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">

                        
                        <li><a href="../index.php" class="nav-link text-white waves-effect waves-dark" data-toggle="tooltip" data-placement="left" title="Logout"><i class="mdi mdi-power" style="font-size: 18pt"></i></a></li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
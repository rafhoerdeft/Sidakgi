
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                   <!--  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol> -->
                </div>
                <div>
                    <!-- <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button> -->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->

                <div class="card-group">

                    <div class="card card-inverse card-info m-1">
                        <a href="index.php?x=data_pasien&&nav=pasien">
                            <div class="card-body">
                                <div class="d-flex" style="margin-top: -10px; margin-bottom: -20px">
                                    <div class="m-r-20 align-self-center">
                                        <label style="font-size: 45pt;"><i class="mdi mdi-account-circle text-white"></i></label>
                                    </div>
                                    <div style="margin-top: 14px">
                                        <h3 class="card-title">
                                            <?php  
                                                $query ="SELECT id_pasien FROM tbl_pasien";
                                                $result = $db->query($query);
                                                $jmlPasien = $db->num_rows($result);

                                                echo $jmlPasien;
                                            ?>
                                        </h3>
                                        <h5 class="card-subtitle text-white">Jumlah Pasien Terdaftar</h5></div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="card card-inverse card-warning m-1">
                        <a href="index.php?x=data_rekam&&nav=rekam">
                            <div class="card-body">
                                <div class="d-flex" style="margin-top: -10px; margin-bottom: -20px">
                                    <div class="m-r-20 align-self-center">
                                        <label style="font-size: 45pt;"><i class="mdi mdi-medical-bag text-white"></i></label>
                                    </div>
                                    <div style="margin-top: 14px">
                                        <h3 class="card-title">
                                            <?php  
                                                $query ="SELECT id_rm FROM tbl_rekam_medik";
                                                $result = $db->query($query);
                                                $jmlRekam = $db->num_rows($result);

                                                echo $jmlRekam;
                                            ?>
                                        </h3>
                                        <h5 class="card-subtitle text-white">Jumlah Rekam Medik Pasien</h5></div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

                <!-- ==================================================================== -->

                <div class="card-group">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex" style="margin-top: -10px; margin-bottom: -20px">
                                <div class="m-r-10 align-self-center">
                                    <label style="font-size: 27pt;"><i class="mdi mdi-login-variant text-inverse"></i></label>
                                </div>
                                <div style="margin-top: 5px">
                                    <h3 class="card-title">
                                        <?php  
                                            $query ="SELECT id_rm FROM tbl_rekam_medik WHERE date(tgl_periksa) = date(now())";
                                            $result = $db->query($query);
                                            $harian = $db->num_rows($result);

                                            echo $harian;
                                        ?>
                                    </h3>
                                    <h5 class="card-subtitle" style="font-size: 12pt; margin-top: -15px">Pasien Hari Ini</h5></div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex" style="margin-top: -10px; margin-bottom: -20px">
                                <div class="m-r-10 align-self-center">
                                    <label style="font-size: 27pt;"><i class="mdi mdi-login-variant text-success"></i></label>
                                </div>
                                <div style="margin-top: 5px">
                                    <h3 class="card-title">
                                        <?php  
                                                $query ="SELECT id_rm FROM tbl_rekam_medik WHERE YEARWEEK(tgl_periksa) = YEARWEEK(NOW())";
                                                $result = $db->query($query);
                                                $mingguan = $db->num_rows($result);

                                                echo $mingguan;
                                            ?>
                                    </h3>
                                    <h5 class="card-subtitle" style="font-size: 12pt; margin-top: -15px">Pasien Minggu Ini</h5></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex" style="margin-top: -10px; margin-bottom: -20px">
                                <div class="m-r-10 align-self-center">
                                    <label style="font-size: 27pt;"><i class="mdi mdi-login-variant text-danger"></i></label>
                                </div>
                                <div style="margin-top: 5px">
                                    <h3 class="card-title">
                                        <?php  
                                                $query ="SELECT id_rm FROM tbl_rekam_medik WHERE MONTH(tgl_periksa) = MONTH(now())";
                                                $result = $db->query($query);
                                                $bulanan = $db->num_rows($result);

                                                echo $bulanan;
                                            ?>
                                    </h3>
                                    <h5 class="card-subtitle" style="font-size: 12pt; margin-top: -15px">Pasien Bulan Ini</h5></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex" style="margin-top: -10px; margin-bottom: -20px">
                                <div class="m-r-10 align-self-center">
                                    <label style="font-size: 27pt;"><i class="mdi mdi-login-variant text-warning"></i></label>
                                </div>
                                <div style="margin-top: 5px">
                                    <h3 class="card-title">
                                        <?php  
                                                $query ="SELECT id_rm FROM tbl_rekam_medik WHERE YEAR(tgl_periksa) = YEAR(now())";
                                                $result = $db->query($query);
                                                $tahunan = $db->num_rows($result);

                                                echo $tahunan;
                                            ?>
                                    </h3>
                                    <h5 class="card-subtitle" style="font-size: 12pt; margin-top: -15px">Pasien Tahun Ini</h5></div>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
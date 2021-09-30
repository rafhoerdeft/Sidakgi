
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <?php  
                        // $username = $_SESSION['username'];
                        $namaUser = $_SESSION['nama_user'];
                        $first = substr($namaUser, 0, 1);
                        $label = strtoupper($first);
                    ?>
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="../assets/assets/images/icon-profil/<?=$label?>.jpg" alt="user" />

                    </div>
                    <!-- User profile text-->
                    <div class="profile-text">
                        <h5><?= ucfirst($namaUser) ?></h5>
                        <!-- <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="fa fa-spin fa-gear"></i></a> -->

                        <!-- <a href="../index.php" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> -->
                        <!-- <div class="dropdown-menu animated flipInY">
                            <a href="index.php?x=profil" class="dropdown-item"><i class="ti-user"></i> Profil</a>
                            <a href="index.php?x=akunLogin" class="dropdown-item"><i class="ti-lock"></i> Akun Login</a>
                        </div> -->
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap">MENU</li>
                        <li class="<?= ($get_nav == 'dashboard'?'active':'') ?>"> 
                            <a class="waves-effect <?= ($get_nav == 'dashboard'?'active':'') ?>" href="index.php?x=dashboard&&nav=dashboard" aria-expanded="false">
                                <i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <li> 
                            <a class="has-arrow waves-effect" href="#" aria-expanded="false">
                                <i class="fa fa-gears"></i>
                                <span class="hide-menu">Data Mining
                                </span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a class="<?= ($get_nav == 'kasus'?'active':'') ?>" href="index.php?x=data_kasus&&nav=kasus">
                                        Data Kasus
                                    </a>
                                </li>

                                <li>
                                    <a class="<?= ($get_nav == 'mining'?'active':'') ?>" href="index.php?x=proses_mining&&nav=mining">
                                        Proses C.45 
                                    </a>
                                </li>

                                <li>
                                    <a class="<?= ($get_nav == 'keputusan'?'active':'') ?>" href="index.php?x=pohon_keputusan&&nav=keputusan">
                                        Pohon Keputusan 
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- <li> 
                            <a class="has-arrow waves-effect" href="#" aria-expanded="false">
                                <i class="mdi mdi-stethoscope"></i>
                                <span class="hide-menu">Diagnosa
                                </span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a class="<?= ($get_nav == 'baru'?'active':'') ?>" href="index.php?x=pasien_baru&&nav=baru">
                                        Pasien Baru
                                    </a>
                                </li>

                                <li>
                                    <a class="<?= ($get_nav == 'terdaftar'?'active':'') ?>" href="index.php?x=pasien_terdaftar&&nav=terdaftar">
                                        Pasien Terdaftar 
                                    </a>
                                </li>

                            </ul>
                        </li> -->

                        <li class="<?= ($get_nav == 'gigi'?'active':'') ?>"> 
                            <a class="waves-effect <?= ($get_nav == 'gigi'?'active':'') ?>" href="index.php?x=data_gigi&&nav=gigi" aria-expanded="false">
                                <i class="mdi mdi-tooth"></i>
                                <span class="hide-menu">Jenis Gigi</span>
                            </a>
                        </li>

                        <li class="<?= ($get_nav == 'pasien'?'active':'') ?>"> 
                            <a class="waves-effect <?= ($get_nav == 'pasien'?'active':'') ?>" href="index.php?x=data_pasien&&nav=pasien" aria-expanded="false">
                                <i class="mdi mdi-account-box"></i>
                                <span class="hide-menu">Data Pasien</span>
                            </a>
                        </li>

                        <li class="<?= ($get_nav == 'rekam'?'active':'') ?>"> 
                            <a class="waves-effect <?= ($get_nav == 'rekam'?'active':'') ?>" href="index.php?x=data_rekam&&nav=rekam" aria-expanded="false">
                                <i class="mdi mdi-medical-bag"></i>
                                <span class="hide-menu">Rekam Medik</span>
                            </a>
                        </li>    
                        
                        <li class="<?= ($get_nav == 'user'?'active':'') ?>"> 
                            <a class="waves-effect <?= ($get_nav == 'user'?'active':'') ?>" href="index.php?x=data_user&&nav=user" aria-expanded="false">
                                <i class="mdi mdi-account-box"></i>
                                <span class="hide-menu">Data Admin</span>
                            </a>
                        </li>
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
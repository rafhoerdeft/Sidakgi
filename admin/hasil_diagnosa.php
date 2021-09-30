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
                    <h3 class="text-themecolor">Hasil Diagnosa</h3>
                </div>

                <div class="col-md-6 align-self-center">
                    <ol class="breadcrumb">
                        <!-- <label>Jenis Perlengkapan</label> -->
                        <?php  
                            if ($_GET['nav'] == 'baru') { 
                        ?>
                                <li class="breadcrumb-item"><a href="index.php?x=pasien_baru&&nav=baru" class="text-danger">Diagnosa Pasien Baru</a></li>
                        <?php } else { ?>
                                <li class="breadcrumb-item"><a href="index.php?x=pasien_terdaftar&&nav=terdaftar" class="text-danger">Diagnosa Pasien Terdaftar</a></li>
                        <?php } ?>
                        <li class="breadcrumb-item active">Hasil Diagnosa</li>
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


                <!-- <div class="card"> -->
                    <!-- <div class="card-body p-b-20"> -->


                        
                        <?php  
                            $sql = "SELECT * FROM tbl_pasien ps, tbl_rekam_medik rm WHERE ps.id_pasien = rm.id_pasien ORDER BY rm.id_rm DESC limit 1"; 
                            $result = $db->query($sql);
                            while ($row = $db->fetch_assoc($result)) { 
                        ?>         
                                <div class="ribbon-wrapper card">
                                    <div class="ribbon ribbon-danger">Data Pasien :</div>
                                    <table class="ribbon-content" border="0" cellpadding="10">
                                        <tr>
                                            <td width="150">
                                                Nama Pasien
                                            </td>
                                            <td  width="10"> : </td>
                                            <td>
                                                <span style="font-weight: bold;"><?= $row['nama_pasien'] ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="150">
                                                Jenis Kelamin
                                            </td>
                                            <td  width="10"> : </td>
                                            <td>
                                                <span style="font-weight: bold;"><?= $row['jk_pasien'] ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="150">
                                                Alamat
                                            </td>
                                            <td  width="10"> : </td>
                                            <td>
                                                <span style="font-weight: bold;"><?= $row['alamat_pasien'] ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="150">
                                                Nomor HP
                                            </td>
                                            <td  width="10"> : </td>
                                            <td>
                                                <span style="font-weight: bold;"><?= $row['no_hp_pasien'] ?></span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="ribbon-wrapper card">
                                    <div class="ribbon ribbon-danger">Gejala :</div>
                                    <table class="ribbon-content" border="0" cellpadding="10">
                                        <tr>
                                            <td width="150">
                                                Gigi
                                            </td>
                                            <td  width="10"> : </td>
                                            <td>
                                                <span style="font-weight: bold;"><?= $row['gigi'] ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="150">
                                                Gusi
                                            </td>
                                            <td  width="10"> : </td>
                                            <td>
                                                <span style="font-weight: bold;"><?= $row['gusi'] ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="150">
                                                Rasa Nyeri
                                            </td>
                                            <td  width="10"> : </td>
                                            <td>
                                                <span style="font-weight: bold;"><?= $row['nyeri'] ?></span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width="150">
                                                Rasa Ngilu
                                            </td>
                                            <td  width="10"> : </td>
                                            <td>
                                                <span style="font-weight: bold;"><?= $row['ngilu'] ?></span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="ribbon-wrapper card">
                                    <div class="ribbon ribbon-danger">Hasil :</div>
                                    <table class="ribbon-content" border="0" cellpadding="10">
                                        <tr>
                                            <td width="150">
                                                Diagnosa
                                            </td>
                                            <td width="10"> : </td>
                                            <td>
                                                <span style="font-weight: bold;"><?= $row['diagnosa'] ?></span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                

                        <?php } ?>
                    <!-- </div> -->
                <!-- </div> -->

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
            
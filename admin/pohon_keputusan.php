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
                    <h3 class="text-themecolor">Pohon Keputusan</h3>
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
                        <div class="row">
                            <div class="col-md-6"> </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <button type="button" onclick="showConfirmDelAll()" class="btn btn-block waves-effect waves-light btn-danger m-b-10"><i class="fa fa-trash-o"></i> Hapus Semua Data</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-striped table-hover" style="font-size: 11pt">
                                <thead>
                                    <tr>
                                        <th><b>#</b></th>
                                        <th><b>Kondisi</b></th>
                                        <th><b>Diagnosa</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 0;
                                        $query ="SELECT * FROM tbl_keputusan ORDER BY id_keputusan DESC";
                                        $sql_keputusan = $db->query($query);
                                        while($row = $db->fetch_assoc($sql_keputusan)){
                                            $no++;
                                    ?>
                                            <tr>
                                                <td align="center"><?= $no ?></td>
                                                <td><?= $row['kondisi'] ?></td>
                                                <td><?= $row['label'] ?></td>
                                            </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->


        <!-- HAPUS kasus ================================= -->
        <script type="text/javascript">

            function showConfirmDelAll() {
                swal({
                    title: "Anda yakin semua data akan dihapus?",
                    text: "Data tidak akan dapat di kembalikan lagi!!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya, Hapus!",
                    closeOnConfirm: false
                }, function () {
                    window.location.replace("proses_hapus_keputusan.php");
                });
            }
        </script>
            
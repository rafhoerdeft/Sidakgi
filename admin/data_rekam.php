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
                    <h3 class="text-themecolor">Data Rekam Medik</h3>
                </div>

                <!-- <div>
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div> -->
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
                        <!-- <button type="button" onclick="showModalAdd()" class="btn waves-effect waves-light btn-inverse float-right"><i class="fa fa-plus"></i> Tambah Rekam Medik</button>
                        <br><br>
                        <hr> -->
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-striped table-hover" style="font-size: 9pt">
                                <thead>
                                    <tr>
                                        <th><b>#</b></th>
                                        <th><b>Nama Pasien</b></th>
                                        <th><b>Jenis Kelamin</b></th>
                                        <th><b>Alamat</b></th>
                                        <th><b>Tgl Periksa</b></th>
                                        <th><b>Gigi</b></th>
                                        <th><b>Gusi</b></th>
                                        <th><b>Nyeri</b></th>
                                        <th><b>Ngilu</b></th>
                                        <th><b>Diagnosa</b></th>
                                        <th width="75"><b>Aksi</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 0;
                                        $query ="SELECT rm.*, (SELECT ps.nama_pasien FROM tbl_pasien ps WHERE ps.id_pasien = rm.id_pasien) nama_pasien, (SELECT ps.alamat_pasien FROM tbl_pasien ps WHERE ps.id_pasien = rm.id_pasien) alamat_pasien, (SELECT ps.jk_pasien FROM tbl_pasien ps WHERE ps.id_pasien = rm.id_pasien) jk_pasien FROM tbl_rekam_medik rm ORDER BY rm.id_rm DESC";
                                        $sql_rm = $db->query($query);
                                        while($row = $db->fetch_assoc($sql_rm)){
                                            $no++;
                                    ?>
                                            <tr>
                                                <td align="center"><?= $no ?></td>
                                                <td><?= $row['nama_pasien'] ?></td>
                                                <td><?= $row['jk_pasien'] ?></td>
                                                <td><?= $row['alamat_pasien'] ?></td>
                                                <td><?= date('d-m-Y', strtotime($row['tgl_periksa'])) ?></td>
                                                <td><?= $row['gigi'] ?></td>
                                                <td><?= $row['gusi'] ?></td>
                                                <td><?= $row['nyeri'] ?></td>
                                                <td><?= $row['ngilu'] ?></td>
                                                <td><?= $row['diagnosa'] ?></td>
                                                <td>
                                                    <!-- <button type="button" data-id="<?= $row['id_pasien'] ?>" data-nama="<?= $row['nama_pasien'] ?>" data-almt="<?= $row['alamat_pasien'] ?>" data-jk="<?= $row['jk_pasien'] ?>" data-hp="<?= $row['no_hp_pasien'] ?>" onclick="showModalEdit(this)" class="btn btn-sm waves-effect waves-light btn-info" style="width: 40px; margin-bottom: 5px" title="Edit Data"><i class="fa fa-pencil-square-o"></i></button> -->
                                                    <button type="button" onclick="showConfirmMessage(<?= $row['id_rm'] ?>)" class="btn btn-sm waves-effect waves-light btn-danger" style="width: 40px; margin-bottom: 5px" title="Hapus Data"><i class="fa fa-trash-o"></i></button>
                                                </td>
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
            
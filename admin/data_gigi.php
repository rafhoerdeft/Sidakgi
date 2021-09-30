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
                    <h3 class="text-themecolor">Data Jenis Gigi</h3>
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
                        <button type="button" onclick="showModalAdd()" class="btn waves-effect waves-light btn-inverse float-right"><i class="fa fa-plus"></i> Tambah Jenis</button>
                        <br><br>
                        <hr>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="50"><b>#</b></th>
                                        <th><b>Jenis Gigi</b></th>
                                        <th width="150"><b>Aksi</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 0;
                                        $query ="SELECT * FROM tbl_jenis_gigi ORDER BY id_jenis_gigi DESC";
                                        $sql_gigi = $db->query($query);
                                        while($row = $db->fetch_assoc($sql_gigi)){
                                            $no++;
                                    ?>
                                            <tr>
                                                <td align="center"><?= $no ?></td>
                                                <td><?= $row['jenis_gigi'] ?></td>
                                                <td>
                                                    <button type="button" data-id="<?= $row['id_jenis_gigi'] ?>" data-gigi="<?= $row['jenis_gigi'] ?>" onclick="showModalEdit(this)" class="btn btn-sm waves-effect waves-light btn-info" style="width: 40px; margin-bottom: 5px" title="Edit Data"><i class="fa fa-pencil-square-o"></i></button>
                                                    <button type="button" onclick="showConfirmMessage(<?= $row['id_jenis_gigi'] ?>)" class="btn btn-sm waves-effect waves-light btn-danger" style="width: 40px; margin-bottom: 5px" title="Hapus Data"><i class="fa fa-trash-o"></i></button>
                                                </td>
                                            </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Modal Simpan -->
            <div id="modal-simpan" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data Pasien</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <form id="tambahDataGigi" method="POST" action="proses_tambah_gigi.php">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="jenis_gigi" class="control-label">Jenis Gigi :</label>
                                    <div class="controls">
                                        <input required type="text" class="form-control" name="jenis_gigi" id="jenis_gigi" placeholder="Isi jenis gigi">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info waves-effect waves-light" id="simpan_pasien"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Edit -->
            <div id="modal-edit" class="modal fade" role="dialog" aria-labelledby="myModalLabels" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Data Pasien</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <form id="updateDataGigi" method="POST" action="proses_update_gigi.php">
                            <div class="modal-body">

                                <input type="hidden" name="id_jenis_gigi" id="id_jenis_gigi">

                                <div class="form-group">
                                    <label for="jenis_gigi" class="control-label">Jenis Gigi :</label>
                                    <div class="controls">
                                        <input required type="text" class="form-control" name="jenis_gigi" id="jenis_gigi" placeholder="Isi jenis gigi">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info waves-effect waves-light" id="simpan_pasien"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->


        <!-- SIMPAN USAHA =========================================== -->
        <script type="text/javascript">
            function showModalAdd(argument) {
                $('#modal-simpan #tambahDataGigi').trigger("reset");
                $('#modal-simpan').modal('show');
            }
        </script>

        <!-- ======================================================= -->

        <!-- UPDATE USAHA =========================================== -->
        <script type="text/javascript">

            function showModalEdit(data) {
                $('#modal-edit #updateDataGigi').trigger('reset');

                var id_jenis_gigi = $(data).attr('data-id');
                var jenis_gigi = $(data).attr('data-gigi');
                
                // $("#loading-show").fadeIn("slow");

                // $.post("edit_pasien.php", {id:id}, function(result){
                //     $("#loading-show").fadeIn("slow").delay(100).slideUp('slow');

                //     var dt = JSON.parse(result);
                    // console.log(dt.data);

                    // if (dt.response) {
                        $('#modal-edit #updateDataGigi #id_jenis_gigi').val(id_jenis_gigi);
                        $('#modal-edit #updateDataGigi #jenis_gigi').val(jenis_gigi);
                        // $('#modal-edit #updateDataGigi #password').val(password);

                        $('#modal-edit').modal('show');

                    // }

                // });
            }

        </script>
        <!-- ======================================================= -->

        <!-- HAPUS Pasien ================================= -->
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
                        url  : "proses_hapus_gigi.php",
                        dataType : "html",
                        data : {id:id},
                        success: function(data){

                            if(data=='Success'){
                                // location.reload();
                                window.location.replace("index.php?x=data_gigi&&nav=gigi&&alt=1");
                            }else{
                                window.location.replace("index.php?x=data_gigi&&nav=gigi&&alt=1");
                            } 
                        }
                    });
                    return false;
                    // swal("Hapus!", "Data telah berhasil dihapus.", "success");
                });
            }
        </script>
            
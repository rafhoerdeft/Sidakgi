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
                    <h3 class="text-themecolor">Data Kasus</h3>
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
                                    <div class="col-md-6">
                                        <button type="button" onclick="showConfirmDelAll()" class="btn btn-block waves-effect waves-light btn-danger m-b-10"><i class="fa fa-trash-o"></i> Hapus Semua Kasus</button>
                                    </div>

                                    <div class="col-md-6">
                                        <button type="button" onclick="showModalAdd()" class="btn btn-block waves-effect waves-light btn-inverse m-b-10"><i class="fa fa-plus"></i> Tambah Kasus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><b>#</b></th>
                                        <th><b>Gigi</b></th>
                                        <th><b>Gusi</b></th>
                                        <th><b>Rasa Nyeri</b></th>
                                        <th><b>Rasa Ngilu</b></th>
                                        <th><b>Diagnosa</b></th>
                                        <th width="125"><b>Aksi</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 0;
                                        $query ="SELECT * FROM tbl_kasus ORDER BY id_kasus DESC";
                                        $sql_kasus = $db->query($query);
                                        while($row = $db->fetch_assoc($sql_kasus)){
                                            $no++;
                                    ?>
                                            <tr>
                                                <td align="center"><?= $no ?></td>
                                                <td><?= $row['gigi'] ?></td>
                                                <td><?= $row['gusi'] ?></td>
                                                <td><?= $row['nyeri'] ?></td>
                                                <td><?= $row['ngilu'] ?></td>
                                                <td><?= $row['label'] ?></td>
                                                <td>
                                                    <button type="button" data-id="<?= $row['id_kasus'] ?>" data-gigi="<?= $row['gigi'] ?>" data-gusi="<?= $row['gusi'] ?>" data-nyeri="<?= $row['nyeri'] ?>" data-ngilu="<?= $row['ngilu'] ?>" data-label="<?= $row['label'] ?>" onclick="showModalEdit(this)" class="btn btn-sm waves-effect waves-light btn-info" style="width: 40px; margin-bottom: 5px" title="Edit Data"><i class="fa fa-pencil-square-o"></i></button>
                                                    <button type="button" onclick="showConfirmMessage(<?= $row['id_kasus'] ?>)" class="btn btn-sm waves-effect waves-light btn-danger" style="width: 40px; margin-bottom: 5px" title="Hapus Data"><i class="fa fa-trash-o"></i></button>
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
                            <h4 class="modal-title">Tambah Data Kasus</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <form id="tambahDataKasus" method="POST" action="proses_tambah_kasus.php">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="gigi" class="control-label">Gigi :</label>
                                    <div class="controls">
                                        <input required type="text" class="form-control" name="gigi" id="gigi" placeholder="Isi kasus gigi">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="gusi" class="control-label">Gusi :</label>
                                    <div class="controls">
                                        <input required type="text" class="form-control" name="gusi" id="gusi" placeholder="Isi kasus gusi">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nyeri" class="control-label">Rasa Nyeri :</label>
                                    <div class="controls">
                                        <input required type="text" class="form-control" name="nyeri" id="nyeri" placeholder="Isi kasus rasa nyeri">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ngilu" class="control-label">Rasa Ngilu :</label>
                                    <div class="controls">
                                        <input required type="text" class="form-control" name="ngilu" id="ngilu" placeholder="Isi kasus rasa ngilu">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="label" class="control-label">Diagnosa :</label>
                                    <div class="controls">
                                        <input required type="text" class="form-control" name="label" id="label" placeholder="Isi diagnosa">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info waves-effect waves-light" id="simpan_kasus"><i class="fa fa-save"></i> Simpan</button>
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
                            <h4 class="modal-title">Update Data Kasus</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <form id="updateDataKasus" method="POST" action="proses_update_kasus.php">
                            <div class="modal-body">

                                <input type="hidden" name="id_kasus" id="id_kasus">

                                <div class="form-group">
                                    <label for="gigi" class="control-label">Gigi :</label>
                                    <div class="controls">
                                        <input required type="text" class="form-control" name="gigi" id="gigi" placeholder="Isi kasus gigi">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="gusi" class="control-label">Gusi :</label>
                                    <div class="controls">
                                        <input required type="text" class="form-control" name="gusi" id="gusi" placeholder="Isi kasus gusi">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nyeri" class="control-label">Rasa Nyeri :</label>
                                    <div class="controls">
                                        <input required type="text" class="form-control" name="nyeri" id="nyeri" placeholder="Isi kasus rasa nyeri">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ngilu" class="control-label">Rasa Ngilu :</label>
                                    <div class="controls">
                                        <input required type="text" class="form-control" name="ngilu" id="ngilu" placeholder="Isi kasus rasa ngilu">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="label" class="control-label">Diagnosa :</label>
                                    <div class="controls">
                                        <input required type="text" class="form-control" name="label" id="label" placeholder="Isi diagnosa">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info waves-effect waves-light" id="simpan_kasus"><i class="fa fa-save"></i> Simpan</button>
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
                $('#modal-simpan #tambahDataKasus').trigger("reset");
                $('#modal-simpan').modal('show');
            }
        </script>

        <!-- ======================================================= -->

        <!-- UPDATE USAHA =========================================== -->
        <script type="text/javascript">

            function showModalEdit(data) {
                $('#modal-edit #updateDataKasus').trigger('reset');

                var id_kasus = $(data).attr('data-id');
                var gigi = $(data).attr('data-gigi');
                var gusi = $(data).attr('data-gusi');
                var nyeri = $(data).attr('data-nyeri');
                var ngilu = $(data).attr('data-ngilu');
                var label = $(data).attr('data-label');
                
                // $("#loading-show").fadeIn("slow");

                // $.post("edit_kasus.php", {id:id}, function(result){
                //     $("#loading-show").fadeIn("slow").delay(100).slideUp('slow');

                //     var dt = JSON.parse(result);
                    // console.log(dt.data);

                    // if (dt.response) {
                        $('#modal-edit #updateDataKasus #id_kasus').val(id_kasus);
                        $('#modal-edit #updateDataKasus #gigi').val(gigi);
                        $('#modal-edit #updateDataKasus #gusi').val(gusi);
                        $('#modal-edit #updateDataKasus #nyeri').val(nyeri);
                        $('#modal-edit #updateDataKasus #ngilu').val(ngilu);
                        $('#modal-edit #updateDataKasus #label').val(label);

                        $('#modal-edit').modal('show');

                    // }

                // });
            }

        </script>
        <!-- ======================================================= -->

        <!-- HAPUS kasus ================================= -->
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
                        url  : "proses_hapus_kasus.php",
                        dataType : "html",
                        data : {id:id},
                        success: function(data){

                            if(data=='Success'){
                                // location.reload();
                                window.location.replace("index.php?x=data_kasus&&nav=kasus&&alt=1");
                            }else{
                                window.location.replace("index.php?x=data_kasus&&nav=kasus&&alt=1");
                            } 
                        }
                    });
                    return false;
                    // swal("Hapus!", "Data telah berhasil dihapus.", "success");
                });
            }

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
                    window.location.replace("proses_hapus_kasus_all.php");
                });
            }
        </script>
            
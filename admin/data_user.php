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
                    <h3 class="text-themecolor">Data Admin</h3>
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
                        <button type="button" onclick="showModalAdd()" class="btn waves-effect waves-light btn-inverse float-right"><i class="fa fa-plus"></i> Tambah Admin</button>
                        <br><br>
                        <hr>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><b>#</b></th>
                                        <th><b>Nama Admin</b></th>
                                        <th><b>Username</b></th>
                                        <th width="125"><b>Aksi</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 0;
                                        $query ="SELECT usr.* FROM tbl_user usr ORDER BY id_user DESC";
                                        $sql_user = $db->query($query);
                                        while($row = $db->fetch_assoc($sql_user)){
                                            $no++;
                                    ?>
                                            <tr>
                                                <td align="center"><?= $no ?></td>
                                                <td><?= $row['nama_user'] ?></td>
                                                <td><?= $row['username'] ?></td>
                                                <td>
                                                    <button type="button" data-id="<?= $row['id_user'] ?>" data-nama="<?= $row['nama_user'] ?>"  data-user="<?= $row['username'] ?>" onclick="showModalEdit(this)" class="btn btn-sm waves-effect waves-light btn-info" style="width: 40px; margin-bottom: 5px" title="Edit Data"><i class="fa fa-pencil-square-o"></i></button>
                                                    <button type="button" onclick="showConfirmMessage(<?= $row['id_user'] ?>)" class="btn btn-sm waves-effect waves-light btn-danger" style="width: 40px; margin-bottom: 5px" title="Hapus Data"><i class="fa fa-trash-o"></i></button>
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
                            <h4 class="modal-title">Tambah Data User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <form id="tambahDataUser" method="POST" action="proses_tambah_user.php">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="nama_user" class="control-label">Nama User :</label>
                                    <div class="controls">
                                        <input required type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Isi nama user">
                                    </div>
                                </div>

                               <!--  <div class="form-group">
                                    <label for="no_hp" class="control-label">Nomor HP :</label><br>
                                    <div class="controls">
                                        <input required type="text"  onkeypress="return inputAngka(event);" class="form-control" name="no_hp" id="no_hp">
                                    </div>
                                </div> -->

                                <!-- <div class="form-group">
                                    <label for="alamat_user" class="control-label">Alamat :</label>
                                    <div class="controls">
                                        <textarea required class="form-control" id="alamat_user" name="alamat_user"></textarea>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <label for="username" class="control-label">Username :</label>
                                    <div class="controls">
                                        <input required type="text" class="form-control" name="username" id="username" placeholder="Isi Username">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="control-label">Password :</label>
                                    <div class="controls">
                                        <input required type="password" class="form-control" name="password" id="password" placeholder="Isi Password">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info waves-effect waves-light" id="simpan_user"><i class="fa fa-save"></i> Simpan</button>
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
                            <h4 class="modal-title">Update Data User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <form id="updateDataUser" method="POST" action="proses_update_user.php">
                            <div class="modal-body">

                                <input type="hidden" name="id_user" id="id_user">

                                <div class="form-group">
                                    <label for="nama_user" class="control-label">Nama User :</label>
                                    <div class="controls">
                                        <input required type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Isi nama user">
                                    </div>
                                </div>

                               <!--  <div class="form-group">
                                    <label for="no_hp" class="control-label">Nomor HP :</label><br>
                                    <div class="controls">
                                        <input required type="text"  onkeypress="return inputAngka(event);" class="form-control" name="no_hp" id="no_hp">
                                    </div>
                                </div> -->

                                <!-- <div class="form-group">
                                    <label for="alamat_user" class="control-label">Alamat :</label>
                                    <div class="controls">
                                        <textarea required class="form-control" id="alamat_user" name="alamat_user"></textarea>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <label for="username" class="control-label">Username :</label>
                                    <div class="controls">
                                        <input required type="text" class="form-control" name="username" id="username" placeholder="Isi Username">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="control-label">Password :</label>
                                    <div class="controls">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Isi Password jika ingin ubah password">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info waves-effect waves-light" id="simpan_user"><i class="fa fa-save"></i> Simpan</button>
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
                $('#modal-simpan #tambahDataUser').trigger("reset");
                $('#modal-simpan').modal('show');
            }
        </script>

        <!-- ======================================================= -->

        <!-- UPDATE USAHA =========================================== -->
        <script type="text/javascript">

            function showModalEdit(data) {
                $('#modal-edit #updateDataUser').trigger('reset');

                var id_user = $(data).attr('data-id');
                var nama_user = $(data).attr('data-nama');
                var username = $(data).attr('data-user');
                
                // $("#loading-show").fadeIn("slow");

                // $.post("edit_user.php", {id:id}, function(result){
                //     $("#loading-show").fadeIn("slow").delay(100).slideUp('slow');

                //     var dt = JSON.parse(result);
                    // console.log(dt.data);

                    // if (dt.response) {
                        $('#modal-edit #updateDataUser #id_user').val(id_user);
                        $('#modal-edit #updateDataUser #nama_user').val(nama_user);
                        $('#modal-edit #updateDataUser #username').val(username);

                        $('#modal-edit').modal('show');

                    // }

                // });
            }

        </script>
        <!-- ======================================================= -->

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
                        url  : "proses_hapus_user.php",
                        dataType : "html",
                        data : {id:id},
                        success: function(data){

                            if(data=='Success'){
                                // location.reload();
                                window.location.replace("index.php?x=data_user&&nav=user&&alt=1");
                            }else{
                                window.location.replace("index.php?x=data_user&&nav=user&&alt=1");
                            } 
                        }
                    });
                    return false;
                    // swal("Hapus!", "Data telah berhasil dihapus.", "success");
                });
            }
        </script>
            
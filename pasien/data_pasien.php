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
                    <h3 class="text-themecolor">Data Pasien</h3>
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
                        <!-- <button type="button" onclick="showModalAdd()" class="btn waves-effect waves-light btn-inverse float-right"><i class="fa fa-plus"></i> Tambah Pasien</button>
                        <br><br>
                        <hr> -->
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><b>#</b></th>
                                        <th><b>Nama Pasien</b></th>
                                        <th><b>Jenis Kelamin</b></th>
                                        <th><b>Alamat</b></th>
                                        <th><b>No. HP</b></th>
                                        <th width="125"><b>Aksi</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 0;
                                        $query ="SELECT * FROM tbl_pasien ORDER BY id_pasien DESC";
                                        $sql_pasien = $db->query($query);
                                        while($row = $db->fetch_assoc($sql_pasien)){
                                            $no++;
                                    ?>
                                            <tr>
                                                <td align="center"><?= $no ?></td>
                                                <td><?= $row['nama_pasien'] ?></td>
                                                <td><?= $row['jk_pasien'] ?></td>
                                                <td><?= $row['alamat_pasien'] ?></td>
                                                <td><?= $row['no_hp_pasien'] ?></td>
                                                <td>
                                                    <button type="button" data-id="<?= $row['id_pasien'] ?>" data-nama="<?= $row['nama_pasien'] ?>" data-almt="<?= $row['alamat_pasien'] ?>" data-jk="<?= $row['jk_pasien'] ?>" data-hp="<?= $row['no_hp_pasien'] ?>" onclick="showModalEdit(this)" class="btn btn-sm waves-effect waves-light btn-info" style="width: 40px; margin-bottom: 5px" title="Edit Data"><i class="fa fa-pencil-square-o"></i></button>
                                                    <button type="button" onclick="showConfirmMessage(<?= $row['id_pasien'] ?>)" class="btn btn-sm waves-effect waves-light btn-danger" style="width: 40px; margin-bottom: 5px" title="Hapus Data"><i class="fa fa-trash-o"></i></button>
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
                        <form id="tambahDataPasien" method="POST" action="proses_tambah_pasien.php">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="nama_pasien" class="control-label">Nama Pasien :</label>
                                    <div class="controls">
                                        <input required type="text" class="form-control" name="nama_pasien" id="nama_pasien" placeholder="Isi nama pasien">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jk_pasien" class="control-label">Jenis Kelamin :</label>
                                    <div class="controls">
                                        <select required id="jk_pasien" name="jk_pasien" class="form-control" style="width: 100%; height:36px;">
                                            <option selected value="" disabled style="color: #d6d6d6">Pilih jenis kelamin</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alamat_pasien" class="control-label">Alamat :</label>
                                    <div class="controls">
                                        <textarea required class="form-control" id="alamat_pasien" name="alamat_pasien"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="no_hp_pasien" class="control-label">Nomor HP :</label><br>
                                    <div class="controls">
                                        <input required type="text"  onkeypress="return inputAngka(event);" class="form-control" name="no_hp_pasien" id="no_hp_pasien">
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
                        <form id="updateDataPasien" method="POST" action="proses_update_pasien.php">
                            <div class="modal-body">

                                <input type="hidden" name="id_pasien" id="id_pasien">

                                <div class="form-group">
                                    <label for="nama_pasien" class="control-label">Nama Pasien :</label>
                                    <div class="controls">
                                        <input required type="text" class="form-control" name="nama_pasien" id="nama_pasien" placeholder="Isi nama pasien">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jk_pasien" class="control-label">Jenis Kelamin :</label>
                                    <div class="controls">
                                        <select required id="jk_pasien" name="jk_pasien" class="form-control" style="width: 100%; height:36px;">
                                            <option selected value="" disabled style="color: #d6d6d6">Pilih jenis kelamin</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="alamat_pasien" class="control-label">Alamat :</label>
                                    <div class="controls">
                                        <textarea required class="form-control" id="alamat_pasien" name="alamat_pasien"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="no_hp_pasien" class="control-label">Nomor HP :</label><br>
                                    <div class="controls">
                                        <input required type="text"  onkeypress="return inputAngka(event);" class="form-control" name="no_hp_pasien" id="no_hp_pasien">
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
                $('#modal-simpan #tambahDataPasien').trigger("reset");
                $('#modal-simpan').modal('show');
            }
        </script>

        <!-- ======================================================= -->

        <!-- UPDATE USAHA =========================================== -->
        <script type="text/javascript">

            function showModalEdit(data) {
                $('#modal-edit #updateDataPasien').trigger('reset');

                var id_pasien = $(data).attr('data-id');
                var nama_pasien = $(data).attr('data-nama');
                var alamat_pasien = $(data).attr('data-almt');
                var jk_pasien = $(data).attr('data-jk');
                var no_hp = $(data).attr('data-hp');
                
                // $("#loading-show").fadeIn("slow");

                // $.post("edit_pasien.php", {id:id}, function(result){
                //     $("#loading-show").fadeIn("slow").delay(100).slideUp('slow');

                //     var dt = JSON.parse(result);
                    // console.log(dt.data);

                    // if (dt.response) {
                        $('#modal-edit #updateDataPasien #id_pasien').val(id_pasien);
                        $('#modal-edit #updateDataPasien #nama_pasien').val(nama_pasien);
                        $('#modal-edit #updateDataPasien #alamat_pasien').val(alamat_pasien);
                        $('#modal-edit #updateDataPasien #jk_pasien').val(jk_pasien).change();
                        $('#modal-edit #updateDataPasien #no_hp_pasien').val(no_hp);

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
                        url  : "proses_hapus_pasien.php",
                        dataType : "html",
                        data : {id:id},
                        success: function(data){

                            if(data=='Success'){
                                // location.reload();
                                window.location.replace("index.php?x=data_pasien&&nav=pasien&&alt=1");
                            }else{
                                window.location.replace("index.php?x=data_pasien&&nav=pasien&&alt=1");
                            } 
                        }
                    });
                    return false;
                    // swal("Hapus!", "Data telah berhasil dihapus.", "success");
                });
            }
        </script>
            
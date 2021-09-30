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
                    <h3 class="text-themecolor">Diagnosa Pasien</h3>
                </div>

                <div class="col-md-6 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Diagnosa Pasien</li>
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


                <div class="card">
                    <div class="card-body p-b-20">

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
                                                <td align="center">
                                                    <button type="button" onclick="showGejala(<?= $row['id_pasien'] ?>)" class="btn btn-sm waves-effect waves-light btn-info" title="Gejala Pasien">
                                                        <span class="btn-label"><i class="fa fa-stethoscope"></i></span>
                                                        Diagnosa</button>
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
            <div id="modal-gejala" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Pilih Gejala Pasien</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <form id="diagnosaPasien" method="POST" action="proses_pasien_terdaftar.php">
                            <div class="modal-body">
                                <input type="hidden" name="id_pasien" id="id_pasien">
                                <?php  
                                    function atribut($db=''){

                                        $atribut = array(); 
                                        $query ="SELECT COLUMN_NAME as atribut FROM information_schema.columns WHERE table_schema='$db->db_name' AND table_name='tbl_kasus'";
                                        $sql_attr = $db->query($query);
                                        while($row = $db->fetch_assoc($sql_attr)){
                                            if ($row['atribut'] != 'id_kasus' AND $row['atribut'] != 'label') {
                                                $atribut[] = $row['atribut'];
                                            }
                                        }

                                        return $atribut;
                                    }
                                    
                                    $atribut = atribut($db);    
                                    foreach ($atribut as $attr) {
                                ?>
                                        <div class="form-group">
                                            <label for="jk_pasien" class="control-label"><?= ucfirst($attr) ?> : *</label>
                                            <div class="controls">
                                                <select required name="<?= $attr ?>" class="form-control" style="width: 100%; height:36px;">
                                                    <option selected value="" disabled style="color: #d6d6d6">Pilih gejala <?= $attr ?></option>
                                                    <?php  
                                                        $query_isi = "SELECT $attr as attr FROM `tbl_kasus` GROUP BY $attr"; //ISI ATRIBUT
                                                        $sql_isi = $db->query($query_isi);
                                                        
                                                        while ($val = $db->fetch_assoc($sql_isi)) {
                                                    ?>
                                                            <option value="<?= $val['attr'] ?>"><?= $val['attr'] ?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                <?php } ?>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info waves-effect waves-light" id="simpan_pasien"><i class="fa fa-check"></i> Submit</button>
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
            function showGejala(id='') {
                $('#modal-gejala #diagnosaPasien').trigger("reset");
                $('#modal-gejala #id_pasien').val(id);
                $('#modal-gejala').modal('show');
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
            
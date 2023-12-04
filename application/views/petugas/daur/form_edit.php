<!-- page content -->

<div class="right_col" role="main">
    <div class="container">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Manajemen Daur Ulang</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Manajemen Daur Ulang</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Form Tambah Daur Ulang</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="row px-xl-3 pt-3">
                                    <div class="col-lg-7 mb-5">
                                        <div class="contact-form">
                                            <form name="sentMessage" method="post" action="<?php echo site_url('petugasdaur/edit'); ?>" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo $daur->idDaur; ?>">
                                                <div class="control-group">
                                                    <label for="idUser">Nama User</label>
                                                    <input type="hidden" name="idUser" value="<?php echo $daur->idUser; ?>">
                                                    <input class="form-control" value=<?php
                                                            $user_id = $daur->idUser;
                                                            $user = $this->db->get_where('tbl_user', array('idUser' => $user_id))->row();
                                                            echo $user->name;
                                                            $idUser=$user->name;
                                                            ?> disabled>
                                                    </input>
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <div class="control-group">
                                                    <label for="idPetugas">Nama Petugas</label>
                                                    <input type="hidden" name="idPetugas" value="<?php echo $daur->idPetugas; ?>">
                                                    <input class="form-control" value=<?php
                                                            $petugas_id = $daur->idPetugas;
                                                            $petugas = $this->db->get_where('tbl_petugas', array('idPetugas' => $petugas_id))->row();
                                                            echo $petugas->name;
                                                            ?> disabled>
                                                    </input>
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <div class="control-group">
                                                    <label for="tanggal">Tanggal</label>
                                                    <div class="input-group date" data-provide="datepicker">
                                                        <input type="hidden" name="tanggal" value="<?php echo $daur->tanggal; ?>">
                                                        <input type="date" class="form-control" name="idDaur" value=<?php
                                                            $daur_id = $daur->idDaur;
                                                            $daur = $this->db->get_where('tbl_daur_ulang', array('idDaur' => $daur_id))->row();
                                                            echo $daur->tanggal;
                                                            ?> disabled>
                                                        </input>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                <label for="barang">Barang</label>
                                                    <select class="form-control" name="idBarang">
                                                        <?php foreach($barang as $b){?>
                                                            <option selected value="<?php echo $b->idBarang; ?>" data-harga="<?php echo $b->harga; ?>"><?php echo $b->namaBarang;?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <p class="help-block text-danger"></p>
                                                </div> 
                                                <div class="control-group">
                                                    <label for="berat">Berat</label>
                                                    <input type="text" class="form-control" name="berat" id="berat" placeholder="Berat"/>
                                                    <p class="help-block text-danger"><?php echo form_error('berat'); ?></p>
                                                </div>   
                                                <div class="control-group" name="total">
                                                    <label for="total">Total: </label>
                                                    <b><span id="total"></span></b>
                                                    <p class="help-block text-danger"></p>
                                                    <input type="hidden" name="totalResult" id="totalResult">
                                                </div>

                                                <button class="btn btn-primary py-2 px-4" type="submit" id="sendMesrsageButton">Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
</div>
<!-- /page content -->
<script>
    function hitungTotal() {
        var berat = parseFloat(document.getElementById('berat').value);

        var harga = document.querySelector('select[name="idBarang"] option:checked').getAttribute('data-harga');
        
        var total = berat * harga;

        document.getElementById('total').innerText = 'Rp. ' + total;
        document.getElementById('totalResult').value = total;
    }

    document.getElementById('berat').addEventListener('input', hitungTotal);
    document.querySelector('select[name="idBarang"]').addEventListener('change', hitungTotal);
</script>

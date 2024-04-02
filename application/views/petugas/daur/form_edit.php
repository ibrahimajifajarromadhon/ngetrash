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
                                            <form name="sentMessage" method="post" action="<?php echo site_url('petugas_daur/edit'); ?>" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo $daur->idDaur; ?>">
                                                <div class="control-group mb-3">
                                                    <label for="idUser" class="font-weight-bold">Nama User</label>
                                                    <input type="hidden" name="idUser" value="<?php echo $daur->idUser; ?>">
                                                    <?php
                                                    $user_id = $daur->idUser;
                                                    $user = $this->db->get_where('tbl_user', array('idUser' => $user_id))->row();
                                                    ?>
                                                    <input class="form-control" value="<?php echo $user->name; ?>" disabled>
                                                </div>
                                                <div class="control-group mb-3">
                                                    <label for="idPetugas" class="font-weight-bold">Nama Petugas</label>
                                                    <input type="hidden" name="idPetugas" value="<?php echo $daur->idPetugas; ?>">
                                                    <input class="form-control" value=<?php
                                                            $petugas_id = $daur->idPetugas;
                                                            $petugas = $this->db->get_where('tbl_petugas', array('idPetugas' => $petugas_id))->row();
                                                            echo $petugas->name;
                                                            ?> disabled>
                                                    </input>
                                                </div>
                                                <div class="control-group mb-3">
                                                    <label for="tanggal" class="font-weight-bold">Tanggal</label>
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
                                                <div class="control-group mb-3">
                                                    <label for="barang" class="font-weight-bold">Barang</label>
                                                    <select class="form-control" name="idBarang">
                                                        <?php foreach($barang as $b): ?>
                                                            <?php $selected = ($b->idBarang == $daur->idBarang) ? 'selected' : ''; ?>
                                                            <option value="<?php echo $b->idBarang; ?>" data-harga="<?php echo $b->harga; ?>" <?php echo $selected; ?>><?php echo $b->namaBarang; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="control-group mb-3">
                                                    <label for="berat" class="font-weight-bold">Berat</label>
                                                    <input type="text" class="form-control" name="berat" id="berat" placeholder="Berat" value="<?php echo $daur->berat; ?>"/>
                                                </div>   
                                                <div class="control-group mb-3" name="total">
                                                    <label for="total" class="font-weight-bold">Total: </label>
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

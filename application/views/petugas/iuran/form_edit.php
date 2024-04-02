<!-- page content -->

<div class="right_col" role="main">
    <div class="container">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Manajemen Iuran Wajib</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Manajemen Iuran Wajib</li>
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
                                    <h3 class="card-title">Form Edit Iuran Wajib</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="row px-xl-3 pt-3">
                                    <div class="col-lg-7 mb-5">
                                        <div class="contact-form">
                                            <form name="sentMessage" method="post" action="<?php echo site_url('petugas_iuran/edit'); ?>">
                                                <input type="hidden" name="id" value="<?php echo $iuran->idIuran; ?>">
                                                <div class="control-group mb-3">
                                                    <label for="idUser" class="font-weight-bold">Nama User</label>
                                                    <input type="hidden" name="idUser" value="<?php echo $iuran->idUser; ?>">
                                                    <?php
                                                    $user_id = $iuran->idUser;
                                                    $user = $this->db->get_where('tbl_user', array('idUser' => $user_id))->row();
                                                    ?>
                                                    <input class="form-control" value="<?php echo $user->name; ?>" disabled>
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <div class="control-group mb-3">
                                                    <label for="idPetugas" class="font-weight-bold">Nama Petugas</label>
                                                    <input type="hidden" name="idPetugas" value="<?php echo $iuran->idPetugas; ?>">
                                                    <input class="form-control" value=<?php
                                                            $petugas_id = $iuran->idPetugas;
                                                            $petugas = $this->db->get_where('tbl_petugas', array('idPetugas' => $petugas_id))->row();
                                                            echo $petugas->name;
                                                            ?> disabled>
                                                    </input>
                                                </div>
                                                <div class="control-group mb-3">
                                                    <label for="tanggal" class="font-weight-bold">Tanggal</label>
                                                    <div class="input-group date" data-provide="datepicker">
                                                        <input type="hidden" name="tanggal" value="<?php echo $iuran->tanggal; ?>">
                                                        <input type="date" class="form-control" name="tanggal" value=<?php
                                                            $user_id = $iuran->idIuran;
                                                            $user = $this->db->get_where('tbl_iuran_wajib', array('idIuran' => $user_id))->row();
                                                            echo $user->tanggal;
                                                            ?> disabled>
                                                        </input>
                                                        <div class="input-group-addon">
                                                            <span class="glyphicon glyphicon-th"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="control-group mb-3">
                                                    <label for="jenisBayar" class="font-weight-bold">Jenis Bayar</label>
                                                    <select class="form-control" name="jenisBayar">
                                                        <option disabled selected>Pilih jenis bayar</option>
                                                        <option value="1" <?= ($iuran->jenisBayar == 'Tunai') ? 'selected' : '' ?>>Tunai</option>
                                                        <option value="2" <?= ($iuran->jenisBayar == 'Non Tunai') ? 'selected' : '' ?>>Non Tunai</option>
                                                    </select>
                                                </div>
                                                <div class="control-group mb-3" id="nominalInput" <?php echo ($iuran->jenisBayar == 'Non Tunai') ? '' : 'style="display: none;"'; ?>>
                                                    <label for="nominal" class="font-weight-bold">Nominal</label>
                                                    <input type="number" class="form-control" name="nominal" id="nominal" placeholder="Masukkan Nominal">
                                                </div>

                                                <div class="control-group mb-3">
                                                    <label for="status" class="font-weight-bold">Status</label>
                                                    <select class="form-control" name="status">
                                                        <option disabled selected>Pilih status bayar</option>
                                                        <option value="1" <?= ($iuran->status == 'Sudah Bayar') ? 'selected' : '' ?>>Sudah Bayar</option>
                                                        <option value="2" <?= ($iuran->status == 'Belum Bayar') ? 'selected' : '' ?>>Belum Bayar</option>
                                                    </select>
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
    document.addEventListener("DOMContentLoaded", function () {
        var jenisBayarSelect = document.querySelector('select[name="jenisBayar"]');
        var nominalInput = document.getElementById('nominalInput');

        jenisBayarSelect.addEventListener('change', function () {
            if (jenisBayarSelect.value === '2') { 
                nominalInput.style.display = 'block'; 
            } else {
                nominalInput.style.display = 'none'; 
            }
        });
    });
</script>
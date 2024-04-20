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
                                    <h3 class="card-title">Form Tambah Iuran Wajib</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="row px-xl-3 pt-3">
                                    <div class="col-lg-7 mb-5">
                                        <div class="contact-form">

                                            <form name="sentMessage" method="post" action="<?php echo site_url('petugas_iuran/save'); ?>" enctype="multipart/form-data">
                                                <?php if ($this->session->flashdata('error_nominal')) : ?>
                                                    <div class="pb-3 pt-3 alert alert-danger alert-dismissible text-whitesmoke">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <strong><?php echo $this->session->flashdata('error_nominal'); ?></strong>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($this->session->flashdata('error_idUser')) : ?>
                                                    <div class="pb-0 pt-3 alert alert-danger alert-dismissible text-whitesmoke">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <strong><?php echo $this->session->flashdata('error_idUser'); ?></strong>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="control-group mb-3">
                                                    <label for="idUser" class="font-weight-bold">Nama User</label>
                                                    <select class="form-control" name="idUser">
                                                        <option disabled selected>Pilih nama user</option>
                                                        <?php foreach ($user as $u) { ?>
                                                            <?php $selected = ($this->session->flashdata('input_idUser') == $u->idUser) ? 'selected' : ''; ?>
                                                            <option value="<?= $u->idUser ?>" <?= $selected ?>><?= $u->name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <?php if ($this->session->flashdata('error_idPetugas')) : ?>
                                                    <div class="pb-0 pt-3 alert alert-danger alert-dismissible text-whitesmoke">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <strong><?php echo $this->session->flashdata('error_idPetugas'); ?></strong>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="control-group mb-3">
                                                    <label for="idPetugas" class="font-weight-bold">Nama Petugas</label>
                                                    <select class="form-control" name="idPetugas">
                                                        <option disabled selected>Pilih nama petugas</option>
                                                        <?php foreach ($petugas1 as $p) { ?>
                                                            <?php $selected = ($this->session->flashdata('input_idPetugas') == $p->idPetugas) ? 'selected' : ''; ?>
                                                            <option value="<?= $p->idPetugas ?>" <?= $selected ?>><?= $p->name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <?php if ($this->session->flashdata('error_tanggal')) : ?>
                                                    <div class="pb-0 pt-3 alert alert-danger alert-dismissible text-whitesmoke">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <strong><?php echo $this->session->flashdata('error_tanggal'); ?></strong>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="control-group mb-3">
                                                    <label for="tanggal" class="font-weight-bold">Tanggal</label>
                                                    <div class="input-group date" data-provide="datepicker">
                                                        <?php
                                                        $tanggal_value = $this->session->flashdata('input_tanggal');
                                                        if ($tanggal_value === null) {
                                                            $tanggal_value = $this->input->post('tanggal');
                                                        }
                                                        ?>
                                                        <input type="date" class="form-control" name="tanggal" value="<?= $tanggal_value ?>">
                                                        <div class="input-group-addon">
                                                            <span class="fas fa-th"></span>
                                                        </div>
                                                    </div>

                                                </div>
                                                <?php if ($this->session->flashdata('error_jenisBayar')) : ?>
                                                    <div class="pb-0 pt-3 alert alert-danger alert-dismissible text-whitesmoke">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <strong><?php echo $this->session->flashdata('error_jenisBayar'); ?></strong>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="control-group mb-3">
                                                    <label for="jenisBayar" class="font-weight-bold">Jenis Bayar</label>
                                                    <select class="form-control" name="jenisBayar">
                                                        <option disabled selected>Pilih jenis bayar</option>
                                                        <option value="1" <?= ($this->session->flashdata('input_jenisBayar') == '1') ? 'selected' : ''; ?>>Tunai</option>
                                                        <option value="2" <?= ($this->session->flashdata('input_jenisBayar') == '2') ? 'selected' : ''; ?>>Non Tunai</option>
                                                    </select>
                                                </div>
                                                <?php if ($this->session->flashdata('input_jenisBayar') == '2') : ?>
                                                    <div class="control-group" id="nominalInput" style="display: none;">
                                                    <label for="nominal">Nominal</label>
                                                    <input type="number" class="form-control" name="nominal" id="nominal" placeholder="Masukkan Nominal">
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <?php endif; ?>
                                                <div class="control-group mb-3 <?= $this->session->flashdata('input_jenisBayar') == '2'?>" id="nominalInput">
                                                    <label for="nominal" class="font-weight-bold">Nominal</label>
                                                    <?php
                                                    $nominal_value = $this->session->flashdata('input_nominal');
                                                    if ($nominal_value === null) {
                                                        $nominal_value = $this->input->post('nominal');
                                                    }
                                                    ?>
                                                    <input type="number" class="form-control" name="nominal" id="nominal" placeholder="Masukkan Nominal" value="<?= $nominal_value ?>">
                                                </div>
                                                <?php if ($this->session->flashdata('error_status')) : ?>
                                                    <div class="pb-0 pt-3 alert alert-danger alert-dismissible text-whitesmoke">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <strong><?php echo $this->session->flashdata('error_status'); ?></strong>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="control-group mb-3">
                                                    <label for="status" class="font-weight-bold">Status</label>
                                                    <select class="form-control" name="status">
                                                        <option disabled selected>Pilih status bayar</option>
                                                        <option value="1" <?= ($this->session->flashdata('input_status') == '1') ? 'selected' : ''; ?>>Sudah Bayar</option>
                                                        <option value="2" <?= ($this->session->flashdata('input_status') == '2') ? 'selected' : ''; ?>>Belum Bayar</option>
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
    document.addEventListener("DOMContentLoaded", function() {
        var jenisBayarSelect = document.querySelector('select[name="jenisBayar"]');
        var nominalInput = document.getElementById('nominalInput');

        function updateNominalVisibility() {
            if (jenisBayarSelect.value === '2') {
                nominalInput.classList.remove('d-none');
            } else {
                nominalInput.classList.add('d-none'); 
            }
        }

        updateNominalVisibility();

        jenisBayarSelect.addEventListener('change', function() {
            updateNominalVisibility();
        });
    });
</script>

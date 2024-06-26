<!-- page content -->

<div class="right_col" role="main">
    <div class="container">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Manajemen Status</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Manajemen Status Pengambilan Sampah</li>
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
                                    <h3 class="card-title">Form Tambah Status Pengambilan Sampah</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="row px-xl-3 pt-3">
                                    <div class="col-lg-7 mb-5">
                                        <div class="contact-form">
                                            <form name="sentMessage" method="post" action="<?php echo site_url('PetugasStatus/save'); ?>" enctype="multipart/form-data">
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
                                                <?php if ($this->session->flashdata('error_keterangan')) : ?>
                                                    <div class="pb-0 pt-3 alert alert-danger alert-dismissible text-whitesmoke">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <strong><?php echo $this->session->flashdata('error_keterangan'); ?></strong>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="control-group mb-3">
                                                    <label for="status" class="font-weight-bold">Keterangan</label>
                                                    <select class="form-control" name="keterangan">
                                                        <option disabled selected>Pilih keterangan</option>
                                                        <option value="1" <?= ($this->session->flashdata('input_keterangan') == '1') ? 'selected' : ''; ?>>Belum Diambil</option>
                                                        <option value="2" <?= ($this->session->flashdata('input_keterangan') == '2') ? 'selected' : ''; ?>>Sudah Diambil</option>
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
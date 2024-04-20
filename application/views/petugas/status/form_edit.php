<!-- page content -->

<div class="right_col" role="main">
    <div class="container">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Manajemen Status </h1>
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
                                    <h3 class="card-title">Form Edit Status Pengambilan Sampah</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="row px-xl-3 pt-3">
                                    <div class="col-lg-7 mb-5">
                                        <div class="contact-form">
                                            <form name="sentMessage" method="post" action="<?php echo site_url('petugas_status/edit'); ?>" >
                                                <input type="hidden" name="id" value="<?php echo $status->idStatus; ?>">
                                                <div class="control-group mb-3">
                                                    <label for="idUser" class="font-weight-bold">Nama User</label>
                                                    <input type="hidden" name="idUser" value="<?php echo $status->idUser; ?>">
                                                    <?php
                                                    $user_id = $status->idUser;
                                                    $user = $this->db->get_where('tbl_user', array('idUser' => $user_id))->row();
                                                    ?>
                                                    <input class="form-control" value="<?php echo $user->name; ?>" disabled>
                                                </div>
                                                <div class="control-group mb-3">
                                                    <label for="idPetugas" class="font-weight-bold">Nama Petugas</label>
                                                    <input type="hidden" name="idPetugas" value="<?php echo $status->idPetugas; ?>">
                                                    <input class="form-control" value=<?php
                                                            $petugas_id = $status->idPetugas;
                                                            $petugas = $this->db->get_where('tbl_petugas', array('idPetugas' => $petugas_id))->row();
                                                            echo $petugas->name;
                                                            ?> disabled>
                                                    </input>
                                                </div>
                                                <div class="control-group mb-3">
                                                    <label for="tanggal" class="font-weight-bold">Tanggal</label>
                                                    <div class="input-group date" data-provide="datepicker">
                                                    <input type="hidden" name="tanggal" value="<?php echo $status->tanggal; ?>">
                                                    <input type="date" class="form-control" value=<?php
                                                            $status_id = $status->idStatus;
                                                            $status = $this->db->get_where('tbl_status_pengambilan', array('idStatus' => $status_id))->row();
                                                            echo $status->tanggal;
                                                            ?> disabled>
                                                        </input>
                                                        <div class="input-group-addon">
                                                            <span class="fas fa-th"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="control-group mb-3">
                                                    <label for="keterangan" class="font-weight-bold">Keterangan</label>
                                                    <select class="form-control" name="keterangan">
                                                    <option disabled selected>Pilih keterangan</option>
                                                        <option value="1" <?= ($status->keterangan == 'Belum Diambil') ? 'selected' : '' ?>>Belum Diambil</option>
                                                        <option value="2" <?= ($status->keterangan == 'Sudah Diambil') ? 'selected' : '' ?>>Sudah Diambil</option>
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
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
                                            <form name="sentMessage" method="post" action="<?php echo site_url('petugasiuran/edit'); ?>">
                                                <input type="hidden" name="id" value="<?php echo $iuran->idIuran; ?>">
                                                <div class="control-group">
                                                    <label for="idUser">Nama User</label>
                                                    <input type="hidden" name="idUser" value="<?php echo $iuran->idUser; ?>">
                                                    <input class="form-control" value=<?php
                                                            $user_id = $iuran->idUser;
                                                            $user = $this->db->get_where('tbl_user', array('idUser' => $user_id))->row();
                                                            echo $user->name;
                                                            $idUser=$user->name;
                                                            ?> disabled>
                                                    </input>
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <div class="control-group">
                                                    <label for="idPetugas">Nama Petugas</label>
                                                    <input type="hidden" name="idPetugas" value="<?php echo $iuran->idPetugas; ?>">
                                                    <input class="form-control" value=<?php
                                                            $petugas_id = $iuran->idPetugas;
                                                            $petugas = $this->db->get_where('tbl_petugas', array('idPetugas' => $petugas_id))->row();
                                                            echo $petugas->name;
                                                            ?> disabled>
                                                    </input>
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <div class="control-group">
                                                    <label for="tanggal">Tanggal</label>
                                                    <div class="input-group date" data-provide="datepicker">
                                                        <input type="hidden" name="tanggal" value="<?php echo $iuran->tanggal; ?>">
                                                        <input type="date" class="form-control" name="IdUser" value=<?php
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
                                                <div class="control-group">
                                                    <label for="jenisBayar">Jenis Bayar</label>
                                                    <select class="form-control" name="jenisBayar">
                                                        <option selected value="1">Tunai</option>
                                                        <option value="2">Non Tunai</option>   
                                                   </select>
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <div class="control-group">
                                                    <label for="status">Status</label>
                                                    <select class="form-control" name="status">
                                                        <option selected value="1">Sudah Bayar</option>
                                                        <option value="2">Belum Bayar</option>
                                                    </select>
                                                    <p class="help-block text-danger"></p>
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
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="container">
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Laporan Data Status </h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">Laporan Data Status Pengambilan Sampah</li>
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
                                            <div class="row justify-content-between">
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <h3 class="card-title">Laporan Data Status Pengambilan</h3>

                                                </div>
                                                <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 mt-2">
                                                    <div class="form-group">
                                                        <a target="blank" href="<?php echo site_url('Admin/print_status/'); ?>" class="btn btn-success btn-block rounded-0 shadow-sm"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="table-responsive p-2">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">No.</th>
                                                        <th>Nama User</th>
                                                        <th>Tanggal</th>
                                                        <th>Keterangan</th>
                                                        <th>Nama Petugas</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($data_status as $s) { ?>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php
                                                                $user_id = $s->idUser;
                                                                $user = $this->db->get_where('tbl_user', array('idUser' => $user_id))->row();
                                                                echo $user->name;
                                                                ?></td>
                                                            <td><?php echo $s->tanggal; ?></td>
                                                            <td><b><?php echo $s->keterangan; ?></b></td>
                                                            <td>
                                                                <?php
                                                                $petugas_id = $s->idPetugas;
                                                                $petugas = $this->db->get_where('tbl_petugas', array('idPetugas' => $petugas_id))->row();
                                                                echo $petugas->name;
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                        $no++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
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
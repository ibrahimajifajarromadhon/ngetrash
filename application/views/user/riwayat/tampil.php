        <!-- page content -->
        <section id="status">
            <div id="status" class="container py-5 my-5">

                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <h1>Riwayat Pengambilan Sampah </h1>
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
                                            <h3 class="card-title">Riwayat Pengambilan Sampah</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="table-responsive p-2">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">No</th>
                                                        <th>Nama User</th>
                                                        <th>Tanggal</th>
                                                        <th>Status Bayar</th>
                                                        <th>Jenis Bayar</th>
                                                        <th>Nama Petugas</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $user_id = $_SESSION['idUser'];
                                                    $loggedInUser = $this->db->get_where('tbl_user', array('idUser' => $user_id))->row();
                                                    foreach ($riwayat as $r) {
                                                        if ($r->idUser == $loggedInUser->idUser) { 
                                                    ?>
                                                            <tr>
                                                                <td><?php echo $no; ?></td>
                                                                <td><?php echo $loggedInUser->name; ?></td>
                                                                <td><?php echo $r->tanggal; ?></td>
                                                                <td><b style="background-color: <?php echo ($r->status == 'Sudah Bayar') ? 'green' : 'red'; ?>; padding: 7px; color: white; border-radius: 10px;"><?php echo $r->status; ?></b></td>
                                                                <td><b style="background-color: <?php echo ($r->jenisBayar == 'Tunai') ? 'blue' : 'orangered'; ?>; padding: 7px; color: white; border-radius: 10px;"><?php echo $r->jenisBayar; ?></b></td>
                                                                <td>
                                                                    <?php
                                                                    $petugas_id = $r->idPetugas;
                                                                    $petugas = $this->db->get_where('tbl_petugas', array('idPetugas' => $petugas_id))->row();
                                                                    echo $petugas->name;
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                    <?php
                                                            $no++;
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- /.card-body -->
                                        <!-- <div class="card-footer clearfix">
                                            <ul class="pagination pagination-sm m-0 float-right">
                                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                            </ul>
                                        </div> -->
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
        </section>
        <!-- /page content -->
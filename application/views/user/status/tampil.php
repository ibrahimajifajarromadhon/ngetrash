        <!-- page content -->
        <section id="status">
            <div id="status" class="container py-5 my-5">

                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <h1>Status Pengambilan Sampah </h1>
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
                                            <h3 class="card-title">Data Status Pengambilan Sampah</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="table-responsive p-2">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 20px">No</th>
                                                        <th>Nama User</th>
                                                        <th>Tanggal</th>
                                                        <th>Keterangan</th>
                                                        <th>Nama Petugas</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    $user_id = $_SESSION['idUser'];
                                                    $loggedInUser = $this->db->get_where('tbl_user', array('idUser' => $user_id))->row();
                                                    foreach ($status as $s) {
                                                        if ($s->idUser == $loggedInUser->idUser) { 
                                                    ?>
                                                            <tr>
                                                                <th style="text-align: center;"><?php echo $no; ?></th>
                                                                <td><?php echo $loggedInUser->name; ?></td>
                                                                <td><?php
                                                                    $date = new DateTime($s->tanggal);
                                                                    $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                                                    $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                                                                    echo $hari[$date->format('w')] . ', ' . $date->format('j') . ' ' . $bulan[$date->format('n') - 1] . ' ' . $date->format('Y');
                                                                    ?></td>                                                                <td><b style="background-color: <?php echo ($s->keterangan == 'Sudah Diambil') ? 'green' : 'red'; ?>; padding: 4px; color: white; border-radius: 10px; display: inline-block;"><?php echo $s->keterangan; ?></b></td>
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
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- /.card-body -->
                                        <div class="card-footer clearfix">
                                            <ul class="pagination pagination-sm m-0 justify-content-end">
                                                <li class="page-item">
                                                    <a class="page-link" href="<?php echo site_url('user/status/page/' . $links['prev_page']); ?>" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>

                                                <?php for ($i = 1; $i <= $links['num_pages']; $i++) : ?>
                                                    <li class="page-item <?php echo ($i == $links['current_page']) ? 'active' : ''; ?>">
                                                        <a class="page-link" href="<?php echo site_url('user/status/page/' . $i); ?>"><?php echo $i; ?></a>
                                                    </li>
                                                <?php endfor; ?>

                                                <li class="page-item">
                                                    <a class="page-link" href="<?php echo site_url('user/status/page/' . $links['next_page']); ?>" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
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
        </section>
        <!-- /page content -->
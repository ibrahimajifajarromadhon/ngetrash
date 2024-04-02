        <!-- page content -->
        <div class="right_col" role="main">
            <div class="container">
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Laporan Data Daur Ulang</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">Laporan Data Daur Ulang</li>
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
                                                    <h3 class="card-title">Laporan Data Daur Ulang</h3>

                                                </div>
                                                <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 mt-2">
                                                    <div class="form-group">
                                                        <a target="blank" href="<?php echo site_url('admin_print/print_daur/'); ?>" class="btn btn-success btn-block rounded-0 shadow-sm"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
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
                                                        <th>Jenis Barang</th>
                                                        <th>Berat</th>
                                                        <th>Total</th>
                                                        <th>Nama Petugas</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php $no = 1;
                                                        foreach ($daur as $d) { ?>
                                                    <tr>
                                                        <th><?php echo $no; ?></th>
                                                        <td>
                                                            <?php
                                                            $user_id = $d->idUser;
                                                            $user = $this->db->get_where('tbl_user', array('idUser' => $user_id))->row();
                                                            echo $user->name;
                                                            ?>
                                                        </td>
                                                        <td><?php echo $d->tanggal; ?></td>
                                                        <td>
                                                            <?php
                                                            $barang_id = $d->idBarang;
                                                            $barang = $this->db->get_where('tbl_barang', array('idBarang' => $barang_id))->row();
                                                            echo $barang->namaBarang;
                                                            ?>
                                                        </td>
                                                        <td><?php echo $d->berat; ?>kg</td>
                                                        <td>Rp. <?php echo $d->total; ?></td>
                                                        <td>
                                                            <?php
                                                            $petugas_id = $d->idPetugas;
                                                            $petugas = $this->db->get_where('tbl_petugas', array('idPetugas' => $petugas_id))->row();
                                                            echo $petugas->name;
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php $no++;
                                                        } ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- /.card-body -->
                                        <div class="card-footer clearfix">
                                            <ul class="pagination pagination-sm m-0 justify-content-end">
                                                <li class="page-item">
                                                    <a class="page-link" href="<?php echo site_url('admin_print/laporan_daur/page/' . $links['prev_page']); ?>" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>

                                                <?php for ($i = 1; $i <= $links['num_pages']; $i++) : ?>
                                                    <li class="page-item <?php echo ($i == $links['current_page']) ? 'active' : ''; ?>">
                                                        <a class="page-link" href="<?php echo site_url('admin_print/laporan_daur/page/' . $i); ?>"><?php echo $i; ?></a>
                                                    </li>
                                                <?php endfor; ?>

                                                <li class="page-item">
                                                    <a class="page-link" href="<?php echo site_url('admin_print/laporan_daur/page/' . $links['next_page']); ?>" aria-label="Next">
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
        <!-- /page content -->
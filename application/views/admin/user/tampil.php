        <!-- page content -->
        <div class="right_col" role="main">
            <div class="container">
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Manajemen User</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">Manajemen User</li>
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
                                            <h3 class="card-title">Data User</h3>
                                        </div>
                                        <?php if ($this->session->flashdata('active')) : ?>
                                            <div class="ml-2 mr-2 mt-2 mb-0 alert alert-success alert-dismissible text-whitesmoke">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong><?php echo $this->session->flashdata('active'); ?></strong>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($this->session->flashdata('non_active')) : ?>
                                            <div class="ml-2 mr-2 mt-2 mb-0 alert alert-danger alert-dismissible text-whitesmoke">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong><?php echo $this->session->flashdata('non_active'); ?></strong>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($this->session->flashdata('fail')) : ?>
                                            <div class="ml-2 mr-2 mt-2 mb-0 alert alert-danger alert-dismissible text-whitesmoke">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong><?php echo $this->session->flashdata('fail'); ?></strong>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($this->session->flashdata('success')) : ?>
                                            <div class="ml-2 mr-2 mt-2 mb-0 alert alert-success alert-dismissible text-whitesmoke">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong><?php echo $this->session->flashdata('success'); ?></strong>
                                            </div>
                                        <?php endif; ?>
                                        <!-- /.card-header -->
                                        <div class="table-responsive p-2">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 5px">No</th>
                                                        <th>Nama User</th>
                                                        <th>Username</th>
                                                        <th>Alamat</th>
                                                        <th>Saldo Masuk</th>
                                                        <th>Saldo Keluar</th>
                                                        <th>Total Saldo</th>
                                                        <th style="width: 110px">Status Aktif</th>
                                                        <th style="width: 230px">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php $no = 1;
                                                        foreach ($user as $usr) { ?>
                                                    <tr>

                                                        <th style="text-align: center;"><?php echo $no; ?></th>
                                                        <td><?php echo $usr->name; ?></td>
                                                        <td><?php echo $usr->userName; ?></td>
                                                        <td><?php echo $usr->alamat; ?></td>
                                                        <td>Rp. <?php echo number_format($usr->saldoMasuk); ?></td>
                                                        <td>Rp. <?php echo number_format($usr->saldoKeluar); ?></td>
                                                        <td>Rp. <?php echo number_format($usr->totalSaldo); ?></td>
                                                        <td>
                                                            <b style="background-color: <?php echo ($usr->statusAktif == 'Y') ? 'green' : 'red'; ?>; padding: 4px; color: white; border-radius: 10px; display: inline-block; <?php if ($usr->statusAktif != 'Y') ?>">
                                                                <?php if ($usr->statusAktif == "Y") {
                                                                    echo "Aktif";
                                                                } else {
                                                                    echo "Tidak Aktif";
                                                                } ?>
                                                            </b>
                                                        </td>

                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="<?php echo site_url('admin_user/ubah_status/' . $usr->idUser); ?>" class="btn btn-warning">Ubah Status</a>
                                                                <a href="<?php echo site_url('admin_user/delete/' . $usr->idUser); ?>" onclick="return confirm('Yakin Akan Menghapus Data Ini')" class="btn btn-danger">Hapus</a>
                                                            </div>
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
                                                    <a class="page-link" href="<?php echo site_url('admin_user/page/' . $links['prev_page']); ?>" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>

                                                <?php for ($i = 1; $i <= $links['num_pages']; $i++) : ?>
                                                    <li class="page-item <?php echo ($i == $links['current_page']) ? 'active' : ''; ?>">
                                                        <a class="page-link" href="<?php echo site_url('admin_user/page/' . $i); ?>"><?php echo $i; ?></a>
                                                    </li>
                                                <?php endfor; ?>

                                                <li class="page-item">
                                                    <a class="page-link" href="<?php echo site_url('admin_user/page/' . $links['next_page']); ?>" aria-label="Next">
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
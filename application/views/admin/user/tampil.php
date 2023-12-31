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
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $usr->name; ?></td>
                                                        <td><?php echo $usr->userName; ?></td>
                                                        <td><?php echo $usr->alamat; ?></td>
                                                        <td><?php echo $usr->saldoMasuk; ?></td>
                                                        <td><?php echo $usr->saldoKeluar; ?></td>
                                                        <td><?php echo $usr->totalSaldo; ?></td>
                                                        <td><b style="background-color: <?php echo ($usr->statusAktif == 'Y') ? 'green' : 'red'; ?>; padding: 7px; color: white; border-radius: 10px;"><?php if ($usr->statusAktif == "Y") {
                                                                                                                                                                                                            echo "Aktif";
                                                                                                                                                                                                        } else {
                                                                                                                                                                                                            echo "Tidak Aktif";
                                                                                                                                                                                                        } ?></b></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="<?php echo site_url('adminuser/ubah_status/' . $usr->idUser); ?>" class="btn btn-warning">Ubah Status</a>
                                                                <a href="<?php echo site_url('adminuser/delete/' . $usr->idUser); ?>" onclick="return confirm('Yakin Akan Menghapus Data Ini')" class="btn btn-danger">Hapus</a>
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
<!-- page content -->
<div class="right_col" role="main">
    <div class="container">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Laporan Data Petugas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Laporan Data Petugas</li>
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
                                            <h3 class="card-title">Laporan Data Petugas</h3>

                                        </div>
                                        <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12 mt-2">
                                            <div class="form-group">
                                                <a target="blank" href="<?php echo site_url('Admin/print_petugas/'); ?>" class="btn btn-success btn-block rounded-0 shadow-sm"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="table-responsive p-2">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="">
                                                <th style="width: 10px">No.</th>
                                                <th>Nama Petugas</th>
                                                <th>Username</th>
                                                <th>Status Aktif</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php $no = 1;
                                                foreach ($data_petugas as $p) { ?>
                                            <tr>
                                                <th><?php echo $no ?></th>
                                                <td><?php echo $p->name ?></td>
                                                <td><?php echo $p->userName ?></td>
                                                <td><b><?php if ($p->statusAktif == "Y") {
                                                            echo "Aktif";
                                                        } else {
                                                            echo "Tidak Aktif";
                                                        } ?></b></td>
                                            </tr>
                                        <?php $no++;
                                                } ?>
                                            </tr>
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
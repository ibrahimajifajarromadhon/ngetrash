<!-- page content -->

<div class="right_col" role="main">
    <div class="container">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Manajemen Barang</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Manajemen Barang</li>
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
                                    <h3 class="card-title">Form Tambah Barang</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="row px-xl-3 pt-3">
                                    <div class="col-lg-7 mb-5">
                                        <div class="contact-form">
                                            <form name="sentMessage" method="post" action="<?php echo site_url('admin_barang/save'); ?>" enctype="multipart/form-data">
                                                <?php if ($this->session->flashdata('error_namaBarang')) : ?>
                                                    <div class="pb-0 pt-3 alert alert-danger alert-dismissible text-whitesmoke">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <strong><?php echo $this->session->flashdata('error_namaBarang'); ?></strong>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="control-group mb-3">
                                                    <label for="namaBarang" class="font-weight-bold">Nama Barang</label>
                                                    <input type="text" class="form-control" name="namaBarang" id="namaBarang" placeholder="Masukkan nama barang" value="<?php echo $this->session->flashdata('input_namaBarang') ?>"/>
                                                </div>   
                                                <?php if ($this->session->flashdata('error_harga')) : ?>
                                                    <div class="pb-0 pt-3 alert alert-danger alert-dismissible text-whitesmoke">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <strong><?php echo $this->session->flashdata('error_harga'); ?></strong>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="control-group mb-3">
                                                    <label for="harga" class="font-weight-bold">Harga Barang</label>
                                                    <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukkan harga barang" value="<?php echo $this->session->flashdata('input_harga') ?>"/>
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

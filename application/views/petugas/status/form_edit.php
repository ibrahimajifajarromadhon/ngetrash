<!-- page content -->

<div class="right_col" role="main">
    <div class="container">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Manajemen Status</h1>
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
                                    <h3 class="card-title">Form edit Status Pengambilan Sampah</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="row px-xl-3 pt-3">
                                    <div class="col-lg-7 mb-5">
                                        <div class="contact-form">
                                            <form name="sentMessage" method="post" action="<?php echo site_url('petugasiuran/edit'); ?>" enctype="multipart/form-data">
                                                <div class="control-group">
                                                    <label for="idUser">Id User</label>
                                                    <select class="form-control" name="Id user">
                                                        <option selected>Open this select menu</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <div class="control-group">
                                                    <label for="idPetugas">Id Petugas</label>
                                                    <select class="form-control" name="Id petugas">
                                                        <option selected>Open this select menu</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <div class="control-group">
                                                    <label for="tanggal">Tanggal</label>
                                                    <div class="input-group date" data-provide="datepicker">
                                                        <input type="date" class="form-control">
                                                        <div class="input-group-addon">
                                                            <span class="glyphicon glyphicon-th"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="jenisBayar">Keterangan</label>
                                                    <form>
                                                        <div class="row">

                                                            <div class="col-sm-9">
                                                                <div class="btn-group">
                                                                    <label class="btn btn-default active">
                                                                        <input type="radio" id="q156" name="quality[25]" value="1" checked="checked" /> Sudah diambil
                                                                    </label>
                                                                    <label class="btn btn-default">
                                                                        <input type="radio" id="q157" name="quality[25]" value="2" /> Belum diambil
                                                                    </label>
                                                                </div>
                                                            </div>
                                                    </form>
                                                </div>
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
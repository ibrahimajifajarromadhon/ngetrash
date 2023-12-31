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
                                    <h3 class="card-title">Form Tambah Iuran Wajib</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="row px-xl-3 pt-3">
                                    <div class="col-lg-7 mb-5">
                                        <div class="contact-form">
                                            <form name="sentMessage" method="post" action="<?php echo site_url('petugasiuran/save'); ?>" enctype="multipart/form-data">
                                                <div class="control-group">
                                                    <label for="idUser">Nama User</label>
                                                    <select class="form-control" name="idUser">
                                                        <option selected>None</option>
                                                        <?php foreach ($user as $u) { ?>
                                                            <option value="<?php echo $u->idUser; ?>"><?php echo $u->name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <div class="control-group">
                                                    <label for="idPetugas">Nama Petugas</label>
                                                    <select class="form-control" name="idPetugas">
                                                        <option selected>None</option>
                                                        <?php foreach ($petugas1 as $p) { ?>
                                                            <option value="<?php echo $p->idPetugas; ?>"><?php echo $p->name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <div class="control-group">
                                                    <label for="tanggal">Tanggal</label>
                                                    <div class="input-group date" data-provide="datepicker">
                                                        <input type="date" class="form-control" name='tanggal'>
                                                        <div class="input-group-addon">
                                                            <span class="glyphicon glyphicon-th"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="jenisBayar">Jenis Bayar</label>
                                                    <select class="form-control" name="jenisBayar">
                                                        <option selected>None</option>
                                                        <option value="1">Tunai</option>
                                                        <option value="2">Non Tunai</option>
                                                    </select>
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <div class="control-group" id="nominalInput" style="display: none;">
                                                    <label for="nominal">Nominal</label>
                                                    <input type="number" class="form-control" name="nominal" id="nominal" placeholder="Masukkan Nominal">
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <div class="control-group">
                                                    <label for="status">Status</label>
                                                    <select class="form-control" name="status">
                                                        <option selected>None</option>
                                                        <option value="1">Sudah Bayar</option>
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
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var jenisBayarSelect = document.querySelector('select[name="jenisBayar"]');
        var nominalInput = document.getElementById('nominalInput');

        jenisBayarSelect.addEventListener('change', function () {
            if (jenisBayarSelect.value === '2') { 
                nominalInput.style.display = 'block'; 
            } else {
                nominalInput.style.display = 'none'; 
            }
        });
    });
</script>
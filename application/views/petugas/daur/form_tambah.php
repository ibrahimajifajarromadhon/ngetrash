<!-- page content -->

<div class="right_col" role="main">
    <div class="container">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Manajemen Daur Ulang</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Manajemen Daur Ulang</li>
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
                                    <h3 class="card-title">Form Tambah Daur Ulang</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="row px-xl-3 pt-3">
                                    <div class="col-lg-7 mb-5">
                                        <div class="contact-form">
                                            <form name="sentMessage" method="post" action="<?php echo site_url('petugasdaur/save'); ?>" enctype="multipart/form-data">
                                                <div class="control-group">
                                                    <label for="idUser">Nama User</label>
                                                    <select class="form-control" name="idUser">
                                                    <option selected>None</option>
                                                        <?php foreach($user as $u){?>
                                                            <option value="<?php echo $u->idUser; ?>"><?php echo $u->name;?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <p class="help-block text-danger"></p>
                                                </div>
                                                <div class="control-group">
                                                    <label for="idPetugas">Nama Petugas</label>
                                                    <select class="form-control" name="idPetugas">
                                                    <option selected>None</option>
                                                    <?php foreach($petugas1 as $p){?>
                                                            <option value="<?php echo $p->idPetugas; ?>"><?php echo $p->name;?></option>
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
                                                <label for="barang">Barang</label>
                                                <select class="form-control"  name="idBarang">
                                                        <option selected>None</option>
                                                        <?php foreach($barang as $b){?>
                                                            <option value="<?php echo $b->idBarang; ?>" data-harga="<?php echo $b->harga; ?>"><?php echo $b->namaBarang;?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <p class="help-block text-danger"></p>
                                                </div> 
                                                <div class="control-group">
                                                    <label for="berat">Berat</label>
                                                    <input type="text" class="form-control" name="berat" id="berat" placeholder="Berat"/>
                                                    <p class="help-block text-danger"><?php echo form_error('berat'); ?></p>
                                                </div>   
                                                <div class="control-group" name="total">
                                                    <label for="total">Total: </label>
                                                    <b><span id="total"></span></b>
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
    // Fungsi untuk menghitung total
    function hitungTotal() {
        // Ambil nilai berat dari input
        var berat = parseFloat(document.getElementById('berat').value);

        // Ambil nilai harga dari option yang dipilih
        var harga = document.querySelector('select[name="idBarang"] option:checked').getAttribute('data-harga');
        
        // Hitung total
        var total = berat * harga;

        // Tampilkan total pada elemen dengan id totalResult
        document.getElementById('total').innerText = 'Rp. ' + total;
    }

    // Panggil fungsi hitungTotal saat nilai berat atau ID barang berubah
    document.getElementById('berat').addEventListener('input', hitungTotal);
    document.querySelector('select[name="idBarang"]').addEventListener('change', hitungTotal);
</script>

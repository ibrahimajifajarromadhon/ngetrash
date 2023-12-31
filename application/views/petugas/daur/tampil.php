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
                                            <h3 class="card-title">Data Daur Ulang</h3>
                                        </div>
                                        <div class="pl-2 pt-3">
                                        <a href="<?php echo site_url('petugasdaur/add'); ?>" class="btn btn-sm btn-info float-left p-2"><b> Tambah Data Daur Ulang </b></a>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="table-responsive p-2">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">No</th>
                                                        <th>Nama User</th>
                                                        <th>Tanggal</th>
                                                        <th>Jenis Barang</th>
                                                        <th>Berat</th>
                                                        <th>Total</th>
                                                        <th>Nama Petugas</th>
                                                        <th style="width: 230px">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php $no = 1;
                                                        foreach ($daur as $d) { ?>
                                                    <tr>
                                                        <td><?php echo $no; ?></td>
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
                                                        <td>Rp.<?php echo $d->total; ?></td>
                                                        <td>
                                                            <?php 
                                                                $petugas_id = $d->idPetugas;
                                                                $petugas = $this->db->get_where('tbl_petugas', array('idPetugas' => $petugas_id))->row();
                                                                echo $petugas->name;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="<?php echo site_url('petugasdaur/get_by_id/' . $d->idDaur); ?>" class="btn btn-warning">Ubah Iuran</a>
                                                                <a href="<?php echo site_url('petugasdaur/delete/' . $d->idDaur); ?>" onclick="return confirm('Yakin Akan Menghapus Data Ini')" class="btn btn-danger">Hapus</a>
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
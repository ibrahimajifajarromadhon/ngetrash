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
                                            <h3 class="card-title">Data Iuran Wajib</h3>
                                        </div>
                                        <?php if ($this->session->flashdata('success')) : ?>
                                            <div class="ml-2 mr-2 mt-2 mb-0 alert alert-success alert-dismissible text-whitesmoke">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong><?php echo $this->session->flashdata('success'); ?></strong>
                                            </div>
                                        <?php endif; ?>
                                        <div class="pl-2 pt-2">
                                            <a href="<?php echo site_url('petugas_iuran/add'); ?>" class="btn btn-sm btn-info float-left p-2"><b> Tambah Data Iuran </b></a>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="table-responsive p-2">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">No</th>
                                                        <th>Nama User</th>
                                                        <th>Tanggal</th>
                                                        <th>Jenis Bayar</th>
                                                        <th>Status</th>
                                                        <th>Nama Petugas</th>
                                                        <th style="width: 230px">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php $no = 1;
                                                        foreach ($iuran as $i) { ?>
                                                    <tr>
                                                        <th style="text-align: center;"><?php echo $no; ?></th>
                                                        <td>
                                                            <?php
                                                            $user_id = $i->idUser;
                                                            $user = $this->db->get_where('tbl_user', array('idUser' => $user_id))->row();
                                                            echo $user->name;
                                                            ?>
                                                        </td>
                                                        <td><?php
                                                            $date = new DateTime($i->tanggal);
                                                            $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                                            $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                                                            echo $hari[$date->format('w')] . ', ' . $date->format('j') . ' ' . $bulan[$date->format('n') - 1] . ' ' . $date->format('Y');
                                                            ?></td>
                                                        <td><b style="background-color: <?php echo ($i->jenisBayar == 'Tunai') ? 'blue' : 'orangered'; ?>; padding: 4px; color: white; border-radius: 10px; display: inline-block;"><?php echo $i->jenisBayar; ?></b></td>
                                                        <td><b style="background-color: <?php echo ($i->status == 'Sudah Bayar') ? 'green' : 'red'; ?>; padding: 4px; color: white; border-radius: 10px; display: inline-block;"><?php echo $i->status; ?></b></td>
                                                        <td>
                                                            <?php
                                                            $petugas_id = $i->idPetugas;
                                                            $petugas = $this->db->get_where('tbl_petugas', array('idPetugas' => $petugas_id))->row();
                                                            echo $petugas->name;
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="<?php echo site_url('petugas_iuran/get_by_id/' . $i->idIuran); ?>" class="btn btn-warning">Ubah Iuran</a>
                                                                <a href="<?php echo site_url('petugas_iuran/delete/' . $i->idIuran); ?>" onclick="return confirm('Yakin Akan Menghapus Data Ini?')" class="btn btn-danger">Hapus</a>
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
                                                    <a class="page-link" href="<?php echo site_url('petugas_iuran/page/' . $links['prev_page']); ?>" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>

                                                <?php for ($i = 1; $i <= $links['num_pages']; $i++) : ?>
                                                    <li class="page-item <?php echo ($i == $links['current_page']) ? 'active' : ''; ?>">
                                                        <a class="page-link" href="<?php echo site_url('petugas_iuran/page/' . $i); ?>"><?php echo $i; ?></a>
                                                    </li>
                                                <?php endfor; ?>

                                                <li class="page-item">
                                                    <a class="page-link" href="<?php echo site_url('petugas_iuran/page/' . $links['next_page']); ?>" aria-label="Next">
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
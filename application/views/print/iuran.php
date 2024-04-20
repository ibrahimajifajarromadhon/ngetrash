<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Iuran Wajib | NgeTrash</title>
    <style>
        body {
            width: 90%;
            margin: auto;
        }

        table {
            border: 1px solid #ddd;
            width: 100%;
            margin-top: 20px;
            margin-bottom: 12px;
            border-collapse: collapse;
            text-align: left;
        }

        td,
        th {
            border: 1px solid #ddd;
            padding: 12px;
        }

        table th {
            font-weight: bold;
            text-align: left;
        }

        span {
            margin-left: 20px;
        }

        .center {
            text-align: center;
        }

        #no {
            width: 30px;
        }
    </style>
</head>

<body>
    <h5>NgeTrash</h5>
    <h1>Laporan Data Iuran Wajib</h1>
    <table>
        <tr>
            <th class="center" id="no">#</th>
            <th>Nama User</th>
            <th>Tanggal</th>
            <th>Jenis Bayar</th>
            <th>Status Bayar</th>
            <th>Nama Petugas</th>
        </tr>
        <tbody>
            <tr>
                <?php $no = 1;
                foreach ($data_iuran as $i) { ?>
            <tr>
                <td><?php echo $no; ?></td>
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
                <td><b><?php echo $i->jenisBayar; ?></b></td>
                <td><b><?php echo $i->status; ?></b></td>
                <td>
                    <?php
                    $petugas_id = $i->idPetugas;
                    $petugas = $this->db->get_where('tbl_petugas', array('idPetugas' => $petugas_id))->row();
                    echo $petugas->name;
                    ?>
                </td>
            </tr>
        <?php $no++;
                } ?>
        </tbody>
    </table>
    <p>Note: Year-month-day time format (yyyy-mm-dd)</p>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Status Pengambilan Sampah | NgeTrash</title>
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
    <h1>Laporan Data Status Pengambilan Sampah</h1>
    <table>
        <tr>
            <th class="center" id="no">#</th>
            <th>Nama User</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Nama Petugas</th>
        </tr>
        <tbody>
            <?php
            $no = 1;
            foreach ($data_status as $s) { ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php
                        $user_id = $s->idUser;
                        $user = $this->db->get_where('tbl_user', array('idUser' => $user_id))->row();
                        echo $user->name;
                        ?></td>
                    <td><?php echo $s->tanggal; ?></td>
                    <td><b><?php echo $s->keterangan; ?></b></td>
                    <td>
                        <?php
                        $petugas_id = $s->idPetugas;
                        $petugas = $this->db->get_where('tbl_petugas', array('idPetugas' => $petugas_id))->row();
                        echo $petugas->name;
                        ?>
                    </td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
    </div>
    <p>Note: Year-month-day time format (yyyy-mm-dd)</p>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
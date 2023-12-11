<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data User | NgeTrash</title>
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
    <h1>Laporan Data User</h1>
    <table>
        <tr>
            <th class="center" id="no">#</th>
            <th>Nama User</th>
            <th>Username</th>
            <th>Alamat</th>
            <th>Saldo Masuk</th>
            <th>Saldo Keluar</th>
            <th>Total Saldo</th>
            <th>Status Aktif</th>
        </tr>
        <tbody>
            <tr>
                <?php $no = 1;
                foreach ($data_user as $usr) { ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $usr->name; ?></td>
                <td><?php echo $usr->userName; ?></td>
                <td><?php echo $usr->alamat; ?></td>
                <td>Rp. <?php echo $usr->saldoMasuk; ?></td>
                <td>Rp. <?php echo $usr->saldoKeluar; ?></td>
                <td>Rp. <?php echo $usr->totalSaldo; ?></td>
                <td><b><?php if ($usr->statusAktif == "Y") {
                            echo "Aktif";
                        } else {
                            echo "Tidak Aktif";
                        } ?></b></td>
            </tr>
        <?php $no++;
                } ?>
        </tbody>
    </table>
    </div>
    <p>Note: Year-month-day time format (yyyy-mm-dd)</p>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
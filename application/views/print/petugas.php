<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Petuga | NgeTrash</title>
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
    <h1>Laporan Data Petugas</h1>
    <table>
        <tr>
            <th class="center" id="no">#</th>
            <th>Nama Petugas</th>
            <th>Username</th>
            <th>Status Aktif</th>
        </tr>
        <?php
        $no = 1;
        foreach ($data_petugas as $p) {
        ?>
            <tr>
                <th><?php echo $no++ ?></th>
                <td><?php echo $p->name ?></td>
                <td><?php echo $p->userName ?></td>
                <td><b><?php if ($p->statusAktif == "Y") {
                            echo "Aktif";
                        } else {
                            echo "Tidak Aktif";
                        } ?></b></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <p>Note: Year-month-day time format (yyyy-mm-dd)</p>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
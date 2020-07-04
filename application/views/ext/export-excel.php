<html>

<head>
    <title>Export Data Ke Excel Dengan PHP - www.malasngoding.com</title>
</head>

<body>
    <style type="text/css">
    body {
        font-family: sans-serif;
    }

    table {
        margin: 20px auto;
        border-collapse: collapse;
    }

    table th,
    table td {
        border: 1px solid #3c3c3c;
        padding: 3px 8px;

    }

    a {
        background: blue;
        color: #fff;
        padding: 8px 10px;
        text-decoration: none;
        border-radius: 2px;
    }
    </style>

    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=DataIde <?= Date('Y') ?>.xls");
    ?>

    <center>
        <h1>Test Export</h1>
    </center>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Kode Rekening</th>
            <th>Nama Bidang</th>
            <th>Sub Rekening</th>
            <th>Sub Bidang</th>
            <th>Usulan</th>
            <th>Unit</th>
            <th>Panjang</th>
            <th>Lebar</th>
            <th>Tinggi</th>
            <th>M<sup>3</sup></th>
            <th>Anggaran (Rp)</th>
            <th>Sub Total (Rp)</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($usulan->result() as $key) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $key->kode_rek ?></td>
            <td><?= $key->nama_bidang ?></td>
            <td><?= $key->Sub_rek ?></td>
            <td><?= $key->nama_sub_bidang ?></td>
            <td><?= $key->usulan ?></td>
            <td><?= $key->unit ?></td>
            <td><?= $key->panjang ?></td>
            <td><?= $key->lebar ?></td>
            <td><?= $key->tinggi ?></td>
            <td><?= $key->m3 ?></td>
            <td><?= $key->anggaran ?></td>
            <td><?= $key->total ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
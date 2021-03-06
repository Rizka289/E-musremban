<html>

<head>
    <title>RENCANA KERJA PEMERINTAH </title>
</head>

<body>
    <style type="text/css">
    body {
        font-family: sans-serif;
    }

    table {
        margin: 20px auto;

    }

    table td {
        border: 1px solid #3c3c3c;
        min-width: 300px;
        vertical-align: center;
        text-align: left;
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
    header("Content-Disposition: attachment; filename=RENCANA KERJA PEMERINTAH DESA TAMANSARI " . Date('Y') . ".xls");
    $this->load->model('Data_model');
    ?>

    <center>
        <div style="font-size:18pt">RENCANA KERJA PEMERINTAH DESA TAMAN SARI</div>
        <div>Tahun Anggaran <?= date('Y'); ?></div>
    </center>
    <br>
    <table border="1">
        <tr>
            <th>Kode Rekening</th>
            <th colspan="2">URAIAN</th>
            <th colspan="10">Anggaran(Rp)</th>
        </tr>
        <?php foreach ($hasil as $key) : ?>
        <tr>
            <td><?= $key->kode_rek ?></td>
            <td colspan="2"><?= $key->nama_bidang ?></td>
            <td colspan="10"></td>
        </tr>
        <?php
            $data1 = $this->Data_model->getitem2($key->id_bidang);
            foreach ($data1->result() as $row) {
                echo '<tr>';
                echo '<td></td>';
                echo '<td>' . $row->Sub_rek . '</td>';
                echo '<td>' . $row->nama_sub_bidang . '</td>';
                echo '<td>Hr</td>'; //
                echo '<td>Or</td>'; //
                echo '<td>P</td>';
                echo '<td>L</td>';
                echo '<td>T</td>';
                echo '<td>Unit</td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '</tr>';
                $data2 = $this->Data_model->exporttable(Date('Y'), $row->Id_sub_bidang);
                foreach ($data2->result() as $row1) {
                    echo '<tr>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td>' . $row1->usulan . '</td>';
                    echo '<td>' . ($row1->hari == 0 ? (' ') : ($row1->hari)) . '</td>'; //
                    echo '<td>' . ($row1->org == 0 ? (' ') : ($row1->org)) . '</td>'; //
                    echo '<td>' . $row1->panjang . '</td>';
                    echo '<td>' . $row1->lebar . '</td>';
                    echo '<td>' . $row1->tinggi . '</td>';
                    echo '<td>' . ($row1->unit == 0 ? (' ') : ($row1->unit))  . '</td>';
                    echo '<td>' . $row1->m3 . '</td>';
                    echo '<td>m<sup>2</sup></td>';
                    echo '<td>' . $row1->anggaran . '</td>';
                    echo '<td>' . $row1->total . '</td>';
                    echo '</tr>';
                }
            }
            ?>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
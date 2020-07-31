<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header " style="background-color: blue"></div>
            <div class="card-body">
                <h1 align="center" style="color: blue">DETAIL DATA USULAN</h1>
                <table style="text-align: left" width=620 border="1">
                    <div>
                        <label>Username : <?= $isi_usulan->username ?></label>
                        <label></label>
                    </div>
                    <tbody>
                        <tr>
                            <th colspan="2" style="text-align: center">KETERANGAN</th>
                            <th colspan="2" style="text-align: center">RINCIAN ANGGARAN BIAYA</th>
                        </tr>
                        <tr>
                            <td rowspan="4">Nama Bidang</td>
                            <td rowspan="4" width=200><?= $isi_usulan->kode_rek . $isi_usulan->nama_bidang ?></td>
                            <td>Panjang</td>
                            <td><?= $isi_usulan->panjang ?></td>
                        </tr>
                        <tr>
                            <td>Lebar</td>
                            <td><?= $isi_usulan->lebar ?></td>
                        </tr>
                        <tr>
                            <td>Tinggi</td>
                            <td><?= $isi_usulan->tinggi ?></td>
                        </tr>
                        <tr>
                            <td>M<sup>2</sup></td>
                            <td><?= $isi_usulan->m3 ?></td>
                        </tr>
                        <tr>
                            <td rowspan="3">Nama Sub Bidang</td>
                            <td rowspan="3"><?= $isi_usulan->Sub_rek . $isi_usulan->nama_sub_bidang ?></td>
                            <td>Unit</td>
                            <td><?= $isi_usulan->unit ?></td>
                        </tr>
                        <tr>
                            <td>Hari</td>
                            <td><?= $isi_usulan->hari ?></td>
                        </tr>
                        <tr>
                            <td>Orang</td>
                            <td><?= $isi_usulan->org ?></td>
                        </tr>
                        <tr>
                            <td rowspan="2">Usulan</td>
                            <td rowspan="2"><?= $isi_usulan->usulan ?></td>
                        </tr>
                        <tr>
                            <td>Anggaran (Rp)</td>
                            <td><?= $isi_usulan->anggaran ?></td>
                        </tr>
                        <tr>
                            <td colspan="3">SUB TOTAL (Rp)</td>
                            <td><?= $isi_usulan->total ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
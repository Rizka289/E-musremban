<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">RENCANA KERJA PEMERINTAH</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a target="_blank" class="btn btn-primary" href="<?= site_url() . '/InputData/test2' ?>">EXPORT KE EXCEL</a>
            <table class="table table-bordered" id="exttable" width="100%" cellspacing="0">

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
                    <th>M<sup>2</sup></th>
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

        </div>
    </div>
</div>
</div>
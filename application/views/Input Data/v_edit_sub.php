<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header " style="background-color: blue"></div>
            <div class="card-body">

                <form action="<?= site_url('Sub_bidang/proses_edit/') ?>" method="post">
                    <div class="form-group">
                        <label>Kode Rekening</label>
                        <select class="custom-select" id="idrekening" name="idrekening"
                            value="<?= $idrek->kode_rek; ?>">
                            <option>-Pilih-</option>
                            <?php foreach ($Sub as $key) : ?>
                            <option value="<?= $key->kode_rek; ?>"><?= $key->kode_rek; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label>Nama Bidang</label>
                        <input type="text" class="form-control" name="narek" autocomplete="off">
                        <label>Sub Kode Rekening</label>
                        <input type="text" class="form-control" name="SubRek" value="<?= $isi_subB->Sub_rek ?>">
                        <label>Nama Sub Bidang</label>
                        <input type="text" class="form-control" name="Nasub" value="<?= $isi_subB->nama_sub_bidang ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $isi_subB->Id_sub_bidang; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header " style="background-color: blue"></div>
            <div class="card-body">

                <form action="<?= site_url('Bidang/proses_edit/') ?>" method="post">

                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Tahun</label>
                                <select class="custom-select" id="" name="tahun">
                                    <option>-Pilih-</option>
                                    <?php foreach ($tbl_t as $key) : ?>
                                    <option value="<?= $key->id_tahun ?>"><?= $key->tahun; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <label>Kode Rekening</label>
                            <input type="text" class="form-control" name="kode_rek" autocomplete="off"
                                value="<?= $isi_bidang->kode_rek; ?>">

                            <label>Nama Bidang</label>
                            <input type="text" class="form-control" name="nama_bid"
                                value="<?= $isi_bidang->nama_bidang ?>" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $isi_bidang->id_bidang; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
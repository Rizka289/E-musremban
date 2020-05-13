<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header " style="background-color: blue"></div>
            <div class="card-body">

                <form action="<?= site_url('Bidang/proses_edit/') ?>" method="post">
                    <div class="form-group">
                        <label>Kode Rekening</label>
                        <input type="text" class="form-control" name="korek" value="<?= $isi_bidang->kode_rek; ?>"
                            autocomplete="off">
                        <label>Nama Rekening</label>
                        <input type="text" class="form-control" name="narek" value="<?= $isi_bidang->Nama_rek; ?>"
                            autocomplete="off">
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
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header " style="background-color: blue"></div>
            <div class="card-body">

                <form action="<?= site_url('InputData/proses_edit/') ?>" method="post">
                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="text" class="form-control" name="tahun" value="<?= $isi_tahun->tahun; ?>"
                            autocomplete="off">
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $isi_tahun->id_tahun; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
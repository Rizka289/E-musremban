<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header " style="background-color: blue"></div>
            <div class="card-body">

                <form action="<?= site_url() ?>" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" value="" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" value="" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <input type="text" class="form-control" value="" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="id" value="">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
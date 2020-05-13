<?php if ($this->session->flashdata()) : ?>
<script>
alert('Sukses');
</script>
<?php endif; ?>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="TambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Bidang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('bidang/tambah') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Rekening</label>
                        <input type="text" class="form-control" id="korek" name="korek" autocomplete="off">
                        <label>Nama Rekening</label>
                        <input type="text" class="form-control" id="narek" name="narek" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="insertdata" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Bidang</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i
                    class="fas fa-fw fa-plus-circle"></i>Tambah</button>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Rekening</th>
                        <th>Nama Rekening</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php $i = 1; ?>
                <?php foreach ($bidang as $key) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $key->kode_rek; ?></td>
                    <td><?= $key->Nama_rek; ?></td>
                    <td>
                        <a href="<?= site_url('bidang/edit/' . $key->id_bidang) ?>"><i
                                class="far fa-fw fa-edit"></i></a>
                        <a onclick="return confirm ('yakin?');"
                            href="<?= site_url('bidang/hapus/' . $key->id_bidang) ?>"><i
                                class="fas fa-fw fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php $i++ ?>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->
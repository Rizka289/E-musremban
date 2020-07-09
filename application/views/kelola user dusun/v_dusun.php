<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="TambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data User Dusun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= site_url('Login/tambahDusun') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" autocomplete="off">
                        <label>Password</label>
                        <div class=" form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user" id="password1"
                                    placeholder="Password" name="password1">
                                <?= form_error('password1', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" id="password2"
                                    name="password2" placeholder="Repeat Password">
                            </div>
                        </div>

                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" autocomplete="off">

                        <label>Agama</label>
                        <input type="text" class="form-control" name="agama" autocomplete="off">

                        <label>No Hp</label>
                        <input type="text" class="form-control" name="nope" autocomplete="off">
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
        <h6 class="m-0 font-weight-bold text-primary">Data User Dusun</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i
                    class="fas fa-fw fa-plus-circle"></i>Tambah</button>
            <table class="table table-bordered" id="exttable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Alamat</th>
                        <th>No Hp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i =
                        $this->uri->segment('3') + 1; ?>
                    <?php foreach ($user as $dusun) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $dusun->username ?></td>
                        <td><?= $dusun->alamat ?></td>
                        <td><?= $dusun->no_hp ?></td>
                        <td>
                            <a onclick="return confirm ('yakin?');"
                                href="<?= site_url('Login/hapusDusun/' . $dusun->id_dusun) ?>" class="btn btn-danger"><i
                                    class="fas fa-fw fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
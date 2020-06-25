<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data User Dusun</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                href="<?= site_url('UserDusun/hapus/' . $dusun->id_dusun) ?>" class="btn btn-danger"><i
                                    class="fas fa-fw fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col">
                    <?= $pagination; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
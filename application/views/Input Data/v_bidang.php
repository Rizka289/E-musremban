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

            <form action="<?= site_url('bidang/create') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">

                        <div class="form-group">
                            <label>Tahun</label>

                            <select class="custom-select" onfocus="this.size=5" onblur="this.size=1"
                                onchange="this .size=1;this.blur()" name="tahun">
                                <div class="test">
                                    <option>-Pilih-</option>
                                    <?php foreach ($tbl_t as $key) : ?>
                                    <option value="<?= $key->id_tahun ?>"><?= $key->tahun; ?></option>
                                    <?php endforeach; ?>
                                </div>
                            </select>
                        </div>

                        <label>Kode Rekening</label>
                        <input type="text" class="form-control" name="kode_rek" autocomplete="off">

                        <label>Nama Bidang</label>
                        <input type="text" class="form-control" name="nama_bid" autocomplete="off">
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
            <?php
            if ($this->session->flashdata('message')) {
                echo "<div class='alert alert-primary'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>" . $this->session->flashdata('message') . "</div>";
            }
            ?>
            <?php if ($this->session->userdata('dusun') != "dusun") { ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i
                    class="fas fa-fw fa-plus-circle"></i>Tambah</button>
            <?php } ?>
            <table class="table table-bordered" id="exttable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Kode Rekening</th>
                        <th>Nama Bidang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i =
                        $this->uri->segment('3') + 1; ?>
                    <?php foreach ($bidang as $key) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $key->tahun ?></td>
                        <td><?= $key->kode_rek ?></td>
                        <td><?= $key->nama_bidang ?> </td>
                        <td>
                            <?php if ($this->session->userdata('dusun') != "dusun") { ?>
                            <a href="<?= site_url('bidang/edit/' . $key->id_bidang) ?>" class="btn btn-warning"><i
                                    class="far fa-fw fa-edit"></i></a>
                            <a onclick="return confirm ('yakin?');"
                                href="<?= site_url('bidang/hapus/' . $key->id_bidang) ?>" class="btn btn-danger"><i
                                    class="fas fa-fw fa-trash-alt"></i></a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
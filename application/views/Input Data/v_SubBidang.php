<?php
if (validation_errors() != "") {
    echo "<div class='alert alert-danger' role='alert'>";
    echo validation_errors();
    echo "</div>";
}
?>
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="TambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Sub Bidang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= site_url('InputData/createSub') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Nama Bidang</label>
                            <select class="custom-select" onfocus="this.size=5" onblur="this.size=1"
                                onchange="this .size=1;this.blur()" id="idrekening" name="idrekening">
                                <option value="">-Pilih-</option>
                                <?php foreach ($dt as $key) : ?>
                                <option value="<?= $key->id_bidang; ?>"><?= $key->kode_rek . $key->nama_bidang ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <label>Sub Rekening</label>
                        <input type="text" class="form-control" name="SubRek" autocomplete="off"
                            placeholder="Contoh 2.2.1" pattern="[0-9]{1,9}.[0-9]{1,9}.[0-9]{1,9}">

                        <label>Nama Sub Bidang</label>
                        <input type="text" class="form-control" name="Nasub" autocomplete="off" required>
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
        <h6 class="m-0 font-weight-bold text-primary">Data Sub Bidang</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <?php
            if ($this->session->flashdata('message')) {
                echo "<div class='alert alert-primary'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>" . $this->session->flashdata('message') . "</div>";
            }
            ?>
            <?php if ($this->session->userdata('user') != "dusun") { ?>
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
                        <th>Sub Rekening</th>
                        <th>Nama Sub Bidang</th>
                        <?php if ($this->session->userdata('user') != 'dusun') { ?>
                        <th>Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($subBidang as $key) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $key->tahun ?></td>
                        <td><?= $key->kode_rek ?></td>
                        <td><?= $key->nama_bidang ?></td>
                        <td><?= $key->Sub_rek ?> </td>
                        <td><?= $key->nama_sub_bidang ?>
                        </td>
                        <?php if ($this->session->userdata('user') != "dusun") { ?>
                        <td>
                            <a href="<?= site_url('INputData/editSub/' . $key->Id_sub_bidang) ?>"
                                class="btn btn-warning"><i class="far fa-fw fa-edit"></i></a>
                            <a onclick="return confirm ('yakin?');"
                                href="<?= site_url('InputData/hapusSub/' . $key->Id_sub_bidang) ?>"
                                class="btn btn-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
                        </td>
                        <?php } ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>
</div>
</div>
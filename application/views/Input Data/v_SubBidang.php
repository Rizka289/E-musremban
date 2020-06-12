<!-- Modal Tambah Data -->
<?php
echo '<script type="text/javascript">';
echo "let data = " . json_encode($Sub) . "\n";
echo '</script>';
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
            <form action="<?= site_url('sub_bidang/create') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Kode Rekening</label>
                            <select class="custom-select" id="idrekening" name="idrekening">
                                <option>-Pilih-</option>
                                <?php foreach ($Sub as $key) : ?>
                                <option value="<?= $key->kode_rek; ?>"><?= $key->kode_rek; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <label>Nama Bidang</label>
                        <input type="text" class="form-control" name="nama_bid" autocomplete="off" id="nama_bidang">
                        <label>Sub Rekening</label>
                        <input type="text" class="form-control" name="SubRek" autocomplete="off">
                        <label>Nama Sub Bidang</label>
                        <input type="text" class="form-control" name="Nasub" autocomplete="off">
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i
                    class="fas fa-fw fa-plus-circle"></i>Tambah</button>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Rekening</th>
                        <th>Nama Bidang</th>
                        <th>Sub Rekening</th>
                        <th>Nama Sub Bidang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i =
                        $this->uri->segment('3') + 1; ?>
                    <?php foreach ($subBidang as $key) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $key->kode_rek ?></td>
                        <td><?= $key->Nama_rek ?></td>
                        <td><?= $key->Sub_rek ?> </td>
                        <td><?= $key->nama_sub_bidang ?>
                        </td>
                        <td>
                            <a href="<?= site_url('Sub_bidang/edit/' . $key->Id_sub_bidang) ?>"
                                class="btn btn-warning"><i class="far fa-fw fa-edit"></i></a>
                            <a onclick="return confirm ('yakin?');"
                                href="<?= site_url('Sub_bidang/hapus/' . $key->Id_sub_bidang) ?>"
                                class="btn btn-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="rows">
                <div class="col">
                    <?= $pagination; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
console.log(data);
let idrekening = document.getElementById('idrekening');
idrekening.addEventListener("change", function() {
    var selectedCountry = $(this).children("option:selected").val();
    let result = data.find(function(item) {
        return item.kode_rek == selectedCountry
    })
    document.getElementById('nama_bidang').value = result.nama_bidang;
})
</script>
<!-- /.container-fluid -->
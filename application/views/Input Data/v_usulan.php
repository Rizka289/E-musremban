<?php
echo '<script type="text/javascript">';
echo "let data = " . json_encode($bidang) . "\n";
echo "let sub = " . json_encode($subBi) . "\n";
echo '</script>';
?>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="TambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Usulan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('usulan/create') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Kode Rekening</label>
                            <select class="custom-select" onfocus="this.size=5" onblur="this.size=1"
                                onchange="this .size=1;this.blur()" id="idrekening" name="idrekening">
                                <option>-Pilih-</option>
                                <?php foreach ($bidang as $key) : ?>
                                <option value="<?= $key->id_bidang; ?>"><?= $key->kode_rek; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <label>Nama Bidang</label>
                        <input type="text" class="form-control" name="nama_bidang" autocomplete="off" id="nama_bidang">

                        <div class="form-group">
                            <label>Sub Rekening</label>
                            <select class="custom-select" onfocus="this.size=5" onblur="this.size=1"
                                onchange="this.size=1;this.blur()" id="subRek" name="sub">
                                <option>-Pilih-</option>
                                <?php foreach ($subBi as $key) : ?>
                                <option value="<?= $key->Id_sub_bidang ?>"><?= $key->Sub_rek ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <label>Nama Sub Bidang</label>
                        <input type="text" class="form-control" name="sub_Bidang" autocomplete="off" id="sub_Bidang">

                        <label>Usulan</label>
                        <input type="text" class="form-control" name="usulan" autocomplete="off">

                        <label>Panjang</label>
                        <input type="text" class="form-control" name="panjang" autocomplete="off">

                        <label>Lebar</label>
                        <input type="text" class="form-control" name="lebar" autocomplete="off">

                        <label>M3</label>
                        <input type="text" class="form-control" name="m3" autocomplete="off">

                        <label>Anggaran (Rp)</label>
                        <input type="text" class="form-control" name="anggaran" autocomplete="off">

                        <label>Total (Rp)</label>
                        <input type="text" class="form-control" name="total" autocomplete="off">

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
        <h6 class="m-0 font-weight-bold text-primary">Data Usulan</h6>
    </div>
    <?php
    if ($this->session->flashdata('message')) {
        echo "<div class='alert alert-primary'><button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button>" . $this->session->flashdata('message') . "</div>";
    }
    ?>
    <div class="card-body">
        <div class="table-responsive">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i
                    class="fas fa-fw fa-plus-circle"></i>Tambah</button>

            <table class="table table-bordered" id="exttable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Rekening</th>
                        <th>Nama Bidang</th>
                        <th>Sub Rekening</th>
                        <th>Sub Bidang</th>
                        <th>Usulan</th>
                        <th>Panjang</th>
                        <th>Lebar</th>
                        <th>M3</th>
                        <th>Anggaran (Rp)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = $this->uri->segment('3') + 1; ?>
                    <?php foreach ($usulan as $key) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $key->kode_rek ?></td>
                        <td><?= $key->nama_bidang ?></td>
                        <td><?= $key->Sub_rek ?></td>
                        <td><?= $key->nama_sub_bidang ?></td>
                        <td><?= $key->usulan ?></td>
                        <td><?= $key->panjang ?></td>
                        <td><?= $key->lebar ?></td>
                        <td><?= $key->m3 ?></td>
                        <td><?= $key->anggaran ?></td>
                        <td>
                            <?php if ($this->session->userdata('dusun') != "dusun") { ?>
                            <a href="<?= site_url('usulan/edit/' . $key->id_usulan) ?>" class="btn btn-warning"><i
                                    class="far fa-fw fa-edit"></i></a>
                            <?php } ?>
                            <a onclick="return confirm ('yakin?');"
                                href="<?= site_url('usulan/hapus/' . $key->id_usulan) ?>" class="btn btn-danger"><i
                                    class="fas fa-fw fa-trash-alt"></i></a>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

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
        return item.id_bidang == selectedCountry
    })
    document.getElementById('nama_bidang').value = result.nama_bidang;
})
let subRek = document.getElementById('subRek');
subRek.addEventListener("change", function() {
    var selectedCountry = $(this).children("option:selected").val();
    let result = sub.find(function(item) {
        return item.Id_sub_bidang == selectedCountry
    })
    document.getElementById('sub_Bidang').value = result.nama_sub_bidang;
})
</script>
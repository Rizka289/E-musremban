<?php
if (validation_errors() != "") {
    echo "<div class='alert alert-danger' role='alert'>";
    echo validation_errors();
    echo "</div>";
}
?>
<?php
$user = json_decode($_COOKIE['user']);
$username = $user->username;
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
            <form action="<?= site_url('InputData/createUsulan') ?>" method="post" name='formUsulan'>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Nama Bidang</label>
                            <select class="custom-select" onfocus="this.size=5" onblur="this.size=1"
                                onchange="this .size=1;this.blur()" id="idrekening" name="idrekening">
                                <option value="">-Pilih-</option>
                                <?php foreach ($lte->result() as $key) : ?>
                                <option value="<?= $key->id_bidang; ?>"><?= $key->kode_rek . $key->nama_bidang ?>
                                </option>
                                <?php echo $key->id_bidang ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Nama Sub Bidang</label>
                            <select class="custom-select" onfocus="this.size=5" onblur="this.size=1"
                                onchange="this.size=1;this.blur()" id="subRek" name="sub">
                                <option value="">-Pilih-</option>
                                <?php foreach ($subBi as $key) : ?>
                                <option value="<?= $key->Id_sub_bidang ?>"><?= $key->Sub_rek . $key->nama_sub_bidang ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <input type="hidden" class="form-control" name="username" value="<?= $username ?>"
                            autocomplete="off">
                        <label>Usulan</label>
                        <input type="text" class="form-control" name="usulan" autocomplete="off" required>

                        <label>Unit</label>
                        <input type="number" class="form-control" name="unit" autocomplete="off" id="unit">

                        <div class="form-check form-check-inline my-2">
                            <input class="form-check-input mr-2" type="radio" name="panjangCheck" id="panjang1"
                                value="panjang1" checked>

                            <label class="form-check-label" for="panjang1">Panjang</label>&ensp;
                            <input type="text" class="form-control col-md-2" name="panjang[0]" autocomplete="off"
                                id="panjang">

                            &ensp;<label>Lebar</label>&ensp;
                            <input type="text" class="form-control col-md-2 " name="lebar" autocomplete="off"
                                id="lebar">
                        </div>


                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="panjangCheck" id="panjang2"
                                value="panjang2">

                            <label class="form-check-label" for="panjang2">Panjang</label>&ensp;
                            <input type="text" class="form-control col-md-2" name="panjang[1]" autocomplete="off"
                                id="panjang3">

                            &ensp;<label>Tinggi</label>&ensp;
                            <input type="text" class="form-control col-md-2" name="tinggi" autocomplete="off"
                                id="tinggi">
                        </div>

                        <label>M<sup>2</sup></label>
                        <input type="text" class="form-control" name="m3" autocomplete="off" id="m3">

                        <label>Hari</label>
                        <input type="text" class="form-control" name="hari" autocomplete="off" id="hari">

                        <label>Orang</label>
                        <input type="text" class="form-control" name="orang" autocomplete="off" id="orang">

                        <label>Anggaran (Rp)</label>
                        <input type="text" class="form-control" name="anggaran" autocomplete="off" id="anggaran">

                        <label>Sub Total (Rp)</label>
                        <input type="text" class="form-control" name="total" autocomplete="off" id="subtotal">
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
            <?php if ($this->session->userdata('user') != 'desa') { ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i
                    class="fas fa-fw fa-plus-circle"></i>Tambah</button>
            <?php } ?>
            <table class="table table-bordered" id="exttable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Rekening</th>
                        <th>Nama Bidang</th>
                        <th>Sub Rekening</th>
                        <th>Sub Bidang</th>
                        <th>Usulan</th>
                        <th>Unit</th>
                        <th>Panjang</th>
                        <th>Lebar</th>
                        <th>Tinggi</th>
                        <th>M<sup>2</sup></th>
                        <th>Hari</th>
                        <th>Orang</th>
                        <th>Anggaran (Rp)</th>
                        <th>Sub Total (Rp)</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($usulan as $key) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $key->kode_rek ?></td>
                        <td><?= $key->nama_bidang ?></td>
                        <td><?= $key->Sub_rek ?></td>
                        <td><?= $key->nama_sub_bidang ?></td>
                        <td><?= $key->usulan ?></td>
                        <td><?= $key->unit ?></td>
                        <td><?= $key->panjang ?></td>
                        <td><?= $key->lebar ?></td>
                        <td><?= $key->tinggi ?></td>
                        <td><?= $key->m3 ?></td>
                        <td><?= $key->hari ?></td>
                        <td><?= $key->org ?></td>

                        <td><?= $key->anggaran ?></td>
                        <td><?= $key->total ?></td>

                        <?php if ($this->session->userdata('user') == 'dusun') : ?>
                        <td>
                            <?php if ($key->status == 'Ya') : ?>
                            <p style="font-style: italic; font-size: 17px; color: green; font-weight: bold">usulan sudah
                                disetujui</p>

                            <?php endif;
                                    if ($key->status == 'Tidak') : ?>
                            <p style="font-style: italic; font-size: 17px; color: red; font-weight: bold">usulan tidak
                                disetujui</p>
                            <?php endif;
                                    if (empty($key->status)) : ?>
                            <p style="font-style: italic; font-size: 17px; color: info; font-weight: bold">usulan belum
                                disetujui</p>
                            <?php endif ?>

                        </td>
                        <?php endif ?>

                        <!-- untuk desa -->
                        <?php if ($this->session->userdata('user') == 'desa') : ?>
                        <td>
                            <?php if ($key->status == 'Ya') : ?>
                            <p style="font-style: italic; font-size: 17px; color: green; font-weight: bold">usulan sudah
                                disetujui</p>
                            <?php elseif ($key->status == 'Tidak') : ?>
                            <p style="font-style: italic; font-size: 17px; color: red; font-weight: bold">usulan tidak
                                disetujui</p>
                            <?php else : ?>
                            <a href="<?= site_url('InputData/updateUsulan/'  . $key->id_usulan . '/Ya') ?>"
                                class="btn btn-primary btn-sm">Setujui</a>

                            <a href="<?= site_url("InputData/updateUsulan/" . $key->id_usulan . '/Tidak') ?>"
                                class="btn btn-danger btn-sm">Tidak
                                Setuju</a>
                            <?php endif ?>
                        </td>
                        <?php endif ?>


                        <td>
                            <!-- Untuk V_usulan di Dusun -->
                            <?php if ($key->status != 'Ya') : ?>
                            <!-- <?php if ($this->session->userdata('user') != 'desa') { ?>
                            <a href="<?= site_url('InputData/editUsulan/' . $key->id_usulan) ?>"
                                class="btn btn-warning"><i class="far fa-fw fa-edit"></i></a>
                            <?php } ?> -->
                            <a onclick="return confirm ('yakin?');"
                                href="<?= site_url('InputData/hapusUsulan/' . $key->id_usulan) ?>"
                                class="btn btn-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
                            <a href="<?= site_url('InputData/detail/' . $key->id_usulan) ?>">Detail Usulan</a>
                            <?php endif ?>
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
let panjang = 0;
let panjang3 = 0;
let lebar = 0;
let tinggi = 0;
let hari = 0;
let orang = 0;
let m3 = 0;
let anggaran = 1;
let anggr2 = 0;
let unit = '';
let total = 0;

document.getElementById('panjang').addEventListener('input', function(evet) {
    panjang = parseFloat(evet.target.value);
    getCheck();
});
document.getElementById('panjang3').addEventListener('input', function(evet) {
    panjang3 = parseFloat(evet.target.value);
    getCheck();
});
document.getElementById('lebar').addEventListener('input', function(evet) {
    lebar = parseFloat(evet.target.value);
    getCheck();
});
document.getElementById('tinggi').addEventListener('input', function(evet) {
    tinggi = parseFloat(evet.target.value);
    getCheck();
});

function getCheck() {
    let angk3 = anggaran;

    let isCheck = document.querySelectorAll('input[name="panjangCheck"]');
    let selectedValue;
    for (const rb of isCheck) {
        if (rb.checked) {
            selectedValue = rb.value;
            break;
        }
    }
    if (selectedValue == "panjang1") {
        m3 = panjang * lebar;
    } else if (selectedValue == "panjang2") {
        m3 = panjang3 * tinggi;
    }

    document.getElementById('m3').value = m3.toFixed(2);
    if (angk3 > 1) {
        let angk3 = anggaran.replace(/[ .]/, "");
        let subtotal = m3.toFixed(2) * angk3;
        let tes = subtotal.toString()
        console.log(typeof tes);

        document.getElementById('subtotal').value = formatRupiah(tes, '');
    }
}

document.getElementById('anggaran').addEventListener('keyup', function(evet) {
    anggaran = evet.target.value;
    anggr2 = anggaran.replace(/[ .]/, "")
    var bilangan = formatRupiah(anggaran, '');

    document.getElementById('anggaran').value = bilangan

    getCheck();
    getUnit()
});

function formatRupiah(angka, prefix) {
    console.log(typeof angka);

    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return rupiah;
}


document.getElementById('unit').addEventListener('input', function(evet) {
    unit = parseFloat(evet.target.value);
    getUnit()
});

function getUnit() {
    let angk3 = anggr2.replace(/[ .]/, "");
    if (unit != 0 && angk3 != 0) {
        let nilaiunit = unit * angk3
        console.log("unit", unit);

        console.log("angka", angk3);

        console.log("jumlah", nilaiunit);

        let total = formatRupiah(nilaiunit.toString(), '');

        document.getElementById('subtotal').value = total;
    }
}
document.getElementById('hari').addEventListener('input', function(evet) {
    unit = parseFloat(evet.target.value);
});
document.getElementById('orang').addEventListener('input', function(evet) {
    unit = parseFloat(evet.target.value);
});
</script>
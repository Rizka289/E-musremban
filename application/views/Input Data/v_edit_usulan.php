<?php
echo '<script type="text/javascript">';
echo "let idbdg = " . json_encode($isi_usulan->bidang) . "\n";
echo "let subrek = " . json_encode($isi_usulan->Id_sub_bidang) . "\n";
echo "let data = " . json_encode($bidang) . "\n";
echo "let sub = " . json_encode($subBi) . "\n";
echo '</script>';

?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header " style="background-color: blue"></div>
            <div class="card-body">

                <form action="<?= site_url('InputData/proses_editUsulan') ?>" method="post">
                    <div class="form-group">
                        <label>Nama Bidang</label>
                        <select class="custom-select" onfocus="this.size=5" onblur="this.size=1"
                            onchange="this.size=1;this.blur()" id="idrekening" name="idrekening"
                            value="<?= $isi_usulan->id_bidang; ?>">
                            <option value="<?= $isi_usulan->id_bidang; ?>">
                                <?= $isi_usulan->kode_rek; ?><?= $isi_usulan->nama_bidang; ?></option>
                            <?php foreach ($bidang as $key) : ?>
                            <option value="<?= $key->id_bidang; ?>"><?= $key->kode_rek . $key->nama_bidang ?></option>
                            <?php endforeach; ?>
                        </select>

                        <div class="form-group">
                            <label>Nama Sub Bidang</label>
                            <select class="custom-select" onfocus="this.size=5" onblur="this.size=1"
                                onchange="this.size=1;this.blur()" id="subRek" name="sub"
                                value="<?= $isi_usulan->Id_sub_bidang; ?>">
                                <option value="<?= $isi_usulan->Id_sub_bidang; ?>">
                                    <?= $isi_usulan->Sub_rek; ?><?= $isi_usulan->nama_sub_bidang; ?></option>
                                <?php foreach ($subBi as $key) : ?>
                                <option value="<?= $key->Id_sub_bidang ?>"><?= $key->Sub_rek . $key->nama_sub_bidang ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <label>Usulan</label>
                        <input type="text" class="form-control" name="usulan" autocomplete="off"
                            value="<?= $isi_usulan->usulan ?>">

                        <label>Unit</label>
                        <input type="text" class="form-control" name="unit" autocomplete="off" id="unit"
                            value="<?= $isi_usulan->unit ?>">

                        <div class="form-check form-check-inline my-2">
                            <input class="form-check-input mr-2" type="radio" name="panjangCheck" id="panjang1"
                                value="panjang1" checked>

                            <label class="form-check-label" for="panjang1">Panjang</label>&ensp;
                            <input type="text" class="form-control col-md-2" name="panjang[0]" autocomplete="off"
                                id="panjang" value="<?= $isi_usulan->panjang ?>">

                            &ensp;<label>Lebar</label>&ensp;
                            <input type="text" class="form-control col-md-2 " name="lebar" autocomplete="off" id="lebar"
                                value="<?= $isi_usulan->lebar ?>">
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="panjangCheck" id="panjang2"
                                value="panjang2">

                            <label class="form-check-label" for="panjang2">Panjang</label>&ensp;
                            <input type="text" class="form-control col-md-2" name="panjang[1]" autocomplete="off"
                                id="panjang3" value="<?= $isi_usulan->panjang ?>">

                            &ensp;<label>Tinggi</label>&ensp;
                            <input type="text" class="form-control col-md-2" name="tinggi" autocomplete="off"
                                id="tinggi" value="<?= $isi_usulan->tinggi ?>">
                        </div>

                        <div>
                            <label>M<sup>2</sup></label>
                            <input type="text" class="form-control" name="m3" autocomplete="off" id="m3"
                                value="<?= $isi_usulan->m3 ?>">

                            <label>Hari</label>
                            <input type="text" class="form-control" name="hari" autocomplete="off" id="hari">

                            <label>Orang</label>
                            <input type="text" class="form-control" name="orang" autocomplete="off" id="orang">

                            <label>Anggaran (Rp)</label>
                            <input type="text" class="form-control" name="anggaran" autocomplete="off" id="anggaran"
                                value="<?= $isi_usulan->anggaran ?>">

                            <label>Sub Total (Rp)</label>
                            <input type="text" class="form-control" name="total" autocomplete="off" id="subtotal"
                                value="<?= $isi_usulan->total ?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $isi_usulan->id_usulan; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
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

document.getElementById("idrekening").value = "<?= $isi_usulan->id_bidang; ?>";

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
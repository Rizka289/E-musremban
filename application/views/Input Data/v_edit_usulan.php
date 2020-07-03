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
                        <label>Kode Rekening</label>
                        <select class="custom-select" onfocus="this.size=5" onblur="this.size=1"
                            onchange="this.size=1;this.blur()" id="idrekening" name="idrekening"
                            value="<?= $isi_usulan->id_bidang; ?>">
                            <option>-Pilih-</option>
                            <?php foreach ($bidang as $key) : ?>
                            <option value="<?= $key->id_bidang; ?>"><?= $key->kode_rek . $key->nama_bidang ?></option>
                            <?php endforeach; ?>
                        </select>

                        <div class="form-group">
                            <label>Sub Rekening</label>
                            <select class="custom-select" onfocus="this.size=5" onblur="this.size=1"
                                onchange="this.size=1;this.blur()" id="subRek" name="sub"
                                value="<?= $isi_usulan->Id_sub_bidang; ?>">
                                <option>-Pilih-</option>
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

                        <label>Panjang</label>
                        <input type="text" class="form-control" name="panjang" autocomplete="off" id="panjang"
                            value="<?= $isi_usulan->panjang ?>">

                        <label>Lebar</label>
                        <input type="text" class="form-control" name="lebar" autocomplete="off" id="lebar"
                            value="<?= $isi_usulan->lebar ?>">

                        <label>Tinggi</label>
                        <input type="text" class="form-control" name="tinggi" autocomplete="off" id="tinggi"
                            value="<?= $isi_usulan->tinggi ?>">

                        <label>M<sup>3</sup></label>
                        <input type="text" class="form-control" name="m3" autocomplete="off" id="m3"
                            value="<?= $isi_usulan->m3 ?>">

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
// untuk menghitung 
let panjang = 0;
let lebar = 0;
let tinggi = 0;
let m3 = 1;
let anggaran = 1;
let unit = '';
let total = 0;
document.getElementById('panjang').addEventListener('input', function(evet) {
    panjang = parseFloat(evet.target.value);
    count();
});
document.getElementById('lebar').addEventListener('input', function(evet) {
    lebar = parseFloat(evet.target.value);
    count();
});
document.getElementById('tinggi').addEventListener('input', function(evet) {
    tinggi = parseFloat(evet.target.value);
    count();
});
document.getElementById('anggaran').addEventListener('input', function(evet) {
    anggaran = parseFloat(evet.target.value);
    subtotal();
});
document.getElementById('unit').addEventListener('input', function(evet) {
    unit = parseFloat(evet.target.value);
    subtotal();
});

function subtotal() {
    if (m3 > 1) {
        total = m3 * anggaran;
    } else if (unit !== '') {
        total = unit * anggaran;
    }
    if (anggaran > 1) {
        document.getElementById('subtotal').value = total;
    }
}

function count() {
    let data = [panjang, lebar, tinggi];
    // let tamp = [];
    m3 = 1;
    data.map((e) => {
        if (e !== 0) {
            m3 *= e;
        }
    })
    document.getElementById('m3').value = m3;
}

//==============================Mengambil Data diOption dan Tambah data yg di update di option==================== 
// console.log(idbdg);
let subRekDom = document.querySelectorAll('#subRek option');
subRekDom.forEach(item => {

    if (item.value == subrek) {
        item.selected = true;
    }
    console.log(item.value);
})
let subRek = document.getElementById('subRek');
subRek.addEventListener("change", function() {
    var selectedCountry = $(this).children("option:selected").val();
    let result = sub.find(function(item) {
        return item.Id_sub_bidang == selectedCountry
    })
    // document.getElementById('sub_Bidang').value = result.nama_sub_bidang;
})
let idrekening = document.getElementById('idrekening');
console.log(data);
idrekening.addEventListener("change", function() {
    var selectedCountry = $(this).children("option:selected").val();
    console.log(selectedCountry);

    let result = data.find(function(item) {
        return item.id_bidang == selectedCountry
    })
    console.log(result);
    // document.getElementById('nama_bidang').value = result.nama_bidang;
});
$("#idrekening option[value='" + idbdg + "']").prop('selected', true).parent().trigger('change');
</script>
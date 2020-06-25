<?php
echo '<script type="text/javascript">';
echo "let idbdg = " . json_encode($isi_usulan->id_bidang) . "\n";
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

                <form action="<?= site_url('usulan/proses_edit/') ?>" method="post">
                    <div class="form-group">
                        <label>Kode Rekening</label>
                        <select class="custom-select" onfocus="this.size=5" onblur="this.size=1"
                            onchange="this.size=1;this.blur()" id="idrekening" name="idrekening"
                            value="<?= $isi_usulan->id_bidang; ?>">
                            <option>-Pilih-</option>
                            <?php foreach ($bidang as $key) : ?>
                            <option value="<?= $key->id_bidang; ?>"><?= $key->kode_rek; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label>Nama Bidang</label>
                        <input type="text" class="form-control" name="nama_bidang" id="nama_bidang" autocomplete="off"
                            value="<?= $isi_usulan->nama_bidang ?>">

                        <div class="form-group">
                            <label>Sub Rekening</label>
                            <select class="custom-select" onfocus="this.size=5" onblur="this.size=1"
                                onchange="this.size=1;this.blur()" id="subRek" name="sub"
                                value="<?= $isi_usulan->Id_sub_bidang; ?>">
                                <option>-Pilih-</option>
                                <?php foreach ($subBi as $key) : ?>
                                <option value="<?= $key->Id_sub_bidang ?>"><?= $key->Sub_rek ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <label>Nama Sub Bidang</label>
                        <input type="text" class="form-control" name="sub_bidang" autocomplete="off" id="sub_Bidang"
                            value="<?= $isi_usulan->nama_sub_bidang ?>">

                        <label>Usulan</label>
                        <input type="text" class="form-control" name="usulan" autocomplete="off"
                            value="<?= $isi_usulan->usulan ?>">

                        <label>Anggaran (Rp)</label>
                        <input type="text" class="form-control" name="anggaran" autocomplete="off"
                            value="<?= $isi_usulan->anggaran ?>">
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
let id_bidang = document.querySelectorAll('#idrekening option');
id_bidang.forEach(item => {
    if (item.value == idbdg) {
        item.selected = true;
    }
})
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
    document.getElementById('sub_Bidang').value = result.nama_sub_bidang;
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
    document.getElementById('nama_bidang').value = result.nama_bidang;
})
</script>
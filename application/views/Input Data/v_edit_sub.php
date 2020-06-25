<?php
echo '<script type="text/javascript">';
echo "let idbdg = " . json_encode($isi_subB->id_bidang) . "\n";
echo "let data = " . json_encode($bidang) . "\n";
echo '</script>';
var_dump($bidang);
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header " style="background-color: blue"></div>
            <div class="card-body">

                <form action="<?= site_url('Sub_bidang/proses_edit/') ?>" method="post">
                    <div class="form-group">
                        <label>Kode Rekening</label>
                        <select class="custom-select" onfocus="this.size=5" onblur="this.size=1"
                            onchange="this.size=1;this.blur()" id="idrekening" name="idrekening"
                            value="<?= $isi_subB->id_bidang; ?>">
                            <option>-Pilih-</option>
                            <?php foreach ($bidang as $key) : ?>
                            <option value="<?= $key->id_bidang; ?>"><?= $key->kode_rek; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label>Nama Bidang</label>
                        <input type="text" id="nama_bidang" class="form-control" name="nama_bidang" autocomplete="off"
                            value="<?= $isi_subB->nama_bidang; ?>">

                        <label>Sub Rekening</label>
                        <input type="text" class="form-control" name="SubRek" value="<?= $isi_subB->Sub_rek ?>">

                        <label>Nama Sub Bidang</label>
                        <input type="text" class="form-control" name="Nasub" value="<?= $isi_subB->nama_sub_bidang ?>">
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $isi_subB->Id_sub_bidang; ?>">
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
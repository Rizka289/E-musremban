<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header " style="background-color: blue"></div>
            <div class="card-body">
                <form action="<?= site_url('InputData/proses_E_Sub/') ?>" method="post">
                    <div class="form-group">
                        <label>Nama Bidang</label>
                        <select class="custom-select" onfocus="this.size=5" onblur="this.size=1"
                            onchange="this.size=1;this.blur()" id="idrekening" name="idrekening"
                            value="<?= $isi_subB->id_bidang; ?>">
                            <option>-Pilih-</option>
                            <?php foreach ($bidang as $key) : ?>
                            <option value="<?= $key->id_bidang; ?>"><?= $key->kode_rek . $key->nama_bidang ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label>Sub Rekening</label>
                        <input type="text" class="form-control" name="SubRek" value="<?= $isi_subB->Sub_rek ?>">

                        <label>Nama Sub Bidang</label>
                        <input type="text" class="form-control" name="Nasub" value="<?= $isi_subB->nama_sub_bidang ?>">
                    </div>
                    <input type="hidden" name="id_bidang" value="<?= $isi_subB->id_bidang; ?>" />
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
var idrekening = "<?= isset($isi_subB->id_bidang) ? $isi_subB->id_bidang : 'tidak ada id bidang' ?>";
if (idrekening == 'tidak ada id bidang')
    alert('Error id bidang tidak ada');
$("#idrekening option[value='" + idrekening + "']").prop('selected', true);
$("#idrekening").trigger('change');
</script>
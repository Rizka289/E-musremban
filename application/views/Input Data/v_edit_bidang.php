<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header " style="background-color: blue"></div>
            <div class="card-body">

                <form action="<?= site_url('Bidang/proses_edit/') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $isi_bidang->id_bidang ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Tahun</label>
                                <select class="custom-select" id="tahun" name="tahun">
                                    <option>-Pilih-</option>
                                    <?php
                                    foreach ($tbl_t as $key) : ?>
                                    <option value="<?= $key->id_tahun ?>"><?= $key->tahun ?></option>
                                    <?php endforeach;
                                    ?>
                                </select>
                            </div>

                            <label>Kode Rekening</label>
                            <input type="text" class="form-control" name="kode_rek" autocomplete="off"
                                value="<?= $isi_bidang->kode_rek; ?>">

                            <label>Nama Bidang</label>
                            <input type="text" class="form-control" name="nama_bid"
                                value="<?= $isi_bidang->nama_bidang ?>" autocomplete="off">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
<script>
var tahun = "<?= isset($isi_bidang->id_tahun) ? $isi_bidang->id_tahun : 'tidak ada id tahun' ?>";
if (tahun == 'tidak ada id tahun')
    alert('Error id tahun tidak ada');
$("#tahun option[value='" + tahun + "']").prop('selected', true);
$("#tahun").trigger('change');
</script>
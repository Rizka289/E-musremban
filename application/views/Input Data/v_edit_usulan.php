<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header " style="background-color: blue"></div>
            <div class="card-body">

                <form action="<?= site_url('usulan/proses_edit/') ?>" method="post">
                    <input type="hidden" name="id_usulan" id="id-usulan">
                    <div class="form-group">
                        <label>Kode Rekening</label>
                        <select class="custom-select" onfocus="this.size=5" onblur="this.size=1"
                            onchange="this.size=1;this.blur()" id="idrekening" name="idrekening"
                            value="<?= $idrek->kode_rek; ?>">
                            <option>-Pilih-</option>
                            <?php foreach ($bidang as $key) : ?>
                            <option value="<?= $key->kode_rek; ?>"><?= $key->kode_rek; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label>Nama Bidang</label>
                        <input type="text" id="narek" class="form-control" name="nama_bidang" id="nama_bidang"
                            autocomplete="off">

                        <div class="form-group">
                            <label>Sub Rekening</label>
                            <select class="custom-select" onfocus="this.size=5" onblur="this.size=1"
                                onchange="this.size=1;this.blur()" id="subRek" name="sub"
                                value="<?= $subrek->Sub_rek ?>">
                                <option>-Pilih-</option>
                                <?php foreach ($subBi as $key) : ?>
                                <option value="<?= $key->Id_sub_bidang ?>"><?= $key->Sub_rek ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- <label>Nama Sub Bidang</label>
                        <input type="text" class="form-control" name="namaSub" autocomplete="off"> -->

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
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
                            <label>Kode Rekening</label>
                            <select class="custom-select" onfocus="this.size=5" onblur="this.size=1"
                                onchange="this .size=1;this.blur()" id="idrekening" name="idrekening">
                                <option>-Pilih-</option>
                                <?php foreach ($bidang as $key) : ?>
                                <option value="<?= $key->id_bidang; ?>"><?= $key->kode_rek . $key->nama_bidang ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Sub Rekening</label>
                            <select class="custom-select" onfocus="this.size=5" onblur="this.size=1"
                                onchange="this.size=1;this.blur()" id="subRek" name="sub">
                                <option>-Pilih-</option>
                                <?php foreach ($subBi as $key) : ?>
                                <option value="<?= $key->Id_sub_bidang ?>"><?= $key->Sub_rek . $key->nama_sub_bidang ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <label>Usulan</label>
                        <input type="text" class="form-control" name="usulan" autocomplete="off">

                        <!-- <label>Unit</label>
                        <input type="text" class="form-control" name="unit" autocomplete="off" onfocus="startCalc();"
                            onblur="stopCalc();"> -->

                        <label>Panjang</label>
                        <input type="text" class="form-control" name="panjang" autocomplete="off" onfocus="startCalc();"
                            onblur="stopCalc();">

                        <label>Lebar</label>
                        <input type="text" class="form-control" name="lebar" autocomplete="off" onfocus="startCalc();"
                            onblur="stopCalc();">

                        <label>Tinggi</label>
                        <input type="text" class="form-control" name="tinggi" autocomplete="off" onfocus="startCalc();"
                            onblur="stopCalc();">

                        <label>M3</label>
                        <input type="text" class="form-control" name="m3" autocomplete="off" onfocus="startCalc();"
                            onblur="stopCalc();">

                        <label>Anggaran (Rp)</label>
                        <input type="text" class="form-control" name="anggaran" autocomplete="off"
                            onfocus="startCalc();" onblur="stopCalc();">

                        <label>Sub Total (Rp)</label>
                        <input type="text" class="form-control" name="total" autocomplete="off" onfocus="startCalc();"
                            onblur="stopCalc();">

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
                        <!-- <th>Unit</th> -->
                        <th>Panjang</th>
                        <th>Lebar</th>
                        <th>Tinggi</th>
                        <th>M3</th>
                        <th>Anggaran (Rp)</th>
                        <th>Sub Total (Rp)</th>
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
                        <!-- <td><?= $key->unit ?></td> -->
                        <td><?= $key->panjang ?></td>
                        <td><?= $key->lebar ?></td>
                        <td><?= $key->tinggi ?></td>
                        <td><?= $key->m3 ?></td>
                        <td><?= $key->anggaran ?></td>
                        <td><?= $key->total ?></td>
                        <td>
                            <?php if ($this->session->userdata('dusun') != "dusun") { ?>
                            <a href="<?= site_url('InputData/editUsulan/' . $key->id_usulan) ?>"
                                class="btn btn-warning"><i class="far fa-fw fa-edit"></i></a>
                            <?php } ?>
                            <a onclick="return confirm ('yakin?');"
                                href="<?= site_url('InputData/hapusUsulan/' . $key->id_usulan) ?>"
                                class="btn btn-danger"><i class="fas fa-fw fa-trash-alt"></i></a>
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
function startCalc() {
    interval = setInterval("calc()", 1);
}

function calc() {
    valuepanjang = document.formUsulan.panjang.value;
    valuelebar = document.formUsulan.lebar.value;
    valuetinggi = document.formUsulan.tinggi.value;
    valuem3 = document.formUsulan.m3.value;
    valueanggaran = document.formUsulan.anggaran.value;
    // valueunit = document.formUsulan.unit.value;
    document.formUsulan.m3.value = (valuepanjang * 1) * (valuelebar * 1);
    document.formUsulan.m3.value = (valuepanjang * 1) * (valuetinggi * 1);
    document.formUsulan.total.value = (valuem3 * 1) * (valueanggaran * 1);
    // document.formUsulan.total.value = (valueanggaran * 1) * (valueunit * 1);
}

function stopCalc() {
    clearInterval(interval);
}
</script>
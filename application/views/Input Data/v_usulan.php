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
                            <label>Kode Rekening</label>
                            <select class="custom-select" onfocus="this.size=5" onblur="this.size=1"
                                onchange="this .size=1;this.blur()" id="idrekening" name="idrekening">
                                <option>-Pilih-</option>
                                <?php foreach ($lte->result() as $key) : ?>
                                <option value="<?= $key->id_bidang; ?>"><?= $key->kode_rek . $key->nama_bidang ?>
                                </option>
                                <?php echo $key->id_bidang ?>
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

                        <input type="hidden" class="form-control" name="username" value="<?= $username ?>"
                            autocomplete="off">
                        <label>Usulan</label>
                        <input type="text" class="form-control" name="usulan" autocomplete="off">

                        <label>Unit</label>
                        <input type="text" class="form-control" name="unit" autocomplete="off" id="unit">

                        <label>Panjang</label>
                        <input type="text" class="form-control" name="panjang" autocomplete="off" id="panjang">

                        <label>Lebar</label>
                        <input type="text" class="form-control" name="lebar" autocomplete="off" id="lebar">

                        <label>Tinggi</label>
                        <input type="text" class="form-control" name="tinggi" autocomplete="off" id="tinggi">

                        <label>M<sup>2</sup></label>
                        <input type="text" class="form-control" name="m3" autocomplete="off" id="m3">

                        <label>Anggaran (Rp)</label>
                        <input type="text" class="form-control" name="anggaran" autocomplete="off" id="anggaran">

                        <label>Sub Total (Rp)</label>
                        <input type="text" class="form-control" name="total" autocomplete="off" id="subtotal">
                    </div>
                    <!-- <div class="form-group">
                        <!- <input type="hidden" name="author" value="<?= $this->session->userdata($data); ?>"> -->
                    <!-- </div>  -->
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
                        <th>Unit</th>
                        <th>Panjang</th>
                        <th>Lebar</th>
                        <th>Tinggi</th>
                        <th>M<sup>2</sup></th>
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
                            <?php if ($this->session->userdata('user') != 'desa') { ?>
                            <a href="<?= site_url('InputData/editUsulan/' . $key->id_usulan) ?>"
                                class="btn btn-warning"><i class="far fa-fw fa-edit"></i></a>
                            <?php } ?>
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
</script>
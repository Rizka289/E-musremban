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
                        <th>M<sup>3</sup></th>
                        <th>Anggaran (Rp)</th>
                        <th>Sub Total (Rp)</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php  ?>
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
                        <a href="<?= site_url('InputData/editUsulan/' . $key->id_usulan) ?>" class="btn btn-warning"><i
                                class="far fa-fw fa-edit"></i></a>
                        <?php } ?>
                        <a onclick="return confirm ('yakin?');"
                            href="<?= site_url('InputData/hapusUsulan/' . $key->id_usulan) ?>" class="btn btn-danger"><i
                                class="fas fa-fw fa-trash-alt"></i></a>
                        <a href="<?= site_url('InputData/detail') ?>">Detail Usulan</a>
                        <?php endif ?>
                    </td>

                    </tr>
                    <?php endforeach; ?>
                </tbody> -->
            </table>

        </div>
    </div>
</div>
</div>
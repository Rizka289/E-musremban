<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            <div id="err-massage" style="display: none">
                                <small class="text-danger"></small>
                            </div>
                        </div>
                        <form class="user" method="post" action="<?= site_url('login/registrasi') ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="name"
                                    placeholder="Full Name" autocomplete="off" value="<?= set_value('name'); ?>">
                                <?= form_error('name', ' <small class="text-danger pl-3">', '</small>'); ?>
                            </div>


                            <div class=" form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1"
                                        placeholder="Password" name="password1">
                                    <?= form_error('password1', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2"
                                        name="password2" placeholder="Repeat Password">
                                </div>
                            </div>

                            <div class="form-group">
                                <select id="tipe-user" class="form-control" name="pilih">
                                    <option value="">-Pilih-</option>
                                    <option value="desa">Desa</option>
                                    <option value="dusun">Dusun</option>
                                </select>
                            </div>

                            <button id="btn-register" type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                        </form>
                        <hr>

                        <div class="text-center">
                            <a class="small" href="<?= site_url('login') ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function onTipeUserChange() { // dipanggil setiap element dengan id tipe-user berubah nilai
    var ini = $(this);
    var tipe = ini.val();
    if (!tipe) {
        $("#btn-register").prop('disabled', true);
        return;
    }

    var maksimum = tipe == 'dusun' ? 5 : 4;
    // 3 adalah maksimum user untuk dusun dan 4 adalah maksimum user untuk desa, silahkan diganti

    var options = {
        url: 'http://localhost/desa_tamansari/index.php/login/ambilJumlahUser/' + tipe,
        // url yang mengarah ke controller lofin dan methode ambilJumlahUser
        success: function(data) { // callback ketika $.ajax sukses dilakukan
            if (data >= maksimum) { //cek apakah sudah mencapai batas
                $('#err-massage small').text("Maaf User Tipe " + tipe +
                    " Sudah Melebihi Mencapai Jumlah Maksimum (" + maksimum +
                    ") Silahkan Pilih user tipe lain").parent().show();

                // yang berada di .text() adalah pesan yang akan ditampilkan
                // .parent() adlah untuk mengambil komponen induk (pembungkus) tag small yaitu element yang id nya err-message, kemudia induk element(tag) small itu dimunculkan dengan .show(),semula defaultanya sembunyi

                // membuat tombol register disable agar tidak bisa kirim data ketika user utnuk tipe yang dipilih sudah sampai batas
                $("#btn-register").prop('disabled', true);
            } else {
                // membuat tombol register kembali normal jika jumlah user untuk tipe yang dipilih berlum mencapai batas
                $("#btn-register").prop('disabled', false);

                // menyembunyikan pesan error (element dengan id err-message)
                $("#err-message").hide();
            }
        }
    }
    $.ajax(options);
}

$("#tipe-user").change(
    onTipeUserChange); // membuat event listener dengan event onChange(.change) untuk element dengan id tipe-user
</script>
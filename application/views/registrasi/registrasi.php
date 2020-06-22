<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" method="post" action="<?= site_url('login/registrasi') ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="name" id="name"
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
                                <select class="form-control" name="pilih">
                                    <option>-Pilih-</option>
                                    <option value="desa">Desa</option>
                                    <option value="dusun">Dusun</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
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
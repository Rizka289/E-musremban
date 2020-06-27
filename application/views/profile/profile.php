<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php
    $user = json_decode($_COOKIE['user']);
    ?>
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="../assets/image/1.png" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <p class="card-title">Nama : <?= $user->username; ?></p>
                    <p class="card-text">Agama : <?= $user->agama; ?></p>
                    <p class="card-text">Alamat : <?= $user->alamat; ?></p>
                    <p class="card-text">No Hp : <?= $user->alamat; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
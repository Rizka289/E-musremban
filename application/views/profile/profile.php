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
                    <table>
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?= $user->username ?></td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>:</td>
                                <td><?= $user->agama ?></td>
                            </tr>
                            <tr>
                                <td>No Handphone</td>
                                <td>:</td>
                                <td><?= $user->no_hp ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?= $user->alamat ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
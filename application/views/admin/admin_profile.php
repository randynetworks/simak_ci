<!-- Main Content -->
<div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <div class="card shadow mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/profile/') . $user_login['image']; ?>" class="p-3 card-img">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <br>
                        <h5 class="card-title"><?= $user_login['name']; ?></h5>
                        <p class="card-text"><?= $user_login['nomor_induk'] ?>.</p>
                        <p class="card-text"><small class="text-muted">Admin since <?= date('d F Y', $user_login['date_created']) ?></small></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

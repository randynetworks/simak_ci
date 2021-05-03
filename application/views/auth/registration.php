<div class="container">
	<div class="mt-3">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row">
				<div class="col-lg">
					<div class="p-5">
						<div class="text-center">
							<img src="<?= base_url('assets/img/PIKSI.png') ?>" alt="Logo Piksi" width="150px">
							<h1 class="h4 text-white my-4">Selamat Datang di<br>Sistem Informasi Akademik Piksi Ganesha.</h1>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="card o-hidden border-0 shadow-lg mb-3 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-3">Registrasi</h1>
                        </div>
                        <form class="user" method="POST" action="<?= base_url('auth/registration'); ?>">
                            <div class="form-group">
                                <input value="<?= set_value('name') ?>" type="text" class="form-control form-control-user" id="name" placeholder="Nama Lengkap" name="name">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input value="<?= set_value('nomor_induk') ?>" type="text" class="form-control form-control-user" id="nomor_induk" placeholder="Nomor Induk Pegawai" name="nomor_induk">
                                <?= form_error('nomor_induk', '<small class="text-danger pl-3">', '</small>'); ?>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>

                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" placeholder="Repeat Password" name="password2">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-purple btn-user btn-block">
                                Registrasi Akun
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth') ?>">Sudah punya akun? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="container">
	<!-- Outer Row -->
	<div class="row justify-content-center">
		<div class="col-lg-7">
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
			<div class="card o-hidden border-0 shadow-lg mb-3">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-3">Login.</h1>
								</div>
								<?= $this->session->flashdata('message') ?>
								<form class="user" method="POST" action="<?= base_url('auth') ?>">
									<div class="form-group">
										<input value="<?= set_value('nomor_induk'); ?>" type="text" class="form-control form-control-user"
											   id="nomor_induk" placeholder="Masukan Nomor Induk Pegawai..." name="nomor_induk">
										<?= form_error('nomor_induk', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password">
										<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>

									<button type="submit" class="btn btn-purple btn-user btn-block">
										Masuk
									</button>
								</form>
								<hr>
								<div class="text-center">
									<a class="small" href="<?= base_url('auth/registration') ?>">Buat Akun Baru!</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Main Content -->
<div id="content">
	<!-- Begin PRin_RL_pendapatane_ Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

		<!-- data table -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-purple"><?php echo $title; ?></h6>
			</div>
			<div class="card-body mb-4 p-4">
				<div>
					<form method="post">
						<div class="row">
							<div class="col-md-6">
								<div class="profile-head">
									<p class="proile-rating mb-3">ID Kelas : <span><?= $item->id_kelas ?></span></p>
									<h3>
										<?= $item->nama_kelas?>
									</h3>
									<h6>
										Tahun Akademik, <?= $item->tahun_akademik ?? 'Belum ada' ?><br>
										Status Kelas, <?= $item->status ?>
									</h6>
									<ul class="nav nav-tabs" id="myTab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="info" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Detail</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="tab-content info" id="myTabContent">
									<div class="tab-pane fade show active " id="detail_kelas" role="tabpanel" aria-labelledby="detail_kelas">

										<div class="row mt-3">
											<div class="col-md-3">
												<label><b>Program</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->program ?? 'Belum Ada' ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Kuota Kelas</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->kuota ?? 'Belum Ada' ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Terisi</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->terisi ?? 'Belum Ada' ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Kurikulum</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->kurikulum ?? 'Belum Ada' ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>

				<a href="<?= base_url('dashboard/edit/'. $item->id_kelas . '/kelas') ?>" class="btn btn-primary">Ubah</i></a>
				<a href="<?= base_url('dashboard/show/kelas') ?>" class="btn btn-secondary">Kembali</a>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

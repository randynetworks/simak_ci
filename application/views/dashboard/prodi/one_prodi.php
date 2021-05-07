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
									<p class="proile-rating mb-3">ID Prodi : <span><?= $item->id_prodi ?></span><br>Kode PS : <span><?= $item->kode_ps ?></p>
									<h3>
										<?= ucwords($item->nama_prodi) . "<br>(" . ucwords($item->nama_prodi2)  . ")" . " Ter-Akreditasi " . $item->nilai_akreditasi ?>
									</h3>
									<h6>
										No. SK, <?= $item->no_sk_Akred ?? 'Belum ada' ?><br>
										Valid Hingga, <?= $item->tgl_akhir_Akred ?? 'Belum ada' ?>
									</h6>
									<ul class="nav nav-tabs" id="myTab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="detail_prodi" data-toggle="tab" href="#detail_prodi" role="tab" aria-controls="detail_prodi" aria-selected="true">Detail</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="tab-content detail_prodi" id="myTabContent">
									<div class="tab-pane fade show active" id="detail_prodi" role="tabpanel" aria-labelledby="detail_prodi">
										<div class="row mt-3">
											<div class="col-md-3">
												<label><b>Jenjang Prodi</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->jenjang ?? 'Belum ada' ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Nama Singkatan Prodi</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->nama_singkatan_prodi ?? 'Belum Ada' ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Ketua Prodi</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->nidn ?? 'Belum Ada' ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Status Prodi</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->status_prodi ?? 'Belum Ada' ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>

				<a href="<?= base_url('dashboard/edit/'. $item->id_prodi . '/prodi') ?>" class="btn btn-primary">Ubah</i></a>
				<a href="<?= base_url('dashboard/show/prodi') ?>" class="btn btn-secondary">Kembali</a>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

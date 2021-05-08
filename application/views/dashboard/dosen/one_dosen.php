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
									<p class="proile-rating mb-3">NIP : <span><?= $item->nip ?></span></p>
									<h3>
										<?= ($item->gelar_awal ?? '') . ' ' . ucwords(strtolower($item->nama_lengkap)) . ' ' . $item->gelar_akhir ?? '' ?>
									</h3>
									<h6>
										<?= $item->tempat_lahir . ', ' . $item->tanggal_lahir?>
									</h6>
									<h6><?= $item->email ?? ''?></h6>
									<h6><?= '(+62) ' . $item->hp ?? ''?></h6>
									<ul class="nav nav-tabs" id="myTab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="tab-data-pribadi" data-toggle="tab" href="#dataPribadi" role="tab" aria-controls="dataPribadi" aria-selected="true">Data Pribadi</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="tab-content tab-data-pribadi" id="myTabContent">
									<div class="tab-pane fade show active" id="dataPribadi" role="tabpanel" aria-labelledby="tab-data-pribadi">
										<div class="row">
											<div class="col-md-6">
												<div class="row mt-3">
													<div class="col-md-3">
														<label><b>NIDN</b></label>
													</div>
													<div class="col-md-3">
														<p><?= $item->nidn ?? 'Belum ada' ?></p>
													</div>
												</div>
												<div class="row">
													<div class="col-md-3">
														<label><b>NIK</b></label>
													</div>
													<div class="col-md-3">
														<p><?= $item->nik ?? 'Belum Ada' ?></p>
													</div>
												</div>
												<div class="row">
													<div class="col-md-3">
														<label><b>NPWP</b></label>
													</div>
													<div class="col-md-3">
														<p><?= $item->npwp ?? 'Belum Ada' ?></p>
													</div>
												</div>
												<div class="row">
													<div class="col-md-3">
														<label><b>Jenis Kelamin</b></label>
													</div>
													<div class="col-md-3">
														<p><?= $item->jenis_kelamin ?? 'Belum Ada' ?></p>
													</div>
												</div>
												<div class="row">
													<div class="col-md-3">
														<label><b>Agama</b></label>
													</div>
													<div class="col-md-3">
														<p><?= $item->agama ?? 'Belum Ada'?></p>
													</div>
												</div>
												<div class="row">
													<div class="col-md-3">
														<label><b>Alamat</b></label>
													</div>
													<div class="col-md-3">
														<p><?= $item->jalan ?? 'Belum Ada'?></p>
														<p><?php
															if ($item->rt && $item->rw && $item->kelurahan && $item->kec && $item->kab && $item->prov)
															{
																echo "RT/RW" . $item->rt . "/" . $item->rw .
																		"\nKelurahan " . $item->kelurahan .
																		"\nKecamatan " . $item->kec .
																		"\nKabupaten " . $item->kab .
																		"\nProvinsi " . $item->prov ;
															}
															?></p>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="row mt-3">
													<div class="col-md-3">
														<label><b>Status Pernikahan</b></label>
													</div>
													<div class="col-md-3">
														<p><?= $item->status_pernikahan ?? 'Belum ada' ?></p>
													</div>
												</div>
												<div class="row">
													<div class="col-md-3">
														<label><b>Nama Pasangan</b></label>
													</div>
													<div class="col-md-3">
														<p><?= $item->nama_suami_istri ?? 'Belum Ada' ?></p>
													</div>
												</div>
												<div class="row">
													<div class="col-md-3">
														<label><b>Jumlah Anak</b></label>
													</div>
													<div class="col-md-3">
														<p><?= $item->jumlah_anak ?? 'Belum Ada' ?></p>
													</div>
												</div>
												<hr>
												<div class="row">
													<div class="col-md-3">
														<label><b>Ukuran Jas</b></label>
													</div>
													<div class="col-md-3">
														<p><?= $item->ukuran_jas ?? 'Belum Ada' ?></p>
													</div>
												</div>
												<div class="row">
													<div class="col-md-3">
														<label><b>Tanggal Masuk</b></label>
													</div>
													<div class="col-md-3">
														<p><?= $item->tmp_masuk ?? 'Belum Ada'?></p>
													</div>
												</div>
												<div class="row">
													<div class="col-md-3">
														<label><b>Prodi</b></label>
													</div>
													<div class="col-md-3">
														<p><?= $this->master_model->getSpesific('prodi', 'id_prodi', $item->id_prodi)['nama_prodi'] ?? 'Belum Ada'?></p>
													</div>
												</div>
												<div class="row">
													<div class="col-md-3">
														<label><b>Status Dosen</b></label>
													</div>
													<div class="col-md-3">
														<p><?= $item->status_dosen ?? 'Belum Ada'?></p>
													</div>
												</div>
												<div class="row">
													<div class="col-md-3">
														<label><b>Status Aktif</b></label>
													</div>
													<div class="col-md-3">
														<p><?= $item->status_aktif ?? 'Belum Ada'?></p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>

				<a href="<?= base_url('dashboard/edit/'. $item->id_dosen . '/dosen') ?>" class="btn btn-primary">Ubah</i></a>
				<a href="<?= base_url('dashboard/show/dosen') ?>" class="btn btn-secondary">Kembali</a>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

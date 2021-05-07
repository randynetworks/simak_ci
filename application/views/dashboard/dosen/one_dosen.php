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
									<p class="proile-rating mb-3">No Daftar : <span><?= $item->no_daftar ?></span></p>
									<h3>
										<?= ucwords($item->nama_lengkap) ?>
									</h3>
									<h6>
										<?= $item->tempat_lahir . ', ' . $item->tgl_lahir?>
									</h6>
									<h6><?= $item->email ?? ''?></h6>
									<h6><?= '(+62) ' . $item->no_hp ?? ''?></h6>
									<ul class="nav nav-tabs" id="myTab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="profile-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Data Pribadi</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="orangtua-tab" data-toggle="tab" href="#orangtua" role="tab" aria-controls="profile" aria-selected="false">Data Orang Tua</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="sekolah-tab" data-toggle="tab" href="#sekolah" role="tab" aria-controls="profile" aria-selected="false">Data Sekolah</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="tab-content profile-tab" id="myTabContent">
									<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="profile-tab">
										<div class="row mt-3">
											<div class="col-md-3">
												<label><b>NIK</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->nik ?? 'Belum ada' ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>No. Transportasi</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->id_alat_transportasi ?? 'Belum Ada' ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>NISN</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->nisn ?? 'Belum Ada' ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>KPS</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->kps ?? 'Belum Ada' ?></p>
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
												<label><b>Jenis Kelamin</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->jenis_kelamin ?? 'Belum Ada'?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Kebutuhan Khusus</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->id_kebutuhan_khusus_mahasiswa ?? 'Belum Ada'?></p>
											</div>
										</div>
										<div class="col-md-6">
											<hr >
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Jenis Tinggal Mahasiswa</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->jenis_tinggal ?? 'Belum Ada'?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Alamat Lengkap</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->alamat ?? 'Belum Ada'?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Telopon Rumah</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->no_telp_rumah ?? 'Belum Ada'?></p>
											</div>
										</div>
										<div class="col-md-6">
											<hr >
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Cara Daftar</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->cara_daftar ?? 'Belum Ada'?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Tau Info Kampus dari</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->tahu_info_kampus ?? 'Belum Ada'?></p>
											</div>
										</div>
										<div class="col-md-6">
											<hr >
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Nama Ref</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->nama_ref ?? 'Belum Ada'?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Keterangan</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->keterangan ?? 'Belum Ada'?></p>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="orangtua" role="tabpanel" aria-labelledby="orangtua-tab">
										<h5 class="mt-3"><b>Data Ayah</b></h5>
										<div class="row mt-3">
											<div class="col-md-3">
												<label><b>NIK</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->nik_ayah ?? 'Belum Ada' ?></p>
											</div>
										</div>
										<div class="row mt-3">
											<div class="col-md-3">
												<label><b>Nama Lengkap</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->nama_ayah  ?? 'Belum Ada' ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Tempat Tanggal Lahir</b></label>
											</div>
											<div class="col-md-3">
												<p><?= ($item->tempat_lahir_ayah !== null &&  $item->tanggal_lahir_ayah  !== null ) ? $item->tempat_lahir_ayah . ', ' .$item->tanggal_lahir_ayah : 'Belum Ada' ?></p>
											</div>
										</div>

										<div class="row">
											<div class="col-md-3">
												<label><b>Pendidikan Terakhir</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->pendidikan_ayah ?? 'Belum Ada' ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Pekerjaan</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->pekerjaan_ayah ?? 'Belum Ada' ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Penghasilan</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->penghasilan_ayah ?? 'Belum Ada' ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Kebutuhan Khusus</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->id_kebutuhan_khusus_ayah ?? 'Belum Ada' ?></p>
											</div>
										</div>
										<div class="col-md-6">
											<hr >
										</div>
										<h5 class="mt-3"><b>Data Ibu</b></h5>
										<div class="row mt-3">
											<div class="col-md-3">
												<label><b>NIK</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->nik_ibu ?? 'Belum Ada' ?></p>
											</div>
										</div>
										<div class="row mt-3">
											<div class="col-md-3">
												<label><b>Nama Lengkap</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->nama_ibu  ?? 'Belum Ada' ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Tempat Tanggal Lahir</b></label>
											</div>
											<div class="col-md-3">
												<p><?= ($item->tempat_lahir_ibu !== null &&  $item->tanggal_lahir_ibu  !== null ) ? $item->tempat_lahir_ibu . ', ' .$item->tanggal_lahir_ibu : 'Belum Ada' ?></p>
											</div>
										</div>

										<div class="row">
											<div class="col-md-3">
												<label><b>Pendidikan Terakhir</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->pendidikan_ibu ?? 'Belum Ada' ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Pekerjaan</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->pekerjaan_ibu ?? 'Belum Ada' ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Penghasilan</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->penghasilan_ibu ?? 'Belum Ada' ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Kebutuhan Khusus</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->id_kebutuhan_khusus_ibu ?? 'Belum Ada' ?></p>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="sekolah" role="tabpanel" aria-labelledby="sekolah-tab">
										<div class="row mt-3">
											<div class="col-md-3">
												<label><b>Asal Sekolah</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->asal_sekolah ?? 'Belum Ada'?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label><b>Alamat Sekolah</b></label>
											</div>
											<div class="col-md-3">
												<p><?= $item->alamat_sekolah ?? 'Belum Ada'?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label>Lokasi Sekolah</label>
											</div>
											<div class="col-md-3">
												<p><?= $item->kotakab_sekolah ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label>Alamat Email </label>
											</div>
											<div class="col-md-3">
												<p><?= $item->email_sekolah?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label>Kode Pos Sekolah</label>
											</div>
											<div class="col-md-3">
												<p><?= $item->pos_sekolah ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label>Nomor Telpon</label>
											</div>
											<div class="col-md-3">
												<p><?= $item->no_telp_sekolah ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label>Jurusan</label>
											</div>
											<div class="col-md-3">
												<p><?= $item->jurusan_sekolah ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>

				<a href="<?= base_url('dashboard/edit/'. $item->no_daftar . '/mahasiswa') ?>" class="btn btn-primary">Ubah</i></a>
				<a href="<?= base_url('dashboard/show/mahasiswa') ?>" class="btn btn-secondary">Kembali</a>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

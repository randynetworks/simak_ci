<!-- Main Content -->
<div id="content">
	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

		<div class="mt-4">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
				Tambah Data <?php echo $title; ?>
			</button>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#report">
				Buat Laporan
			</button>

			<div class="row mt-3">

				<!--			SEARCHING        -->
				<div class="col-md-5">
					<form action="<?= base_url('dashboard/show/mahasiswa') ?>" method="post">
						<div class="input-group mb-3">
							<input name="keyword" type="text"  class="form-control datepicker" placeholder="Cari Berdasarkan Nama">
							<div class="input-group-append">
								<button type="submit" name="submit" class="btn btn-outline-primary" >Cari</button>
							</div>
						</div>
					</form>
				</div>

				<!--			Urutkan Berdasarkan        -->
				<div class="col-md-5">
					<form action="<?php echo base_url('/dashboard/show/mahasiswa') ?>" method="post">
						<div class="input-group mb-3">

							<select class="form-control" describedby="button-addon2" autocomplete="off" autofocus id="order_by" name="order_by">
								<option>Urutkan Berdasarkan</option>

								<!--MEMANGGIL DATA FIELD TABLE-->
								<?php
								$fields = $this->master_model->getListField('mahasiswa');
								foreach ($fields as $field) {
									if ($field === 'id') {
										continue;
									}
									$result = ucfirst(str_replace('_', ' ', $field));
									if ($field === 'created_at') {
										$result = 'Tanggal';
									}
									echo "<option value='$field'>$result</option>";
								}

								?>
							</select>
							<div class="input-group-append">
								<button type="submit" class="btn btn-outline-success" id="btn-sorting">Urut</button>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-1">
					<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#filter">
						Filter
					</button>
				</div>
				<div class="col-md-1">
					<form action="<?php echo base_url('dashboard/show/mahasiswa') ?>" method="get">
						<button type="submit" class="btn btn-outline-danger">Reset</button>
					</form>
				</div>
			</div>
		</div>

		<!-- data table -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-purple">Data Table Mahasiswa per tanggal <?= date('d F Y') ?> </h6>
			</div>
			<div class="card-body">

				<?= $this->session->flashdata('message') ?>
				<div class="table-responsive">
					<table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
						<thead>
						<tr>
							<th>Nomor Daftar</th>
							<th>Nama Mahasiswa</th>
							<th>TTL</th>
							<th>Jenis Kelamin</th>
							<th>Nomor Telp</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($mahasiswa as $item) : ?>
							<tr>
								<td class="align-middle"><?= $item['no_daftar'] ?></td>
								<td class="align-middle"><?= $item['nama_lengkap'] ?></td>
								<td class="align-middle"><?= $item['tempat_lahir'] . ', ' . $item['tgl_lahir'] ?></td>
								<td class="align-middle"><?= $item['jenis_kelamin'] ?></td>
								<td class="align-middle"><?= $item['no_hp'] ?></td>
								<td class="align-middle">
									<a href="<?= base_url('dashboard/show_one/'. $item['no_daftar'] . '/mahasiswa') ?>" class="badge badge-sm badge-success">Detail</i></a> |
									<a href="<?= base_url('dashboard/destroy/'. $item['no_daftar'] . '/mahasiswa') ?>" class="badge badge-sm badge-danger">Hapus</i></a>
								</td>
							</tr>
						<?php endforeach; ?>

						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



<!-- Tambah data -->
<div class="modal fade text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('dashboard/create/mahasiswa'); ?>
					<div class="row">
						<div class="col-md-12">
							<h5 class="text-center"><b>Data Mahasiswa</b></h5>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="inputAddress">Nomor Daftar</label>
								<input type="text" class="form-control" id="inputAddress" value="<?= $this->master_model->getLastData('no_daftar', 'mahasiswa') + 1?>" disabled>
							</div>
							<div class="form-group">
								<label for="nama">Nama Lengkap</label>
								<input type="text" class="form-control" id="nama" placeholder="Masukan Nama Lengkap">
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="tempatLahir">Tempat Lahir</label>
									<input type="text" class="form-control" id="tempatLahir" placeholder="Tempat Lahir">
								</div>
								<div class="form-group col-md-6">
									<label for="tempatLahir">Tanggal Lahir</label>
									<input type="text" class="form-control" data-toggle="datepicker1" placeholder="Tanggal Lahir">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="inputAddress">Jenis Kelamin</label>
									<select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
										<option selected>Pilih...</option>
										<option value="LAKI LAKI">LAKI-LAKI</option>
										<option value="PEREMPUAN">PEREMPUAN</option>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label for="inputAddress">Agama</label>
									<select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
										<option selected>Pilih...</option>
										<option value="ISLAM">ISLAM</option>
										<option value="PROTESTAN">PROTESTAN</option>
										<option value="KATOLIK">KATOLIK</option>
										<option value="HINDU">HINDU</option>
										<option value="BUDDHA">BUDDHA</option>
										<option value="KHONGHUCU">KHONGHUCU</option>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label for="inputAddress">Golongan Darah</label>
									<select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
										<option selected>Pilih...</option>
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="O">O</option>
										<option value="AB">AB</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="kewarganegaraan">Kewarganegaraan</label>
								<select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
									<option selected>Pilih...</option>
									<?php foreach ($countries as $country) :?>
										<option><?=  $country['country'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>

						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="nik">NIK</label>
								<input type="text" class="form-control" id="nik" placeholder="Masukan NIK Mahasiswa">
							</div>
							<div class="form-group">
								<label for="no_transportasi">No Transportasi</label>
								<input type="number" class="form-control" id="no_transportasi" placeholder="Masukan Nomor Transportasi">
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="caradaftar">Cara Daftar</label>
									<select class="custom-select mr-sm-2" id="caradaftar">
										<option selected>Pilih...</option>
										<option value="WEBSITE">WEBSITE</option>
										<option value="FRONT OFFICE">FRONT OFFICE</option>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="tempatLahir">Info Kampus</label>
									<select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
										<option selected>Pilih...</option>
										<option value="WEBSITE">WEBSITE</option>
										<option value="BROSUR">BROSUR</option>
										<option value="SURAT KABAR">SURAT KABAR</option>
										<option value="SOSIAL MEDIA">SOSIAL MEDIA</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="namaref">Nama Ref</label>
								<input type="number" class="form-control" id="namaref" placeholder="Masukan Nama Ref">
							</div>
							<div class="form-group">
								<label for="keterangan">Keterangan</label>
								<input type="number" class="form-control" id="keterangan" placeholder="Masukan Keterangan">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-row">
								<div class="form-group col-md-8">
									<label for="alamat">Alamat</label>
									<textarea class="form-control" id="alamat" rows="5"></textarea>
								</div>
								<div class="form-row col-md-4">
									<div class="form-group col-md-6">
										<label for="rt">RT</label>
										<input type="number" class="form-control" id="rt">
									</div>
									<div class="form-group col-md-6">
										<label for="rw">RW</label>
										<input type="number" class="form-control" id="rw">
									</div>
									<div class="form-group col-md-12">
										<label for="kodepost">Kode Pos</label>
										<input type="number" class="form-control" id="kodepost">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="tempatLahir">Keluranan</label>
								<input type="text" class="form-control" id="tempatLahir" placeholder="Masukan Kelurahan">
							</div>
							<div class="form-group">
								<label for="tempatLahir">Kecamatan</label>
								<input type="text" class="form-control" placeholder="Masukan Kecamatan">
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<h5 class="text-center"><b>Data Orang Tua</b></h5>
						</div>
						<div class="col-md-6">
							<p><b>Data Ayah</b></p>
							<div class="form-group">
								<label for="nik_ayah">NIK</label>
								<input type="number" class="form-control" id="nik_ayah" placeholder="Masukan NIK">
							</div>
							<div class="form-group">
								<label for="nama_ayah">Nama Lengkap</label>
								<input type="text" class="form-control" id="nama_ayah" placeholder="Masukan Nama Lengkap">
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="tempatLahir">Tempat Lahir</label>
									<input type="text" class="form-control" id="tempatLahir" placeholder="Tempat Lahir">
								</div>
								<div class="form-group col-md-6">
									<label for="tempatLahir">Tanggal Lahir</label>
									<input type="text" class="form-control" data-toggle="tempatLahir" placeholder="Tanggal Lahir">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="pendidikan_terakhir_ayah">Pend. Terakhir</label>
									<select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
										<option selected>Pilih...</option>
										<option value="TIDAK SEKOLAH">TIDAK SEKOLAH</option>
										<option value="SD">SD</option>
										<option value="SMP">SMP</option>
										<option value="SMA/SMK">SMA/SMK</option>
										<option value="S1">S1</option>
										<option value="S2">S2</option>
										<option value="S3">S3</option>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="pekerjaan">Pekerjaan</label>
									<input type="text" class="form-control" data-toggle="pekerjaan" placeholder="Masukan Pekerjaan">
								</div>
							</div>
							<div class="form-group">
								<label for="kebutuhan">Kebutuhan Khusus</label>
								<input type="text" class="form-control" data-toggle="kebutuhan" placeholder="Masukan Kebutuhan Khusus">
							</div>
						</div>

						<div class="col-md-6">
							<p><b>Data Ibu</b></p>
							<div class="form-group">
								<label for="nik_ibu">NIK</label>
								<input type="number" class="form-control" id="nik_ibu" placeholder="Masukan NIK">
							</div>
							<div class="form-group">
								<label for="nama_ibu">Nama Lengkap</label>
								<input type="text" class="form-control" id="nama_ibu" placeholder="Masukan Nama Lengkap">
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="tempatLahir">Tempat Lahir</label>
									<input type="text" class="form-control" id="tempatLahir" placeholder="Tempat Lahir">
								</div>
								<div class="form-group col-md-6">
									<label for="tempatLahir">Tanggal Lahir</label>
									<input type="text" class="form-control" data-toggle="tempatLahir" placeholder="Tanggal Lahir">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="pendidikan_terakhir_ibu">Pend. Terakhir</label>
									<select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
										<option selected>Pilih...</option>
										<option value="TIDAK SEKOLAH">TIDAK SEKOLAH</option>
										<option value="SD">SD</option>
										<option value="SMP">SMP</option>
										<option value="SMA/SMK">SMA/SMK</option>
										<option value="S1">S1</option>
										<option value="S2">S2</option>
										<option value="S3">S3</option>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="pekerjaan">Pekerjaan</label>
									<input type="text" class="form-control" data-toggle="pekerjaan" placeholder="Masukan Pekerjaan">
								</div>
							</div>
							<div class="form-group">
								<label for="kebutuhan">Kebutuhan Khusus</label>
								<input type="text" class="form-control" data-toggle="kebutuhan" placeholder="Masukan Kebutuhan Khusus">
							</div>
						</div>
					</div>
				<hr>
				<div class="row justify-content-center">
					<div class="col-md-12">
						<h5 class="text-center"><b>Data Sekolah</b></h5>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="asal_sekolah">Asal Sekolah</label>
									<input type="number" class="form-control" id="asal_sekolah" placeholder="Masukan Asal Sekolah">
								</div>
								<div class="form-group">
									<label for="alamat_sekolah">Alamat Sekolah</label>
									<textarea type="text" class="form-control" id="alamat_sekolah" rows="3"></textarea>
								</div>
								<div class="form-group">
									<label for="lokasisekolah">Lokasi Sekolah</label>
									<input type="text" class="form-control" id="lokasisekolah" placeholder="Lokasi Sekolah">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="jurusan">Jurusan</label>
									<input type="text" class="form-control" id="jurusan" placeholder="Masukan Jurusan">
								</div>
								<div class="form-row">
									<div class="form-group col-md-8">
										<label for="alamat_email_sekolah">Alamat Email</label>
										<input type="email" class="form-control" id="alamat_email_sekolah" placeholder="Masukan Alamat Email">
									</div>
									<div class="form-group col-md-4">
										<label for="kode_pos_sekolah">Kode Pos</label>
										<input type="number" class="form-control" id="kode_pos_sekolah" placeholder="Masukan Kode Pos">
									</div>
								</div>
								<div class="form-group">
									<label for="nomor_telp">Nomor Telp</label>
									<input type="number" class="form-control" id="nomor_telp" placeholder="Masukan Nomor Telp">
								</div>
							</div>
						</div>

					</div>


				</div>
					<button type="submit" class="btn btn-primary">Tambah Data</button>
				</form>
			</div>
		</div>
	</div>
</div>

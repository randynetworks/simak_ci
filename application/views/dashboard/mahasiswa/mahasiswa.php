<!-- Main Content -->
<div id="content">
	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

		<div class="mt-4">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				Tambah Data <?php echo $title; ?>
			</button>
			<a target="_blank" href="<?= base_url('dashboard/export/mahasiswa')?>" class="btn btn-success">
				Export Excel
			</a>

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
								<input  type="text" class="form-control" id="inputAddress" value="<?= $this->master_model->getLastData('no_daftar', 'mahasiswa') + 1?>" disabled>
							</div>
							<div class="form-group required">
								<label class='control-label' for="nama">Nama Lengkap</label>
								<input required="required" value="<?= set_value('nama_lengkap') ?>" name="nama_lengkap" type="text" class="form-control" id="nama" placeholder="Masukan Nama Lengkap">
							</div>
							<div class="form-row">
								<div class="form-group required col-md-6">
									<label class='control-label' for="tempatLahir">Tempat Lahir</label>
									<input required="required" value="<?= set_value('tempat_lahir') ?>" name="tempat_lahir" type="text" class="form-control" id="tempatLahir" placeholder="Tempat Lahir">
								</div>
								<div class="form-group col-md-6 required">
									<label for="tanggallahir" class='control-label'>Tanggal Lahir</label>
									<input required="required" value="<?= set_value('tgl_lahir') ?>" name="tgl_lahir" type="text" class="form-control" data-toggle="datepicker" placeholder="Tanggal Lahir">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="jk">Jenis Kelamin</label>
									<select name="jenis_kelamin" class="custom-select mr-sm-2" id="jk">
										<option selected value="LAKI LAKI">LAKI-LAKI</option>
										<option value="PEREMPUAN">PEREMPUAN</option>
									</select>
								</div>
								<div class="form-group col-md-4 required">
									<label for="agama" class='control-label'>Agama</label>
									<select required="required" name="agama" class="custom-select mr-sm-2" id="agama">
										<option selected value="ISLAM">ISLAM</option>
										<option value="PROTESTAN">PROTESTAN</option>
										<option value="KATOLIK">KATOLIK</option>
										<option value="HINDU">HINDU</option>
										<option value="BUDDHA">BUDDHA</option>
										<option value="KHONGHUCU">KHONGHUCU</option>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label for="goldarah">Golongan Darah</label>
									<select name="gol_darah" class="custom-select mr-sm-2" id="goldarah">
										<option selected value="A">A</option>
										<option value="B">B</option>
										<option value="O">O</option>
										<option value="AB">AB</option>
									</select>
								</div>
							</div>
							<div class="form-group required">
								<label class='control-label' for="kewarganegaraan">Kewarganegaraan</label>
								<select required="required" name="kewarganegaraan" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
									<?php foreach ($countries as $country) :?>
										<?= $country['country'] === 'Indonesia' ? '<option selected' : '<option ' ?> value="<?= $country['country'] ?>"><?=  $country['country'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input value="<?= set_value('email') ?>" name="email" type="email" class="form-control" id="email" placeholder="Masukan Email Mahasiswa">
							</div>
							<div class="form-group">
								<label for="no_hp">No HP</label>
								<input value="<?= set_value('no_hp') ?>" name="no_hp" type="number" class="form-control" id="no_hp" placeholder="Masukan No HP Mahasiswa">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group required">
								<label class='control-label' for="nik">NIK</label>
								<input required="required" value="<?= set_value('nik') ?>" name="nik" type="number" class="form-control" id="nik" placeholder="Masukan NIK Mahasiswa">
							</div>
							<div class="form-group">
								<label for="nisn">NISN</label>
								<input value="<?= set_value('nisn') ?>" name="nisn" type="number" class="form-control" id="nisn" placeholder="Masukan NISN Mahasiswa">
							</div>
							<div class="form-group">
								<label for="no_transportasi">No Transportasi</label>
								<input value="<?= set_value('id_alat_transportasi') ?>" name="id_alat_transportasi" type="number" class="form-control" id="no_transportasi" placeholder="Masukan Nomor Transportasi">
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="caradaftar">Cara Daftar</label>
									<select name="cara_daftar" class="custom-select mr-sm-2" id="caradaftar">
										<option selected value="WEBSITE">WEBSITE</option>
										<option value="FRONT OFFICE">FRONT OFFICE</option>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="tempatLahir">Info Kampus</label>
									<select name="tahu_info_kampus" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
										<option selected value="WEBSITE">WEBSITE</option>
										<option value="BROSUR">BROSUR</option>
										<option value="SURAT KABAR">SURAT KABAR</option>
										<option value="SOSIAL MEDIA">SOSIAL MEDIA</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="namaref">Referensi</label>
								<input value="<?= set_value('nama_ref') ?>" name="nama_ref" type="text" class="form-control" id="namaref" placeholder="Masukan Nama Referensi">
							</div>
							<div class="form-group">
								<label for="keterangan">Keterangan</label>
								<input value="<?= set_value('keterangan') ?>" name="keterangan" type="text" class="form-control" id="keterangan" placeholder="Masukan Keterangan">
							</div>
							<div class="form-group required">
								<label for="penerima_kps" class='control-label'>Menerima KPS</label>
								<select required="required" name="penerima_kps" class="custom-select mr-sm-2" id="penerima_kps">
									<option selected value="YA">YA</option>
									<option value="TIDAK">TIDAK</option>
								</select>
							</div>
							<div class="form-group">
								<label for="no_kps">Nomor KPS</label>
								<input value="<?= set_value('no_kps') ?>" name="no_kps" type="text" class="form-control" id="no_kps" placeholder="Masukan Nomor KPS">
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<div class="form-row">
								<div class="form-group col-md-8">
									<label for="alamat">Alamat</label>
									<textarea name="alamat" class="form-control" id="alamat" rows="4"><?= set_value('alamat') ?></textarea>
								</div>
								<div class="form-row col-md-4">
									<div class="form-group col-md-6">
										<label for="rt">RT</label>
										<input value="<?= set_value('rt') ?>" name="rt" type="number" class="form-control" id="rt">
									</div>
									<div class="form-group col-md-6">
										<label for="rw">RW</label>
										<input value="<?= set_value('rw') ?>" name="rw" type="number" class="form-control" id="rw">
									</div>
									<div class="form-group col-md-12">
										<label for="kodepos">Kode Pos</label>
										<input value="<?= set_value('kodepos') ?>" name="kodepos" type="number" class="form-control" id="kodepos">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="no_telp_rumah">No Telp Rumah</label>
								<input value="<?= set_value('no_telp_rumah') ?>" name="no_telp_rumah" type="number" class="form-control" id="no_telp_rumah" placeholder="Masukan No Telp Rumah Mahasiswa">
							</div>
							<div class="form-group">
								<label for="jenis_tinggal">Jenis Tinggal</label>
								<select name="jenis_tinggal" class="custom-select mr-sm-2" id="pendidikan_terakhir_ayah">
									<option selected value="RUMAH SENDIRI">RUMAH SENDIRI</option>
									<option value="RUMAH ORANG TUA">RUMAH ORANG TUA</option>
									<option value="KOST">KOST</option>
									<option value="SEWA RUMAH">SEWA RUMAH</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group required">
								<label for="kelurahan" class='control-label'>Kelurahan</label>
								<input required="required" value="<?= set_value('kelurahan') ?>" name="kelurahan" type="text" class="form-control" id="kelurahan" placeholder="Masukan Kelurahan">
							</div>
							<div class="form-group required">
								<label for="kecamatan" class='control-label'>Kecamatan</label>
								<input required="required" value="<?= set_value('kec') ?>" name="kec" type="text" class="form-control" id="kecamatan" placeholder="Masukan Kecamatan">
							</div>
							<div class="form-group">
								<label for="kotakab">Kota</label>
								<input value="<?= set_value('kotakab') ?>" name="kotakab" type="text" class="form-control" id="kotakab" placeholder="Masukan Kota">
							</div>
							<div class="form-group">
								<label for="prov">Provinsi</label>
								<input value="<?= set_value('prov') ?>" name="prov" type="text" class="form-control" id="prov" placeholder="Masukan Provinsi">
							</div>
							<div class="form-group">
								<label for="id_wilayah">wilayah</label>
								<input value="<?= set_value('id_wilayah') ?>" name="id_wilayah" type="text" class="form-control" id="id_wilayah" placeholder="Masukan Wilayah">
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
								<input value="<?= set_value('nik_ayah') ?>" name="nik_ayah" type="number" class="form-control" id="nik_ayah" placeholder="Masukan NIK">
							</div>
							<div class="form-group">
								<label for="nama_ayah">Nama Lengkap</label>
								<input value="<?= set_value('nama_ayah') ?>" name="nama_ayah" type="text" class="form-control" id="nama_ayah" placeholder="Masukan Nama Lengkap">
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="tempatLahirayah">Tempat Lahir</label>
									<input value="<?= set_value('tempat_lahir_ayah') ?>" name="tempat_lahir_ayah" type="text" class="form-control" id="tempatLahirayah" placeholder="Tempat Lahir">
								</div>
								<div class="form-group col-md-6">
									<label for="tempatLahir">Tanggal Lahir</label>
									<input value="<?= set_value('tanggal_lahir_ayah') ?>" name="tanggal_lahir_ayah" type="text" class="form-control" data-toggle="datepicker" placeholder="Tanggal Lahir">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="pendidikan_terakhir_ayah">Pend. Terakhir</label>
									<select name="pendidikan_ayah" class="custom-select mr-sm-2" id="pendidikan_terakhir_ayah">
										<option selected value="TIDAK SEKOLAH">TIDAK SEKOLAH</option>
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
									<input value="<?= set_value('pekerjaan_ayah') ?>" name="pekerjaan_ayah" type="text" class="form-control" data-toggle="pekerjaan" placeholder="Masukan Pekerjaan">
								</div>
							</div>
							<div class="form-group">
								<label for="penghasilan">Penghasilan</label>
								<input value="<?= set_value('penghasilan_ayah') ?>" name="penghasilan_ayah" type="number" class="form-control" data-toggle="penghasilan" placeholder="Masukan Penghasilan">
							</div>
							<div class="form-group">
								<label for="kebutuhan">Kebutuhan Khusus</label>
								<input value="<?= set_value('id_kebutuhan_khusus_ayah') ?>" name="id_kebutuhan_khusus_ayah" type="text" class="form-control" placeholder="Masukan Kebutuhan Khusus">
							</div>
						</div>

						<div class="col-md-6">
							<p><b>Data Ibu</b></p>
							<div class="form-group">
								<label for="nik_ibu">NIK</label>
								<input value="<?= set_value('nik_ibu') ?>" name="nik_ibu" type="number" class="form-control" id="nik_ibu" placeholder="Masukan NIK">
							</div>
							<div class="form-group required">
								<label for="nama_ibu" class='control-label'>Nama Lengkap</label>
								<input required="required" value="<?= set_value('nama_ibu') ?>" name="nama_ibu" type="text" class="form-control" id="nama_ibu" placeholder="Masukan Nama Lengkap">
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="tempatLahiribu">Tempat Lahir</label>
									<input value="<?= set_value('tempat_lahir_ibu') ?>" name="tempat_lahir_ibu" type="text" class="form-control" id="tempatLahiribu" placeholder="Tempat Lahir">
								</div>
								<div class="form-group col-md-6">
									<label for="tempatLahir">Tanggal Lahir</label>
									<input value="<?= set_value('tanggal_lahir_ibu') ?>" name="tanggal_lahir_ibu" type="text" class="form-control" data-toggle="datepicker" placeholder="Tanggal Lahir">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="pendidikan_terakhir_ibu">Pend. Terakhir</label>
									<select name="pendidikan_ibu" class="custom-select mr-sm-2" id="pendidikan_terakhir_ibu">
										<option selected value="TIDAK SEKOLAH">TIDAK SEKOLAH</option>
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
									<input value="<?= set_value('pekerjaan_ibu') ?>" name="pekerjaan_ibu" type="text" class="form-control" data-toggle="pekerjaan" placeholder="Masukan Pekerjaan">
								</div>
							</div>
							<div class="form-group">
								<label for="penghasilan">Penghasilan</label>
								<input value="<?= set_value('penghasilan_ibu') ?>" name="penghasilan_ibu" type="number" class="form-control" data-toggle="penghasilan" placeholder="Masukan Penghasilan">
							</div>
							<div class="form-group">
								<label for="kebutuhan">Kebutuhan Khusus</label>
								<input value="<?= set_value('id_kebutuhan_khusus_ibu') ?>" name="id_kebutuhan_khusus_ibu" type="text" class="form-control" data-toggle="kebutuhan" placeholder="Masukan Kebutuhan Khusus">
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
									<input value="<?= set_value('asal_sekolah') ?>" name="asal_sekolah" type="text" class="form-control" id="asal_sekolah" placeholder="Masukan Asal Sekolah">
								</div>
								<div class="form-group">
									<label for="alamat_sekolah">Alamat Sekolah</label>
									<textarea name="alamat_sekolah" type="text" class="form-control" id="alamat_sekolah" rows="3"><?= set_value('alamat_sekolah') ?></textarea>
								</div>
								<div class="form-group">
									<label for="lokasisekolah">Lokasi Sekolah</label>
									<input value="<?= set_value('kotakab_sekolah') ?>" name="kotakab_sekolah" type="text" class="form-control" id="lokasisekolah" placeholder="Lokasi Sekolah">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="jurusan">Jurusan</label>
									<input value="<?= set_value('jurusan_sekolah') ?>" name="jurusan_sekolah" type="text" class="form-control" id="jurusan" placeholder="Masukan Jurusan">
								</div>
								<div class="form-row">
									<div class="form-group col-md-8">
										<label for="alamat_email_sekolah">Alamat Email</label>
										<input value="<?= set_value('email_sekolah') ?>" name="email_sekolah" type="email" class="form-control" id="alamat_email_sekolah" placeholder="Masukan Alamat Email">
									</div>
									<div class="form-group col-md-4">
										<label for="kode_pos_sekolah">Kode Pos</label>
										<input value="<?= set_value('pos_sekolah') ?>" name="pos_sekolah" type="number" class="form-control" id="kode_pos_sekolah" placeholder="Masukan Kode Pos">
									</div>
								</div>
								<div class="form-group">
									<label for="nomor_telp">Nomor Telp</label>
									<input value="<?= set_value('no_telp_sekolah') ?>" name="no_telp_sekolah" type="number" class="form-control" id="nomor_telp" placeholder="Masukan Nomor Telp">
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

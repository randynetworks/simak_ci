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
			<a target="_blank" href="<?= base_url('dashboard/export/dosen')?>" class="btn btn-success">
				Export Excel
			</a>

			<div class="row mt-3">

				<!--			SEARCHING        -->
				<div class="col-md-5">
					<form action="<?= base_url('dashboard/show/dosen') ?>" method="post">
						<div class="input-group mb-3">
							<input name="keyword" type="text"  class="form-control datepicker" placeholder="Cari Berdasarkan Nama">
							<div class="input-group-append">
								<button type="submit" name="submit" class="btn btn-outline-primary" >Cari</button>
							</div>
						</div>
					</form>
				</div>

				<!--			Urutkan Berdasarkan        -->
<!--				<div class="col-md-5">-->
<!--					<form action="--><?php //echo base_url('/dashboard/show/mahasiswa') ?><!--" method="post">-->
<!--						<div class="input-group mb-3">-->
<!---->
<!--							<select class="form-control" describedby="button-addon2" autocomplete="off" autofocus id="order_by" name="order_by">-->
<!--								<option>Urutkan Berdasarkan</option>-->
<!---->
<!--								<!--MEMANGGIL DATA FIELD TABLE-->
<!--								--><?php
//								$fields = $this->master_model->getListField('mahasiswa');
//								foreach ($fields as $field) {
//									if ($field === 'id') {
//										continue;
//									}
//									$result = ucfirst(str_replace('_', ' ', $field));
//									if ($field === 'created_at') {
//										$result = 'Tanggal';
//									}
//									echo "<option value='$field'>$result</option>";
//								}
//
//								?>
<!--							</select>-->
<!--							<div class="input-group-append">-->
<!--								<button type="submit" class="btn btn-outline-success" id="btn-sorting">Urut</button>-->
<!--							</div>-->
<!--						</div>-->
<!--					</form>-->
<!--				</div>-->
				<div class="col-md-1">
					<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#filter">
						Filter
					</button>
				</div>
				<div class="col-md-1">
					<form action="<?php echo base_url('dashboard/show/dosen') ?>" method="post">
						<input type="submit" class="btn btn-outline-danger" name="reset" value="Reset">
					</form>
				</div>
			</div>
		</div>

		<!-- data table -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-purple">Data Table Dosen per tanggal <?= date('d F Y') ?> </h6>
			</div>
			<div class="card-body">

				<?= $this->session->flashdata('message') ?>
				<div class="table-responsive">
					<table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
						<thead>
						<tr>
							<th>NIDN</th>
							<th>Nama Lengkap</th>
							<th>Prodi</th>
							<th>Status Dosen</th>
							<th>Status Aktif</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($dosen as $item) : ?>
							<tr>
								<td class="align-middle"><?= $item['nidn'] ?></td>
								<td class="align-middle"><?= $item['nama_lengkap'] ?></td>
								<td class="align-middle"><?= $item['id_prodi'] ?></td>
								<td class="align-middle"><?= $item['status_dosen'] ?></td>
								<td class="align-middle"><?= $item['status_aktif'] ?></td>
								<td class="align-middle">
									<a href="<?= base_url('dashboard/show_one/'. $item['id_dosen'] . '/dosen') ?>" class="badge badge-sm badge-success">Detail</i></a> |
									<a href="<?= base_url('dashboard/destroy/'. $item['id_dosen'] . '/dosen') ?>" class="badge badge-sm badge-danger">Hapus</i></a>
								</td>
							</tr>
						<?php endforeach; ?>

						</tbody>
					</table>
					<?= $this->pagination->create_links() ?>
				</div>
			</div>
		</div>

	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- FILTER -->
<div class="modal fade text-dark" id="filter" tabindex="-1" aria-labelledby="modalMaterialLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="filter">Filter Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('dashboard/show/mahasiswa'); ?>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="jk">Jenis Kelamin</label>
						<select name="jenis_kelamin" class="custom-select mr-sm-2" id="jk">
							<option value=""></option>
							<option value="LAKI-LAKI">LAKI-LAKI</option>
							<option value="PEREMPUAN">PEREMPUAN</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="agama">Agama</label>
						<select  name="agama" class="custom-select mr-sm-2" id="agama">
							<option value=""></option>
							<option value="ISLAM">ISLAM</option>
							<option value="PROTESTAN">PROTESTAN</option>
							<option value="KATOLIK">KATOLIK</option>
							<option value="HINDU">HINDU</option>
							<option value="BUDDHA">BUDDHA</option>
							<option value="KHONGHUCU">KHONGHUCU</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="goldarah">Golongan Darah</label>
						<select name="gol_darah" class="custom-select mr-sm-2" id="goldarah">
							<option value=""></option>
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="O">O</option>
							<option value="AB">AB</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="kewarganegaraan">Kewarganegaraan</label>
						<select name="kewarganegaraan" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
							<option value=""></option>
							<?php foreach ($countries as $country) :?>
								<option value="<?= $country['country'] ?>"><?=  $country['country'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="caradaftar">Cara Daftar</label>
						<select name="cara_daftar" class="custom-select mr-sm-2" id="caradaftar">
							<option value=""></option>
							<option value="WEBSITE">WEBSITE</option>
							<option value="FRONT OFFICE">FRONT OFFICE</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="tempatLahir">Info Kampus</label>
						<select name="tahu_info_kampus" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
							<option value=""></option>
							<option value="WEBSITE">WEBSITE</option>
							<option value="BROSUR">BROSUR</option>
							<option value="SURAT KABAR">SURAT KABAR</option>
							<option value="SOSIAL MEDIA">SOSIAL MEDIA</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="penerima_kps">Menerima KPS</label>
						<select name="penerima_kps" class="custom-select mr-sm-2" id="penerima_kps">
							<option value=""></option>
							<option value="YA">YA</option>
							<option value="TIDAK">TIDAK</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="jenis_tinggal">Jenis Tinggal</label>
						<select name="jenis_tinggal" class="custom-select mr-sm-2" id="pendidikan_terakhir_ayah">
							<option value=""></option>
							<option value="RUMAH SENDIRI">RUMAH SENDIRI</option>
							<option value="RUMAH ORANG TUA">RUMAH ORANG TUA</option>
							<option value="KOST">KOST</option>
							<option value="SEWA RUMAH">SEWA RUMAH</option>
						</select>
					</div>
				</div>
				<button type="submit" class="btn btn-primary" onClick="return confirm('Yakin akan difilter?')">Filter</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>
	</div>
</div>




<!-- Tambah data -->
<div class="modal fade text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Dosen</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('dashboard/create/dosen'); ?>
					<div class="row">
						<div class="col-md-12">
							<h5 class="text-center"><b>Data Dosen</b></h5>
						</div>
						<div class="col-md-6">
							<p><b>Nomor Induk</b></p>
							<div class="form-row">
								<div class="form-group required col-md-6">
									<label class='control-label' for="nidn">NIDN</label>
									<input required="required" value="<?= set_value('nidn') ?>" name="nidn" type="number" class="form-control" id="nidn" placeholder="Masukan NIDN">
								</div>
								<div class="form-group col-md-6 required">
									<label for="nip" class='control-label'>NIP</label>
									<input required="required" value="<?= set_value('nip') ?>" name="nip" type="number" class="form-control" placeholder="Masukan NIP">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group required col-md-6">
									<label class='control-label' for="nik">NIK</label>
									<input required="required" value="<?= set_value('nik') ?>" name="nik" type="number" class="form-control" id="nik" placeholder="Masukan NIK">
								</div>
								<div class="form-group col-md-6 required">
									<label for="npwp">NPWP</label>
									<input value="<?= set_value('npwp') ?>" name="npwp" type="number" class="form-control" placeholder="Masukan NPWP">
								</div>
							</div>
							<p><b>Data Pribadi</b></p>
							<div class="form-group required">
								<label class='control-label' for="nama">Nama Lengkap</label>
								<input required="required" value="<?= set_value('nama_lengkap') ?>" name="nama_lengkap" type="text" class="form-control" id="nama" placeholder="Masukan Nama Lengkap">
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label class='control-label' for="gelar_awal">Gelar Awal</label>
									<input value="<?= set_value('gelar_awal') ?>" name="tempat_lahir" type="text" class="form-control" id="gelar_awal" placeholder="Masukan Gelar Awal">
								</div>
								<div class="form-group col-md-6 required">
									<label for="gelar_akhir" class='control-label'>Gelar Akhir</label>
									<input value="<?= set_value('gelar_akhir') ?>" name="gelar_akhir" type="text" class="form-control" placeholder="Masukan Gelar Akhir">
								</div>
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
								<div class="form-group col-md-6">
									<label for="jk">Jenis Kelamin</label>
									<select name="jenis_kelamin" class="custom-select mr-sm-2" id="jk">
										<option selected value="LAKI-LAKI">LAKI-LAKI</option>
										<option value="PEREMPUAN">PEREMPUAN</option>
									</select>
								</div>
								<div class="form-group col-md-6 required">
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
							</div>
							<hr>
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
						</div>
						<div class="col-md-6">
							<p><b>Kontak Dosen</b></p>
							<div class="form-group">
								<label for="no_hp">No HP</label>
								<input value="<?= set_value('no_hp') ?>" name="no_hp" type="number" class="form-control" id="no_hp" placeholder="Masukan No HP">
							</div>
							<div class="form-group">
								<label for="no_telp">No Telp</label>
								<input value="<?= set_value('no_telp') ?>" name="no_telp" type="number" class="form-control" id="no_telp" placeholder="Masukan No Telp">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input value="<?= set_value('email') ?>" name="email" type="email" class="form-control" id="email" placeholder="Masukan Email">
							</div>
							<hr>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="status_pernikahan">Status Pernikahan</label>
									<select name="status_pernikahan" class="custom-select mr-sm-2" id="status_pernikahan">
										<option selected value="BELUM KAWIN">BELUM KAWIN</option>
										<option value="KAWIN">KAWIN</option>
										<option value="CERAI HIDUP">CERAI HIDUP</option>
										<option value="CERAI MATI">CERAI MATI</option>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="nama_suami_istri">Nama Pasangan</label>
									<input value="<?= set_value('nama_suami_istri') ?>" name="nama_suami_istri" type="text" class="form-control" id="nama_suami_istri" placeholder="Masukan Nama Pasangan">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="jumlah_anak">Jumlah Anak</label>
									<select name="jumlah_anak" class="custom-select mr-sm-2" id="jumlah_anak">
										<option selected value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="ukuran_jas">Ukuran JAS</label>
									<select name="ukuran_jas" class="custom-select mr-sm-2" id="ukuran_jas">
										<option selected value="S">S</option>
										<option value="M">M</option>
										<option value="L">L</option>
										<option value="XL">XL</option>
										<option value="XXL">XXL</option>
										<option value="XXXL">XXXL</option>
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="tmp_masuk">Tanggal Masuk</label>
									<input required="required" value="<?= set_value('tmp_masuk') ?>" name="tgl_lahir" type="text" class="form-control" data-toggle="datepicker" placeholder="Tanggal Masuk">
								</div>
								<div class="form-group col-md-6">
									<label for="status_dosen">Status Dosen</label>
									<select name="status_dosen" class="custom-select mr-sm-2" id="status_dosen">
										<option selected value="DOSEN TETAP">DOSEN TETAP</option>
										<option value="DOSEN TIDAK TETAP">DOSEN TIDAK TETAP</option>
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="id_prodi">Prodi</label>
									<select name="id_prodi" class="custom-select mr-sm-2" id="id_prodi">
										<option selected value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="status_aktif">Status Aktif</label>
									<select name="status_aktif" class="custom-select mr-sm-2" id="status_aktif">
										<option selected value="AKTIF">AKTIF</option>
										<option value="TIDAK AKTIF">TIDAK AKTIF</option>
									</select>
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

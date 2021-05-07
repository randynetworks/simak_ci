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
			<a target="_blank" href="<?= base_url('dashboard/export/prodi')?>" class="btn btn-success">
				Export Excel
			</a>

			<div class="row mt-3">

				<!--			SEARCHING        -->
				<div class="col-md-5">
					<form action="<?= base_url('dashboard/show/prodi') ?>" method="post">
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
<!--					<form action="--><?php //echo base_url('/dashboard/show/prodi') ?><!--" method="post">-->
<!--						<div class="input-group mb-3">-->
<!---->
<!--							<select class="form-control" describedby="button-addon2" autocomplete="off" autofocus id="order_by" name="order_by">-->
<!--								<option>Urutkan Berdasarkan</option>-->
<!---->
<!--								<!--MEMANGGIL DATA FIELD TABLE-->
<!--								--><?php
//								$fields = $this->master_model->getListField('prodi');
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
					<form action="<?php echo base_url('dashboard/show/prodi') ?>" method="post">
						<input type="submit" class="btn btn-outline-danger" name="reset" value="Reset">
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
							<th>ID Prodi</th>
							<th>Kode Ps</th>
							<th>Jenjang</th>
							<th>Nama Prodi</th>
							<th>Status Prodi</th>
							<th>Aksi</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($prodi as $item) : ?>
							<tr>
								<td class="align-middle"><?= $item['id_prodi'] ?></td>
								<td class="align-middle"><?= $item['kode_ps'] ?></td>
								<td class="align-middle"><?= $item['jenjang'] ?></td>
								<td class="align-middle"><?= $item['nama_prodi'] . ' (' . $item['nama_prodi2'] . ')' ?></td>
								<td class="align-middle"><?= $item['status_prodi'] ?></td>
								<td class="align-middle">
									<a href="<?= base_url('dashboard/show_one/'. $item['id_prodi'] . '/prodi') ?>" class="badge badge-sm badge-success">Detail</i></a> |
									<a href="<?= base_url('dashboard/destroy/'. $item['id_prodi'] . '/prodi') ?>" class="badge badge-sm badge-danger">Hapus</i></a>
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

<!---->
<!--<div class="modal fade text-dark" id="filter" tabindex="-1" aria-labelledby="modalMaterialLabel" aria-hidden="true">-->
<!--	<div class="modal-dialog">-->
<!--		<div class="modal-content">-->
<!--			<div class="modal-header">-->
<!--				<h5 class="modal-title" id="filter">Filter Data</h5>-->
<!--				<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--					<span aria-hidden="true">&times;</span>-->
<!--				</button>-->
<!--			</div>-->
<!--			<div class="modal-body">-->
<!--				--><?php //echo form_open('dashboard/show/prodi'); ?>
<!--				<div class="form-row">-->
<!--					<div class="form-group col-md-6">-->
<!--						<label for="jk">Jenis Kelamin</label>-->
<!--						<select name="jenis_kelamin" class="custom-select mr-sm-2" id="jk">-->
<!--							<option value=""></option>-->
<!--							<option value="LAKI-LAKI">LAKI-LAKI</option>-->
<!--							<option value="PEREMPUAN">PEREMPUAN</option>-->
<!--						</select>-->
<!--					</div>-->
<!--					<div class="form-group col-md-6">-->
<!--						<label for="agama">Agama</label>-->
<!--						<select  name="agama" class="custom-select mr-sm-2" id="agama">-->
<!--							<option value=""></option>-->
<!--							<option value="ISLAM">ISLAM</option>-->
<!--							<option value="PROTESTAN">PROTESTAN</option>-->
<!--							<option value="KATOLIK">KATOLIK</option>-->
<!--							<option value="HINDU">HINDU</option>-->
<!--							<option value="BUDDHA">BUDDHA</option>-->
<!--							<option value="KHONGHUCU">KHONGHUCU</option>-->
<!--						</select>-->
<!--					</div>-->
<!--					<div class="form-group col-md-6">-->
<!--						<label for="goldarah">Golongan Darah</label>-->
<!--						<select name="gol_darah" class="custom-select mr-sm-2" id="goldarah">-->
<!--							<option value=""></option>-->
<!--							<option value="A">A</option>-->
<!--							<option value="B">B</option>-->
<!--							<option value="O">O</option>-->
<!--							<option value="AB">AB</option>-->
<!--						</select>-->
<!--					</div>-->
<!--					<div class="form-group col-md-6">-->
<!--						<label for="kewarganegaraan">Kewarganegaraan</label>-->
<!--						<select name="kewarganegaraan" class="custom-select mr-sm-2" id="inlineFormCustomSelect">-->
<!--							<option value=""></option>-->
<!--							--><?php //foreach ($countries as $country) :?>
<!--								<option value="--><?//= $country['country'] ?><!--">--><?//=  $country['country'] ?><!--</option>-->
<!--							--><?php //endforeach; ?>
<!--						</select>-->
<!--					</div>-->
<!--					<div class="form-group col-md-6">-->
<!--						<label for="caradaftar">Cara Daftar</label>-->
<!--						<select name="cara_daftar" class="custom-select mr-sm-2" id="caradaftar">-->
<!--							<option value=""></option>-->
<!--							<option value="WEBSITE">WEBSITE</option>-->
<!--							<option value="FRONT OFFICE">FRONT OFFICE</option>-->
<!--						</select>-->
<!--					</div>-->
<!--					<div class="form-group col-md-6">-->
<!--						<label for="tempatLahir">Info Kampus</label>-->
<!--						<select name="tahu_info_kampus" class="custom-select mr-sm-2" id="inlineFormCustomSelect">-->
<!--							<option value=""></option>-->
<!--							<option value="WEBSITE">WEBSITE</option>-->
<!--							<option value="BROSUR">BROSUR</option>-->
<!--							<option value="SURAT KABAR">SURAT KABAR</option>-->
<!--							<option value="SOSIAL MEDIA">SOSIAL MEDIA</option>-->
<!--						</select>-->
<!--					</div>-->
<!--					<div class="form-group col-md-6">-->
<!--						<label for="penerima_kps">Menerima KPS</label>-->
<!--						<select name="penerima_kps" class="custom-select mr-sm-2" id="penerima_kps">-->
<!--							<option value=""></option>-->
<!--							<option value="YA">YA</option>-->
<!--							<option value="TIDAK">TIDAK</option>-->
<!--						</select>-->
<!--					</div>-->
<!--					<div class="form-group col-md-6">-->
<!--						<label for="jenis_tinggal">Jenis Tinggal</label>-->
<!--						<select name="jenis_tinggal" class="custom-select mr-sm-2" id="pendidikan_terakhir_ayah">-->
<!--							<option value=""></option>-->
<!--							<option value="RUMAH SENDIRI">RUMAH SENDIRI</option>-->
<!--							<option value="RUMAH ORANG TUA">RUMAH ORANG TUA</option>-->
<!--							<option value="KOST">KOST</option>-->
<!--							<option value="SEWA RUMAH">SEWA RUMAH</option>-->
<!--						</select>-->
<!--					</div>-->
<!--				</div>-->
<!--				<button type="submit" class="btn btn-primary" onClick="return confirm('Yakin akan difilter?')">Filter</button>-->
<!--				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--				</form>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
<!---->
<!---->
<!---->
<!---->
<!-- Tambah data -->
<div class="modal fade text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Prodi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('dashboard/create/prodi'); ?>
					<div class="row">
						<div class="col-md-12">
							<h5 class="text-center"><b>Data Prodi</b></h5>
						</div>
						<div class="col-md-12">
							<div class="form-row">
								<div class="form-group required col-md-6">
									<label class='control-label' for="id_prodi">ID Prodi</label>
									<input value="<?= $this->master_model->getLastData('id_prodi', 'prodi') + 1?>" type="text" class="form-control" id="nama" disabled>
									<input value="<?= $this->master_model->getLastData('id_prodi', 'prodi') + 1?>" name="id_prodi" type="hidden" class="form-control" id="nama" >
								</div>
								<div class="form-group required col-md-6">
									<label class='control-label'>Kode PS</label>
									<input required="required" name="kode_ps" type="text" class="form-control" placeholder="Masukan Kode PS">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group required col-md-6">
									<label class='control-label' for="jenjang">Jenjang</label>
									<select required="required" name="jenjang" class="custom-select mr-sm-2" id="jenjang">
										<option selected value="DD">DD</option>
										<option value="D3">D3</option>
										<option value="D4">D4</option>
									</select>
								</div>
								<div class="form-group required col-md-6">
									<label class='control-label'>Status Studi</label>
									<select required="required" name="status_prodi" class="custom-select mr-sm-2" id="status_prodi">
										<option selected value="AKTIF">AKTIF</option>
										<option value="TIDAK AKTIF">TIDAK AKTIF</option>
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group required col-md-6">
									<label class='control-label' for="nama_prodi">Nama Prodi</label>
									<input required="required" name="nama_prodi" type="text" class="form-control" placeholder="Masukan Nama Prodi">

								</div>
								<div class="form-group required col-md-6">
									<label class='control-label' for="nama_prodi2"><i>Name of study Program</i></label>
									<input required="required" name="nama_prodi2" type="text" class="form-control" placeholder="Masukan Nama Prodi">

								</div>
							</div>
							<div class="form-row">
								<div class="form-group required col-md-6">
									<label class='control-label' for="no_sk_Akred">No SK Akreditasi</label>
									<input required="required" name="no_sk_Akred" type="text" class="form-control" placeholder="Masukan Nomor SK Akred">

								</div>
								<div class="form-group required col-md-6">
									<label class='control-label' for="tgl_akhir_Akred">Tanggal Akhir Akreditasi</label>
									<input required="required" value="<?= set_value('tgl_akhir_Akred') ?>" data-toggle="datepicker" name="tgl_akhir_Akred" type="text" class="form-control" id="tgl_akhir_Akred" placeholder="Tempat Lahir">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group required col-md-6">
									<label class='control-label' for="nilai_akreditasi">Nilai Akreditasi</label>
									<select required="required" name="nilai_akreditasi" class="custom-select mr-sm-2" id="status_prodi">
										<option selected value="-">-</option>
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="C">C</option>
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group required col-md-6">
									<label class='control-label' for="no_sk_Akred">Nama Singkatan Prodi</label>
									<input required="required" name="nama_singkatan_prodi" type="text" class="form-control" placeholder="Masukan Nama singkatan Prodi">

								</div>
								<div class="form-group required col-md-6">
									<label class='control-label' for="nidn">Ketua Prodi</label>

<!--									Tambah data dosen yang menjabat jadi ketua prodi               -->
									<select required="required" name="nidn" class="custom-select mr-sm-2" id="nidn">
<!--										NIDN                    -->
										<option selected value="-">-</option>

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

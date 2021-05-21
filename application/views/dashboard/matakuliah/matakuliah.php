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
			<a target="_blank" href="<?= base_url('dashboard/export/matakuliah') ?>" class="btn btn-success">
				Export Excel
			</a>

			<div class="row mt-3">

				<!--			SEARCHING        -->
				<div class="col-md-5">
					<form action="<?= base_url('dashboard/show/matakuliah') ?>" method="post">
						<div class="input-group mb-3">
							<input name="keyword" type="text" class="form-control datepicker" placeholder="Cari Berdasarkan Nama">
							<div class="input-group-append">
								<button type="submit" name="submit" class="btn btn-outline-primary">Cari</button>
							</div>
						</div>
					</form>
				</div>

				<!--			Urutkan Berdasarkan        -->
				<!--				<div class="col-md-5">-->
				<!--					<form action="--><?php //echo base_url('/dashboard/show/matakuliah') 
															?>
				<!--" method="post">-->
				<!--						<div class="input-group mb-3">-->
				<!---->
				<!--							<select class="form-control" describedby="button-addon2" autocomplete="off" autofocus id="order_by" name="order_by">-->
				<!--								<option>Urutkan Berdasarkan</option>-->
				<!---->
				<!--								<!--MEMANGGIL DATA FIELD TABLE-->
				<!--								--><?php
														//								$fields = $this->master_model->getListField('matakuliah');
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
														//								
														?>
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
					<form action="<?php echo base_url('dashboard/show/matakuliah') ?>" method="post">
						<input type="submit" class="btn btn-outline-danger" name="reset" value="Reset">
					</form>
				</div>
			</div>
		</div>

		<!-- data table -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-purple">Data Table matakuliah per tanggal <?= date('d F Y') ?> </h6>
			</div>
			<div class="card-body">

				<?= $this->session->flashdata('message') ?>
				<div class="table-responsive">
					<table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Kode Mata Kuliah</th>
								<th>Nama Mata Kuliah</th>
								<th>Subjek</th>
								<th>SKS</th>
								<th>Pra Syarat</th>
								<th>Semester</th>
								<th>Jurusan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($matakuliah as $item) : ?>
								<tr>
									<td class="align-middle"><?= $item['KodeMatkul'] ?></td>
									<td class="align-middle"><?= $item['Matkul'] ?></td>
									<td class="align-middle"><?= $item['Subjek'] ?></td>
									<td class="align-middle"><?= $item['SKS'] ?></td>
									<td class="align-middle"><?= $item['PraSyarat'] ?></td>
									<td class="align-middle"><?= $item['Smt'] ?></td>
									<td class="align-middle"><?= $item['Jurusan'] ?></td>
									<td class="align-middle">
										<a href="<?= base_url('dashboard/edit/' . $item['id'] . '/matakuliah') ?>" class="badge badge-sm badge-primary">Edit</i></a> |
										<a href="<?= base_url('dashboard/destroy/' . $item['id'] . '/matakuliah') ?>" class="badge badge-sm badge-danger">Hapus</i></a>
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
<!--				--><?php //echo form_open('dashboard/show/kelas'); 
						?>
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
<!--							--><?php //foreach ($countries as $country) :
									?>
<!--								<option value="--><? //= $country['country'] 
														?>
<!--">--><? //=  $country['country'] 
			?>
<!--</option>-->
<!--							--><?php //endforeach; 
									?>
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


<!-- Tambah data -->
<div class="modal fade text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Mata Kuliah</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('dashboard/create/matakuliah'); ?>
				<div class="row">
					<div class="col-md-12">
						<h5 class="text-center"><b>Data Mata Kuliah</b></h5>
					</div>
					<div class="col-md-12">
						<div class="form-row">
							<div class="form-group required col-md-6">
								<label class='control-label' for="KodeMatkul">Kode mata Kuliah</label>
								<input type="text" class="form-control" name="KodeMatkul" id="nama">
							</div>
							<div class="form-group required col-md-6">
								<label class='control-label'>SKS</label>
								<input type="number" class="form-control" name="SKS" id="number">
							</div>
						</div>
						<div class="form-group required">
							<label class='control-label' for="Matkul">Nama Mata Kuliah</label>
							<input name="Matkul" placeholder="Masukan Nama Mata Kuliah" type="text" class="form-control" id="Matkul">
						</div>
						<div class="form-group required">
							<label class='control-label' for="Subjek">Subjek Mata Kuliah</label>
							<input name="Subjek" placeholder="spt, 2021/2022" type="text" class="form-control" id="Subjek">
						</div>
						<div class="form-row">
							<div class="form-group required col-md-4">
								<label class='control-label'>Pra Syarat</label>
								<select required="required" name="PraSyarat" class="custom-select mr-sm-2">
									<option value="" selected>Tidak Ada</option>
									<!--MEMANGGIL DATA FIELD TABLE-->
									<?php
									$columnVals = $this->master_model->get_data('matakuliah');
									foreach ($columnVals as $itemMatkul) : ?>
										<option value='<?php echo $itemMatkul["KodeMatkul"] ?>'><?php echo $itemMatkul['KodeMatkul'] ?> - <?php echo $itemMatkul['Matkul']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group required col-md-4">
								<label class='control-label'>Jurusan</label>
								<select required="required" name="Jurusan" class="custom-select mr-sm-2">
									<option value=" " selected>Tidak Ada</option>
									<!--MEMANGGIL DATA FIELD TABLE-->
									<?php
									$columnVals = $this->master_model->get_data('prodi');
									foreach ($columnVals as $itemProdi) : ?>
										<option value='<?php echo $itemProdi["nama_singkatan_prodi"] ?>'><?php echo $itemProdi['nama_singkatan_prodi']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group required col-md-4">
								<label class='control-label'>Semester</label>
								<select required="required" name="Smt" class="custom-select mr-sm-2">
									<option value="1" selected>1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
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

<!-- Main Content -->
<div id="content">
	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title . " " .  $item->nama_prodi ?></h1>

		<?php echo form_open('dashboard/update/prodi'); ?>
		<div class="row">
			<div class="col-md-12">
				<h5 class="text-center"><b>Data Prodi</b></h5>
			</div>
			<div class="col-md-12">
				<div class="form-row">
					<div class="form-group required col-md-6">
						<label class='control-label' for="id_prodi">ID Prodi</label>
						<input value="<?= $this->master_model->getLastData('id_prodi', 'prodi')?>" type="text" class="form-control" id="nama" disabled>
						<input value="<?= $this->master_model->getLastData('id_prodi', 'prodi')?>" name="id_prodi" type="hidden" class="form-control" id="nama" >
					</div>
					<div class="form-group required col-md-6">
						<label class='control-label'>Kode PS</label>
						<input required="required" name="kode_ps" type="text" class="form-control" value="<?= $item->kode_ps?>" placeholder="Masukan Kode PS">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group required col-md-6">
						<label class='control-label' for="jenjang">Jenjang</label>
						<select required="required" name="jenjang" class="custom-select mr-sm-2" id="jenjang">
							<?= $item->jenjang === "DD" ? '<option selected' : '<option'?> value="DD">DD</option>
							<?= $item->jenjang === "D3" ? '<option selected' : '<option'?> value="D3">D3</option>
							<?= $item->jenjang === "D4" ? '<option selected' : '<option'?> value="D4">D4</option>
						</select>
					</div>
					<div class="form-group required col-md-6">
						<label class='control-label'>Status Studi</label>
						<select required="required" name="status_prodi" class="custom-select mr-sm-2" id="status_prodi">
							<?= $item->status_prodi === "AKTIF" ? '<option selected' : '<option'?> value="AKTIF">AKTIF</option>
							<?= $item->status_prodi === "TIDAK AKTIF" ? '<option selected' : '<option'?> value="TIDAK AKTIF">TIDAK AKTIF</option>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group required col-md-6">
						<label class='control-label' for="nama_prodi">Nama Prodi</label>
						<input required="required" name="nama_prodi" type="text" class="form-control" value="<?= $item->nama_prodi?>" placeholder="Masukan Nama Prodi">

					</div>
					<div class="form-group required col-md-6">
						<label class='control-label' for="nama_prodi2"><i>Name of study Program</i></label>
						<input required="required" name="nama_prodi2" type="text" class="form-control" value="<?= $item->nama_prodi2?>" placeholder="Masukan Nama Prodi">

					</div>
				</div>
				<div class="form-row">
					<div class="form-group required col-md-6">
						<label class='control-label' for="no_sk_Akred">No SK Akreditasi</label>
						<input required="required" name="no_sk_Akred" type="text" class="form-control" value="<?= $item->no_sk_Akred?>" placeholder="Masukan Nomor SK Akred">

					</div>
					<div class="form-group required col-md-6">
						<label class='control-label' for="tgl_akhir_Akred">Tanggal Akhir Akreditasi</label>
						<input required="required" value="<?= $item->tgl_akhir_Akred?>" data-toggle="datepicker" name="tgl_akhir_Akred" type="text" class="form-control" id="tgl_akhir_Akred" placeholder="Tempat Lahir">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group required col-md-6">
						<label class='control-label' for="nilai_akreditasi">Nilai Akreditasi</label>
						<select required="required" name="nilai_akreditasi" class="custom-select mr-sm-2" id="status_prodi">
							<?= $item->status_prodi === "A" ? '<option selected' : '<option'?> value="A">A</option>
							<?= $item->status_prodi === "B" ? '<option selected' : '<option'?> value="B">B</option>
							<?= $item->status_prodi === "C" ? '<option selected' : '<option'?> value="C">C</option>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group required col-md-6">
						<label class='control-label' for="no_sk_Akred">Nama Singkatan Prodi</label>
						<input required="required" name="nama_singkatan_prodi" value="<?= $item->nama_singkatan_prodi?>" type="text" class="form-control" placeholder="Masukan Nama singkatan Prodi">

					</div>
					<div class="form-group required col-md-6">
						<label class='control-label' for="nidn">Ketua Prodi</label>

						<!--									Tambah data dosen yang menjabat jadi ketua prodi               -->
						<select required="required" name="nidn" class="custom-select mr-sm-2" id="nidn">
							<!--										NIDN                    -->
							<?= $item->status_prodi === "3131313131" ? '<option selected' : '<option'?> value="3131313131">Pak Paul</option>
							<?= $item->status_prodi === "1122132121" ? '<option selected' : '<option'?> value="1122132121">Ibu Paul</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="mb-5">
			<button type="submit" class="btn btn-primary">Update Data</button>
			<a href="<?= base_url('dashboard/show/prodi') ?>" class="btn btn-secondary">Kembali</a>
		</div>
		</form>

	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

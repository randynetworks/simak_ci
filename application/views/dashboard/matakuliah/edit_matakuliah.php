<!-- Main Content -->
<div id="content">
	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title . " " .  $item->Matkul ?></h1>

		<?php echo form_open('dashboard/update/matakuliah'); ?>
		<div class="row">
			<div class="col-md-12">
				<h5 class="text-center"><b>Data Mata Kuliah</b></h5>
			</div>
			<div class="col-md-12">
				<div class="form-row">
					<div class="form-group required col-md-6">
						<label class='control-label' for="KodeMatkul">Kode mata Kuliah</label>
						<input value="<?php echo $item->KodeMatkul; ?>" type="number" class="form-control" name="KodeMatkul" id="nama" placeholder="Masukan Kode Matkul">
					</div>
					<div class="form-group required col-md-6">
						<label class='control-label'>SKS</label>
						<input value="<?php echo $item->SKS; ?>" type="number" class="form-control" name="SKS" id="number" placeholder="Masukan Jumlah SKS">
					</div>
				</div>
				<div class="form-group required">
					<label class='control-label' for="Matkul">Nama Mata Kuliah</label>
					<input value="<?php echo $item->Matkul; ?>" name="Matkul" placeholder="Masukan Nama Mata Kuliah" type="text" class="form-control" id="Matkul">
				</div>
				<div class="form-group required">
					<label class='control-label' for="Subjek">Subjek Mata Kuliah</label>
					<input value="<?php echo $item->Subjek; ?>" name="Subjek" placeholder="Masukan Subjek Mata Kuliah" type="text" class="form-control" id="Subjek">
				</div>
				<div class="form-row">
					<div class="form-group required col-md-4">
						<label class='control-label'>Pra Syarat</label>
						<select required="required" name="PraSyarat" class="custom-select mr-sm-2">
							<!--MEMANGGIL DATA FIELD TABLE-->
							<?php
							$columnVals = $this->master_model->get_data('matakuliah');
							foreach ($columnVals as $itemMatkul) : ?>
								<?php if ($item->PraSyarat ===  $itemMatkul['KodeMatkul']) : ?>
									<option value='<?php echo $itemMatkul["KodeMatkul"] ?>' selected>
									<?php else : ?>
									<option value='<?php echo $itemMatkul["KodeMatkul"] ?>'>
									<?php endif; ?>
									<?php echo $itemMatkul['KodeMatkul'] ?> - <?php echo $itemMatkul['Matkul']; ?></option>

								<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group required col-md-4">
						<label class='control-label'>Jurusan</label>
						<select required="required" name="Jurusan" class="custom-select mr-sm-2">
							<!--MEMANGGIL DATA FIELD TABLE-->
							<?php
							$columnVals = $this->master_model->get_data('prodi');
							foreach ($columnVals as $itemProdi) : ?>
								<?php if ($item->Jurusan ===  $itemMatkul['nama_singkatan_prodi']) : ?>
									<option value='<?php echo $itemMatkul["nama_singkatan_prodi"] ?>' selected>
									<?php else : ?>
									<option value='<?php echo $itemMatkul["nama_singkatan_prodi"] ?>'>
									<?php endif; ?>
									<?php echo $itemProdi['nama_singkatan_prodi']; ?></option>
								<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group required col-md-4">
						<label class='control-label'>Semester</label>
						<select required="required" name="Smt" class="custom-select mr-sm-2">
							<?php
							foreach (array(1, 2, 3, 4, 5, 6, 7) as $smt) : ?>
								<?php if ($item->Smt ==  $smt) : ?>
									<option value='<?php echo $smt ?>' selected>
									<?php else : ?>
									<option value='<?php echo $smt ?>'>
									<?php endif; ?>
									<?php echo $smt; ?></option>
								<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="mb-5">
			<button type="submit" class="btn btn-primary">Update Data</button>
			<a href="<?= base_url('dashboard/show/matakuliah') ?>" class="btn btn-secondary">Kembali</a>
		</div>
		</form>

	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

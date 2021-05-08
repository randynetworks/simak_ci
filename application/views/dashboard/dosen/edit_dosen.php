<!-- Main Content -->
<div id="content">
	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title . " " .  $item->nama_lengkap ?></h1>

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
						<input required="required" value="<?= $item->nidn ?>" name="nidn" type="number" class="form-control" id="nidn" placeholder="Masukan NIDN">
					</div>
					<div class="form-group col-md-6 required">
						<label for="nip" class='control-label'>NIP</label>
						<input required="required" value="<?= $item->nip ?>" name="nip" type="number" class="form-control" placeholder="Masukan NIP">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group required col-md-6">
						<label class='control-label' for="nik">NIK</label>
						<input required="required" value="<?= $item->nik ?>" name="nik" type="number" class="form-control" id="nik" placeholder="Masukan NIK">
					</div>
					<div class="form-group col-md-6 required">
						<label for="npwp">NPWP</label>
						<input value="<?= $item->npwp ?>" name="npwp" type="number" class="form-control" placeholder="Masukan NPWP">
					</div>
				</div>
				<p><b>Data Pribadi</b></p>
				<div class="form-group required">
					<label class='control-label' for="nama">Nama Lengkap</label>
					<input required="required" value="<?= $item->nama_lengkap ?>" name="nama_lengkap" type="text" class="form-control" id="nama" placeholder="Masukan Nama Lengkap">
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label class='control-label' for="gelar_awal">Gelar Awal</label>
						<input value="<?= $item->gelar_awal ?>" name="gelar_awal" type="text" class="form-control" id="gelar_awal" placeholder="Masukan Gelar Awal">
					</div>
					<div class="form-group col-md-6 required">
						<label for="gelar_akhir" class='control-label'>Gelar Akhir</label>
						<input value="<?= $item->gelar_akhir ?>" name="gelar_akhir" type="text" class="form-control" placeholder="Masukan Gelar Akhir">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group required col-md-6">
						<label class='control-label' for="tempatLahir">Tempat Lahir</label>
						<input required="required" value="<?= $item->tempat_lahir ?>" name="tempat_lahir" type="text" class="form-control" id="tempatLahir" placeholder="Tempat Lahir">
					</div>
					<div class="form-group col-md-6 required">
						<label for="tanggal_lahir" class='control-label'>Tanggal Lahir</label>
						<input required="required" value="<?= $item->tanggal_lahir ?>" name="tanggal_lahir" type="text" class="form-control" data-toggle="datepicker" placeholder="Tanggal Lahir">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="jk">Jenis Kelamin</label>
						<select name="jenis_kelamin" class="custom-select mr-sm-2" id="jk">
							<?= $item->jenis_kelamin === "LAKI-LAKI" ? '<option selected' : '<option'?>  value="LAKI-LAKI">LAKI-LAKI</option>
							<?= $item->jenis_kelamin === "PEREMPUAN" ? '<option selected' : '<option'?>  value="PEREMPUAN">PEREMPUAN</option>
						</select>
					</div>
					<div class="form-group col-md-6 required">
						<label for="agama" class='control-label'>Agama</label>
						<select required="required" name="agama" class="custom-select mr-sm-2" id="agama">
							<?= $item->agama === "ISLAM" ? '<option selected' : '<option'?> value="ISLAM">ISLAM</option>
							<?= $item->agama === "PROTESTAN" ? '<option selected' : '<option'?> value="PROTESTAN">PROTESTAN</option>
							<?= $item->agama === "KATOLIK" ? '<option selected' : '<option'?> value="KATOLIK">KATOLIK</option>
							<?= $item->agama === "HINDU" ? '<option selected' : '<option'?> value="HINDU">HINDU</option>
							<?= $item->agama === "BUDDHA" ? '<option selected' : '<option'?> value="BUDDHA">BUDDHA</option>
							<?= $item->agama === "KHONGHUCU" ? '<option selected' : '<option'?> value="KHONGHUCU">KHONGHUCU</option>
						</select>
					</div>
				</div>
				<hr>
				<div class="form-row">
					<div class="form-group col-md-8">
						<label for="jalan">Alamat</label>
						<textarea name="jalan" class="form-control" id="jalan" rows="4"><?= $item->jalan ?></textarea>
					</div>
					<div class="form-row col-md-4">
						<div class="form-group col-md-6">
							<label for="rt">RT</label>
							<input value="<?= $item->rt ?>" name="rt" type="number" class="form-control" id="rt">
						</div>
						<div class="form-group col-md-6">
							<label for="rw">RW</label>
							<input value="<?= $item->rw ?>" name="rw" type="number" class="form-control" id="rw">
						</div>
						<div class="form-group col-md-12">
							<label for="kode_pos">Kode Pos</label>
							<input value="<?= $item->kode_pos ?>" name="kode_pos" type="number" class="form-control" id="kode_pos">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<p><b>Kontak Dosen</b></p>
				<div class="form-group">
					<label for="hp">No HP</label>
					<input value="<?= $item->hp ?>" name="hp" type="number" class="form-control" id="hp" placeholder="Masukan No HP">
				</div>
				<div class="form-group">
					<label for="telp">No Telp</label>
					<input value="<?= $item->telp ?>" name="telp" type="number" class="form-control" id="telp" placeholder="Masukan No Telp">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input value="<?= $item->email ?>" name="email" type="email" class="form-control" id="email" placeholder="Masukan Email">
				</div>
				<hr>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="status_pernikahan">Status Pernikahan</label>
						<select name="status_pernikahan" class="custom-select mr-sm-2" id="status_pernikahan">
							<?= $item->status_pernikahan === "BELUM KAWIN" ? '<option selected' : '<option'?> value="BELUM KAWIN">BELUM KAWIN</option>
							<?= $item->status_pernikahan === "KAWIN" ? '<option selected' : '<option'?> value="KAWIN">KAWIN</option>
							<?= $item->status_pernikahan === "CERAI HIDUP" ? '<option selected' : '<option'?> value="CERAI HIDUP">CERAI HIDUP</option>
							<?= $item->status_pernikahan === "CERAI MATI" ? '<option selected' : '<option'?> value="CERAI MATI">CERAI MATI</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="nama_suami_istri">Nama Pasangan</label>
						<input value="<?= $item->nama_suami_istri ?>" name="nama_suami_istri" type="text" class="form-control" id="nama_suami_istri" placeholder="Masukan Nama Pasangan">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="jumlah_anak">Jumlah Anak</label>
						<select name="jumlah_anak" class="custom-select mr-sm-2" id="jumlah_anak">
							<?= $item->jumlah_anak === "0" ? '<option selected' : '<option'?> value="0">0</option>
							<?= $item->jumlah_anak === "1" ? '<option selected' : '<option'?> value="1">1</option>
							<?= $item->jumlah_anak === "2" ? '<option selected' : '<option'?> value="2">2</option>
							<?= $item->jumlah_anak === "3" ? '<option selected' : '<option'?> value="3">3</option>
							<?= $item->jumlah_anak === "4" ? '<option selected' : '<option'?> value="4">4</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="ukuran_jas">Ukuran JAS</label>
						<select name="ukuran_jas" class="custom-select mr-sm-2" id="ukuran_jas">
							<?= $item->ukuran_jas === "S" ? '<option selected' : '<option'?> value="S">S</option>
							<?= $item->ukuran_jas === "M" ? '<option selected' : '<option'?> value="M">M</option>
							<?= $item->ukuran_jas === "L" ? '<option selected' : '<option'?> value="L">L</option>
							<?= $item->ukuran_jas === "XL" ? '<option selected' : '<option'?> value="XL">XL</option>
							<?= $item->ukuran_jas === "XXL" ? '<option selected' : '<option'?> value="XXL">XXL</option>
							<?= $item->ukuran_jas === "XXXL" ? '<option selected' : '<option'?> value="XXXL">XXXL</option>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="tmt_masuk">Tanggal Masuk</label>
						<input required="required" value="<?= $item->tmt_masuk ?>" name="tmt_masuk" type="text" class="form-control" data-toggle="datepicker" placeholder="Tanggal Masuk">
					</div>
					<div class="form-group col-md-6">
						<label for="status_dosen">Status Dosen</label>
						<select name="status_dosen" class="custom-select mr-sm-2" id="status_dosen">
							<?= $item->status_dosen === "DOSEN TETAP" ? '<option selected' : '<option'?> value="DOSEN TETAP">DOSEN TETAP</option>
							<?= $item->status_dosen === "DOSEN TIDAK TETAP" ? '<option selected' : '<option'?> value="DOSEN TIDAK TETAP">DOSEN TIDAK TETAP</option>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="id_prodi">Prodi</label>
						<select name="id_prodi" class="custom-select mr-sm-2" id="id_prodi">
							<?php
							$columnVals = $this->master_model->get_data('prodi');
							foreach ($columnVals as $col) : ?>
								<?php if  ($col["id_prodi"] === $item->id_prodi) :?>
									<option value='<?php echo $col["id_prodi"] ?>' selected> <?php echo $col['nama_prodi'] ?></option>
								<?php else: ?>
									<option value='<?php echo $col["id_prodi"] ?>'> <?php echo $col['nama_prodi'] ?></option>
								<?php endif;?>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="status_aktif">Status Aktif</label>
						<select name="status_aktif" class="custom-select mr-sm-2" id="status_aktif">
							<?= $item->status_aktif === "AKTIF" ? '<option selected' : '<option'?> value="AKTIF">AKTIF</option>
							<?= $item->status_aktif === "TIDAK AKTIF" ? '<option selected' : '<option'?> value="TIDAK AKTIF">TIDAK AKTIF</option>
						</select>
					</div>
				</div>
			</div>
		</div
		</form>
		<div class="mb-5">
			<button type="submit" class="btn btn-primary">Update Data</button>
			<a href="<?= base_url('dashboard/show/dosen') ?>" class="btn btn-secondary">Kembali</a>
		</div>
		</form>

	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

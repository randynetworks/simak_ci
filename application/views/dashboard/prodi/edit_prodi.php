<!-- Main Content -->
<div id="content">
	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title . " " .  $item->nama_lengkap ?></h1>

		<?php echo form_open('dashboard/update/mahasiswa'); ?>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="inputAddress">Nomor Daftar</label>
					<input  type="text" class="form-control" id="inputAddress" value="<?= $item->no_daftar ?>" disabled>
					<input  type="hidden" class="form-control" id="inputAddress" name="no_daftar" value="<?= $item->no_daftar ?>">
				</div>
				<div class="form-group">
					<label for="nama">Nama Lengkap</label>
					<input value="<?= $item->nama_lengkap ?>" name="nama_lengkap" type="text" class="form-control" id="nama" placeholder="Masukan Nama Lengkap">
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="tempatLahir">Tempat Lahir</label>
						<input value="<?= $item->tempat_lahir ?>"  name="tempat_lahir" type="text" class="form-control" id="tempatLahir" placeholder="Tempat Lahir">
					</div>
					<div class="form-group col-md-6">
						<label for="tanggallahir">Tanggal Lahir</label>
						<input value="<?= $item->tgl_lahir ?>" name="tgl_lahir" type="text" class="form-control" data-toggle="datepicker" placeholder="Tanggal Lahir">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="jk">Jenis Kelamin</label>
						<select name="jenis_kelamin" class="custom-select mr-sm-2" id="jk">
							<?= $item->jenis_kelamin === 'LAKI-LAKI' ? '<option selected' : '<option ' ?> value="LAKI-LAKI">LAKI-LAKI</option>
							<?= $item->jenis_kelamin === 'PEREMPUAN' ? '<option selected' : '<option ' ?> value="PEREMPUAN">PEREMPUAN</option>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label for="agama">Agama</label>
						<select name="agama" class="custom-select mr-sm-2" id="agama">
							<?= $item->jenis_kelamin === 'ISLAM' ? '<option selected' : '<option ' ?> value="ISLAM">ISLAM</option>
							<?= $item->jenis_kelamin === 'PROTESTAN' ? '<option selected' : '<option ' ?> value="PROTESTAN">PROTESTAN</option>
							<?= $item->jenis_kelamin === 'KATOLIK' ? '<option selected' : '<option ' ?> value="KATOLIK">KATOLIK</option>
							<?= $item->jenis_kelamin === 'HINDU' ? '<option selected' : '<option ' ?> value="HINDU">HINDU</option>
							<?= $item->jenis_kelamin === 'BUDDHA' ? '<option selected' : '<option ' ?> value="BUDDHA">BUDDHA</option>
							<?= $item->jenis_kelamin === 'KHONGHUCU' ? '<option selected' : '<option ' ?> value="KHONGHUCU">KHONGHUCU</option>
						</select>
					</div>
					<div class="form-group col-md-4">
						<label for="goldarah">Golongan Darah</label>
						<select name="gol_darah" class="custom-select mr-sm-2" id="goldarah">
							<?= $item->jenis_kelamin === 'A' ? '<option selected' : '<option ' ?> value="A">A</option>
							<?= $item->jenis_kelamin === 'B' ? '<option selected' : '<option ' ?> value="B">B</option>
							<?= $item->jenis_kelamin === 'O' ? '<option selected' : '<option ' ?> value="O">O</option>
							<?= $item->jenis_kelamin === 'AB' ? '<option selected' : '<option ' ?> value="AB">AB</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="kewarganegaraan">Kewarganegaraan</label>
					<select name="kewarganegaraan" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
						<?php foreach ($countries as $country) :?>
							<?= $country['country'] === $item->kewarganegaraan ? '<option selected' : '<option ' ?> value="<?= $country['country'] ?>"><?=  $country['country'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input value="<?= $item->email ?>" name="email" type="email" class="form-control" id="email" placeholder="Masukan Email Mahasiswa">
				</div>
				<div class="form-group">
					<label for="no_hp">No HP</label>
					<input value="<?= $item->no_hp ?>" name="no_hp" type="number" class="form-control" id="no_hp" placeholder="Masukan No HP Mahasiswa">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="nik">NIK</label>
					<input value="<?= $item->nik ?>" name="nik" type="number" class="form-control" id="nik" placeholder="Masukan NIK Mahasiswa">
				</div>
				<div class="form-group">
					<label for="nisn">NISN</label>
					<input value="<?= $item->nisn ?>" name="nisn" type="number" class="form-control" id="nisn" placeholder="Masukan NISN Mahasiswa">
				</div>
				<div class="form-group">
					<label for="no_transportasi">No Transportasi</label>
					<input value="<?= $item->id_alat_transportasi ?>" name="id_alat_transportasi" type="number" class="form-control" id="no_transportasi" placeholder="Masukan Nomor Transportasi">
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="caradaftar">Cara Daftar</label>
						<select name="cara_daftar" class="custom-select mr-sm-2" id="caradaftar">
							<?= $item->cara_daftar === "WEBSITE" ? '<option selected' : '<option'?> value="WEBSITE">WEBSITE</option>
							<?= $item->cara_daftar === "FRONT OFFICE" ? '<option selected' : '<option'?> value="FRONT OFFICE">FRONT OFFICE</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="tempatLahir">Info Kampus</label>
						<select name="tahu_info_kampus" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
							<?= $item->cara_daftar === "WEBSITE" ? '<option selected' : '<option'?> value="WEBSITE">WEBSITE</option>
							<?= $item->cara_daftar === "BROSUR" ? '<option selected' : '<option'?> value="BROSUR">BROSUR</option>
							<?= $item->cara_daftar === "SURAT KABAR" ? '<option selected' : '<option'?> value="SURAT KABAR">SURAT KABAR</option>
							<?= $item->cara_daftar === "SOSIAL MEDIA" ? '<option selected' : '<option'?> value="SOSIAL MEDIA">SOSIAL MEDIA</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="namaref">Referensi</label>
					<input value="<?= $item->nama_ref ?>" name="nama_ref" type="text" class="form-control" id="namaref" placeholder="Masukan Nama Referensi">
				</div>
				<div class="form-group">
					<label for="keterangan">Keterangan</label>
					<input value="<?= $item->keterangan ?>" name="keterangan" type="text" class="form-control" id="keterangan" placeholder="Masukan Keterangan">
				</div>
				<div class="form-group">
					<label for="penerima_kps">Menerima KPS</label>
					<select name="penerima_kps" class="custom-select mr-sm-2" id="penerima_kps">
						<?= $item->cara_daftar === "YA" ? '<option selected' : '<option'?> value="YA">YA</option>
						<?= $item->cara_daftar === "TIDAK" ? '<option selected' : '<option'?> value="TIDAK">TIDAK</option>
					</select>
				</div>
				<div class="form-group">
					<label for="no_kps">Nomor KPS</label>
					<input value="<?= $item->no_kps ?>" name="no_kps" type="text" class="form-control" id="no_kps" placeholder="Masukan Nomor KPS">
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<div class="form-row">
					<div class="form-group col-md-8">
						<label for="alamat">Alamat</label>
						<textarea name="alamat" class="form-control" id="alamat" rows="4"><?= $item->alamat ?></textarea>
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
							<label for="kodepos">Kode Pos</label>
							<input value="<?= $item->kodepos ?>" name="kodepos" type="number" class="form-control" id="kodepos">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="no_telp_rumah">No Telp Rumah</label>
					<input value="<?= $item->no_telp_rumah ?>" name="no_telp_rumah" type="number" class="form-control" id="no_telp_rumah" placeholder="Masukan No Telp Rumah Mahasiswa">
				</div>
				<div class="form-group">
					<label for="jenis_tinggal">Jenis Tinggal</label>
					<select name="jenis_tinggal" class="custom-select mr-sm-2" id="pendidikan_terakhir_ayah">
						<?= $item->cara_daftar === "RUMAH SENDIRI" ? '<option selected' : '<option'?> value="RUMAH SENDIRI">RUMAH SENDIRI</option>
						<?= $item->cara_daftar === "RUMAH ORANG TUA" ? '<option selected' : '<option'?> value="RUMAH ORANG TUA">RUMAH ORANG TUA</option>
						<?= $item->cara_daftar === "KOST" ? '<option selected' : '<option'?> value="KOST">KOST</option>
						<?= $item->cara_daftar === "SEWA RUMAH" ? '<option selected' : '<option'?> value="SEWA RUMAH">SEWA RUMAH</option>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="kelurahan">Kelurahan</label>
					<input value="<?= $item->kelurahan ?>" name="kelurahan" type="text" class="form-control" id="kelurahan" placeholder="Masukan Kelurahan">
				</div>
				<div class="form-group">
					<label for="kecamatan">Kecamatan</label>
					<input value="<?= $item->kec ?>" name="kec" type="text" class="form-control" id="kecamatan" placeholder="Masukan Kecamatan">
				</div>
				<div class="form-group">
					<label for="kotakab">Kota</label>
					<input value="<?= $item->kotakab ?>" name="kotakab" type="text" class="form-control" id="kotakab" placeholder="Masukan Kota">
				</div>
				<div class="form-group">
					<label for="prov">Provinsi</label>
					<input value="<?= $item->prov ?>" name="prov" type="text" class="form-control" id="prov" placeholder="Masukan Provinsi">
				</div>
				<div class="form-group">
					<label for="id_wilayah">wilayah</label>
					<input value="<?= $item->id_wilayah ?>" name="id_wilayah" type="text" class="form-control" id="id_wilayah" placeholder="Masukan Wilayah">
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
					<input value="<?= $item->nik_ayah ?>" name="nik_ayah" type="number" class="form-control" id="nik_ayah" placeholder="Masukan NIK">
				</div>
				<div class="form-group">
					<label for="nama_ayah">Nama Lengkap</label>
					<input value="<?= $item->nama_ayah ?>" name="nama_ayah" type="text" class="form-control" id="nama_ayah" placeholder="Masukan Nama Lengkap">
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="tempatLahirayah">Tempat Lahir</label>
						<input value="<?= $item->tempat_lahir_ayah ?>" name="tempat_lahir_ayah" type="text" class="form-control" id="tempatLahirayah" placeholder="Tempat Lahir">
					</div>
					<div class="form-group col-md-6">
						<label for="tempatLahir">Tanggal Lahir</label>
						<input value="<?= $item->tanggal_lahir_ayah ?>" name="tanggal_lahir_ayah" type="text" class="form-control" data-toggle="datepicker" placeholder="Tanggal Lahir">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="pendidikan_terakhir_ayah">Pend. Terakhir</label>
						<select name="pendidikan_ayah" class="custom-select mr-sm-2" id="pendidikan_terakhir_ayah">
							<?= $item->cara_daftar === "TIDAK SEKOLAH" ? '<option selected' : '<option'?> value="TIDAK SEKOLAH">TIDAK SEKOLAH</option>
							<?= $item->cara_daftar === "SD" ? '<option selected' : '<option'?> value="SD">SD</option>
							<?= $item->cara_daftar === "SMP" ? '<option selected' : '<option'?> value="SMP">SMP</option>
							<?= $item->cara_daftar === "SMA/SMK" ? '<option selected' : '<option'?> value="SMA/SMK">SMA/SMK</option>
							<?= $item->cara_daftar === "S1" ? '<option selected' : '<option'?> value="S1">S1</option>
							<?= $item->cara_daftar === "S2" ? '<option selected' : '<option'?> value="S2">S2</option>
							<?= $item->cara_daftar === "S3" ? '<option selected' : '<option'?> value="S3">S3</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="pekerjaan">Pekerjaan</label>
						<input value="<?= $item->pekerjaan_ayah ?>" name="pekerjaan_ayah" type="text" class="form-control" data-toggle="pekerjaan" placeholder="Masukan Pekerjaan">
					</div>
				</div>
				<div class="form-group">
					<label for="penghasilan">Penghasilan</label>
					<input value="<?= $item->penghasilan_ayah ?>" name="penghasilan_ayah" type="number" class="form-control" data-toggle="penghasilan" placeholder="Masukan Penghasilan">
				</div>
				<div class="form-group">
					<label for="kebutuhan">Kebutuhan Khusus</label>
					<input value="<?= $item->id_kebutuhan_khusus_ayah ?>" name="id_kebutuhan_khusus_ayah" type="text" class="form-control" data-toggle="kebutuhan" placeholder="Masukan Kebutuhan Khusus">
				</div>
			</div>

			<div class="col-md-6">
				<p><b>Data Ibu</b></p>
				<div class="form-group">
					<label for="nik_ibu">NIK</label>
					<input value="<?= $item->nik_ibu ?>" name="nik_ibu" type="number" class="form-control" id="nik_ibu" placeholder="Masukan NIK">
				</div>
				<div class="form-group">
					<label for="nama_ibu">Nama Lengkap</label>
					<input value="<?= $item->nama_ibu ?>" name="nama_ibu" type="text" class="form-control" id="nama_ibu" placeholder="Masukan Nama Lengkap">
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="tempatLahiribu">Tempat Lahir</label>
						<input value="<?= $item->tempat_lahir_ibu ?>" name="tempat_lahir_ibu" type="text" class="form-control" id="tempatLahiribu" placeholder="Tempat Lahir">
					</div>
					<div class="form-group col-md-6">
						<label for="tempatLahir">Tanggal Lahir</label>
						<input value="<?= $item->tanggal_lahir_ibu ?>" name="tanggal_lahir_ibu" type="text" class="form-control" data-toggle="datepicker" placeholder="Tanggal Lahir">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="pendidikan_terakhir_ibu">Pend. Terakhir</label>
						<select name="pendidikan_ibu" class="custom-select mr-sm-2" id="pendidikan_terakhir_ibu">
							<?= $item->cara_daftar === "TIDAK SEKOLAH" ? '<option selected' : '<option'?> value="TIDAK SEKOLAH">TIDAK SEKOLAH</option>
							<?= $item->cara_daftar === "SD" ? '<option selected' : '<option'?> value="SD">SD</option>
							<?= $item->cara_daftar === "SMP" ? '<option selected' : '<option'?> value="SMP">SMP</option>
							<?= $item->cara_daftar === "SMA/SMK" ? '<option selected' : '<option'?> value="SMA/SMK">SMA/SMK</option>
							<?= $item->cara_daftar === "S1" ? '<option selected' : '<option'?> value="S1">S1</option>
							<?= $item->cara_daftar === "S2" ? '<option selected' : '<option'?> value="S2">S2</option>
							<?= $item->cara_daftar === "S3" ? '<option selected' : '<option'?> value="S3">S3</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="pekerjaan">Pekerjaan</label>
						<input value="<?= $item->pekerjaan_ibu ?>" name="pekerjaan_ibu" type="text" class="form-control" data-toggle="pekerjaan" placeholder="Masukan Pekerjaan">
					</div>
				</div>
				<div class="form-group">
					<label for="penghasilan">Penghasilan</label>
					<input value="<?= $item->penghasilan_ayah ?>" name="penghasilan_ayah" type="number" class="form-control" data-toggle="penghasilan" placeholder="Masukan Penghasilan">
				</div>
				<div class="form-group">
					<label for="kebutuhan">Kebutuhan Khusus</label>
					<input value="<?= $item->id_kebutuhan_khusus_ibu ?>" name="id_kebutuhan_khusus_ibu" type="text" class="form-control" data-toggle="kebutuhan" placeholder="Masukan Kebutuhan Khusus">
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
							<input value="<?= $item->asal_sekolah ?>" name="asal_sekolah" type="text" class="form-control" id="asal_sekolah" placeholder="Masukan Asal Sekolah">
						</div>
						<div class="form-group">
							<label for="alamat_sekolah">Alamat Sekolah</label>
							<textarea name="alamat_sekolah" type="text" class="form-control" id="alamat_sekolah" rows="3"><?= $item->alamat_sekolah ?></textarea>
						</div>
						<div class="form-group">
							<label for="lokasisekolah">Lokasi Sekolah</label>
							<input value="<?= $item->kotakab_sekolah ?>" name="kotakab_sekolah" type="text" class="form-control" id="lokasisekolah" placeholder="Lokasi Sekolah">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="jurusan">Jurusan</label>
							<input value="<?= $item->jurusan_sekolah ?>" name="jurusan_sekolah" type="text" class="form-control" id="jurusan" placeholder="Masukan Jurusan">
						</div>
						<div class="form-row">
							<div class="form-group col-md-8">
								<label for="alamat_email_sekolah">Alamat Email</label>
								<input value="<?= $item->email_sekolah ?>" name="email_sekolah" type="email" class="form-control" id="alamat_email_sekolah" placeholder="Masukan Alamat Email">
							</div>
							<div class="form-group col-md-4">
								<label for="kode_pos_sekolah">Kode Pos</label>
								<input value="<?= $item->pos_sekolah ?>" name="pos_sekolah" type="number" class="form-control" id="kode_pos_sekolah" placeholder="Masukan Kode Pos">
							</div>
						</div>
						<div class="form-group">
							<label for="nomor_telp">Nomor Telp</label>
							<input value="<?= $item->no_telp_sekolah ?>" name="no_telp_sekolah" type="number" class="form-control" id="nomor_telp" placeholder="Masukan Nomor Telp">
						</div>
					</div>
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-primary mb-5">Update Data</button>
		</form>

	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

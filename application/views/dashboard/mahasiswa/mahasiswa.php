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

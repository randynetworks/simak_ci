<!-- Main Content -->
<div id="content">
	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

		<!-- data table -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-purple">Data Table User per tanggal <?= date('d F Y') ?> </h6>
			</div>
			<div class="card-body">

			<?= $this->session->flashdata('message') ?>
				<div class="table-responsive">
					<table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Nama Pengguna</th>
								<th>Nomor Induk</th>
								<th>Gambar Profil</th>
								<th>Role</th>
								<th>Aktif ?</th>
								<th>Data Dibuat</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($user as $item) : ?>
							<tr>
								<td class="align-middle"><?= $item['name']; ?></td>
								<td class="align-middle"><?= $item['nomor_induk']; ?></td>
								<td class="align-middle"><img height="100px" width="100px" src="<?= base_url('assets/img/profile/') . $item['image']; ?>" alt=""></td>
								<td class="align-middle"><?= $item['role_id']; ?></td>
								<td class="align-middle"><?= $item['is_active']; ?></td>
								<td class="align-middle">Pengguna Sejak <?= date('d F Y', $item['date_created']) ?></td>
								<td class="align-middle">
									<a href="<?= base_url('dashboard/edit/'. $item['id'] . '/user') ?>" class="badge badge-sm badge-primary">Edit</i></a> |
									<a href="<?= base_url('dashboard/destroy/'. $item['id'] . '/user') ?>" class="badge badge-sm badge-danger">Del</i></a>
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

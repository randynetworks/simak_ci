<!-- Main Content -->
<div id="content">
	<!-- Begin Page Content -->
	<div class="container">

		<!-- Page Heading -->
		<h1 class="h3 mb-4 text-gray-800">Selamat Datang, <?= $user_login['name'] ?></h1>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-4 bg-white p-3 rounded text-center shadow-sm m-3">
					<h3 class="text-dark">Admin Profile</h3>
					<a href="<?= base_url('/dashboard/me') ?>" class="btn btn-success">Ke Profile!</a>
				</div>
				<div class="col-md-4 bg-white p-3 rounded text-center shadow-sm m-3">
					<h3 class="text-dark">List Admin Akun</h3>
					<a href="<?= base_url('/dashboard/show/user') ?>" class="btn btn-success">Manage disini!</a>
				</div>
			</div>

		</div>
	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

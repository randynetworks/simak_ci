<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-purple sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
		<img src="<?= base_url('assets/img/PIKSI.png') ?>" alt="Logo Piksi" width="50px">
		<div class="sidebar-brand-text mx-3">SIMAK PPG</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Admin
	</div>

	<!-- Nav Item - Dashboard -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('dashboard') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Manajemen Admin
	</div>
	<!-- Nav Item - list admin account -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('dashboard/me') ?>">
			<i class="fas fa-fw fa-user"></i>
			<span>Profil Pengguna</span></a>
	</li>

	<!-- Nav Item - list admin account -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('dashboard/show/user') ?>">
			<i class="fas fa-fw fa-users-cog"></i>
			<span>Daftar User</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Input Data
	</div>

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link" href="" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
			<i class="fas fa-fw fa-users"></i>
			<span>Front Office</span>
		</a>
		<div id="collapsePages" class="collapse hide" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?php echo base_url('dashboard/show/mahasiswa'); ?>">Daftar Info Mahasiswa</a>
			</div>
		</div>
	</li>

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link" href="" data-toggle="collapse" data-target="#akademik" aria-expanded="true" aria-controls="akademik">
			<i class="fas fa-fw fa-graduation-cap"></i>
			<span>Akademik</span>
		</a>
		<div id="akademik" class="collapse hide" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Informasi</h6>
				<a class="collapse-item" href="<?php echo base_url('dashboard/show/dosen'); ?>">Daftar Dosen</a>
				<a class="collapse-item" href="<?php echo base_url('dashboard/show/prodi'); ?>">Daftar Prodi</a>
				<a class="collapse-item" href="<?php echo base_url('dashboard/show/kelas'); ?>">Daftar Kelas</a>
				<a class="collapse-item" href="<?php echo base_url('dashboard/show/matakuliah'); ?>">Daftar Mata Kuliah</a>
				<h6 class="collapse-header">Penjadwalan</h6>
				<a class="collapse-item" href="<?php echo base_url('dashboard/show/semester'); ?>">Penjadwalan Semester</a>
				<a class="collapse-item" href="<?php echo base_url('dashboard/show/kurikulum'); ?>">Penjadwalan Kurikulum</a>
				<h6 class="collapse-header">Nilai Mahasiswa</h6>
				<a class="collapse-item" href="<?php echo base_url('dashboard/show/nilai'); ?>">Nilai Akademik Mahasiswa</a>
			</div>
		</div>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Nav Item - logout account -->
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
			<i class="fas fa-sign-out-alt"></i>
			<span>logout</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->

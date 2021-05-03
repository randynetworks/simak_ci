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
			<i class="fas fa-fw fa-table"></i>
			<span>Tables</span>
		</a>
		<div id="collapsePages" class="collapse hide" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?php echo base_url('dashboard/show/mahasiswa'); ?>">Daftar Mahasiswa</a>
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

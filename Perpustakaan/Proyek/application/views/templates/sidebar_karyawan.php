    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-book-open"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Perpustakaan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider mb-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu anda
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('Dash_ketua') ?>">
        <i class="fas fa-fw fa-home"></i>
        <span>Dashboard</span></a>
	</li>
	
	<li class="nav-item active">
        <a class="nav-link pb-0" href="<?= base_url('Dash_ketua/TambahKaryawan') ?>">
        <i class="fas fa-fw fa-user-tie"></i>
        <span>Menu karyawan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('Total_siswa/tambah_data') ?>">
        <i class="fas fa-fw fa-user-plus"></i>
        <span>Tambah data</span></a>
	</li>
	
	<li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('Total_buku/tambah_buku') ?>">
        <i class="fas fa-fw fa-book"></i>
        <span>Tambah buku</span></a>
	</li>
	

	<li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('Peminjaman/tambah_peminjaman') ?>">
        <i class="fas fa-fw fa-calculator"></i>
        <span>Data transaksi</span></a>
	</li>
	
	<li class="nav-item">
        <a class="nav-link pb-5" href="<?= base_url('Dash_ketua/identitas') ?>">
        <i class="fas fa-fw fa-user-friends"></i>
        <span>Identitas Web</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-wrench"></i>
			<span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
        </div>
        </div>
    </li> -->

	<li class="nav-item">
        <a class="nav-link pb-0" href="index.html">
        <i class="fas fa-fw fa-sign-out-alt"></i>
        <span>Logout</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block mt-4">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    </ul>
    <!-- End of Sidebar -->

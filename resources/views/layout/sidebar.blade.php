 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-dollar-sign"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-Pengajuan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $menuDashboard ?? '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Master
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ $menuNasabah ?? '' }}">
        <a class="nav-link" href="{{ route('nasabah') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Nasabah</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ $menuKelompok ?? '' }}">
        <a class="nav-link" href="{{ route('kelompok') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Kelompok</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Pengajuan
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ $menuPengajuan ?? '' }}">
        <a class="nav-link" href="{{ route('pengajuan') }}">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Pengajuan</span></a>
    </li>
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Laporan
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-book-open"></i>
            <span>Laporan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
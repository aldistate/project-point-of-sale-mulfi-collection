<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion {{ $url == 'pos' || $url == 'dashboard' ? 'toggled' : '' }}" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <img class="img-profile rounded-circle" src="{{ asset('images/icons/logo.png') }}" width="50px">
        <div class="sidebar-brand-text mx-3">Mulfi Collection</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $url == 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if (auth()->user()->role == 'admin')
    <!-- Heading -->
    <div class="sidebar-heading">
        Data Master
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-database"></i>
            <span>Data</span>
        </a>
        <div id="collapseTwo" class="collapse {{ $url == 'karyawan' || $url == 'kategori' || $url == 'brand' || $url == 'barang' ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Semua Data:</h6>
                <a class="collapse-item {{ $url == 'karyawan' ? 'active' : '' }}" href="{{ route('karyawan.index') }}">Data Pegawai</a>
                <a class="collapse-item {{ $url == 'kategori' ? 'active' : '' }}" href="{{ route('kategori.index') }}">Data Kategori</a>
                <a class="collapse-item {{ $url == 'brand' ? 'active' : '' }}" href="{{ route('brand.index') }}">Data Brand</a>
                <a class="collapse-item {{ $url == 'barang' ? 'active' : '' }}" href="{{ route('barang.index') }}">Data Barang</a>
            </div>
        </div>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">
    @endif


    <!-- Heading -->
    <div class="sidebar-heading">
        Fitur
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ $url == 'pos' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pos') }}">
            <i class="fas fa-fw fa-calculator"></i>
            <span>Transaksi</span></a>
    </li>

    @if (auth()->user()->role == 'admin')
    <!-- Nav Item - Charts -->
    <li class="nav-item {{ $url == 'laporan' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('laporan') }}">
            <i class="fas fa-fw fa-file"></i>
            <span>Laporan</span></a>
    </li>
    @endif

    <li class="nav-item {{ $url == 'history' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('history') }}">
            <i class="fas fa-fw fa-file"></i>
            <span>Riwayat</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>


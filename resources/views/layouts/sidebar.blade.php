<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('assets/img/logo/logo2.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">E-SPK-SMART</div>
    </a>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Fitur
    </div>
        <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="fas fa-home"></i>
                <span>Beranda</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable1" aria-expanded="false" aria-controls="collapseTable1">
            <i class="fas fa-th-large"></i>
            <span>Kriteria</span>
            </a>
            <div id="collapseTable1" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tambah Data</h6>
                <a class="collapse-item" href="{{ route('kriteria.index') }}">Kriteria</a>
                <a class="collapse-item" href="{{ route('parameter.index') }}">Parameter Kriteria</a>
            </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable2" aria-expanded="false" aria-controls="collapseTable2">
            <i class="fas fa-rocket"></i>
            <span>Alternatif</span>
            </a>
            <div id="collapseTable2" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tambah Data</h6>
                <a class="collapse-item" href="{{ route('alternatif.index') }}">Alternatif</a>
                <a class="collapse-item" href="{{ route('nilai.index') }}">Nilai Alternatif</a>
            </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="fas fa-puzzle-piece"></i>
                <span>Perhitungan</span>
            </a>
        </li>
    <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
                <form id="logout-form" action="" method="POST"style="display: none;">
                    @csrf
                </form>
            </a>
    </li>
</ul>


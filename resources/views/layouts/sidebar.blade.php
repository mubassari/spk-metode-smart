<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('assets/img/logo/logo2.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">E-SPK-SMART</div>
    </a>
    {{-- <div class="sidebar-heading">
        Fitur
    </div> --}}
        <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="fas fa-home"></i>
                <span>Beranda</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Kriteria
        </div>
        <li class="nav-item {{ Request::is('kriteria*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('kriteria.index') }}">
                <i class="fas fa-th-large"></i>
                <span>Kriteria</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('parameter*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('parameter.index') }}">
                <i class="fas fa-cubes"></i>
                <span>Parameter Kriteria</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Alternatif
        </div>
        <li class="nav-item {{ Request::is('alternatif*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('alternatif.index') }}">
                <i class="fas fa-rocket"></i>
                <span>Alternatif</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Input
        </div>
        <li class="nav-item {{ Request::is('nilai*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('nilai.index') }}">
                <i class="fas fa-pencil-alt"></i>
                <span>Nilai Alternatif</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            fitur
        </div>
        <li class="nav-item {{ Route::currentRouteName('perhitungan.kalkulasi') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('perhitungan.kalkulasi') }}">
                <i class="fas fa-puzzle-piece"></i>
                <span>Perhitungan</span>
            </a>
        </li>
    <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-sign-out-alt"></i>
                <span>Keluar</span>
                <form id="logout-form" action="" method="POST"style="display: none;">
                    @csrf
                </form>
            </a>
    </li>
</ul>


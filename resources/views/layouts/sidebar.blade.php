<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
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
            <a class="nav-link" href="#">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
                <form id="logout-form" action="" method="POST"style="display: none;">
                    @csrf
                </form>
            </a>
    </li>
</ul>


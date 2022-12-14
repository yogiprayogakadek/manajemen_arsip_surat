<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <div class="navigation-left">
            <li class="nav-item {{Request::is('/') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{route('dashboard')}}">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Dashoard</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item {{Request::is('klasifikasi') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{route('klasifikasi.index')}}">
                    <i class="nav-icon i-Library"></i>
                    <span class="nav-text">Klasifikasi</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item {{Request::is('tipe') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{route('tipe.index')}}">
                    <i class="nav-icon i-Suitcase"></i>
                    <span class="nav-text">Tipe</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item {{Request::is('dinas') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{route('dinas.index')}}">
                    <i class="nav-icon i-Windows-2"></i>
                    <span class="nav-text">Dinas</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item {{Request::is('unit-kerja') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{route('unit.index')}}">
                    <i class="nav-icon i-Receipt"></i>
                    <span class="nav-text">Unit Kerja</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item {{Request::is('surat-masuk') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{route('masuk.index')}}">
                    <i class="nav-icon i-Email"></i>
                    <span class="nav-text">Surat Masuk</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item {{Request::is('surat-keluar') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{route('keluar.index')}}">
                    <i class="nav-icon i-Split-Vertical"></i>
                    <span class="nav-text">Surat Keluar</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item {{Request::is('pengajuan') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{route('pengajuan.index')}}">
                    <i class="nav-icon i-Split-Vertical"></i>
                    <span class="nav-text">Pengajuan</span>
                </a>
                <div class="triangle"></div>
            </li>
        </div>
    </div>
    <div class="sidebar-overlay"></div>
</div>
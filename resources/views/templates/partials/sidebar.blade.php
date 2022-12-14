<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <div class="navigation-left">
            <li class="nav-item {{Request::is('klasifikasi') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{route('klasifikasi.index')}}">
                    <i class="nav-icon i-Administrator"></i>
                    <span class="nav-text">Klasifikasi</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item {{Request::is('tipe') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{route('tipe.index')}}">
                    <i class="nav-icon i-Administrator"></i>
                    <span class="nav-text">Tipe</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item {{Request::is('dinas') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{route('dinas.index')}}">
                    <i class="nav-icon i-Administrator"></i>
                    <span class="nav-text">Dinas</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item {{Request::is('unit') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{route('unit.index')}}">
                    <i class="nav-icon i-Administrator"></i>
                    <span class="nav-text">Unit Kerja</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item {{Request::is('masuk') ? 'active' : '' }}">
                <a class="nav-item-hold" href="{{route('masuk.index')}}">
                    <i class="nav-icon i-Administrator"></i>
                    <span class="nav-text">Surat Masuk</span>
                </a>
                <div class="triangle"></div>
            </li>
        </div>
    </div>
    <div class="sidebar-overlay"></div>
</div>
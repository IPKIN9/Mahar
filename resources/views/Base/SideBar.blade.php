<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-item {{ Route::is('dashboard.index') ? 'active' : '' }} ">
            <a href="{{route('dashboard.index')}}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-title">SEMUA DATA</li>

        <li class="sidebar-item 
        {{ Route::is('bidang.index') ? 'active' : '' }}
        {{ Route::is('lokasi.index') ? 'active' : '' }}
        {{ Route::is('kades.index') ? 'active' : '' }}
        has-sub
        ">
            <a href="#" class="sidebar-link">
                <i class="fas fa-cube"></i>
                <span>Kelengkapan</span>
            </a>
            <ul class="submenu" style="display: none;">
                <li class="submenu-item {{ Route::is('bidang.index') ? 'active' : '' }}">
                    <a href="{{route('bidang.index')}}">Bidang</a>
                </li>
                <li class="submenu-item {{ Route::is('lokasi.index') ? 'active' : '' }}">
                    <a href="{{route('lokasi.index')}}">Lokasi</a>
                </li>
                <li class="submenu-item {{ Route::is('kades.index') ? 'active' : '' }}">
                    <a href="{{route('kades.index')}}">Kades</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-title">PENGOLAHAN</li>

        <li class="sidebar-item {{ Route::is('rkp.index') ? 'active' : '' }}">
            <a href="{{route('rkp.index')}}" class='sidebar-link'>
                <i class="far fa-file-alt"></i>
                <span>RKP</span>
            </a>
        </li>
        <li class="sidebar-item 
        {{ Route::is('rab.index') ? 'active' : '' }}
        {{ Route::is('edit.rab') ? 'active' : '' }}
        ">
            <a href="{{route('rab.index')}}" class='sidebar-link'>
                <i class="fas fa-file-invoice"></i>
                <span>RAB</span>
            </a>
        </li>
        <li class="sidebar-item {{ Route::is('pemutakhiran.index') ? 'active' : '' }}">
            <a href="{{route('pemutakhiran.index')}}" class='sidebar-link'>
                <i class="fas fa-hourglass"></i>
                <span>Pemutakhiran</span>
            </a>
        </li>
        <li class="sidebar-item {{ Route::is('contoh.index') ? 'active' : '' }}">
            <a href="{{route('contoh.index')}}" class='sidebar-link'>
                <i class="fas fa-ad"></i>
                <span>Contoh</span>
            </a>
        </li>
    </ul>
</div>
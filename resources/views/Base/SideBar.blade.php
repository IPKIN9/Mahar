<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ Route::is('dashboard.index') ? 'active' : '' }} ">
            <a href="{{route('dashboard.index')}}" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item {{ Route::is('detail.index') ? 'active' : '' }}">
            <a href="{{route('detail.index')}}" class='sidebar-link'>
                <i class="fas fa-info-circle"></i>
                <span>Detail</span>
            </a>
        </li>
        <li class="sidebar-item {{ Route::is('bidang.index') ? 'active' : '' }}">
            <a href="{{route('bidang.index')}}" class='sidebar-link'>
                <i class="fas fa-cube"></i>
                <span>Bidang</span>
            </a>
        </li>
        <li class="sidebar-item {{ Route::is('lokasi.index') ? 'active' : '' }}">
            <a href="{{route('lokasi.index')}}" class='sidebar-link'>
                <i class="fas fa-street-view"></i>
                <span>Lokasi</span>
            </a>
        </li>
        <li class="sidebar-item {{ Route::is('rkp.index') ? 'active' : '' }}">
            <a href="{{route('rkp.index')}}" class='sidebar-link'>
                <i class="far fa-file-alt"></i>
                <span>RKP</span>
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
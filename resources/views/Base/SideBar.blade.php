<div class="sidebar-menu">
    <ul class="menu">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ Route::is('dashboard.index') ? 'active' : '' }} ">
            <a href="index.html" class='sidebar-link'>
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-item {{ Route::is('detail.index') ? 'active' : '' }}">
            <a href="{{route('detail.index')}}" class='sidebar-link'>
                <i class="fas fa-ad"></i>
                <span>Detail</span>
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
<aside class="admin-sidebar">
    <div class="admin-brand">
        <div class="admin-logo">
            <img src="{{ asset('img/logo_qperros.png') }}?v={{ time() }}" alt="Logo" style="width: 100%; height: 100%; object-fit: contain; background: white; border-radius: 50%; padding: 2px;">
        </div>
        <div class="admin-brand-text">
            <span class="admin-brand-title">MAS QUE PERROS</span>
            <span class="admin-brand-subtitle">Panel Administrativo</span>
        </div>
    </div>

    <p class="admin-sidebar-section">ADMINISTRACION</p>

    <nav class="admin-menu">
        <a href="{{ route('admin.dashboard') }}" class="admin-menu-item {{ request()->routeIs('admin.dashboard') ? 'admin-menu-item--active' : '' }}">
            <span class="admin-menu-left">
                <i class="admin-menu-icon bi bi-grid-1x2-fill" aria-hidden="true"></i>
                <span>Dashboard</span>
            </span>
            <span class="admin-menu-right">
                <span class="admin-menu-chevron">›</span>
            </span>
        </a>
        <a href="{{ route('admin.users') }}" class="admin-menu-item {{ request()->routeIs('admin.users') ? 'admin-menu-item--active' : '' }}">
            <span class="admin-menu-left">
                <i class="admin-menu-icon bi bi-people-fill" aria-hidden="true"></i>
                <span>Gestión de usuarios</span>
            </span>
            <span class="admin-menu-right">
                <span class="admin-menu-badge">5</span>
            </span>
        </a>
        <a href="{{ route('admin.services') }}" class="admin-menu-item {{ request()->routeIs('admin.services') ? 'admin-menu-item--active' : '' }}">
            <span class="admin-menu-left">
                <i class="admin-menu-icon bi bi-heart-pulse-fill" aria-hidden="true"></i>
                <span>Gestión de servicios</span>
            </span>
            <span class="admin-menu-right">
                <span class="admin-menu-badge">6</span>
            </span>
        </a>
        <a href="{{ route('admin.pets') }}" class="admin-menu-item {{ request()->routeIs('admin.pets') ? 'admin-menu-item--active' : '' }}">
            <span class="admin-menu-left">
                <i class="admin-menu-icon fa-sharp fa-solid fa-shield-dog" style="color: white;" aria-hidden="true"></i>
                <span>Gestión de mascotas</span>
            </span>
            <span class="admin-menu-right"></span>
        </a>
        <a href="{{ route('admin.settings') }}" class="admin-menu-item {{ request()->routeIs('admin.settings') ? 'admin-menu-item--active' : '' }}">
            <span class="admin-menu-left">
                <i class="admin-menu-icon bi bi-gear-fill" aria-hidden="true"></i>
                <span>Configuracion</span>
            </span>
            <span class="admin-menu-right"></span>
        </a>
    </nav>

    <div class="admin-sidebar-spacer"></div>

    <div class="admin-sidebar-divider"></div>

    <form method="POST" action="{{ route('logout') }}" class="admin-logout">
        @csrf
        <button type="submit">
            <span class="admin-logout-icon">⤴</span>
            <span>Cerrar sesion</span>
        </button>
    </form>
</aside>

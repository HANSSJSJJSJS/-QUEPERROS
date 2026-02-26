<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Usuarios por Rol</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=lilita-one:400" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/Admin/admin-dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('css/Admin/admin-sidebar-extras.css') }}">
        <link rel="stylesheet" href="{{ asset('css/Admin/gestionroles-users.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body>
        <div class="admin-layout">
            <aside class="admin-sidebar">
                <div class="admin-brand">
                    <div class="admin-logo"><i class="bi bi-paw" aria-hidden="true"></i></div>
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
                        <span class="admin-menu-right"></span>
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
                    <a href="{{ route('admin.roles') }}" class="admin-menu-item {{ request()->routeIs('admin.roles*') ? 'admin-menu-item--active' : '' }}">
                        <span class="admin-menu-left">
                            <i class="admin-menu-icon bi bi-shield-lock-fill" aria-hidden="true"></i>
                            <span>Gestión de roles</span>
                        </span>
                        <span class="admin-menu-right">
                            <span class="admin-menu-badge">4</span>
                            <span class="admin-menu-chevron">›</span>
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
                    <a href="#" class="admin-menu-item">
                        <span class="admin-menu-left">
                            <i class="admin-menu-icon bi bi-bar-chart-fill" aria-hidden="true"></i>
                            <span>Reportes</span>
                        </span>
                        <span class="admin-menu-right"></span>
                    </a>
                    <a href="#" class="admin-menu-item">
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

            <main class="admin-main">
                <header class="admin-header">
                    <button class="admin-menu-toggle" aria-label="Abrir menú">☰</button>

                    <div class="admin-user-chip">
                        <div class="admin-user-avatar">
                            {{ mb_substr($admin->name ?? 'A', 0, 1) }}
                        </div>
                        <div class="admin-user-info">
                            <span class="admin-user-role">Administrador</span>
                            <span class="admin-user-name">{{ $admin->name ?? 'Nombre' }}</span>
                        </div>
                    </div>
                </header>

                <section class="gru-hero">
                    <a href="{{ route('admin.roles') }}" class="gru-back" aria-label="Volver">
                        <i class="bi bi-arrow-left" aria-hidden="true"></i>
                    </a>
                    <div class="gru-hero-icon">
                        <span class="gru-hero-icon-inner"></span>
                    </div>
                    <div class="gru-hero-text">
                        <h1 class="gru-hero-title">USUARIO CON ROL: {{ $rolLabel }}</h1>
                        <p class="gru-hero-sub">Administrador</p>
                    </div>
                </section>

                <section class="gru-search">
                    <form method="GET" action="{{ route('admin.roles.users', ['rol' => $rol]) }}" class="gru-search-form" role="search">
                        <i class="bi bi-search" aria-hidden="true"></i>
                        <input type="text" name="q" value="{{ $q }}" placeholder="Busca por ID, Nombre o email" aria-label="Buscar" />
                    </form>
                </section>

                <section class="gru-panel">
                    <div class="gru-grid">
                        @forelse ($users as $u)
                            <article class="gru-card">
                                <div class="gru-card-top">
                                    <div class="gru-avatar">{{ mb_substr($u->name ?? 'U', 0, 1) }}</div>
                                    <div class="gru-main">
                                        <div class="gru-name">{{ $u->name }}</div>
                                        <div class="gru-meta">
                                            <span class="gru-chip">C.C {{ $u->id }}</span>
                                            <span class="gru-chip gru-chip--ok">✓ Activo</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="gru-info">
                                    <div class="gru-info-row"><i class="bi bi-envelope" aria-hidden="true"></i> <span>{{ $u->email }}</span></div>
                                </div>
                            </article>
                        @empty
                            <div class="gru-empty">No hay usuarios con este rol.</div>
                        @endforelse
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>

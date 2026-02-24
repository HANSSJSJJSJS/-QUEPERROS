<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestión de Usuarios</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=lilita-one:400" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/Admin/admin-dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('css/Admin/gestionusuarios.css') }}">
        <link rel="stylesheet" href="{{ asset('css/Admin/admin-sidebar-extras.css') }}">
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

                <div class="admin-sidebar-user">
                    <div class="admin-sidebar-user-avatar">{{ mb_substr($admin->name ?? 'A', 0, 1) }}</div>
                    <div class="admin-sidebar-user-text">
                        <div class="admin-sidebar-user-name">{{ $admin->name }}</div>
                        <div class="admin-sidebar-user-role">Administrador</div>
                    </div>
                    <div class="admin-sidebar-user-status" aria-label="Activo"></div>
                </div>

                <p class="admin-sidebar-section">ADMINISTRACION</p>

                <nav class="admin-menu">
                    <a href="{{ route('admin.dashboard') }}" class="admin-menu-item">
                        <span class="admin-menu-left">
                            <i class="admin-menu-icon bi bi-grid-1x2-fill" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </span>
                        <span class="admin-menu-right"></span>
                    </a>
                    <a href="{{ route('admin.users') }}" class="admin-menu-item admin-menu-item--active">
                        <span class="admin-menu-left">
                            <i class="admin-menu-icon bi bi-people-fill" aria-hidden="true"></i>
                            <span>Gestión de usuarios</span>
                        </span>
                        <span class="admin-menu-right">
                            <span class="admin-menu-badge">5</span>
                            <span class="admin-menu-chevron">›</span>
                        </span>
                    </a>
                    <a href="#" class="admin-menu-item">
                        <span class="admin-menu-left">
                            <i class="admin-menu-icon bi bi-shield-lock-fill" aria-hidden="true"></i>
                            <span>Gestión de roles</span>
                        </span>
                        <span class="admin-menu-right">
                            <span class="admin-menu-badge">3</span>
                        </span>
                    </a>
                    <a href="#" class="admin-menu-item">
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
                    <button class="admin-menu-toggle" aria-label="Abrir menú">
                        ☰
                    </button>

                    <div class="admin-user-chip">
                        <div class="admin-user-avatar">
                            {{ mb_substr($admin->name ?? 'A', 0, 1) }}
                        </div>
                        <div class="admin-user-info">
                            <span class="admin-user-role">Administrador</span>
                            <span class="admin-user-name">{{ $admin->name }}</span>
                        </div>
                    </div>
                </header>

                <section class="admin-welcome admin-welcome--users">
                    <div class="admin-welcome-icon">👤</div>
                    <div class="admin-welcome-text">
                        <h1 class="admin-welcome-title">GESTIÓN DE USUARIOS</h1>
                        <p class="admin-welcome-role">Administrador</p>
                    </div>
                </section>

                <section class="admin-users-panel">
                    <header class="admin-users-header">
                        <div class="admin-users-header-left">
                            <span class="admin-users-header-icon">📋</span>
                            <span class="admin-users-header-title">Lista de Usuarios</span>
                        </div>
                        <a href="#" class="admin-users-add">+ Agregar Usuarios</a>
                    </header>

                    <div class="admin-users-search-wrapper">
                        <div class="admin-users-search">
                            <span class="admin-users-search-icon">🔍</span>
                            <input type="text" placeholder="Busca por ID, Nombre o email" />
                        </div>
                    </div>

                    <div class="admin-users-grid">
                        @foreach ($users as $user)
                            <article class="admin-user-card">
                                <div class="admin-user-card-header">
                                    <div class="admin-user-card-avatar">
                                        {{ mb_substr($user->name ?? 'U', 0, 1) }}
                                    </div>
                                    <div class="admin-user-card-main">
                                        <h3 class="admin-user-card-name">{{ $user->name }}</h3>
                                        <div class="admin-user-card-tags">
                                            <span class="admin-user-tag">{{ $user->email }}</span>
                                            @if (!empty($user->rol))
                                                <span class="admin-user-tag admin-user-tag--role">{{ ucfirst($user->rol) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <span class="admin-user-status">Activo</span>
                                </div>

                                <div class="admin-user-card-body">
                                    <p class="admin-user-card-row">Correo: {{ $user->email }}</p>
                                </div>

                                <div class="admin-user-card-actions">
                                    <button type="button" class="admin-btn admin-btn--light">Historial</button>
                                    <button type="button" class="admin-btn admin-btn--primary">Editar</button>
                                    <button type="button" class="admin-btn admin-btn--danger">Eliminar</button>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestión de Roles</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=lilita-one:400" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/Admin/admin-dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('css/Admin/admin-sidebar-extras.css') }}">
        <link rel="stylesheet" href="{{ asset('css/Admin/gestionroles.css') }}">
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
                    <a href="{{ route('admin.roles') }}" class="admin-menu-item {{ request()->routeIs('admin.roles') ? 'admin-menu-item--active' : '' }}">
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

                <section class="gr-hero">
                    <div class="gr-hero-icon">
                        <span class="gr-hero-icon-inner"></span>
                    </div>
                    <div class="gr-hero-text">
                        <h1 class="gr-hero-title">GESTION DE ROLES</h1>
                        <p class="gr-hero-sub">Administrador</p>
                    </div>
                </section>

                <section class="gr-panel">
                    <div class="gr-panel-inner">
                        <article class="gr-card">
                            <div class="gr-card-top">
                                <div class="gr-card-avatar"><i class="bi bi-paw-fill" aria-hidden="true"></i></div>
                                <div class="gr-card-head">
                                    <h2 class="gr-card-title">Dueños</h2>
                                    <div class="gr-card-badges">
                                        <span class="gr-badge">1 Usuarios</span>
                                        <span class="gr-badge gr-badge--ok">✓ Activo</span>
                                    </div>
                                </div>
                            </div>

                            <div class="gr-card-desc">
                                Acceso a la gestión de mascotas, citas y datos del propietario.
                            </div>

                            <h3 class="gr-card-subtitle">Permisos principales</h3>
                            <div class="gr-perms">
                                <span class="gr-perm">Ver Mascotas</span>
                                <span class="gr-perm">Agendar Citas</span>
                                <span class="gr-perm">Actualizar Perfil</span>
                            </div>

                            <a href="{{ route('admin.roles.users', ['rol' => 'dueno']) }}" class="gr-card-cta">VER USUARIOS</a>
                        </article>

                        <article class="gr-card">
                            <div class="gr-card-top">
                                <div class="gr-card-avatar"><i class="bi bi-paw-fill" aria-hidden="true"></i></div>
                                <div class="gr-card-head">
                                    <h2 class="gr-card-title">Administradores</h2>
                                    <div class="gr-card-badges">
                                        <span class="gr-badge">1 Usuarios</span>
                                        <span class="gr-badge gr-badge--ok">✓ Activo</span>
                                    </div>
                                </div>
                            </div>

                            <div class="gr-card-desc">
                                Acceso completo al sistema, gestión de usuarios, roles y configuración general.
                            </div>

                            <h3 class="gr-card-subtitle">Permisos principales</h3>
                            <div class="gr-perms">
                                <span class="gr-perm">Gestionar Usuarios</span>
                                <span class="gr-perm">Gestionar Roles</span>
                                <span class="gr-perm">Ver Reportes</span>
                                <span class="gr-perm">Configurar Sistema</span>
                            </div>

                            <a href="{{ route('admin.roles.users', ['rol' => 'admin']) }}" class="gr-card-cta">VER USUARIOS</a>
                        </article>

                        <article class="gr-card">
                            <div class="gr-card-top">
                                <div class="gr-card-avatar"><i class="bi bi-paw-fill" aria-hidden="true"></i></div>
                                <div class="gr-card-head">
                                    <h2 class="gr-card-title">Cuidadores</h2>
                                    <div class="gr-card-badges">
                                        <span class="gr-badge">1 Usuarios</span>
                                        <span class="gr-badge gr-badge--warn">× Inactivo</span>
                                    </div>
                                </div>
                            </div>

                            <div class="gr-card-desc">
                                Gestión de servicios asignados, seguimiento y apoyo operativo.
                            </div>

                            <h3 class="gr-card-subtitle">Permisos principales</h3>
                            <div class="gr-perms">
                                <span class="gr-perm">Ver Servicios</span>
                                <span class="gr-perm">Actualizar Estado</span>
                                <span class="gr-perm">Ver Historial</span>
                            </div>

                            <a href="{{ route('admin.roles.users', ['rol' => 'empleado']) }}" class="gr-card-cta">VER USUARIOS</a>
                        </article>

                        <article class="gr-card">
                            <div class="gr-card-top">
                                <div class="gr-card-avatar"><i class="bi bi-paw-fill" aria-hidden="true"></i></div>
                                <div class="gr-card-head">
                                    <h2 class="gr-card-title">Padrinos</h2>
                                    <div class="gr-card-badges">
                                        <span class="gr-badge">1 Usuarios</span>
                                        <span class="gr-badge gr-badge--ok">✓ Activo</span>
                                    </div>
                                </div>
                            </div>

                            <div class="gr-card-desc">
                                Apoyo y seguimiento a casos, contribuciones y comunicación.
                            </div>

                            <h3 class="gr-card-subtitle">Permisos principales</h3>
                            <div class="gr-perms">
                                <span class="gr-perm">Ver Casos</span>
                                <span class="gr-perm">Registrar Apoyo</span>
                                <span class="gr-perm">Mensajería</span>
                            </div>

                            <a href="{{ route('admin.roles.users', ['rol' => 'padrino']) }}" class="gr-card-cta">VER USUARIOS</a>
                        </article>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>

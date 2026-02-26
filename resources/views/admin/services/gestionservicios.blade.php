<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestión de Servicios</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=lilita-one:400" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/Admin/admin-dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('css/Admin/admin-sidebar-extras.css') }}">
        <link rel="stylesheet" href="{{ asset('css/Admin/gestionservicios.css') }}">
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

                    <div class="gs-top-search" aria-label="Buscador global">
                        <i class="bi bi-search" aria-hidden="true"></i>
                        <input type="text" placeholder="Buscar usuarios, roles, servicios..." />
                    </div>

                    <div class="admin-user-chip">
                        <div class="gs-topbell" aria-label="Notificaciones">
                            <i class="bi bi-bell" aria-hidden="true"></i>
                            <span class="gs-topbell-badge">2</span>
                        </div>
                        <div class="admin-user-avatar">
                            {{ mb_substr($admin->name ?? 'A', 0, 1) }}
                        </div>
                        <div class="admin-user-info">
                            <span class="admin-user-role">Administrador</span>
                            <span class="admin-user-name">{{ $admin->name ?? 'Nombre' }}</span>
                        </div>
                    </div>
                </header>

                @php
                    $totalServices = (int) (($stats['total_services'] ?? 0));
                    $activeServices = (int) (($stats['active_services'] ?? 0));
                    $totalUses = (int) (($stats['total_uses'] ?? 0));
                    $estimatedRevenue = (int) (($stats['estimated_revenue'] ?? 0));
                    $maxUsage = max(1, (int) max(array_map(fn ($s) => (int) ($s['usage_month'] ?? 0), $services ?? [])));
                    $categories = ['Todos', 'Medicina', 'Prevencion', 'Cuidado', 'Estetica', 'Emergencia', 'Cirugia'];
                @endphp

                <section class="gs2-page-head">
                    <div class="gs2-page-left">
                        <h1 class="gs2-title">Gestion de Servicios</h1>
                        <p class="gs2-subtitle">Administra los servicios veterinarios disponibles</p>
                    </div>
                    <button type="button" class="gs2-new">
                        <span class="gs2-new-plus">+</span>
                        <span>Nuevo Servicio</span>
                    </button>
                </section>

                <section class="gs2-stats">
                    <div class="gs2-stat">
                        <div class="gs2-stat-ic gs2-stat-ic--purple"><i class="bi bi-wrench" aria-hidden="true"></i></div>
                        <div class="gs2-stat-main">
                            <div class="gs2-stat-value">{{ $totalServices }}</div>
                            <div class="gs2-stat-label">Total servicios</div>
                        </div>
                    </div>
                    <div class="gs2-stat">
                        <div class="gs2-stat-ic gs2-stat-ic--green"><i class="bi bi-check-circle" aria-hidden="true"></i></div>
                        <div class="gs2-stat-main">
                            <div class="gs2-stat-value">{{ $activeServices }}</div>
                            <div class="gs2-stat-label">Activos</div>
                        </div>
                    </div>
                    <div class="gs2-stat">
                        <div class="gs2-stat-ic gs2-stat-ic--blue"><i class="bi bi-graph-up" aria-hidden="true"></i></div>
                        <div class="gs2-stat-main">
                            <div class="gs2-stat-value">{{ $totalUses }}</div>
                            <div class="gs2-stat-label">Usos totales</div>
                        </div>
                    </div>
                    <div class="gs2-stat">
                        <div class="gs2-stat-ic gs2-stat-ic--yellow"><i class="bi bi-currency-dollar" aria-hidden="true"></i></div>
                        <div class="gs2-stat-main">
                            <div class="gs2-stat-value">${{ number_format((int) round($estimatedRevenue / 1000000), 1) }}M</div>
                            <div class="gs2-stat-label">Ingresos est.</div>
                        </div>
                    </div>
                </section>

                <section class="gs2-filters">
                    <div class="gs2-search">
                        <i class="bi bi-search" aria-hidden="true"></i>
                        <input type="text" placeholder="Buscar servicios..." />
                    </div>
                    <div class="gs2-chips" aria-label="Filtros por categoría">
                        @foreach ($categories as $c)
                            <button type="button" class="gs2-chip {{ $loop->first ? 'gs2-chip--active' : '' }}">{{ $c }}</button>
                        @endforeach
                    </div>
                </section>

                <section class="gs2-grid" aria-label="Listado de servicios">
                    @foreach (($services ?? []) as $s)
                        @php
                            $progress = min(100, (int) round(((int) ($s['usage_month'] ?? 0) / $maxUsage) * 100));
                            $catClass = match (($s['category_color'] ?? 'gray')) {
                                'blue' => 'gs2-cat--blue',
                                'green' => 'gs2-cat--green',
                                'yellow' => 'gs2-cat--yellow',
                                'purple' => 'gs2-cat--purple',
                                'red' => 'gs2-cat--red',
                                default => 'gs2-cat--gray',
                            };
                        @endphp
                        <article class="gs2-card">
                            <div class="gs2-card-top">
                                <span class="gs2-cat {{ $catClass }}"><i class="bi bi-tag" aria-hidden="true"></i> {{ $s['category'] ?? 'Categoria' }}</span>
                                <span class="gs2-active" aria-label="Estado">
                                    <i class="bi {{ ($s['active'] ?? false) ? 'bi-toggle-on' : 'bi-eye' }}" aria-hidden="true"></i>
                                </span>
                            </div>

                            <h2 class="gs2-name">{{ $s['name'] ?? 'Servicio' }}</h2>
                            <p class="gs2-desc">{{ $s['description'] ?? '' }}</p>

                            <div class="gs2-meta">
                                <div class="gs2-meta-item"><span class="gs2-meta-ic">$</span> <strong>${{ number_format((int) ($s['price'] ?? 0), 0, ',', '.') }}</strong></div>
                                <div class="gs2-meta-sep">|</div>
                                <div class="gs2-meta-item"><i class="bi bi-clock" aria-hidden="true"></i> <span>{{ $s['duration'] ?? '—' }}</span></div>
                                <div class="gs2-meta-sep">|</div>
                                <div class="gs2-meta-item"><i class="bi bi-star-fill" aria-hidden="true"></i> <span>{{ number_format((float) ($s['rating'] ?? 0), 1) }}</span></div>
                            </div>

                            <div class="gs2-usage">
                                <div class="gs2-usage-top">
                                    <span class="gs2-usage-label">USO ESTE MES</span>
                                    <span class="gs2-usage-value">{{ (int) ($s['usage_month'] ?? 0) }} veces</span>
                                </div>
                                <div class="gs2-bar" aria-hidden="true"><span class="gs2-bar-fill" style="width:{{ $progress }}%"></span></div>
                            </div>

                            <div class="gs2-actions">
                                <button type="button" class="gs2-edit"><i class="bi bi-pencil" aria-hidden="true"></i> Editar</button>
                                <button type="button" class="gs2-del" aria-label="Eliminar"><i class="bi bi-trash" aria-hidden="true"></i></button>
                            </div>
                        </article>
                    @endforeach
                </section>
            </main>
        </div>
    </body>
</html>

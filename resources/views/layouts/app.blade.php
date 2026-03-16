<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Mas Que Perros' }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=lilita-one:400" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/Admin/admin-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Admin/admin-sidebar-extras.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Admin/dashboard-admin-v2.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        blue: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            600: '#2563eb',
                            700: '#1d4ed8',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body>
    @php
        use Illuminate\Support\Str;
        $user = Auth::user();
    @endphp
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
                    <span class="admin-menu-right">
                        <span class="admin-menu-chevron">›</span>
                    </span>
                </a>
                <a href="{{ route('admin.users') }}" class="admin-menu-item {{ request()->routeIs('admin.users') ? 'admin-menu-item--active' : '' }}">
                    <span class="admin-menu-left">
                        <i class="admin-menu-icon bi bi-people-fill" aria-hidden="true"></i>
                        <span>Gestión de usuarios</span>
                    </span>
                </a>
                <a href="{{ route('admin.services') }}" class="admin-menu-item {{ request()->routeIs('admin.services') ? 'admin-menu-item--active' : '' }}">
                    <span class="admin-menu-left">
                        <i class="admin-menu-icon bi bi-heart-pulse-fill" aria-hidden="true"></i>
                        <span>Gestión de servicios</span>
                    </span>
                </a>
                <a href="{{ route('admin.pets') }}" class="admin-menu-item {{ request()->routeIs('admin.pets') ? 'admin-menu-item--active' : '' }}">
                    <span class="admin-menu-left">
                        <i class="admin-menu-icon bi bi-paw-fill" aria-hidden="true"></i>
                        <span>Gestión de mascotas</span>
                    </span>
                </a>
                <a href="{{ route('admin.settings') }}" class="admin-menu-item {{ request()->routeIs('admin.settings') ? 'admin-menu-item--active' : '' }}">
                    <span class="admin-menu-left">
                        <i class="admin-menu-icon bi bi-gear-fill" aria-hidden="true"></i>
                        <span>Configuracion</span>
                    </span>
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
            <header class="ad2-header">
                <div class="ad2-search" role="search">
                    <i class="bi bi-search" aria-hidden="true"></i>
                    <input type="text" placeholder="Buscar..." aria-label="Buscar" />
                </div>

                <div class="ad2-top-actions">
                    <div class="ad2-profile">
                        <div class="ad2-profile-avatar">{{ mb_substr($user->name ?? 'A', 0, 1) }}</div>
                        <div class="ad2-profile-text">
                            <span class="ad2-profile-title">Administrador</span>
                            <span class="ad2-profile-sub">{{ Str::limit($user->name ?? 'Usuario', 14) }}</span>
                        </div>
                    </div>
                </div>
            </header>

            <div class="p-6">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>

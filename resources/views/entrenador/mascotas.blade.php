<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mascotas Asignadas</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=lilita-one:400" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/shared/mq-topbar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dueño/panel.css') }}">
        <link rel="stylesheet" href="{{ asset('css/entrenador/dashboardentrenador.css') }}">
        <link rel="stylesheet" href="{{ asset('css/entrenador/mascotas.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body>
        @include('partials.page-loader')
        @php
            use Illuminate\Support\Str;
        @endphp
        <div class="mq-dashboard et-dashboard">
            <aside class="mq-dashboard-sidebar et-sidebar">
                <div class="mq-side-top">
                    <div class="mq-side-brand">
                        <div class="mq-side-badge"><i class="bi bi-paw" aria-hidden="true"></i></div>
                        <div class="mq-side-brand-text">
                            <div class="mq-side-brand-title">MAS QUE</div>
                            <div class="mq-side-brand-title">PERROS</div>
                            <div class="mq-side-brand-sub">Panel</div>
                        </div>
                    </div>

                    <div class="mq-side-user">
                        <div class="mq-side-avatar">{{ strtoupper(mb_substr($user->name ?? 'E', 0, 1)) }}</div>
                        <div class="mq-side-user-name">{{ Str::upper(Str::before($user->name ?? 'Entrenador', ' ')) }}</div>
                        <div class="mq-side-user-role">Entrenador</div>
                    </div>
                </div>

                <div class="mq-side-section">MENU PRINCIPAL</div>
                <nav class="mq-side-menu" aria-label="Menú entrenador">
                    <a href="{{ route('entrenador.dashboard') }}" class="mq-side-item {{ request()->routeIs('entrenador.dashboard') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left"><i class="bi bi-house-door" aria-hidden="true"></i><span>Dashboard</span></span>
                        @if (request()->routeIs('entrenador.dashboard'))<span class="mq-side-active-dot" aria-hidden="true"></span>@endif
                    </a>
                    <a href="{{ route('entrenador.tareas') }}" class="mq-side-item {{ request()->routeIs('entrenador.tareas') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left"><i class="bi bi-list-check" aria-hidden="true"></i><span>Mis tareas</span></span>
                        @if (request()->routeIs('entrenador.tareas'))<span class="mq-side-active-dot" aria-hidden="true"></span>@endif
                    </a>
                    <a href="{{ route('entrenador.mascotas') }}" class="mq-side-item {{ request()->routeIs('entrenador.mascotas') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left"><i class="bi bi-paw" aria-hidden="true"></i><span>Mascotas Asignadas</span></span>
                        @if (request()->routeIs('entrenador.mascotas'))<span class="mq-side-active-dot" aria-hidden="true"></span>@endif
                    </a>
                    <a href="{{ route('entrenador.seguimiento') }}" class="mq-side-item {{ request()->routeIs('entrenador.seguimiento') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left"><i class="bi bi-graph-up" aria-hidden="true"></i><span>Seguimiento</span></span>
                        @if (request()->routeIs('entrenador.seguimiento'))<span class="mq-side-active-dot" aria-hidden="true"></span>@endif
                    </a>
                    <a href="{{ route('entrenador.horario') }}" class="mq-side-item {{ request()->routeIs('entrenador.horario') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left"><i class="bi bi-calendar2-week" aria-hidden="true"></i><span>Mi horario</span></span>
                        @if (request()->routeIs('entrenador.horario'))<span class="mq-side-active-dot" aria-hidden="true"></span>@endif
                    </a>
                    <a href="{{ route('entrenador.historial') }}" class="mq-side-item {{ request()->routeIs('entrenador.historial') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left"><i class="bi bi-clock-history" aria-hidden="true"></i><span>Historial</span></span>
                        @if (request()->routeIs('entrenador.historial'))<span class="mq-side-active-dot" aria-hidden="true"></span>@endif
                    </a>
                    <a href="{{ route('entrenador.chat') }}" class="mq-side-item {{ request()->routeIs('entrenador.chat') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left"><i class="bi bi-chat-dots" aria-hidden="true"></i><span>Chat</span></span>
                        @if (request()->routeIs('entrenador.chat'))<span class="mq-side-active-dot" aria-hidden="true"></span>@endif
                    </a>
                    <a href="{{ route('entrenador.notificaciones') }}" class="mq-side-item {{ request()->routeIs('entrenador.notificaciones') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left"><i class="bi bi-bell" aria-hidden="true"></i><span>Notificaciones</span></span>
                        @if (request()->routeIs('entrenador.notificaciones'))<span class="mq-side-active-dot" aria-hidden="true"></span>@endif
                    </a>
                    <a href="{{ route('entrenador.perfil') }}" class="mq-side-item {{ request()->routeIs('entrenador.perfil') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left"><i class="bi bi-person" aria-hidden="true"></i><span>Mi Perfil</span></span>
                        @if (request()->routeIs('entrenador.perfil'))<span class="mq-side-active-dot" aria-hidden="true"></span>@endif
                    </a>
                </nav>

                <div class="mq-side-spacer"></div>

                <form method="POST" action="{{ route('logout') }}" class="mq-dashboard-logout">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>
            </aside>

            <main class="mq-dashboard-main et-main">
                @include('partials.mq-topbar', [
                    'user' => $user,
                    'roleLabel' => 'Entrenador',
                    'profileUrl' => route('entrenador.perfil'),
                    'settingsUrl' => route('entrenador.perfil'),
                    'helpUrl' => route('entrenador.chat'),
                    'notificationsUrl' => route('entrenador.notificaciones'),
                    'notifCount' => 2,
                ])

                <section class="ma-grid" aria-label="Mascotas asignadas">
                    @foreach (($pets ?? []) as $pet)
                        <article class="ma-card">
                            <div class="ma-top">
                                <div class="ma-avatar" aria-hidden="true">
                                    <i class="bi bi-person" aria-hidden="true"></i>
                                </div>
                                <div class="ma-main">
                                    <div class="ma-name">{{ $pet['name'] ?? '' }}</div>
                                    <div class="ma-breed">{{ $pet['breed'] ?? '' }}</div>
                                </div>
                            </div>

                            <div class="ma-info">
                                <div class="ma-line">
                                    <span class="ma-k">Edad:</span>
                                    <span class="ma-v">{{ $pet['age'] ?? '' }}</span>
                                </div>
                                <div class="ma-line">
                                    <span class="ma-k">Dueno:</span>
                                    <span class="ma-v ma-v--purple">{{ $pet['owner'] ?? '' }}</span>
                                </div>
                                <div class="ma-line">
                                    <span class="ma-k">Telefono:</span>
                                    <span class="ma-v ma-v--purple">{{ $pet['phone'] ?? '' }}</span>
                                </div>
                            </div>

                            <div class="ma-tags" aria-label="Servicios">
                                @foreach (($pet['tags'] ?? []) as $tag)
                                    <span class="ma-tag">{{ $tag }}</span>
                                @endforeach
                            </div>

                            <div class="ma-actions">
                                <a class="ma-btn ma-btn--primary" href="#">Seguimiento</a>
                                <a class="ma-btn ma-btn--ghost" href="#">Mensaje</a>
                            </div>
                        </article>
                    @endforeach
                </section>
            </main>
        </div>
    </body>
</html>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Chat</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=lilita-one:400" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/shared/mq-topbar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dueño/panel.css') }}">
        <link rel="stylesheet" href="{{ asset('css/entrenador/dashboardentrenador.css') }}">
        <link rel="stylesheet" href="{{ asset('css/entrenador/chat.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="{{ asset('css/Admin/admin-sidebar-extras.css') }}?v={{ time() }}">
    </head>
    <body>
        @include('partials.page-loader')
        @php
            use Illuminate\Support\Str;
        @endphp
        <div class="mq-dashboard et-dashboard">
            @include("partials.entrenador-sidebar")
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
                @include('partials.mq-topbar', ['user' => Auth::user(), 'user' => Auth::user(), 
                    'user' => $user,
                    'roleLabel' => 'Entrenador',
                    'profileUrl' => route('entrenador.perfil'),
                    'settingsUrl' => route('entrenador.perfil'),
                    'helpUrl' => route('entrenador.chat'),
                    'notificationsUrl' => route('entrenador.notificaciones'),
                    'notifCount' => 2,
                ])

                <section class="ch-layout" aria-label="Chat">
                    <aside class="ch-left" aria-label="Conversaciones">
                        <div class="ch-left-head">Conversaciones</div>

                        <div class="ch-conv-list">
                            @foreach (($conversations ?? []) as $conv)
                                <button type="button" class="ch-conv {{ !empty($conv['active']) ? 'ch-conv--active' : '' }}">
                                    <div class="ch-avatar" aria-hidden="true">{{ $conv['initial'] ?? 'C' }}</div>
                                    <div class="ch-conv-meta">
                                        <div class="ch-conv-name">{{ $conv['name'] ?? '' }}</div>
                                        <div class="ch-conv-sub">{{ $conv['subtitle'] ?? '' }}</div>
                                    </div>
                                </button>
                            @endforeach
                        </div>
                    </aside>

                    <div class="ch-right" aria-label="Conversación">
                        <div class="ch-chat-head">
                            <div class="ch-chat-head-left">
                                <div class="ch-avatar ch-avatar--big" aria-hidden="true">
                                    {{ mb_substr(($activeConversation['name'] ?? 'C'), 0, 1) }}
                                </div>
                                <div>
                                    <div class="ch-chat-name">{{ $activeConversation['name'] ?? '' }}</div>
                                    <div class="ch-chat-sub">{{ $activeConversation['subtitle'] ?? '' }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="ch-chat-body">
                            @foreach (($messages ?? []) as $msg)
                                <div class="ch-msg-row {{ ($msg['from'] ?? '') === 'trainer' ? 'ch-msg-row--me' : '' }}">
                                    <div class="ch-msg {{ ($msg['from'] ?? '') === 'trainer' ? 'ch-msg--me' : 'ch-msg--them' }}">
                                        {{ $msg['text'] ?? '' }}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <form class="ch-chat-input" action="#" method="POST">
                            <input class="ch-input" type="text" placeholder="Escribe un mensaje..." />
                            <button class="ch-send" type="submit">Enviar</button>
                        </form>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>

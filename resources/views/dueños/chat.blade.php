<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Chat con Entrenador</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=lilita-one:400" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/dueño/panel.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dueño/modulos.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dueño/chat.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>

    <body>
        @php
            use Illuminate\Support\Str;
        @endphp

        <div class="mq-dashboard">
            <aside class="mq-dashboard-sidebar">
                <div class="mq-side-top">
                    <div class="mq-side-brand">
                        <div class="mq-side-badge">
                            <i class="bi bi-paw" aria-hidden="true"></i>
                        </div>
                        <div class="mq-side-brand-text">
                            <div class="mq-side-brand-title">MAS QUE</div>
                            <div class="mq-side-brand-title">PERROS</div>
                            <div class="mq-side-brand-sub">Panel</div>
                        </div>
                    </div>

                    <div class="mq-side-user">
                        <div class="mq-side-avatar">{{ strtoupper(mb_substr($user->name, 0, 1)) }}</div>
                        <div class="mq-side-user-name">{{ Str::upper(Str::before($user->name, ' ')) }}</div>
                        <div class="mq-side-user-role">Propietario</div>
                    </div>
                </div>

                <div class="mq-side-section">MENU PRINCIPAL</div>
                <nav class="mq-side-menu">
                    <a href="{{ route('dashboard') }}" class="mq-side-item {{ request()->routeIs('dashboard') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left">
                            <i class="bi bi-house-door" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </span>
                        @if (request()->routeIs('dashboard'))
                            <span class="mq-side-active-dot" aria-hidden="true"></span>
                        @endif
                    </a>
                    <a href="{{ route('owner.pets') }}" class="mq-side-item {{ request()->routeIs('owner.pets*') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left">
                            <i class="bi bi-paw" aria-hidden="true"></i>
                            <span>Mis Perros</span>
                        </span>
                        @if (request()->routeIs('owner.pets*'))
                            <span class="mq-side-active-dot" aria-hidden="true"></span>
                        @endif
                    </a>
                    <a href="{{ route('owner.services') }}" class="mq-side-item {{ request()->routeIs('owner.services') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left">
                            <i class="bi bi-bag" aria-hidden="true"></i>
                            <span>Servicios</span>
                        </span>
                        @if (request()->routeIs('owner.services'))
                            <span class="mq-side-active-dot" aria-hidden="true"></span>
                        @endif
                    </a>
                    <a href="{{ route('owner.reservas') }}" class="mq-side-item {{ request()->routeIs('owner.reservas') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left">
                            <i class="bi bi-calendar-check" aria-hidden="true"></i>
                            <span>Reservas</span>
                        </span>
                        @if (request()->routeIs('owner.reservas'))
                            <span class="mq-side-active-dot" aria-hidden="true"></span>
                        @endif
                    </a>
                    <a href="{{ route('owner.seguimiento') }}" class="mq-side-item {{ request()->routeIs('owner.seguimiento') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left">
                            <i class="bi bi-graph-up" aria-hidden="true"></i>
                            <span>Seguimiento</span>
                        </span>
                        @if (request()->routeIs('owner.seguimiento'))
                            <span class="mq-side-active-dot" aria-hidden="true"></span>
                        @endif
                    </a>
                    <a href="{{ route('owner.pagos') }}" class="mq-side-item {{ request()->routeIs('owner.pagos') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left">
                            <i class="bi bi-cash-coin" aria-hidden="true"></i>
                            <span>Pagos</span>
                        </span>
                        @if (request()->routeIs('owner.pagos'))
                            <span class="mq-side-active-dot" aria-hidden="true"></span>
                        @endif
                    </a>
                    <a href="{{ route('owner.planpadrino') }}" class="mq-side-item {{ request()->routeIs('owner.planpadrino') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left">
                            <i class="bi bi-heart" aria-hidden="true"></i>
                            <span>Plan Padrino</span>
                        </span>
                        @if (request()->routeIs('owner.planpadrino'))
                            <span class="mq-side-active-dot" aria-hidden="true"></span>
                        @endif
                    </a>
                    <a href="{{ route('owner.perfil') }}" class="mq-side-item {{ request()->routeIs('owner.perfil') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left">
                            <i class="bi bi-person" aria-hidden="true"></i>
                            <span>Mi Perfil</span>
                        </span>
                        @if (request()->routeIs('owner.perfil'))
                            <span class="mq-side-active-dot" aria-hidden="true"></span>
                        @endif
                    </a>
                </nav>

                <div class="mq-side-section mq-side-section--mt">EXTRAS</div>
                <nav class="mq-side-menu">
                    <a href="{{ route('owner.chat') }}" class="mq-side-item {{ request()->routeIs('owner.chat') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left">
                            <i class="bi bi-chat-dots" aria-hidden="true"></i>
                            <span>Chat con Entrenador</span>
                        </span>
                        @if (request()->routeIs('owner.chat'))
                            <span class="mq-side-active-dot" aria-hidden="true"></span>
                        @endif
                    </a>
                    <a href="{{ route('owner.notificaciones') }}" class="mq-side-item {{ request()->routeIs('owner.notificaciones') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left">
                            <i class="bi bi-bell" aria-hidden="true"></i>
                            <span>Notificaciones</span>
                        </span>
                    </a>
                    <a href="{{ route('owner.galeria') }}" class="mq-side-item {{ request()->routeIs('owner.galeria') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left">
                            <i class="bi bi-images" aria-hidden="true"></i>
                            <span>Galeria</span>
                        </span>
                    </a>
                </nav>

                <div class="mq-side-spacer"></div>

                <form method="POST" action="{{ route('logout') }}" class="mq-dashboard-logout">
                    @csrf
                    <button type="submit">
                        <i class="bi bi-box-arrow-left" aria-hidden="true"></i>
                        <span>Cerrar sesion</span>
                    </button>
                </form>
            </aside>

            <main class="mq-dashboard-main">
                <header class="mq-topbar">
                    <div class="mq-topbar-right">
                        <button class="mq-topbar-icon" type="button" aria-label="Notificaciones">
                            <i class="bi bi-bell" aria-hidden="true"></i>
                            <span class="mq-topbar-dot" aria-hidden="true">2</span>
                        </button>
                        <div class="mq-topbar-user">
                            <div class="mq-topbar-user-avatar">{{ strtoupper(mb_substr($user->name, 0, 1)) }}</div>
                            <span class="mq-topbar-user-name">{{ Str::before($user->name, ' ') }}</span>
                            <i class="bi bi-chevron-down" aria-hidden="true"></i>
                        </div>
                    </div>
                </header>

                <section class="ch-page">
                    <div class="ch-head">
                        <h1 class="ch-title">Chat con Entrenador</h1>
                        <p class="ch-sub">Resuelve tus dudas directamente con el equipo</p>
                    </div>

                    <div class="ch-card">
                        <div class="ch-top">
                            <div class="ch-avatar">CM</div>
                            <div class="ch-trainer">
                                <div class="ch-trainer-name">Carlos Martinez</div>
                                <div class="ch-status">
                                    <span class="ch-dot" aria-hidden="true"></span>
                                    <span>En linea</span>
                                </div>
                            </div>
                        </div>

                        <div class="ch-body">
                            <div class="ch-messages" aria-label="Mensajes">
                                <div class="ch-msg">
                                    <div>Hola! Como estas? Te cuento que Max tuvo una excelente sesion hoy.</div>
                                    <div class="ch-msg-time">10:30 am</div>
                                </div>

                                <div class="ch-msg ch-msg--me">
                                    <div>Que bueno! Como le fue con los comandos nuevos?</div>
                                    <div class="ch-msg-time">10:35 am ✓</div>
                                </div>

                                <div class="ch-msg">
                                    <div>Muy bien! Ya domina el 'quieto' por 30 segundos. Recomiendo practicarlo en casa 10 minutos diarios.</div>
                                    <div class="ch-msg-time">10:38 am</div>
                                </div>

                                <div class="ch-msg">
                                    <div>Te envie algunas fotos de la sesion en la galeria.</div>
                                    <div class="ch-msg-time">10:40 am</div>
                                </div>
                            </div>

                            <form class="ch-inputbar" action="#" method="POST">
                                <input class="ch-input" type="text" placeholder="Escribe un mensaje..." aria-label="Escribe un mensaje">
                                <button class="ch-send" type="button" aria-label="Enviar">
                                    <i class="bi bi-send" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>

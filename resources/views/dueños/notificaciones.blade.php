<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Notificaciones</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=lilita-one:400" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/shared/mq-topbar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dueño/panel.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dueño/modulos.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dueño/notificaciones.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>

    <body>
        @include('partials.page-loader')
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
                    <a href="{{ route('owner.chat') }}" class="mq-side-item">
                        <span class="mq-side-left">
                            <i class="bi bi-chat-dots" aria-hidden="true"></i>
                            <span>Chat con Entrenador</span>
                        </span>
                    </a>
                    <a href="{{ route('owner.notificaciones') }}" class="mq-side-item {{ request()->routeIs('owner.notificaciones') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left">
                            <i class="bi bi-bell" aria-hidden="true"></i>
                            <span>Notificaciones</span>
                        </span>
                        <span class="mq-side-bubble">3</span>
                    </a>
                    <a href="{{ route('owner.galeria') }}" class="mq-side-item">
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
                @include('partials.mq-topbar', [
                    'user' => $user,
                    'roleLabel' => 'Propietario',
                    'profileUrl' => route('owner.perfil'),
                    'settingsUrl' => route('owner.perfil'),
                    'helpUrl' => route('owner.chat'),
                    'notificationsUrl' => route('owner.notificaciones'),
                    'notifCount' => 2,
                ])

                <section class="nt-page">
                    <div class="nt-head-row">
                        <div>
                            <h1 class="nt-title">Notificaciones</h1>
                            <p class="nt-sub">2 sin leer</p>
                        </div>
                        <a href="#" class="nt-mark-all">Marcar todas como leidas</a>
                    </div>

                    <div class="nt-filters" role="tablist">
                        <button class="nt-filter nt-filter--active">Todas</button>
                        <button class="nt-filter">No leidas</button>
                        <button class="nt-filter">Cita</button>
                        <button class="nt-filter">Reporte</button>
                        <button class="nt-filter">Pago</button>
                        <button class="nt-filter">Promocion</button>
                    </div>

                    <div class="nt-list">
                        <article class="nt-item nt-item--unread">
                            <div class="nt-ico-wrap nt-ico--blue">
                                <i class="bi bi-calendar-event" aria-hidden="true"></i>
                            </div>
                            <div class="nt-main">
                                <div class="nt-top-row">
                                    <h2 class="nt-item-title">Sesion manana</h2>
                                    <span class="nt-dot" aria-hidden="true"></span>
                                </div>
                                <p class="nt-desc">Recuerda la sesion de entrenamiento de Max manana a las 10:00 am</p>
                                <div class="nt-time">Hace 2 horas</div>
                            </div>
                        </article>

                        <article class="nt-item nt-item--unread">
                            <div class="nt-ico-wrap nt-ico--purple">
                                <i class="bi bi-paw" aria-hidden="true"></i>
                            </div>
                            <div class="nt-main">
                                <div class="nt-top-row">
                                    <h2 class="nt-item-title">Nuevo reporte disponible</h2>
                                    <span class="nt-dot" aria-hidden="true"></span>
                                </div>
                                <p class="nt-desc">El entrenador ha subido un nuevo reporte de progreso para Max</p>
                                <div class="nt-time">Hace 5 horas</div>
                            </div>
                        </article>

                        <article class="nt-item">
                            <div class="nt-ico-wrap nt-ico--green">
                                <i class="bi bi-check2-circle" aria-hidden="true"></i>
                            </div>
                            <div class="nt-main">
                                <div class="nt-top-row">
                                    <h2 class="nt-item-title">Pago recibido</h2>
                                </div>
                                <p class="nt-desc">Hemos recibido tu pago de $150.000 por el entrenamiento de Marzo</p>
                                <div class="nt-time">Hace 1 dia</div>
                            </div>
                        </article>

                        <article class="nt-item">
                            <div class="nt-ico-wrap nt-ico--pink">
                                <i class="bi bi-heart" aria-hidden="true"></i>
                            </div>
                            <div class="nt-main">
                                <div class="nt-top-row">
                                    <h2 class="nt-item-title">Promocion especial</h2>
                                </div>
                                <p class="nt-desc">20% de descuento en guarderia durante todo el mes de Marzo</p>
                                <div class="nt-time">Hace 3 dias</div>
                            </div>
                        </article>

                        <article class="nt-item">
                            <div class="nt-ico-wrap nt-ico--gray">
                                <i class="bi bi-bell" aria-hidden="true"></i>
                            </div>
                            <div class="nt-main">
                                <div class="nt-top-row">
                                    <h2 class="nt-item-title">Vacuna pendiente</h2>
                                </div>
                                <p class="nt-desc">Luna necesita su vacuna de refuerzo. Agenda una cita pronto.</p>
                                <div class="nt-time">Hace 5 dias</div>
                            </div>
                        </article>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>

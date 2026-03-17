<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mi Panel</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=lilita-one:400" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/dueño/dashboarddueño.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dueño/panel.css') }}">
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
                    <a href="{{ route('owner.pets') }}" class="mq-side-item {{ request()->routeIs('owner.pets') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left">
                            <i class="bi bi-paw" aria-hidden="true"></i>
                            <span>Mis Perros</span>
                        </span>
                        @if (request()->routeIs('owner.pets'))
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
                    <a href="#" class="mq-side-item">
                        <span class="mq-side-left">
                            <i class="bi bi-chat-dots" aria-hidden="true"></i>
                            <span>Chat con Entrenador</span>
                        </span>
                    </a>
                    <a href="#" class="mq-side-item">
                        <span class="mq-side-left">
                            <i class="bi bi-bell" aria-hidden="true"></i>
                            <span>Notificaciones</span>
                        </span>
                        <span class="mq-side-bubble">3</span>
                    </a>
                    <a href="#" class="mq-side-item">
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

                <section class="mq-kpis">
                    <div class="mq-kpi">
                        <div class="mq-kpi-ico"><i class="bi bi-paw" aria-hidden="true"></i></div>
                        <div class="mq-kpi-value">3</div>
                        <div class="mq-kpi-label">Mis Perros</div>
                    </div>
                    <div class="mq-kpi">
                        <div class="mq-kpi-ico"><i class="bi bi-calendar2-check" aria-hidden="true"></i></div>
                        <div class="mq-kpi-value">2</div>
                        <div class="mq-kpi-label">Reservas Activas</div>
                    </div>
                    <div class="mq-kpi">
                        <div class="mq-kpi-ico"><i class="bi bi-activity" aria-hidden="true"></i></div>
                        <div class="mq-kpi-value">5</div>
                        <div class="mq-kpi-label">Reportes</div>
                    </div>
                    <div class="mq-kpi">
                        <div class="mq-kpi-ico"><i class="bi bi-bell" aria-hidden="true"></i></div>
                        <div class="mq-kpi-value">2</div>
                        <div class="mq-kpi-label">Notificaciones</div>
                    </div>
                </section>

                <section class="mq-panels">
                    <article class="mq-panel">
                        <header class="mq-panel-head">
                            <h2 class="mq-panel-title">Proximas Reservas</h2>
                            <a href="#" class="mq-panel-link">Ver todas <i class="bi bi-chevron-right" aria-hidden="true"></i></a>
                        </header>

                        <div class="mq-panel-list">
                            <div class="mq-row">
                                <div class="mq-row-ico"><i class="bi bi-calendar2-week" aria-hidden="true"></i></div>
                                <div class="mq-row-body">
                                    <div class="mq-row-title">Entrenamiento Basico</div>
                                    <div class="mq-row-sub">Max - 12 Mar</div>
                                </div>
                                <span class="mq-pill mq-pill--ok">Confirmada</span>
                            </div>
                            <div class="mq-row">
                                <div class="mq-row-ico"><i class="bi bi-calendar2-week" aria-hidden="true"></i></div>
                                <div class="mq-row-body">
                                    <div class="mq-row-title">Hotel Canino</div>
                                    <div class="mq-row-sub">Luna - 15-20 Mar</div>
                                </div>
                                <span class="mq-pill mq-pill--warn">Pendiente</span>
                            </div>
                            <div class="mq-row">
                                <div class="mq-row-ico"><i class="bi bi-calendar2-week" aria-hidden="true"></i></div>
                                <div class="mq-row-body">
                                    <div class="mq-row-title">Guarderia</div>
                                    <div class="mq-row-sub">Rocky - 18 Mar</div>
                                </div>
                                <span class="mq-pill mq-pill--ok">Confirmada</span>
                            </div>
                        </div>
                    </article>

                    <article class="mq-panel">
                        <header class="mq-panel-head">
                            <h2 class="mq-panel-title">Notificaciones</h2>
                            <a href="#" class="mq-panel-link">Ver todas <i class="bi bi-chevron-right" aria-hidden="true"></i></a>
                        </header>

                        <div class="mq-panel-list">
                            <div class="mq-note mq-note--blue">
                                <div class="mq-note-dot"></div>
                                <div class="mq-note-body">
                                    <div class="mq-note-title">Sesion manana</div>
                                    <div class="mq-note-sub">Recuerda la sesion de entrenamiento de Max manana a las 10:00 am</div>
                                </div>
                            </div>
                            <div class="mq-note mq-note--blue">
                                <div class="mq-note-dot"></div>
                                <div class="mq-note-body">
                                    <div class="mq-note-title">Nuevo reporte disponible</div>
                                    <div class="mq-note-sub">El entrenador ha subido un nuevo reporte de progreso</div>
                                </div>
                            </div>
                            <div class="mq-note">
                                <div class="mq-note-body">
                                    <div class="mq-note-title">Promocion especial</div>
                                    <div class="mq-note-sub">20% de descuento en guarderia este mes</div>
                                </div>
                            </div>
                        </div>
                    </article>
                </section>

                <section class="mq-activity">
                    <header class="mq-panel-head mq-panel-head--wide">
                        <h2 class="mq-panel-title">Ultimas Actividades</h2>
                        <button class="mq-star" type="button" aria-label="Favorito">
                            <i class="bi bi-star" aria-hidden="true"></i>
                        </button>
                    </header>

                    <div class="mq-activity-list">
                        <div class="mq-act">
                            <div class="mq-act-ico mq-act-ico--pink"><i class="bi bi-file-earmark-text" aria-hidden="true"></i></div>
                            <div class="mq-act-body">
                                <div class="mq-act-title">Nuevo reporte de entrenamiento - Max</div>
                                <div class="mq-act-sub">Hace 2 horas</div>
                            </div>
                        </div>
                        <div class="mq-act">
                            <div class="mq-act-ico"><i class="bi bi-calendar2-check" aria-hidden="true"></i></div>
                            <div class="mq-act-body">
                                <div class="mq-act-title">Reserva confirmada - Hotel Canino</div>
                                <div class="mq-act-sub">Hace 1 dia</div>
                            </div>
                        </div>
                        <div class="mq-act">
                            <div class="mq-act-ico mq-act-ico--green"><i class="bi bi-cash" aria-hidden="true"></i></div>
                            <div class="mq-act-body">
                                <div class="mq-act-title">Pago recibido - Entrenamiento</div>
                                <div class="mq-act-sub">Hace 3 dias</div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="mq-helpbar" aria-label="Necesitas ayuda">
                    <div class="mq-helpbar-title">Necesitas ayuda?</div>
                    <div class="mq-helpbar-items">
                        <div class="mq-helpbar-item"><i class="bi bi-telephone" aria-hidden="true"></i><span>+57 300 123 4567</span></div>
                        <div class="mq-helpbar-item"><i class="bi bi-geo-alt" aria-hidden="true"></i><span>La Calera, Colombia</span></div>
                        <div class="mq-helpbar-item"><i class="bi bi-clock" aria-hidden="true"></i><span>Lun - Sab: 8am - 6pm</span></div>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>

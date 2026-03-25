<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reservas</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=lilita-one:400" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/shared/mq-topbar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dueño/reservas.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dueño/panel.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="{{ asset('css/Admin/admin-sidebar-extras.css') }}?v={{ time() }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>

    <body class="mq-dashboard-page">
        @include('partials.page-loader')
        @php
            use Illuminate\Support\Str;
        @endphp

        <div class="mq-dashboard">
            @include("partials.dueno-sidebar")

            <main class="mq-dashboard-main">
                @include('partials.mq-topbar', ['user' => Auth::user(), 'user' => Auth::user(), 
                    'user' => $user,
                    'roleLabel' => 'Propietario',
                    'profileUrl' => route('owner.perfil'),
                    'settingsUrl' => route('owner.perfil'),
                    'helpUrl' => route('owner.chat'),
                    'notificationsUrl' => route('owner.notificaciones'),
                    'notifCount' => 2,
                ])

                <div class="mq-dashboard-content">
                    <section class="rs-page">
                    <div class="rs-head">
                        <h1 class="rs-title">Mis Reservas</h1>
                        <p class="rs-sub">Gestiona tus servicios contratados</p>

                        <div class="rs-stats">
                            <div class="rs-stat">
                                <div class="rs-stat-label">Reservas Activas</div>
                                <div class="rs-stat-value">3</div>
                            </div>
                            <div class="rs-stat">
                                <div class="rs-stat-label">Confirmadas</div>
                                <div class="rs-stat-value rs-stat-value--green">1</div>
                            </div>
                            <div class="rs-stat">
                                <div class="rs-stat-label">Pendientes</div>
                                <div class="rs-stat-value rs-stat-value--amber">1</div>
                            </div>
                            <div class="rs-stat">
                                <div class="rs-stat-label">Completadas</div>
                                <div class="rs-stat-value">2</div>
                            </div>
                        </div>

                        <div class="rs-tabs" role="tablist" aria-label="Reservas">
                            <button class="rs-tab rs-tab--active" type="button" role="tab" aria-selected="true">Reservas Activas (3)</button>
                            <button class="rs-tab" type="button" role="tab" aria-selected="false">Historial (3)</button>
                        </div>
                    </div>

                    <div class="rs-controls">
                        <div class="rs-search">
                            <i class="bi bi-search" aria-hidden="true"></i>
                            <input type="text" placeholder="Buscar por servicio o mascota..." aria-label="Buscar">
                        </div>

                        <div class="rs-filter">
                            <i class="bi bi-funnel" aria-hidden="true"></i>
                            <select aria-label="Filtrar estados">
                                <option value="">Todos los estados</option>
                                <option value="activa">Activa</option>
                                <option value="confirmada">Confirmada</option>
                                <option value="pendiente">Pendiente</option>
                                <option value="completada">Completada</option>
                            </select>
                        </div>
                    </div>

                    <div class="rs-list" aria-label="Lista de reservas">
                        <article class="rs-item" data-rs-item>
                            <div class="rs-item-head">
                                <div class="rs-item-left">
                                    <div class="rs-avatar" aria-hidden="true">M</div>
                                    <div class="rs-main">
                                        <div class="rs-row-top">
                                            <div class="rs-service">Entrenamiento Basico</div>
                                            <span class="rs-pill rs-pill--active">Activa</span>
                                        </div>
                                        <div class="rs-meta">
                                            <span><i class="bi bi-person" aria-hidden="true"></i>Max</span>
                                            <span><i class="bi bi-calendar" aria-hidden="true"></i>2026-03-12</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="rs-item-right">
                                    <div class="rs-price">
                                        <div class="rs-price-amount">$150.000</div>
                                        <div class="rs-price-sub">10:00 am</div>
                                    </div>
                                    <button class="rs-chevron" type="button" data-rs-toggle aria-expanded="false" aria-label="Ver detalle">
                                        <i class="bi bi-chevron-down" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="rs-details" hidden>
                                <div class="rs-detail-grid">
                                    <div class="rs-detail-card">
                                        <div class="rs-detail-label">Fecha Inicio</div>
                                        <div class="rs-detail-value">2026-03-12</div>
                                    </div>
                                    <div class="rs-detail-card">
                                        <div class="rs-detail-label">Horario</div>
                                        <div class="rs-detail-value">10:00 am</div>
                                    </div>
                                    <div class="rs-detail-card">
                                        <div class="rs-detail-label">Total</div>
                                        <div class="rs-detail-value rs-detail-value--green">$150.000</div>
                                    </div>
                                </div>

                                <div class="rs-notes">Notas: Sesion de obediencia basica</div>

                                <div class="rs-actions">
                                    <button class="rs-action rs-action--primary" type="button">
                                        <i class="bi bi-pencil" aria-hidden="true"></i>
                                        <span>Modificar</span>
                                    </button>
                                    <button class="rs-action rs-action--danger" type="button">
                                        <i class="bi bi-trash" aria-hidden="true"></i>
                                        <span>Cancelar</span>
                                    </button>
                                </div>
                            </div>
                        </article>

                        <article class="rs-item" data-rs-item>
                            <div class="rs-item-head">
                                <div class="rs-item-left">
                                    <div class="rs-avatar" aria-hidden="true">L</div>
                                    <div class="rs-main">
                                        <div class="rs-row-top">
                                            <div class="rs-service">Hotel Canino</div>
                                            <span class="rs-pill rs-pill--confirmed">Confirmada</span>
                                        </div>
                                        <div class="rs-meta">
                                            <span><i class="bi bi-person" aria-hidden="true"></i>Luna</span>
                                            <span><i class="bi bi-calendar" aria-hidden="true"></i>2026-03-15 - 2026-03-20</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="rs-item-right">
                                    <div class="rs-price">
                                        <div class="rs-price-amount">$300.000</div>
                                        <div class="rs-price-sub">Check-in 9:00 am</div>
                                    </div>
                                    <button class="rs-chevron" type="button" data-rs-toggle aria-expanded="false" aria-label="Ver detalle">
                                        <i class="bi bi-chevron-down" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="rs-details" hidden>
                                <div class="rs-detail-grid">
                                    <div class="rs-detail-card">
                                        <div class="rs-detail-label">Fecha Inicio</div>
                                        <div class="rs-detail-value">2026-03-15</div>
                                    </div>
                                    <div class="rs-detail-card">
                                        <div class="rs-detail-label">Horario</div>
                                        <div class="rs-detail-value">9:00 am</div>
                                    </div>
                                    <div class="rs-detail-card">
                                        <div class="rs-detail-label">Total</div>
                                        <div class="rs-detail-value rs-detail-value--green">$300.000</div>
                                    </div>
                                </div>

                                <div class="rs-notes">Notas: Check-in en recepcion</div>

                                <div class="rs-actions">
                                    <button class="rs-action rs-action--primary" type="button">
                                        <i class="bi bi-pencil" aria-hidden="true"></i>
                                        <span>Modificar</span>
                                    </button>
                                    <button class="rs-action rs-action--danger" type="button">
                                        <i class="bi bi-trash" aria-hidden="true"></i>
                                        <span>Cancelar</span>
                                    </button>
                                </div>
                            </div>
                        </article>

                        <article class="rs-item" data-rs-item>
                            <div class="rs-item-head">
                                <div class="rs-item-left">
                                    <div class="rs-avatar" aria-hidden="true">R</div>
                                    <div class="rs-main">
                                        <div class="rs-row-top">
                                            <div class="rs-service">Guarderia</div>
                                            <span class="rs-pill rs-pill--pending">Pendiente</span>
                                        </div>
                                        <div class="rs-meta">
                                            <span><i class="bi bi-person" aria-hidden="true"></i>Rocky</span>
                                            <span><i class="bi bi-calendar" aria-hidden="true"></i>2026-03-18</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="rs-item-right">
                                    <div class="rs-price">
                                        <div class="rs-price-amount">$50.000</div>
                                        <div class="rs-price-sub">8:00 am - 6:00 pm</div>
                                    </div>
                                    <button class="rs-chevron" type="button" data-rs-toggle aria-expanded="false" aria-label="Ver detalle">
                                        <i class="bi bi-chevron-down" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="rs-details" hidden>
                                <div class="rs-detail-grid">
                                    <div class="rs-detail-card">
                                        <div class="rs-detail-label">Fecha Inicio</div>
                                        <div class="rs-detail-value">2026-03-18</div>
                                    </div>
                                    <div class="rs-detail-card">
                                        <div class="rs-detail-label">Horario</div>
                                        <div class="rs-detail-value">8:00 am - 6:00 pm</div>
                                    </div>
                                    <div class="rs-detail-card">
                                        <div class="rs-detail-label">Total</div>
                                        <div class="rs-detail-value rs-detail-value--green">$50.000</div>
                                    </div>
                                </div>

                                <div class="rs-notes">Notas: Servicio por confirmar</div>

                                <div class="rs-actions">
                                    <button class="rs-action rs-action--primary" type="button">
                                        <i class="bi bi-pencil" aria-hidden="true"></i>
                                        <span>Modificar</span>
                                    </button>
                                    <button class="rs-action rs-action--danger" type="button">
                                        <i class="bi bi-trash" aria-hidden="true"></i>
                                        <span>Cancelar</span>
                                    </button>
                                </div>
                            </div>
                        </article>
                    </div>
                </section>
                </div>
            </main>
        </div>
        <script>
            (() => {
                const items = Array.from(document.querySelectorAll('[data-rs-item]'));
                const closeItem = (item) => {
                    const details = item.querySelector('.rs-details');
                    const btn = item.querySelector('[data-rs-toggle]');
                    if (!details || !btn) return;
                    details.hidden = true;
                    btn.setAttribute('aria-expanded', 'false');
                    item.classList.remove('rs-item--open');
                };

                const openItem = (item) => {
                    const details = item.querySelector('.rs-details');
                    const btn = item.querySelector('[data-rs-toggle]');
                    if (!details || !btn) return;
                    details.hidden = false;
                    btn.setAttribute('aria-expanded', 'true');
                    item.classList.add('rs-item--open');
                };

                items.forEach((item) => {
                    const btn = item.querySelector('[data-rs-toggle]');
                    if (!btn) return;

                    btn.addEventListener('click', () => {
                        const isOpen = item.classList.contains('rs-item--open');
                        items.forEach((it) => closeItem(it));
                        if (!isOpen) openItem(item);
                    });
                });
            })();
        </script>
    </body>
</html>

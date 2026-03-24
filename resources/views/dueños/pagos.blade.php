<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pagos</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=lilita-one:400" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/shared/mq-topbar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dueño/panel.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dueño/modulos.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dueño/pagos.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="{{ asset('css/Admin/admin-sidebar-extras.css') }}?v={{ time() }}">
    </head>

    <body>
        @include('partials.page-loader')
        @php
            use Illuminate\Support\Str;
        @endphp

        <div class="mq-dashboard">
            @include("partials.dueno-sidebar")
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
                    <a href="{{ route('owner.chat') }}" class="mq-side-item">
                        <span class="mq-side-left">
                            <i class="bi bi-chat-dots" aria-hidden="true"></i>
                            <span>Chat con Entrenador</span>
                        </span>
                    </a>
                    <a href="{{ route('owner.notificaciones') }}" class="mq-side-item">
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
                @include('partials.mq-topbar', ['user' => Auth::user(), 'user' => Auth::user(), 
                    'user' => $user,
                    'roleLabel' => 'Propietario',
                    'profileUrl' => route('owner.perfil'),
                    'settingsUrl' => route('owner.perfil'),
                    'helpUrl' => route('owner.chat'),
                    'notificationsUrl' => route('owner.notificaciones'),
                    'notifCount' => 2,
                ])

                <section class="pg-page">
                    <div class="pg-head">
                        <h1 class="pg-title">Pagos</h1>
                        <p class="pg-sub">Gestiona tus facturas y pagos de servicios</p>

                        <div class="pg-stats">
                            <div class="pg-stat pg-stat--yellow">
                                <div class="pg-stat-label">Pendiente por Pagar</div>
                                <div class="pg-stat-value">$450,000</div>
                                <div class="pg-stat-sub">2 facturas pendientes</div>
                                <div class="pg-stat-icon" aria-hidden="true"><i class="bi bi-clock"></i></div>
                            </div>

                            <div class="pg-stat pg-stat--green">
                                <div class="pg-stat-label">Total Pagado (2026)</div>
                                <div class="pg-stat-value">$330,000</div>
                                <div class="pg-stat-sub">3 facturas pagadas</div>
                                <div class="pg-stat-icon" aria-hidden="true"><i class="bi bi-check-lg"></i></div>
                            </div>

                            <div class="pg-stat pg-stat--blue">
                                <div class="pg-stat-label">Ultimo Pago</div>
                                <div class="pg-stat-value">$150.000</div>
                                <div class="pg-stat-sub">2026-02-20</div>
                                <div class="pg-stat-icon" aria-hidden="true"><i class="bi bi-receipt"></i></div>
                            </div>
                        </div>

                        <div class="pg-tabs" role="tablist" aria-label="Pagos">
                            <button class="pg-tab pg-tab--active" type="button" role="tab" aria-selected="true">Facturas</button>
                            <button class="pg-tab" type="button" role="tab" aria-selected="false">Pagos Realizados</button>
                        </div>
                    </div>

                    <div class="pg-controls">
                        <div class="pg-filter">
                            <i class="bi bi-funnel" aria-hidden="true"></i>
                            <select aria-label="Filtrar facturas">
                                <option value="">Todas las facturas</option>
                                <option value="pendiente">Pendientes</option>
                                <option value="pagada">Pagadas</option>
                            </select>
                        </div>
                    </div>

                    <div class="pg-list" aria-label="Lista de facturas">
                        <article class="pg-item" data-pg-item>
                            <div class="pg-item-left" data-pg-toggle>
                                <div class="pg-doc" aria-hidden="true"><i class="bi bi-file-earmark-text"></i></div>
                                <div class="pg-main">
                                    <div class="pg-row-top">
                                        <div class="pg-code" data-pg-code>FAC-2026-001</div>
                                        <span class="pg-pill pg-pill--pending">Pendiente</span>
                                    </div>
                                    <div class="pg-desc">Entrenamiento Basico - Marzo - Max</div>
                                </div>
                            </div>
                            <div class="pg-item-right">
                                <div class="pg-price">
                                    <div class="pg-price-amount" data-pg-amount="$150.000">$150.000</div>
                                    <div class="pg-price-sub">Vence: 2026-03-15</div>
                                </div>
                                <button class="pg-chevron pg-chevron-btn" type="button" data-pg-btn aria-expanded="false" aria-label="Ver detalle">
                                    <i class="bi bi-chevron-down" aria-hidden="true"></i>
                                </button>
                            </div>

                            <div class="pg-details" hidden>
                                <div class="pg-detail-cards">
                                    <div class="pg-detail-card">
                                        <div class="pg-detail-label">Fecha Emision</div>
                                        <div class="pg-detail-value">2026-03-01</div>
                                    </div>
                                    <div class="pg-detail-card">
                                        <div class="pg-detail-label">Vencimiento</div>
                                        <div class="pg-detail-value">2026-03-15</div>
                                    </div>
                                </div>
                                <div class="pg-actions">
                                    <a class="pg-action" href="#">
                                        <i class="bi bi-eye" aria-hidden="true"></i>
                                        <span>Ver Factura</span>
                                    </a>
                                    <a class="pg-action" href="#">
                                        <i class="bi bi-download" aria-hidden="true"></i>
                                        <span>Descargar PDF</span>
                                    </a>
                                    <button class="pg-action pg-action--pay" type="button" data-pg-pay>
                                        <i class="bi bi-credit-card" aria-hidden="true"></i>
                                        <span>Pagar Ahora</span>
                                    </button>
                                </div>
                            </div>
                        </article>

                        <article class="pg-item" data-pg-item>
                            <div class="pg-item-left" data-pg-toggle>
                                <div class="pg-doc" aria-hidden="true"><i class="bi bi-file-earmark-text"></i></div>
                                <div class="pg-main">
                                    <div class="pg-row-top">
                                        <div class="pg-code" data-pg-code>FAC-2026-002</div>
                                        <span class="pg-pill pg-pill--pending">Pendiente</span>
                                    </div>
                                    <div class="pg-desc">Hotel Canino (5 noches) - Luna</div>
                                </div>
                            </div>
                            <div class="pg-item-right">
                                <div class="pg-price">
                                    <div class="pg-price-amount" data-pg-amount="$300.000">$300.000</div>
                                    <div class="pg-price-sub">Vence: 2026-03-25</div>
                                </div>
                                <button class="pg-chevron pg-chevron-btn" type="button" data-pg-btn aria-expanded="false" aria-label="Ver detalle">
                                    <i class="bi bi-chevron-down" aria-hidden="true"></i>
                                </button>
                            </div>

                            <div class="pg-details" hidden>
                                <div class="pg-detail-cards">
                                    <div class="pg-detail-card">
                                        <div class="pg-detail-label">Fecha Emision</div>
                                        <div class="pg-detail-value">2026-03-10</div>
                                    </div>
                                    <div class="pg-detail-card">
                                        <div class="pg-detail-label">Vencimiento</div>
                                        <div class="pg-detail-value">2026-03-25</div>
                                    </div>
                                </div>
                                <div class="pg-actions">
                                    <a class="pg-action" href="#">
                                        <i class="bi bi-eye" aria-hidden="true"></i>
                                        <span>Ver Factura</span>
                                    </a>
                                    <a class="pg-action" href="#">
                                        <i class="bi bi-download" aria-hidden="true"></i>
                                        <span>Descargar PDF</span>
                                    </a>
                                    <button class="pg-action pg-action--pay" type="button" data-pg-pay>
                                        <i class="bi bi-credit-card" aria-hidden="true"></i>
                                        <span>Pagar Ahora</span>
                                    </button>
                                </div>
                            </div>
                        </article>

                        <article class="pg-item" data-pg-item>
                            <div class="pg-item-left" data-pg-toggle>
                                <div class="pg-doc" aria-hidden="true"><i class="bi bi-file-earmark-text"></i></div>
                                <div class="pg-main">
                                    <div class="pg-row-top">
                                        <div class="pg-code" data-pg-code>FAC-2026-003</div>
                                        <span class="pg-pill pg-pill--paid">Pagada</span>
                                    </div>
                                    <div class="pg-desc">Entrenamiento Basico - Febrero - Max</div>
                                </div>
                            </div>
                            <div class="pg-item-right">
                                <div class="pg-price">
                                    <div class="pg-price-amount" data-pg-amount="$150.000">$150.000</div>
                                    <div class="pg-price-sub">Vence: 2026-02-28</div>
                                </div>
                                <button class="pg-chevron pg-chevron-btn" type="button" data-pg-btn aria-expanded="false" aria-label="Ver detalle">
                                    <i class="bi bi-chevron-down" aria-hidden="true"></i>
                                </button>
                            </div>

                            <div class="pg-details" hidden>
                                <div class="pg-detail-cards">
                                    <div class="pg-detail-card">
                                        <div class="pg-detail-label">Fecha Emision</div>
                                        <div class="pg-detail-value">2026-02-10</div>
                                    </div>
                                    <div class="pg-detail-card">
                                        <div class="pg-detail-label">Vencimiento</div>
                                        <div class="pg-detail-value">2026-02-28</div>
                                    </div>
                                </div>
                                <div class="pg-actions">
                                    <a class="pg-action" href="#">
                                        <i class="bi bi-eye" aria-hidden="true"></i>
                                        <span>Ver Factura</span>
                                    </a>
                                    <a class="pg-action" href="#">
                                        <i class="bi bi-download" aria-hidden="true"></i>
                                        <span>Descargar PDF</span>
                                    </a>
                                    <button class="pg-action pg-action--pay" type="button" data-pg-pay>
                                        <i class="bi bi-credit-card" aria-hidden="true"></i>
                                        <span>Pagar Ahora</span>
                                    </button>
                                </div>
                            </div>
                        </article>

                        <article class="pg-item" data-pg-item>
                            <div class="pg-item-left" data-pg-toggle>
                                <div class="pg-doc" aria-hidden="true"><i class="bi bi-file-earmark-text"></i></div>
                                <div class="pg-main">
                                    <div class="pg-row-top">
                                        <div class="pg-code" data-pg-code>FAC-2026-004</div>
                                        <span class="pg-pill pg-pill--paid">Pagada</span>
                                    </div>
                                    <div class="pg-desc">Guarderia (2 dias) - Rocky</div>
                                </div>
                            </div>
                            <div class="pg-item-right">
                                <div class="pg-price">
                                    <div class="pg-price-amount" data-pg-amount="$100.000">$100.000</div>
                                    <div class="pg-price-sub">Vence: 2026-02-15</div>
                                </div>
                                <button class="pg-chevron pg-chevron-btn" type="button" data-pg-btn aria-expanded="false" aria-label="Ver detalle">
                                    <i class="bi bi-chevron-down" aria-hidden="true"></i>
                                </button>
                            </div>

                            <div class="pg-details" hidden>
                                <div class="pg-detail-cards">
                                    <div class="pg-detail-card">
                                        <div class="pg-detail-label">Fecha Emision</div>
                                        <div class="pg-detail-value">2026-02-01</div>
                                    </div>
                                    <div class="pg-detail-card">
                                        <div class="pg-detail-label">Vencimiento</div>
                                        <div class="pg-detail-value">2026-02-15</div>
                                    </div>
                                </div>
                                <div class="pg-actions">
                                    <a class="pg-action" href="#">
                                        <i class="bi bi-eye" aria-hidden="true"></i>
                                        <span>Ver Factura</span>
                                    </a>
                                    <a class="pg-action" href="#">
                                        <i class="bi bi-download" aria-hidden="true"></i>
                                        <span>Descargar PDF</span>
                                    </a>
                                    <button class="pg-action pg-action--pay" type="button" data-pg-pay>
                                        <i class="bi bi-credit-card" aria-hidden="true"></i>
                                        <span>Pagar Ahora</span>
                                    </button>
                                </div>
                            </div>
                        </article>

                        <article class="pg-item" data-pg-item>
                            <div class="pg-item-left" data-pg-toggle>
                                <div class="pg-doc" aria-hidden="true"><i class="bi bi-file-earmark-text"></i></div>
                                <div class="pg-main">
                                    <div class="pg-row-top">
                                        <div class="pg-code" data-pg-code>FAC-2026-005</div>
                                        <span class="pg-pill pg-pill--paid">Pagada</span>
                                    </div>
                                    <div class="pg-desc">Dia de Diversion - Max</div>
                                </div>
                            </div>
                            <div class="pg-item-right">
                                <div class="pg-price">
                                    <div class="pg-price-amount" data-pg-amount="$80.000">$80.000</div>
                                    <div class="pg-price-sub">Vence: 2026-01-30</div>
                                </div>
                                <button class="pg-chevron pg-chevron-btn" type="button" data-pg-btn aria-expanded="false" aria-label="Ver detalle">
                                    <i class="bi bi-chevron-down" aria-hidden="true"></i>
                                </button>
                            </div>

                            <div class="pg-details" hidden>
                                <div class="pg-detail-cards">
                                    <div class="pg-detail-card">
                                        <div class="pg-detail-label">Fecha Emision</div>
                                        <div class="pg-detail-value">2026-01-20</div>
                                    </div>
                                    <div class="pg-detail-card">
                                        <div class="pg-detail-label">Vencimiento</div>
                                        <div class="pg-detail-value">2026-01-30</div>
                                    </div>
                                </div>
                                <div class="pg-actions">
                                    <a class="pg-action" href="#">
                                        <i class="bi bi-eye" aria-hidden="true"></i>
                                        <span>Ver Factura</span>
                                    </a>
                                    <a class="pg-action" href="#">
                                        <i class="bi bi-download" aria-hidden="true"></i>
                                        <span>Descargar PDF</span>
                                    </a>
                                    <button class="pg-action pg-action--pay" type="button" data-pg-pay>
                                        <i class="bi bi-credit-card" aria-hidden="true"></i>
                                        <span>Pagar Ahora</span>
                                    </button>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="pg-modal" id="pgPayModal" aria-hidden="true">
                        <div class="pg-modal-backdrop" data-pg-modal-close></div>
                        <div class="pg-modal-card" role="dialog" aria-modal="true" aria-label="Realizar Pago">
                            <div class="pg-modal-head">
                                <h2 class="pg-modal-title">Realizar Pago</h2>
                                <div class="pg-modal-sub" data-pg-modal-code>FAC-2026-001</div>
                            </div>
                            <div class="pg-modal-divider" aria-hidden="true"></div>
                            <div class="pg-modal-body">
                                <div class="pg-total">
                                    <div class="pg-total-label">Total a Pagar</div>
                                    <div class="pg-total-value" data-pg-modal-total>$150.000</div>
                                </div>

                                <div class="pg-modal-section">Metodo de Pago</div>

                                <div class="pg-pay-methods">
                                    <label class="pg-radio">
                                        <input type="radio" name="pgMethod" value="credito">
                                        <span>Tarjeta de credito</span>
                                    </label>
                                    <label class="pg-radio">
                                        <input type="radio" name="pgMethod" value="debito">
                                        <span>Tarjeta debito</span>
                                    </label>
                                    <label class="pg-radio">
                                        <input type="radio" name="pgMethod" value="pse">
                                        <span>PSE</span>
                                    </label>
                                    <label class="pg-radio">
                                        <input type="radio" name="pgMethod" value="efectivo">
                                        <span>Efectivo</span>
                                    </label>
                                </div>

                                <div class="pg-modal-actions">
                                    <button class="pg-btn" type="button" data-pg-modal-close>Cancelar</button>
                                    <button class="pg-btn pg-btn--primary" type="button" data-pg-confirm disabled>Confirmar Pago</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>

        <script>
            (() => {
                const items = Array.from(document.querySelectorAll('[data-pg-item]'));
                const modal = document.getElementById('pgPayModal');
                const modalCode = modal ? modal.querySelector('[data-pg-modal-code]') : null;
                const modalTotal = modal ? modal.querySelector('[data-pg-modal-total]') : null;
                const confirmBtn = modal ? modal.querySelector('[data-pg-confirm]') : null;

                const closeItem = (item) => {
                    const details = item.querySelector('.pg-details');
                    const btn = item.querySelector('[data-pg-btn]');
                    if (details) details.hidden = true;
                    if (btn) btn.setAttribute('aria-expanded', 'false');
                    item.classList.remove('pg-item--open');
                };

                const openItem = (item) => {
                    const details = item.querySelector('.pg-details');
                    const btn = item.querySelector('[data-pg-btn]');
                    if (details) details.hidden = false;
                    if (btn) btn.setAttribute('aria-expanded', 'true');
                    item.classList.add('pg-item--open');
                };

                const toggleItem = (item) => {
                    const isOpen = item.classList.contains('pg-item--open');
                    items.forEach((it) => closeItem(it));
                    if (!isOpen) openItem(item);
                };

                items.forEach((item) => {
                    const btn = item.querySelector('[data-pg-btn]');

                    if (btn) {
                        btn.addEventListener('click', (e) => {
                            e.stopPropagation();
                            toggleItem(item);
                        });
                    }

                    const payBtn = item.querySelector('[data-pg-pay]');
                    if (payBtn) {
                        payBtn.addEventListener('click', (e) => {
                            e.preventDefault();
                            e.stopPropagation();
                            if (!modal) return;
                            const code = item.querySelector('[data-pg-code]')?.textContent?.trim() || '';
                            const amount = item.querySelector('[data-pg-amount]')?.getAttribute('data-pg-amount') || '';
                            if (modalCode) modalCode.textContent = code;
                            if (modalTotal) modalTotal.textContent = amount;

                            const radios = Array.from(modal.querySelectorAll('input[name="pgMethod"]'));
                            radios.forEach((r) => (r.checked = false));
                            if (confirmBtn) confirmBtn.disabled = true;

                            document.body.classList.add('pg-lock');
                            modal.classList.add('pg-modal--open');
                            modal.setAttribute('aria-hidden', 'false');
                        });
                    }
                });

                const closeModal = () => {
                    if (!modal) return;
                    modal.classList.remove('pg-modal--open');
                    modal.setAttribute('aria-hidden', 'true');
                    document.body.classList.remove('pg-lock');
                };

                if (modal) {
                    modal.addEventListener('click', (e) => {
                        const closeEl = e.target.closest('[data-pg-modal-close]');
                        if (closeEl) closeModal();
                    });

                    const radios = Array.from(modal.querySelectorAll('input[name="pgMethod"]'));
                    radios.forEach((r) => {
                        r.addEventListener('change', () => {
                            if (confirmBtn) confirmBtn.disabled = false;
                        });
                    });
                }

                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape') closeModal();
                });
            })();
        </script>
    </body>
</html>

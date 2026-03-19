<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Nuestros Servicios</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=lilita-one:400" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/shared/mq-topbar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dueño/servicios.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dueño/panel.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>

    <body>
        @include('partials.page-loader')
        @php
            use Illuminate\Support\Str;

            $catMeta = function (string $cat): array {
                $c = mb_strtolower(trim($cat));

                if (str_contains($c, 'entren')) {
                    return ['key' => 'purple', 'label' => 'ENTRENAMIENTO CANINO', 'icon' => 'bi-mortarboard'];
                }

                if (str_contains($c, 'cuidado') || str_contains($c, 'aloj')) {
                    return ['key' => 'blue', 'label' => 'CUIDADO Y ALOJAMIENTO', 'icon' => 'bi-house-door'];
                }

                if (str_contains($c, 'otra') || str_contains($c, 'activ')) {
                    return ['key' => 'yellow', 'label' => 'OTRAS ACTIVIDADES', 'icon' => 'bi-stars'];
                }

                return ['key' => 'slate', 'label' => Str::upper($cat), 'icon' => 'bi-shield'];
            };

            $formatPrice = function ($value, string $name): string {
                if ($value === null || $value === '' || (string) $value === '0') {
                    return 'Consultar';
                }

                $num = (float) $value;
                $formatted = '$ ' . number_format($num, 0, ',', '.');

                $lower = mb_strtolower($name);
                if (str_contains($lower, 'hotel')) {
                    return $formatted . '/noche';
                }

                if (str_contains($lower, 'guarder')) {
                    return $formatted . '/dia';
                }

                return $formatted;
            };
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
                    </a>
                    <a href="{{ route('owner.pets') }}" class="mq-side-item {{ request()->routeIs('owner.pets') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left">
                            <i class="bi bi-paw" aria-hidden="true"></i>
                            <span>Mis Perros</span>
                        </span>
                    </a>
                    <a href="{{ route('owner.services') }}" class="mq-side-item {{ request()->routeIs('owner.services') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left">
                            <i class="bi bi-bag" aria-hidden="true"></i>
                            <span>Servicios</span>
                        </span>
                        <span class="mq-side-active-dot" aria-hidden="true"></span>
                    </a>
                    <a href="{{ route('owner.reservas') }}" class="mq-side-item {{ request()->routeIs('owner.reservas') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left">
                            <i class="bi bi-calendar-check" aria-hidden="true"></i>
                            <span>Reservas</span>
                        </span>
                    </a>
                    <a href="{{ route('owner.seguimiento') }}" class="mq-side-item {{ request()->routeIs('owner.seguimiento') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left">
                            <i class="bi bi-graph-up" aria-hidden="true"></i>
                            <span>Seguimiento</span>
                        </span>
                    </a>
                    <a href="{{ route('owner.pagos') }}" class="mq-side-item {{ request()->routeIs('owner.pagos') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left">
                            <i class="bi bi-cash-coin" aria-hidden="true"></i>
                            <span>Pagos</span>
                        </span>
                    </a>
                    <a href="{{ route('owner.planpadrino') }}" class="mq-side-item {{ request()->routeIs('owner.planpadrino') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left">
                            <i class="bi bi-heart" aria-hidden="true"></i>
                            <span>Plan Padrino</span>
                        </span>
                    </a>
                    <a href="{{ route('owner.perfil') }}" class="mq-side-item {{ request()->routeIs('owner.perfil') ? 'mq-side-item--active' : '' }}">
                        <span class="mq-side-left">
                            <i class="bi bi-person" aria-hidden="true"></i>
                            <span>Mi Perfil</span>
                        </span>
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
                @include('partials.mq-topbar', [
                    'user' => $user,
                    'roleLabel' => 'Propietario',
                    'profileUrl' => route('owner.perfil'),
                    'settingsUrl' => route('owner.perfil'),
                    'helpUrl' => route('owner.chat'),
                    'notificationsUrl' => route('owner.notificaciones'),
                    'notifCount' => 2,
                ])

                <section class="sv-page">
                    <div class="sv-head">
                        <h1 class="sv-title">Nuestros Servicios</h1>
                        <p class="sv-sub">Tu perro feliz, tu tranquilo. Conoce todo lo que ofrecemos para el bienestar de tu mascota.</p>
                    </div>

                    <div class="sv-toolbar">
                        <form method="GET" action="{{ route('owner.services') }}" class="sv-search">
                            <i class="bi bi-search" aria-hidden="true"></i>
                            <input type="text" name="q" value="{{ $search ?? '' }}" placeholder="Buscar servicios..." />
                            @if (($activeCategory ?? '') !== '')
                                <input type="hidden" name="categoria" value="{{ $activeCategory }}" />
                            @endif
                        </form>

                        <div class="sv-filters" role="tablist" aria-label="Filtro de categoria">
                            @php
                                $activeCat = (string) ($activeCategory ?? '');
                                $activeCat = $activeCat === '' ? 'all' : $activeCat;
                            @endphp

                            <a href="{{ route('owner.services', ['q' => $search]) }}" class="sv-pill {{ $activeCat === 'all' ? 'sv-pill--active' : '' }}">Todos</a>

                            @foreach ($categoryOptions as $cat)
                                <a href="{{ route('owner.services', ['categoria' => $cat->id, 'q' => $search]) }}" class="sv-pill {{ (string) $activeCat === (string) $cat->id ? 'sv-pill--active' : '' }}">{{ $cat->nombre }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="sv-grid">
                        @foreach ($services as $service)
                            @php
                                $meta = $catMeta((string) ($service['category'] ?? ''));
                                $priceText = $formatPrice($service['price'] ?? null, (string) ($service['name'] ?? ''));
                                $isConsult = mb_strtolower($priceText) === 'consultar' || str_contains(mb_strtolower($priceText), 'consultar');
                            @endphp

                            <article class="sv-card sv-card--{{ $meta['key'] }}">
                                <header class="sv-card-head">
                                    <div class="sv-card-icon"><i class="bi {{ $meta['icon'] }}" aria-hidden="true"></i></div>
                                    <div class="sv-card-head-text">
                                        <div class="sv-card-cat">{{ $meta['label'] }}</div>
                                        <h3 class="sv-card-title">{{ $service['name'] }}</h3>
                                        <div class="sv-card-meta">
                                            <span class="sv-price {{ $isConsult ? 'sv-price--consult' : '' }}">{{ $priceText }}</span>
                                            @if (!empty($service['duration']))
                                                <span class="sv-meta-dot">•</span>
                                                <span class="sv-meta-small">{{ $service['duration'] }}</span>
                                            @elseif (str_contains(mb_strtolower($meta['label']), 'entren'))
                                                <span class="sv-meta-dot">•</span>
                                                <span class="sv-meta-small">Programa completo</span>
                                            @endif
                                        </div>
                                    </div>
                                </header>

                                <div class="sv-card-body">
                                    <p class="sv-desc">{{ $service['description'] }}</p>
                                </div>

                                <footer class="sv-card-foot">
                                    <button class="sv-more" type="button">Ver mas <i class="bi bi-chevron-down" aria-hidden="true"></i></button>
                                    <button class="sv-cta" type="button">Solicitar</button>
                                </footer>
                            </article>
                        @endforeach
                    </div>

                    <section class="sv-helpbar" aria-label="Necesitas mas informacion">
                        <div class="sv-helpbar-title">Necesitas mas informacion?</div>
                        <div class="sv-helpbar-items">
                            <div class="sv-helpbar-item"><i class="bi bi-telephone" aria-hidden="true"></i><span>+57 300 123 4567</span></div>
                            <div class="sv-helpbar-item"><i class="bi bi-geo-alt" aria-hidden="true"></i><span>La Calera, Colombia</span></div>
                            <div class="sv-helpbar-item"><i class="bi bi-clock" aria-hidden="true"></i><span>Lun - Sab: 8am - 6pm</span></div>
                        </div>
                    </section>
                </section>
            </main>
        </div>
    </body>
</html>

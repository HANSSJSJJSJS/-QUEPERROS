<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mi Perfil</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=lilita-one:400" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/dueño/panel.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dueño/modulos.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dueño/perfil.css') }}">
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

                <section class="pf-page">
                    @php
                        $petCount = (int) ($petCount ?? 0);
                        $dueno = $dueno ?? null;
                        $fullName = trim((string) ($user->name ?? ''));
                        $firstName = $fullName;
                        $lastName = '';
                        if (str_contains($fullName, ' ')) {
                            $firstName = Str::before($fullName, ' ');
                            $lastName = trim((string) Str::after($fullName, ' '));
                        }

                        $memberSince = '';
                        if (!empty($user->created_at)) {
                            $memberSince = (string) $user->created_at->format('F Y');
                        }
                    @endphp

                    <div class="pf-head">
                        <h1 class="pf-title">Mi Perfil</h1>
                        <p class="pf-sub">Gestiona tu informacion personal</p>
                    </div>

                    <div class="pf-grid">
                        <div class="pf-card pf-left">
                            <div class="pf-avatar-wrap">
                                <div class="pf-avatar">
                                    {{ strtoupper(mb_substr($user->name, 0, 1)) }}
                                    <div class="pf-avatar-badge" aria-hidden="true"><i class="bi bi-camera"></i></div>
                                </div>
                            </div>

                            <div class="pf-name">{{ $user->name }}</div>
                            <div class="pf-email">{{ $user->email }}</div>

                            <div class="pf-stat">
                                <i class="bi bi-heart" aria-hidden="true"></i>
                                <span>{{ $petCount }} mascotas registradas</span>
                            </div>

                            <div class="pf-foot">Miembro desde: {{ $memberSince }}</div>
                        </div>

                        <div>
                            <div class="pf-card pf-right">
                                <div class="pf-section">
                                    <div class="pf-sec-head">
                                        <i class="bi bi-person" aria-hidden="true"></i>
                                        <span>Informacion Personal</span>
                                    </div>

                                    <form class="pf-form" method="POST" action="{{ route('owner.perfil.update') }}">
                                        @csrf

                                        <div class="pf-field">
                                            <div class="pf-label">Nombre *</div>
                                            <input class="pf-input" name="nombre" value="{{ old('nombre', $firstName) }}" required>
                                        </div>

                                        <div class="pf-field">
                                            <div class="pf-label">Apellido *</div>
                                            <input class="pf-input" name="apellido" value="{{ old('apellido', $lastName) }}" required>
                                        </div>

                                        <div class="pf-field pf-field--full">
                                            <div class="pf-label">Correo electronico *</div>
                                            <div class="pf-input-wrap">
                                                <i class="bi bi-envelope pf-input-icon" aria-hidden="true"></i>
                                                <input class="pf-input pf-input--icon" type="email" name="email" value="{{ old('email', $user->email) }}" required>
                                            </div>
                                        </div>

                                        <div class="pf-field">
                                            <div class="pf-label">Telefono *</div>
                                            <div class="pf-input-wrap">
                                                <i class="bi bi-telephone pf-input-icon" aria-hidden="true"></i>
                                                <input class="pf-input pf-input--icon" name="telefono" value="{{ old('telefono', $dueno->telefono ?? '') }}">
                                            </div>
                                        </div>

                                        <div class="pf-field">
                                            <div class="pf-label">Documento</div>
                                            <input class="pf-input" name="documento" value="{{ old('documento', $dueno->documento ?? '') }}">
                                        </div>

                                        <div class="pf-field pf-field--full">
                                            <div class="pf-label">Direccion</div>
                                            <div class="pf-input-wrap">
                                                <i class="bi bi-geo-alt pf-input-icon" aria-hidden="true"></i>
                                                <input class="pf-input pf-input--icon" name="direccion" value="{{ old('direccion', $dueno->direccion ?? '') }}">
                                            </div>
                                        </div>

                                        <div class="pf-field">
                                            <div class="pf-label">Ciudad</div>
                                            <input class="pf-input" name="ciudad" value="{{ old('ciudad', $dueno->ciudad ?? '') }}">
                                        </div>

                                        <div class="pf-field">
                                            <div class="pf-label">Fecha de nacimiento</div>
                                            <div class="pf-input-wrap">
                                                <input class="pf-input" type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $dueno->fecha_nacimiento ?? '') }}">
                                                <i class="bi bi-calendar3 pf-input-icon" aria-hidden="true" style="left: auto; right: 44px;"></i>
                                            </div>
                                        </div>

                                        <div class="pf-actions">
                                            <button class="pf-btn" type="submit">Guardar Cambios</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="pf-card pf-security">
                                <div class="pf-section">
                                    <div class="pf-sec-head">
                                        <i class="bi bi-shield-check" aria-hidden="true"></i>
                                        <span>Seguridad</span>
                                    </div>

                                    <form class="pf-sec-form" method="POST" action="{{ route('owner.perfil.password') }}">
                                        @csrf

                                        <div class="pf-field pf-field--full">
                                            <div class="pf-label">Contrasena actual</div>
                                            <div class="pf-input-wrap">
                                                <i class="bi bi-lock pf-input-icon" aria-hidden="true"></i>
                                                <input class="pf-input pf-input--icon" type="password" name="current_password" required>
                                                <button class="pf-eye" type="button" data-pf-eye>
                                                    <i class="bi bi-eye" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="pf-field">
                                            <div class="pf-label">Nueva contrasena</div>
                                            <div class="pf-input-wrap">
                                                <input class="pf-input" type="password" name="password" required>
                                                <button class="pf-eye" type="button" data-pf-eye>
                                                    <i class="bi bi-eye" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="pf-field">
                                            <div class="pf-label">Confirmar contrasena</div>
                                            <input class="pf-input" type="password" name="password_confirmation" required>
                                        </div>

                                        <button class="pf-btn pf-btn-wide" type="submit">Actualizar Contrasena</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>

        <script>
            (() => {
                const eyeBtns = Array.from(document.querySelectorAll('[data-pf-eye]'));
                eyeBtns.forEach((btn) => {
                    btn.addEventListener('click', () => {
                        const wrap = btn.closest('.pf-input-wrap');
                        if (!wrap) return;
                        const input = wrap.querySelector('input');
                        if (!input) return;
                        input.type = input.type === 'password' ? 'text' : 'password';
                    });
                });
            })();
        </script>
    </body>
</html>

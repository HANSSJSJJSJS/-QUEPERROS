<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Seguimiento</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=lilita-one:400" rel="stylesheet" />
        
        <link rel="stylesheet" href="{{ asset('css/shared/mq-topbar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/dueño/panel.css') }}">
        <link rel="stylesheet" href="{{ asset('css/entrenador/dashboardentrenador.css') }}">
        <link rel="stylesheet" href="{{ asset('css/entrenador/seguimiento.css') }}">
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

                <section class="sg-card" aria-label="Nuevo Registro">
                    <h2 class="sg-card-title">Nuevo Registro</h2>

                    <form class="sg-form" action="#" method="POST">
                        <div class="sg-row">
                            <div class="sg-field">
                                <label class="sg-label" for="sg-pet">Mascota</label>
                                <select id="sg-pet" name="pet" class="sg-control">
                                    <option value="">Seleccionar mascota...</option>
                                    <option value="max">Max</option>
                                    <option value="luna">Luna</option>
                                    <option value="rocky">Rocky</option>
                                    <option value="bella">Bella</option>
                                </select>
                            </div>

                            <div class="sg-field">
                                <label class="sg-label" for="sg-activity">Tipo de Actividad</label>
                                <select id="sg-activity" name="activity" class="sg-control">
                                    <option value="">Seleccionar actividad...</option>
                                    <option value="paseo">Paseo</option>
                                    <option value="entrenamiento">Entrenamiento</option>
                                    <option value="socializacion">Socialización</option>
                                    <option value="cuidado">Cuidado diario</option>
                                </select>
                            </div>
                        </div>

                        <div class="sg-field">
                            <div class="sg-label">Estado de animo de la mascota</div>
                            <input type="hidden" name="mood" id="sg-mood" value="Normal">
                            <div class="sg-pills" role="group" aria-label="Estado de ánimo">
                                <button type="button" class="sg-pill" data-value="Feliz">Feliz</button>
                                <button type="button" class="sg-pill sg-pill--active" data-value="Normal">Normal</button>
                                <button type="button" class="sg-pill" data-value="Cansado">Cansado</button>
                                <button type="button" class="sg-pill" data-value="Ansioso">Ansioso</button>
                                <button type="button" class="sg-pill" data-value="Enfermo">Enfermo</button>
                            </div>
                        </div>

                        <div class="sg-row">
                            <div class="sg-field">
                                <label class="sg-label" for="sg-duration">Duracion (minutos)</label>
                                <input id="sg-duration" name="duration" class="sg-control" type="number" value="45" />
                            </div>

                            <div class="sg-field">
                                <label class="sg-label" for="sg-progress">Nivel de progreso</label>
                                <select id="sg-progress" name="progress" class="sg-control">
                                    <option value="excelente">Excelente</option>
                                    <option value="bueno">Bueno</option>
                                    <option value="regular">Regular</option>
                                </select>
                            </div>
                        </div>

                        <div class="sg-field">
                            <label class="sg-label" for="sg-notes">Notas y observaciones</label>
                            <textarea id="sg-notes" name="notes" class="sg-control sg-control--area" rows="4" placeholder="Describe como fue la sesion..."></textarea>
                        </div>

                        <div class="sg-field">
                            <label class="sg-label" for="sg-message">Mensaje para el dueno</label>
                            <textarea id="sg-message" name="message" class="sg-control sg-control--area" rows="4" placeholder="Escribe un mensaje para el dueno de la mascota..."></textarea>
                        </div>

                        <div class="sg-actions">
                            <button class="sg-btn sg-btn--save" type="submit">Guardar Registro</button>
                            <button class="sg-btn sg-btn--cancel" type="button">Cancelar</button>
                        </div>
                    </form>
                </section>
            </main>
        </div>

        <script>
            (function () {
                const root = document;
                const moodInput = root.getElementById('sg-mood');
                const buttons = root.querySelectorAll('.sg-pill');
                if (!moodInput || !buttons.length) return;

                buttons.forEach((btn) => {
                    btn.addEventListener('click', () => {
                        buttons.forEach((b) => b.classList.remove('sg-pill--active'));
                        btn.classList.add('sg-pill--active');
                        moodInput.value = btn.getAttribute('data-value') || '';
                    });
                });
            })();
        </script>
    </body>
</html>

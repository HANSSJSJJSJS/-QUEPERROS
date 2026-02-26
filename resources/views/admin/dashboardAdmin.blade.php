<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panel Administrativo - Mascotas</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=lilita-one:400" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/Admin/admin-dashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('css/Admin/admin-sidebar-extras.css') }}">
        <link rel="stylesheet" href="{{ asset('css/Admin/dashboard-admin-v2.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body>
        @php
            use Illuminate\Support\Str;
        @endphp
        <div class="admin-layout">
            <aside class="admin-sidebar">
                <div class="admin-brand">
                    <div class="admin-logo"><i class="bi bi-paw" aria-hidden="true"></i></div>
                    <div class="admin-brand-text">
                        <span class="admin-brand-title">MAS QUE PERROS</span>
                        <span class="admin-brand-subtitle">Panel Administrativo</span>
                    </div>
                </div>

                <p class="admin-sidebar-section">ADMINISTRACION</p>

                <nav class="admin-menu">
                    <a href="{{ route('admin.dashboard') }}" class="admin-menu-item {{ request()->routeIs('admin.dashboard') ? 'admin-menu-item--active' : '' }}">
                        <span class="admin-menu-left">
                            <i class="admin-menu-icon bi bi-grid-1x2-fill" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </span>
                        <span class="admin-menu-right">
                            <span class="admin-menu-chevron">›</span>
                        </span>
                    </a>
                    <a href="{{ route('admin.users') }}" class="admin-menu-item {{ request()->routeIs('admin.users') ? 'admin-menu-item--active' : '' }}">
                        <span class="admin-menu-left">
                            <i class="admin-menu-icon bi bi-people-fill" aria-hidden="true"></i>
                            <span>Gestión de usuarios</span>
                        </span>
                        <span class="admin-menu-right">
                            <span class="admin-menu-badge">5</span>
                        </span>
                    </a>
                    <a href="{{ route('admin.services') }}" class="admin-menu-item {{ request()->routeIs('admin.services') ? 'admin-menu-item--active' : '' }}">
                        <span class="admin-menu-left">
                            <i class="admin-menu-icon bi bi-heart-pulse-fill" aria-hidden="true"></i>
                            <span>Gestión de servicios</span>
                        </span>
                        <span class="admin-menu-right">
                            <span class="admin-menu-badge">6</span>
                        </span>
                    </a>
                    <a href="#" class="admin-menu-item">
                        <span class="admin-menu-left">
                            <i class="admin-menu-icon bi bi-bar-chart-fill" aria-hidden="true"></i>
                            <span>Reportes</span>
                        </span>
                        <span class="admin-menu-right"></span>
                    </a>
                    <a href="#" class="admin-menu-item">
                        <span class="admin-menu-left">
                            <i class="admin-menu-icon bi bi-gear-fill" aria-hidden="true"></i>
                            <span>Configuracion</span>
                        </span>
                        <span class="admin-menu-right"></span>
                    </a>
                </nav>

                <div class="admin-sidebar-spacer"></div>

                <div class="admin-sidebar-divider"></div>

                <form method="POST" action="{{ route('logout') }}" class="admin-logout">
                    @csrf
                    <button type="submit">
                        <span class="admin-logout-icon">⤴</span>
                        <span>Cerrar sesion</span>
                    </button>
                </form>
            </aside>

            <main class="admin-main">
                <header class="ad2-header">
                    <div class="ad2-search" role="search">
                        <i class="bi bi-search" aria-hidden="true"></i>
                        <input type="text" placeholder="Buscar..." aria-label="Buscar" />
                    </div>

                    <div class="ad2-top-actions">
                        <button type="button" class="ad2-bell" aria-label="Notificaciones">
                            <i class="bi bi-bell" aria-hidden="true"></i>
                            <span class="ad2-bell-badge" aria-label="Notificaciones">3</span>
                        </button>

                        <div class="ad2-profile">
                            <div class="ad2-profile-avatar">{{ mb_substr($user->name ?? 'A', 0, 1) }}</div>
                            <div class="ad2-profile-text">
                                <span class="ad2-profile-title">Administrador</span>
                                <span class="ad2-profile-sub">{{ Str::limit($user->name ?? 'Usuario', 14) }}</span>
                            </div>
                        </div>
                    </div>
                </header>

                <section class="ad2-hero" aria-label="Bienvenida">
                    <div class="ad2-hero-left">
                        <p class="ad2-hero-kicker"><span class="ad2-hero-kicker-icon">✨</span> Buenas tardes</p>
                        <h1 class="ad2-hero-title">BIENVENIDO, {{ Str::upper(Str::limit($user->name ?? 'NOMBRE', 14, '')) }}</h1>
                        <p class="ad2-hero-sub">Administrador del sistema</p>

                        <div class="ad2-hero-chips" aria-label="Estado del sistema">
                            <span class="ad2-chip ad2-chip--green"><i class="bi bi-graph-up" aria-hidden="true"></i> Sistema activo</span>
                            <span class="ad2-chip"><i class="bi bi-clock" aria-hidden="true"></i> Última sesión: Hoy 9:30 AM</span>
                        </div>
                    </div>

                    <div class="ad2-metrics" aria-label="Métricas">
                        <div class="ad2-metric">
                            <div class="ad2-metric-value">14</div>
                            <div class="ad2-metric-label">CITAS HOY</div>
                        </div>
                        <div class="ad2-metric ad2-metric--gold">
                            <div class="ad2-metric-value">98%</div>
                            <div class="ad2-metric-label">UPTIME</div>
                        </div>
                    </div>
                </section>

                <section class="ad2-cards" aria-label="Resumen">
                    <div class="ad2-card">
                        <div class="ad2-card-top">
                            <div class="ad2-card-icon ad2-card-icon--blue"><i class="bi bi-people" aria-hidden="true"></i></div>
                            <span class="ad2-pill ad2-pill--blue">↗ +2 esta semana</span>
                        </div>
                        <div class="ad2-card-number">{{ $stats['total_users'] }}</div>
                        <div class="ad2-card-label">Total Usuarios</div>
                        <div class="ad2-card-hover">
                            <div class="ad2-card-divider"></div>
                            <div class="ad2-card-hover-text">3 propietarios, 2 veterinarios</div>
                            <a href="{{ route('admin.users') }}" class="ad2-card-hover-link">Ver detalle <span aria-hidden="true">→</span></a>
                        </div>
                    </div>

                    <div class="ad2-card">
                        <div class="ad2-card-top">
                            <div class="ad2-card-icon ad2-card-icon--purple"><i class="bi bi-wrench" aria-hidden="true"></i></div>
                            <span class="ad2-pill ad2-pill--purple">↗ +1 este mes</span>
                        </div>
                        <div class="ad2-card-number">{{ $stats['active_services'] }}</div>
                        <div class="ad2-card-label">Servicios Activos</div>
                        <div class="ad2-card-hover">
                            <div class="ad2-card-divider"></div>
                            <div class="ad2-card-hover-text">Consulta, Vacunacion, Guarderia...</div>
                            <a href="#" class="ad2-card-hover-link">Ver detalle <span aria-hidden="true">→</span></a>
                        </div>
                    </div>

                    <div class="ad2-card">
                        <div class="ad2-card-top">
                            <div class="ad2-card-icon ad2-card-icon--yellow"><i class="bi bi-shield" aria-hidden="true"></i></div>
                            <span class="ad2-pill ad2-pill--gray">↔ Sin cambios</span>
                        </div>
                        <div class="ad2-card-number">{{ $stats['defined_roles'] }}</div>
                        <div class="ad2-card-label">Roles Definidos</div>
                        <div class="ad2-card-hover">
                            <div class="ad2-card-divider"></div>
                            <div class="ad2-card-hover-text">Admin, Veterinario, Propietario</div>
                            <a href="#" class="ad2-card-hover-link">Ver detalle <span aria-hidden="true">→</span></a>
                        </div>
                    </div>
                </section>

                <section class="ad2-block" aria-label="Acciones rápidas">
                    <h2 class="ad2-section-title">Acciones Rapidas</h2>
                    <p class="ad2-section-sub">Operaciones frecuentes del sistema</p>

                    <div class="ad2-actions">
                        <button type="button" class="ad2-action ad2-action--purple ad2-action--modal" id="openAdminRegisterUser">
                            <div class="ad2-action-icon"><i class="bi bi-person-plus" aria-hidden="true"></i></div>
                            <div>
                                <p class="ad2-action-title">Registrar Usuarios</p>
                                <p class="ad2-action-desc">Agregar nuevo usuario al sistema</p>
                            </div>
                            <div class="ad2-action-open">Abrir <span aria-hidden="true">→</span></div>
                        </button>

                        <button type="button" class="ad2-action ad2-action--blue" id="openAdminUsersModal">
                            <div class="ad2-action-icon"><i class="bi bi-eye" aria-hidden="true"></i></div>
                            <div>
                                <p class="ad2-action-title">Ver Usuarios</p>
                                <p class="ad2-action-desc">Lista completa de usuarios</p>
                            </div>
                            <div class="ad2-action-open">Abrir <span aria-hidden="true">→</span></div>
                        </button>

                        <button type="button" class="ad2-action ad2-action--purple ad2-action--modal" id="openAdminCreateService">
                            <div class="ad2-action-icon"><i class="bi bi-plus-lg" aria-hidden="true"></i></div>
                            <div>
                                <p class="ad2-action-title">Crear Servicio</p>
                                <p class="ad2-action-desc">Nuevo servicio veterinario</p>
                            </div>
                            <div class="ad2-action-open">Abrir <span aria-hidden="true">→</span></div>
                        </button>

                        <a href="#" class="ad2-action ad2-action--yellow">
                            <div class="ad2-action-icon"><i class="bi bi-shield-check" aria-hidden="true"></i></div>
                            <div>
                                <p class="ad2-action-title">Asignar Rol</p>
                                <p class="ad2-action-desc">Asignar permisos a usuarios</p>
                            </div>
                            <div class="ad2-action-open">Abrir <span aria-hidden="true">→</span></div>
                        </a>
                    </div>
                </section>

                <div class="ad2-bottom-grid" aria-label="Actividad y usuarios">
                    <section class="ad2-activity" aria-label="Actividad reciente">
                        <div class="ad2-activity-top">
                        <div>
                            <h2 class="ad2-section-title" style="margin-bottom:.15rem;">Actividad Reciente</h2>
                            <p class="ad2-section-sub" style="margin:0;">Últimos movimientos del sistema</p>
                        </div>

                        <div class="ad2-tabs" aria-label="Tabs">
                            <button type="button" class="ad2-tab ad2-tab--active">Actividad</button>
                            <button type="button" class="ad2-tab">Servicios</button>
                        </div>
                    </div>

                    <div class="ad2-activity-item">
                        <div class="ad2-activity-dot ad2-activity-dot--purple"><i class="bi bi-wrench" aria-hidden="true"></i></div>
                        <div class="ad2-activity-text">
                            <div class="ad2-activity-main">Servicio 'Guardería Premium' fue activado</div>
                            <div class="ad2-activity-sub"><i class="bi bi-clock" aria-hidden="true"></i> Hace 1 hora</div>
                        </div>
                    </div>

                    <div class="ad2-activity-item">
                        <div class="ad2-activity-dot ad2-activity-dot--yellow"><i class="bi bi-shield" aria-hidden="true"></i></div>
                        <div class="ad2-activity-text">
                            <div class="ad2-activity-main">Rol de Dr. Pedro Ruiz actualizado a Veterinario Senior</div>
                            <div class="ad2-activity-sub"><i class="bi bi-clock" aria-hidden="true"></i> Hace 2 horas</div>
                        </div>
                    </div>

                    <div class="ad2-activity-item ad2-activity-item--arrow">
                        <div class="ad2-activity-dot ad2-activity-dot--blue"><i class="bi bi-check2-circle" aria-hidden="true"></i></div>
                        <div class="ad2-activity-text">
                            <div class="ad2-activity-main">Backup automatico completado exitosamente</div>
                            <div class="ad2-activity-sub"><i class="bi bi-clock" aria-hidden="true"></i> Hace 3 horas</div>
                        </div>
                        <div class="ad2-activity-arrow">›</div>
                    </div>

                    <div class="ad2-activity-item">
                        <div class="ad2-activity-dot ad2-activity-dot--red"><i class="bi bi-calendar-event" aria-hidden="true"></i></div>
                        <div class="ad2-activity-text">
                            <div class="ad2-activity-main">Cita cancelada: Luna - Vacunacion</div>
                            <div class="ad2-activity-sub"><i class="bi bi-clock" aria-hidden="true"></i> Hace 4 horas</div>
                        </div>
                    </div>

                        <a href="#" class="ad2-activity-footer">Ver todo el historial</a>
                    </section>

                    <section class="ad2-users" aria-label="Usuarios del sistema">
                        <div class="ad2-users-top">
                        <div>
                            <h2 class="ad2-section-title" style="margin-bottom:.15rem;">Usuarios del Sistema</h2>
                            <p class="ad2-section-sub" style="margin:0;">Resumen de cuentas registradas</p>
                        </div>
                        <a href="{{ route('admin.users') }}" class="ad2-users-new">+ Nuevo</a>
                        </div>

                    <div class="ad2-users-summary" aria-label="Resumen">
                        <div class="ad2-users-summary-card">
                            <div class="ad2-users-count ad2-users-count--blue">3</div>
                            <div class="ad2-users-summary-label">Propietarios</div>
                        </div>
                        <div class="ad2-users-summary-card">
                            <div class="ad2-users-count ad2-users-count--purple">2</div>
                            <div class="ad2-users-summary-label">Veterinarios</div>
                        </div>
                        <div class="ad2-users-summary-card">
                            <div class="ad2-users-count ad2-users-count--yellow">1</div>
                            <div class="ad2-users-summary-label">Admins</div>
                        </div>
                    </div>

                    <div class="ad2-users-list" role="list">
                        <div class="ad2-user-row" role="listitem">
                            <div class="ad2-user-avatar">A</div>
                            <div class="ad2-user-meta">
                                <div class="ad2-user-name">Ana Lopez</div>
                                <div class="ad2-user-email">ana@email.com</div>
                            </div>
                            <div class="ad2-user-right">
                                <span class="ad2-user-role-pill">Veterinario</span>
                                <span class="ad2-user-status ad2-user-status--on" aria-label="Activo"></span>
                            </div>
                        </div>

                        <div class="ad2-user-row" role="listitem">
                            <div class="ad2-user-avatar">M</div>
                            <div class="ad2-user-meta">
                                <div class="ad2-user-name">Maria Garcia</div>
                                <div class="ad2-user-email">maria@email.com</div>
                            </div>
                            <div class="ad2-user-right">
                                <span class="ad2-user-role-pill">Propietario</span>
                                <span class="ad2-user-status ad2-user-status--on" aria-label="Activo"></span>
                            </div>
                        </div>

                        <div class="ad2-user-row" role="listitem">
                            <div class="ad2-user-avatar">D</div>
                            <div class="ad2-user-meta">
                                <div class="ad2-user-name">Dr. Pedro Ruiz</div>
                                <div class="ad2-user-email">pedro@email.com</div>
                            </div>
                            <div class="ad2-user-right">
                                <span class="ad2-user-role-pill">Veterinario</span>
                                <span class="ad2-user-status" aria-label="Inactivo"></span>
                            </div>
                        </div>

                        <div class="ad2-user-row" role="listitem">
                            <div class="ad2-user-avatar">L</div>
                            <div class="ad2-user-meta">
                                <div class="ad2-user-name">Laura Torres</div>
                                <div class="ad2-user-email">laura@email.com</div>
                            </div>
                            <div class="ad2-user-right">
                                <span class="ad2-user-role-pill">Propietario</span>
                                <span class="ad2-user-status ad2-user-status--on" aria-label="Activo"></span>
                            </div>
                        </div>
                    </div>

                        <a href="{{ route('admin.users') }}" class="ad2-users-footer">Gestionar todos los usuarios</a>
                    </section>
                </div>
            </main>
                <div class="ad2-modal" id="adminRegisterUserModal" aria-hidden="true">
                    <div class="ad2-modal-backdrop" data-close="true"></div>
                    <div class="ad2-modal-card" role="dialog" aria-modal="true" aria-labelledby="ad2ModalTitle">
                        <div class="ad2-modal-head">
                            <h2 class="ad2-modal-title" id="ad2ModalTitle">Registrar Nuevo Usuario</h2>
                            <button type="button" class="ad2-modal-close" id="closeAdminRegisterUser" aria-label="Cerrar">×</button>
                        </div>
                        <div class="ad2-modal-body">
                            <form action="{{ url('/admin/users') }}" method="POST" class="ad2-modal-form">
                                @csrf

                        <label class="ad2-field">
                            <span class="ad2-label">Nombre completo</span>
                            <input class="ad2-input" type="text" name="name" placeholder="Ej: Juan Perez" />
                        </label>

                        <label class="ad2-field">
                            <span class="ad2-label">Email</span>
                            <input class="ad2-input" type="email" name="email" placeholder="usuario@email.com" />
                        </label>

                        <label class="ad2-field">
                            <span class="ad2-label">Rol</span>
                            <select class="ad2-select" name="rol">
                                <option value="admin">Administrador</option>
                                <option value="empleado">Cuidador</option>
                                <option value="dueno">Dueño</option>
                                <option value="padrino">Padrino</option>
                            </select>
                        </label>

                                <button type="submit" class="ad2-submit" formaction="{{ url('/admin/users') }}" formmethod="POST">Registrar Usuario</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="ad2-modal" id="adminCreateServiceModal" aria-hidden="true">
                    <div class="ad2-modal-backdrop" data-close="true"></div>
                    <div class="ad2-modal-card" role="dialog" aria-modal="true" aria-labelledby="ad2CreateServiceTitle">
                        <div class="ad2-modal-head">
                            <h2 class="ad2-modal-title" id="ad2CreateServiceTitle">Crear Nuevo Servicio</h2>
                            <button type="button" class="ad2-modal-close" id="closeAdminCreateService" aria-label="Cerrar">×</button>
                        </div>
                        <div class="ad2-modal-body">
                            <form class="ad2-modal-form" autocomplete="off">
                                <label class="ad2-field">
                                    <span class="ad2-label">Nombre del servicio</span>
                                    <input class="ad2-input" type="text" name="name" placeholder="Ej: Consulta general" />
                                </label>

                                <label class="ad2-field">
                                    <span class="ad2-label">Descripcion</span>
                                    <textarea class="ad2-input" name="description" rows="4" placeholder="Descripcion del servicio..."></textarea>
                                </label>

                                <label class="ad2-field">
                                    <span class="ad2-label">Precio (COP)</span>
                                    <input class="ad2-input" type="number" name="price" placeholder="50000" min="0" step="1" />
                                </label>

                                <button type="button" class="ad2-submit" id="submitAdminCreateService">Crear Servicio</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="ad2-modal" id="adminUsersModal" aria-hidden="true">
                    <div class="ad2-modal-backdrop" data-close="true"></div>
                    <div class="ad2-modal-card" role="dialog" aria-modal="true" aria-labelledby="ad2UsersModalTitle">
                        <div class="ad2-modal-head">
                            <h2 class="ad2-modal-title" id="ad2UsersModalTitle">Usuarios del Sistema</h2>
                            <button type="button" class="ad2-modal-close" id="closeAdminUsersModal" aria-label="Cerrar">×</button>
                        </div>
                        <div class="ad2-modal-body">
                            <div class="ad2-um-list" role="list">
                                @foreach (($users ?? []) as $u)
                                    <div class="ad2-um-row" role="listitem">
                                        <div class="ad2-um-avatar">{{ mb_substr($u->name ?? 'U', 0, 1) }}</div>
                                        <div class="ad2-um-meta">
                                            <div class="ad2-um-name">{{ $u->name }}</div>
                                            <div class="ad2-um-email">{{ $u->email }}</div>
                                        </div>
                                        <div class="ad2-um-right">
                                            <span class="ad2-um-role">
                                                @php
                                                    $rolLabel = match($u->rol) {
                                                        'admin' => 'Administrador',
                                                        'empleado' => 'Cuidador',
                                                        'dueno' => 'Propietario',
                                                        'padrino' => 'Padrino',
                                                        default => ucfirst((string) $u->rol),
                                                    };
                                                @endphp
                                                {{ $rolLabel }}
                                            </span>
                                            <span class="ad2-um-status ad2-um-status--on" aria-label="Activo"></span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                @if (session('status'))
                    <div class="ad2-success" id="adminSuccessModal" aria-hidden="true">
                        <div class="ad2-success-backdrop" data-close="true"></div>
                        <div class="ad2-success-card" role="dialog" aria-modal="true" aria-labelledby="ad2SuccessTitle">
                            <div class="ad2-success-head">
                                <h2 class="ad2-success-title" id="ad2SuccessTitle">Registrar Nuevo Usuario</h2>
                                <button type="button" class="ad2-success-close" id="closeAdminSuccess" aria-label="Cerrar">×</button>
                            </div>
                            <div class="ad2-success-body">
                                <div class="ad2-success-icon" aria-hidden="true">
                                    <span class="ad2-success-icon-inner">✓</span>
                                </div>
                                <div class="ad2-success-main">Operacion exitosa</div>
                                <div class="ad2-success-sub">La accion fue realizada correctamente</div>
                            </div>
                        </div>
                    </div>
                @endif

        <script>
            (function () {
                const modal = document.getElementById('adminRegisterUserModal');
                const openBtn = document.getElementById('openAdminRegisterUser');
                const closeBtn = document.getElementById('closeAdminRegisterUser');
                const usersModal = document.getElementById('adminUsersModal');
                const openUsersBtn = document.getElementById('openAdminUsersModal');
                const closeUsersBtn = document.getElementById('closeAdminUsersModal');
                const successModal = document.getElementById('adminSuccessModal');
                const successCloseBtn = document.getElementById('closeAdminSuccess');
                const createServiceModal = document.getElementById('adminCreateServiceModal');
                const openCreateServiceBtn = document.getElementById('openAdminCreateService');
                const closeCreateServiceBtn = document.getElementById('closeAdminCreateService');

                function openModal() {
                    if (!modal) return;
                    modal.classList.add('ad2-modal--open');
                    modal.setAttribute('aria-hidden', 'false');
                    document.body.style.overflow = 'hidden';
                }

                function closeModal() {
                    if (!modal) return;
                    modal.classList.remove('ad2-modal--open');
                    modal.setAttribute('aria-hidden', 'true');
                    document.body.style.overflow = '';
                }

                openBtn?.addEventListener('click', openModal);
                closeBtn?.addEventListener('click', closeModal);

                modal?.addEventListener('click', (e) => {
                    const target = e.target;
                    if (target && target.dataset && target.dataset.close === 'true') {
                        closeModal();
                    }
                });

                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && modal?.classList.contains('ad2-modal--open')) {
                        closeModal();
                    }
                });

                function openUsersModal() {
                    if (!usersModal) return;
                    usersModal.classList.add('ad2-modal--open');
                    usersModal.setAttribute('aria-hidden', 'false');
                    document.body.style.overflow = 'hidden';
                }

                function closeUsersModal() {
                    if (!usersModal) return;
                    usersModal.classList.remove('ad2-modal--open');
                    usersModal.setAttribute('aria-hidden', 'true');
                    document.body.style.overflow = '';
                }

                openUsersBtn?.addEventListener('click', openUsersModal);
                closeUsersBtn?.addEventListener('click', closeUsersModal);

                usersModal?.addEventListener('click', (e) => {
                    const target = e.target;
                    if (target && target.dataset && target.dataset.close === 'true') {
                        closeUsersModal();
                    }
                });

                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && usersModal?.classList.contains('ad2-modal--open')) {
                        closeUsersModal();
                    }
                });

                function openCreateServiceModal() {
                    if (!createServiceModal) return;
                    createServiceModal.classList.add('ad2-modal--open');
                    createServiceModal.setAttribute('aria-hidden', 'false');
                    document.body.style.overflow = 'hidden';
                }

                function closeCreateServiceModal() {
                    if (!createServiceModal) return;
                    createServiceModal.classList.remove('ad2-modal--open');
                    createServiceModal.setAttribute('aria-hidden', 'true');
                    document.body.style.overflow = '';
                }

                openCreateServiceBtn?.addEventListener('click', openCreateServiceModal);
                closeCreateServiceBtn?.addEventListener('click', closeCreateServiceModal);

                createServiceModal?.addEventListener('click', (e) => {
                    const target = e.target;
                    if (target && target.dataset && target.dataset.close === 'true') {
                        closeCreateServiceModal();
                    }
                });

                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && createServiceModal?.classList.contains('ad2-modal--open')) {
                        closeCreateServiceModal();
                    }
                });

                function openSuccess() {
                    if (!successModal) return;
                    successModal.classList.add('ad2-success--open');
                    successModal.setAttribute('aria-hidden', 'false');
                    document.body.style.overflow = 'hidden';
                }

                function closeSuccess() {
                    if (!successModal) return;
                    successModal.classList.remove('ad2-success--open');
                    successModal.setAttribute('aria-hidden', 'true');
                    document.body.style.overflow = '';
                }

                successCloseBtn?.addEventListener('click', closeSuccess);

                successModal?.addEventListener('click', (e) => {
                    const target = e.target;
                    if (target && target.dataset && target.dataset.close === 'true') {
                        closeSuccess();
                    }
                });

                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && successModal?.classList.contains('ad2-success--open')) {
                        closeSuccess();
                    }
                });

                openSuccess();
            })();
        </script>
    </body>
</html>

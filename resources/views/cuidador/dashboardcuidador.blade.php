<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dashboard especialista</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=lilita-one:400" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/cuidador/dashboardcuidador.css') }}">
    </head>
    <body>
        <div class="cg-layout">
            <aside class="cg-sidebar">
                <div class="cg-brand">
                    <div class="cg-brand-logo">🐾</div>
                    <div class="cg-brand-text">
                        <span class="cg-brand-title">MAS QUE PERROS</span>
                        <span class="cg-brand-subtitle">Panel</span>
                    </div>
                </div>

                <nav class="cg-menu">
                    <a class="cg-menu-item cg-menu-item--active" href="#">
                        <span class="cg-menu-icon">🏠</span>
                        <span>Inicio</span>
                    </a>
                    <a class="cg-menu-item" href="#">
                        <span class="cg-menu-icon">🐾</span>
                        <span>Mascotas</span>
                    </a>
                    <a class="cg-menu-item" href="#">
                        <span class="cg-menu-icon">📋</span>
                        <span>Historial clínico</span>
                    </a>
                </nav>

                <div class="cg-sidebar-spacer"></div>

                <form method="POST" action="{{ route('logout') }}" class="cg-logout">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>
            </aside>

            <main class="cg-main">
                <header class="cg-header">
                    <button class="cg-burger" type="button" aria-label="Abrir menú">☰</button>

                    <div class="cg-profile">
                        <div class="cg-profile-avatar">{{ mb_substr($user->name ?? 'C', 0, 1) }}</div>
                        <div class="cg-profile-name">{{ $user->name }}</div>
                    </div>
                </header>

                <section class="cg-hero">
                    <h1 class="cg-hero-title">BIENVENIDA, {{ strtoupper($user->name) }}</h1>
                    <p class="cg-hero-subtitle">Aqui tienes un resumen de tu día</p>
                </section>

                <section class="cg-stats">
                    <div class="cg-stat">
                        <div class="cg-stat-icon">📅</div>
                        <div class="cg-stat-text">
                            <span class="cg-stat-label">Citas hoy</span>
                            <span class="cg-stat-value">{{ $stats['appointments_today'] }}</span>
                        </div>
                    </div>
                    <div class="cg-stat">
                        <div class="cg-stat-icon">🐾</div>
                        <div class="cg-stat-text">
                            <span class="cg-stat-label">Mascotas Totales</span>
                            <span class="cg-stat-value">{{ $stats['total_pets'] }}</span>
                        </div>
                    </div>
                    <div class="cg-stat">
                        <div class="cg-stat-icon">🧾</div>
                        <div class="cg-stat-text">
                            <span class="cg-stat-label">Consultas Completas</span>
                            <span class="cg-stat-value">{{ $stats['completed_consults'] }}</span>
                        </div>
                    </div>
                </section>

                <section class="cg-grid">
                    <div class="cg-card cg-card--appointments">
                        <div class="cg-card-header">
                            <h2>Citas de hoy</h2>
                            <a href="#" class="cg-link">Ver todas ›</a>
                        </div>

                        <div class="cg-appointments">
                            @foreach ($appointments as $appt)
                                <div class="cg-appointment">
                                    <div class="cg-appointment-left">
                                        <div class="cg-appointment-icon">⏱</div>
                                        <div class="cg-appointment-text">
                                            <div class="cg-appointment-time">{{ $appt['time'] }} - {{ strtolower($appt['pet']) }}</div>
                                            <div class="cg-appointment-owner">{{ $appt['owner'] }}</div>
                                        </div>
                                    </div>
                                    <a href="#" class="cg-appointment-action">Atender</a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="cg-card cg-card--pets">
                        <div class="cg-card-header">
                            <h2>Mascotas recientes</h2>
                            <a href="#" class="cg-link">Ver todas ›</a>
                        </div>

                        <div class="cg-search">
                            <input type="text" placeholder="Buscar por nombre" />
                        </div>

                        <div class="cg-pets">
                            @foreach ($recentPets as $pet)
                                <div class="cg-pet">
                                    <div class="cg-pet-left">
                                        <div class="cg-pet-icon">🐾</div>
                                        <div>
                                            <div class="cg-pet-name">{{ $pet['name'] }}</div>
                                            <div class="cg-pet-meta">{{ $pet['breed'] }}<br>{{ $pet['age'] }}</div>
                                        </div>
                                    </div>
                                    <a href="#" class="cg-pet-history">Historial ›</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>

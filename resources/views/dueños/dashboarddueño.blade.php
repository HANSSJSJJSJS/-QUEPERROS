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
    </head>

    <body>
        <div class="mq-dashboard">
            <aside class="mq-dashboard-sidebar">
                <div class="mq-dashboard-logo">MAS QUE PERROS</div>

                <div class="mq-dashboard-user">
                    <div class="mq-dashboard-user-avatar">{{ strtoupper(mb_substr($user->name, 0, 1)) }}</div>
                    <div class="mq-dashboard-user-info">
                        <div class="mq-dashboard-user-name">{{ $user->name }}</div>
                        <div class="mq-dashboard-user-sub">Mis mascotas registradas</div>
                    </div>
                </div>

                <nav class="mq-dashboard-menu">
                    <a href="#" class="active">Inicio</a>
                    <a href="#">Mis Mascotas</a>
                    <a href="#">Citas</a>
                    <a href="#">Historial</a>
                </nav>

                <div class="mq-dashboard-support">
                    <a href="#">Configuración</a>
                    <a href="#">Ayuda</a>
                </div>

                <form method="POST" action="{{ route('logout') }}" class="mq-dashboard-logout">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>
            </aside>

            <main class="mq-dashboard-main">
                <header class="mq-dashboard-header">
                    <div class="mq-dashboard-search">
                        <input type="text" placeholder="Buscar mascotas, citas, servicios...">
                    </div>
                </header>

                <section class="mq-dashboard-hero">
                    <div class="mq-dashboard-hero-text">
                        <p class="mq-dashboard-hero-greeting">Buenas tardes</p>
                        <h1 class="mq-dashboard-hero-title">BIENVENIDO, {{ Str::upper(Str::before($user->name, ' ')) }}</h1>
                        <p class="mq-dashboard-hero-sub">Aquí tienes un resumen de tus mascotas y servicios. Tus peludos están en buenas manos.</p>
                        <button class="mq-dashboard-hero-btn">Agendar nueva cita</button>
                    </div>
                </section>

                <section class="mq-dashboard-cards">
                    <div class="mq-dashboard-card">
                        <p class="mq-dashboard-card-label">Próximas citas</p>
                        <p class="mq-dashboard-card-value">2</p>
                    </div>
                    <div class="mq-dashboard-card">
                        <p class="mq-dashboard-card-label">Mis mascotas</p>
                        <p class="mq-dashboard-card-value">3</p>
                    </div>
                    <div class="mq-dashboard-card">
                        <p class="mq-dashboard-card-label">Visitas realizadas</p>
                        <p class="mq-dashboard-card-value">7</p>
                    </div>
                </section>

                <section class="mq-dashboard-list">
                    <header class="mq-dashboard-list-header">
                        <h2>Próximas citas</h2>
                        <div class="mq-dashboard-list-filters">
                            <button class="active">Todas</button>
                            <button>Confirmadas</button>
                            <button>Pendientes</button>
                        </div>
                    </header>

                    <ul class="mq-dashboard-appointments">
                        <li>
                            <div>
                                <p class="mq-dashboard-appointment-time">10:00 AM - Rocky</p>
                                <p class="mq-dashboard-appointment-detail">Entrenamiento básico</p>
                            </div>
                            <span class="mq-dashboard-appointment-status confirmed">Confirmada</span>
                        </li>
                        <li>
                            <div>
                                <p class="mq-dashboard-appointment-time">02:30 PM - Luna</p>
                                <p class="mq-dashboard-appointment-detail">Guardería</p>
                            </div>
                            <span class="mq-dashboard-appointment-status confirmed">Confirmada</span>
                        </li>
                    </ul>
                </section>
            </main>
        </div>
    </body>
</html>

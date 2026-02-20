<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Panel de cliente</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=lilita-one:400" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    </head>

    <body>
        <div class="mq-dashboard">
            <aside class="mq-sidebar">
                <div class="mq-sidebar-brand">MAS QUE PERROS</div>

                <div class="mq-sidebar-user">
                    <div class="mq-sidebar-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                    <div class="mq-sidebar-user-info">
                        <div class="mq-sidebar-user-name">{{ auth()->user()->name }}</div>
                        <div class="mq-sidebar-user-meta">0 mascotas registradas</div>
                    </div>
                </div>

                <nav class="mq-sidebar-nav" aria-label="Menú principal">
                    <a href="#" class="mq-nav-item mq-nav-item-active">Inicio</a>
                    <a href="#" class="mq-nav-item">Mis Mascotas</a>
                    <a href="#" class="mq-nav-item">Citas</a>
                    <a href="#" class="mq-nav-item">Historial</a>
                </nav>

                <form class="mq-sidebar-logout" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="mq-btn-logout">Cerrar sesión</button>
                </form>
            </aside>

            <main class="mq-main">
                <header class="mq-main-header">
                    <div>
                        <div class="mq-main-greeting">Buenas tardes</div>
                        <h1 class="mq-main-title">Bienvenido, {{ auth()->user()->name }}.</h1>
                        <p class="mq-main-subtitle">Aquí verás un resumen de tus mascotas, citas y servicios. Aún no tienes mascotas registradas.</p>
                    </div>

                    <button class="mq-btn-primary" type="button">Agendar nueva cita</button>
                </header>

                <section class="mq-summary" aria-label="Resumen">
                    <article class="mq-summary-card">
                        <h2>Próximas citas</h2>
                        <p class="mq-summary-number">0</p>
                        <p class="mq-summary-help">Aún no tienes citas programadas.</p>
                    </article>

                    <article class="mq-summary-card">
                        <h2>Mis mascotas</h2>
                        <p class="mq-summary-number">0</p>
                        <p class="mq-summary-help">Registra tu primera mascota para verla aquí.</p>
                    </article>

                    <article class="mq-summary-card">
                        <h2>Visitas realizadas</h2>
                        <p class="mq-summary-number">0</p>
                        <p class="mq-summary-help">Cuando tengas visitas, las verás en este resumen.</p>
                    </article>
                </section>

                <section class="mq-panels">
                    <div class="mq-panel mq-panel-wide" aria-label="Próximas citas">
                        <div class="mq-panel-header">
                            <h2>Próximas citas</h2>
                        </div>
                        <div class="mq-panel-empty">No tienes próximas citas.</div>
                    </div>

                    <aside class="mq-panel mq-panel-side" aria-label="Mis mascotas">
                        <div class="mq-panel-header">
                            <h2>Mis mascotas</h2>
                        </div>
                        <div class="mq-panel-empty">Aún no has registrado mascotas.</div>
                    </aside>
                </section>
            </main>
        </div>
    </body>
</html>

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
                    <a href="#mis-mascotas">Mis Mascotas</a>
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

                @if (session('success'))
                    <div style="background:#eafaf0;color:#1f7a44;border:1px solid #bfe7cf;padding:12px 14px;border-radius:10px;margin-bottom:14px;">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div style="background:#fdeaea;color:#8d1f1f;border:1px solid #f3c3c3;padding:12px 14px;border-radius:10px;margin-bottom:14px;">
                        {{ $errors->first() }}
                    </div>
                @endif

                <section class="mq-dashboard-hero">
                    <div class="mq-dashboard-hero-text">
                        <p class="mq-dashboard-hero-greeting">Buenas tardes</p>
                        <h1 class="mq-dashboard-hero-title">BIENVENIDO, {{ Str::upper(Str::before($user->name, ' ')) }}</h1>
                        <p class="mq-dashboard-hero-sub">Aquí tienes un resumen de tus mascotas y servicios. Tus peludos están en buenas manos.</p>
                        <button class="mq-dashboard-hero-btn" type="button">Agendar nueva cita</button>
                    </div>
                </section>

                <section class="mq-dashboard-cards">
                    <div class="mq-dashboard-card">
                        <p class="mq-dashboard-card-label">Próximas citas</p>
                        <p class="mq-dashboard-card-value">2</p>
                    </div>
                    <div class="mq-dashboard-card">
                        <p class="mq-dashboard-card-label">Mis mascotas</p>
                        <p class="mq-dashboard-card-value">{{ $petsCount }}</p>
                    </div>
                    <div class="mq-dashboard-card">
                        <p class="mq-dashboard-card-label">Visitas realizadas</p>
                        <p class="mq-dashboard-card-value">7</p>
                    </div>
                </section>

                <section class="mq-dashboard-list" id="mis-mascotas">
                    <header class="mq-dashboard-list-header">
                        <h2>Registrar nueva mascota</h2>
                    </header>

                    <form method="POST" action="{{ route('owner.pets.store') }}" style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:10px;">
                        @csrf
                        <input name="nombre" type="text" placeholder="Nombre" value="{{ old('nombre') }}" required style="padding:10px;border:1px solid #ddd;border-radius:8px;">
                        <select name="tipo" required style="padding:10px;border:1px solid #ddd;border-radius:8px;">
                            <option value="">Tipo</option>
                            <option value="Perro" @selected(old('tipo') === 'Perro')>Perro</option>
                            <option value="Gato" @selected(old('tipo') === 'Gato')>Gato</option>
                        </select>
                        <input name="raza" type="text" placeholder="Raza" value="{{ old('raza') }}" required style="padding:10px;border:1px solid #ddd;border-radius:8px;">
                        <input name="edad" type="number" min="0" max="50" placeholder="Edad" value="{{ old('edad') }}" style="padding:10px;border:1px solid #ddd;border-radius:8px;">
                        <input name="sexo" type="text" placeholder="Sexo" value="{{ old('sexo') }}" style="padding:10px;border:1px solid #ddd;border-radius:8px;">
                        <input name="telefono" type="text" placeholder="Teléfono" value="{{ old('telefono') }}" style="padding:10px;border:1px solid #ddd;border-radius:8px;">
                        <textarea name="info_adicional" placeholder="Información adicional" style="grid-column:1/-1;padding:10px;border:1px solid #ddd;border-radius:8px;min-height:90px;">{{ old('info_adicional') }}</textarea>
                        <button type="submit" class="mq-dashboard-hero-btn" style="grid-column:1/-1;justify-self:start;">Registrar mascota</button>
                    </form>
                </section>

                <section class="mq-dashboard-list">
                    <header class="mq-dashboard-list-header">
                        <h2>Mis mascotas recientes</h2>
                    </header>

                    <ul class="mq-dashboard-appointments">
                        @forelse ($pets as $pet)
                            <li>
                                <div>
                                    <p class="mq-dashboard-appointment-time">{{ $pet->nombre }}</p>
                                    <p class="mq-dashboard-appointment-detail">{{ $pet->raza }} @if($pet->edad !== null)- {{ $pet->edad }} años @endif</p>
                                </div>
                                <span class="mq-dashboard-appointment-status confirmed">{{ $pet->estado_actual ?? 'En Casa' }}</span>
                            </li>
                        @empty
                            <li>
                                <div>
                                    <p class="mq-dashboard-appointment-time">Aún no tienes mascotas registradas</p>
                                    <p class="mq-dashboard-appointment-detail">Usa el formulario para agregar tu primera mascota.</p>
                                </div>
                            </li>
                        @endforelse
                    </ul>
                </section>
            </main>
        </div>
    </body>
</html>

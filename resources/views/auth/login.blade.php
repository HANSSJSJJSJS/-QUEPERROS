<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Iniciar sesión</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=lilita-one:400" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    </head>

    <body>
        <div class="mq-login">
            <div class="mq-login-top">
                <div class="mq-login-left">
                    <div class="mq-login-card" aria-label="Iniciar sesión">
                        <h1 class="mq-login-title">INICIAR SESION</h1>

                        @if ($errors->any())
                            <div class="mq-errors">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form class="mq-login-form" method="POST" action="{{ url('/login') }}">
                            @csrf

                            <div class="mq-field">
                                <label for="email">Usuario</label>
                                <input class="mq-input" id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="username">
                            </div>

                            <div class="mq-field">
                                <label for="password">Contraseña</label>
                                <input class="mq-input" id="password" name="password" type="password" required autocomplete="current-password">
                            </div>

                            <div class="mq-actions">
                                <a class="mq-forgot" href="#">¿Olvidaste tu contraseña?</a>
                                <button class="mq-btn" type="submit">INICIAR SESION</button>
                            </div>

                            <div class="mq-bottom-text">
                                ¿No tienes una cuenta?
                                <a href="#">Registrate AQUI</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="mq-login-right">
                    <img class="mq-login-illustration" src="{{ asset('img/login.jpg') }}" alt="Ilustración">
                </div>
            </div>

            <footer class="mq-login-bottom" aria-label="Pie de página">
                <div class="mq-login-footer-inner">
                    <div class="mq-login-footer-left">
                        <img class="mq-login-footer-brand" src="{{ asset('img/footer-brand.png') }}" alt="Mas Que Perros">
                        <img class="mq-login-footer-tagline" src="{{ asset('img/footer-tagline.png') }}" alt="Tu perro feliz, tu tranquilo">
                    </div>

                    <div class="mq-login-footer-col">
                        <img class="mq-login-footer-heading" src="{{ asset('img/footer-contacto.png') }}" alt="Contacto">
                    </div>

                    <div class="mq-login-footer-services">
                        <img class="mq-login-footer-heading" src="{{ asset('img/footer-servicios.png') }}" alt="Servicios">
                    </div>
                </div>
            </footer> 
        </div>
    </body>
</html>

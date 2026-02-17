<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registrarse</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=lilita-one:400" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css/register.css') }}">
        <link rel="stylesheet" href="{{ asset('css/login-footer.css') }}">
    </head>

    <body>
        <div class="mq-register">
            <div class="mq-register-top">
                <div class="mq-register-left">
                    <a class="mq-back-link" href="{{ route('login') }}" aria-label="Volver">
                        <span class="mq-back-button-box" aria-hidden="true">
                            <span class="mq-back-button-elem">
                                <svg viewBox="0 0 46 40" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"></path>
                                </svg>
                            </span>
                            <span class="mq-back-button-elem">
                                <svg viewBox="0 0 46 40" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"></path>
                                </svg>
                            </span>
                        </span>
                    </a>

                    <div class="mq-register-card" aria-label="Registrarse">
                        <h1 class="mq-register-title">REGISTRARSE</h1>

                        @if ($errors->any())
                            <div class="mq-errors">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form class="mq-register-form" method="POST" action="{{ route('register.store') }}">
                            @csrf

                            <div class="mq-register-grid">
                                <div class="mq-field">
                                    <label for="first_name">Nombres</label>
                                    <input class="mq-input" id="first_name" name="first_name" type="text" value="{{ old('first_name') }}" required autocomplete="given-name">
                                </div>

                                <div class="mq-field">
                                    <label for="last_name">Apellidos</label>
                                    <input class="mq-input" id="last_name" name="last_name" type="text" value="{{ old('last_name') }}" required autocomplete="family-name">
                                </div>
                            </div>

                            <div class="mq-field mq-field-full">
                                <label for="email">Correo</label>
                                <input class="mq-input" id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>

                            <div class="mq-field mq-field-full">
                                <label for="password">Contraseña</label>
                                <input class="mq-input" id="password" name="password" type="password" required autocomplete="new-password">
                            </div>

                            <div class="mq-field mq-field-full">
                                <label for="password_confirmation">Confirmar contraseña</label>
                                <input class="mq-input" id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password">
                            </div>

                            <button class="mq-btn" type="submit">REGISTRARSE</button>

                            <div class="mq-bottom-text">
                                ¿Ya tienes una cuenta?
                                <a href="{{ route('login') }}">Inicia Sesion AQUÍ</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="mq-register-right" aria-hidden="true">
                    <img class="mq-register-illustration" src="{{ asset('img/login.jpg') }}" alt="">
                </div>
            </div>

            @include('auth.partials.login-footer')
        </div>
    </body>
</html>

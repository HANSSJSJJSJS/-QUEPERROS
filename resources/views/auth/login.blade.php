<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Iniciar sesión</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=lilita-one:400" rel="stylesheet" />

        <style>
            :root {
                --mq-purple: #9b59b6;
                --mq-purple-2: #b57cc4;
                --mq-gray: #d9d9d9;
                --mq-black: #111111;
                --mq-shadow: 0 14px 24px rgba(0, 0, 0, 0.16);
                --mq-radius: 18px;
            }

            * { box-sizing: border-box; }

            body {
                margin: 0;
                font-family: "Instrument Sans", system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
                color: var(--mq-black);
                background: #ffffff;
            }

            .mq-login {
                min-height: 100svh;
                display: grid;
                grid-template-rows: 1fr auto;
            }

            .mq-login-top {
                display: grid;
                grid-template-columns: 1fr 1fr;
                min-height: 0;
            }

            .mq-login-left {
                padding: 64px 54px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: #ffffff;
                position: relative;
            }

            .mq-login-right {
                background: var(--mq-gray);
                display: flex;
                align-items: center;
                justify-content: center;
                font-family: "Instrument Sans", system-ui, sans-serif;
                font-weight: 900;
                font-size: clamp(36px, 5vw, 64px);
                letter-spacing: 0.02em;
            }

            .mq-login-card {
                width: min(520px, 100%);
                background: #ffffff;
                border: 1.6px solid rgba(0,0,0,0.35);
                border-radius: 20px;
                box-shadow: var(--mq-shadow);
                padding: 28px 26px 22px;
                position: relative;
            }

            .mq-login-card::before {
                content: "";
                position: absolute;
                left: 18px;
                top: 14px;
                width: calc(100% - 36px);
                height: 28px;
                border: 1.6px solid rgba(0,0,0,0.35);
                border-bottom: 0;
                border-radius: 16px 16px 0 0;
                background: #ffffff;
            }

            .mq-login-title {
                margin: 0 0 22px;
                text-align: center;
                font-family: "Lilita One", system-ui, sans-serif;
                font-size: 34px;
                letter-spacing: 0.04em;
            }

            .mq-login-form {
                display: grid;
                gap: 16px;
            }

            .mq-field label {
                display: block;
                font-weight: 800;
                margin-bottom: 8px;
            }

            .mq-input {
                width: 100%;
                padding: 14px 16px;
                border-radius: 999px;
                border: 1.6px solid rgba(0,0,0,0.35);
                outline: none;
                font-size: 16px;
                background: #ffffff;
            }

            .mq-actions {
                display: grid;
                gap: 10px;
                align-items: center;
                margin-top: 4px;
            }

            .mq-forgot {
                text-align: right;
                font-size: 13px;
                color: #111;
                text-decoration: none;
                opacity: 0.85;
            }

            .mq-btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                border: 0;
                cursor: pointer;
                border-radius: 999px;
                padding: 12px 16px;
                font-family: "Lilita One", system-ui, sans-serif;
                font-size: 22px;
                letter-spacing: 0.04em;
                background: var(--mq-purple);
                color: #ffffff;
                box-shadow: 0 8px 0 rgba(0,0,0,0.22);
            }

            .mq-bottom-text {
                margin-top: 10px;
                text-align: center;
                font-size: 13px;
            }

            .mq-bottom-text a {
                color: #111;
                font-weight: 900;
                text-decoration: none;
            }

            .mq-errors {
                margin: 0 0 14px;
                padding: 10px 12px;
                border-radius: 12px;
                background: rgba(220, 38, 38, 0.08);
                border: 1px solid rgba(220, 38, 38, 0.25);
                color: #7f1d1d;
                font-size: 13px;
            }

            .mq-login-bottom {
                background: var(--mq-purple-2);
                color: #fff;
                padding: 34px 44px;
                display: grid;
                grid-template-columns: minmax(220px, 420px) 1fr 1fr;
                align-items: end;
                gap: 40px;
            }

            .mq-footer-brand {
                font-family: "Lilita One", system-ui, sans-serif;
                font-size: 44px;
                line-height: 0.9;
            }

            .mq-footer-tag {
                font-family: "Instrument Sans", system-ui, sans-serif;
                font-weight: 800;
                font-size: 13px;
                margin-top: 10px;
                opacity: 0.95;
            }

            .mq-footer-col h3 {
                margin: 0 0 10px;
                font-family: "Lilita One", system-ui, sans-serif;
                letter-spacing: 0.06em;
                font-size: 20px;
                text-transform: uppercase;
            }

            .mq-footer-line {
                height: 3px;
                width: 100%;
                background: rgba(255,255,255,0.85);
                border-radius: 999px;
            }

            @media (max-width: 980px) {
                .mq-login-top {
                    grid-template-columns: 1fr;
                }

                .mq-login-right {
                    display: none;
                }

                .mq-login-left {
                    padding: 38px 18px;
                }

                .mq-login-bottom {
                    grid-template-columns: 1fr;
                    gap: 22px;
                    align-items: start;
                }

                .mq-footer-col {
                    max-width: 420px;
                }
            }
        </style>
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

                <div class="mq-login-right">ilustracion</div>
            </div>

            <footer class="mq-login-bottom" aria-label="Pie de página">
                <div>
                    <div class="mq-footer-brand">MAS QUE<br>PERROS</div>
                    <div class="mq-footer-tag">TU PERRO FELIZ,<br>TU TRANQUILO</div>
                </div>

                <div class="mq-footer-col">
                    <h3>CONTACTO</h3>
                    <div class="mq-footer-line"></div>
                </div>

                <div class="mq-footer-col">
                    <h3>SERVICIOS</h3>
                    <div class="mq-footer-line"></div>
                </div>
            </footer>
        </div>
    </body>
</html>

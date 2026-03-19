@php
    use Illuminate\Support\Str;
    $mqTopbarUser = $user ?? (\Illuminate\Support\Facades\Auth::user());
    $mqTopbarName = Str::before($mqTopbarUser->name ?? 'Usuario', ' ');
    $mqTopbarRoleLabel = $roleLabel ?? '';
    $mqTopbarNotifCount = $notifCount ?? 2;

    $mqTopbarProfileUrl = $profileUrl ?? '#';
    $mqTopbarSettingsUrl = $settingsUrl ?? '#';
    $mqTopbarHelpUrl = $helpUrl ?? '#';
    $mqTopbarNotificationsUrl = $notificationsUrl ?? '#';
@endphp

<header class="mqx-topbar" aria-label="Barra superior">
    <div class="mqx-topbar-right">
        <button class="mqx-topbar-icon" type="button" aria-label="Notificaciones" data-mqx-toggle="notifications">
            <i class="bi bi-bell" aria-hidden="true"></i>
            <span class="mqx-topbar-dot" aria-hidden="true">{{ $mqTopbarNotifCount }}</span>
        </button>

        <button class="mqx-topbar-user" type="button" aria-label="Menú de usuario" data-mqx-toggle="user">
            <div class="mqx-topbar-user-avatar" aria-hidden="true">{{ strtoupper(mb_substr($mqTopbarUser->name ?? 'U', 0, 1)) }}</div>
            <span class="mqx-topbar-user-name">{{ $mqTopbarName }}</span>
            <i class="bi bi-chevron-down" aria-hidden="true"></i>
        </button>
    </div>

    <div class="mqx-popover" data-mqx-popover="user" hidden>
        <div class="mqx-popover-head">
            <div class="mqx-popover-name">{{ $mqTopbarName }}</div>
            @if (!empty($mqTopbarRoleLabel))
                <div class="mqx-popover-role">{{ $mqTopbarRoleLabel }}</div>
            @endif
        </div>

        <div class="mqx-popover-body">
            <a class="mqx-popover-item" href="{{ $mqTopbarProfileUrl }}">
                <i class="bi bi-person" aria-hidden="true"></i>
                <span>Mi perfil</span>
            </a>
            <a class="mqx-popover-item" href="{{ $mqTopbarSettingsUrl }}">
                <i class="bi bi-gear" aria-hidden="true"></i>
                <span>Configuracion</span>
            </a>
            <a class="mqx-popover-item" href="{{ $mqTopbarHelpUrl }}">
                <i class="bi bi-question-circle" aria-hidden="true"></i>
                <span>Ayuda</span>
            </a>

            <div class="mqx-popover-divider" aria-hidden="true"></div>

            <form method="POST" action="{{ route('logout') }}" class="mqx-popover-logout">
                @csrf
                <button type="submit">
                    <i class="bi bi-box-arrow-right" aria-hidden="true"></i>
                    <span>Cerrar sesion</span>
                </button>
            </form>
        </div>
    </div>

    <div class="mqx-popover mqx-popover--wide" data-mqx-popover="notifications" hidden>
        <div class="mqx-popover-head mqx-popover-head--row">
            <div class="mqx-popover-name">Notificaciones</div>
            <button class="mqx-popover-action" type="button">Marcar todo como leido</button>
        </div>

        <div class="mqx-notif-list">
            <div class="mqx-notif-item">
                <div class="mqx-notif-dot" aria-hidden="true"></div>
                <div class="mqx-notif-body">
                    <div class="mqx-notif-title">Cita confirmada</div>
                    <div class="mqx-notif-sub">Tu cita para Rocky el 15 de marzo ha sido confirmada</div>
                    <div class="mqx-notif-time">Hace 2h</div>
                </div>
            </div>
            <div class="mqx-notif-item">
                <div class="mqx-notif-dot" aria-hidden="true"></div>
                <div class="mqx-notif-body">
                    <div class="mqx-notif-title">Vacuna pendiente</div>
                    <div class="mqx-notif-sub">Luna necesita su vacuna de refuerzo</div>
                    <div class="mqx-notif-time">Hace 1 dia</div>
                </div>
            </div>
            <div class="mqx-notif-item mqx-notif-item--plain">
                <div class="mqx-notif-body">
                    <div class="mqx-notif-title">Promocion especial</div>
                    <div class="mqx-notif-sub">20% de descuento en guarderia este mes</div>
                    <div class="mqx-notif-time">Hace 3 dias</div>
                </div>
            </div>
        </div>

        <a class="mqx-notif-footer" href="{{ $mqTopbarNotificationsUrl }}">Ver todas las notificaciones</a>
    </div>
</header>

<script>
    (function () {
        const scriptEl = document.currentScript;
        const root = (scriptEl && scriptEl.previousElementSibling && scriptEl.previousElementSibling.classList.contains('mqx-topbar'))
            ? scriptEl.previousElementSibling
            : (scriptEl && scriptEl.parentElement && scriptEl.parentElement.querySelector('.mqx-topbar'))
                ? scriptEl.parentElement.querySelector('.mqx-topbar')
                : document.querySelector('.mqx-topbar');
        if (!root) return;

        const popovers = {
            user: root.querySelector('[data-mqx-popover="user"]'),
            notifications: root.querySelector('[data-mqx-popover="notifications"]'),
        };

        const hideAll = (except) => {
            Object.keys(popovers).forEach((key) => {
                if (key === except) return;
                const el = popovers[key];
                if (!el) return;
                el.hidden = true;
            });
        };

        root.addEventListener('click', (e) => {
            const btn = e.target.closest('[data-mqx-toggle]');
            if (!btn) return;
            const target = btn.getAttribute('data-mqx-toggle');
            const el = popovers[target];
            if (!el) return;

            const willShow = el.hidden;
            hideAll(willShow ? target : null);
            el.hidden = !willShow;
            e.stopPropagation();
        });

        document.addEventListener('click', (e) => {
            if (root.contains(e.target)) return;
            hideAll(null);
        });

        document.addEventListener('keydown', (e) => {
            if (e.key !== 'Escape') return;
            hideAll(null);
        });
    })();
</script>

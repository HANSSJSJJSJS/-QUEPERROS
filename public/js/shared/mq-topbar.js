(function () {
    const topbars = Array.from(document.querySelectorAll('.mqx-topbar'));
    if (!topbars.length) return;

    const initPopovers = (root) => {
        const popovers = {
            user: root.querySelector('[data-mqx-popover="user"]'),
            notifications: root.querySelector('[data-mqx-popover="notifications"]'),
        };

        const isOpen = (el) => !!el && el.classList.contains('mqx-popover--open');

        const openPopover = (el) => {
            if (!el) return;
            el.classList.add('mqx-popover--open');
            el.setAttribute('aria-hidden', 'false');
        };

        const closePopover = (el) => {
            if (!el) return;
            el.classList.remove('mqx-popover--open');
            el.setAttribute('aria-hidden', 'true');
        };

        const hideAll = (except) => {
            Object.keys(popovers).forEach((key) => {
                if (key === except) return;
                closePopover(popovers[key]);
            });
        };

        root.addEventListener('click', (e) => {
            const btn = e.target.closest('[data-mqx-toggle]');
            if (!btn) return;

            const target = btn.getAttribute('data-mqx-toggle');
            const el = popovers[target];
            if (!el) return;

            const willShow = !isOpen(el);
            hideAll(willShow ? target : null);
            if (willShow) openPopover(el);
            else closePopover(el);

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
    };

    const initSidebarToggleSync = () => {
        const adminLayout = document.querySelector('.admin-layout');
        const mqDashboard = document.querySelector('.mq-dashboard');

        const scope = adminLayout ? 'admin' : (mqDashboard ? 'mq' : null);
        if (!scope) return;

        const storageKey = scope === 'admin' ? 'mq.sidebarCollapsed.admin' : 'mq.sidebarCollapsed.mq';

        const topbarToggleCheckbox = document.getElementById('mqxSidebarCheckbox');
        if (!topbarToggleCheckbox) return;

        const setState = (next) => {
            if (scope === 'admin') {
                adminLayout?.classList.toggle('is-sidebar-collapsed', next);
            } else {
                mqDashboard?.classList.toggle('is-sidebar-collapsed', next);
            }

            const adminCheckbox = document.getElementById('adminSidebarCheckbox');
            const mqCheckbox = document.getElementById('mqSidebarCheckbox');

            if (adminCheckbox) adminCheckbox.checked = next;
            if (mqCheckbox) mqCheckbox.checked = next;
            topbarToggleCheckbox.checked = next;

            localStorage.setItem(storageKey, next ? '1' : '0');
        };

        const initCollapsed = localStorage.getItem(storageKey) === '1';
        setState(initCollapsed);

        const adminCheckbox = document.getElementById('adminSidebarCheckbox');
        const mqCheckbox = document.getElementById('mqSidebarCheckbox');

        adminCheckbox?.addEventListener('change', () => setState(!!adminCheckbox.checked));
        mqCheckbox?.addEventListener('change', () => setState(!!mqCheckbox.checked));
        topbarToggleCheckbox.addEventListener('change', () => setState(!!topbarToggleCheckbox.checked));
    };

    topbars.forEach(initPopovers);
    initSidebarToggleSync();
})();

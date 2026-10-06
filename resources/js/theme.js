(function () {
    document.querySelectorAll('[data-zk-theme-switcher]').forEach(function (root) {
        var key = root.getAttribute('data-storage-key') || 'zk-theme';
        var attribute = root.getAttribute('data-attribute') || 'data-theme';
        var apply = function (mode) {
            if ('system' === mode) { document.documentElement.removeAttribute(attribute); } else { document.documentElement.setAttribute(attribute, mode); }
            root.querySelectorAll('[data-mode]').forEach(function (button) { button.setAttribute('aria-pressed', button.getAttribute('data-mode') === mode ? 'true' : 'false'); });
        };
        var stored = null;
        try { stored = window.localStorage.getItem(key); } catch (error) { stored = null; }
        apply(stored || root.getAttribute('data-default') || 'system');
        root.addEventListener('click', function (event) {
            var button = event.target.closest('[data-mode]');
            if (!button) { return; }
            var mode = button.getAttribute('data-mode');
            try { window.localStorage.setItem(key, mode); } catch (error) { /* the choice is kept for this page only */ }
            apply(mode);
        });
    });
})();

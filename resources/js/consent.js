(function () {
    document.querySelectorAll('[data-zk-consent]').forEach(function (banner) {
        var key = banner.getAttribute('data-storage-key') || 'zk-consent';
        var stored = null;
        try { stored = window.localStorage.getItem(key); } catch (error) { stored = null; }
        if (null === stored) { banner.hidden = false; }
        banner.addEventListener('click', function (event) {
            var button = event.target.closest('[data-zk-consent-action]');
            if (!button) { return; }
            var action = button.getAttribute('data-zk-consent-action');
            var choice = {};
            banner.querySelectorAll('input[data-category]').forEach(function (input) {
                choice[input.getAttribute('data-category')] = 'accept' === action ? true : ('reject' === action ? input.disabled : input.checked);
            });
            try { window.localStorage.setItem(key, JSON.stringify(choice)); } catch (error) { /* asked again next time */ }
            banner.hidden = true;
            document.dispatchEvent(new CustomEvent('zk:consent', { detail: choice }));
        });
    });
})();

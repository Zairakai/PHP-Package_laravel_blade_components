(function () {
    document.addEventListener('click', function (event) {
        var button = event.target.closest('[data-zk-share]');
        if (!button) { return; }
        var data = { title: button.getAttribute('data-title') || document.title, text: button.getAttribute('data-text') || '', url: button.getAttribute('data-url') || window.location.href };
        var done = function () {
            button.setAttribute('data-copied', '');
            var status = button.querySelector('[role="status"]');
            if (status) { status.textContent = button.getAttribute('data-copied-label') || ''; }
            setTimeout(function () { button.removeAttribute('data-copied'); if (status) { status.textContent = ''; } }, 2000);
        };
        if (navigator.share) {
            navigator.share(data).catch(function () {});
        } else if (navigator.clipboard) {
            navigator.clipboard.writeText(data.url).then(done);
        }
    });
})();

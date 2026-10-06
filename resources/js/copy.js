(function () {
    document.addEventListener('click', function (event) {
        var button = event.target.closest('[data-zk-copy]');
        if (!button || !navigator.clipboard) { return; }
        var source = button.getAttribute('data-zk-copy');
        var text = '#' === source.charAt(0) ? (document.querySelector(source) || {}).textContent || '' : source;
        navigator.clipboard.writeText(text.trim()).then(function () {
            button.setAttribute('data-copied', '');
            setTimeout(function () { button.removeAttribute('data-copied'); }, 2000);
        });
    });
})();

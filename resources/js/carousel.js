(function () {
    var reduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    document.querySelectorAll('[data-zk-carousel]').forEach(function (root) {
        var track = root.querySelector('.carousel-track') || root;
        var slides = Array.prototype.filter.call(track.children, function (child) { return child.classList.contains('carousel-slide'); });
        var dots = Array.prototype.slice.call(root.querySelectorAll('.carousel-indicator'));
        var index = function () { return track.clientWidth ? Math.round(track.scrollLeft / track.clientWidth) : 0; };
        var mark = function () {
            dots.forEach(function (dot, position) {
                if (position === index()) { dot.setAttribute('aria-current', 'true'); } else { dot.removeAttribute('aria-current'); }
            });
        };
        var go = function (position) {
            var count = slides.length;
            var loopable = 'false' !== root.getAttribute('data-loop');
            var next = loopable ? (position + count) % count : Math.max(0, Math.min(count - 1, position));
            track.scrollTo({ left: slides[next].offsetLeft - track.offsetLeft, behavior: reduced ? 'auto' : 'smooth' });
        };
        root.querySelectorAll('[data-zk-carousel-previous], [data-zk-carousel-next]').forEach(function (button) {
            button.hidden = false;
            button.addEventListener('click', function () { go(index() + (button.hasAttribute('data-zk-carousel-next') ? 1 : -1)); });
        });
        track.addEventListener('scroll', function () { window.requestAnimationFrame(mark); });
        mark();
        var delay = parseInt(root.getAttribute('data-autoplay') || '0', 10);
        if (!delay || reduced || slides.length < 2) { return; }
        var loop = 'false' !== root.getAttribute('data-loop');
        var paused = false;
        ['mouseenter', 'focusin'].forEach(function (name) { root.addEventListener(name, function () { paused = true; }); });
        ['mouseleave', 'focusout'].forEach(function (name) { root.addEventListener(name, function () { paused = false; }); });
        root.setAttribute('aria-live', 'off');
        setInterval(function () {
            if (paused || document.hidden) { return; }
            var next = index() + 1;
            if (next >= slides.length) {
                if (!loop) { return; }
                next = 0;
            }
            track.scrollTo({ left: slides[next].offsetLeft - track.offsetLeft, behavior: 'smooth' });
        }, delay);
    });
})();

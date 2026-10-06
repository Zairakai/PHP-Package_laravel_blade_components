(function () {
    var pad = function (value) { return value < 10 ? '0' + value : String(value); };
    var timers = document.querySelectorAll('time[data-zk-countdown]');
    var tick = function () {
        timers.forEach(function (element) {
            var left = Math.max(0, Math.floor((new Date(element.getAttribute('data-zk-countdown')).getTime() - Date.now()) / 1000));
            var parts = { days: Math.floor(left / 86400), hours: Math.floor(left / 3600) % 24, minutes: Math.floor(left / 60) % 60, seconds: left % 60 };
            element.querySelectorAll('[data-unit]').forEach(function (part) {
                var unit = part.getAttribute('data-unit');
                var suffix = part.getAttribute('data-suffix') || '';
                part.textContent = ('days' === unit ? parts[unit] : pad(parts[unit])) + suffix;
            });
        });
    };
    if (timers.length) { tick(); setInterval(tick, 1000); }
})();

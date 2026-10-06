(function () {
    document.addEventListener('click', function (event) {
        var button = event.target.closest('[data-zk-dismiss]');
        if (!button) { return; }
        var target = button.closest(button.getAttribute('data-zk-dismiss'));
        if (target) { target.remove(); }
    });
})();

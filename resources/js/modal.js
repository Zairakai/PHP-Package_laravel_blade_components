(function () {
    document.addEventListener('click', function (event) {
        var button = event.target.closest('[data-zk-modal]');
        if (!button) { return; }
        var dialog = document.getElementById(button.getAttribute('data-zk-modal'));
        if (dialog && dialog.showModal && !dialog.open) { dialog.showModal(); }
    });
})();

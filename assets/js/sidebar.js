// Đóng/mở sidebar trên màn hình nhỏ
(function () {
    var shell = document.getElementById('appShell');
    var toggle = document.getElementById('sidebarToggle');
    var backdrop = document.getElementById('sidebarBackdrop');
    if (!shell) { return; }
    if (toggle) {
        toggle.addEventListener('click', function () { shell.classList.toggle('sidebar-open'); });
    }
    if (backdrop) {
        backdrop.addEventListener('click', function () { shell.classList.remove('sidebar-open'); });
    }
})();

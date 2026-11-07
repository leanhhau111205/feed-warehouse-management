<?php
/** Mở <body>, khung ứng dụng và sidebar theo vai trò. Biến: $page */
?>
<body class="app-body">
<div class="app-shell" id="appShell">
    <?php render_sidebar($page['module']); ?>
    <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

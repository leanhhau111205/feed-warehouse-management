<?php
/** Thanh trên cùng + mở vùng nội dung (breadcrumb, tiêu đề, thông báo). Biến: $page */
$user = current_user();
?>
    <div class="main">
        <header class="topbar">
            <button type="button" class="icon-btn" id="sidebarToggle" aria-label="Mở/đóng menu"><?= icon('menu', 20) ?></button>
            <div class="topbar-title"><?= e(config('short_name')) ?> &middot; <?= e(config('name')) ?></div>
            <div class="topbar-user">
                <img class="avatar" src="<?= e(asset('images/avatar-default.png')) ?>" alt="">
                <div class="topbar-user-info">
                    <b><?= e($user['hoTen'] ?? '') ?></b>
                    <small><?= e(ROLE_LABELS[$user['role'] ?? ''] ?? '') ?></small>
                </div>
                <a class="icon-btn" href="<?= e(url('logout.php')) ?>" title="Đăng xuất" aria-label="Đăng xuất"><?= icon('logout', 20) ?></a>
            </div>
        </header>
        <main class="content">
            <?php
            render_breadcrumb($page['breadcrumb']);
            render_page_title($page['title'], $page['subtitle'], $page['actions']);
            render_flash();
            ?>

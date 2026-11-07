<?php
/**
 * Đăng nhập. Tài khoản nằm ở bảng TaiKhoan (gắn với NhanVien); vai trò lấy từ NhanVien.vaiTro.
 */
require_once __DIR__ . '/includes/init.php';

if (is_logged_in()) {
    redirect('modules/dashboard/index.php');
}

$error = '';
$username = '';

if (is_post()) {
    $username = trim((string)($_POST['username'] ?? ''));
    $password = (string)($_POST['password'] ?? '');

    if (!csrf_verify()) {
        $error = 'Phiên làm việc đã hết hạn, vui lòng thử lại.';
    } elseif ($username === '' || $password === '') {
        $error = 'Vui lòng nhập tên đăng nhập và mật khẩu.';
    } else {
        $error = attempt_login($username, $password) ?? '';
        if ($error === '') {
            redirect('modules/dashboard/index.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập | <?= e(config('name')) ?></title>
    <link rel="stylesheet" href="<?= e(asset('css/reset.css')) ?>">
    <link rel="stylesheet" href="<?= e(asset('css/variables.css')) ?>">
    <link rel="stylesheet" href="<?= e(asset('css/layout.css')) ?>">
    <link rel="stylesheet" href="<?= e(asset('css/components.css')) ?>">
</head>
<body class="login-body">
<main class="login-card">
    <img class="login-logo" src="<?= e(asset('images/logo.png')) ?>" alt="Logo">
    <h1><?= e(config('name')) ?></h1>
    <p class="muted">Đăng nhập để tiếp tục</p>

    <?php if ($error !== ''): ?>
        <?php render_alert('error', $error); ?>
    <?php endif; ?>

    <form method="post" data-validate novalidate>
        <?= csrf_field() ?>
        <div class="field">
            <label for="username">Tên đăng nhập</label>
            <input type="text" id="username" name="username" value="<?= e($username) ?>" autocomplete="username" required autofocus>
        </div>
        <div class="field">
            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" autocomplete="current-password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
    </form>
</main>
<script src="<?= e(asset('js/validation.js')) ?>"></script>
</body>
</html>

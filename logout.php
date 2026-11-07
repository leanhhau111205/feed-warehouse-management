<?php
/**
 * Đăng xuất.
 */
require_once __DIR__ . '/includes/init.php';

logout_user();
flash_set('success', 'Bạn đã đăng xuất.');
redirect('login.php');

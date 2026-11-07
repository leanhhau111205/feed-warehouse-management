<?php
/**
 * Cổng vào hệ thống: chưa đăng nhập -> login.php, đã đăng nhập -> Tổng quan.
 */
require_once __DIR__ . '/includes/init.php';

redirect(is_logged_in() ? 'modules/dashboard/index.php' : 'login.php');

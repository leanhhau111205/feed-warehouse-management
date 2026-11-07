<?php
/**
 * Khởi tạo chung - mọi trang chỉ cần: require_once <đường dẫn>/includes/init.php
 * Nạp cấu hình, session, hàm dùng chung, xác thực, phân quyền và các component giao diện.
 */
if (defined('APP_INIT')) {
    return;
}
define('APP_INIT', true);

define('ROOT_PATH', dirname(__DIR__));
define('INCLUDES_PATH', ROOT_PATH . '/includes');

$GLOBALS['APP_CONFIG'] = require ROOT_PATH . '/config/app.php';
$GLOBALS['DB_CONFIG']  = require ROOT_PATH . '/config/database.php';
require_once ROOT_PATH . '/config/constants.php';

date_default_timezone_set($GLOBALS['APP_CONFIG']['timezone'] ?? 'Asia/Ho_Chi_Minh');

if (!empty($GLOBALS['APP_CONFIG']['debug'])) {
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', '0');
}

if (session_status() === PHP_SESSION_NONE) {
    session_name($GLOBALS['APP_CONFIG']['session_name'] ?? 'qlk_session');
    if (PHP_VERSION_ID >= 70300) {
        session_set_cookie_params(['httponly' => true, 'samesite' => 'Lax']);
    }
    session_start();
}

require_once INCLUDES_PATH . '/helpers.php';
require_once INCLUDES_PATH . '/permission.php';
require_once INCLUDES_PATH . '/auth.php';

foreach (['alert', 'breadcrumb', 'page-title', 'pagination', 'search-form', 'data-table', 'confirm-modal', 'sidebar'] as $component) {
    require_once INCLUDES_PATH . '/components/' . $component . '.php';
}

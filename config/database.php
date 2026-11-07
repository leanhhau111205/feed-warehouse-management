<?php
/**
 * Cấu hình kết nối MySQL
 * Hỗ trợ cả XAMPP và Docker.
 */
return [
    'host' => getenv('DB_HOST') ?: '127.0.0.1',

    'port' => (int) (getenv('DB_PORT') ?: 3306),

    'database' => getenv('DB_NAME') ?: 'quan_ly_kho_thuc_an',

    'user' => getenv('DB_USER') ?: 'root',

    'password' => getenv('DB_PASSWORD') !== false
        ? getenv('DB_PASSWORD')
        : '',

    'charset' => 'utf8mb4',
];

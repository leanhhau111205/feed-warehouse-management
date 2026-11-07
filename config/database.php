<?php
/**
 * Kết nối MySQL/MariaDB (XAMPP mặc định). Một CSDL duy nhất: database/schema.sql.
 * Hàm truy vấn (db_all, db_one, db_exec...) nằm trong includes/helpers.php.
 */
return [
    'host'     => '127.0.0.1',
    'port'     => 3306,
    'database' => 'quan_ly_kho_thuc_an',
    'user'     => 'root',
    'password' => '',
    'charset'  => 'utf8mb4',
];

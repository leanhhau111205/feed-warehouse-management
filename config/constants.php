<?php
/**
 * Hằng số dùng chung: vai trò, nhãn, menu theo vai trò.
 * Thêm vai trò mới: khai báo ở đây + tạo includes/menus/menu-<tên>.php + thêm cột trong includes/permission.php.
 */

// Khóa vai trò dùng trong code
const ROLE_ADMIN     = 'admin';       // Quản trị viên
const ROLE_MANAGER   = 'manager';     // Quản lý kho
const ROLE_WAREHOUSE = 'warehouse';   // Nhân viên kho
const ROLE_INVENTORY = 'inventory';   // Nhân viên kiểm kê / kiểm tra chất lượng (QC)
const ROLE_DIRECTOR  = 'director';    // Ban giám đốc

// Nhãn hiển thị
const ROLE_LABELS = [
    ROLE_ADMIN     => 'Quản trị viên',
    ROLE_MANAGER   => 'Quản lý kho',
    ROLE_WAREHOUSE => 'Nhân viên kho',
    ROLE_INVENTORY => 'Nhân viên kiểm kê / QC',
    ROLE_DIRECTOR  => 'Ban giám đốc',
];

// Giá trị cột NhanVien.vaiTro trong CSDL -> khóa vai trò
const ROLE_FROM_DB = [
    'Quản trị viên'     => ROLE_ADMIN,
    'Quản lý kho'       => ROLE_MANAGER,
    'Nhân viên kho'     => ROLE_WAREHOUSE,
    'Nhân viên kiểm kê' => ROLE_INVENTORY,
    'Nhân viên QC'      => ROLE_INVENTORY,
    'Ban giám đốc'      => ROLE_DIRECTOR,
];

// File menu của từng vai trò (trong includes/menus/)
const ROLE_MENU_FILES = [
    ROLE_ADMIN     => 'menu-admin.php',
    ROLE_MANAGER   => 'menu-manager.php',
    ROLE_WAREHOUSE => 'menu-warehouse.php',
    ROLE_INVENTORY => 'menu-inventory.php',
    ROLE_DIRECTOR  => 'menu-director.php',
];

// File CSS riêng của từng module (assets/css/pages/<tên>.css)
const MODULE_CSS = [
    'dashboard'       => 'dashboard',
    'hang-hoa'        => 'products',
    'lo-hang'         => 'products',
    'tiep-nhan'       => 'receiving',
    'chat-luong'      => 'receiving',
    'nhap-kho'        => 'receiving',
    'vi-tri-luu-tru'  => 'storage',
    'gan-lo-hang'     => 'storage',
    'dieu-chuyen'     => 'transfer',
    'xuat-kho'        => 'outbound',
    'kiem-ke'         => 'inventory',
    'hang-bat-thuong' => 'inventory',
    'ton-kho'         => 'inventory',
    'bao-cao'         => 'inventory',
];

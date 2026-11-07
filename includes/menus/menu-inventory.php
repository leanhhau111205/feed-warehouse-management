<?php
/**
 * Menu sidebar - Nhân viên kiểm kê / QC.
 * Mỗi phần: ['title' => tên nhóm, 'items' => [[label, icon, href, module, action], ...]].
 * Sidebar còn kiểm tra lại can(module, action) khi hiển thị nên sửa quyền ở includes/permission.php.
 */
return [
    [
        'title' => 'Tổng quan',
        'items' => [
            ['label' => 'Tổng quan', 'icon' => 'home', 'href' => 'modules/dashboard/index.php', 'module' => 'dashboard', 'action' => 'view'],
        ],
    ],
    [
        'title' => 'Hàng hóa & nhập kho',
        'items' => [
            ['label' => 'Kiểm tra chất lượng', 'icon' => 'clipboard', 'href' => 'modules/chat-luong/index.php', 'module' => 'chat-luong', 'action' => 'view'],
        ],
    ],
    [
        'title' => 'Kiểm kê & báo cáo',
        'items' => [
            ['label' => 'Kiểm kê kho', 'icon' => 'list', 'href' => 'modules/kiem-ke/index.php', 'module' => 'kiem-ke', 'action' => 'view'],
            ['label' => 'Hàng bất thường', 'icon' => 'alert', 'href' => 'modules/hang-bat-thuong/index.php', 'module' => 'hang-bat-thuong', 'action' => 'view'],
            ['label' => 'Tồn kho', 'icon' => 'archive', 'href' => 'modules/ton-kho/index.php', 'module' => 'ton-kho', 'action' => 'view'],
        ],
    ],
];

<?php
/**
 * Menu sidebar - Ban giám đốc.
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
        'title' => 'Kiểm kê & báo cáo',
        'items' => [
            ['label' => 'Tồn kho', 'icon' => 'archive', 'href' => 'modules/ton-kho/index.php', 'module' => 'ton-kho', 'action' => 'view'],
            ['label' => 'Báo cáo', 'icon' => 'chart', 'href' => 'modules/bao-cao/index.php', 'module' => 'bao-cao', 'action' => 'view'],
        ],
    ],
];

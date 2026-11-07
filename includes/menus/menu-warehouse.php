<?php
/**
 * Menu sidebar - Nhân viên kho.
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
            ['label' => 'Hàng hóa', 'icon' => 'package', 'href' => 'modules/hang-hoa/index.php', 'module' => 'hang-hoa', 'action' => 'view'],
            ['label' => 'Lô hàng', 'icon' => 'layers', 'href' => 'modules/lo-hang/index.php', 'module' => 'lo-hang', 'action' => 'view'],
            ['label' => 'Tiếp nhận hàng', 'icon' => 'inbox', 'href' => 'modules/tiep-nhan/index.php', 'module' => 'tiep-nhan', 'action' => 'view'],
            ['label' => 'Nhập kho', 'icon' => 'download', 'href' => 'modules/nhap-kho/index.php', 'module' => 'nhap-kho', 'action' => 'view'],
        ],
    ],
    [
        'title' => 'Lưu trữ & điều chuyển',
        'items' => [
            ['label' => 'Vị trí lưu trữ', 'icon' => 'pin', 'href' => 'modules/vi-tri-luu-tru/index.php', 'module' => 'vi-tri-luu-tru', 'action' => 'view'],
            ['label' => 'Gán lô hàng', 'icon' => 'link', 'href' => 'modules/gan-lo-hang/index.php', 'module' => 'gan-lo-hang', 'action' => 'view'],
            ['label' => 'Điều chuyển nội bộ', 'icon' => 'repeat', 'href' => 'modules/dieu-chuyen/index.php', 'module' => 'dieu-chuyen', 'action' => 'view'],
        ],
    ],
    [
        'title' => 'Xuất kho',
        'items' => [
            ['label' => 'Yêu cầu xuất kho', 'icon' => 'upload', 'href' => 'modules/xuat-kho/yeu-cau/index.php', 'module' => 'xuat-kho', 'action' => 'view'],
            ['label' => 'Đề xuất lô FEFO', 'icon' => 'list', 'href' => 'modules/xuat-kho/fefo.php', 'module' => 'xuat-kho', 'action' => 'fefo'],
            ['label' => 'Phiếu xuất kho', 'icon' => 'clipboard', 'href' => 'modules/xuat-kho/phieu-xuat.php', 'module' => 'xuat-kho', 'action' => 'issue'],
        ],
    ],
    [
        'title' => 'Kiểm kê & báo cáo',
        'items' => [
            ['label' => 'Tồn kho', 'icon' => 'archive', 'href' => 'modules/ton-kho/index.php', 'module' => 'ton-kho', 'action' => 'view'],
        ],
    ],
];

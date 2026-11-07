<?php
/**
 * UC22 - Đề xuất lô hàng xuất kho theo FEFO
 * Quyền: xuat-kho / fefo   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('xuat-kho', 'fefo');

page_begin([
    'title'      => 'Đề xuất lô hàng xuất kho theo FEFO',
    'module'     => 'xuat-kho',
    'breadcrumb' => [['Xuất kho', 'modules/xuat-kho/yeu-cau/index.php'], ['Đề xuất lô hàng xuất kho theo FEFO', null]],
]);

// TODO (UC22): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC22', 'Đề xuất lô hàng xuất kho theo FEFO', 'modules/xuat-kho/fefo.php');

page_end();

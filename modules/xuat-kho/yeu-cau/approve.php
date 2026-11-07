<?php
/**
 * UC21 - Phê duyệt yêu cầu xuất kho
 * Quyền: xuat-kho / approve   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 3) . '/includes/init.php';
require_permission('xuat-kho', 'approve');

page_begin([
    'title'      => 'Phê duyệt yêu cầu xuất kho',
    'module'     => 'xuat-kho',
    'breadcrumb' => [['Yêu cầu xuất kho', 'modules/xuat-kho/yeu-cau/index.php'], ['Phê duyệt yêu cầu xuất kho', null]],
]);

// TODO (UC21): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC21', 'Phê duyệt yêu cầu xuất kho', 'modules/xuat-kho/yeu-cau/approve.php');

page_end();

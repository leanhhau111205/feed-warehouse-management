<?php
/**
 * UC20 - Tra cứu yêu cầu xuất kho
 * Quyền: xuat-kho / view   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 3) . '/includes/init.php';
require_permission('xuat-kho', 'view');

page_begin([
    'title'      => 'Tra cứu yêu cầu xuất kho',
    'module'     => 'xuat-kho',
    'breadcrumb' => [['Yêu cầu xuất kho', null]],
]);

// TODO (UC20): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC20', 'Tra cứu yêu cầu xuất kho', 'modules/xuat-kho/yeu-cau/index.php');

page_end();

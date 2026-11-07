<?php
/**
 * UC10 - Nhập kho
 * Quyền: nhap-kho / view   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('nhap-kho', 'view');

page_begin([
    'title'      => 'Nhập kho',
    'module'     => 'nhap-kho',
    'breadcrumb' => [['Nhập kho', null]],
]);

// TODO (UC10): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC10', 'Nhập kho', 'modules/nhap-kho/index.php');

page_end();

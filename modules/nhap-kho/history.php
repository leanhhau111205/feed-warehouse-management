<?php
/**
 * UC11 - Tra cứu lịch sử nhập kho
 * Quyền: nhap-kho / history   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('nhap-kho', 'history');

page_begin([
    'title'      => 'Tra cứu lịch sử nhập kho',
    'module'     => 'nhap-kho',
    'breadcrumb' => [['Nhập kho', 'modules/nhap-kho/index.php'], ['Tra cứu lịch sử nhập kho', null]],
]);

// TODO (UC11): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC11', 'Tra cứu lịch sử nhập kho', 'modules/nhap-kho/history.php');

page_end();

<?php
/**
 * UC10 - Lập phiếu nhập kho
 * Quyền: nhap-kho / create   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('nhap-kho', 'create');

page_begin([
    'title'      => 'Lập phiếu nhập kho',
    'module'     => 'nhap-kho',
    'breadcrumb' => [['Nhập kho', 'modules/nhap-kho/index.php'], ['Lập phiếu nhập kho', null]],
]);

// TODO (UC10): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC10', 'Lập phiếu nhập kho', 'modules/nhap-kho/create.php');

page_end();

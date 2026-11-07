<?php
/**
 * UC02 - Sửa thông tin hàng hóa
 * Quyền: hang-hoa / edit   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('hang-hoa', 'edit');

page_begin([
    'title'      => 'Sửa thông tin hàng hóa',
    'module'     => 'hang-hoa',
    'breadcrumb' => [['Hàng hóa', 'modules/hang-hoa/index.php'], ['Sửa thông tin hàng hóa', null]],
]);

// TODO (UC02): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC02', 'Sửa thông tin hàng hóa', 'modules/hang-hoa/edit.php');

page_end();

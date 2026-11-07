<?php
/**
 * UC01 - Thêm thông tin hàng hóa
 * Quyền: hang-hoa / create   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('hang-hoa', 'create');

page_begin([
    'title'      => 'Thêm thông tin hàng hóa',
    'module'     => 'hang-hoa',
    'breadcrumb' => [['Hàng hóa', 'modules/hang-hoa/index.php'], ['Thêm thông tin hàng hóa', null]],
]);

// TODO (UC01): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC01', 'Thêm thông tin hàng hóa', 'modules/hang-hoa/create.php');

page_end();

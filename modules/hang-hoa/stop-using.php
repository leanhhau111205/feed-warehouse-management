<?php
/**
 * UC03 - Ngừng sử dụng hàng hóa
 * Quyền: hang-hoa / stop   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('hang-hoa', 'stop');

page_begin([
    'title'      => 'Ngừng sử dụng hàng hóa',
    'module'     => 'hang-hoa',
    'breadcrumb' => [['Hàng hóa', 'modules/hang-hoa/index.php'], ['Ngừng sử dụng hàng hóa', null]],
]);

// TODO (UC03): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC03', 'Ngừng sử dụng hàng hóa', 'modules/hang-hoa/stop-using.php');

page_end();

<?php
/**
 * UC04 - Tra cứu thông tin hàng hóa
 * Quyền: hang-hoa / view   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('hang-hoa', 'view');

page_begin([
    'title'      => 'Tra cứu thông tin hàng hóa',
    'module'     => 'hang-hoa',
    'breadcrumb' => [['Hàng hóa', null]],
]);

// TODO (UC04): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC04', 'Tra cứu thông tin hàng hóa', 'modules/hang-hoa/index.php');

page_end();

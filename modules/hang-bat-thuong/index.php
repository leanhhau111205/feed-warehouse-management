<?php
/**
 * UC28 - Xử lý hàng bất thường
 * Quyền: hang-bat-thuong / view   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('hang-bat-thuong', 'view');

page_begin([
    'title'      => 'Xử lý hàng bất thường',
    'module'     => 'hang-bat-thuong',
    'breadcrumb' => [['Hàng bất thường', null]],
]);

// TODO (UC28): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC28', 'Xử lý hàng bất thường', 'modules/hang-bat-thuong/index.php');

page_end();

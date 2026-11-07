<?php
/**
 * UC17 - Điều chuyển hàng nội bộ
 * Quyền: dieu-chuyen / view   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('dieu-chuyen', 'view');

page_begin([
    'title'      => 'Điều chuyển hàng nội bộ',
    'module'     => 'dieu-chuyen',
    'breadcrumb' => [['Điều chuyển nội bộ', null]],
]);

// TODO (UC17): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC17', 'Điều chuyển hàng nội bộ', 'modules/dieu-chuyen/index.php');

page_end();

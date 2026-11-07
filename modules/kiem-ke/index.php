<?php
/**
 * UC24 - Kiểm kê kho
 * Quyền: kiem-ke / view   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('kiem-ke', 'view');

page_begin([
    'title'      => 'Kiểm kê kho',
    'module'     => 'kiem-ke',
    'breadcrumb' => [['Kiểm kê kho', null]],
]);

// TODO (UC24): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC24', 'Kiểm kê kho', 'modules/kiem-ke/index.php');

page_end();

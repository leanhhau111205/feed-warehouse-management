<?php
/**
 * UC27 - Xử lý chênh lệch kiểm kê
 * Quyền: kiem-ke / handle   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('kiem-ke', 'handle');

page_begin([
    'title'      => 'Xử lý chênh lệch kiểm kê',
    'module'     => 'kiem-ke',
    'breadcrumb' => [['Kiểm kê kho', 'modules/kiem-ke/index.php'], ['Xử lý chênh lệch kiểm kê', null]],
]);

// TODO (UC27): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC27', 'Xử lý chênh lệch kiểm kê', 'modules/kiem-ke/handle-discrepancy.php');

page_end();

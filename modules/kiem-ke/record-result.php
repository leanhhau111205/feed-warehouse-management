<?php
/**
 * UC25 - Ghi nhận kết quả kiểm kê
 * Quyền: kiem-ke / record   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('kiem-ke', 'record');

page_begin([
    'title'      => 'Ghi nhận kết quả kiểm kê',
    'module'     => 'kiem-ke',
    'breadcrumb' => [['Kiểm kê kho', 'modules/kiem-ke/index.php'], ['Ghi nhận kết quả kiểm kê', null]],
]);

// TODO (UC25): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC25', 'Ghi nhận kết quả kiểm kê', 'modules/kiem-ke/record-result.php');

page_end();

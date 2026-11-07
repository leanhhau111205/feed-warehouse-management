<?php
/**
 * UC26 - Đối chiếu số liệu kiểm kê
 * Quyền: kiem-ke / reconcile   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('kiem-ke', 'reconcile');

page_begin([
    'title'      => 'Đối chiếu số liệu kiểm kê',
    'module'     => 'kiem-ke',
    'breadcrumb' => [['Kiểm kê kho', 'modules/kiem-ke/index.php'], ['Đối chiếu số liệu kiểm kê', null]],
]);

// TODO (UC26): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC26', 'Đối chiếu số liệu kiểm kê', 'modules/kiem-ke/reconcile.php');

page_end();

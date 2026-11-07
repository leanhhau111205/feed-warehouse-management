<?php
/**
 * UC19 - Sửa yêu cầu xuất kho
 * Quyền: xuat-kho / request   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 3) . '/includes/init.php';
require_permission('xuat-kho', 'request');

page_begin([
    'title'      => 'Sửa yêu cầu xuất kho',
    'module'     => 'xuat-kho',
    'breadcrumb' => [['Yêu cầu xuất kho', 'modules/xuat-kho/yeu-cau/index.php'], ['Sửa yêu cầu xuất kho', null]],
]);

// TODO (UC19): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC19', 'Sửa yêu cầu xuất kho', 'modules/xuat-kho/yeu-cau/edit.php');

page_end();

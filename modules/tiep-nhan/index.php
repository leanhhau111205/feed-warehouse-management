<?php
/**
 * UC06 - Tiếp nhận hàng vào kho
 * Quyền: tiep-nhan / view   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('tiep-nhan', 'view');

page_begin([
    'title'      => 'Tiếp nhận hàng vào kho',
    'module'     => 'tiep-nhan',
    'breadcrumb' => [['Tiếp nhận hàng', null]],
]);

// TODO (UC06): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC06', 'Tiếp nhận hàng vào kho', 'modules/tiep-nhan/index.php');

page_end();

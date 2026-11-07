<?php
/**
 * UC06 - Tiếp nhận hàng
 * Quyền: tiep-nhan / create   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('tiep-nhan', 'create');

page_begin([
    'title'      => 'Tiếp nhận hàng',
    'module'     => 'tiep-nhan',
    'breadcrumb' => [['Tiếp nhận hàng', 'modules/tiep-nhan/index.php'], ['Tiếp nhận hàng', null]],
]);

// TODO (UC06): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC06', 'Tiếp nhận hàng', 'modules/tiep-nhan/create.php');

page_end();

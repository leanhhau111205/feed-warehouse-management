<?php
/**
 * UC24 - Lập biên bản kiểm kê
 * Quyền: kiem-ke / create   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('kiem-ke', 'create');

page_begin([
    'title'      => 'Lập biên bản kiểm kê',
    'module'     => 'kiem-ke',
    'breadcrumb' => [['Kiểm kê kho', 'modules/kiem-ke/index.php'], ['Lập biên bản kiểm kê', null]],
]);

// TODO (UC24): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC24', 'Lập biên bản kiểm kê', 'modules/kiem-ke/create.php');

page_end();

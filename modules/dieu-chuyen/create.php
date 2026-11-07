<?php
/**
 * UC17 - Lập phiếu điều chuyển
 * Quyền: dieu-chuyen / create   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('dieu-chuyen', 'create');

page_begin([
    'title'      => 'Lập phiếu điều chuyển',
    'module'     => 'dieu-chuyen',
    'breadcrumb' => [['Điều chuyển nội bộ', 'modules/dieu-chuyen/index.php'], ['Lập phiếu điều chuyển', null]],
]);

// TODO (UC17): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC17', 'Lập phiếu điều chuyển', 'modules/dieu-chuyen/create.php');

page_end();

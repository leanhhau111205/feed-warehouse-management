<?php
/**
 * UC30 - Xem báo cáo tồn kho
 * Quyền: bao-cao / view   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('bao-cao', 'view');

page_begin([
    'title'      => 'Xem báo cáo tồn kho',
    'module'     => 'bao-cao',
    'breadcrumb' => [['Báo cáo', null]],
]);

// TODO (UC30): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC30', 'Xem báo cáo tồn kho', 'modules/bao-cao/index.php');

page_end();

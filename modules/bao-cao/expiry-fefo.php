<?php
/**
 * UC30 - Báo cáo hạn sử dụng theo FEFO
 * Quyền: bao-cao / view   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('bao-cao', 'view');

page_begin([
    'title'      => 'Báo cáo hạn sử dụng theo FEFO',
    'module'     => 'bao-cao',
    'breadcrumb' => [['Báo cáo', 'modules/bao-cao/index.php'], ['Báo cáo hạn sử dụng theo FEFO', null]],
]);

// TODO (UC30): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC30', 'Báo cáo hạn sử dụng theo FEFO', 'modules/bao-cao/expiry-fefo.php');

page_end();

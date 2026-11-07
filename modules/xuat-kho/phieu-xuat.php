<?php
/**
 * UC23 - Lập phiếu xuất kho
 * Quyền: xuat-kho / issue   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('xuat-kho', 'issue');

page_begin([
    'title'      => 'Lập phiếu xuất kho',
    'module'     => 'xuat-kho',
    'breadcrumb' => [['Xuất kho', 'modules/xuat-kho/yeu-cau/index.php'], ['Lập phiếu xuất kho', null]],
]);

// TODO (UC23): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC23', 'Lập phiếu xuất kho', 'modules/xuat-kho/phieu-xuat.php');

page_end();

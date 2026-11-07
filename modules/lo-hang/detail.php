<?php
/**
 * UC05 - Chi tiết lô hàng
 * Quyền: lo-hang / view   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('lo-hang', 'view');

page_begin([
    'title'      => 'Chi tiết lô hàng',
    'module'     => 'lo-hang',
    'breadcrumb' => [['Lô hàng', 'modules/lo-hang/index.php'], ['Chi tiết lô hàng', null]],
]);

// TODO (UC05): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC05', 'Chi tiết lô hàng', 'modules/lo-hang/detail.php');

page_end();

<?php
/**
 * UC16 - Gán lô hàng vào vị trí lưu trữ
 * Quyền: gan-lo-hang / view   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('gan-lo-hang', 'view');

page_begin([
    'title'      => 'Gán lô hàng vào vị trí lưu trữ',
    'module'     => 'gan-lo-hang',
    'breadcrumb' => [['Gán lô hàng', null]],
]);

// TODO (UC16): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC16', 'Gán lô hàng vào vị trí lưu trữ', 'modules/gan-lo-hang/index.php');

page_end();

<?php
/**
 * UC15 - Tra cứu vị trí lưu trữ
 * Quyền: vi-tri-luu-tru / view   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('vi-tri-luu-tru', 'view');

page_begin([
    'title'      => 'Tra cứu vị trí lưu trữ',
    'module'     => 'vi-tri-luu-tru',
    'breadcrumb' => [['Vị trí lưu trữ', null]],
]);

// TODO (UC15): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC15', 'Tra cứu vị trí lưu trữ', 'modules/vi-tri-luu-tru/index.php');

page_end();

<?php
/**
 * UC14 - Ngừng sử dụng vị trí lưu trữ
 * Quyền: vi-tri-luu-tru / stop   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('vi-tri-luu-tru', 'stop');

page_begin([
    'title'      => 'Ngừng sử dụng vị trí lưu trữ',
    'module'     => 'vi-tri-luu-tru',
    'breadcrumb' => [['Vị trí lưu trữ', 'modules/vi-tri-luu-tru/index.php'], ['Ngừng sử dụng vị trí lưu trữ', null]],
]);

// TODO (UC14): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC14', 'Ngừng sử dụng vị trí lưu trữ', 'modules/vi-tri-luu-tru/stop-using.php');

page_end();

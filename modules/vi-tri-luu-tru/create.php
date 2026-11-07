<?php
/**
 * UC12 - Thêm thông tin vị trí lưu trữ
 * Quyền: vi-tri-luu-tru / create   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('vi-tri-luu-tru', 'create');

page_begin([
    'title'      => 'Thêm thông tin vị trí lưu trữ',
    'module'     => 'vi-tri-luu-tru',
    'breadcrumb' => [['Vị trí lưu trữ', 'modules/vi-tri-luu-tru/index.php'], ['Thêm thông tin vị trí lưu trữ', null]],
]);

// TODO (UC12): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC12', 'Thêm thông tin vị trí lưu trữ', 'modules/vi-tri-luu-tru/create.php');

page_end();

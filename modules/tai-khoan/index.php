<?php
/**
 * Quản trị hệ thống - Quản lý tài khoản
 * Quyền: tai-khoan / view   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('tai-khoan', 'view');

page_begin([
    'title'      => 'Quản lý tài khoản',
    'module'     => 'tai-khoan',
    'breadcrumb' => [['Tài khoản', null]],
]);

// TODO (Quản trị hệ thống): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('Hệ thống', 'Quản lý tài khoản', 'modules/tai-khoan/index.php');

page_end();

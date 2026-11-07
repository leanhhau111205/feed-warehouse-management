<?php
/**
 * UC29 - Tra cứu tồn kho
 * Quyền: ton-kho / view   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('ton-kho', 'view');

page_begin([
    'title'      => 'Tra cứu tồn kho',
    'module'     => 'ton-kho',
    'breadcrumb' => [['Tồn kho', null]],
]);

// TODO (UC29): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC29', 'Tra cứu tồn kho', 'modules/ton-kho/index.php');

page_end();

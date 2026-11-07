<?php
/**
 * UC07 - Tra cứu lô hàng cần kiểm tra
 * Quyền: chat-luong / view   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('chat-luong', 'view');

page_begin([
    'title'      => 'Tra cứu lô hàng cần kiểm tra',
    'module'     => 'chat-luong',
    'breadcrumb' => [['Kiểm tra chất lượng', null]],
]);

// TODO (UC07): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC07', 'Tra cứu lô hàng cần kiểm tra', 'modules/chat-luong/index.php');

page_end();

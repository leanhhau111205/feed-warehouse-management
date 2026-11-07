<?php
/**
 * UC08 - Ghi nhận kết quả kiểm tra chất lượng
 * Quyền: chat-luong / record   (khai báo trong includes/permission.php)
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('chat-luong', 'record');

page_begin([
    'title'      => 'Ghi nhận kết quả kiểm tra chất lượng',
    'module'     => 'chat-luong',
    'breadcrumb' => [['Kiểm tra chất lượng', 'modules/chat-luong/index.php'], ['Ghi nhận kết quả kiểm tra chất lượng', null]],
]);

// TODO (UC08): viết nội dung chức năng tại đây (có thể dùng render_search_form, render_data_table, render_pagination).
module_placeholder('UC08', 'Ghi nhận kết quả kiểm tra chất lượng', 'modules/chat-luong/record-result.php');

page_end();

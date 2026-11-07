<?php
/**
 * Cấu hình ứng dụng. Đọc bằng config('khóa') hoặc config('khóa', 'mặc định').
 */
return [
    'name'         => 'Quản lý kho thức ăn',
    'short_name'   => 'QLK',
    'timezone'     => 'Asia/Ho_Chi_Minh',
    'base_url'     => '',            // để trống = tự nhận theo vị trí thư mục (VD /quan-ly-kho-thuc-an)
    'session_name' => 'qlk_session',
    'debug'        => true,          // true: hiện lỗi PHP khi phát triển; false khi chạy thật
    'per_page'     => 10,            // số dòng mỗi trang cho danh sách
];

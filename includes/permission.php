<?php
/**
 * Phân quyền theo vai trò: module -> hành động -> danh sách vai trò được phép.
 * Quản trị viên (ROLE_ADMIN) luôn được phép mọi thao tác.
 *
 * Hành động dùng chung: view (xem/tra cứu), create, edit, stop (ngừng sử dụng), approve (phê duyệt)...
 * Dùng ở đầu mỗi trang:   require_permission('hang-hoa', 'create');
 * Dùng để ẩn/hiện nút:    if (can('hang-hoa', 'edit')) { ... }
 */

function permission_matrix(): array
{
    return [
        'dashboard' => ['view' => [ROLE_MANAGER, ROLE_WAREHOUSE, ROLE_INVENTORY, ROLE_DIRECTOR]],
        'hang-hoa' => ['view' => [ROLE_MANAGER, ROLE_WAREHOUSE], 'create' => [ROLE_MANAGER], 'edit' => [ROLE_MANAGER], 'stop' => [ROLE_MANAGER]],
        'lo-hang' => ['view' => [ROLE_MANAGER, ROLE_WAREHOUSE]],
        'tiep-nhan' => ['view' => [ROLE_MANAGER, ROLE_WAREHOUSE], 'create' => [ROLE_WAREHOUSE]],
        'chat-luong' => ['view' => [ROLE_MANAGER, ROLE_INVENTORY], 'record' => [ROLE_INVENTORY], 'confirm' => [ROLE_MANAGER]],
        'nhap-kho' => ['view' => [ROLE_MANAGER, ROLE_WAREHOUSE], 'create' => [ROLE_WAREHOUSE], 'history' => [ROLE_MANAGER]],
        'vi-tri-luu-tru' => ['view' => [ROLE_MANAGER, ROLE_WAREHOUSE], 'create' => [ROLE_MANAGER], 'edit' => [ROLE_MANAGER], 'stop' => [ROLE_MANAGER]],
        'gan-lo-hang' => ['view' => [ROLE_MANAGER, ROLE_WAREHOUSE], 'assign' => [ROLE_WAREHOUSE]],
        'dieu-chuyen' => ['view' => [ROLE_MANAGER, ROLE_WAREHOUSE], 'create' => [ROLE_WAREHOUSE]],
        'xuat-kho' => ['view' => [ROLE_MANAGER, ROLE_WAREHOUSE], 'request' => [ROLE_WAREHOUSE], 'approve' => [ROLE_MANAGER], 'fefo' => [ROLE_WAREHOUSE], 'issue' => [ROLE_WAREHOUSE]],
        'kiem-ke' => ['view' => [ROLE_MANAGER, ROLE_INVENTORY], 'create' => [ROLE_MANAGER], 'record' => [ROLE_MANAGER, ROLE_INVENTORY], 'reconcile' => [ROLE_MANAGER], 'handle' => [ROLE_MANAGER]],
        'hang-bat-thuong' => ['view' => [ROLE_MANAGER, ROLE_INVENTORY], 'handle' => [ROLE_MANAGER]],
        'ton-kho' => ['view' => [ROLE_MANAGER, ROLE_WAREHOUSE, ROLE_INVENTORY, ROLE_DIRECTOR]],
        'bao-cao' => ['view' => [ROLE_MANAGER, ROLE_DIRECTOR]],
        'tai-khoan' => ['view' => []],   // chỉ Quản trị viên
    ];
}

function can(string $module, string $action = 'view'): bool
{
    $role = current_role();
    if ($role === '') {
        return false;
    }
    if ($role === ROLE_ADMIN) {
        return true;
    }
    return in_array($role, permission_matrix()[$module][$action] ?? [], true);
}

/** Bắt buộc đăng nhập và có quyền; nếu không có quyền thì hiện trang 403. */
function require_permission(string $module, string $action = 'view'): void
{
    require_login();
    if (!can($module, $action)) {
        forbidden();
    }
}

function forbidden(): void
{
    http_response_code(403);
    page_begin([
        'title'      => 'Không có quyền truy cập',
        'module'     => '',
        'breadcrumb' => [['Không có quyền truy cập', null]],
    ]);
    echo '<div class="card empty-state"><h2>Bạn không có quyền sử dụng chức năng này</h2>';
    echo '<p class="muted">Vui lòng liên hệ quản trị viên nếu bạn cần được cấp quyền.</p>';
    echo '<a class="btn btn-primary" href="' . e(url('modules/dashboard/index.php')) . '">Về trang Tổng quan</a></div>';
    page_end();
    exit;
}

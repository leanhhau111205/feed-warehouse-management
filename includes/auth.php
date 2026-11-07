<?php
/**
 * Xác thực: đăng nhập, đăng xuất, người dùng hiện tại.
 * Bảng dùng: TaiKhoan (maTaiKhoan, tenDangNhap, matKhau, trangThai, ngayTao, lanDangNhapCuoi, maNhanVien)
 *            NhanVien (maNhanVien, hoTen, vaiTro, quyenHan, trangThai)
 */

function current_user(): ?array
{
    return $_SESSION['user'] ?? null;
}

function is_logged_in(): bool
{
    return current_user() !== null;
}

/** Khóa vai trò hiện tại (admin | manager | warehouse | inventory | director), rỗng nếu chưa đăng nhập. */
function current_role(): string
{
    return current_user()['role'] ?? '';
}

function require_login(): void
{
    if (!is_logged_in()) {
        flash_set('warning', 'Vui lòng đăng nhập để tiếp tục.');
        redirect('login.php');
    }
}

/**
 * Thử đăng nhập. Trả về null nếu thành công, ngược lại trả về thông báo lỗi.
 */
function attempt_login(string $username, string $password): ?string
{
    $row = db_one(
        "SELECT t.maTaiKhoan, t.tenDangNhap, t.matKhau, t.trangThai AS trangThaiTaiKhoan,
                n.maNhanVien, n.hoTen, n.vaiTro, n.trangThai AS trangThaiNhanVien
         FROM TaiKhoan t
         JOIN NhanVien n ON n.maNhanVien = t.maNhanVien
         WHERE t.tenDangNhap = ?",
        [$username]
    );

    // Luôn chạy password_verify để thời gian phản hồi không lộ việc tài khoản có tồn tại hay không
    $hash = $row['matKhau'] ?? '$2y$10$7QA0U1Wg0tNFkB6vA7ufgOR472ycLSstDPWMVt2asBldLrqPmzb/G';
    $ok = password_verify($password, $hash);

    if (!$row || !$ok) {
        return 'Tên đăng nhập hoặc mật khẩu không đúng.';
    }
    if ($row['trangThaiTaiKhoan'] !== 'Đang hoạt động' || $row['trangThaiNhanVien'] !== 'Đang hoạt động') {
        return 'Tài khoản đang bị khóa hoặc ngừng hoạt động.';
    }
    $role = ROLE_FROM_DB[$row['vaiTro']] ?? null;
    if ($role === null) {
        return 'Vai trò "' . $row['vaiTro'] . '" chưa được hỗ trợ trong hệ thống.';
    }

    db_exec('UPDATE TaiKhoan SET lanDangNhapCuoi = NOW() WHERE maTaiKhoan = ?', [$row['maTaiKhoan']]);

    session_regenerate_id(true);
    $_SESSION['user'] = [
        'maTaiKhoan' => $row['maTaiKhoan'],
        'maNhanVien' => $row['maNhanVien'],
        'username'   => $row['tenDangNhap'],
        'hoTen'      => $row['hoTen'],
        'vaiTro'     => $row['vaiTro'],
        'role'       => $role,
    ];
    return null;
}

function logout_user(): void
{
    unset($_SESSION['user']);
    session_regenerate_id(true);
}

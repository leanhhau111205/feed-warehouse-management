-- =====================================================================
-- quan-ly-kho-thuc-an - schema.sql (CSDL duy nhất của hệ thống)
-- Hiện có: NhanVien, TaiKhoan (đủ để đăng nhập và phân quyền theo vai trò).
-- Các bảng nghiệp vụ theo từ điển khái niệm sẽ được thêm vào cuối file này khi code từng module.
-- Chạy: phpMyAdmin > Import, hoặc  mysql -u root < schema.sql
-- =====================================================================
CREATE DATABASE IF NOT EXISTS quan_ly_kho_thuc_an CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE quan_ly_kho_thuc_an;
SET NAMES utf8mb4;

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS TaiKhoan, NhanVien;
SET FOREIGN_KEY_CHECKS = 1;

-- ---------- NhanVien ----------
CREATE TABLE NhanVien (
  maNhanVien VARCHAR(20)  NOT NULL PRIMARY KEY,
  hoTen      VARCHAR(100) NOT NULL,
  vaiTro     VARCHAR(50)  NOT NULL COMMENT 'Quản trị viên | Quản lý kho | Nhân viên kho | Nhân viên kiểm kê | Nhân viên QC | Ban giám đốc',
  quyenHan   VARCHAR(200) NULL,
  trangThai  VARCHAR(30)  NOT NULL DEFAULT 'Đang hoạt động',
  CONSTRAINT ck_nv_vaitro CHECK (vaiTro IN ('Quản trị viên','Quản lý kho','Nhân viên kho','Nhân viên kiểm kê','Nhân viên QC','Ban giám đốc')),
  CONSTRAINT ck_nv_tt     CHECK (trangThai IN ('Đang hoạt động','Ngừng hoạt động'))
) ENGINE=InnoDB;

-- ---------- TaiKhoan ----------
CREATE TABLE TaiKhoan (
  maTaiKhoan      VARCHAR(20)  NOT NULL PRIMARY KEY,
  tenDangNhap     VARCHAR(50)  NOT NULL UNIQUE,
  matKhau         VARCHAR(255) NOT NULL COMMENT 'Băm bằng password_hash (bcrypt)',
  trangThai       VARCHAR(30)  NOT NULL DEFAULT 'Đang hoạt động',
  ngayTao         DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  lanDangNhapCuoi DATETIME     NULL,
  maNhanVien      VARCHAR(20)  NOT NULL,
  CONSTRAINT ck_tk_tt CHECK (trangThai IN ('Đang hoạt động','Tạm khóa','Ngừng hoạt động')),
  CONSTRAINT fk_tk_nv FOREIGN KEY (maNhanVien) REFERENCES NhanVien(maNhanVien)
) ENGINE=InnoDB;

-- ===================== DỮ LIỆU MẪU =====================
INSERT INTO NhanVien (maNhanVien, hoTen, vaiTro, quyenHan, trangThai) VALUES
('NV001', 'Nguyễn Văn Quản Trị', 'Quản trị viên', NULL, 'Đang hoạt động'),
('NV002', 'Trần Thị Quản Lý', 'Quản lý kho', NULL, 'Đang hoạt động'),
('NV003', 'Lê Văn Nhân', 'Nhân viên kho', NULL, 'Đang hoạt động'),
('NV004', 'Phạm Thị Kiểm', 'Nhân viên kiểm kê', NULL, 'Đang hoạt động'),
('NV005', 'Ngô Thị Giám Đốc', 'Ban giám đốc', NULL, 'Đang hoạt động');

-- Mật khẩu mẫu: admin/Admin@123 | quanlykho/Quanly@123 | nhanvienkho/Nhanvien@123 | nhanvienkiemke/Kiemke@123 | bangiamdoc/Giamdoc@123
INSERT INTO TaiKhoan (maTaiKhoan, tenDangNhap, matKhau, trangThai, maNhanVien) VALUES
('TK001', 'admin', '$2y$10$LCfbMSeGN8vIGu5/yYV1h.C2y0jYQ5Nnum/JPytyWZaK7MJAKWkyS', 'Đang hoạt động', 'NV001'),
('TK002', 'quanlykho', '$2y$10$1VCwVA1lOCoeE4LU8ub09e87vvwfiCuQ5obpNRCyBVeOx5v3OYKDq', 'Đang hoạt động', 'NV002'),
('TK003', 'nhanvienkho', '$2y$10$LRAijHvxaZKqGKQU9IpSfelnUUaXTvEyigWj9GemW7S4efS55Sy/2', 'Đang hoạt động', 'NV003'),
('TK004', 'nhanvienkiemke', '$2y$10$niAYf8BkTfp3NI2WgeWSqezgfOGzk/UTAAWbQnnzp2Tih7vh.iJnu', 'Đang hoạt động', 'NV004'),
('TK005', 'bangiamdoc', '$2y$10$n8mAM4OOEnyGR1VwyH1AFu8ORnaOP6gBqlnTWfDk8Q89Qd6UVrE6m', 'Đang hoạt động', 'NV005');

-- ===================== BẢNG NGHIỆP VỤ (thêm vào dưới đây) =====================
-- hang-hoa      : HangHoa
-- tiep-nhan     : PhieuGiaoNCC, PhieuYeuCauNhapKho, LoHang
-- chat-luong    : TieuChiKiemTra, BienBanKiemDinhChatLuong, KetQuaKiemTra
-- nhap-kho      : PhieuNhapKho, TonKho
-- vi-tri-luu-tru: Kho, KhuVuc, ViTriLuuTru
-- dieu-chuyen   : PhieuDieuChuyen
-- xuat-kho      : PhieuYeuCauXuatKho, DeXuatLoHang, PhieuXuatKho
-- kiem-ke       : BienBanKiemKe, KetQuaKiemKe, ChenhLechKiemKe, PhuongAnXuLy, HangBatThuong

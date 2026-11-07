<?php
/**
 * Hàm tiện ích dùng chung: cấu hình, URL, bảo mật (CSRF), flash, định dạng, icon, CSDL, dựng trang.
 */

/* ------------------------------ Cấu hình ------------------------------ */
function config(string $key, $default = null)
{
    $value = $GLOBALS['APP_CONFIG'] ?? [];
    foreach (explode('.', $key) as $part) {
        if (!is_array($value) || !array_key_exists($part, $value)) {
            return $default;
        }
        $value = $value[$part];
    }
    return $value;
}

/* ------------------------------ Chuỗi & URL ------------------------------ */
function e($value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Đường dẫn gốc của ứng dụng (VD "/quan-ly-kho-thuc-an", rỗng nếu đặt ở gốc web). */
function base_url(): string
{
    static $base = null;
    if ($base !== null) {
        return $base;
    }
    $cfg = (string)config('base_url', '');
    if ($cfg !== '') {
        return $base = rtrim($cfg, '/');
    }
    $doc  = !empty($_SERVER['DOCUMENT_ROOT']) ? realpath($_SERVER['DOCUMENT_ROOT']) : false;
    $root = realpath(ROOT_PATH);
    $base = ($doc && $root && strpos($root, $doc) === 0)
        ? str_replace('\\', '/', substr($root, strlen($doc)))
        : '';
    return $base = rtrim($base, '/');
}

function url(string $path = ''): string
{
    return base_url() . '/' . ltrim($path, '/');
}

function asset(string $path): string
{
    return url('assets/' . ltrim($path, '/'));
}

function redirect(string $path): void
{
    $target = preg_match('#^https?://#i', $path) ? $path : url($path);
    header('Location: ' . $target);
    exit;
}

function is_post(): bool
{
    return ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST';
}

/* ------------------------------ CSRF ------------------------------ */
function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_field(): string
{
    return '<input type="hidden" name="csrf_token" value="' . e(csrf_token()) . '">';
}

function csrf_verify(): bool
{
    $sent = (string)($_POST['csrf_token'] ?? '');
    return $sent !== '' && hash_equals(csrf_token(), $sent);
}

/* ------------------------------ Thông báo (flash) ------------------------------ */
function flash_set(string $type, string $message): void
{
    $_SESSION['flash'][] = ['type' => $type, 'message' => $message];   // success | error | warning | info
}

function flash_get_all(): array
{
    $all = $_SESSION['flash'] ?? [];
    unset($_SESSION['flash']);
    return $all;
}

/* ------------------------------ Định dạng ------------------------------ */
function fmt_date($value): string
{
    $t = $value ? strtotime((string)$value) : false;
    return $t ? date('d/m/Y', $t) : '';
}

function fmt_datetime($value): string
{
    $t = $value ? strtotime((string)$value) : false;
    return $t ? date('d/m/Y H:i', $t) : '';
}

function fmt_number($value, int $decimals = 0): string
{
    return number_format((float)$value, $decimals, ',', '.');
}

/* ------------------------------ Icon SVG (nét đơn giản) ------------------------------ */
function icon(string $name, int $size = 18): string
{
    static $paths = [
        'home'      => '<path d="M3 11l9-8 9 8"/><path d="M5 10v10h14V10"/>',
        'package'   => '<path d="M21 8l-9-5-9 5 9 5 9-5z"/><path d="M3 8v8l9 5 9-5V8"/><path d="M12 13v8"/>',
        'layers'    => '<path d="M12 3l9 5-9 5-9-5 9-5z"/><path d="M3 13l9 5 9-5"/>',
        'inbox'     => '<path d="M3 13l3-8h12l3 8"/><path d="M3 13v6h18v-6h-5l-1 2h-6l-1-2H3z"/>',
        'clipboard' => '<rect x="6" y="4" width="12" height="17" rx="2"/><path d="M9 4h6v3H9z"/><path d="M9 12h6M9 16h6"/>',
        'download'  => '<path d="M12 3v12"/><path d="M7 11l5 5 5-5"/><path d="M4 20h16"/>',
        'upload'    => '<path d="M12 17V5"/><path d="M7 9l5-5 5 5"/><path d="M4 20h16"/>',
        'pin'       => '<path d="M12 21s7-6 7-12a7 7 0 10-14 0c0 6 7 12 7 12z"/><circle cx="12" cy="9" r="2.5"/>',
        'link'      => '<path d="M10 14a4 4 0 005.7 0l3-3a4 4 0 00-5.7-5.7l-1 1"/><path d="M14 10a4 4 0 00-5.7 0l-3 3a4 4 0 005.7 5.7l1-1"/>',
        'repeat'    => '<path d="M17 2l4 4-4 4"/><path d="M3 11V9a3 3 0 013-3h15"/><path d="M7 22l-4-4 4-4"/><path d="M21 13v2a3 3 0 01-3 3H3"/>',
        'list'      => '<path d="M8 6h13M8 12h13M8 18h13"/><circle cx="4" cy="6" r="1"/><circle cx="4" cy="12" r="1"/><circle cx="4" cy="18" r="1"/>',
        'alert'     => '<path d="M12 3l10 18H2L12 3z"/><path d="M12 10v5M12 18h.01"/>',
        'archive'   => '<rect x="3" y="4" width="18" height="4" rx="1"/><path d="M5 8v12h14V8"/><path d="M10 12h4"/>',
        'chart'     => '<path d="M4 20V4"/><path d="M4 20h16"/><path d="M8 16v-5M12 16V8M16 16v-8"/>',
        'users'     => '<circle cx="9" cy="8" r="3.5"/><path d="M2 20c0-3.5 3-6 7-6s7 2.5 7 6"/><path d="M16 4.5a3.5 3.5 0 010 7M22 20c0-3-2-5-5-5.7"/>',
        'menu'      => '<path d="M4 6h16M4 12h16M4 18h16"/>',
        'logout'    => '<path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><path d="M16 17l5-5-5-5M21 12H9"/>',
        'plus'      => '<path d="M12 5v14M5 12h14"/>',
        'search'    => '<circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/>',
        'tool'      => '<path d="M14.7 6.3a4 4 0 005 5L21 13l-8 8-4-4 8-8z"/><path d="M3 21l4-4"/>',
    ];
    $inner = $paths[$name] ?? $paths['list'];
    return '<svg class="icon" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $inner . '</svg>';
}

/* ------------------------------ CSDL (mysqli, prepared statements) ------------------------------ */
function db(): mysqli
{
    static $conn = null;
    if ($conn instanceof mysqli) {
        return $conn;
    }
    $c = $GLOBALS['DB_CONFIG'];
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try {
        $conn = new mysqli($c['host'], $c['user'], $c['password'], $c['database'], (int)$c['port']);
        $conn->set_charset($c['charset']);
    } catch (mysqli_sql_exception $ex) {
        http_response_code(500);
        exit('Không kết nối được cơ sở dữ liệu. Hãy import database/schema.sql và kiểm tra config/database.php.');
    }
    return $conn;
}

function db_run(string $sql, array $params = []): mysqli_stmt
{
    $stmt = db()->prepare($sql);
    if ($params) {
        $types = '';
        foreach ($params as $p) {
            $types .= is_int($p) ? 'i' : (is_float($p) ? 'd' : 's');
        }
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    return $stmt;
}

/** Trả về mọi dòng (mảng kết hợp). VD: db_all('SELECT * FROM NhanVien WHERE vaiTro = ?', ['Nhân viên kho']) */
function db_all(string $sql, array $params = []): array
{
    $stmt = db_run($sql, $params);
    $res  = $stmt->get_result();
    $rows = $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
    $stmt->close();
    return $rows;
}

function db_one(string $sql, array $params = []): ?array
{
    $rows = db_all($sql, $params);
    return $rows[0] ?? null;
}

/** INSERT/UPDATE/DELETE: trả về số dòng bị ảnh hưởng. */
function db_exec(string $sql, array $params = []): int
{
    $stmt = db_run($sql, $params);
    $n = $stmt->affected_rows;
    $stmt->close();
    return $n;
}

/* ------------------------------ Dựng trang ------------------------------ */
/**
 * Mở trang (head + sidebar + topbar). Cấu hình trang:
 *   title (bắt buộc), module (để tô sáng menu & chọn CSS), breadcrumb [[nhãn, đường dẫn|null], ...],
 *   subtitle, actions (HTML các nút ở góc phải tiêu đề), css (ghi đè tên file CSS trang)
 * Kết thúc trang bằng page_end().
 */
function page_begin(array $page): void
{
    $page += ['title' => '', 'module' => '', 'breadcrumb' => [], 'subtitle' => '', 'actions' => '', 'css' => null];
    if ($page['css'] === null && $page['module'] !== '') {
        $page['css'] = MODULE_CSS[$page['module']] ?? null;
    }
    include INCLUDES_PATH . '/layouts/head.php';
    include INCLUDES_PATH . '/layouts/header.php';
    include INCLUDES_PATH . '/layouts/topbar.php';
}

function page_end(): void
{
    include INCLUDES_PATH . '/layouts/footer.php';
    include INCLUDES_PATH . '/layouts/scripts.php';
}

/** Khung tạm cho màn hình chưa code: ghi rõ Use Case và file cần bổ sung. */
function module_placeholder(string $useCase, string $description, string $file): void
{
    echo '<div class="card empty-state">';
    echo '<div class="empty-icon">' . icon('tool', 40) . '</div>';
    echo '<h2>' . e($description) . '</h2>';
    echo '<p class="muted">' . e($useCase) . ' &middot; chức năng sẽ được bổ sung.</p>';
    echo '<p class="muted small">Viết code tại: <code>' . e($file) . '</code></p>';
    echo '</div>';
}

/**
 * Mở file xử lý (actions/*): chỉ nhận POST, kiểm tra CSRF và quyền. Dùng ở đầu mọi file trong actions/.
 * Sau khi xử lý xong nên flash_set(...) rồi redirect(...).
 */
function action_begin(string $module, string $action): void
{
    require_permission($module, $action);
    if (!is_post()) {
        http_response_code(405);
        exit('Phương thức không được hỗ trợ.');
    }
    if (!csrf_verify()) {
        flash_set('error', 'Phiên làm việc đã hết hạn, vui lòng thử lại.');
        redirect('modules/dashboard/index.php');
    }
}

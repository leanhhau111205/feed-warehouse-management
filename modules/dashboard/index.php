<?php
/**
 * Tổng quan - lối tắt tới các chức năng mà vai trò hiện tại được phép (lấy từ includes/menus/).
 * Có thể bổ sung số liệu thống kê (CSS riêng: assets/css/pages/dashboard.css).
 */
require_once dirname(__DIR__, 2) . '/includes/init.php';
require_permission('dashboard', 'view');

$user = current_user();
page_begin([
    'title'      => 'Tổng quan',
    'subtitle'   => 'Xin chào ' . $user['hoTen'] . ' (' . ROLE_LABELS[$user['role']] . ')',
    'module'     => 'dashboard',
    'breadcrumb' => [['Tổng quan', null]],
]);

foreach (menu_for_role(current_role()) as $section) {
    $items = array_filter(
        $section['items'],
        fn($it) => $it['module'] !== 'dashboard' && can($it['module'], $it['action'] ?? 'view')
    );
    if (!$items) {
        continue;
    }
    echo '<h2 class="group-title">' . e($section['title']) . '</h2><div class="shortcut-grid">';
    foreach ($items as $it) {
        echo '<a class="shortcut-card" href="' . e(url($it['href'])) . '">' . icon($it['icon'], 22) . '<span>' . e($it['label']) . '</span></a>';
    }
    echo '</div>';
}

page_end();

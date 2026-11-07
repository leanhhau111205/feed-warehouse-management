<?php
/**
 * Đường dẫn trang. $items: [[nhãn, đường dẫn tương đối|null], ...]; "Tổng quan" được thêm tự động.
 */
function render_breadcrumb(array $items): void
{
    echo '<nav class="breadcrumb" aria-label="breadcrumb">';
    echo '<a href="' . e(url('modules/dashboard/index.php')) . '">Tổng quan</a>';
    foreach ($items as [$label, $href]) {
        if ($label === 'Tổng quan') {
            continue;
        }
        echo '<span class="sep">/</span>';
        echo $href ? '<a href="' . e(url($href)) . '">' . e($label) . '</a>' : '<span class="current">' . e($label) . '</span>';
    }
    echo '</nav>';
}

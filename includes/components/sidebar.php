<?php
/** Sidebar: menu theo vai trò (includes/menus/menu-<vai trò>.php), chỉ hiện mục mà vai trò có quyền. */

function menu_for_role(string $role): array
{
    $name = ROLE_MENU_FILES[$role] ?? '';
    $file = INCLUDES_PATH . '/menus/' . $name;
    return ($name !== '' && is_file($file)) ? require $file : [];
}

function render_sidebar(string $activeModule = ''): void
{
    $sections = menu_for_role(current_role());

    // Trang hiện tại (đường dẫn tương đối so với gốc ứng dụng) để tô sáng đúng mục
    $path = (string)parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
    $current = ltrim(substr($path, strlen(base_url())), '/');

    $exact = false;
    foreach ($sections as $s) {
        foreach ($s['items'] as $it) {
            if ($it['href'] === $current) {
                $exact = true;
            }
        }
    }
    ?>
    <aside class="sidebar" id="sidebar">
        <a class="sidebar-brand" href="<?= e(url('index.php')) ?>">
            <img src="<?= e(asset('images/logo.png')) ?>" alt="" width="34" height="34">
            <span><?= e(config('name')) ?></span>
        </a>
        <nav class="nav">
            <?php foreach ($sections as $section):
                $items = array_filter($section['items'], fn($it) => can($it['module'], $it['action'] ?? 'view'));
                if (!$items) continue; ?>
                <div class="nav-heading"><?= e($section['title']) ?></div>
                <?php foreach ($items as $it):
                    $active = $exact ? ($it['href'] === $current) : ($activeModule !== '' && $it['module'] === $activeModule); ?>
                    <a class="nav-item<?= $active ? ' active' : '' ?>" href="<?= e(url($it['href'])) ?>">
                        <?= icon($it['icon'], 18) ?>
                        <span><?= e($it['label']) ?></span>
                    </a>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </nav>
    </aside>
    <?php
}

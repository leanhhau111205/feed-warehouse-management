<?php
/** Mở tài liệu HTML + <head>. Biến: $page (xem page_begin) */
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e(($page['title'] !== '' ? $page['title'] . ' | ' : '') . config('name')) ?></title>
    <link rel="stylesheet" href="<?= e(asset('css/reset.css')) ?>">
    <link rel="stylesheet" href="<?= e(asset('css/variables.css')) ?>">
    <link rel="stylesheet" href="<?= e(asset('css/layout.css')) ?>">
    <link rel="stylesheet" href="<?= e(asset('css/components.css')) ?>">
    <?php if (!empty($page['css'])): ?>
        <link rel="stylesheet" href="<?= e(asset('css/pages/' . $page['css'] . '.css')) ?>">
    <?php endif; ?>
</head>

<?php /** Đóng vùng nội dung, khung ứng dụng và nạp hộp thoại xác nhận dùng chung. */ ?>
        </main>
        <footer class="footer">&copy; <?= date('Y') ?> <?= e(config('name')) ?></footer>
    </div>
</div>
<?php render_confirm_modal(); ?>

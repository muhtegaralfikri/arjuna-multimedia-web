<div class="bg-gradient-to-br from-primary-600 to-primary-800 text-white py-16 md:py-24">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4"><?php echo e($page->hero_title ?? $page->title); ?></h1>
        <?php if($page->hero_subtitle): ?>
        <p class="text-xl text-primary-100"><?php echo e($page->hero_subtitle); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH D:\github_project\arjuna-multimedia-web\resources\views/partials/hero-page.blade.php ENDPATH**/ ?>
<?php $__env->startSection('pageTitle', 'Halaman'); ?>

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Halaman</h1>
    <p class="text-gray-600">Kelola konten halaman website</p>
</div>

<?php if(session('success')): ?>
<div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-2"><?php echo e($page->title); ?></h3>
            <p class="text-sm text-gray-500 mb-4">/<?php echo e($page->slug); ?></p>

            <?php if($page->hero_title): ?>
                <p class="text-sm text-gray-700 mb-2">
                    <strong>Hero Title:</strong> <?php echo e(Str::limit($page->hero_title, 40)); ?>

                </p>
            <?php endif; ?>

            <?php if($page->meta_title): ?>
                <p class="text-sm text-gray-700 mb-4">
                    <strong>Meta Title:</strong> <?php echo e(Str::limit($page->meta_title, 40)); ?>

                </p>
            <?php endif; ?>

            <a href="<?php echo e(route('admin.pages.edit', $page->slug)); ?>"
                class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Edit Halaman
            </a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\github_project\arjuna-multimedia-web\resources\views/admin/pages/index.blade.php ENDPATH**/ ?>
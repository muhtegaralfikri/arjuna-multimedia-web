<?php $__env->startSection('pageTitle', 'Halaman'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Halaman (Pages)</h1>
        <p class="text-slate-500 text-sm mt-1">Kelola konten dan optimisasi SEO untuk halaman-halaman website.</p>
    </div>
</div>

<?php if(session('success')): ?>
<div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-xl flex items-start">
    <svg class="w-5 h-5 text-emerald-500 mt-0.5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    <div class="text-emerald-800 text-sm font-medium"><?php echo e(session('success')); ?></div>
</div>
<?php endif; ?>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden flex flex-col transition-all hover:shadow-md hover:border-indigo-200">
            <div class="p-6 flex-grow border-b border-slate-100">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-lg font-bold text-slate-900"><?php echo e($page->title); ?></h3>
                    <span class="inline-flex items-center px-2 py-1 rounded bg-slate-100 text-xs font-mono text-slate-500">
                        /<?php echo e($page->slug); ?>

                    </span>
                </div>
                
                <?php if($page->hero_title): ?>
                    <div class="mb-4">
                        <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">Hero Title</span>
                        <p class="text-sm text-slate-700 italic">"<?php echo e(\Illuminate\Support\Str::limit($page->hero_title, 60)); ?>"</p>
                    </div>
                <?php endif; ?>
                
                <?php if($page->meta_title): ?>
                    <div>
                        <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-1">SEO Meta Title</span>
                        <p class="text-sm text-indigo-700"><?php echo e(\Illuminate\Support\Str::limit($page->meta_title, 50)); ?></p>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="p-4 bg-slate-50 relative group">
                <a href="<?php echo e(route('admin.pages.edit', $page->slug)); ?>" class="flex items-center justify-center w-full py-2 bg-white border border-slate-300 rounded-xl font-medium text-sm text-slate-700 group-hover:bg-indigo-600 group-hover:text-white group-hover:border-indigo-600 transition-all shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    Edit Halaman Ini
                </a>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\github_project\arjuna-multimedia-web\resources\views/admin/pages/index.blade.php ENDPATH**/ ?>
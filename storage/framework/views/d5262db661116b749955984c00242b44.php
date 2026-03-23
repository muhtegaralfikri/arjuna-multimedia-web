<?php $__env->startSection('pageTitle', 'Area Layanan'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Daftar Area Layanan</h1>
        <p class="text-slate-500 text-sm mt-1">Kelola area cakupan layanan internet Anda di sini.</p>
    </div>
    <a href="<?php echo e(route('admin.areas.create')); ?>" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all shadow-sm">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah Area
    </a>
</div>

<?php if(session('success')): ?>
<div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl flex items-center shadow-sm">
    <svg class="w-5 h-5 mr-3 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    <span class="font-medium text-sm"><?php echo e(session('success')); ?></span>
</div>
<?php endif; ?>

<div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50/50 border-b border-slate-100">
                <tr>
                    <th class="py-4 px-6 text-slate-500 text-xs font-bold uppercase tracking-wider">Nama Area</th>
                    <th class="py-4 px-6 text-slate-500 text-xs font-bold uppercase tracking-wider">Status</th>
                    <th class="py-4 px-6 text-slate-500 text-xs font-bold uppercase tracking-wider hidden md:table-cell">Deskripsi</th>
                    <th class="py-4 px-6 text-slate-500 text-xs font-bold uppercase tracking-wider text-center">Urutan</th>
                    <th class="py-4 px-6 text-right text-slate-500 text-xs font-bold uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-slate-50/80 transition-colors group">
                        <td class="py-4 px-6 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-indigo-50 flex items-center justify-center mr-3 text-indigo-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-900"><?php echo e($area->name); ?></span>
                                    <span class="md:hidden block text-xs text-slate-500 mt-0.5 truncate max-w-[150px]"><?php echo e($area->description); ?></span>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap">
                            <div class="flex flex-col items-start">
                                <?php if($area->status === 'available'): ?>
                                    <span class="inline-flex items-center px-2.5 py-1 bg-emerald-50 text-emerald-700 text-xs font-bold rounded-md border border-emerald-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5"></span>
                                        Tersedia
                                    </span>
                                <?php elseif($area->status === 'coming_soon'): ?>
                                    <span class="inline-flex items-center px-2.5 py-1 bg-amber-50 text-amber-700 text-xs font-bold rounded-md border border-amber-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-1.5"></span>
                                        Segera Hadir
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center px-2.5 py-1 bg-rose-50 text-rose-700 text-xs font-bold rounded-md border border-rose-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500 mr-1.5"></span>
                                        Jeda / Penuh
                                    </span>
                                <?php endif; ?>
                                
                                <?php if($area->estimated_available && $area->status == 'coming_soon'): ?>
                                    <span class="text-[10px] text-slate-500 font-medium mt-1 bg-slate-100 px-1.5 py-0.5 rounded">Est: <?php echo e($area->estimated_available->format('d/m/Y')); ?></span>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td class="py-4 px-6 text-sm text-slate-600 hidden md:table-cell max-w-xs xl:max-w-md">
                            <p class="truncate" title="<?php echo e($area->description); ?>"><?php echo e($area->description ?: '-'); ?></p>
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap text-center">
                            <span class="text-slate-500 font-medium bg-slate-50 px-2 py-1 rounded-md text-sm border border-slate-100"><?php echo e($area->sort_order ?? '-'); ?></span>
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap text-right">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="<?php echo e(route('admin.areas.edit', $area->id)); ?>" class="inline-flex justify-center items-center w-8 h-8 rounded-lg bg-white border border-slate-200 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50 hover:border-indigo-200 transition-colors shadow-sm" title="Edit Area">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                </a>
                                <form action="<?php echo e(route('admin.areas.destroy', $area->id)); ?>" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus area ini?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="inline-flex justify-center items-center w-8 h-8 rounded-lg bg-white border border-slate-200 text-slate-500 hover:text-rose-600 hover:bg-rose-50 hover:border-rose-200 transition-colors shadow-sm" title="Hapus Area">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    
    <?php if($areas->count() === 0): ?>
        <div class="text-center py-16 px-4">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 mb-4">
                <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <h3 class="text-lg font-medium text-slate-900 mb-1">Belum Ada Area Layanan</h3>
            <p class="text-slate-500 max-w-sm mx-auto mb-4">Mulai tentukan jangkauan layanan internet Anda dengan menambahkan area baru.</p>
            <a href="<?php echo e(route('admin.areas.create')); ?>" class="inline-flex items-center px-4 py-2 bg-indigo-50 border border-indigo-100 rounded-xl font-medium text-sm text-indigo-700 hover:bg-indigo-100 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Area Pertama
            </a>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\github_project\arjuna-multimedia-web\resources\views/admin/areas/index.blade.php ENDPATH**/ ?>
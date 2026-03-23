<?php $__env->startSection('pageTitle', 'Paket Internet'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Daftar Paket Internet</h1>
        <p class="text-slate-500 text-sm mt-1">Kelola dan pantau paket internet yang ditawarkan kepada pelanggan.</p>
    </div>
    <a href="<?php echo e(route('admin.packages.create')); ?>" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all shadow-sm">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah Paket
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
                    <th class="py-4 px-6 text-slate-500 text-xs font-bold uppercase tracking-wider">Nama Paket</th>
                    <th class="py-4 px-6 text-slate-500 text-xs font-bold uppercase tracking-wider">Kecepatan</th>
                    <th class="py-4 px-6 text-slate-500 text-xs font-bold uppercase tracking-wider">Harga/Bulan</th>
                    <th class="py-4 px-6 text-slate-500 text-xs font-bold uppercase tracking-wider">Kategori</th>
                    <th class="py-4 px-6 text-slate-500 text-xs font-bold uppercase tracking-wider">Status</th>
                    <th class="py-4 px-6 text-slate-500 text-xs font-bold uppercase tracking-wider text-center">Urutan</th>
                    <th class="py-4 px-6 text-right text-slate-500 text-xs font-bold uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-slate-50/80 transition-colors group">
                        <td class="py-4 px-6 whitespace-nowrap">
                            <div class="flex flex-col">
                                <span class="font-bold text-slate-900"><?php echo e($package->name); ?></span>
                                <?php if($package->is_popular): ?>
                                    <span class="inline-flex items-center px-2 py-0.5 mt-1 bg-amber-50 text-amber-700 text-[10px] font-bold uppercase tracking-wider rounded-md border border-amber-200 w-max">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        Populer
                                    </span>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 font-semibold text-sm">
                                <svg class="w-4 h-4 mr-1.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                <?php echo e($package->speed); ?>

                            </span>
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap">
                            <span class="text-slate-900 font-bold">Rp <?php echo e(number_format($package->price_monthly, 0, ',', '.')); ?></span>
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap">
                            <?php if($package->category === 'home'): ?>
                                <span class="inline-flex items-center px-2.5 py-1 bg-sky-50 text-sky-700 text-xs font-bold rounded-md border border-sky-100">
                                    Rumah
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center px-2.5 py-1 bg-indigo-50 text-indigo-700 text-xs font-bold rounded-md border border-indigo-100">
                                    Bisnis
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap">
                            <?php if($package->is_active): ?>
                                <span class="inline-flex items-center px-2.5 py-1 bg-emerald-50 text-emerald-700 text-xs font-bold rounded-md border border-emerald-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5"></span>
                                    Aktif
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center px-2.5 py-1 bg-rose-50 text-rose-700 text-xs font-bold rounded-md border border-rose-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500 mr-1.5"></span>
                                    Nonaktif
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap text-center">
                            <span class="text-slate-500 font-medium bg-slate-50 px-2 py-1 rounded-md text-sm border border-slate-100"><?php echo e($package->sort_order ?? '-'); ?></span>
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap text-right">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="<?php echo e(route('admin.packages.edit', $package->id)); ?>" class="inline-flex justify-center items-center w-8 h-8 rounded-lg bg-white border border-slate-200 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50 hover:border-indigo-200 transition-colors shadow-sm" title="Edit Paket">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                </a>
                                <form action="<?php echo e(route('admin.packages.destroy', $package->id)); ?>" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket ini? Tindakan ini tidak dapat dibatalkan.');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="inline-flex justify-center items-center w-8 h-8 rounded-lg bg-white border border-slate-200 text-slate-500 hover:text-rose-600 hover:bg-rose-50 hover:border-rose-200 transition-colors shadow-sm" title="Hapus Paket">
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
    
    <?php if($packages->count() === 0): ?>
        <div class="text-center py-16 px-4">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 mb-4">
                <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            </div>
            <h3 class="text-lg font-medium text-slate-900 mb-1">Belum Ada Paket Internet</h3>
            <p class="text-slate-500 max-w-sm mx-auto mb-4">Mulai tawarkan layanan berlangganan dengan menambahkan paket internet pertama Anda.</p>
            <a href="<?php echo e(route('admin.packages.create')); ?>" class="inline-flex items-center px-4 py-2 bg-indigo-50 border border-indigo-100 rounded-xl font-medium text-sm text-indigo-700 hover:bg-indigo-100 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Tambah Paket Pertama
            </a>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\github_project\arjuna-multimedia-web\resources\views/admin/packages/index.blade.php ENDPATH**/ ?>
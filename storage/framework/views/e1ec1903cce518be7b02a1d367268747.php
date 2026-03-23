<?php $__env->startSection('pageTitle', 'Edit Halaman'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Edit Halaman: <span class="text-indigo-600"><?php echo e($page->title); ?></span></h1>
        <p class="text-slate-500 text-sm mt-1">Modifikasi konten spesifik dan optimasi target pencarian (SEO).</p>
    </div>
    <a href="<?php echo e(route('admin.pages.index')); ?>" class="inline-flex items-center px-4 py-2 bg-white border border-slate-200 rounded-xl font-medium text-sm text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors shadow-sm">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali
    </a>
</div>

<?php if(session('success')): ?>
<div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-xl flex items-start">
    <svg class="w-5 h-5 text-emerald-500 mt-0.5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    <div class="text-emerald-800 text-sm font-medium"><?php echo e(session('success')); ?></div>
</div>
<?php endif; ?>

<form method="POST" action="<?php echo e(route('admin.pages.update', $page->slug)); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden">
                <div class="p-6 sm:p-8">
                    <h2 class="text-lg font-bold text-slate-900 mb-6 flex items-center border-b border-slate-100 pb-3">
                        <svg class="w-5 h-5 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        Konten Teks & Layout
                    </h2>

                    <div class="space-y-6">
                        <div>
                            <label for="title" class="block text-slate-700 text-sm font-bold mb-2">Judul Halaman <span class="text-rose-500">*</span></label>
                            <input type="text" id="title" name="title" value="<?php echo e(old('title', $page->title)); ?>" required
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm"
                                placeholder="Contoh: Tentang Kami">
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <label for="hero_title" class="block text-slate-700 text-sm font-bold mb-2">Heading Utama (Hero Title)</label>
                            <input type="text" id="hero_title" name="hero_title" value="<?php echo e(old('hero_title', $page->hero_title)); ?>"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm font-serif text-lg"
                                placeholder="Contoh: Layanan Internet Terpercaya untuk Area Perkampungan">
                            <p class="mt-1.5 text-xs text-slate-500">Judul besar yang muncul di bagian paling atas halaman ini (H1).</p>
                            <?php $__errorArgs = ['hero_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <label for="hero_subtitle" class="block text-slate-700 text-sm font-bold mb-2">Teks Pendukung (Hero Subtitle)</label>
                            <textarea id="hero_subtitle" name="hero_subtitle" rows="3"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm resize-y"
                                placeholder="Tuliskan deskripsi ringkas minimalis di bawah judul besar..."><?php echo e(old('hero_subtitle', $page->hero_subtitle)); ?></textarea>
                            <?php $__errorArgs = ['hero_subtitle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <label for="content" class="block text-slate-700 text-sm font-bold mb-2">Konten Detail Halaman (HTML Support)</label>
                            <div class="rounded-xl border border-slate-200/60 overflow-hidden shadow-sm">
                                <div class="bg-slate-100 flex items-center px-4 py-2 border-b border-slate-200 gap-2">
                                    <span class="text-xs font-mono text-slate-500">&lt; / &gt; Raw HTML View</span>
                                </div>
                                <textarea id="content" name="content" rows="10"
                                    class="w-full px-4 py-4 bg-slate-900 text-slate-100 font-mono text-sm border-0 focus:ring-0 resize-y"
                                    placeholder="<article>...</article>"><?php echo e(old('content', $page->content)); ?></textarea>
                            </div>
                            <p class="mt-2 text-xs text-slate-500">Gunakan tag HTML dasar untuk format pargraf (<code>&lt;p&gt;</code>), cetak tebal (<code>&lt;b&gt;</code>), atau daftar (<code>&lt;ul&gt; &lt;li&gt;</code>).</p>
                            <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="space-y-6">
            <div class="bg-indigo-50/50 rounded-2xl shadow-sm border border-indigo-100 overflow-hidden">
                <div class="p-6">
                    <h2 class="text-lg font-bold text-indigo-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        Optimasi SEO
                    </h2>

                    <div class="space-y-5">
                        <div>
                            <label for="meta_title" class="block text-slate-700 text-sm font-bold mb-2">Meta Title</label>
                            <input type="text" id="meta_title" name="meta_title" value="<?php echo e(old('meta_title', $page->meta_title)); ?>"
                                class="w-full px-3.5 py-2.5 bg-white border border-indigo-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm"
                                placeholder="Contoh: Tentang Kami - Arjuna Net">
                            <div class="mt-1.5 flex justify-between items-center text-xs">
                                <span class="text-slate-500">Tampil di tab browser</span>
                                <span class="text-indigo-600 font-medium font-mono">50-60 char</span>
                            </div>
                            <?php $__errorArgs = ['meta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-1 text-sm text-rose-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <label for="meta_description" class="block text-slate-700 text-sm font-bold mb-2">Meta Description</label>
                            <textarea id="meta_description" name="meta_description" rows="4"
                                class="w-full px-3.5 py-2.5 bg-white border border-indigo-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm resize-none"
                                placeholder="Gambarkan singkat halaman ini..."><?php echo e(old('meta_description', $page->meta_description)); ?></textarea>
                            <div class="mt-1.5 flex justify-between items-center text-xs">
                                <span class="text-slate-500">Tampil di hasil Google</span>
                                <span class="text-indigo-600 font-medium font-mono">~150 char</span>
                            </div>
                            <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-1 text-sm text-rose-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <label for="og_image" class="block text-slate-700 text-sm font-bold mb-2">OG Image URL</label>
                            <input type="text" id="og_image" name="og_image" value="<?php echo e(old('og_image', $page->og_image)); ?>"
                                class="w-full px-3.5 py-2.5 bg-white border border-indigo-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm font-mono text-sm"
                                placeholder="/images/og-home.jpg">
                            <p class="mt-1.5 text-xs text-slate-500">Gambar thumb ketika dibagikan di WA/FB.</p>
                            <?php $__errorArgs = ['og_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-1 text-sm text-rose-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <label for="canonical_url" class="block text-slate-700 text-sm font-bold mb-2">Canonical URL</label>
                            <input type="text" id="canonical_url" name="canonical_url" value="<?php echo e(old('canonical_url', $page->canonical_url)); ?>"
                                class="w-full px-3.5 py-2.5 bg-white border border-indigo-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm font-mono text-sm"
                                placeholder="https://arjuna-net.com/tentang">
                            <?php $__errorArgs = ['canonical_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-1 text-sm text-rose-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 p-6 flex flex-col gap-3">
                <button type="submit" class="w-full flex justify-center items-center py-3 bg-indigo-600 text-white font-semibold rounded-xl hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-200 transition-all shadow-sm">
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\github_project\arjuna-multimedia-web\resources\views/admin/pages/edit.blade.php ENDPATH**/ ?>
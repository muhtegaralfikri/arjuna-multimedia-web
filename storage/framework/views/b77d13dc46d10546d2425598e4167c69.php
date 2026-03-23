<?php $__env->startSection('pageTitle', 'Dashboard'); ?>

<?php
    $pageTitle = 'Dashboard';
?>


<div class="mb-8 bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 text-white shadow-lg relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
            <path d="M0 100 C 20 0 50 0 100 100 Z" fill="white"/>
        </svg>
    </div>
    <div class="relative z-10">
        <h1 class="text-3xl font-bold mb-2">Selamat Datang, Admin! 👋</h1>
        <p class="text-blue-100 text-lg">Berikut ringkasan aktivitas website Anda hari ini</p>
        <div class="mt-6 flex items-center space-x-4">
            <div class="flex items-center bg-white/10 backdrop-blur-sm rounded-lg px-4 py-2">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="text-sm font-medium"><?php echo e(\Carbon\Carbon::now()->format('d F Y')); ?></span>
            </div>
            <div class="flex items-center bg-white/10 backdrop-blur-sm rounded-lg px-4 py-2">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="text-sm font-medium"><?php echo e(\Carbon\Carbon::now()->format('H:i')); ?></span>
            </div>
        </div>
    </div>
</div>

 
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    
    <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition duration-300 border border-gray-100 relative overflow-hidden group">
        <div class="absolute top-0 right-0 w-24 h-24 bg-blue-50 rounded-bl-full -mr-4 -mt-4 transition group-hover:scale-110"></div>
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-gray-500 text-sm font-medium mb-1">Total Paket</p>
                <p class="text-4xl font-bold text-gray-900"><?php echo e($stats['packages']); ?></p>
            </div>
            <div class="mt-4">
                <a href="<?php echo e(route('admin.packages.index')); ?>" class="inline-flex items-center text-blue-600 hover:text-blue-700 font-medium text-sm group-hover:translate-x-1 transition">
                    Kelola Paket
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    
    <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition duration-300 border border-gray-100 relative overflow-hidden group">
        <div class="absolute top-0 right-0 w-24 h-24 bg-green-50 rounded-bl-full -mr-4 -mt-4 transition group-hover:scale-110"></div>
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-gray-500 text-sm font-medium mb-1">Total Area</p>
                <div class="flex items-baseline space-x-2">
                    <p class="text-4xl font-bold text-gray-900"><?php echo e($stats['areas']); ?></p>
                    <span class="text-green-600 text-sm font-semibold">+<?php echo e($stats['active_areas']); ?> aktif</span>
                </div>
            </div>
            <div class="mt-4">
                <a href="<?php echo e(route('admin.areas.index')); ?>" class="inline-flex items-center text-green-600 hover:text-green-700 font-medium text-sm group-hover:translate-x-1 transition">
                    Kelola Area
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    
    <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition duration-300 border border-gray-100 relative overflow-hidden group">
        <div class="absolute top-0 right-0 w-24 h-24 bg-purple-50 rounded-bl-full -mr-4 -mt-4 transition group-hover:scale-110"></div>
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-gray-500 text-sm font-medium mb-1">Total FAQ</p>
                <p class="text-4xl font-bold text-gray-900"><?php echo e($stats['faqs']); ?></p>
            </div>
            <div class="mt-4">
                <a href="<?php echo e(route('admin.faqs.index')); ?>" class="inline-flex items-center text-purple-600 hover:text-purple-700 font-medium text-sm group-hover:translate-x-1 transition">
                    Kelola FAQ
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    
    <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition duration-300 border border-gray-100 relative overflow-hidden group">
        <div class="absolute top-0 right-0 w-24 h-24 bg-orange-50 rounded-bl-full -mr-4 -mt-4 transition group-hover:scale-110"></div>
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                    </svg>
                </div>
                <?php if($stats['forms'] > 0): ?>
                <div class="animate-pulse">
                    <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                    </div>
                </div>
                <?php else: ?>
                <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
                <?php endif; ?>
            </div>
            <div>
                <p class="text-gray-500 text-sm font-medium mb-1">Form Baru</p>
                <div class="flex items-baseline space-x-2">
                    <p class="text-4xl font-bold text-gray-900"><?php echo e($stats['forms']); ?></p>
                    <span class="text-orange-600 text-sm font-semibold">belum diproses</span>
                </div>
            </div>
            <div class="mt-4">
                <a href="<?php echo e(route('admin.forms.index')); ?>" class="inline-flex items-center text-orange-600 hover:text-orange-700 font-medium text-sm group-hover:translate-x-1 transition">
                    Lihat Form
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>


<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <a href="<?php echo e(route('admin.packages.create')); ?>" class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 group">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-lg">Tambah Paket</h3>
                <p class="text-blue-100 text-sm">Buat paket internet baru</p>
            </div>
        </div>
    </a>

    <a href="<?php echo e(route('admin.areas.create')); ?>" class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 group">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-lg">Tambah Area</h3>
                <p class="text-green-100 text-sm">Tambah area layanan baru</p>
            </div>
        </div>
    </a>

    <a href="<?php echo e(route('admin.faqs.create')); ?>" class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 group">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-lg">Tambah FAQ</h3>
                <p class="text-purple-100 text-sm">Buat FAQ baru</p>
            </div>
        </div>
    </a>

    <a href="<?php echo e(route('admin.pages.index')); ?>" class="bg-gradient-to-br from-gray-500 to-gray-600 rounded-xl p-6 text-white shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 group">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-4 group-hover:scale-110 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-lg">Edit Halaman</h3>
                <p class="text-gray-100 text-sm">Edit konten halaman</p>
            </div>
        </div>
    </a>
</div>

 
<div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
    <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-gray-900">Form Terbaru</h2>
            <p class="text-gray-500 text-sm mt-1">Minat pemasangan internet yang belum diproses</p>
        </div>
        <?php if($recentSubmissions->count() > 0): ?>
        <a href="<?php echo e(route('admin.forms.index')); ?>" class="inline-flex items-center px-4 py-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition text-sm font-medium">
            Lihat Semua
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
        <?php endif; ?>
    </div>

    <?php if($recentSubmissions->count() > 0): ?>
    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead>
                <tr class="bg-gray-50">
                    <th class="text-left py-3 px-6 text-gray-600 text-xs font-semibold uppercase tracking-wide">Pelanggan</th>
                    <th class="text-left py-3 px-6 text-gray-600 text-xs font-semibold uppercase tracking-wide">WhatsApp</th>
                    <th class="text-left py-3 px-6 text-gray-600 text-xs font-semibold uppercase tracking-wide">Paket Diminati</th>
                    <th class="text-left py-3 px-6 text-gray-600 text-xs font-semibold uppercase tracking-wide">Status</th>
                    <th class="text-left py-3 px-6 text-gray-600 text-xs font-semibold uppercase tracking-wide">Tanggal</th>
                    <th class="text-left py-3 px-6 text-gray-600 text-xs font-semibold uppercase tracking-wide">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $__currentLoopData = $recentSubmissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-4 px-6">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-500 rounded-full flex items-center justify-center text-white font-bold text-sm mr-3">
                                <?php echo e(substr($submission->name, 0, 1)); ?>

                            </div>
                            <div>
                                <p class="font-semibold text-gray-900"><?php echo e($submission->name); ?></p>
                                <p class="text-gray-500 text-sm"><?php echo e(Str::limit($submission->address, 30)); ?></p>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-6">
                        <a href="https://wa.me/<?php echo e(ltrim($submission->whatsapp, '0')); ?>" target="_blank" class="inline-flex items-center text-green-600 hover:text-green-700 font-medium transition hover:underline">
                            <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-1.454-.001-2.866.32-4.171.877l-2.633-1.629 1.736 5.737z"/>
                            </svg>
                            <?php echo e($submission->whatsapp); ?>

                        </a>
                    </td>
                    <td class="py-4 px-6">
                        <?php if($submission->package_interest): ?>
                        <span class="inline-flex items-center px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm font-medium">
                            <?php echo e($submission->package_interest); ?>

                        </span>
                        <?php else: ?>
                        <span class="text-gray-400 text-sm">-</span>
                        <?php endif; ?>
                    </td>
                    <td class="py-4 px-6">
                        <?php if($submission->status === 'new'): ?>
                        <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold">
                            <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                            Baru
                        </span>
                        <?php elseif($submission->status === 'contacted'): ?>
                        <span class="inline-flex items-center px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-semibold">
                            <span class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></span>
                            Dihubungi
                        </span>
                        <?php elseif($submission->status === 'converted'): ?>
                        <span class="inline-flex items-center px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                            Berhasil
                        </span>
                        <?php else: ?>
                        <span class="inline-flex items-center px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-semibold">
                            <span class="w-2 h-2 bg-gray-500 rounded-full mr-2"></span>
                            Batal
                        </span>
                        <?php endif; ?>
                    </td>
                    <td class="py-4 px-6 text-gray-600 text-sm">
                        <?php echo e($submission->created_at->format('d/m/Y')); ?>

                        <span class="text-gray-400"><?php echo e($submission->created_at->format('H:i')); ?></span>
                    </td>
                    <td class="py-4 px-6">
                        <div class="flex items-center space-x-2">
                            <a href="<?php echo e(route('admin.forms.show', $submission->id)); ?>" class="inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition text-sm font-medium">
                                Detail
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
    <div class="text-center py-12">
        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
            </svg>
        </div>
        <p class="text-gray-500 text-lg mb-4">Belum ada form submission</p>
        <p class="text-gray-400 text-sm">Form minat pelanggan akan muncul di sini setelah mereka mengisi form</p>
    </div>
    <?php endif; ?>
</div>


<div class="mt-8 bg-white rounded-xl shadow-md border border-gray-100 p-6">
    <h3 class="text-lg font-bold text-gray-900 mb-4">Quick Links</h3>
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
        <a href="<?php echo e(route('admin.contacts.edit')); ?>" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition group">
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
            </div>
            <span class="text-sm font-medium text-gray-700">Kontak</span>
        </a>

        <a href="<?php echo e(route('admin.settings.edit')); ?>" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition group">
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
            <span class="text-sm font-medium text-gray-700">Pengaturan</span>
        </a>

        <a href="<?php echo e(route('home')); ?>" target="_blank" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition group">
            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
            </div>
            <span class="text-sm font-medium text-gray-700">Lihat Website</span>
        </a>

        <a href="<?php echo e(route('admin.logout')); ?>" class="flex items-center p-4 bg-red-50 rounded-lg hover:bg-red-100 transition group">
            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mr-3 group-hover:scale-110 transition">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
            </div>
            <span class="text-sm font-medium text-red-700">Logout</span>
        </a>
    </div>
</div>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\github_project\arjuna-multimedia-web\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>
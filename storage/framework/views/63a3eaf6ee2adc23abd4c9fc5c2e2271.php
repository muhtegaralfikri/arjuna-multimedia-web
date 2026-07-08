<?php $__env->startSection('content'); ?>

<?php
    $page = \App\Models\Page::bySlug('home')->first();
    $settings = \App\Models\SiteSettings::getSettings();
    $contact = \App\Models\Contact::getContact();
    $popularPackages = \App\Models\Package::active()->ordered()->take(4)->get();
    $areasCount = \App\Models\ServiceArea::active()->available()->count();
?>


<section class="relative bg-gradient-to-br from-primary-600 to-primary-800 text-white py-20 md:py-32">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                <?php echo e($page->hero_title ?? 'Internet Cepat & Stabil untuk Area Perkampungan'); ?>

            </h1>
            <p class="text-xl md:text-2xl text-primary-100 mb-8">
                <?php echo e($page->hero_subtitle ?? 'Nikmati internet berkualitas dengan harga terjangkau. Langganan sekarang!'); ?>

            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <?php if($contact): ?>
                    <a href="<?php echo e($contact->whatsapp_link); ?>" target="_blank" class="inline-flex items-center justify-center px-8 py-4 bg-white text-primary-600 rounded-lg font-semibold hover:bg-gray-100 transition">
                        <?php echo $__env->make('partials.whatsapp-icon', ['class' => 'w-6 h-6 mr-2 object-contain'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        Hubungi WhatsApp
                    </a>
                <?php endif; ?>
                <a href="<?php echo e(route('packages')); ?>" class="inline-flex items-center justify-center px-8 py-4 bg-transparent border-2 border-white text-white rounded-lg font-semibold hover:bg-white hover:text-primary-600 transition">
                    Lihat Paket
                </a>
            </div>
        </div>
    </div>
</section>


<section class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Kenapa Memilih Kami?</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">Kami memberikan layanan internet terbaik untuk kebutuhan rumah dan bisnis Anda</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Cepat & Stabil</h3>
                <p class="text-gray-600">Koneksi internet cepat dengan stabilitas terjamin untuk aktivitas sehari-hari Anda.</p>
            </div>
            
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-success-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Harga Terjangkau</h3>
                <p class="text-gray-600">Paket harga yang bersahabat dengan kualitas internet yang memuaskan.</p>
            </div>
            
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-warning-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-warning-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Area Luas</h3>
                <p class="text-gray-600">Jangkauan layanan yang terus meluas untuk melayani lebih banyak area.</p>
            </div>
            
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-info-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-info-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Support Lokal</h3>
                <p class="text-gray-600">Tim support yang siap membantu dengan respon cepat dan solusi tepat.</p>
            </div>
        </div>
    </div>
</section>


<?php if($popularPackages->count() > 0): ?>
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Pilih Paket Berdasarkan Kecepatan</h2>
            <p class="text-xl text-gray-600">Mbps adalah hal utama yang dicari pelanggan, jadi kami tampilkan paling jelas.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php $__currentLoopData = $popularPackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $speedNumber = preg_replace('/[^0-9]/', '', $package->speed);
                $priceRb = number_format($package->price_monthly / 1000, 0, ',', '.');
            ?>
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border <?php echo e($package->is_popular ? 'border-primary-500' : 'border-gray-200'); ?> relative">
                <?php if($package->is_popular): ?>
                    <div class="absolute top-0 right-0 bg-primary-500 text-white px-4 py-1 text-sm font-semibold rounded-bl-lg">
                        Favorit
                    </div>
                <?php endif; ?>
                <div class="p-6">
                    <h3 class="text-xl font-black text-gray-900"><?php echo e($package->name); ?></h3>
                    <div class="mt-5 rounded-2xl bg-gradient-to-br from-primary-50 to-sky-100 p-5 text-center">
                        <p class="text-xs font-black uppercase tracking-wide text-primary-700">Kecepatan</p>
                        <div class="mt-1 flex items-end justify-center gap-2 text-blue-950">
                            <span class="text-7xl font-black leading-none"><?php echo e($speedNumber); ?></span>
                            <span class="mb-2 text-xl font-black">Mbps</span>
                        </div>
                    </div>
                    <div class="mt-5 mb-4">
                        <p class="text-sm font-bold text-gray-500 uppercase">Harga</p>
                        <div class="flex items-end gap-1">
                            <span class="text-4xl font-black text-primary-600"><?php echo e($priceRb); ?></span>
                            <span class="mb-1 text-xl font-black text-primary-600">RB</span>
                            <span class="mb-1 text-gray-600">/bulan</span>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4"><?php echo e($package->description); ?></p>
                    <?php if($package->features): ?>
                    <ul class="mb-6 space-y-2 text-sm">
                        <?php $__currentLoopData = array_slice($package->features, 0, 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="flex items-center text-gray-700">
                            <svg class="w-4 h-4 text-success-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <?php echo e($feature); ?>

                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php endif; ?>
                    <?php if($contact): ?>
                        <a href="<?php echo e($contact->whatsappLinkForPackage($package->name)); ?>" target="_blank" class="block w-full text-center px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition">
                            Pesan <?php echo e($package->speed); ?>

                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="text-center mt-8">
            <a href="<?php echo e(route('packages')); ?>" class="inline-flex items-center text-primary-600 hover:text-primary-700 font-semibold">
                                Lihat Semua Paket
                                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
        </div>
    </div>
</section>
<?php endif; ?>


<section class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Area Layanan Kami</h2>
            <p class="text-xl text-gray-600 mb-8">Saat ini kami telah melayani <?php echo e($areasCount); ?> area dan terus terus berkembang</p>
            <?php if($contact): ?>
                <a href="<?php echo e($contact->whatsapp_link); ?>" target="_blank" class="inline-flex items-center px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition">
                    Cek Area Anda
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>


<?php if($contact): ?>
<section class="py-16 bg-gradient-to-r from-primary-600 to-primary-800">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Siap untuk Internet Lebih Cepat?</h2>
        <p class="text-xl text-primary-100 mb-8">Hubungi kami sekarang dan nikmati internet berkualitas</p>
        <a href="<?php echo e($contact->whatsapp_link); ?>" target="_blank" class="inline-flex items-center px-8 py-4 bg-white text-primary-600 rounded-lg font-semibold hover:bg-gray-100 transition">
            <?php echo $__env->make('partials.whatsapp-icon', ['class' => 'w-6 h-6 mr-2 object-contain'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            Chat WhatsApp Sekarang
        </a>
    </div>
</section>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\github_project\arjuna-multimedia-web\resources\views/home.blade.php ENDPATH**/ ?>
<?php $__env->startSection('content'); ?>
<?php
    $page = \App\Models\Page::bySlug('package')->first();
    $packages = \App\Models\Package::active()->ordered()->get();
    $contact = \App\Models\Contact::getContact();
    $categories = ['home' => 'Rumah', 'business' => 'Bisnis'];
?>

<?php echo $__env->make('partials.hero-page', ['page' => $page], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<section class="py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex justify-center mb-8">
            <div class="inline-flex rounded-lg border border-gray-300 p-1">
                <button onclick="filterPackages('all')" class="category-btn active px-6 py-2 rounded-md text-sm font-medium transition" data-category="all">Semua</button>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button onclick="filterPackages('<?php echo e($key); ?>')" class="category-btn px-6 py-2 rounded-md text-sm font-medium transition" data-category="<?php echo e($key); ?>"><?php echo e($label); ?></button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        
        <div id="packages-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="package-card bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition" data-category="<?php echo e($package->category); ?>">
                <?php if($package->is_popular): ?>
                <div class="bg-primary-500 text-white text-center py-1 text-sm font-semibold">POPULER</div>
                <?php endif; ?>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2"><?php echo e($package->name); ?></h3>
                    <div class="mb-4">
                        <div class="flex items-baseline">
                            <span class="text-3xl font-bold text-primary-600">Rp <?php echo e(number_format($package->price_monthly, 0, ',', '.')); ?></span>
                            <span class="text-gray-600 ml-1">/bulan</span>
                        </div>
                        <?php if($package->installation_fee > 0): ?>
                        <p class="text-sm text-gray-500">Biaya pasang: Rp <?php echo e(number_format($package->installation_fee, 0, ',', '.')); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-4">
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-primary-100 text-primary-700">
                            <?php echo e($package->speed); ?>

                        </span>
                        <?php if($package->quota): ?>
                        <span class="ml-2 text-sm text-gray-600"><?php echo e($package->quota); ?></span>
                        <?php endif; ?>
                    </div>
                    <?php if($package->description): ?>
                    <p class="text-gray-600 mb-4"><?php echo e($package->description); ?></p>
                    <?php endif; ?>
                    <?php if($package->features): ?>
                    <ul class="mb-6 space-y-2 text-sm">
                        <?php $__currentLoopData = $package->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                    <a href="<?php echo e($contact->whatsapp_link_for_package); ?>?text=Halo%20saya%20tertarik%20dengan%20<?php echo e(urlencode($package->name)); ?>" target="_blank" class="block w-full text-center px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition font-semibold">
                        Pesan Sekarang
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php if($packages->isEmpty()): ?>
        <div class="text-center py-12">
            <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <p class="text-gray-600">Belum ada paket tersedia saat ini.</p>
        </div>
        <?php endif; ?>
    </div>
</section>


<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <h3 class="text-2xl font-bold text-center mb-8">Informasi Tambahan</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-xl">
                    <h4 class="font-semibold mb-2">📋 Ketentuan FUP</h4>
                    <p class="text-gray-600 text-sm">Untuk saat ini semua paket kami adalah Unlimited tanpa FUP (Fair Usage Policy).</p>
                </div>
                <div class="bg-white p-6 rounded-xl">
                    <h4 class="font-semibold mb-2">⏱️ Periode Berlangganan</h4>
                    <p class="text-gray-600 text-sm">Minimal berlangganan 1 bulan. Tidak ada kontrak jangka panjang.</p>
                </div>
                <div class="bg-white p-6 rounded-xl">
                    <h4 class="font-semibold mb-2">🔧 Waktu Pemasangan</h4>
                    <p class="text-gray-600 text-sm">1-3 hari kerja setelah konfirmasi pembayaran biaya pemasangan.</p>
                </div>
                <div class="bg-white p-6 rounded-xl">
                    <h4 class="font-semibold mb-2">💳 Cara Pembayaran</h4>
                    <p class="text-gray-600 text-sm">Transfer bank atau tunai. Pembayaran setiap tanggal 1-5 setiap bulan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function filterPackages(category) {
    const buttons = document.querySelectorAll('.category-btn');
    buttons.forEach(btn => {
        btn.classList.remove('active', 'bg-primary-600', 'text-white');
        btn.classList.add('text-gray-700');
    });

    event.target.classList.add('active', 'bg-primary-600', 'text-white');
    event.target.classList.remove('text-gray-700');

    const cards = document.querySelectorAll('.package-card');
    cards.forEach(card => {
        if (category === 'all' || card.dataset.category === category) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\github_project\arjuna-multimedia-web\resources\views/packages.blade.php ENDPATH**/ ?>
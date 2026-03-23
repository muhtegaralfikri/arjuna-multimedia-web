<?php $__env->startSection('content'); ?>
<?php
    $page = \App\Models\Page::bySlug('area')->first();
    $areas = \App\Models\ServiceArea::active()->ordered()->get();
    $contact = \App\Models\Contact::getContact();
    $availableCount = $areas->where('status', 'available')->count();
    $comingSoonCount = $areas->where('status', 'coming_soon')->count();
?>

<?php echo $__env->make('partials.hero-page', ['page' => $page], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<section class="py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-2 gap-4 mb-12 max-w-2xl mx-auto">
            <div class="text-center p-6 bg-success-50 rounded-xl">
                <div class="text-4xl font-bold text-success-600"><?php echo e($availableCount); ?></div>
                <div class="text-gray-600">Area Tersedia</div>
            </div>
            <div class="text-center p-6 bg-warning-50 rounded-xl">
                <div class="text-4xl font-bold text-warning-600"><?php echo e($comingSoonCount); ?></div>
                <div class="text-gray-600">Segera Hadir</div>
            </div>
        </div>

        
        <div class="mb-8 flex flex-col sm:flex-row gap-4 justify-between items-center max-w-4xl mx-auto">
            <div class="relative w-full">
                <input type="text" id="area-search" placeholder="Cari nama area..." class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            <div class="flex gap-2">
                <button onclick="filterAreas('all')" class="area-filter-btn active px-4 py-2 rounded-lg border border-gray-300 text-sm font-medium transition hover:border-primary-500" data-filter="all">Semua</button>
                <button onclick="filterAreas('available')" class="area-filter-btn px-4 py-2 rounded-lg border border-gray-300 text-sm font-medium transition hover:border-primary-500" data-filter="available">Tersedia</button>
                <button onclick="filterAreas('coming_soon')" class="area-filter-btn px-4 py-2 rounded-lg border border-gray-300 text-sm font-medium transition hover:border-primary-500" data-filter="coming_soon">Segera Hadir</button>
            </div>
        </div>

        
        <div id="areas-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="area-card bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition" data-status="<?php echo e($area->status); ?>" data-name="<?php echo e(strtolower($area->name)); ?>">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900"><?php echo e($area->name); ?></h3>
                            <?php if($area->coverage_detail): ?>
                            <p class="text-sm text-gray-500"><?php echo e($area->coverage_detail); ?></p>
                            <?php endif; ?>
                        </div>
                        <?php if($area->status === 'available'): ?>
                        <span class="px-3 py-1 bg-success-100 text-success-700 rounded-full text-xs font-semibold flex-shrink-0">TERSEDIA ✓</span>
                        <?php elseif($area->status === 'coming_soon'): ?>
                        <span class="px-3 py-1 bg-warning-100 text-warning-700 rounded-full text-xs font-semibold flex-shrink-0">SEGERA HADIR 🔜</span>
                        <?php else: ?>
                        <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-semibold flex-shrink-0">DITUNDA</span>
                        <?php endif; ?>
                    </div>
                    <?php if($area->description): ?>
                    <p class="text-gray-600 mb-4"><?php echo e($area->description); ?></p>
                    <?php endif; ?>
                    <?php if($area->status === 'coming_soon' && $area->estimated_available): ?>
                    <p class="text-sm text-warning-600">Perkiraan tersedia: <?php echo e($area->estimated_available->format('d M Y')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php if($areas->isEmpty()): ?>
        <div class="text-center py-12">
            <p class="text-gray-600">Belum ada area layanan tersedia saat ini.</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php echo $page->content ?? ''; ?>



<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h3 class="text-2xl font-bold text-center mb-8">Cara Berlangganan</h3>
        <div class="max-w-3xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <span class="text-primary-600 font-bold">1</span>
                    </div>
                    <h4 class="font-semibold mb-1">Cek Area</h4>
                    <p class="text-sm text-gray-600">Pastikan area Anda tercover layanan kami</p>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <span class="text-primary-600 font-bold">2</span>
                    </div>
                    <h4 class="font-semibold mb-1">Pilih Paket</h4>
                    <p class="text-sm text-gray-600">Pilih paket yang sesuai kebutuhan Anda</p>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <span class="text-primary-600 font-bold">3</span>
                    </div>
                    <h4 class="font-semibold mb-1">Hubungi Kami</h4>
                    <p class="text-sm text-gray-600">Kontak via WhatsApp untuk pendaftaran</p>
                </div>
                <div class="text-center">
                    <div class="w-12 h-12 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <span class="text-primary-600 font-bold">4</span>
                    </div>
                    <h4 class="font-semibold mb-1">Jadwal Pasang</h4>
                    <p class="text-sm text-gray-600">Tim kami akan jadwalkan pemasangan</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if($contact): ?>
<section class="py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h3 class="text-2xl font-bold mb-4">Area Anda Belum Tercover?</h3>
        <p class="text-gray-600 mb-8">Hubungi kami untuk request ekspansi area</p>
        <a href="<?php echo e($contact->whatsapp_link); ?>" target="_blank" class="inline-flex items-center px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition">
            Request Area Baru
        </a>
    </div>
</section>
<?php endif; ?>

<script>
function filterAreas(status) {
    const buttons = document.querySelectorAll('.area-filter-btn');
    buttons.forEach(btn => {
        btn.classList.remove('active', 'bg-primary-600', 'text-white', 'border-primary-600');
    });

    event.target.classList.add('active', 'bg-primary-600', 'text-white', 'border-primary-600');

    const cards = document.querySelectorAll('.area-card');
    cards.forEach(card => {
        const cardStatus = card.dataset.status;
        if (status === 'all' || cardStatus === status) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

// Search functionality
document.getElementById('area-search')?.addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const cards = document.querySelectorAll('.area-card');

    cards.forEach(card => {
        const areaName = card.dataset.name;
        if (areaName.includes(searchTerm)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\github_project\arjuna-multimedia-web\resources\views/areas.blade.php ENDPATH**/ ?>
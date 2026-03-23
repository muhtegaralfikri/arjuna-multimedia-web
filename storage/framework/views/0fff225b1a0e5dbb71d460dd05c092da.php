<?php $__env->startSection('pageTitle', 'Pengaturan'); ?>

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Pengaturan</h1>
    <p class="text-gray-600">Kelola pengaturan website</p>
</div>

<?php if(session('success')): ?>
<div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow-md p-6">
    <form method="POST" action="<?php echo e(route('admin.settings.update')); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        
        <div class="border-b pb-6 mb-6">
            <h2 class="text-lg font-medium text-gray-800 mb-4">Informasi Website</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="site_name" class="block text-gray-700 text-sm font-medium mb-2">Nama Website *</label>
                    <input type="text" id="site_name" name="site_name" value="<?php echo e(old('site_name', $settings->site_name)); ?>" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Arjuna Net">
                    <?php $__errorArgs = ['site_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="site_url" class="block text-gray-700 text-sm font-medium mb-2">URL Website</label>
                    <input type="url" id="site_url" name="site_url" value="<?php echo e(old('site_url', $settings->site_url)); ?>"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="https://arjuna-net.com">
                    <?php $__errorArgs = ['site_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>

        
        <div class="border-b pb-6 mb-6">
            <h2 class="text-lg font-medium text-gray-800 mb-4">Branding</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="logo_url" class="block text-gray-700 text-sm font-medium mb-2">URL Logo</label>
                    <input type="text" id="logo_url" name="logo_url" value="<?php echo e(old('logo_url', $settings->logo_url)); ?>"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="/images/logo.png">
                    <?php $__errorArgs = ['logo_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="favicon_url" class="block text-gray-700 text-sm font-medium mb-2">URL Favicon</label>
                    <input type="text" id="favicon_url" name="favicon_url" value="<?php echo e(old('favicon_url', $settings->favicon_url)); ?>"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="/favicon.ico">
                    <?php $__errorArgs = ['favicon_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="brand_color_primary" class="block text-gray-700 text-sm font-medium mb-2">Warna Utama</label>
                    <input type="text" id="brand_color_primary" name="brand_color_primary" value="<?php echo e(old('brand_color_primary', $settings->brand_color_primary)); ?>"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="#2563eb">
                    <?php $__errorArgs = ['brand_color_primary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="brand_color_secondary" class="block text-gray-700 text-sm font-medium mb-2">Warna Sekunder</label>
                    <input type="text" id="brand_color_secondary" name="brand_color_secondary" value="<?php echo e(old('brand_color_secondary', $settings->brand_color_secondary)); ?>"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="#1e40af">
                    <?php $__errorArgs = ['brand_color_secondary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>

        
        <div class="border-b pb-6 mb-6">
            <h2 class="text-lg font-medium text-gray-800 mb-4">Analytics & Tracking</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="google_analytics_id" class="block text-gray-700 text-sm font-medium mb-2">Google Analytics ID</label>
                    <input type="text" id="google_analytics_id" name="google_analytics_id" value="<?php echo e(old('google_analytics_id', $settings->google_analytics_id)); ?>"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="G-XXXXXXXXXX">
                    <?php $__errorArgs = ['google_analytics_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="gtm_id" class="block text-gray-700 text-sm font-medium mb-2">Google Tag Manager ID</label>
                    <input type="text" id="gtm_id" name="gtm_id" value="<?php echo e(old('gtm_id', $settings->gtm_id)); ?>"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="GTM-XXXXXX">
                    <?php $__errorArgs = ['gtm_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="md:col-span-2">
                    <label for="google_business_profile_url" class="block text-gray-700 text-sm font-medium mb-2">Google Business Profile URL</label>
                    <input type="url" id="google_business_profile_url" name="google_business_profile_url" value="<?php echo e(old('google_business_profile_url', $settings->google_business_profile_url)); ?>"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="https://g.page/your-business">
                    <?php $__errorArgs = ['google_business_profile_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>

        
        <div class="pb-6 mb-6">
            <h2 class="text-lg font-medium text-gray-800 mb-4">Maintenance Mode</h2>

            <div class="flex items-center">
                <label class="flex items-center">
                    <input type="checkbox" name="maintenance_mode" value="1" <?php echo e($settings->maintenance_mode ? 'checked' : ''); ?> class="mr-2">
                    <span class="text-gray-700 text-sm font-medium">Aktifkan Maintenance Mode</span>
                </label>
                <p class="ml-4 text-sm text-gray-500">Website akan tidak dapat diakses oleh publik</p>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Simpan Pengaturan
            </button>
        </div>
    </form>
</div>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\github_project\arjuna-multimedia-web\resources\views/admin/settings/edit.blade.php ENDPATH**/ ?>
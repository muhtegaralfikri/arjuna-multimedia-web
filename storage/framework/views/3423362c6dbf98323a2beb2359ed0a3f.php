<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <?php if(isset($page)): ?>
        <title><?php echo e($page->meta_title ?? $page->title); ?> - <?php echo e(config('app.name')); ?></title>
        <meta name="description" content="<?php echo e($page->meta_description); ?>">
        <?php if($page->canonical_url): ?>
            <link rel="canonical" href="<?php echo e($page->canonical_url); ?>">
        <?php endif; ?>
        <?php if($page->og_image): ?>
            <meta property="og:image" content="<?php echo e(asset($page->og_image)); ?>">
        <?php endif; ?>
    <?php else: ?>
        <title><?php echo e(config('app.name')); ?></title>
        <meta name="description" content="<?php echo e(config('app.description', 'Arjuna Net - Layanan Internet Lokal')); ?>">
        <link rel="canonical" href="<?php echo e(url()->current()); ?>">
    <?php endif; ?>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('favicon.ico')); ?>">

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    
    <?php if($settings = \App\Models\SiteSettings::first()): ?>
        <style>
            :root {
                --color-primary: <?php echo e($settings->brand_color_primary); ?>;
                --color-secondary: <?php echo e($settings->brand_color_secondary); ?>;
            }
        </style>
    <?php endif; ?>

    
    <?php if($settings && $settings->google_analytics_id): ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e($settings->google_analytics_id); ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '<?php echo e($settings->google_analytics_id); ?>');
        </script>
    <?php endif; ?>

    
    <?php if($settings && $settings->gtm_id): ?>
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','<?php echo e($settings->gtm_id); ?>');</script>
    <?php endif; ?>

    
    <?php echo $__env->yieldContent('seo'); ?>
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-50">
    
    <?php if($settings && $settings->gtm_id): ?>
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo e($settings->gtm_id); ?>"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <?php endif; ?>

    
    <header class="sticky top-0 z-50 bg-white shadow-sm">
        <nav class="container mx-auto px-4 sm:px-6 lg:px-8" x-data="{ open: false }">
            <div class="flex items-center justify-between h-16">
                
                <a href="<?php echo e(route('home')); ?>" class="flex items-center space-x-2">
                    <?php if($settings && $settings->logo_url): ?>
                        <img src="<?php echo e(asset($settings->logo_url)); ?>" alt="<?php echo e($settings->site_name); ?>" class="h-8 w-auto">
                    <?php else: ?>
                        <span class="text-xl font-bold text-primary-600"><?php echo e($settings->site_name ?? 'Arjuna Net'); ?></span>
                    <?php endif; ?>
                </a>

                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="<?php echo e(route('home')); ?>" class="text-gray-700 hover:text-primary-600 transition <?php if(request()->is('/')): ?> text-primary-600 font-semibold <?php endif; ?>">Beranda</a>
                    <a href="<?php echo e(route('about')); ?>" class="text-gray-700 hover:text-primary-600 transition <?php if(request()->is('tentang')): ?> text-primary-600 font-semibold <?php endif; ?>">Tentang Kami</a>
                    <a href="<?php echo e(route('packages')); ?>" class="text-gray-700 hover:text-primary-600 transition <?php if(request()->is('paket')): ?> text-primary-600 font-semibold <?php endif; ?>">Paket</a>
                    <a href="<?php echo e(route('areas')); ?>" class="text-gray-700 hover:text-primary-600 transition <?php if(request()->is('area')): ?> text-primary-600 font-semibold <?php endif; ?>">Area</a>
                    <a href="<?php echo e(route('faq')); ?>" class="text-gray-700 hover:text-primary-600 transition <?php if(request()->is('faq')): ?> text-primary-600 font-semibold <?php endif; ?>">FAQ</a>
                    <a href="<?php echo e(route('contact')); ?>" class="text-gray-700 hover:text-primary-600 transition <?php if(request()->is('kontak')): ?> text-primary-600 font-semibold <?php endif; ?>">Kontak</a>
                </div>

                
                <?php if($contact = \App\Models\Contact::getContact()): ?>
                    <div class="hidden md:block">
                        <a href="<?php echo e($contact->whatsapp_link); ?>" target="_blank" class="inline-flex items-center px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-1.454-.001-2.866.32-4.171.877l-2.633-1.629 1.736 5.737z"/>
                            </svg>
                            Hubungi Kami
                        </a>
                    </div>
                <?php endif; ?>

                
                <button type="button" @click="open = !open" class="md:hidden p-2 rounded-lg text-gray-700 hover:bg-gray-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" style="display: none;"/>
                    </svg>
                </button>
            </div>

            
            <div x-show="open" @click.away="open = false" class="md:hidden" style="display: none;" x-transition>
                <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t border-gray-100 shadow-md">
                    <a href="<?php echo e(route('home')); ?>" class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 <?php if(request()->is('/')): ?> bg-primary-50 text-primary-600 <?php endif; ?>">Beranda</a>
                    <a href="<?php echo e(route('about')); ?>" class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 <?php if(request()->is('tentang')): ?> bg-primary-50 text-primary-600 <?php endif; ?>">Tentang Kami</a>
                    <a href="<?php echo e(route('packages')); ?>" class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 <?php if(request()->is('paket')): ?> bg-primary-50 text-primary-600 <?php endif; ?>">Paket</a>
                    <a href="<?php echo e(route('areas')); ?>" class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 <?php if(request()->is('area')): ?> bg-primary-50 text-primary-600 <?php endif; ?>">Area</a>
                    <a href="<?php echo e(route('faq')); ?>" class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 <?php if(request()->is('faq')): ?> bg-primary-50 text-primary-600 <?php endif; ?>">FAQ</a>
                    <a href="<?php echo e(route('contact')); ?>" class="block px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 <?php if(request()->is('kontak')): ?> bg-primary-50 text-primary-600 <?php endif; ?>">Kontak</a>
                </div>
            </div>
        </nav>
    </header>

    
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    
    <footer class="bg-gray-900 text-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <div>
                    <?php if($settings && $settings->logo_url): ?>
                        <img src="<?php echo e(asset($settings->logo_url)); ?>" alt="<?php echo e($settings->site_name); ?>" class="h-10 w-auto mb-4 brightness-0 invert">
                    <?php else: ?>
                        <h3 class="text-xl font-bold mb-4"><?php echo e($settings->site_name ?? 'Arjuna Net'); ?></h3>
                    <?php endif; ?>
                    <p class="text-gray-400 mb-4">Layanan internet lokal cepat, stabil, dan terjangkau untuk area perkampungan.</p>
                    <?php if($contact = \App\Models\Contact::getContact()): ?>
                        <div class="flex space-x-4">
                            <?php if($contact->instagram_url): ?>
                                <a href="<?php echo e($contact->instagram_url); ?>" target="_blank" class="text-gray-400 hover:text-white transition">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </a>
                            <?php endif; ?>
                            <?php if($contact->facebook_url): ?>
                                <a href="<?php echo e($contact->facebook_url); ?>" target="_blank" class="text-gray-400 hover:text-white transition">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                            <?php endif; ?>
                            <?php if($contact->tiktok_url): ?>
                                <a href="<?php echo e($contact->tiktok_url); ?>" target="_blank" class="text-gray-400 hover:text-white transition">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.49.03-2.91-.34-4.2-1.12v-4.29c1.23.55 2.57.84 3.89.87 1.28.03 2.61-.28 3.71-1.05 1.25-.87 2.08-2.23 2.23-3.74.05-1.07-.22-2.12-.77-3-1.28-.63-.44-1.24-.92-1.82-1.44.01-2.91-.02-5.82.02-8.73zm-5.95 8.1c-1.38-1.08-2.52-2.55-3.22-4.23-.56-1.36-.82-2.87-.75-4.38.03-.97.26-1.92.67-2.79.86-1.85 2.51-3.21 4.57-3.69v4.01c-1.4-.05-2.81-.34-4.08-.94-.29-.14-.58-.31-.86-.49-.02-2.92 0-5.84.01-8.76.07-1.36.52-2.67 1.38-3.63 2.53-1.18 1.43-1.8 3.34-1.74 5.24.04 1.22.43 2.39 1.11 3.41.64.95 1.5 1.7 2.48 2.16.01 2.91-.01 5.83-.02 8.75z"/></svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>

                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Menu</h4>
                    <ul class="space-y-2">
                        <li><a href="<?php echo e(route('home')); ?>" class="text-gray-400 hover:text-white transition">Beranda</a></li>
                        <li><a href="<?php echo e(route('about')); ?>" class="text-gray-400 hover:text-white transition">Tentang Kami</a></li>
                        <li><a href="<?php echo e(route('packages')); ?>" class="text-gray-400 hover:text-white transition">Paket Internet</a></li>
                        <li><a href="<?php echo e(route('areas')); ?>" class="text-gray-400 hover:text-white transition">Area Layanan</a></li>
                        <li><a href="<?php echo e(route('faq')); ?>" class="text-gray-400 hover:text-white transition">FAQ</a></li>
                    </ul>
                </div>

                
                <?php if($contact = \App\Models\Contact::getContact()): ?>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Hubungi Kami</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span><?php echo e($contact->phone_number); ?></span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span><?php echo e($contact->email); ?></span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span><?php echo e($contact->address); ?></span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span><?php echo e($contact->operating_hours); ?></span>
                        </li>
                    </ul>
                </div>
                <?php endif; ?>
            </div>

            
            <div class="border-t border-gray-800 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">&copy; <?php echo e(date('Y')); ?> <?php echo e($settings->site_name ?? 'Arjuna Net'); ?>. All rights reserved.</p>
                <?php if($settings && $settings->google_business_profile_url): ?>
                    <a href="<?php echo e($settings->google_business_profile_url); ?>" target="_blank" class="text-gray-400 hover:text-white text-sm flex items-center mt-4 md:mt-0 transition">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.73-1.73-.69-.33-1.43-.59-2.17-.69-.29-.04-.59-.06-.89-.06h-.1c-.27 0-.53.05-.77.14-.27.11-.52.28-.73.51-.14.15-.25.34-.33.54l-.35.87c-.11.26-.14.55-.08.83.05.24.18.45.36.6.18.14.4.23.64.25.24.03.49.01.72-.05.21-.06.41-.17.56-.33l.73-.73c.15-.15.34-.25.54-.33.28-.11.57-.14.85-.08.24.05.45.18.6.36.14.18.23.4.25.64.03.24.01.49-.05.72-.06.21-.17.41-.33.56l-.3.3c-.09-.09-.22-.14-.37-.14h-.1c-.15 0-.3.03-.43.08l-.01.01c-.06.03-.12.07-.17.12-.28.26-.54.54-.77.85-.23.31-.43.64-.58.99-.15.35-.26.72-.31 1.11-.05.39-.03.8.06 1.18.09.38.23.74.43 1.07l.12.2c.12.2.27.43.43.66.16.23.35.43.57.58.22.15.47.25.73.3.26.05.53.07.8.05.27-.03.53-.11.75-.25.22-.14.41-.33.55-.57.14-.24.23-.52.25-.8.02-.28-.02-.57-.07-.83-.05-.26-.14-.5-.27-.71l-.2-.33c-.13-.22-.22-.47-.25-.74-.03-.27.01-.55.12-.79.11-.24.28-.45.5-.6.22-.15.48-.25.77-.3.29-.05.59-.06.89-.06h.1c.15 0 .3.03.43.08.13.05.26.12.37.21l.01.01c.05.04.11.08.17.12.23.18.5.35.8.48z"/></svg>
                        Google Review
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </footer>

    
    <?php if($contact = \App\Models\Contact::getContact()): ?>
        <a href="<?php echo e($contact->whatsapp_link); ?>" target="_blank" class="fixed bottom-6 right-6 z-50 bg-green-500 text-white p-3 rounded-full shadow-lg hover:bg-green-600 transition md:hidden">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-1.454-.001-2.866.32-4.171.877l-2.633-1.629 1.736 5.737z"/>
            </svg>
        </a>
    <?php endif; ?>
</body>
</html>
<?php /**PATH D:\github_project\arjuna-multimedia-web\resources\views/layouts/app.blade.php ENDPATH**/ ?>
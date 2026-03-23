<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Login Admin - Arjuna Multimedia</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-sans antialiased text-slate-900 bg-white min-h-screen">

    <div class="flex flex-col lg:flex-row-reverse w-full min-h-screen relative overflow-hidden">
        
        
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 lg:p-16 relative z-10 bg-white">
            <div class="w-full max-w-md">
                
                
                <?php if(session('error')): ?>
                <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-700 rounded-2xl flex items-center shadow-sm">
                    <svg class="w-5 h-5 mr-3 text-rose-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="font-medium text-sm"><?php echo e(session('error')); ?></span>
                </div>
                <?php endif; ?>

                <?php if(session('success')): ?>
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl flex items-center shadow-sm">
                    <svg class="w-5 h-5 mr-3 text-emerald-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="font-medium text-sm"><?php echo e(session('success')); ?></span>
                </div>
                <?php endif; ?>

                
                <div class="mb-10 text-left">
                    <div class="flex items-center space-x-3 mb-8">
                        <div class="w-12 h-12 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-600/30">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-xl font-bold text-slate-900 tracking-tight">Arjuna Multi</h1>
                            <p class="text-[0.65rem] font-medium text-slate-500 uppercase tracking-widest">Admin Panel</p>
                        </div>
                    </div>
                    
                    <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 tracking-tight mb-3">Selamat Datang 👋</h2>
                    <p class="text-slate-500 text-sm sm:text-base leading-relaxed">Silakan masuk menggunakan email dan kata sandi Anda untuk mengakses dashboard manajemen.</p>
                </div>

                <form method="POST" action="<?php echo e(route('admin.login.submit')); ?>" class="space-y-6">
                    <?php echo csrf_field(); ?>

                    
                    <div>
                        <label for="email" class="block text-slate-700 text-sm font-semibold mb-2">Alamat Email</label>
                        <div class="relative group">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 transition-colors group-focus-within:text-indigo-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                </svg>
                            </span>
                            <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus
                                class="w-full pl-12 pr-4 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:bg-white focus:border-transparent transition-all text-slate-900 placeholder-slate-400 font-medium text-sm"
                                placeholder="nama@email.com">
                        </div>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-2 text-xs text-rose-600 font-medium flex items-center">
                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <?php echo e($message); ?>

                            </p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div x-data="{ showPassword: false }">
                        <div class="flex items-center justify-between mb-2">
                            <label for="password" class="block text-slate-700 text-sm font-semibold">Kata Sandi</label>
                        </div>
                        <div class="relative group">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 transition-colors group-focus-within:text-indigo-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </span>
                            <input :type="showPassword ? 'text' : 'password'" id="password" name="password" required
                                class="w-full pl-12 pr-12 py-3.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:bg-white focus:border-transparent transition-all text-slate-900 placeholder-slate-400 font-medium text-sm"
                                placeholder="••••••••">
                            
                            
                            <button type="button" @click="showPassword = !showPassword" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-indigo-600 focus:outline-none focus:text-indigo-600 transition-colors p-1 rounded-md">
                                
                                <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                
                                <svg x-show="showPassword" style="display: none;" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                </svg>
                            </button>
                        </div>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-2 text-xs text-rose-600 font-medium flex items-center">
                                <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <?php echo e($message); ?>

                            </p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3.5 px-4 rounded-xl transition-all duration-300 shadow-md shadow-indigo-600/20 hover:shadow-indigo-600/40 hover:-translate-y-0.5 flex items-center justify-center space-x-2 group mt-2">
                        <span>Masuk ke Dashboard</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                    
                    
                    <div class="pt-4 text-center">
                        <a href="<?php echo e(route('home')); ?>" class="inline-flex items-center justify-center text-sm text-slate-500 hover:text-indigo-600 font-medium transition-colors">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            Kembali ke Halaman Publik
                        </a>
                    </div>
                </form>

                
                <div class="mt-12 text-center">
                    <p class="text-[0.7rem] text-slate-400 font-medium uppercase tracking-wider">
                        &copy; <?php echo e(date('Y')); ?> Arjuna Multimedia. Terhubung Penuh.
                    </p>
                </div>
            </div>
        </div>

        
        <div class="hidden lg:flex lg:w-1/2 relative bg-indigo-900 border-r border-slate-200 shadow-inner overflow-hidden flex-col items-center justify-center">
            
            
            <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&q=80&w=2070" 
                 class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-30 object-center" 
                 alt="Teknologi dan Jaringan Server">
            
            
            <div class="absolute inset-0 bg-gradient-to-tr from-indigo-900/95 via-indigo-800/80 to-indigo-500/30 backdrop-blur-[2px]"></div>
            
            
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl mix-blend-screen animate-pulse duration-10000"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl mix-blend-screen animate-pulse duration-7000"></div>
            
            
            <div class="relative z-10 px-12 lg:px-24 flex flex-col justify-center h-full">
                
                
                <div class="inline-flex items-center px-3 py-1.5 rounded-full bg-white/10 border border-white/20 text-indigo-200 text-xs font-bold uppercase tracking-widest backdrop-blur-md mb-8 w-max">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-400 mr-2 animate-pulse"></span>
                    Sistem Manajemen Terpadu
                </div>
                
                <h2 class="text-4xl text-white font-bold leading-tight mb-6">
                    Membangun Konektivitas<br/><span class="text-indigo-300">Tanpa Batas.</span>
                </h2>
                
                <p class="text-indigo-100/80 text-lg leading-relaxed mb-12 max-w-lg">
                    Pantau kinerja jaringan, kelola area pelanggan, dan kembangkan bisnis internet Anda melalui alat kendali super canggih.
                </p>
                
                
                <div class="grid grid-cols-2 gap-4 max-w-lg">
                    <div class="bg-white/10 backdrop-blur-md border border-white/10 rounded-2xl p-6 relative overflow-hidden group hover:bg-white/15 transition-all">
                        <div class="absolute top-0 right-0 p-4 opacity-10 transform translate-x-1/4 -translate-y-1/4 group-hover:scale-110 transition-transform">
                            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <p class="text-indigo-200 font-medium text-xs uppercase tracking-widest mb-2 relative z-10">Kecepatan</p>
                        <p class="text-white font-bold text-3xl relative z-10">Real-time</p>
                    </div>
                    
                    <div class="bg-white/10 backdrop-blur-md border border-white/10 rounded-2xl p-6 relative overflow-hidden group hover:bg-white/15 transition-all">
                        <div class="absolute top-0 right-0 p-4 opacity-10 transform translate-x-1/4 -translate-y-1/4 group-hover:scale-110 transition-transform">
                            <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <p class="text-indigo-200 font-medium text-xs uppercase tracking-widest mb-2 relative z-10">Keamanan</p>
                        <p class="text-white font-bold text-3xl relative z-10">Terjamin</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH D:\github_project\arjuna-multimedia-web\resources\views/admin/login.blade.php ENDPATH**/ ?>
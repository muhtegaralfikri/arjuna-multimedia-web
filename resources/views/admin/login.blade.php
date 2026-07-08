<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Admin - Arjuna Net</title>
    @vite(['resources/css/app.css'])

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body class="font-sans antialiased text-slate-900 bg-slate-50 min-h-screen">
    <main class="min-h-screen grid grid-cols-1 lg:grid-cols-[0.95fr_1.05fr]">
        <section class="hidden lg:flex bg-gradient-to-br from-primary-700 to-primary-900 text-white p-12 xl:p-16">
            <div class="max-w-xl self-center">
                <div class="inline-flex items-center rounded-full bg-white/10 border border-white/20 px-4 py-2 text-sm font-bold text-primary-100 mb-8">
                    Panel Administrasi Arjuna Net
                </div>
                <h1 class="text-5xl font-black leading-tight">
                    Kelola paket, konten, dan informasi pelanggan dari satu tempat.
                </h1>
                <p class="mt-6 text-lg text-primary-100 leading-relaxed">
                    Dashboard ini digunakan untuk memperbarui paket internet, FAQ, kontak, dan pengaturan website Arjuna Net.
                </p>
                <div class="mt-10 grid grid-cols-2 gap-4">
                    <div class="rounded-xl bg-white/10 border border-white/15 p-5">
                        <p class="text-sm font-bold uppercase tracking-wide text-primary-200">Akses</p>
                        <p class="mt-2 text-2xl font-black">Admin</p>
                    </div>
                    <div class="rounded-xl bg-white/10 border border-white/15 p-5">
                        <p class="text-sm font-bold uppercase tracking-wide text-primary-200">Brand</p>
                        <p class="mt-2 text-2xl font-black">Arjuna Net</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="flex items-center justify-center px-5 py-10 sm:px-8 lg:px-12">
            <div class="w-full max-w-md">
                <div class="mb-8 text-center">
                    <a href="{{ route('home') }}" class="inline-flex justify-center">
                        <img src="{{ asset('logo.png') }}" alt="Arjuna Net" class="h-28 w-auto object-contain">
                    </a>
                    <p class="mt-4 text-sm font-bold uppercase tracking-[0.2em] text-primary-700">Admin Panel</p>
                    <h2 class="mt-3 text-3xl font-black text-slate-950">Masuk ke dashboard</h2>
                    <p class="mt-2 text-slate-500">Gunakan akun admin untuk mengelola website.</p>
                </div>

                @if(session('error'))
                <div class="mb-5 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm font-medium text-rose-700">
                    {{ session('error') }}
                </div>
                @endif

                @if(session('success'))
                <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm font-medium text-emerald-700">
                    {{ session('success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('admin.login.submit') }}" class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-bold text-slate-700 mb-2">Email</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                </svg>
                            </span>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3.5 pl-12 pr-4 text-sm font-medium text-slate-900 placeholder-slate-400 transition focus:border-primary-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500"
                                placeholder="admin@arjunanet.id">
                        </div>
                        @error('email')
                            <p class="mt-2 text-xs font-semibold text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-5">
                        <label for="password" class="block text-sm font-bold text-slate-700 mb-2">Kata sandi</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </span>
                            <input type="password" id="password" name="password" required
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3.5 pl-12 pr-12 text-sm font-medium text-slate-900 placeholder-slate-400 transition focus:border-primary-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-primary-500"
                                placeholder="Masukkan kata sandi">
                            <button type="button" id="togglePasswordButton" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-primary-700 transition" aria-label="Tampilkan kata sandi">
                                <svg id="showPasswordIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <svg id="hidePasswordIcon" class="hidden w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-2 text-xs font-semibold text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="mt-6 inline-flex w-full items-center justify-center rounded-xl bg-primary-700 px-5 py-3.5 font-bold text-white transition hover:bg-primary-800 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                        Masuk
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <a href="{{ route('home') }}" class="text-sm font-semibold text-slate-500 hover:text-primary-700 transition">
                        Kembali ke website
                    </a>
                </div>
            </div>
        </section>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const input = document.getElementById('password');
            const button = document.getElementById('togglePasswordButton');
            const showIcon = document.getElementById('showPasswordIcon');
            const hideIcon = document.getElementById('hidePasswordIcon');

            if (!input || !button || !showIcon || !hideIcon) {
                return;
            }

            button.addEventListener('click', () => {
                const isHidden = input.type === 'password';

                input.type = isHidden ? 'text' : 'password';
                showIcon.classList.toggle('hidden', isHidden);
                hideIcon.classList.toggle('hidden', !isHidden);
                button.setAttribute('aria-label', isHidden ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi');
            });
        });
    </script>
</body>
</html>

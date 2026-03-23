<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $pageTitle ?? 'Admin' }} - Arjuna Multimedia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-sans antialiased bg-slate-50 text-slate-900">
    <div class="flex h-screen overflow-hidden">
        {{-- Sidebar --}}
        <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col shadow-2xl z-20 flex-shrink-0 transition-all duration-300">
            {{-- Logo --}}
            <div class="p-6 border-b border-slate-800/60">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-600/30">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-white tracking-tight">Arjuna Multi</h1>
                        <p class="text-[0.65rem] font-medium text-slate-400 uppercase tracking-widest">Admin Panel</p>
                    </div>
                </div>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto custom-scrollbar">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 shadow-md shadow-indigo-600/20 text-white' : 'hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-slate-400 group-hover:text-white' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="font-medium text-sm">Dashboard</span>
                </a>

                <a href="{{ route('admin.packages.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.packages.*') ? 'bg-indigo-600 shadow-md shadow-indigo-600/20 text-white' : 'hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.packages.*') ? 'text-white' : 'text-slate-400 group-hover:text-white' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    <span class="font-medium text-sm">Paket Internet</span>
                </a>

                <a href="{{ route('admin.areas.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.areas.*') ? 'bg-indigo-600 shadow-md shadow-indigo-600/20 text-white' : 'hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.areas.*') ? 'text-white' : 'text-slate-400 group-hover:text-white' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span class="font-medium text-sm">Area Layanan</span>
                </a>

                <a href="{{ route('admin.faqs.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.faqs.*') ? 'bg-indigo-600 shadow-md shadow-indigo-600/20 text-white' : 'hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.faqs.*') ? 'text-white' : 'text-slate-400 group-hover:text-white' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="font-medium text-sm">FAQ</span>
                </a>

                <a href="{{ route('admin.forms.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.forms.*') ? 'bg-indigo-600 shadow-md shadow-indigo-600/20 text-white' : 'hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.forms.*') ? 'text-white' : 'text-slate-400 group-hover:text-white' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span class="font-medium text-sm">Form Minat</span>
                </a>

                <div class="pt-6 pb-2">
                    <p class="px-4 text-[0.65rem] font-bold text-slate-500 uppercase tracking-wider">Konten</p>
                </div>

                <a href="{{ route('admin.contacts.edit') }}"
                    class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.contacts.*') ? 'bg-indigo-600 shadow-md shadow-indigo-600/20 text-white' : 'hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.contacts.*') ? 'text-white' : 'text-slate-400 group-hover:text-white' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span class="font-medium text-sm">Kontak</span>
                </a>

                <a href="{{ route('admin.pages.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.pages.*') ? 'bg-indigo-600 shadow-md shadow-indigo-600/20 text-white' : 'hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.pages.*') ? 'text-white' : 'text-slate-400 group-hover:text-white' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span class="font-medium text-sm">Halaman</span>
                </a>

                <div class="pt-6 pb-2">
                    <p class="px-4 text-[0.65rem] font-bold text-slate-500 uppercase tracking-wider">Sistem</p>
                </div>

                <a href="{{ route('admin.settings.edit') }}"
                    class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.settings.*') ? 'bg-indigo-600 shadow-md shadow-indigo-600/20 text-white' : 'hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.settings.*') ? 'text-white' : 'text-slate-400 group-hover:text-white' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 00-1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span class="font-medium text-sm">Pengaturan</span>
                </a>
            </nav>

            {{-- User Info & Logout --}}
            <div class="p-4 border-t border-slate-800/60 bg-slate-900/50 backdrop-blur-sm">
                <div class="flex items-center justify-between mb-4 px-2">
                    <div class="flex items-center space-x-3">
                        <div class="w-9 h-9 bg-indigo-500/20 text-indigo-400 rounded-full flex items-center justify-center font-bold text-sm ring-1 ring-indigo-500/50">
                            {{ substr(auth('admin')->user()->name ?? 'A', 0, 1) }}
                        </div>
                        <div>
                            <p class="font-medium text-sm text-white truncate max-w-[100px]">{{ auth('admin')->user()->name ?? 'Admin' }}</p>
                            <p class="text-[0.65rem] text-slate-400">{{ auth('admin')->user()->role ?? 'Super Admin' }}</p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('admin.logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center px-4 py-2 bg-red-500/10 hover:bg-red-500/20 text-red-500 rounded-xl transition-all duration-200 group border border-red-500/20">
                        <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        <span class="font-medium text-sm">Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 overflow-y-auto bg-slate-50 relative">
            {{-- Decorative Background --}}
            <div class="absolute top-0 left-0 right-0 h-48 bg-indigo-600 z-0 sm:h-40"></div>

            {{-- Header --}}
            <header class="relative z-10 px-6 py-5 sm:px-8 mt-4">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between bg-white/10 backdrop-blur-md border border-white/20 p-5 rounded-2xl shadow-sm text-white space-y-4 sm:space-y-0">
                    <div>
                        <h1 class="text-2xl font-bold tracking-tight">{{ $pageTitle ?? 'Dashboard' }}</h1>
                        <p class="text-indigo-100 text-sm mt-0.5 opacity-90 block">Kelola dan pantau kinerja website Anda</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-white text-indigo-600 rounded-xl hover:bg-indigo-50 transition-colors text-sm font-semibold shadow-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                            Kunjungi Web
                        </a>
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <div class="relative z-10 p-6 sm:p-8 pt-2">
                @yield('content')
            </div>
        </main>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.2);
        }
    </style>
    @stack('scripts')
</body>
</html>

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $pageTitle ?? 'Admin' }} - Arjuna Net</title>
    @vite(['resources/css/app.css'])

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-sans antialiased bg-slate-100 text-slate-900">
    <div class="flex h-screen overflow-hidden">
        
        {{-- Mobile Overlay (Backdrop) --}}
        <div id="sidebarOverlay" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-30 hidden lg:hidden transition-opacity opacity-0" aria-hidden="true"></div>

        {{-- Sidebar --}}
        <aside id="mainSidebar" class="w-64 bg-white text-slate-700 flex flex-col border-r border-slate-200 shadow-xl z-40 flex-shrink-0 transition-transform duration-300 ease-in-out fixed inset-y-0 left-0 -translate-x-full lg:relative lg:translate-x-0">
            {{-- Logo --}}
            <div class="p-5 border-b border-slate-200 bg-white">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                    <img src="{{ asset('logo.png') }}" alt="Arjuna Net" class="h-14 w-auto max-w-[118px] object-contain">
                    <div class="min-w-0">
                        <h1 class="text-lg font-black text-slate-950 tracking-tight leading-tight">Arjuna Net</h1>
                        <p class="text-[0.68rem] font-bold text-primary-600 uppercase tracking-widest">Admin Panel</p>
                    </div>
                </a>
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

                <a href="{{ route('admin.faqs.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.faqs.*') ? 'bg-indigo-600 shadow-md shadow-indigo-600/20 text-white' : 'hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.faqs.*') ? 'text-white' : 'text-slate-400 group-hover:text-white' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="font-medium text-sm">FAQ</span>
                </a>

                <a href="{{ route('admin.testimonials.index') }}"
                    class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.testimonials.*') ? 'bg-indigo-600 shadow-md shadow-indigo-600/20 text-white' : 'hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.testimonials.*') ? 'text-white' : 'text-slate-400 group-hover:text-white' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 4v-4z"/>
                    </svg>
                    <span class="font-medium text-sm">Testimoni</span>
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.4 15a1.7 1.7 0 00.34 1.88l.04.04a2 2 0 01-2.83 2.83l-.04-.04A1.7 1.7 0 0015 19.4a1.7 1.7 0 00-1 1.55V21a2 2 0 01-4 0v-.05a1.7 1.7 0 00-1-1.55 1.7 1.7 0 00-1.88.34l-.04.04a2 2 0 01-2.83-2.83l.04-.04A1.7 1.7 0 004.6 15a1.7 1.7 0 00-1.55-1H3a2 2 0 010-4h.05A1.7 1.7 0 004.6 9a1.7 1.7 0 00-.34-1.88l-.04-.04a2 2 0 012.83-2.83l.04.04A1.7 1.7 0 009 4.6a1.7 1.7 0 001-1.55V3a2 2 0 014 0v.05A1.7 1.7 0 0015 4.6a1.7 1.7 0 001.88-.34l.04-.04a2 2 0 012.83 2.83l-.04.04A1.7 1.7 0 0019.4 9a1.7 1.7 0 001.55 1H21a2 2 0 010 4h-.05A1.7 1.7 0 0019.4 15z"/>
                    </svg>
                    <span class="font-medium text-sm">Pengaturan</span>
                </a>
            </nav>

            {{-- User Info & Logout --}}
            <div class="p-4 border-t border-slate-200 bg-slate-50">
                <div class="flex items-center justify-between mb-4 px-2">
                    <div class="flex items-center space-x-3">
                        <div class="w-9 h-9 bg-primary-100 text-primary-700 rounded-full flex items-center justify-center font-bold text-sm ring-1 ring-primary-200">
                            {{ substr(auth('admin')->user()->name ?? 'A', 0, 1) }}
                        </div>
                        <div>
                            <p class="font-semibold text-sm text-slate-900 truncate max-w-[100px]">{{ auth('admin')->user()->name ?? 'Admin' }}</p>
                            <p class="text-[0.65rem] text-slate-500">{{ auth('admin')->user()->role ?? 'Super Admin' }}</p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('admin.logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center px-4 py-2 bg-white hover:bg-red-50 text-red-600 rounded-xl transition-all duration-200 group border border-red-200 shadow-sm">
                        <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        <span class="font-medium text-sm">Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 flex flex-col overflow-y-auto bg-slate-100 relative w-full">
            
            {{-- Mobile Navbar (Header for Small Screens) --}}
            <div class="lg:hidden sticky top-0 z-20 flex items-center justify-between px-4 py-3 bg-white text-slate-900 border-b border-slate-200 shadow-sm">
                <div class="flex items-center space-x-3">
                    <img src="{{ asset('logo.png') }}" alt="Arjuna Net" class="h-10 w-auto object-contain">
                    <h1 class="text-base font-black tracking-tight">Admin</h1>
                </div>
                <button id="openSidebarBtn" class="p-2 -mr-2 text-primary-700 hover:bg-primary-50 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-primary-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>

            {{-- Decorative Background (Hidden on small screens since Mobile Navbar replaces it conceptually) --}}
            <div class="absolute top-0 left-0 right-0 h-40 bg-gradient-to-br from-primary-50 via-white to-sky-50 z-0 hidden lg:block"></div>

            {{-- Header (Desktop mostly, adjusted for mobile) --}}
            <header class="relative z-10 px-4 sm:px-6 pt-6 pb-2 lg:pt-8 lg:pb-4 lg:mb-2 text-slate-900">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between bg-white border border-slate-200 p-5 lg:p-6 rounded-lg shadow-sm space-y-4 sm:space-y-0">
                    <div>
                        <h1 class="text-2xl font-black tracking-tight text-slate-950">{{ $pageTitle ?? 'Dashboard' }}</h1>
                        <p class="text-slate-500 text-sm mt-0.5 block">Kelola paket, FAQ, kontak, dan konten website Arjuna Net.</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors text-sm font-semibold shadow-sm">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                            Kunjungi Web
                        </a>
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <div class="relative z-10 px-4 sm:px-6 lg:px-8 py-6 lg:py-8">
                @yield('content')
            </div>
        </main>
    </div>

    <style>
        #mainSidebar nav a {
            color: rgb(71 85 105);
            box-shadow: none;
        }

        #mainSidebar nav a:hover {
            background: rgb(248 250 252);
            color: rgb(29 78 216);
        }

        #mainSidebar nav a.bg-indigo-600 {
            background: rgb(239 246 255) !important;
            color: rgb(29 78 216) !important;
            box-shadow: none !important;
            border: 1px solid rgb(191 219 254);
        }

        #mainSidebar nav a svg {
            color: rgb(148 163 184);
        }

        #mainSidebar nav a:hover svg,
        #mainSidebar nav a.bg-indigo-600 svg {
            color: rgb(37 99 235) !important;
        }

        #mainSidebar nav p {
            color: rgb(148 163 184);
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgb(203 213 225);
            border-radius: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgb(148 163 184);
        }
    </style>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('mainSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const openBtn = document.getElementById('openSidebarBtn');

            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                // Use a tiny timeout to allow display:block to apply before animating opacity
                setTimeout(() => {
                    overlay.classList.remove('opacity-0');
                    overlay.classList.add('opacity-100');
                }, 10);
                document.body.classList.add('overflow-hidden'); // Prevent background scrolling
            }

            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.remove('opacity-100');
                overlay.classList.add('opacity-0');
                setTimeout(() => {
                    overlay.classList.add('hidden');
                }, 300); // match duration-300
                document.body.classList.remove('overflow-hidden');
            }

            if(openBtn) {
                openBtn.addEventListener('click', openSidebar);
            }
            if(overlay) {
                overlay.addEventListener('click', closeSidebar);
            }
            
            // Close sidebar when clicking links on mobile
            const links = sidebar.querySelectorAll('a');
            links.forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 1024) { // lg breakpoint
                        closeSidebar();
                    }
                });
            });
        });
    </script>
    @stack('scripts')
</body>
</html>

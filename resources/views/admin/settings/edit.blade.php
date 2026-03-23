@extends('admin.layout')

@section('pageTitle', 'Pengaturan Website')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Pengaturan Website</h1>
        <p class="text-slate-500 text-sm mt-1">Kelola konfigurasi dasar, branding, analitik, dan status website.</p>
    </div>
</div>

@if(session('success'))
<div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-xl flex items-start">
    <svg class="w-5 h-5 text-emerald-500 mt-0.5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    <div class="text-emerald-800 text-sm font-medium">{{ session('success') }}</div>
</div>
@endif

<form method="POST" action="{{ route('admin.settings.update') }}">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        {{-- Left Column: Main Settings --}}
        <div class="lg:col-span-8 space-y-8">
            {{-- Site Info Card --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden">
                <div class="p-6 sm:p-8">
                    <h2 class="text-lg font-bold text-slate-900 flex items-center mb-6 border-b border-slate-100 pb-3">
                        <svg class="w-5 h-5 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                        Informasi Website Utama
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label for="site_name" class="block text-slate-700 text-sm font-bold mb-2">Nama Website <span class="text-rose-500">*</span></label>
                            <input type="text" id="site_name" name="site_name" value="{{ old('site_name', $settings->site_name) }}" required
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm"
                                placeholder="Contoh: Arjuna Net">
                            @error('site_name')
                                <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="site_url" class="block text-slate-700 text-sm font-bold mb-2">URL Utama (Utama Domain)</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                                </div>
                                <input type="url" id="site_url" name="site_url" value="{{ old('site_url', $settings->site_url) }}"
                                    class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm font-mono text-sm"
                                    placeholder="https://arjuna-net.com">
                            </div>
                            @error('site_url')
                                <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Analytics Card --}}
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden">
                <div class="p-6 sm:p-8">
                    <h2 class="text-lg font-bold text-slate-900 flex items-center mb-6 border-b border-slate-100 pb-3">
                        <svg class="w-5 h-5 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        Analytics & Tracking
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="google_analytics_id" class="block text-slate-700 text-sm font-bold mb-2">Google Analytics (GA4) ID</label>
                            <input type="text" id="google_analytics_id" name="google_analytics_id" value="{{ old('google_analytics_id', $settings->google_analytics_id) }}"
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm font-mono text-sm uppercase"
                                placeholder="G-XXXXXXXXXX">
                            <p class="mt-1.5 text-xs text-slate-500">Gunakan ID Measurement seperti "G-..."</p>
                            @error('google_analytics_id')
                                <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="gtm_id" class="block text-slate-700 text-sm font-bold mb-2">Google Tag Manager ID</label>
                            <input type="text" id="gtm_id" name="gtm_id" value="{{ old('gtm_id', $settings->gtm_id) }}"
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm font-mono text-sm uppercase"
                                placeholder="GTM-XXXXXX">
                            <p class="mt-1.5 text-xs text-slate-500">Kosongkan jika tidak menggunakan GTM.</p>
                            @error('gtm_id')
                                <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="google_business_profile_url" class="block text-slate-700 text-sm font-bold mb-2">Google Business Profile URL</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-4 h-4 text-slate-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12.24 10.285V14.4h6.806c-.275 1.765-2.056 5.174-6.806 5.174-4.095 0-7.439-3.389-7.439-7.574s3.345-7.574 7.439-7.574c2.33 0 3.891.989 4.785 1.849l3.254-3.138C18.189 1.186 15.479 0 12.24 0c-6.635 0-12 5.365-12 12s5.365 12 12 12c6.926 0 11.52-4.869 11.52-11.726 0-.788-.085-1.39-.189-1.989H12.24z"/></svg>
                                </div>
                                <input type="url" id="google_business_profile_url" name="google_business_profile_url" value="{{ old('google_business_profile_url', $settings->google_business_profile_url) }}"
                                    class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm font-mono text-sm"
                                    placeholder="https://g.page/r/your-business">
                            </div>
                            <p class="mt-1.5 text-xs text-slate-500">Tautan pendaftaran usaha langsung dari Google My Business.</p>
                            @error('google_business_profile_url')
                                <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right Column: Display & Status --}}
        <div class="lg:col-span-4 space-y-8">
            {{-- Branding Card --}}
            <div class="bg-indigo-50/50 rounded-2xl shadow-sm border border-indigo-100 overflow-hidden">
                <div class="p-6">
                    <h2 class="text-lg font-bold text-indigo-900 flex items-center mb-5">
                        <svg class="w-5 h-5 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                        Identitas Visual
                    </h2>

                    <div class="space-y-5">
                        <div>
                            <label for="logo_url" class="block text-slate-700 text-sm font-bold mb-2">URL Logo Website</label>
                            <input type="text" id="logo_url" name="logo_url" value="{{ old('logo_url', $settings->logo_url) }}"
                                class="w-full px-3.5 py-2.5 bg-white border border-indigo-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm font-mono text-sm"
                                placeholder="/images/logo.png">
                            @error('logo_url')
                                <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="favicon_url" class="block text-slate-700 text-sm font-bold mb-2">URL Favicon</label>
                            <input type="text" id="favicon_url" name="favicon_url" value="{{ old('favicon_url', $settings->favicon_url) }}"
                                class="w-full px-3.5 py-2.5 bg-white border border-indigo-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm font-mono text-sm"
                                placeholder="/favicon.ico">
                            @error('favicon_url')
                                <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="brand_color_primary" class="block text-slate-700 text-sm font-bold mb-2">Kode Warna Utama (Hex)</label>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full border border-slate-200 shadow-sm shrink-0" style="background-color: {{ old('brand_color_primary', $settings->brand_color_primary ?: '#2563eb') }};"></div>
                                <input type="text" id="brand_color_primary" name="brand_color_primary" value="{{ old('brand_color_primary', $settings->brand_color_primary) }}"
                                    class="w-full px-3.5 py-2.5 bg-white border border-indigo-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm font-mono text-sm uppercase"
                                    placeholder="#2563EB">
                            </div>
                            @error('brand_color_primary')
                                <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="brand_color_secondary" class="block text-slate-700 text-sm font-bold mb-2">Kode Warna Sekunder</label>
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full border border-slate-200 shadow-sm shrink-0" style="background-color: {{ old('brand_color_secondary', $settings->brand_color_secondary ?: '#1e40af') }};"></div>
                                <input type="text" id="brand_color_secondary" name="brand_color_secondary" value="{{ old('brand_color_secondary', $settings->brand_color_secondary) }}"
                                    class="w-full px-3.5 py-2.5 bg-white border border-indigo-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm font-mono text-sm uppercase"
                                    placeholder="#1E40AF">
                            </div>
                            @error('brand_color_secondary')
                                <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Maintenance Mode Card --}}
            <div class="bg-rose-50/50 rounded-2xl shadow-sm border border-rose-100 overflow-hidden relative">
                @if($settings->maintenance_mode)
                <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-rose-400 to-rose-600"></div>
                @endif
                <div class="p-6">
                    <h2 class="text-lg font-bold text-rose-900 flex items-center mb-4">
                        <svg class="w-5 h-5 text-rose-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                        Status Website
                    </h2>
                    
                    <label class="flex items-start p-4 border rounded-xl cursor-pointer transition-all hover:bg-white bg-white/50 border-rose-200 hover:border-rose-300 shadow-sm @if($settings->maintenance_mode) ring-2 ring-offset-1 ring-rose-500 border-rose-500 @endif relative overflow-hidden group">
                        
                        <div class="absolute right-0 top-0 h-full flex items-center pr-4">
                            <div class="w-10 h-6 rounded-full transition-colors relative flex items-center
                                {{ $settings->maintenance_mode ? 'bg-rose-500' : 'bg-slate-300' }}">
                                <div class="bg-white w-4 h-4 rounded-full shadow-sm absolute transition-transform
                                    {{ $settings->maintenance_mode ? 'translate-x-5' : 'translate-x-1' }}"></div>
                            </div>
                        </div>

                        <input type="checkbox" name="maintenance_mode" value="1" {{ $settings->maintenance_mode ? 'checked' : '' }} class="sr-only">
                        <div class="pr-12">
                            <div class="font-bold text-slate-900 text-sm mb-1">Maintenance Mode</div>
                            <div class="text-xs text-slate-600 leading-relaxed">
                                Jika diaktifkan, halaman publik tidak dapat diakses sementara web dalam masa perbaikan.
                            </div>
                        </div>
                    </label>
                </div>
            </div>

            <button type="submit" class="w-full flex justify-center items-center py-3.5 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-200 transition-all shadow-md active:bg-indigo-800">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/></svg>
                Simpan Seluruh Pengaturan
            </button>
        </div>
    </div>
</form>

<script>
    // JS to toggle the visual state of the custom switch for Maintenance Mode
    document.addEventListener('DOMContentLoaded', () => {
        const maintLabel = document.querySelector('label input[name="maintenance_mode"]').closest('label');
        const maintInput = maintLabel.querySelector('input');
        const maintTrack = maintLabel.querySelector('.w-10');
        const maintNob = maintLabel.querySelector('.bg-white.w-4');

        maintInput.addEventListener('change', (e) => {
            if (e.target.checked) {
                maintTrack.classList.remove('bg-slate-300');
                maintTrack.classList.add('bg-rose-500');
                maintNob.classList.remove('translate-x-1');
                maintNob.classList.add('translate-x-5');
                maintLabel.classList.add('ring-2', 'ring-offset-1', 'ring-rose-500', 'border-rose-500');
            } else {
                maintTrack.classList.add('bg-slate-300');
                maintTrack.classList.remove('bg-rose-500');
                maintNob.classList.add('translate-x-1');
                maintNob.classList.remove('translate-x-5');
                maintLabel.classList.remove('ring-2', 'ring-offset-1', 'ring-rose-500', 'border-rose-500');
            }
        });
    });
</script>
@endsection

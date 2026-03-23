@extends('admin.layout')

@section('pageTitle', 'Pengaturan')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Pengaturan</h1>
    <p class="text-gray-600">Kelola pengaturan website</p>
</div>

@if(session('success'))
<div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
    {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-lg shadow-md p-6">
    <form method="POST" action="{{ route('admin.settings.update') }}">
        @csrf
        @method('PUT')

        {{-- Site Info --}}
        <div class="border-b pb-6 mb-6">
            <h2 class="text-lg font-medium text-gray-800 mb-4">Informasi Website</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="site_name" class="block text-gray-700 text-sm font-medium mb-2">Nama Website *</label>
                    <input type="text" id="site_name" name="site_name" value="{{ old('site_name', $settings->site_name) }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Arjuna Net">
                    @error('site_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="site_url" class="block text-gray-700 text-sm font-medium mb-2">URL Website</label>
                    <input type="url" id="site_url" name="site_url" value="{{ old('site_url', $settings->site_url) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="https://arjuna-net.com">
                    @error('site_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Branding --}}
        <div class="border-b pb-6 mb-6">
            <h2 class="text-lg font-medium text-gray-800 mb-4">Branding</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="logo_url" class="block text-gray-700 text-sm font-medium mb-2">URL Logo</label>
                    <input type="text" id="logo_url" name="logo_url" value="{{ old('logo_url', $settings->logo_url) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="/images/logo.png">
                    @error('logo_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="favicon_url" class="block text-gray-700 text-sm font-medium mb-2">URL Favicon</label>
                    <input type="text" id="favicon_url" name="favicon_url" value="{{ old('favicon_url', $settings->favicon_url) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="/favicon.ico">
                    @error('favicon_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="brand_color_primary" class="block text-gray-700 text-sm font-medium mb-2">Warna Utama</label>
                    <input type="text" id="brand_color_primary" name="brand_color_primary" value="{{ old('brand_color_primary', $settings->brand_color_primary) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="#2563eb">
                    @error('brand_color_primary')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="brand_color_secondary" class="block text-gray-700 text-sm font-medium mb-2">Warna Sekunder</label>
                    <input type="text" id="brand_color_secondary" name="brand_color_secondary" value="{{ old('brand_color_secondary', $settings->brand_color_secondary) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="#1e40af">
                    @error('brand_color_secondary')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Analytics --}}
        <div class="border-b pb-6 mb-6">
            <h2 class="text-lg font-medium text-gray-800 mb-4">Analytics & Tracking</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="google_analytics_id" class="block text-gray-700 text-sm font-medium mb-2">Google Analytics ID</label>
                    <input type="text" id="google_analytics_id" name="google_analytics_id" value="{{ old('google_analytics_id', $settings->google_analytics_id) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="G-XXXXXXXXXX">
                    @error('google_analytics_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="gtm_id" class="block text-gray-700 text-sm font-medium mb-2">Google Tag Manager ID</label>
                    <input type="text" id="gtm_id" name="gtm_id" value="{{ old('gtm_id', $settings->gtm_id) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="GTM-XXXXXX">
                    @error('gtm_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="google_business_profile_url" class="block text-gray-700 text-sm font-medium mb-2">Google Business Profile URL</label>
                    <input type="url" id="google_business_profile_url" name="google_business_profile_url" value="{{ old('google_business_profile_url', $settings->google_business_profile_url) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="https://g.page/your-business">
                    @error('google_business_profile_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Maintenance --}}
        <div class="pb-6 mb-6">
            <h2 class="text-lg font-medium text-gray-800 mb-4">Maintenance Mode</h2>

            <div class="flex items-center">
                <label class="flex items-center">
                    <input type="checkbox" name="maintenance_mode" value="1" {{ $settings->maintenance_mode ? 'checked' : '' }} class="mr-2">
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

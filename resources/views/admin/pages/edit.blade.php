@extends('admin.layout')

@section('pageTitle', 'Edit Halaman')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Edit Halaman: {{ $page->title }}</h1>
    <p class="text-gray-600">Kelola konten dan SEO untuk halaman ini</p>
</div>

@if(session('success'))
<div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
    {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-lg shadow-md p-6">
    <form method="POST" action="{{ route('admin.pages.update', $page->slug) }}">
        @csrf
        @method('PUT')

        {{-- Page Content --}}
        <div class="border-b pb-6 mb-6">
            <h2 class="text-lg font-medium text-gray-800 mb-4">Konten Halaman</h2>

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="title" class="block text-gray-700 text-sm font-medium mb-2">Judul Halaman *</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $page->title) }}" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Contoh: Tentang Kami">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="hero_title" class="block text-gray-700 text-sm font-medium mb-2">Hero Title (Judul Bagian Atas)</label>
                    <input type="text" id="hero_title" name="hero_title" value="{{ old('hero_title', $page->hero_title) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Contoh: Layanan Internet Terpercaya untuk Area Perkampungan">
                    @error('hero_title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="hero_subtitle" class="block text-gray-700 text-sm font-medium mb-2">Hero Subtitle (Subjudul Bagian Atas)</label>
                    <textarea id="hero_subtitle" name="hero_subtitle" rows="2"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Contoh: Arjuna Net hadir untuk memberikan koneksi internet berkualitas dengan harga terjangkau.">{{ old('hero_subtitle', $page->hero_subtitle) }}</textarea>
                    @error('hero_subtitle')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="content" class="block text-gray-700 text-sm font-medium mb-2">Konten</label>
                    <textarea id="content" name="content" rows="8"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Konten halaman...">{{ old('content', $page->content) }}</textarea>
                    <p class="mt-1 text-sm text-gray-500">Gunakan HTML untuk formatting (b, p, ul, li, dll)</p>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        {{-- SEO Settings --}}
        <div class="pb-6 mb-6">
            <h2 class="text-lg font-medium text-gray-800 mb-4">SEO (Search Engine Optimization)</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label for="meta_title" class="block text-gray-700 text-sm font-medium mb-2">Meta Title</label>
                    <input type="text" id="meta_title" name="meta_title" value="{{ old('meta_title', $page->meta_title) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Contoh: Tentang Kami - Arjuna Net | Layanan Internet Lokal">
                    <p class="mt-1 text-sm text-gray-500">Rekomendasi: 50-60 karakter</p>
                    @error('meta_title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="meta_description" class="block text-gray-700 text-sm font-medium mb-2">Meta Description</label>
                    <textarea id="meta_description" name="meta_description" rows="3"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Contoh: Kenali lebih lanjut tentang Arjuna Net, penyedia layanan internet lokal untuk area perkampungan. Kami berkomitmen memberikan koneksi berkualitas dengan harga terjangkau.">{{ old('meta_description', $page->meta_description) }}</textarea>
                    <p class="mt-1 text-sm text-gray-500">Rekomendasi: 150-160 karakter</p>
                    @error('meta_description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="og_image" class="block text-gray-700 text-sm font-medium mb-2">OG Image (Open Graph)</label>
                    <input type="text" id="og_image" name="og_image" value="{{ old('og_image', $page->og_image) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="/images/og-home.jpg">
                    @error('og_image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="canonical_url" class="block text-gray-700 text-sm font-medium mb-2">Canonical URL</label>
                    <input type="text" id="canonical_url" name="canonical_url" value="{{ old('canonical_url', $page->canonical_url) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="https://arjuna-net.com/tentang">
                    @error('canonical_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Update Halaman
            </button>
        </div>
    </form>
</div>

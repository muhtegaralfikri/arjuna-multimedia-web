@extends('admin.layout')

@section('pageTitle', 'Edit Paket')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Edit Paket Internet</h1>
    <p class="text-gray-600">Edit paket {{ $package->name }}</p>
</div>

<div class="bg-white rounded-lg shadow-md p-6">
    <form method="POST" action="{{ route('admin.packages.update', $package->id) }}">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="col-span-2">
                <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Nama Paket *</label>
                <input type="text" id="name" name="name" value="{{ old('name', $package->name) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Contoh: Paket Family">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="slug" class="block text-gray-700 text-sm font-medium mb-2">Slug (URL) *</label>
                <input type="text" id="slug" name="slug" value="{{ old('slug', $package->slug) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="paket-family">
                @error('slug')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="speed" class="block text-gray-700 text-sm font-medium mb-2">Kecepatan *</label>
                <input type="text" id="speed" name="speed" value="{{ old('speed', $package->speed) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="20 Mbps">
                @error('speed')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="speed_value" class="block text-gray-700 text-sm font-medium mb-2">Kecepatan (untuk sorting) *</label>
                <input type="number" id="speed_value" name="speed_value" value="{{ old('speed_value', $package->speed_value) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="20">
                @error('speed_value')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="price_monthly" class="block text-gray-700 text-sm font-medium mb-2">Harga Per Bulan (Rp) *</label>
                <input type="number" id="price_monthly" name="price_monthly" value="{{ old('price_monthly', $package->price_monthly) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="250000">
                @error('price_monthly')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="installation_fee" class="block text-gray-700 text-sm font-medium mb-2">Biaya Pasang (Rp) *</label>
                <input type="number" id="installation_fee" name="installation_fee" value="{{ old('installation_fee', $package->installation_fee) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="150000">
                @error('installation_fee')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="quota" class="block text-gray-700 text-sm font-medium mb-2">Kuota</label>
                <input type="text" id="quota" name="quota" value="{{ old('quota', $package->quota) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Unlimited">
                @error('quota')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="category" class="block text-gray-700 text-sm font-medium mb-2">Kategori *</label>
                <select id="category" name="category" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="home" {{ $package->category === 'home' ? 'selected' : '' }}>Rumah</option>
                    <option value="business" {{ $package->category === 'business' ? 'selected' : '' }}>Bisnis</option>
                </select>
                @error('category')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-span-2">
                <label for="description" class="block text-gray-700 text-sm font-medium mb-2">Deskripsi</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Deskripsi paket...">{{ old('description', $package->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-span-2">
                <label for="features" class="block text-gray-700 text-sm font-medium mb-2">Fitur (pisahkan dengan koma)</label>
                <textarea id="features" name="features" rows="3"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Unlimited, Support 24/7, Gratis Modem">{{ old('features', $package->features ? implode(', ', $package->features) : '') }}</textarea>
                @error('features')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="flex items-center">
                    <input type="checkbox" name="is_popular" value="1" {{ $package->is_popular ? 'checked' : '' }} class="mr-2">
                    <span class="text-gray-700 text-sm">Tandai sebagai Populer</span>
                </label>
            </div>

            <div>
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ $package->is_active ? 'checked' : '' }} class="mr-2">
                    <span class="text-gray-700 text-sm">Aktif</span>
                </label>
            </div>

            <div>
                <label for="sort_order" class="block text-gray-700 text-sm font-medium mb-2">Urutan Tampilan</label>
                <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $package->sort_order) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="1">
                @error('sort_order')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('admin.packages.index') }}" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">
                Batal
            </a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
</div>

@extends('admin.layout')

@section('pageTitle', 'Edit Area')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Edit Area Layanan</h1>
    <p class="text-gray-600">Edit area {{ $area->name }}</p>
</div>

<div class="bg-white rounded-lg shadow-md p-6">
    <form method="POST" action="{{ route('admin.areas.update', $area->id) }}">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="col-span-2">
                <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Nama Area *</label>
                <input type="text" id="name" name="name" value="{{ old('name', $area->name) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Contoh: Desa Sukamaju">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="slug" class="block text-gray-700 text-sm font-medium mb-2">Slug (URL) *</label>
                <input type="text" id="slug" name="slug" value="{{ old('slug', $area->slug) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="desa-sukamaju">
                @error('slug')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="block text-gray-700 text-sm font-medium mb-2">Status *</label>
                <select id="status" name="status" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="available" {{ $area->status === 'available' ? 'selected' : '' }}>Tersedia</option>
                    <option value="coming_soon" {{ $area->status === 'coming_soon' ? 'selected' : '' }}>Segera Hadir</option>
                    <option value="paused" {{ $area->status === 'paused' ? 'selected' : '' }}>Jeda</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="estimated_available" class="block text-gray-700 text-sm font-medium mb-2">Estimasi Tersedia</label>
                <input type="date" id="estimated_available" name="estimated_available"
                    value="{{ old('estimated_available', $area->estimated_available ? $area->estimated_available->format('Y-m-d') : '') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('estimated_available')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ $area->is_active ? 'checked' : '' }} class="mr-2">
                    <span class="text-gray-700 text-sm">Aktif</span>
                </label>
            </div>

            <div class="col-span-2">
                <label for="description" class="block text-gray-700 text-sm font-medium mb-2">Deskripsi</label>
                <textarea id="description" name="description" rows="3"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Deskripsi area...">{{ old('description', $area->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-span-2">
                <label for="coverage_detail" class="block text-gray-700 text-sm font-medium mb-2">Detail Cakupan</label>
                <textarea id="coverage_detail" name="coverage_detail" rows="3"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="RT 01-05, RW 01-02, dan sekitarnya...">{{ old('coverage_detail', $area->coverage_detail) }}</textarea>
                @error('coverage_detail')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="sort_order" class="block text-gray-700 text-sm font-medium mb-2">Urutan Tampilan</label>
                <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $area->sort_order) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="1">
                @error('sort_order')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('admin.areas.index') }}" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">
                Batal
            </a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
</div>

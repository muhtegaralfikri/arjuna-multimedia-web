@extends('admin.layout')

@section('pageTitle', 'Edit FAQ')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Edit FAQ</h1>
    <p class="text-gray-600">Edit FAQ</p>
</div>

<div class="bg-white rounded-lg shadow-md p-6">
    <form method="POST" action="{{ route('admin.faqs.update', $faq->id) }}">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="col-span-2">
                <label for="question" class="block text-gray-700 text-sm font-medium mb-2">Pertanyaan *</label>
                <input type="text" id="question" name="question" value="{{ old('question', $faq->question) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Contoh: Berapa biaya pemasangan?">
                @error('question')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="category" class="block text-gray-700 text-sm font-medium mb-2">Kategori *</label>
                <select id="category" name="category" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="general" {{ $faq->category === 'general' ? 'selected' : '' }}>Umum</option>
                    <option value="technical" {{ $faq->category === 'technical' ? 'selected' : '' }}>Teknis</option>
                    <option value="billing" {{ $faq->category === 'billing' ? 'selected' : '' }}>Billing</option>
                    <option value="installation" {{ $faq->category === 'installation' ? 'selected' : '' }}>Pemasangan</option>
                </select>
                @error('category')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="sort_order" class="block text-gray-700 text-sm font-medium mb-2">Urutan Tampilan</label>
                <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $faq->sort_order) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="1">
                @error('sort_order')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-span-2">
                <label for="answer" class="block text-gray-700 text-sm font-medium mb-2">Jawaban *</label>
                <textarea id="answer" name="answer" rows="6" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Jawaban untuk pertanyaan di atas...">{{ old('answer', $faq->answer) }}</textarea>
                @error('answer')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-span-2">
                <label class="flex items-center">
                    <input type="checkbox" name="is_published" value="1" {{ $faq->is_published ? 'checked' : '' }} class="mr-2">
                    <span class="text-gray-700 text-sm">Terbitkan (Tampilkan di website)</span>
                </label>
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('admin.faqs.index') }}" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">
                Batal
            </a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
</div>

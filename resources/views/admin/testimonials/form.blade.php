@php
    $isEdit = filled($testimonial);
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
    <div class="md:col-span-2">
        <h3 class="text-lg font-semibold text-slate-900 border-b border-slate-100 pb-3 mb-4">Detail Testimoni</h3>
    </div>

    <div>
        <label for="customer_name" class="block text-slate-700 text-sm font-bold mb-2">Nama Pelanggan <span class="text-rose-500">*</span></label>
        <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name', $testimonial->customer_name ?? '') }}" required
            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm"
            placeholder="Contoh: Bapak Ahmad">
        @error('customer_name')<p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="area" class="block text-slate-700 text-sm font-bold mb-2">Area</label>
        <input type="text" id="area" name="area" value="{{ old('area', $testimonial->area ?? '') }}"
            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm"
            placeholder="Contoh: Desa Bunde">
        @error('area')<p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>@enderror
    </div>

    <div class="md:col-span-2">
        <label for="quote" class="block text-slate-700 text-sm font-bold mb-2">Isi Testimoni <span class="text-rose-500">*</span></label>
        <textarea id="quote" name="quote" rows="5" required
            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm resize-y"
            placeholder="Tulis testimoni singkat dan nyata dari pelanggan.">{{ old('quote', $testimonial->quote ?? '') }}</textarea>
        @error('quote')<p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="rating" class="block text-slate-700 text-sm font-bold mb-2">Rating <span class="text-rose-500">*</span></label>
        <select id="rating" name="rating" required
            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm">
            @for($rating = 5; $rating >= 1; $rating--)
                <option value="{{ $rating }}" {{ (int) old('rating', $testimonial->rating ?? 5) === $rating ? 'selected' : '' }}>{{ $rating }} bintang</option>
            @endfor
        </select>
        @error('rating')<p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>@enderror
    </div>

    <div>
        <label for="sort_order" class="block text-slate-700 text-sm font-bold mb-2">Urutan</label>
        <input type="number" id="sort_order" name="sort_order" min="0" value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}"
            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm">
        @error('sort_order')<p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>@enderror
    </div>

    <div class="md:col-span-2">
        <label for="image_path" class="block text-slate-700 text-sm font-bold mb-2">Path Foto Opsional</label>
        <input type="text" id="image_path" name="image_path" value="{{ old('image_path', $testimonial->image_path ?? '') }}"
            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm font-mono text-sm"
            placeholder="Contoh: uploads/testimoni-bunde.jpg">
        <p class="mt-1.5 text-xs text-slate-500">Untuk saat ini isi path gambar yang sudah ada di folder public. Kosongkan jika belum ada foto.</p>
        @error('image_path')<p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>@enderror
    </div>

    <div class="md:col-span-2">
        <label class="relative flex items-center group cursor-pointer w-max">
            <input type="checkbox" name="is_published" value="1" {{ old('is_published', $testimonial->is_published ?? true) ? 'checked' : '' }} class="peer sr-only">
            <div class="w-11 h-6 bg-slate-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-indigo-300 transition-all peer-checked:bg-emerald-500"></div>
            <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-all peer-checked:translate-x-5"></div>
            <span class="ml-3 text-sm font-semibold text-slate-700 group-hover:text-slate-900">Tampilkan di website</span>
        </label>
    </div>
</div>

<div class="mt-10 pt-6 border-t border-slate-100 flex justify-end space-x-4">
    <a href="{{ route('admin.testimonials.index') }}" class="px-6 py-2.5 border border-slate-300 text-slate-700 font-semibold rounded-xl hover:bg-slate-50 hover:text-slate-900 transition-colors">
        Batal
    </a>
    <button type="submit" class="px-6 py-2.5 bg-indigo-600 text-white font-semibold rounded-xl hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-200 transition-all shadow-sm">
        {{ $isEdit ? 'Update Testimoni' : 'Simpan Testimoni' }}
    </button>
</div>

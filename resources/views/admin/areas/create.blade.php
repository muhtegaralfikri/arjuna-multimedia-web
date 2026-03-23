@extends('admin.layout')

@section('pageTitle', 'Tambah Area')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Tambah Area Layanan</h1>
        <p class="text-slate-500 text-sm mt-1">Buat cakupan wilayah layanan internet baru.</p>
    </div>
    <a href="{{ route('admin.areas.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-slate-200 rounded-xl font-medium text-sm text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors shadow-sm">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden">
    <div class="p-6 sm:p-8">
        <form method="POST" action="{{ route('admin.areas.store') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-lg font-semibold text-slate-900 border-b border-slate-100 pb-3 mb-4">Informasi Area Dasar</h3>
                </div>

                <div class="col-span-1 md:col-span-2">
                    <label for="name" class="block text-slate-700 text-sm font-bold mb-2">Nama Area <span class="text-rose-500">*</span></label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm"
                        placeholder="Contoh: Desa Sukamaju, Kecamatan ABC">
                    @error('name')
                        <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="slug" class="block text-slate-700 text-sm font-bold mb-2">Slug (URL) <span class="text-rose-500">*</span></label>
                    <input type="text" id="slug" name="slug" required
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm"
                        placeholder="desa-sukamaju">
                    <p class="mt-1.5 text-xs text-slate-500">Hanya huruf kecil, angka, dan strip (-).</p>
                    @error('slug')
                        <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="status" class="block text-slate-700 text-sm font-bold mb-2">Status Ketersediaan <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <select id="status" name="status" required
                            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm appearance-none">
                            <option value="available">Bisa Dipasang (Tersedia)</option>
                            <option value="coming_soon">Pembangunan Jaringan (Segera Hadir)</option>
                            <option value="paused">Jaringan Penuh / Dibatasi (Jeda)</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-500">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                    </div>
                    @error('status')
                        <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="estimated_available" class="block text-slate-700 text-sm font-bold mb-2">Tanggal Estimasi (Jika Segera Hadir)</label>
                    <input type="date" id="estimated_available" name="estimated_available"
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm">
                    @error('estimated_available')
                        <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="sort_order" class="block text-slate-700 text-sm font-bold mb-2">Urutan Tampilan</label>
                    <input type="number" id="sort_order" name="sort_order"
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm"
                        placeholder="1">
                    <p class="mt-1.5 text-xs text-slate-500">Angka lebih kecil tampil lebih dulu.</p>
                    @error('sort_order')
                        <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-1 md:col-span-2 mt-2">
                    <h3 class="text-lg font-semibold text-slate-900 border-b border-slate-100 pb-3 mb-4">Informasi Konten</h3>
                </div>

                <div class="col-span-1 md:col-span-2">
                    <label for="description" class="block text-slate-700 text-sm font-bold mb-2">Deskripsi Singkat</label>
                    <textarea id="description" name="description" rows="3"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm resize-y"
                        placeholder="Deskripsi wilayah layanan atau pesan khusus untuk calon pelanggan di area ini..."></textarea>
                    @error('description')
                        <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-1 md:col-span-2">
                    <label for="coverage_detail" class="block text-slate-700 text-sm font-bold mb-2">Penyebutan Rincian Area (Coverages)</label>
                    <textarea id="coverage_detail" name="coverage_detail" rows="3"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm resize-y"
                        placeholder="Misalnya: RT 01-05 Desa A, Gang Flamboyan, Perumahan B Blok C..."></textarea>
                    <p class="mt-1.5 text-xs text-slate-500">Rincian cakupan wilayah agar calon pelanggan tahu titik persis jaringan berada.</p>
                    @error('coverage_detail')
                        <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-1 md:col-span-2 mt-2">
                    <h3 class="text-lg font-semibold text-slate-900 border-b border-slate-100 pb-3 mb-4">Pengaturan Visibilitas</h3>
                </div>

                <div class="col-span-1 md:col-span-2">
                    <label class="relative flex items-center group cursor-pointer w-max">
                        <input type="checkbox" name="is_active" value="1" checked class="peer sr-only">
                        <div class="w-11 h-6 bg-slate-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-indigo-300 transition-all peer-checked:bg-emerald-500"></div>
                        <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-all peer-checked:translate-x-5"></div>
                        <span class="ml-3 text-sm font-semibold text-slate-700 group-hover:text-slate-900">Tayangkan Area Ini ke Publik</span>
                    </label>
                </div>
            </div>

            <div class="mt-10 pt-6 border-t border-slate-100 flex justify-end space-x-4">
                <a href="{{ route('admin.areas.index') }}" class="px-6 py-2.5 border border-slate-300 text-slate-700 font-semibold rounded-xl hover:bg-slate-50 hover:text-slate-900 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-indigo-600 text-white font-semibold rounded-xl hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-200 transition-all shadow-sm">
                    Simpan Area
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

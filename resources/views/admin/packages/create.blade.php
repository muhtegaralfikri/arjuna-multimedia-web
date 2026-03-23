@extends('admin.layout')

@section('pageTitle', 'Tambah Paket')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Tambah Paket Internet</h1>
        <p class="text-slate-500 text-sm mt-1">Buat penawaran paket internet baru untuk pelanggan Anda.</p>
    </div>
    <a href="{{ route('admin.packages.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-slate-200 rounded-xl font-medium text-sm text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-colors shadow-sm">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali
    </a>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden">
    <div class="p-6 sm:p-8">
        <form method="POST" action="{{ route('admin.packages.store') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-lg font-semibold text-slate-900 border-b border-slate-100 pb-3 mb-4">Informasi Dasar</h3>
                </div>

                <div class="col-span-1 md:col-span-2">
                    <label for="name" class="block text-slate-700 text-sm font-bold mb-2">Nama Paket <span class="text-rose-500">*</span></label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm"
                        placeholder="Contoh: Paket Family 20 Mbps">
                    @error('name')
                        <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="slug" class="block text-slate-700 text-sm font-bold mb-2">Slug (URL) <span class="text-rose-500">*</span></label>
                    <input type="text" id="slug" name="slug" required
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm"
                        placeholder="paket-family-20-mbps">
                    <p class="mt-1.5 text-xs text-slate-500">Hanya huruf kecil, angka, dan strip (-).</p>
                    @error('slug')
                        <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="category" class="block text-slate-700 text-sm font-bold mb-2">Kategori <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <select id="category" name="category" required
                            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm appearance-none">
                            <option value="home">Paket Rumah (Home)</option>
                            <option value="business">Paket Bisnis (Business)</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-500">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                    </div>
                    @error('category')
                        <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-1 md:col-span-2 mt-2">
                    <h3 class="text-lg font-semibold text-slate-900 border-b border-slate-100 pb-3 mb-4">Spesifikasi & Harga</h3>
                </div>

                <div>
                    <label for="speed" class="block text-slate-700 text-sm font-bold mb-2">Kecepatan Teks <span class="text-rose-500">*</span></label>
                    <input type="text" id="speed" name="speed" required
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm"
                        placeholder="Contoh: Up to 20 Mbps">
                    @error('speed')
                        <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="speed_value" class="block text-slate-700 text-sm font-bold mb-2">Angka Kecepatan <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <input type="number" id="speed_value" name="speed_value" required
                            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm"
                            placeholder="20">
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <span class="text-slate-400 text-sm font-medium">Mbps</span>
                        </div>
                    </div>
                    <p class="mt-1.5 text-xs text-slate-500">Hanya angka, digunakan untuk mengurutkan paket.</p>
                    @error('speed_value')
                        <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="price_monthly" class="block text-slate-700 text-sm font-bold mb-2">Harga Per Bulan <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-slate-400 font-medium">Rp</span>
                        </div>
                        <input type="number" id="price_monthly" name="price_monthly" required
                            class="w-full pl-11 pr-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm"
                            placeholder="250000">
                    </div>
                    @error('price_monthly')
                        <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="installation_fee" class="block text-slate-700 text-sm font-bold mb-2">Biaya Pasang <span class="text-rose-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-slate-400 font-medium">Rp</span>
                        </div>
                        <input type="number" id="installation_fee" name="installation_fee" required
                            class="w-full pl-11 pr-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm"
                            placeholder="150000">
                    </div>
                    @error('installation_fee')
                        <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="quota" class="block text-slate-700 text-sm font-bold mb-2">Batas Kuota (FUP)</label>
                    <input type="text" id="quota" name="quota"
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm"
                        placeholder="Contoh: Unlimited">
                    @error('quota')
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
                    <h3 class="text-lg font-semibold text-slate-900 border-b border-slate-100 pb-3 mb-4">Detail Konten</h3>
                </div>

                <div class="col-span-1 md:col-span-2">
                    <label for="description" class="block text-slate-700 text-sm font-bold mb-2">Deskripsi Singkat</label>
                    <textarea id="description" name="description" rows="3"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm resize-y"
                        placeholder="Tuliskan deskripsi promosi dari paket ini..."></textarea>
                    @error('description')
                        <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-1 md:col-span-2">
                    <label for="features" class="block text-slate-700 text-sm font-bold mb-2">Daftar Fitur Utama</label>
                    <textarea id="features" name="features" rows="3"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm resize-y"
                        placeholder="Pisahkan dengan koma (Contoh: Unlimited Tanpa FUP, Pinjaman Router Gratis, Support 24 Jam)"></textarea>
                    <p class="mt-1.5 text-xs text-slate-500">Fitur-fitur ini akan ditampilkan sebagai checklist (tanda centang) pada tampilan web.</p>
                    @error('features')
                        <p class="mt-1.5 text-sm text-rose-600 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-1 md:col-span-2 mt-2">
                    <h3 class="text-lg font-semibold text-slate-900 border-b border-slate-100 pb-3 mb-4">Pengaturan Visibilitas</h3>
                </div>

                <div class="col-span-1 md:col-span-2 flex flex-col sm:flex-row gap-6">
                    <label class="relative flex items-center group cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" checked class="peer sr-only">
                        <div class="w-11 h-6 bg-slate-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-indigo-300 transition-all peer-checked:bg-emerald-500"></div>
                        <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-all peer-checked:translate-x-5"></div>
                        <span class="ml-3 text-sm font-semibold text-slate-700 group-hover:text-slate-900">Tayangkan (Aktif)</span>
                    </label>

                    <label class="relative flex items-center group cursor-pointer">
                        <input type="checkbox" name="is_popular" value="1" class="peer sr-only">
                        <div class="w-11 h-6 bg-slate-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-amber-300 transition-all peer-checked:bg-amber-500"></div>
                        <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-all peer-checked:translate-x-5"></div>
                        <span class="ml-3 text-sm font-semibold text-slate-700 group-hover:text-amber-600">Soroti sebagai Paket Populer</span>
                    </label>
                </div>
            </div>

            <div class="mt-10 pt-6 border-t border-slate-100 flex justify-end space-x-4">
                <a href="{{ route('admin.packages.index') }}" class="px-6 py-2.5 border border-slate-300 text-slate-700 font-semibold rounded-xl hover:bg-slate-50 hover:text-slate-900 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2.5 bg-indigo-600 text-white font-semibold rounded-xl hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-200 transition-all shadow-sm">
                    Simpan Paket
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('admin.layout')

@section('pageTitle', 'Detail Form')

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.forms.index') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-indigo-600 transition-colors mb-2">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali ke Daftar
    </a>
    <div class="flex flex-col sm:flex-row justify-between sm:items-end gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Detail Calon Pelanggan</h1>
            <p class="text-slate-500 text-sm mt-1">Lihat informasi lengkap form minat berlangganan.</p>
        </div>
        <div class="flex gap-2">
            <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-sm font-medium border
                @if($submission->status === 'new') bg-indigo-50 text-indigo-700 border-indigo-200
                @elseif($submission->status === 'contacted') bg-amber-50 text-amber-700 border-amber-200
                @elseif($submission->status === 'converted') bg-emerald-50 text-emerald-700 border-emerald-200
                @else bg-slate-100 text-slate-700 border-slate-200 @endif">
                @if($submission->status === 'new') Baru
                @elseif($submission->status === 'contacted') Dihubungi
                @elseif($submission->status === 'converted') Berhasil
                @else Batal (Lost) @endif
            </span>
        </div>
    </div>
</div>

@if(session('success'))
<div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-xl flex items-start">
    <svg class="w-5 h-5 text-emerald-500 mt-0.5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    <div class="text-emerald-800 text-sm font-medium">{{ session('success') }}</div>
</div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    {{-- Main Detail Card --}}
    <div class="lg:col-span-2 space-y-8">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden">
            <div class="p-6 sm:p-8">
                <h2 class="text-lg font-bold text-slate-900 mb-6 border-b border-slate-100 pb-3">Informasi Pelanggan</h2>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-6 gap-x-8">
                    <div>
                        <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Nama Pemohon</span>
                        <div class="text-slate-900 font-medium">{{ $submission->name }}</div>
                    </div>
                    
                    <div>
                        <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">WhatsApp</span>
                        <a href="https://wa.me/{{ ltrim($submission->whatsapp, '0') }}" target="_blank" class="inline-flex items-center text-emerald-600 hover:text-emerald-700 font-medium transition-colors group">
                            {{ $submission->whatsapp }}
                            <svg class="w-4 h-4 ml-1 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    </div>
                    
                    <div>
                        <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Peminatan Paket</span>
                        <div class="text-slate-900 font-medium bg-slate-50 inline-block px-3 py-1 rounded-lg border border-slate-100">
                            {{ $submission->package_interest ?? 'Tidak ditentukan' }}
                        </div>
                    </div>
                    
                    <div>
                        <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Waktu Submit</span>
                        <div class="text-slate-700">{{ $submission->created_at->format('d M Y, H:i') }} WIB</div>
                    </div>
                    
                    <div class="sm:col-span-2 mt-2">
                        <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Alamat Pemasangan</span>
                        <div class="text-slate-800 leading-relaxed bg-slate-50/50 p-4 rounded-xl border border-slate-100">{{ $submission->address }}</div>
                    </div>
                    
                    @if($submission->message)
                    <div class="sm:col-span-2 mt-2">
                        <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Pesan / Catatan Khusus</span>
                        <div class="text-slate-800 italic bg-amber-50/50 text-amber-900 p-4 rounded-xl border border-amber-100">"{{ $submission->message }}"</div>
                    </div>
                    @endif
                </div>
            </div>
            
            <div class="bg-slate-50 p-6 sm:p-8 border-t border-slate-200/60">
                <h3 class="text-base font-bold text-slate-900 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    Catatan Admin (Internal)
                </h3>
                <form method="POST" action="{{ route('admin.forms.update', $submission->id) }}">
                    @csrf
                    @method('PUT')
                    <!-- Hidden status so it isn't overridden when saving notes -->
                    <input type="hidden" name="status" value="{{ $submission->status }}">
                    <textarea id="notes" name="notes" rows="4"
                        class="w-full px-4 py-3 bg-white border border-slate-200 text-slate-900 rounded-xl focus:ring-2 focus:ring-indigo-500/50 focus:border-indigo-500 transition-all shadow-sm resize-y mb-4"
                        placeholder="Tambahkan catatan progres, hasil followup, atau kendala lapangan...">{{ old('notes', $submission->notes) }}</textarea>
                    @error('notes')
                        <p class="mt-1.5 text-sm text-rose-600 mb-4">{{ $message }}</p>
                    @enderror
                    <div class="flex justify-end">
                        <button type="submit" class="px-5 py-2 bg-indigo-600 text-white font-medium rounded-xl hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-200 transition-all shadow-sm">
                            Simpan Catatan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Sidebar Card --}}
    <div class="space-y-6">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden">
            <div class="p-6">
                <h2 class="text-lg font-bold text-slate-900 mb-4">Ubah Status</h2>
                
                <form method="POST" action="{{ route('admin.forms.update', $submission->id) }}">
                    @csrf
                    @method('PUT')
                    <!-- Hidden notes so it isn't overwritten -->
                    <input type="hidden" name="notes" value="{{ $submission->notes }}">

                    <div class="space-y-3">
                        <label class="flex items-start p-3 border rounded-xl cursor-pointer transition-all hover:bg-slate-50 {{ $submission->status === 'new' ? 'border-indigo-500 bg-indigo-50 hover:bg-indigo-50/80 ring-1 ring-indigo-500' : 'border-slate-200' }}">
                            <input type="radio" name="status" value="new" {{ $submission->status === 'new' ? 'checked' : '' }} class="mt-0.5 mr-3 w-4 h-4 text-indigo-600 focus:ring-indigo-500 border-slate-300">
                            <div>
                                <div class="font-bold text-slate-900 text-sm">Baru</div>
                                <div class="text-xs text-slate-500 mt-0.5">Belum diproses / difollow-up.</div>
                            </div>
                        </label>

                        <label class="flex items-start p-3 border rounded-xl cursor-pointer transition-all hover:bg-slate-50 {{ $submission->status === 'contacted' ? 'border-amber-500 bg-amber-50 hover:bg-amber-50/80 ring-1 ring-amber-500' : 'border-slate-200' }}">
                            <input type="radio" name="status" value="contacted" {{ $submission->status === 'contacted' ? 'checked' : '' }} class="mt-0.5 mr-3 w-4 h-4 text-amber-600 focus:ring-amber-500 border-slate-300">
                            <div>
                                <div class="font-bold text-slate-900 text-sm">Dihubungi</div>
                                <div class="text-xs text-slate-500 mt-0.5">Sudah / sedang dihubungi tim.</div>
                            </div>
                        </label>

                        <label class="flex items-start p-3 border rounded-xl cursor-pointer transition-all hover:bg-slate-50 {{ $submission->status === 'converted' ? 'border-emerald-500 bg-emerald-50 hover:bg-emerald-50/80 ring-1 ring-emerald-500' : 'border-slate-200' }}">
                            <input type="radio" name="status" value="converted" {{ $submission->status === 'converted' ? 'checked' : '' }} class="mt-0.5 mr-3 w-4 h-4 text-emerald-600 focus:ring-emerald-500 border-slate-300">
                            <div>
                                <div class="font-bold text-slate-900 text-sm">Berhasil (Konversi)</div>
                                <div class="text-xs text-slate-500 mt-0.5">Membayar dan aktif berlangganan.</div>
                            </div>
                        </label>

                        <label class="flex items-start p-3 border rounded-xl cursor-pointer transition-all hover:bg-slate-50 {{ $submission->status === 'lost' ? 'border-slate-500 bg-slate-100 hover:bg-slate-100/80 ring-1 ring-slate-500' : 'border-slate-200' }}">
                            <input type="radio" name="status" value="lost" {{ $submission->status === 'lost' ? 'checked' : '' }} class="mt-0.5 mr-3 w-4 h-4 text-slate-600 focus:ring-slate-500 border-slate-300">
                            <div>
                                <div class="font-bold text-slate-900 text-sm">Batal / Lost</div>
                                <div class="text-xs text-slate-500 mt-0.5">Tidak jadi / tidak dapat dijangkau.</div>
                            </div>
                        </label>
                    </div>

                    <button type="submit" class="w-full mt-6 bg-slate-900 text-white font-medium py-2.5 px-4 rounded-xl hover:bg-slate-800 transition-all shadow-sm">
                        Perbarui Status
                    </button>
                </form>
            </div>
            
            <div class="p-6 bg-emerald-50 border-t border-emerald-100">
                <a href="https://wa.me/{{ ltrim($submission->whatsapp, '0') }}?text={{ urlencode("Halo Bapak/Ibu " . $submission->name . ", saya dari Arjuna Net. Terima kasih sudah mengisi form minat pemasangan. Apakah ada yang bisa saya bantu terkait pemasangan paket?") }}" 
                    target="_blank"
                    class="flex items-center justify-center w-full bg-emerald-600 text-white font-semibold py-2.5 px-4 rounded-xl hover:bg-emerald-700 focus:ring-4 focus:ring-emerald-200 transition-all shadow-sm">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    Chat ke WhatsApp
                </a>
            </div>
            
            <div class="p-6 border-t border-slate-100 bg-rose-50/30">
                <form action="{{ route('admin.forms.destroy', $submission->id) }}" method="POST" onsubmit="return confirm('Tindakan ini permanen. Apakah Anda yakin ingin menghapus data form ini selamanya?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-white border border-rose-200 text-rose-600 font-medium py-2 px-4 rounded-xl hover:bg-rose-50 hover:border-rose-300 transition-all shadow-sm">
                        Hapus Data Permanen
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('admin.layout')

@section('pageTitle', 'Testimoni')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Testimoni Pelanggan</h1>
        <p class="text-slate-500 text-sm mt-1">Kelola bukti layanan yang tampil di halaman publik.</p>
    </div>
    <a href="{{ route('admin.testimonials.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition-all shadow-sm">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah Testimoni
    </a>
</div>

@if(session('success'))
<div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl flex items-center shadow-sm">
    <svg class="w-5 h-5 mr-3 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    <span class="font-medium text-sm">{{ session('success') }}</span>
</div>
@endif

<div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50/50 border-b border-slate-100">
                <tr>
                    <th class="py-4 px-6 text-slate-500 text-xs font-bold uppercase tracking-wider">Pelanggan</th>
                    <th class="py-4 px-6 text-slate-500 text-xs font-bold uppercase tracking-wider">Kutipan</th>
                    <th class="py-4 px-6 text-slate-500 text-xs font-bold uppercase tracking-wider">Rating</th>
                    <th class="py-4 px-6 text-slate-500 text-xs font-bold uppercase tracking-wider">Status</th>
                    <th class="py-4 px-6 text-slate-500 text-xs font-bold uppercase tracking-wider">Urutan</th>
                    <th class="py-4 px-6 text-right text-slate-500 text-xs font-bold uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($testimonials as $testimonial)
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="py-4 px-6 align-top">
                            <div class="font-bold text-slate-900">{{ $testimonial->customer_name }}</div>
                            @if($testimonial->area)
                                <div class="mt-1 text-sm text-slate-500">{{ $testimonial->area }}</div>
                            @endif
                        </td>
                        <td class="py-4 px-6 align-top max-w-xl">
                            <p class="line-clamp-2 text-sm text-slate-700">{{ $testimonial->quote }}</p>
                        </td>
                        <td class="py-4 px-6 align-top whitespace-nowrap">
                            <span class="text-amber-500 font-black">{{ str_repeat('*', $testimonial->rating) }}</span>
                        </td>
                        <td class="py-4 px-6 align-top whitespace-nowrap">
                            @if($testimonial->is_published)
                                <span class="inline-flex items-center px-2.5 py-1 bg-emerald-50 text-emerald-700 text-xs font-bold rounded-md border border-emerald-100">Tampil</span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 bg-slate-50 text-slate-600 text-xs font-bold rounded-md border border-slate-200">Draft</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 align-top whitespace-nowrap">
                            <span class="inline-flex min-w-10 justify-center rounded-lg bg-slate-100 px-2 py-1 text-xs font-bold text-slate-700">{{ $testimonial->sort_order }}</span>
                        </td>
                        <td class="py-4 px-6 align-top whitespace-nowrap text-right">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="inline-flex justify-center items-center w-8 h-8 rounded-lg bg-white border border-slate-200 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50 hover:border-indigo-200 transition-colors shadow-sm" title="Edit Testimoni">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                </a>
                                <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus testimoni ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex justify-center items-center w-8 h-8 rounded-lg bg-white border border-slate-200 text-slate-500 hover:text-rose-600 hover:bg-rose-50 hover:border-rose-200 transition-colors shadow-sm" title="Hapus Testimoni">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($testimonials->count() === 0)
        <div class="text-center py-16 px-4">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 mb-4">
                <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 4v-4z"/></svg>
            </div>
            <h3 class="text-lg font-medium text-slate-900 mb-1">Belum Ada Testimoni</h3>
            <p class="text-slate-500 max-w-sm mx-auto mb-4">Tambahkan testimoni nyata dari pelanggan untuk membangun kepercayaan calon pelanggan.</p>
            <a href="{{ route('admin.testimonials.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-50 border border-indigo-100 rounded-xl font-medium text-sm text-indigo-700 hover:bg-indigo-100 transition-colors">
                Tambah Testimoni Pertama
            </a>
        </div>
    @endif
</div>
@endsection

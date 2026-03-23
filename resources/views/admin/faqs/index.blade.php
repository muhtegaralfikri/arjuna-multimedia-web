@extends('admin.layout')

@section('pageTitle', 'FAQ')

@section('content')
<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">FAQ (Frequently Asked Questions)</h1>
        <p class="text-slate-500 text-sm mt-1">Kelola pertanyaan yang sering ditanyakan oleh pelanggan.</p>
    </div>
    <a href="{{ route('admin.faqs.create') }}" class="inline-flex items-center px-4 py-2.5 bg-indigo-600 border border-transparent rounded-xl font-semibold text-sm text-white hover:bg-indigo-700 active:bg-indigo-800 transition-all shadow-sm focus:ring-4 focus:ring-indigo-100">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
        Tambah FAQ Baru
    </a>
</div>

@if(session('success'))
<div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-xl flex items-start">
    <svg class="w-5 h-5 text-emerald-500 mt-0.5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    <div class="text-emerald-800 text-sm font-medium">{{ session('success') }}</div>
</div>
@endif

<div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden">
    @if($faqs->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-200">
                        <th class="py-4 px-6 text-xs font-semibold text-slate-500 uppercase tracking-wider">Pertanyaan & Jawaban</th>
                        <th class="py-4 px-6 text-xs font-semibold text-slate-500 uppercase tracking-wider whitespace-nowrap">Kategori</th>
                        <th class="py-4 px-6 text-xs font-semibold text-slate-500 uppercase tracking-wider whitespace-nowrap text-center">Urutan</th>
                        <th class="py-4 px-6 text-xs font-semibold text-slate-500 uppercase tracking-wider whitespace-nowrap">Status</th>
                        <th class="py-4 px-6 text-xs font-semibold text-slate-500 uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100" id="sortable-list">
                    @foreach($faqs as $faq)
                        <tr class="hover:bg-slate-50/50 transition-colors group" data-id="{{ $faq->id }}">
                            <td class="py-4 px-6">
                                <div class="font-bold text-slate-900 mb-1 max-w-lg truncate">{{ $faq->question }}</div>
                                <div class="text-sm text-slate-500 max-w-lg truncate">{{ \Illuminate\Support\Str::limit($faq->answer, 80) }}</div>
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap">
                                @if($faq->category === 'general')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-700 border border-slate-200">
                                        Umum
                                    </span>
                                @elseif($faq->category === 'technical')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-indigo-50 text-indigo-700 border border-indigo-200">
                                        Teknis
                                    </span>
                                @elseif($faq->category === 'billing')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-700 border border-amber-200">
                                        Billing
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-sky-50 text-sky-700 border border-sky-200">
                                        Pemasangan
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap text-center text-slate-600 font-medium">
                                <div class="inline-flex items-center justify-center p-2 hover:bg-slate-100 rounded-lg cursor-move drag-handle" title="Tarik untuk Mengurutkan">
                                    <svg class="w-5 h-5 text-slate-400 group-hover:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"/>
                                    </svg>
                                </div>
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap">
                                @if($faq->is_published)
                                    <div class="flex items-center">
                                        <div class="h-2 w-2 rounded-full bg-emerald-500 mr-2"></div>
                                        <span class="text-sm font-medium text-slate-700">Terbit</span>
                                    </div>
                                @else
                                    <div class="flex items-center">
                                        <div class="h-2 w-2 rounded-full bg-slate-300 mr-2"></div>
                                        <span class="text-sm font-medium text-slate-500">Draft</span>
                                    </div>
                                @endif
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus FAQ ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors" title="Hapus">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="flex flex-col items-center justify-center p-12 lg:p-20">
            <div class="w-24 h-24 bg-slate-50 flex items-center justify-center rounded-full mb-4">
                <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
            </div>
            <h3 class="text-lg font-bold text-slate-900 mb-1">Belum Ada FAQ</h3>
            <p class="text-slate-500 text-center max-w-sm mb-6">Anda belum menambahkan daftar pertanyaan dan jawaban untuk ditampilkan di website.</p>
            <a href="{{ route('admin.faqs.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-50 text-indigo-700 font-semibold rounded-xl hover:bg-indigo-100 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Buat FAQ Pertama
            </a>
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var el = document.getElementById('sortable-list');
        if (el) {
            Sortable.create(el, {
                handle: '.drag-handle',
                animation: 150,
                ghostClass: 'bg-indigo-50',
                onEnd: function (evt) {
                    let order = [];
                    document.querySelectorAll('#sortable-list > tr').forEach((row, index) => {
                        order.push({
                            id: row.dataset.id,
                            position: index + 1
                        });
                    });
                    
                    fetch('{{ route("admin.faqs.reorder") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({ order: order })
                    }).then(res => res.json()).then(data => {
                        if(data.success) {
                            console.log('Order saved successfully.');
                        }
                    });
                }
            });
        }
    });
</script>
@endsection

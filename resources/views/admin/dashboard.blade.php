@extends('admin.layout')

@php
    $pageTitle = 'Dashboard';
@endphp

@section('content')

{{-- Stats Cards --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    {{-- Packages Card --}}
    <div class="bg-white rounded-2xl border border-slate-200/60 p-6 shadow-sm hover:shadow-md hover:border-indigo-300 transition-all duration-300 group relative overflow-hidden">
        <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
            <svg class="w-24 h-24 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
        </div>
        <div class="flex flex-col h-full justify-between relative z-10">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-slate-500 text-sm font-medium">Total Paket</p>
                <div class="flex items-end space-x-2 mt-1">
                    <p class="text-3xl font-extrabold text-slate-800 tracking-tight">{{ $stats['packages'] }}</p>
                </div>
            </div>
        </div>
        <a href="{{ route('admin.packages.index') }}" class="absolute inset-0"></a>
    </div>

    {{-- Areas Card --}}
    <div class="bg-white rounded-2xl border border-slate-200/60 p-6 shadow-sm hover:shadow-md hover:border-emerald-300 transition-all duration-300 group relative overflow-hidden">
        <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
            <svg class="w-24 h-24 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        </div>
        <div class="flex flex-col h-full justify-between relative z-10">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <span class="inline-flex items-center px-2 py-1 bg-emerald-50 text-emerald-700 text-xs font-semibold rounded-md border border-emerald-100">
                    {{ $stats['active_areas'] }} Aktif
                </span>
            </div>
            <div>
                <p class="text-slate-500 text-sm font-medium">Total Area</p>
                <div class="flex items-end space-x-2 mt-1">
                    <p class="text-3xl font-extrabold text-slate-800 tracking-tight">{{ $stats['areas'] }}</p>
                </div>
            </div>
        </div>
        <a href="{{ route('admin.areas.index') }}" class="absolute inset-0"></a>
    </div>

    {{-- FAQs Card --}}
    <div class="bg-white rounded-2xl border border-slate-200/60 p-6 shadow-sm hover:shadow-md hover:border-amber-300 transition-all duration-300 group relative overflow-hidden">
        <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
            <svg class="w-24 h-24 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <div class="flex flex-col h-full justify-between relative z-10">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center text-amber-600 group-hover:bg-amber-500 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-slate-500 text-sm font-medium">Total FAQ</p>
                <div class="flex items-end space-x-2 mt-1">
                    <p class="text-3xl font-extrabold text-slate-800 tracking-tight">{{ $stats['faqs'] }}</p>
                </div>
            </div>
        </div>
        <a href="{{ route('admin.faqs.index') }}" class="absolute inset-0"></a>
    </div>

    {{-- Forms Card --}}
    <div class="bg-white rounded-2xl border border-slate-200/60 p-6 shadow-sm hover:shadow-md hover:border-rose-300 transition-all duration-300 group relative overflow-hidden">
        <div class="absolute top-0 right-0 p-4 opacity-5 group-hover:opacity-10 transition-opacity">
            <svg class="w-24 h-24 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
        </div>
        <div class="flex flex-col h-full justify-between relative z-10">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-rose-50 rounded-xl flex items-center justify-center text-rose-600 group-hover:bg-rose-500 group-hover:text-white transition-colors duration-300 relative">
                    @if($stats['forms'] > 0)
                    <span class="absolute -top-1.5 -right-1.5 w-4 h-4 bg-red-500 rounded-full border-2 border-white animate-pulse"></span>
                    @endif
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-slate-500 text-sm font-medium">Form Minat Baru</p>
                <div class="flex items-end space-x-2 mt-1">
                    <p class="text-3xl font-extrabold text-slate-800 tracking-tight">{{ $stats['forms'] }}</p>
                    <p class="text-rose-600 text-sm font-semibold mb-1">Menunggu</p>
                </div>
            </div>
        </div>
        <a href="{{ route('admin.forms.index') }}" class="absolute inset-0"></a>
    </div>
</div>

{{-- Recent Submissions --}}
<div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden">
    <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between bg-white">
        <div>
            <h2 class="text-lg font-bold text-slate-800">Form Submission Terbaru</h2>
            <p class="text-sm text-slate-500 mt-0.5">Daftar calon pelanggan yang baru saja menghubungi</p>
        </div>
        @if($recentSubmissions->count() > 0)
        <a href="{{ route('admin.forms.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-50 border border-slate-200 text-slate-600 rounded-lg focus:outline-none hover:bg-slate-100 transition-colors text-sm font-medium shadow-sm">
            Lihat Semua
            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>
        @endif
    </div>

    @if($recentSubmissions->count() > 0)
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50/50 border-b border-slate-100">
                    <th class="py-4 px-6 text-slate-500 text-xs font-bold uppercase tracking-wider">Pelanggan</th>
                    <th class="py-4 px-6 text-slate-500 text-xs font-bold uppercase tracking-wider">WhatsApp</th>
                    <th class="py-4 px-6 text-slate-500 text-xs font-bold uppercase tracking-wider">Paket Pilihan</th>
                    <th class="py-4 px-6 text-slate-500 text-xs font-bold uppercase tracking-wider">Status</th>
                    <th class="py-4 px-6 text-slate-500 text-xs font-bold uppercase tracking-wider">Tanggal</th>
                    <th class="py-4 px-6 text-right text-slate-500 text-xs font-bold uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($recentSubmissions as $submission)
                <tr class="hover:bg-slate-50/80 transition-colors group">
                    <td class="py-4 px-6 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <div class="h-10 w-10 rounded-full bg-gradient-to-br from-indigo-100 to-indigo-200 flex items-center justify-center text-indigo-700 font-bold border border-indigo-200">
                                    {{ substr($submission->name, 0, 1) }}
                                </div>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-semibold text-slate-900">{{ $submission->name }}</div>
                                <div class="text-sm text-slate-500 truncate max-w-[200px]" title="{{ $submission->address }}">{{ $submission->address }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-6 whitespace-nowrap">
                        <a href="https://wa.me/{{ ltrim($submission->whatsapp, '0') }}" target="_blank" class="inline-flex items-center px-3 py-1.5 rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-100 hover:text-emerald-700 transition font-medium text-sm border border-emerald-100">
                            <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-1.454-.001-2.866.32-4.171.877l-2.633-1.629 1.736 5.737z"/>
                            </svg>
                            {{ $submission->whatsapp }}
                        </a>
                    </td>
                    <td class="py-4 px-6 whitespace-nowrap">
                        @if($submission->package_interest)
                        <span class="inline-flex items-center px-2.5 py-1 bg-indigo-50 text-indigo-700 rounded-md text-xs font-semibold border border-indigo-100">
                            <span class="w-1.5 h-1.5 rounded-full bg-indigo-500 mr-1.5"></span>
                            {{ $submission->package_interest }}
                        </span>
                        @else
                        <span class="text-slate-400 text-sm font-medium">-</span>
                        @endif
                    </td>
                    <td class="py-4 px-6 whitespace-nowrap">
                        @if($submission->status === 'new')
                        <span class="inline-flex items-center px-2.5 py-1 bg-sky-100 text-sky-700 rounded-full text-xs font-bold border border-sky-200">
                            Baru
                        </span>
                        @elseif($submission->status === 'contacted')
                        <span class="inline-flex items-center px-2.5 py-1 bg-amber-100 text-amber-700 rounded-full text-xs font-bold border border-amber-200">
                            Dihubungi
                        </span>
                        @elseif($submission->status === 'converted')
                        <span class="inline-flex items-center px-2.5 py-1 bg-emerald-100 text-emerald-700 rounded-full text-xs font-bold border border-emerald-200">
                            Berhasil
                        </span>
                        @else
                        <span class="inline-flex items-center px-2.5 py-1 bg-slate-100 text-slate-700 rounded-full text-xs font-bold border border-slate-200">
                            Batal
                        </span>
                        @endif
                    </td>
                    <td class="py-4 px-6 whitespace-nowrap text-slate-500 text-sm font-medium">
                        {{ $submission->created_at->format('d/m/Y') }}
                    </td>
                    <td class="py-4 px-6 whitespace-nowrap text-right font-medium">
                        <a href="{{ route('admin.forms.show', $submission->id) }}" class="inline-flex items-center justify-center p-2 rounded-lg bg-white border border-slate-200 text-indigo-600 hover:bg-indigo-50 hover:border-indigo-200 transition-colors shadow-sm">
                            <span class="sr-only">Detail</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="text-center py-16 px-4">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 mb-4">
            <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
            </svg>
        </div>
        <h3 class="text-lg font-medium text-slate-900 mb-1">Belum Ada Form</h3>
        <p class="text-slate-500 max-w-sm mx-auto">Anda akan melihat daftar formulir yang masuk dari pelanggan di sini.</p>
    </div>
    @endif
</div>

@endsection

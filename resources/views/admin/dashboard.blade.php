@extends('admin.layout')

@php
    $pageTitle = 'Dashboard';
@endphp

@section('content')

{{-- Stats Cards --}}
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">
    {{-- Packages Card --}}
    <div class="bg-white rounded-lg border border-slate-200 p-5 shadow-sm hover:shadow-md hover:border-primary-300 transition-all duration-300 group relative overflow-hidden">
        <div class="flex flex-col h-full justify-between relative z-10">
            <div class="flex items-start justify-between mb-4">
                <div class="w-11 h-11 bg-primary-50 rounded-lg flex items-center justify-center text-primary-700 group-hover:bg-primary-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-slate-500 text-sm font-semibold">Total Paket</p>
                <div class="flex items-end space-x-2 mt-1">
                    <p class="text-3xl font-black text-slate-950 tracking-tight">{{ $stats['packages'] }}</p>
                </div>
            </div>
        </div>
        <a href="{{ route('admin.packages.index') }}" class="absolute inset-0"></a>
    </div>

    {{-- FAQs Card --}}
    <div class="bg-white rounded-lg border border-slate-200 p-5 shadow-sm hover:shadow-md hover:border-amber-300 transition-all duration-300 group relative overflow-hidden">
        <div class="flex flex-col h-full justify-between relative z-10">
            <div class="flex items-start justify-between mb-4">
                <div class="w-11 h-11 bg-amber-50 rounded-lg flex items-center justify-center text-amber-600 group-hover:bg-amber-500 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-slate-500 text-sm font-semibold">Total FAQ</p>
                <div class="flex items-end space-x-2 mt-1">
                    <p class="text-3xl font-black text-slate-950 tracking-tight">{{ $stats['faqs'] }}</p>
                </div>
            </div>
        </div>
        <a href="{{ route('admin.faqs.index') }}" class="absolute inset-0"></a>
    </div>

    {{-- Testimonials Card --}}
    <div class="bg-white rounded-lg border border-slate-200 p-5 shadow-sm hover:shadow-md hover:border-emerald-300 transition-all duration-300 group relative overflow-hidden">
        <div class="flex flex-col h-full justify-between relative z-10">
            <div class="flex items-start justify-between mb-4">
                <div class="w-11 h-11 bg-emerald-50 rounded-lg flex items-center justify-center text-emerald-600 group-hover:bg-emerald-500 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 4v-4z"/>
                    </svg>
                </div>
            </div>
            <div>
                <p class="text-slate-500 text-sm font-semibold">Total Testimoni</p>
                <div class="flex items-end space-x-2 mt-1">
                    <p class="text-3xl font-black text-slate-950 tracking-tight">{{ $stats['testimonials'] }}</p>
                </div>
            </div>
        </div>
        <a href="{{ route('admin.testimonials.index') }}" class="absolute inset-0"></a>
    </div>

    {{-- WhatsApp Clicks Card --}}
    <div class="bg-white rounded-lg border border-slate-200 p-5 shadow-sm hover:shadow-md hover:border-green-300 transition-all duration-300 group relative overflow-hidden">
        <div class="flex flex-col h-full justify-between relative z-10">
            <div class="flex items-start justify-between mb-4">
                <div class="w-11 h-11 bg-green-50 rounded-lg flex items-center justify-center text-green-600 group-hover:bg-green-500 group-hover:text-white transition-colors duration-300">
                    @include('partials.whatsapp-icon', ['class' => 'w-6 h-6 object-contain'])
                </div>
            </div>
            <div>
                <p class="text-slate-500 text-sm font-semibold">Klik WA 30 Hari</p>
                <div class="flex items-end space-x-2 mt-1">
                    <p class="text-3xl font-black text-slate-950 tracking-tight">{{ $stats['whatsapp_clicks_30d'] }}</p>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="bg-white rounded-lg border border-slate-200 p-5 shadow-sm">
    <div class="flex items-start justify-between gap-4 mb-5">
        <div>
            <h2 class="text-lg font-black text-slate-950">Paket Paling Banyak Diklik</h2>
            <p class="text-sm text-slate-500 mt-1">Berdasarkan klik tombol WhatsApp paket dalam 30 hari terakhir.</p>
        </div>
    </div>

    @if($topPackageClicks->count() > 0)
        <div class="space-y-3">
            @foreach($topPackageClicks as $item)
                <div class="flex items-center justify-between rounded-xl border border-slate-100 bg-slate-50 px-4 py-3">
                    <div>
                        <p class="font-bold text-slate-900">{{ $item->package?->name ?? 'Paket dihapus' }}</p>
                        <p class="text-xs text-slate-500">{{ $item->package?->speed ?? 'Data paket tidak tersedia' }}</p>
                    </div>
                    <span class="rounded-lg bg-green-100 px-3 py-1 text-sm font-black text-green-700">{{ $item->clicks }} klik</span>
                </div>
            @endforeach
        </div>
    @else
        <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-8 text-center">
            <p class="font-semibold text-slate-700">Belum ada klik paket yang tercatat.</p>
            <p class="mt-1 text-sm text-slate-500">Data akan terisi saat calon pelanggan menekan tombol pesan paket.</p>
        </div>
    @endif
</div>

@endsection

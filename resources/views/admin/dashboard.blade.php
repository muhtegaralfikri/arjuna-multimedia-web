@extends('admin.layout')

@php
    $pageTitle = 'Dashboard';
@endphp

@section('content')

{{-- Stats Cards --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-6">
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

</div>

@endsection

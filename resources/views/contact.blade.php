@extends('layouts.app')

@section('seo')
@php
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'InternetServiceProvider',
        'name' => $contact->name ?? 'Arjuna Net',
        'description' => 'Layanan internet lokal untuk area perkampungan',
        'telephone' => $contact->phone_number,
        'email' => $contact->email,
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => $contact->address,
            'addressCountry' => 'ID',
        ],
        'openingHoursSpecification' => [
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            'opens' => '08:00',
            'closes' => '17:00',
        ],
        'url' => url('/'),
        'sameAs' => [
            $contact->instagram_url,
            $contact->facebook_url,
            $contact->tiktok_url,
        ],
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
</script>
@endsection

@section('content')
@include('partials.hero-page', ['page' => $page])

@if($contact)
<section class="overflow-x-hidden bg-gray-50 py-12 md:py-16">
    <div class="mx-auto w-full max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-12 items-stretch">
            
            {{-- Kolom Kiri: Kontak Resmi --}}
            <div class="flex flex-col justify-between rounded-3xl bg-white p-6 sm:p-8 border border-gray-200/80 shadow-sm">
                <div>
                    {{-- Header --}}
                    <div class="border-b border-gray-100 pb-5 mb-6">
                        <span class="inline-block text-xs font-bold uppercase tracking-wider text-primary-600 bg-primary-50 px-3 py-1 rounded-md">Kontak Resmi</span>
                        <h2 class="mt-2 text-2xl md:text-3xl font-black text-gray-950">Hubungi Kami</h2>
                        <p class="mt-1.5 text-sm text-gray-600">Admin resmi Arjuna Net siap melayani konsultasi dan bantuan Anda.</p>
                    </div>

                    {{-- Layanan WhatsApp & Telepon --}}
                    <div class="space-y-4">
                        {{-- Seksi WhatsApp --}}
                        <div class="rounded-2xl bg-gray-50/80 p-4 border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-9 h-9 bg-green-500 text-white rounded-xl flex items-center justify-center shrink-0">
                                    @include('partials.whatsapp-icon', ['class' => 'w-5 h-5 object-contain'])
                                </div>
                                <div>
                                    <h4 class="text-xs font-extrabold uppercase tracking-wider text-green-700">Layanan WhatsApp</h4>
                                    <p class="text-[11px] text-gray-500">Respon cepat via chat</p>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <a href="{{ route('wa.general') }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-between rounded-xl bg-white px-4 py-2.5 text-sm font-bold text-gray-900 border border-gray-200/70 shadow-2xs transition hover:border-green-400 hover:text-green-600">
                                    <span>{{ $contact->whatsapp_number }}</span>
                                    <span class="text-xs font-bold text-green-600 flex items-center gap-1">Chat <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg></span>
                                </a>
                                @if($contact->phone_number)
                                    <a href="{{ $contact->whatsappLinkForNumber($contact->phone_number) }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-between rounded-xl bg-white px-4 py-2.5 text-sm font-bold text-gray-900 border border-gray-200/70 shadow-2xs transition hover:border-green-400 hover:text-green-600">
                                        <span>{{ $contact->phone_number }}</span>
                                        <span class="text-xs font-bold text-green-600 flex items-center gap-1">Chat <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg></span>
                                    </a>
                                @endif
                            </div>
                        </div>

                        {{-- Seksi Telepon --}}
                        <div class="rounded-2xl bg-gray-50/80 p-4 border border-gray-100">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-9 h-9 bg-blue-600 text-white rounded-xl flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-2.826-1.47-5.111-3.756-6.58-6.582l1.293-.97c.362-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xs font-extrabold uppercase tracking-wider text-blue-700">Panggilan Telepon</h4>
                                    <p class="text-[11px] text-gray-500">Panggilan Telkom / Seluler</p>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <a href="tel:{{ $contact->whatsapp_number }}" class="flex items-center justify-between rounded-xl bg-white px-4 py-2.5 text-sm font-bold text-gray-900 border border-gray-200/70 shadow-2xs transition hover:border-blue-400 hover:text-blue-600">
                                    <span>{{ $contact->whatsapp_number }}</span>
                                    <span class="text-xs font-bold text-blue-600 flex items-center gap-1">Panggil <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg></span>
                                </a>
                                @if($contact->phone_number)
                                    <a href="tel:{{ $contact->phone_number }}" class="flex items-center justify-between rounded-xl bg-white px-4 py-2.5 text-sm font-bold text-gray-900 border border-gray-200/70 shadow-2xs transition hover:border-blue-400 hover:text-blue-600">
                                        <span>{{ $contact->phone_number }}</span>
                                        <span class="text-xs font-bold text-blue-600 flex items-center gap-1">Panggil <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg></span>
                                    </a>
                                @endif
                            </div>
                        </div>

                        {{-- Email & Jam Operasional Grid --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                            @if($contact->email)
                            <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-2xl border border-gray-100">
                                <div class="w-9 h-9 rounded-xl bg-slate-200/80 text-slate-700 flex items-center justify-center shrink-0">
                                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-xs font-extrabold uppercase tracking-wider text-gray-400">Email</p>
                                    <p class="text-sm font-bold text-gray-900 truncate mt-0.5">{{ $contact->email }}</p>
                                </div>
                            </div>
                            @endif

                            <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-2xl border border-gray-100">
                                <div class="w-9 h-9 rounded-xl bg-amber-100/80 text-amber-700 flex items-center justify-center shrink-0">
                                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="text-xs font-extrabold uppercase tracking-wider text-gray-400">Jam Operasional</p>
                                    <p class="text-sm font-bold text-gray-900 mt-0.5">{{ $contact->operating_hours }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kolom Kanan: Lokasi Kami & Map --}}
            <div class="flex flex-col justify-between rounded-3xl bg-white p-6 sm:p-8 border border-gray-200/80 shadow-sm">
                <div>
                    {{-- Header --}}
                    <div class="border-b border-gray-100 pb-5 mb-6">
                        <span class="inline-block text-xs font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-3 py-1 rounded-md">Alamat Layanan</span>
                        <h2 class="mt-2 text-2xl md:text-3xl font-black text-gray-950">Lokasi Kami</h2>
                        <p class="mt-1.5 text-sm text-gray-600">Lokasi acuan untuk pengecekan jaringan dan jangkauan pemasangan.</p>
                    </div>

                    {{-- Google Maps Embed --}}
                    @if($contact->safe_google_maps_embed)
                    <div class="overflow-hidden rounded-2xl border border-gray-200 shadow-2xs [&_iframe]:block [&_iframe]:h-[260px] md:[&_iframe]:h-[280px] [&_iframe]:w-full">
                        {!! $contact->safe_google_maps_embed !!}
                    </div>
                    @elseif($contact->google_maps_link)
                    <a href="{{ $contact->google_maps_link }}" target="_blank" rel="noopener noreferrer" class="flex h-[260px] w-full items-center justify-center rounded-2xl border border-gray-200 bg-gray-50 transition hover:bg-gray-100">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </a>
                    @endif

                    {{-- Info Alamat --}}
                    <div class="mt-4 flex items-center gap-3.5 rounded-2xl bg-gray-50 p-4 border border-gray-100">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-extrabold uppercase tracking-wider text-gray-400">Alamat Lengkap</p>
                            <p class="text-sm font-bold text-gray-900 leading-snug">{{ $contact->address }}</p>
                        </div>
                    </div>
                </div>

                {{-- CTA Button Coverage --}}
                <div class="mt-6">
                    <a href="{{ route('wa.coverage') }}" target="_blank" rel="noopener noreferrer" class="flex w-full items-center justify-center gap-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 px-5 py-3.5 text-sm font-bold text-white shadow-sm transition">
                        @include('partials.whatsapp-icon', ['class' => 'w-5 h-5 object-contain shrink-0'])
                        <span>Cek Coverage Lokasi via WhatsApp</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

@include('partials.customer-service-info', ['contact' => $contact])
@endif
@endsection

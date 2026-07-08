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
@php
    $page = \App\Models\Page::bySlug('contact')->first();
    $contact = \App\Models\Contact::getContact();
@endphp

@include('partials.hero-page', ['page' => $page])

@if($contact)
<section class="py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-5xl mx-auto">
            {{-- Contact Info --}}
            <div>
                <h3 class="text-2xl font-bold mb-8">Hubungi Kami</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                    {{-- WhatsApp --}}
                    <div class="rounded-xl border border-green-200 bg-green-50 p-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-11 h-11 bg-green-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                @include('partials.whatsapp-icon', ['class' => 'w-7 h-7 object-contain'])
                            </div>
                            <div>
                                <div class="text-sm font-bold uppercase tracking-wide text-green-700">WhatsApp</div>
                                <div class="text-xs text-green-700/80">Chat admin</div>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <a href="{{ $contact->whatsapp_link }}" target="_blank" class="block rounded-lg bg-white px-3 py-2 text-lg font-black text-gray-950 hover:text-green-700 transition">
                                {{ $contact->whatsapp_number }}
                            </a>
                            @if($contact->phone_number)
                                <a href="{{ $contact->whatsappLinkForNumber($contact->phone_number) }}" target="_blank" class="block rounded-lg bg-white px-3 py-2 text-lg font-black text-gray-950 hover:text-green-700 transition">
                                    {{ $contact->phone_number }}
                                </a>
                            @endif
                        </div>
                    </div>

                    {{-- Telepon --}}
                    <div class="rounded-xl border border-blue-200 bg-blue-50 p-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-11 h-11 bg-primary-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm font-bold uppercase tracking-wide text-primary-700">Telepon</div>
                                <div class="text-xs text-primary-700/80">Panggilan langsung</div>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <a href="tel:{{ $contact->whatsapp_number }}" class="block rounded-lg bg-white px-3 py-2 text-lg font-black text-gray-950 hover:text-primary-700 transition">
                                {{ $contact->whatsapp_number }}
                            </a>
                            @if($contact->phone_number)
                                <a href="tel:{{ $contact->phone_number }}" class="block rounded-lg bg-white px-3 py-2 text-lg font-black text-gray-950 hover:text-primary-700 transition">
                                    {{ $contact->phone_number }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4">
                    {{-- Email --}}
                    @if($contact->email)
                    <div class="flex items-center p-4 bg-white border border-gray-200 rounded-xl">
                        <div class="w-11 h-11 bg-slate-500 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900">Email</div>
                            <div class="text-gray-600">{{ $contact->email }}</div>
                        </div>
                    </div>
                    @endif

                    {{-- Jam Operasional --}}
                    <div class="flex items-center p-4 bg-white border border-gray-200 rounded-xl">
                        <div class="w-11 h-11 bg-amber-500 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900">Jam Operasional</div>
                            <div class="text-gray-600">{{ $contact->operating_hours }}</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Map --}}
            <div>
                <h3 class="text-2xl font-bold mb-8">Lokasi Kami</h3>
                @if($contact->google_maps_embed)
                <div class="rounded-xl overflow-hidden shadow-lg">
                    {!! $contact->google_maps_embed !!}
                </div>
                @elseif($contact->google_maps_link)
                <a href="{{ $contact->google_maps_link }}" target="_blank" class="block w-full h-64 bg-gray-200 rounded-xl flex items-center justify-center hover:bg-gray-300 transition">
                    <svg class="w-12 h-12 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </a>
                @endif
                <div class="mt-6 p-4 bg-yellow-50 rounded-xl">
                    <p class="text-sm text-gray-700">
                        <strong>Alamat:</strong> {{ $contact->address }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('partials.customer-service-info', ['contact' => $contact])
@endif
@endsection

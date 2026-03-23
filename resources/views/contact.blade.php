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
            'addressCountry' => 'ID'
        ],
        'openingHoursSpecification' => [
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            'opens' => '08:00',
            'closes' => '17:00'
        ],
        'url' => url('/'),
        'sameAs' => [
            $contact->instagram_url,
            $contact->facebook_url,
            $contact->tiktok_url
        ]
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

                {{-- WhatsApp --}}
                <div class="mb-8">
                    <a href="{{ $contact->whatsapp_link }}" target="_blank" class="flex items-center p-4 bg-green-50 rounded-xl hover:bg-green-100 transition group">
                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-1.454-.001-2.866.32-4.171.877l-2.633-1.629 1.736 5.737z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900">WhatsApp</div>
                            <div class="text-gray-600">{{ $contact->whatsapp_number }}</div>
                            <div class="text-sm text-green-600 group-hover:underline">Chat sekarang →</div>
                        </div>
                    </a>
                </div>

                {{-- Telepon --}}
                <div class="mb-8">
                    <div class="flex items-center p-4 bg-blue-50 rounded-xl">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900">Telepon</div>
                            <div class="text-gray-600">{{ $contact->phone_number }}</div>
                        </div>
                    </div>
                </div>

                {{-- Email --}}
                @if($contact->email)
                <div class="mb-8">
                    <div class="flex items-center p-4 bg-gray-50 rounded-xl">
                        <div class="w-12 h-12 bg-gray-500 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900">Email</div>
                            <div class="text-gray-600">{{ $contact->email }}</div>
                        </div>
                    </div>
                </div>
                @endif

                {{-- Jam Operasional --}}
                <div class="mb-8">
                    <div class="flex items-center p-4 bg-orange-50 rounded-xl">
                        <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
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

{{-- Form Minat --}}
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <h3 class="text-2xl font-bold text-center mb-8">Form Minat Pemasangan</h3>
            <form action="{{ route('form.submit') }}" method="POST" class="bg-white p-8 rounded-2xl shadow-lg">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama *</label>
                        <input type="text" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">No. WhatsApp *</label>
                        <input type="tel" name="whatsapp" required placeholder="628xxxxxxxx" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    </div>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Paket Diminati</label>
                    <select name="package_interest" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                        <option value="">-- Pilih Paket --</option>
                        @foreach(\App\Models\Package::active()->ordered()->get() as $pkg)
                        <option value="{{ $pkg->name }}">{{ $pkg->name }} - {{ $pkg->speed }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Alamat *</label>
                    <textarea name="address" required rows="2" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent"></textarea>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                    <textarea name="message" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent"></textarea>
                </div>
                <button type="submit" class="w-full px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition font-semibold">
                    Kirim
                </button>
            </form>
        </div>
    </div>
</section>
@endif
@endsection

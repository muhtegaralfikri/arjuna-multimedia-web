@extends('layouts.app')

@section('content')
@php
    $primaryWa = $contact ? preg_replace('/^62/', '0', $contact->whatsapp_number) : null;
@endphp

<section class="bg-gradient-to-br from-primary-700 to-primary-900 text-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <div class="max-w-4xl">
            <p class="text-sm font-bold uppercase tracking-[0.2em] text-primary-100">Paket Internet Arjuna Net</p>
            <h1 class="mt-4 text-4xl md:text-6xl font-black tracking-tight text-white">
                Internet kencang, speed jelas, bebas FUP.
            </h1>
            <p class="mt-5 text-lg text-primary-100 max-w-2xl">
                Pilih paket berdasarkan kebutuhan kecepatan. Semua paket tanpa batas kuota, tanpa batas download, dan tanpa batas upload.
            </p>
        </div>
    </div>
</section>

<section id="paket-list" class="bg-gray-50 py-14 md:py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-8">
            <div>
                <h2 class="text-3xl md:text-4xl font-black text-gray-950">Pilih Kecepatan Internet</h2>
                <p class="mt-2 text-gray-600">Angka Mbps dibuat besar agar mudah dibandingkan.</p>
            </div>
            <div class="inline-flex w-max px-4 py-2 rounded-full bg-blue-50 text-primary-700 font-bold">
                Semua paket unlimited
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">
            @foreach($packages as $package)
                @include('partials.package-card', ['package' => $package, 'contact' => $contact])
            @endforeach
        </div>
    </div>
</section>

<section class="bg-white py-14 md:py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 bg-gray-50 rounded-2xl p-6 md:p-8">
                <h2 class="text-2xl md:text-3xl font-black text-gray-950">Yang kamu dapatkan</h2>
                <p class="mt-2 text-gray-600">Setiap paket dibuat untuk penggunaan harian yang jelas: koneksi stabil, pemakaian bebas kuota, dan aktivitas online lebih nyaman.</p>
                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="bg-white rounded-xl p-5 border border-gray-100">
                        <span class="w-11 h-11 rounded-lg bg-primary-100 text-primary-700 flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </span>
                        <h3 class="font-black text-gray-950">Speed stabil</h3>
                        <p class="mt-2 text-sm leading-relaxed text-gray-600">Kecepatan paket ditampilkan jelas agar mudah disesuaikan dengan jumlah perangkat dan kebutuhan rumah.</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 border border-gray-100">
                        <span class="w-11 h-11 rounded-lg bg-green-100 text-green-700 flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <h3 class="font-black text-gray-950">Koneksi handal</h3>
                        <p class="mt-2 text-sm leading-relaxed text-gray-600">Cocok untuk aktivitas beberapa perangkat seperti ponsel, laptop, smart TV, dan kebutuhan kerja online.</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 border border-gray-100">
                        <span class="w-11 h-11 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M20 12H4m16 0l-4-4m4 4l-4 4"/></svg>
                        </span>
                        <h3 class="font-black text-gray-950">Tanpa FUP</h3>
                        <p class="mt-2 text-sm leading-relaxed text-gray-600">Tidak ada batas kuota bulanan, tanpa batas download, dan tanpa batas upload untuk pemakaian normal harian.</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 border border-gray-100">
                        <span class="w-11 h-11 rounded-lg bg-amber-100 text-amber-700 flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.868v4.264a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </span>
                        <h3 class="font-black text-gray-950">Streaming, gaming, meeting lancar</h3>
                        <p class="mt-2 text-sm leading-relaxed text-gray-600">Lebih nyaman untuk hiburan, belajar, komunikasi video, dan pekerjaan online dari rumah.</p>
                    </div>
                </div>
            </div>

            @if($contact)
            <div class="bg-gray-50 rounded-2xl p-6 md:p-8 border border-gray-200/80 flex flex-col justify-between">
                <div>
                    <h2 class="text-2xl font-black text-gray-950">Konsultasi pemasangan</h2>
                    <p class="mt-2 text-sm text-gray-600 leading-relaxed">Diskusikan kebutuhan paket, alamat pemasangan, dan jadwal penyambungan melalui admin resmi Arjuna Net.</p>

                    <div class="mt-6 space-y-4">
                        {{-- Alamat Layanan --}}
                        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm flex items-start gap-3.5">
                            <span class="w-10 h-10 rounded-lg bg-primary-50 text-primary-600 flex items-center justify-center shrink-0 mt-0.5">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </span>
                            <div>
                                <p class="text-xs font-extrabold uppercase tracking-wider text-gray-400">Alamat layanan</p>
                                <p class="mt-1 text-base font-bold text-gray-900 leading-snug">{{ $contact->address }}</p>
                            </div>
                        </div>

                        {{-- WhatsApp --}}
                        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm flex items-start gap-3.5">
                            <span class="w-10 h-10 rounded-lg bg-green-50 text-green-600 flex items-center justify-center shrink-0 mt-0.5">
                                @include('partials.whatsapp-icon', ['class' => 'w-5 h-5 object-contain'])
                            </span>
                            <div>
                                <p class="text-xs font-extrabold uppercase tracking-wider text-green-600">WhatsApp</p>
                                <div class="mt-1 space-y-1">
                                    <a href="{{ route('wa.general') }}" target="_blank" rel="noopener noreferrer" class="block text-base font-bold text-gray-900 hover:text-green-600 transition">{{ $primaryWa }}</a>
                                    @if($contact->phone_number)
                                        <a href="{{ $contact->whatsappLinkForNumber($contact->phone_number) }}" target="_blank" rel="noopener noreferrer" class="block text-base font-bold text-gray-900 hover:text-green-600 transition">{{ $contact->phone_number }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Telepon --}}
                        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm flex items-start gap-3.5">
                            <span class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-2.826-1.47-5.111-3.756-6.58-6.582l1.293-.97c.362-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                                </svg>
                            </span>
                            <div>
                                <p class="text-xs font-extrabold uppercase tracking-wider text-blue-600">Telepon</p>
                                <div class="mt-1 space-y-1">
                                    <a href="tel:{{ $contact->whatsapp_number }}" class="block text-base font-bold text-gray-900 hover:text-blue-600 transition">{{ $whatsappNumberFormatted ?? $contact->whatsapp_number }}</a>
                                    @if($contact->phone_number)
                                        <a href="tel:{{ $contact->phone_number }}" class="block text-base font-bold text-gray-900 hover:text-blue-600 transition">{{ $contact->phone_number }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="{{ route('wa.general') }}" target="_blank" rel="noopener noreferrer" class="inline-flex w-full items-center justify-center gap-2.5 rounded-xl bg-green-500 hover:bg-green-600 px-5 py-3.5 text-base font-bold text-white shadow-sm transition">
                        @include('partials.whatsapp-icon', ['class' => 'w-5 h-5 object-contain flex-shrink-0'])
                        <span>Konsultasi via WhatsApp</span>
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection

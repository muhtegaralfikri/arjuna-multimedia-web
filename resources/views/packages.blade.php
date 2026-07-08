@extends('layouts.app')

@section('content')
@php
    $page = \App\Models\Page::bySlug('package')->first();
    $packages = \App\Models\Package::active()->ordered()->get();
    $contact = \App\Models\Contact::getContact();
    $primaryWa = $contact ? preg_replace('/^62/', '0', $contact->whatsapp_number) : null;
@endphp

<section class="bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-[1.05fr_0.95fr] gap-10 items-center">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.2em] text-primary-600">Paket Internet Arjuna Net</p>
                <h1 class="mt-4 text-4xl md:text-6xl font-black tracking-tight text-gray-950">
                    Internet kencang, speed jelas, bebas FUP.
                </h1>
                <p class="mt-5 text-lg text-gray-600 max-w-2xl">
                    Pilih paket berdasarkan kebutuhan kecepatan. Semua paket tanpa batas kuota, tanpa batas download, dan tanpa batas upload.
                </p>
                <div class="mt-8 flex flex-col sm:flex-row gap-3">
                    @if($contact)
                        <a href="{{ $contact->whatsapp_link }}" target="_blank" class="inline-flex items-center justify-center px-6 py-3 bg-green-500 text-white rounded-lg font-bold hover:bg-green-600 transition">
                            @include('partials.whatsapp-icon', ['class' => 'w-6 h-6 mr-2 object-contain'])
                            Konsultasi via WhatsApp
                        </a>
                    @endif
                    <a href="#paket-list" class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-gray-800 rounded-lg font-bold hover:bg-gray-50 transition">
                        Lihat Paket
                    </a>
                </div>
            </div>

            <div class="bg-gradient-to-br from-primary-600 to-blue-900 rounded-2xl p-6 md:p-8 text-white shadow-xl">
                <div class="flex items-center gap-4">
                    <img src="{{ asset('logo.png') }}" alt="Arjuna Net" class="w-28 h-auto bg-white rounded-xl p-2">
                    <div>
                        <p class="text-sm text-blue-100">Mulai dari</p>
                        <p class="text-4xl font-black">Rp 150RB</p>
                        <p class="text-blue-100 font-semibold">per bulan</p>
                    </div>
                </div>
                <div class="mt-8 grid grid-cols-2 gap-3">
                    <div class="bg-white/10 rounded-xl p-4">
                        <p class="text-3xl font-black">7-20</p>
                        <p class="text-sm text-blue-100 font-semibold">Mbps tersedia</p>
                    </div>
                    <div class="bg-white/10 rounded-xl p-4">
                        <p class="text-3xl font-black">300RB</p>
                        <p class="text-sm text-blue-100 font-semibold">biaya penyambungan</p>
                    </div>
                    <div class="bg-white/10 rounded-xl p-4">
                        <p class="text-3xl font-black">0</p>
                        <p class="text-sm text-blue-100 font-semibold">FUP</p>
                    </div>
                    <div class="bg-white/10 rounded-xl p-4">
                        <p class="text-3xl font-black">24/7</p>
                        <p class="text-sm text-blue-100 font-semibold">siap dipakai harian</p>
                    </div>
                </div>
            </div>
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

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
            @foreach($packages as $package)
            @php
                $speedNumber = preg_replace('/[^0-9]/', '', $package->speed);
                $priceRb = number_format($package->price_monthly / 1000, 0, ',', '.');
            @endphp
            <article class="bg-white rounded-2xl border {{ $package->is_popular ? 'border-primary-500 shadow-xl' : 'border-gray-200 shadow-sm' }} overflow-hidden">
                @if($package->is_popular)
                    <div class="bg-primary-600 text-white text-center py-2 text-sm font-black uppercase tracking-wide">Paling Diminati</div>
                @endif
                <div class="p-6">
                    <div class="flex items-center justify-between gap-3">
                        <h3 class="text-2xl font-black text-gray-950">{{ $package->name }}</h3>
                        <span class="px-3 py-1 rounded-full bg-blue-50 text-primary-700 text-sm font-bold">Unlimited</span>
                    </div>

                    <div class="mt-6 rounded-2xl bg-gradient-to-br from-blue-50 to-sky-100 p-5 text-center">
                        <p class="text-sm font-black uppercase tracking-wide text-primary-700">Kecepatan</p>
                        <div class="mt-1 flex items-end justify-center gap-2 text-blue-950">
                            <span class="text-8xl font-black leading-none">{{ $speedNumber }}</span>
                            <span class="mb-3 text-2xl font-black">Mbps</span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <p class="text-sm font-bold text-gray-500 uppercase">Harga bulanan</p>
                        <div class="flex items-end gap-2">
                            <span class="text-5xl font-black text-gray-950">{{ $priceRb }}</span>
                            <span class="mb-2 text-xl font-black text-gray-950">RB</span>
                            <span class="mb-2 text-gray-500">/bulan</span>
                        </div>
                        <p class="mt-1 text-sm text-gray-500">Biaya penyambungan Rp {{ number_format($package->installation_fee, 0, ',', '.') }}</p>
                    </div>

                    @if($package->features)
                    <ul class="mt-6 space-y-2">
                        @foreach(array_slice($package->features, 0, 4) as $feature)
                        <li class="flex items-center gap-2 text-sm text-gray-700">
                            <span class="w-5 h-5 rounded-full bg-green-100 text-green-700 flex items-center justify-center flex-shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </span>
                            {{ $feature }}
                        </li>
                        @endforeach
                    </ul>
                    @endif

                    @if($contact)
                    <a href="{{ $contact->whatsappLinkForPackage($package->name) }}" target="_blank" class="mt-6 inline-flex w-full items-center justify-center px-5 py-3 bg-primary-600 text-white rounded-lg font-bold hover:bg-primary-700 transition">
                        Pesan {{ $package->speed }}
                    </a>
                    @endif
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-white py-14 md:py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 bg-gray-50 rounded-2xl p-6 md:p-8">
                <h2 class="text-2xl md:text-3xl font-black text-gray-950">Yang kamu dapatkan</h2>
                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach(['Speed stabil', 'Koneksi handal', 'Tanpa FUP', 'Streaming, gaming, meeting lancar'] as $benefit)
                    <div class="flex items-center gap-3 bg-white rounded-xl p-4 border border-gray-100">
                        <span class="w-10 h-10 rounded-full bg-primary-100 text-primary-700 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <span class="font-bold text-gray-900">{{ $benefit }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            @if($contact)
            <div class="bg-blue-950 rounded-2xl p-6 md:p-8 text-white">
                <h2 class="text-2xl font-black">Daftar sekarang</h2>
                <p class="mt-2 text-blue-100">Cek titik pemasangan dan jadwal penyambungan melalui admin.</p>
                <div class="mt-6 space-y-4">
                    <div>
                        <p class="text-sm text-blue-200 font-bold uppercase">Alamat</p>
                        <p class="text-xl font-black">{{ $contact->address }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-blue-200 font-bold uppercase">Contact WA</p>
                        <p class="text-2xl font-black">{{ $primaryWa }}</p>
                        @if($contact->phone_number)
                            <p class="text-2xl font-black">{{ $contact->phone_number }}</p>
                        @endif
                    </div>
                </div>
                <a href="{{ $contact->whatsapp_link }}" target="_blank" class="mt-6 inline-flex w-full items-center justify-center px-5 py-3 bg-green-500 text-white rounded-lg font-bold hover:bg-green-600 transition">
                    @include('partials.whatsapp-icon', ['class' => 'w-6 h-6 mr-2 object-contain'])
                    Chat WhatsApp
                </a>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection

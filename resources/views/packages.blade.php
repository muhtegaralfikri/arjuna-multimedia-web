@extends('layouts.app')

@section('content')
@php
    $page = \App\Models\Page::bySlug('package')->first();
    $packages = \App\Models\Package::active()->ordered()->get();
    $contact = \App\Models\Contact::getContact();
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
            <div class="mt-8 flex flex-col sm:flex-row gap-3">
                @if($contact)
                    <a href="{{ $contact->whatsapp_link }}" target="_blank" class="inline-flex items-center justify-center px-6 py-3 bg-green-500 text-white rounded-lg font-bold hover:bg-green-600 transition">
                        @include('partials.whatsapp-icon', ['class' => 'w-6 h-6 mr-2 object-contain'])
                        Konsultasi via WhatsApp
                    </a>
                @endif
                <a href="#paket-list" class="inline-flex items-center justify-center px-6 py-3 border border-white/70 text-white rounded-lg font-bold hover:bg-white/10 transition">
                    Lihat Paket
                </a>
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
            <article class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
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
            <div class="bg-white rounded-2xl p-6 md:p-8 border border-gray-200">
                <h2 class="text-2xl font-black text-gray-950">Konsultasi pemasangan</h2>
                <p class="mt-2 text-gray-600 leading-relaxed">Diskusikan kebutuhan paket, alamat pemasangan, dan jadwal penyambungan melalui admin resmi Arjuna Net.</p>
                <div class="mt-6 space-y-4">
                    <div class="rounded-xl bg-gray-50 border border-gray-100 p-4">
                        <p class="text-xs text-gray-500 font-bold uppercase tracking-wide">Alamat layanan</p>
                        <p class="mt-1 text-lg font-black text-gray-950">{{ $contact->address }}</p>
                    </div>
                    <div class="rounded-xl bg-gray-50 border border-gray-100 p-4">
                        <p class="text-xs text-gray-500 font-bold uppercase tracking-wide">WhatsApp</p>
                        <div class="mt-1 space-y-1">
                            <a href="{{ $contact->whatsapp_link }}" target="_blank" class="block text-2xl font-black text-gray-950 hover:text-primary-700">{{ $primaryWa }}</a>
                            @if($contact->phone_number)
                                <a href="{{ $contact->whatsappLinkForNumber($contact->phone_number) }}" target="_blank" class="block text-2xl font-black text-gray-950 hover:text-primary-700">{{ $contact->phone_number }}</a>
                            @endif
                        </div>
                    </div>
                    @if($contact->phone_number)
                    <div class="rounded-xl bg-gray-50 border border-gray-100 p-4">
                        <p class="text-xs text-gray-500 font-bold uppercase tracking-wide">Telepon</p>
                        <div class="mt-1 space-y-1">
                            <a href="tel:{{ $contact->whatsapp_number }}" class="block text-2xl font-black text-gray-950 hover:text-primary-700">{{ $contact->whatsapp_number }}</a>
                            <a href="tel:{{ $contact->phone_number }}" class="block text-2xl font-black text-gray-950 hover:text-primary-700">{{ $contact->phone_number }}</a>
                        </div>
                    </div>
                    @endif
                </div>
                <a href="{{ $contact->whatsapp_link }}" target="_blank" class="mt-6 inline-flex w-full items-center justify-center px-5 py-3 bg-green-500 text-white rounded-lg font-bold hover:bg-green-600 transition">
                    @include('partials.whatsapp-icon', ['class' => 'w-6 h-6 mr-2 object-contain'])
                    Konsultasi via WhatsApp
                </a>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection

@extends('layouts.app')

@section('content')
{{-- Get Page & Settings --}}
@php
    $page = \App\Models\Page::bySlug('home')->first();
    $settings = \App\Models\SiteSettings::getSettings();
    $contact = \App\Models\Contact::getContact();
    $popularPackages = \App\Models\Package::active()->ordered()->take(4)->get();
    $testimonials = \App\Models\Testimonial::published()->ordered()->take(3)->get();
@endphp

{{-- Hero Section --}}
<section class="relative bg-gradient-to-br from-primary-700 to-primary-900 text-white py-14 md:py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl">
            <h1 class="text-4xl md:text-5xl font-black leading-tight mb-5">
                {{ $page->hero_title ?? 'Internet Cepat & Stabil untuk Area Perkampungan' }}
            </h1>
            <p class="text-lg md:text-xl text-primary-100 leading-relaxed max-w-3xl">
                {{ $page->hero_subtitle ?? 'Nikmati internet berkualitas dengan harga terjangkau. Langganan sekarang!' }}
            </p>
        </div>
    </div>
</section>

{{-- Highlight Layanan --}}
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Kenapa Memilih Kami?</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">Kami memberikan layanan internet terbaik untuk kebutuhan rumah dan bisnis Anda</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {{-- Card 1 --}}
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Cepat & Stabil</h3>
                <p class="text-gray-600">Koneksi internet cepat dengan stabilitas terjamin untuk aktivitas sehari-hari Anda.</p>
            </div>
            {{-- Card 2 --}}
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-success-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Harga Terjangkau</h3>
                <p class="text-gray-600">Paket harga yang bersahabat dengan kualitas internet yang memuaskan.</p>
            </div>
            {{-- Card 3 --}}
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-warning-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Area Luas</h3>
                <p class="text-gray-600">Jangkauan layanan yang terus meluas untuk melayani lebih banyak area.</p>
            </div>
            {{-- Card 4 --}}
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Support Lokal</h3>
                <p class="text-gray-600">Tim support yang siap membantu dengan respon cepat dan solusi tepat.</p>
            </div>
        </div>
    </div>
</section>

{{-- Paket Internet --}}
@if($popularPackages->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Pilih Paket Berdasarkan Kecepatan</h2>
            <p class="text-xl text-gray-600">Mbps adalah hal utama yang dicari pelanggan, jadi kami tampilkan paling jelas.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($popularPackages as $package)
            @php
                $speedNumber = preg_replace('/[^0-9]/', '', $package->speed);
                $priceRb = number_format($package->price_monthly / 1000, 0, ',', '.');
            @endphp
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200 relative flex h-full flex-col">
                <div class="p-6 flex h-full flex-col">
                    <div class="flex items-start justify-between gap-3">
                        <h3 class="text-xl font-black text-gray-900">{{ $package->name }}</h3>
                        @if($package->is_popular)
                            <span class="shrink-0 px-3 py-1 rounded-full bg-amber-100 text-amber-800 text-xs font-bold">Populer</span>
                        @endif
                    </div>
                    <div class="mt-5 rounded-2xl bg-gradient-to-br from-primary-50 to-sky-100 p-5 text-center">
                        <p class="text-xs font-black uppercase tracking-wide text-primary-700">Kecepatan</p>
                        <div class="mt-1 flex items-end justify-center gap-2 text-blue-950">
                            <span class="text-7xl font-black leading-none">{{ $speedNumber }}</span>
                            <span class="mb-2 text-xl font-black">Mbps</span>
                        </div>
                    </div>
                    <div class="mt-5 mb-4">
                        <p class="text-sm font-bold text-gray-500 uppercase">Harga</p>
                        <div class="flex items-end gap-1">
                            <span class="text-4xl font-black text-primary-600">{{ $priceRb }}</span>
                            <span class="mb-1 text-xl font-black text-primary-600">RB</span>
                            <span class="mb-1 text-gray-600">/bulan</span>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">{{ $package->description }}</p>
                    @if($package->features)
                    <ul class="mb-6 space-y-2 text-sm">
                        @foreach(array_slice($package->features, 0, 3) as $feature)
                        <li class="flex items-center text-gray-700">
                            <svg class="w-4 h-4 text-success-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ $feature }}
                        </li>
                        @endforeach
                    </ul>
                    @endif
                    <a href="{{ route('packages') }}#paket-list" class="mt-auto block w-full text-center px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition">
                        Lihat Detail Paket
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('packages') }}" class="inline-flex items-center justify-center rounded-xl bg-primary-600 px-6 py-3 font-bold text-white shadow-sm transition hover:bg-primary-700">
                Lihat Semua Paket
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>
@endif

{{-- Cek Coverage --}}
@if($contact)
<section class="py-14 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-2xl bg-gradient-to-br from-primary-700 to-primary-900 p-6 md:p-10 text-white">
            <div class="grid grid-cols-1 lg:grid-cols-[1fr_auto] gap-6 items-center">
                <div>
                    <p class="text-sm font-bold uppercase tracking-[0.2em] text-primary-100">Cek Coverage</p>
                    <h2 class="mt-3 text-3xl md:text-4xl font-black">Mau pasang internet? Cek alamat dulu.</h2>
                    <p class="mt-3 text-primary-100 text-lg max-w-3xl">
                        Kirim nama, alamat lengkap, patokan rumah, dan paket diminati. Admin akan membantu mengecek ketersediaan jaringan dan jadwal pemasangan.
                    </p>
                </div>
                <a href="{{ route('coverage') }}" class="inline-flex items-center justify-center rounded-xl bg-white px-6 py-4 font-bold text-primary-700 transition hover:bg-primary-50">
                    Cek Coverage
                </a>
            </div>
        </div>
    </div>
</section>
@endif

{{-- Testimoni --}}
@if($testimonials->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Cerita Pelanggan</h2>
            <p class="text-xl text-gray-600">Bukti layanan dari pelanggan yang sudah menggunakan Arjuna Net.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($testimonials as $testimonial)
                <article class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                    <div class="flex items-center gap-1 text-amber-500">
                        @for($rating = 1; $rating <= $testimonial->rating; $rating++)
                            <svg class="h-5 w-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                    <p class="mt-4 text-gray-700 leading-relaxed">"{{ $testimonial->quote }}"</p>
                    <div class="mt-5 border-t border-gray-100 pt-4">
                        <p class="font-black text-gray-950">{{ $testimonial->customer_name }}</p>
                        @if($testimonial->area)
                            <p class="mt-1 text-sm text-gray-500">{{ $testimonial->area }}</p>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection

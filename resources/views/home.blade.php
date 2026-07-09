@extends('layouts.app')

@section('content')
{{-- Get Page & Settings --}}
@php
    $page = \App\Models\Page::bySlug('home')->first();
    $settings = \App\Models\SiteSettings::getSettings();
    $contact = \App\Models\Contact::getContact();
    $popularPackages = \App\Models\Package::active()->ordered()->take(4)->get();
    $testimonials = \App\Models\Testimonial::published()->ordered()->take(3)->get();
    $homeFaqs = \App\Models\Faq::published()->ordered()->take(4)->get();
@endphp

{{-- Hero Section --}}
<section class="relative overflow-x-hidden bg-gradient-to-br from-primary-700 to-primary-900 text-white py-14 md:py-16">
    <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl min-w-0">
            <h1 class="break-words text-4xl md:text-5xl font-black leading-tight mb-5">
                {{ $page->hero_title ?? 'Internet Cepat & Stabil untuk Area Perkampungan' }}
            </h1>
            <p class="break-words text-lg md:text-xl text-primary-100 leading-relaxed max-w-3xl">
                {{ $page->hero_subtitle ?? 'Nikmati internet berkualitas dengan harga terjangkau. Langganan sekarang!' }}
            </p>
            <div class="mt-8 flex flex-col sm:flex-row gap-3">
                @if($contact)
                    <a href="{{ route('wa.coverage') }}" target="_blank" rel="noopener noreferrer" class="inline-flex w-full items-center justify-center rounded-xl bg-green-500 px-6 py-4 font-bold text-white shadow-sm transition hover:bg-green-600 sm:w-auto">
                        @include('partials.whatsapp-icon', ['class' => 'w-6 h-6 mr-2 object-contain'])
                        Cek Coverage Sekarang
                    </a>
                @endif
                <a href="{{ route('packages') }}" class="inline-flex w-full items-center justify-center rounded-xl bg-white px-6 py-4 font-bold text-primary-700 shadow-sm transition hover:bg-primary-50 sm:w-auto">
                    Lihat Paket Internet
                </a>
            </div>
            <div class="mt-8 grid min-w-0 grid-cols-1 gap-3 text-sm sm:grid-cols-4">
                <div class="min-w-0 rounded-xl border border-white/20 bg-white/10 px-4 py-3">
                    <p class="font-black">Tanpa FUP</p>
                    <p class="mt-1 text-primary-100">Semua paket unlimited</p>
                </div>
                <div class="min-w-0 rounded-xl border border-white/20 bg-white/10 px-4 py-3">
                    <p class="font-black">Mulai 150RB</p>
                    <p class="mt-1 text-primary-100">Harga bulanan jelas</p>
                </div>
                <div class="min-w-0 rounded-xl border border-white/20 bg-white/10 px-4 py-3">
                    <p class="font-black">Biaya Pasang</p>
                    <p class="mt-1 text-primary-100">Ditampilkan sejak awal</p>
                </div>
                <div class="min-w-0 rounded-xl border border-white/20 bg-white/10 px-4 py-3">
                    <p class="font-black">Support Lokal</p>
                    <p class="mt-1 text-primary-100">Admin via WhatsApp</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Penawaran Utama --}}
<section class="bg-white py-10">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <div class="rounded-xl border border-green-200 bg-green-50 p-5">
                <p class="text-sm font-black uppercase tracking-wide text-green-700">Gratis Konsultasi</p>
                <h2 class="mt-2 text-xl font-black text-gray-950">Cek alamat dulu sebelum pasang.</h2>
                <p class="mt-2 text-gray-600">Admin membantu memastikan ketersediaan jaringan sesuai lokasi rumah atau usaha.</p>
            </div>
            <div class="rounded-xl border border-primary-100 bg-primary-50 p-5">
                <p class="text-sm font-black uppercase tracking-wide text-primary-700">Harga Jelas</p>
                <h2 class="mt-2 text-xl font-black text-gray-950">Paket mulai Rp150.000/bulan.</h2>
                <p class="mt-2 text-gray-600">Biaya bulanan dan biaya penyambungan ditampilkan agar calon pelanggan tidak bingung.</p>
            </div>
            <div class="rounded-xl border border-amber-200 bg-amber-50 p-5">
                <p class="text-sm font-black uppercase tracking-wide text-amber-700">Cocok Harian</p>
                <h2 class="mt-2 text-xl font-black text-gray-950">Untuk rumah dan usaha kecil.</h2>
                <p class="mt-2 text-gray-600">Bisa dipakai untuk belajar online, streaming, komunikasi, transaksi, dan kerja dari rumah.</p>
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
                $usageGuide = match ((int) $speedNumber) {
                    7 => 'Cocok untuk 1-3 perangkat, WhatsApp, browsing, dan YouTube ringan.',
                    10 => 'Cocok untuk keluarga kecil, belajar online, streaming, dan kerja ringan.',
                    15 => 'Cocok untuk rumah aktif, meeting online, streaming, dan beberapa perangkat.',
                    20 => 'Cocok untuk multi-perangkat, usaha kecil, meeting, dan hiburan harian.',
                    default => 'Cocok untuk kebutuhan internet harian sesuai jumlah perangkat di rumah.',
                };
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
                        @if($package->installation_fee)
                            <p class="mt-2 text-sm text-gray-500">Biaya pasang Rp {{ number_format($package->installation_fee, 0, ',', '.') }}</p>
                        @endif
                    </div>
                    <div class="mt-5 mb-4">
                        <p class="text-sm font-bold text-gray-500 uppercase">Harga</p>
                        <div class="flex items-end gap-1">
                            <span class="text-4xl font-black text-primary-600">{{ $priceRb }}</span>
                            <span class="mb-1 text-xl font-black text-primary-600">RB</span>
                            <span class="mb-1 text-gray-600">/bulan</span>
                        </div>
                    </div>
                    <div class="mb-4 rounded-xl border border-gray-100 bg-gray-50 p-3">
                        <p class="text-xs font-black uppercase tracking-wide text-gray-500">Rekomendasi</p>
                        <p class="mt-1 text-sm leading-relaxed text-gray-700">{{ $usageGuide }}</p>
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
                    @if($contact)
                        <a href="{{ route('wa.package', $package->slug) }}" target="_blank" rel="noopener noreferrer" class="mt-auto block w-full text-center px-6 py-3 bg-green-500 text-white rounded-lg font-bold hover:bg-green-600 transition">
                            Tanya {{ $package->speed }} via WhatsApp
                        </a>
                    @else
                        <a href="{{ route('packages') }}#paket-list" class="mt-auto block w-full text-center px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition">
                            Lihat Detail Paket
                        </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-8 rounded-2xl border border-primary-100 bg-white p-5 md:p-6">
            <div class="grid grid-cols-1 gap-5 md:grid-cols-[1fr_auto] md:items-center">
                <div>
                    <h3 class="text-2xl font-black text-gray-950">Bingung pilih paket?</h3>
                    <p class="mt-2 text-gray-600">Kirim jumlah perangkat, kebutuhan pemakaian, dan alamat. Admin akan bantu sarankan paket yang paling masuk akal.</p>
                </div>
                @if($contact)
                    <a href="{{ route('wa.general') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-xl bg-primary-600 px-5 py-3 font-bold text-white transition hover:bg-primary-700">
                        Tanya Paket yang Cocok
                    </a>
                @endif
            </div>
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

{{-- Cara Berlangganan --}}
<section class="py-14 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-10 items-start">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.2em] text-primary-600">Cara Berlangganan</p>
                <h2 class="mt-3 text-3xl md:text-4xl font-black text-gray-950">Proses pasang internet dibuat sederhana.</h2>
                <p class="mt-4 text-lg text-gray-600 leading-relaxed">
                    Calon pelanggan cukup memilih paket, mengirim alamat, lalu admin membantu mengecek jaringan, jadwal pemasangan, dan biaya yang perlu disiapkan.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="rounded-xl border border-gray-200 bg-gray-50 p-5">
                    <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-primary-600 text-white font-black">1</span>
                    <h3 class="mt-4 text-lg font-black text-gray-950">Pilih paket</h3>
                    <p class="mt-2 text-sm text-gray-600">Tentukan kecepatan yang sesuai untuk rumah atau usaha kecil.</p>
                </div>
                <div class="rounded-xl border border-gray-200 bg-gray-50 p-5">
                    <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-primary-600 text-white font-black">2</span>
                    <h3 class="mt-4 text-lg font-black text-gray-950">Cek alamat</h3>
                    <p class="mt-2 text-sm text-gray-600">Kirim alamat lengkap dan patokan rumah lewat WhatsApp.</p>
                </div>
                <div class="rounded-xl border border-gray-200 bg-gray-50 p-5">
                    <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-primary-600 text-white font-black">3</span>
                    <h3 class="mt-4 text-lg font-black text-gray-950">Jadwal pasang</h3>
                    <p class="mt-2 text-sm text-gray-600">Admin cek coverage, konfirmasi biaya, lalu mengatur jadwal teknisi.</p>
                </div>
                <div class="rounded-xl border border-gray-200 bg-gray-50 p-5">
                    <span class="flex h-10 w-10 items-center justify-center rounded-lg bg-primary-600 text-white font-black">4</span>
                    <h3 class="mt-4 text-lg font-black text-gray-950">Internet aktif</h3>
                    <p class="mt-2 text-sm text-gray-600">Teknisi memasang perangkat dan koneksi siap dipakai.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Area Layanan & Cek Coverage --}}
<section class="py-14 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-6 rounded-2xl bg-gradient-to-br from-primary-700 to-primary-900 p-6 text-white md:grid-cols-[1fr_auto] md:items-center md:p-8">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.2em] text-primary-100">Area Layanan & Coverage</p>
                <h2 class="mt-3 text-3xl md:text-4xl font-black">Melayani Desa Bunde, Sampaga, dan sekitarnya.</h2>
                <p class="mt-3 max-w-3xl text-lg text-primary-100">
                    Kirim nama, alamat lengkap, patokan rumah, dan paket diminati. Admin akan mengecek ketersediaan jaringan dan membantu jadwal pemasangan.
                </p>
                @if($contact?->address)
                    <p class="mt-4 rounded-xl border border-white/20 bg-white/10 px-4 py-3 text-sm text-primary-50">
                        <span class="font-black text-white">Alamat layanan:</span> {{ $contact->address }}
                    </p>
                @endif
            </div>
            @if($contact)
                <a href="{{ route('wa.coverage') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center rounded-xl bg-green-500 px-6 py-4 font-bold text-white transition hover:bg-green-600">
                    @include('partials.whatsapp-icon', ['class' => 'w-6 h-6 mr-2 object-contain'])
                    Cek Coverage via WhatsApp
                </a>
            @endif
        </div>
    </div>
</section>

{{-- FAQ Ringkas --}}
@if($homeFaqs->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-10 lg:grid-cols-[0.8fr_1.2fr] lg:items-start">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.2em] text-primary-600">Pertanyaan Cepat</p>
                <h2 class="mt-3 text-3xl md:text-4xl font-black text-gray-950">Hal penting sebelum pasang internet.</h2>
                <p class="mt-4 text-lg leading-relaxed text-gray-600">
                    Jawaban singkat untuk hal yang paling sering ditanyakan calon pelanggan sebelum daftar.
                </p>
                <a href="{{ route('faq') }}" class="mt-6 inline-flex items-center justify-center rounded-xl bg-primary-600 px-5 py-3 font-bold text-white transition hover:bg-primary-700">
                    Lihat Semua FAQ
                </a>
            </div>
            <div class="space-y-4">
                @foreach($homeFaqs as $faq)
                    <article class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
                        <h3 class="text-lg font-black text-gray-950">{{ $faq->question }}</h3>
                        <p class="mt-2 leading-relaxed text-gray-600">{{ \Illuminate\Support\Str::limit(strip_tags($faq->answer), 170) }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

{{-- Testimoni --}}
@if($testimonials->count() > 0)
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Cerita Pelanggan</h2>
            <p class="text-xl text-gray-600">Bukti layanan dari pelanggan yang sudah menggunakan Arjuna Net.</p>
            @if($settings?->google_business_profile_url)
                <a href="{{ $settings->google_business_profile_url }}" target="_blank" rel="noopener noreferrer" class="mt-4 inline-flex items-center justify-center rounded-xl border border-gray-200 bg-white px-5 py-3 font-bold text-gray-800 transition hover:bg-gray-50">
                    Lihat Google Review
                </a>
            @endif
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

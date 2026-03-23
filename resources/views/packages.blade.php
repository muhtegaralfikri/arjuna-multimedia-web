@extends('layouts.app')

@section('content')
@php
    $page = \App\Models\Page::bySlug('package')->first();
    $packages = \App\Models\Package::active()->ordered()->get();
    $contact = \App\Models\Contact::getContact();
    $categories = ['home' => 'Rumah', 'business' => 'Bisnis'];
@endphp

@include('partials.hero-page', ['page' => $page])

{{-- Paket Section --}}
<section class="py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Filters --}}
        <div class="flex justify-center mb-8">
            <div class="inline-flex rounded-lg border border-gray-300 p-1">
                <button onclick="filterPackages('all')" class="category-btn active px-6 py-2 rounded-md text-sm font-medium transition" data-category="all">Semua</button>
                @foreach($categories as $key => $label)
                <button onclick="filterPackages('{{ $key }}')" class="category-btn px-6 py-2 rounded-md text-sm font-medium transition" data-category="{{ $key }}">{{ $label }}</button>
                @endforeach
            </div>
        </div>

        {{-- Package Cards --}}
        <div id="packages-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($packages as $package)
            <div class="package-card bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition" data-category="{{ $package->category }}">
                @if($package->is_popular)
                <div class="bg-primary-500 text-white text-center py-1 text-sm font-semibold">POPULER</div>
                @endif
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $package->name }}</h3>
                    <div class="mb-4">
                        <div class="flex items-baseline">
                            <span class="text-3xl font-bold text-primary-600">Rp {{ number_format($package->price_monthly, 0, ',', '.') }}</span>
                            <span class="text-gray-600 ml-1">/bulan</span>
                        </div>
                        @if($package->installation_fee > 0)
                        <p class="text-sm text-gray-500">Biaya pasang: Rp {{ number_format($package->installation_fee, 0, ',', '.') }}</p>
                        @endif
                    </div>
                    <div class="mb-4">
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-primary-100 text-primary-700">
                            {{ $package->speed }}
                        </span>
                        @if($package->quota)
                        <span class="ml-2 text-sm text-gray-600">{{ $package->quota }}</span>
                        @endif
                    </div>
                    @if($package->description)
                    <p class="text-gray-600 mb-4">{{ $package->description }}</p>
                    @endif
                    @if($package->features)
                    <ul class="mb-6 space-y-2 text-sm">
                        @foreach($package->features as $feature)
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
                    <a href="{{ $contact->whatsapp_link_for_package }}?text=Halo%20saya%20tertarik%20dengan%20{{ urlencode($package->name) }}" target="_blank" class="block w-full text-center px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition font-semibold">
                        Pesan Sekarang
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        @if($packages->isEmpty())
        <div class="text-center py-12">
            <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <p class="text-gray-600">Belum ada paket tersedia saat ini.</p>
        </div>
        @endif
    </div>
</section>

{{-- Info Tambahan --}}
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <h3 class="text-2xl font-bold text-center mb-8">Informasi Tambahan</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-xl">
                    <h4 class="font-semibold mb-2">📋 Ketentuan FUP</h4>
                    <p class="text-gray-600 text-sm">Untuk saat ini semua paket kami adalah Unlimited tanpa FUP (Fair Usage Policy).</p>
                </div>
                <div class="bg-white p-6 rounded-xl">
                    <h4 class="font-semibold mb-2">⏱️ Periode Berlangganan</h4>
                    <p class="text-gray-600 text-sm">Minimal berlangganan 1 bulan. Tidak ada kontrak jangka panjang.</p>
                </div>
                <div class="bg-white p-6 rounded-xl">
                    <h4 class="font-semibold mb-2">🔧 Waktu Pemasangan</h4>
                    <p class="text-gray-600 text-sm">1-3 hari kerja setelah konfirmasi pembayaran biaya pemasangan.</p>
                </div>
                <div class="bg-white p-6 rounded-xl">
                    <h4 class="font-semibold mb-2">💳 Cara Pembayaran</h4>
                    <p class="text-gray-600 text-sm">Transfer bank atau tunai. Pembayaran setiap tanggal 1-5 setiap bulan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function filterPackages(category) {
    const buttons = document.querySelectorAll('.category-btn');
    buttons.forEach(btn => {
        btn.classList.remove('active', 'bg-primary-600', 'text-white');
        btn.classList.add('text-gray-700');
    });

    event.target.classList.add('active', 'bg-primary-600', 'text-white');
    event.target.classList.remove('text-gray-700');

    const cards = document.querySelectorAll('.package-card');
    cards.forEach(card => {
        if (category === 'all' || card.dataset.category === category) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>
@endsection

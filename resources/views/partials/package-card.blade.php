@php
    $speedNumber = preg_replace('/[^0-9]/', '', $package->speed);
    $priceFormatted = number_format($package->price_monthly, 0, ',', '.');
    $priceRb = number_format($package->price_monthly / 1000, 0, ',', '.');
    $isPopular = $package->is_popular;
@endphp

<div class="group relative flex h-full flex-col rounded-3xl bg-white transition-all duration-300 hover:-translate-y-1.5 {{ $isPopular ? 'border-2 border-primary-500 shadow-xl shadow-primary-500/10 ring-4 ring-primary-500/10' : 'border border-gray-200/80 shadow-md hover:shadow-xl hover:border-primary-200' }} overflow-hidden">

    {{-- Top Highlight Badge (Populer) --}}
    @if($isPopular)
        <div class="bg-gradient-to-r from-primary-600 via-primary-500 to-indigo-600 px-4 py-1.5 text-center text-xs font-black uppercase tracking-wider text-white shadow-inner">
            <span class="inline-flex items-center gap-1.5">
                <svg class="h-4 w-4 text-amber-300 fill-amber-300" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                Paling Banyak Dipilih
            </span>
        </div>
    @endif

    <div class="p-6 md:p-7 flex h-full flex-col">
        {{-- Card Header --}}
        <div class="flex items-center justify-between gap-3">
            <h3 class="text-xl md:text-2xl font-black text-gray-900 tracking-tight">{{ $package->name }}</h3>
            <span class="inline-flex items-center rounded-full bg-emerald-50 px-3 py-1 text-xs font-extrabold text-emerald-700 ring-1 ring-inset ring-emerald-600/20">
                <span class="mr-1.5 h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                Tanpa FUP
            </span>
        </div>

        {{-- Speed Highlight Box --}}
        <div class="mt-5 rounded-2xl bg-gradient-to-br from-primary-600 via-primary-700 to-indigo-700 p-5 text-center text-white shadow-lg shadow-primary-600/20 relative overflow-hidden group-hover:scale-[1.02] transition-transform">
            <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-white/10 rounded-full blur-xl pointer-events-none"></div>
            <div class="absolute -left-6 -top-6 w-24 h-24 bg-white/10 rounded-full blur-xl pointer-events-none"></div>
            
            <p class="text-xs font-black uppercase tracking-widest text-primary-100">Kecepatan Internet</p>
            <div class="mt-1 flex items-baseline justify-center gap-1.5">
                <span class="text-6xl md:text-7xl font-black tracking-tight leading-none text-white drop-shadow-md">{{ $speedNumber }}</span>
                <span class="text-xl md:text-2xl font-black text-primary-100">Mbps</span>
            </div>
            <p class="mt-2 text-xs text-primary-100 font-bold">Unlimited Sepuasnya 24 Jam</p>
        </div>

        {{-- Pricing Section --}}
        <div class="mt-6 border-b border-gray-100 pb-5">
            <div class="flex items-baseline justify-between">
                <div>
                    <p class="text-xs font-extrabold uppercase tracking-wider text-gray-400">Biaya Bulanan</p>
                    <div class="mt-1 flex items-baseline gap-1">
                        <span class="text-sm font-bold text-gray-500">Rp</span>
                        <span class="text-3xl md:text-4xl font-black text-gray-950 tracking-tight">{{ $priceFormatted }}</span>
                        <span class="text-sm font-medium text-gray-500">/bln</span>
                    </div>
                </div>
            </div>
            @if($package->installation_fee)
                <div class="mt-2.5 flex items-center gap-1.5 text-xs text-gray-500 font-medium bg-gray-50 px-3 py-1.5 rounded-lg border border-gray-100/80">
                    <svg class="w-4 h-4 text-primary-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Pasang baru: <strong class="text-gray-700">Rp {{ number_format($package->installation_fee, 0, ',', '.') }}</strong></span>
                </div>
            @endif
        </div>



        {{-- Features List --}}
        @if($package->features && count($package->features) > 0)
            <div class="mt-5 mb-6 flex-grow">
                <p class="text-xs font-extrabold uppercase tracking-wider text-gray-400 mb-2.5">Keunggulan Paket</p>
                <ul class="space-y-2">
                    @foreach(array_slice($package->features, 0, 4) as $feature)
                        <li class="flex items-start text-xs md:text-sm text-gray-700">
                            <span class="mr-2.5 mt-0.5 flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                                <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            <span class="font-medium text-gray-800 leading-snug">{{ $feature }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <div class="mt-5 mb-6 flex-grow"></div>
        @endif

        {{-- CTA Button --}}
        <div class="mt-auto pt-2">
            @if(isset($contact) && $contact)
                <a href="{{ route('wa.package', $package->slug) }}" target="_blank" rel="noopener noreferrer" class="group/btn inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-emerald-500 to-green-600 px-5 py-3.5 text-sm font-black text-white shadow-md shadow-green-500/20 transition-all duration-200 hover:from-emerald-600 hover:to-green-700 hover:shadow-lg hover:shadow-green-500/30 active:scale-[0.98]">
                    @include('partials.whatsapp-icon', ['class' => 'w-5 h-5 object-contain flex-shrink-0 transition-transform group-hover/btn:scale-110'])
                    <span>Pesan {{ $package->speed }}</span>
                </a>
            @else
                <a href="{{ route('packages') }}#paket-list" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-primary-600 px-5 py-3.5 text-sm font-black text-white shadow-md shadow-primary-600/20 transition-all hover:bg-primary-700">
                    <span>Lihat Detail</span>
                </a>
            @endif
        </div>
    </div>
</div>

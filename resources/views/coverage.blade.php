@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-br from-primary-700 to-primary-900 text-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <div class="max-w-4xl">
            <p class="text-sm font-bold uppercase tracking-[0.2em] text-primary-100">Cek Coverage</p>
            <h1 class="mt-4 text-4xl md:text-5xl font-black tracking-tight text-white">
                Cek apakah alamat Anda bisa dipasang Arjuna Net.
            </h1>
            <p class="mt-5 text-lg text-primary-100 max-w-2xl">
                Kirim data alamat lengkap melalui WhatsApp agar admin bisa mengecek titik pemasangan dan jadwal penyambungan.
            </p>
        </div>
    </div>
</section>

<section class="bg-gray-50 py-14 md:py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-[1.05fr_0.95fr] gap-8 items-start">
            <div class="bg-white rounded-2xl border border-gray-200 p-6 md:p-8 shadow-sm">
                <h2 class="text-2xl md:text-3xl font-black text-gray-950">Data yang perlu dikirim</h2>
                <p class="mt-2 text-gray-600 leading-relaxed">
                    Tombol WhatsApp di bawah sudah menyiapkan format pesan. Anda tinggal melengkapi datanya di WhatsApp.
                </p>

                <div class="mt-6 space-y-3">
                    <div class="rounded-xl border border-gray-200 bg-gray-50 p-4">
                        <p class="text-sm font-bold uppercase tracking-wide text-gray-500">Nama</p>
                        <p class="mt-1 text-gray-800">Nama calon pelanggan yang bisa dihubungi.</p>
                    </div>
                    <div class="rounded-xl border border-gray-200 bg-gray-50 p-4">
                        <p class="text-sm font-bold uppercase tracking-wide text-gray-500">Alamat lengkap</p>
                        <p class="mt-1 text-gray-800">Desa, dusun/jalan, RT/RW jika ada, dan patokan rumah.</p>
                    </div>
                    <div class="rounded-xl border border-gray-200 bg-gray-50 p-4">
                        <p class="text-sm font-bold uppercase tracking-wide text-gray-500">Paket diminati</p>
                        <p class="mt-1 text-gray-800">Pilih salah satu paket agar admin bisa langsung memberi estimasi biaya.</p>
                    </div>
                </div>

                @if($contact)
                    <a href="{{ route('wa.coverage') }}" target="_blank" class="mt-7 inline-flex w-full items-center justify-center rounded-xl bg-green-500 px-6 py-4 font-bold text-white transition hover:bg-green-600">
                        @include('partials.whatsapp-icon', ['class' => 'w-6 h-6 mr-2 object-contain'])
                        Cek Coverage via WhatsApp
                    </a>
                @endif
            </div>

            <div class="space-y-5">
                <div class="rounded-2xl border border-primary-100 bg-white p-6 shadow-sm">
                    <h2 class="text-2xl font-black text-gray-950">Paket tersedia</h2>
                    <div class="mt-5 space-y-3">
                        @foreach($packages as $package)
                            <div class="flex items-center justify-between gap-4 rounded-xl bg-blue-50 px-4 py-3">
                                <div>
                                    <p class="font-black text-gray-950">{{ $package->name }}</p>
                                    <p class="text-sm text-gray-600">{{ $package->speed }}</p>
                                </div>
                                <p class="font-black text-primary-700">Rp {{ number_format($package->price_monthly / 1000, 0, ',', '.') }}RB</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="rounded-2xl border border-amber-200 bg-amber-50 p-6">
                    <h3 class="text-xl font-black text-amber-950">Catatan pemasangan</h3>
                    <p class="mt-2 text-amber-950 leading-relaxed">
                        Ketersediaan layanan bergantung pada jarak jaringan, kondisi jalur kabel, dan jadwal teknisi. Admin akan mengonfirmasi setelah data alamat dicek.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

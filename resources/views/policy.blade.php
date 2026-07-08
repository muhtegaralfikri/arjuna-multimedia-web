@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-br from-primary-700 to-primary-900 text-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <div class="max-w-4xl">
            <p class="text-sm font-bold uppercase tracking-[0.2em] text-primary-100">Ketentuan Layanan</p>
            <h1 class="mt-4 text-4xl md:text-5xl font-black tracking-tight text-white">
                Informasi biaya, pembayaran, dan perangkat.
            </h1>
            <p class="mt-5 text-lg text-primary-100 max-w-2xl">
                Halaman ini membantu pelanggan memahami ketentuan utama sebelum dan setelah berlangganan Arjuna Net.
            </p>
        </div>
    </div>
</section>

<section class="bg-gray-50 py-14 md:py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="rounded-2xl bg-white border border-gray-200 p-6 md:p-8 shadow-sm">
                <h2 class="text-2xl font-black text-gray-950">Biaya penyambungan</h2>
                <p class="mt-3 text-4xl font-black text-primary-700">Rp 300.000</p>
                <p class="mt-3 text-gray-600 leading-relaxed">Biaya awal pemasangan dibayarkan sesuai arahan admin saat titik pemasangan sudah dikonfirmasi.</p>
            </div>
            <div class="rounded-2xl bg-white border border-gray-200 p-6 md:p-8 shadow-sm">
                <h2 class="text-2xl font-black text-gray-950">Periode bayar</h2>
                <p class="mt-3 text-4xl font-black text-primary-700">2-20</p>
                <p class="mt-3 text-gray-600 leading-relaxed">Pembayaran bulanan dilakukan sebelum tanggal 20 untuk menghindari <span class="font-black text-red-600">isolir</span> layanan.</p>
            </div>
            <div class="rounded-2xl bg-white border border-gray-200 p-6 md:p-8 shadow-sm">
                <h2 class="text-2xl font-black text-gray-950">Perangkat modem</h2>
                <p class="mt-3 text-4xl font-black text-primary-700">Milik Arjuna Net</p>
                <p class="mt-3 text-gray-600 leading-relaxed">Perangkat yang terpasang akan diambil kembali apabila pelanggan tidak lagi berlangganan.</p>
            </div>
        </div>

        <div class="mt-8 grid grid-cols-1 lg:grid-cols-[1fr_0.85fr] gap-6 items-start">
            <div class="rounded-2xl bg-white border border-gray-200 p-6 md:p-8 shadow-sm">
                <h2 class="text-2xl md:text-3xl font-black text-gray-950">Ringkasan ketentuan</h2>
                <div class="mt-6 space-y-4">
                    <div class="flex gap-4">
                        <span class="mt-1 h-6 w-6 flex-shrink-0 rounded-full bg-green-100 text-green-700 flex items-center justify-center">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <p class="text-gray-700 leading-relaxed">Semua paket ditampilkan dengan harga bulanan, speed, dan biaya penyambungan agar pelanggan tidak bingung.</p>
                    </div>
                    <div class="flex gap-4">
                        <span class="mt-1 h-6 w-6 flex-shrink-0 rounded-full bg-green-100 text-green-700 flex items-center justify-center">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <p class="text-gray-700 leading-relaxed">Konfirmasi pembayaran dan pertanyaan tagihan dilakukan melalui kontak resmi Arjuna Net.</p>
                    </div>
                    <div class="flex gap-4">
                        <span class="mt-1 h-6 w-6 flex-shrink-0 rounded-full bg-green-100 text-green-700 flex items-center justify-center">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <p class="text-gray-700 leading-relaxed">Jika terjadi gangguan, pelanggan diarahkan melakukan pengecekan dasar terlebih dahulu sebelum laporan teknisi.</p>
                    </div>
                    <div class="flex gap-4">
                        <span class="mt-1 h-6 w-6 flex-shrink-0 rounded-full bg-green-100 text-green-700 flex items-center justify-center">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </span>
                        <p class="text-gray-700 leading-relaxed">Berhenti berlangganan perlu dikomunikasikan ke admin agar status layanan dan perangkat dapat ditangani.</p>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl bg-primary-700 p-6 md:p-8 text-white">
                <h2 class="text-2xl font-black">Butuh penjelasan?</h2>
                <p class="mt-3 text-primary-100 leading-relaxed">
                    Hubungi admin untuk memastikan biaya, jadwal penyambungan, atau ketentuan layanan sesuai alamat Anda.
                </p>
                @if($contact)
                    <a href="{{ route('wa.general') }}" target="_blank" rel="noopener noreferrer" class="mt-6 inline-flex w-full items-center justify-center rounded-xl bg-green-500 px-6 py-4 font-bold text-white transition hover:bg-green-600">
                        @include('partials.whatsapp-icon', ['class' => 'w-6 h-6 mr-2 object-contain'])
                        Tanya Admin
                    </a>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

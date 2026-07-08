@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-br from-primary-700 to-primary-900 text-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <div class="max-w-4xl">
            <p class="text-sm font-bold uppercase tracking-[0.2em] text-primary-100">Bantuan Layanan</p>
            <h1 class="mt-4 text-4xl md:text-5xl font-black tracking-tight text-white">
                Gangguan internet? Ikuti pengecekan dasar dulu.
            </h1>
            <p class="mt-5 text-lg text-primary-100 max-w-2xl">
                Langkah ini membantu memastikan kendala sederhana bisa selesai lebih cepat sebelum teknisi melakukan pengecekan lanjutan.
            </p>
        </div>
    </div>
</section>

<section class="bg-white py-14 md:py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">
            <div class="rounded-2xl border border-green-200 bg-green-50 p-5">
                <span class="w-12 h-12 rounded-full bg-green-600 text-white flex items-center justify-center text-2xl font-black">1</span>
                <h2 class="mt-4 text-xl font-black text-green-950">Cek modem/ONT</h2>
                <p class="mt-3 text-green-950 font-semibold">Pastikan lampu indikator router normal dan berwarna hijau.</p>
            </div>
            <div class="rounded-2xl border border-blue-200 bg-blue-50 p-5">
                <span class="w-12 h-12 rounded-full bg-blue-700 text-white flex items-center justify-center text-2xl font-black">2</span>
                <h2 class="mt-4 text-xl font-black text-blue-950">Restart modem</h2>
                <p class="mt-3 text-blue-950 font-semibold">Cabut adaptor router selama 2-3 menit, lalu nyalakan kembali.</p>
            </div>
            <div class="rounded-2xl border border-orange-200 bg-orange-50 p-5">
                <span class="w-12 h-12 rounded-full bg-orange-600 text-white flex items-center justify-center text-2xl font-black">3</span>
                <h2 class="mt-4 text-xl font-black text-orange-950">Cek kabel</h2>
                <p class="mt-3 text-orange-950 font-semibold">Pastikan kabel dan adaptor tidak longgar, rusak, atau terlepas.</p>
            </div>
            <div class="rounded-2xl border border-purple-200 bg-purple-50 p-5">
                <span class="w-12 h-12 rounded-full bg-purple-700 text-white flex items-center justify-center text-2xl font-black">4</span>
                <h2 class="mt-4 text-xl font-black text-purple-950">Hubungi teknisi</h2>
                <p class="mt-3 text-purple-950 font-semibold">Jika masih bermasalah, kirim detail kendala ke WhatsApp admin.</p>
            </div>
        </div>

        <div class="mt-8 grid grid-cols-1 lg:grid-cols-[1fr_0.8fr] gap-6 items-start">
            <div class="rounded-2xl border border-gray-200 bg-gray-50 p-6 md:p-8">
                <h2 class="text-2xl md:text-3xl font-black text-gray-950">Informasi yang membantu teknisi</h2>
                <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="rounded-xl bg-white border border-gray-200 p-4">
                        <p class="font-bold text-gray-950">Nama pelanggan</p>
                        <p class="mt-1 text-sm text-gray-600">Agar admin bisa mencari data layanan.</p>
                    </div>
                    <div class="rounded-xl bg-white border border-gray-200 p-4">
                        <p class="font-bold text-gray-950">Alamat pemasangan</p>
                        <p class="mt-1 text-sm text-gray-600">Bantu teknisi menentukan titik pengecekan.</p>
                    </div>
                    <div class="rounded-xl bg-white border border-gray-200 p-4">
                        <p class="font-bold text-gray-950">Lampu modem/ONT</p>
                        <p class="mt-1 text-sm text-gray-600">Sebutkan lampu merah, hijau, mati, atau berkedip.</p>
                    </div>
                    <div class="rounded-xl bg-white border border-gray-200 p-4">
                        <p class="font-bold text-gray-950">Kendala utama</p>
                        <p class="mt-1 text-sm text-gray-600">Contoh: lambat, putus-putus, atau tidak konek.</p>
                    </div>
                </div>
            </div>

            @if($contact)
            <div class="rounded-2xl bg-primary-700 p-6 md:p-8 text-white">
                <h2 class="text-2xl font-black">Masih gangguan?</h2>
                <p class="mt-3 text-primary-100 leading-relaxed">
                    Gunakan tombol ini setelah pengecekan dasar dilakukan. Pesan WhatsApp sudah disiapkan agar data kendala lebih lengkap.
                </p>
                <a href="{{ route('wa.support') }}" target="_blank" class="mt-6 inline-flex w-full items-center justify-center rounded-xl bg-green-500 px-6 py-4 font-bold text-white transition hover:bg-green-600">
                    @include('partials.whatsapp-icon', ['class' => 'w-6 h-6 mr-2 object-contain'])
                    Laporkan Gangguan
                </a>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection

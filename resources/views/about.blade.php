@extends('layouts.app')

@section('content')
@php
    $page = \App\Models\Page::bySlug('about')->first();
    $settings = \App\Models\SiteSettings::getSettings();
    $contact = \App\Models\Contact::getContact();
@endphp

{{-- Hero --}}
<section class="bg-gradient-to-br from-primary-700 to-primary-900 text-white py-14 md:py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl">
            <p class="text-sm font-bold uppercase tracking-wide text-primary-100 mb-3">Tentang Arjuna Net</p>
            <h1 class="text-4xl md:text-5xl font-black leading-tight mb-5">
                Internet lokal yang dibangun untuk kebutuhan rumah, kantor, dan aktivitas harian.
            </h1>
            <p class="text-lg md:text-xl text-primary-100 leading-relaxed max-w-3xl">
                Arjuna Net menghadirkan layanan internet fiber dan wifi yang cepat, stabil, dan mudah dijangkau. Kami fokus pada koneksi yang jelas manfaatnya: streaming lancar, kerja online nyaman, belajar tanpa hambatan, dan komunikasi keluarga tetap tersambung.
            </p>
        </div>
    </div>
</section>

{{-- Profile --}}
<section class="py-14 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-[0.9fr_1.1fr] gap-12 items-start">
            <div>
                <h2 class="text-3xl md:text-4xl font-black text-gray-950 mb-5">Mengenal Arjuna Net</h2>
                <p class="text-lg text-gray-700 leading-relaxed">
                    Arjuna Net adalah penyedia layanan internet lokal yang mengutamakan koneksi stabil, harga masuk akal, dan komunikasi yang mudah. Kami memahami kebutuhan pelanggan tidak hanya soal cepat di angka, tetapi juga nyaman dipakai setiap hari.
                </p>
                <p class="mt-4 text-lg text-gray-700 leading-relaxed">
                    Layanan kami dirancang untuk penggunaan rumah dan usaha kecil: meeting online, sekolah daring, transaksi digital, streaming, gaming ringan, hingga kebutuhan beberapa perangkat dalam satu rumah.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="border border-gray-200 rounded-xl p-5">
                    <h3 class="text-lg font-black text-gray-950 mb-2">Koneksi Stabil</h3>
                    <p class="text-gray-600 leading-relaxed">Jaringan dipantau agar pengalaman internet tetap nyaman untuk aktivitas harian pelanggan.</p>
                </div>
                <div class="border border-gray-200 rounded-xl p-5">
                    <h3 class="text-lg font-black text-gray-950 mb-2">Harga Jelas</h3>
                    <p class="text-gray-600 leading-relaxed">Pilihan paket dibuat sederhana, mulai dari kebutuhan hemat sampai koneksi lebih kencang.</p>
                </div>
                <div class="border border-gray-200 rounded-xl p-5">
                    <h3 class="text-lg font-black text-gray-950 mb-2">Tanpa FUP</h3>
                    <p class="text-gray-600 leading-relaxed">Pelanggan dapat memakai internet tanpa batas kuota download dan upload bulanan.</p>
                </div>
                <div class="border border-gray-200 rounded-xl p-5">
                    <h3 class="text-lg font-black text-gray-950 mb-2">Support Lokal</h3>
                    <p class="text-gray-600 leading-relaxed">Bantuan lebih mudah dijangkau melalui WhatsApp untuk informasi paket dan kendala layanan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Service Promise --}}
<section class="py-14 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h2 class="text-3xl md:text-4xl font-black text-gray-950 mb-4">Yang Kami Utamakan</h2>
            <p class="text-lg text-gray-600">Internet yang baik harus mudah dipahami, mudah dihubungi, dan benar-benar terasa manfaatnya saat dipakai.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white border border-gray-200 rounded-xl p-6">
                <div class="w-12 h-12 rounded-lg bg-primary-100 text-primary-700 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-xl font-black text-gray-950 mb-2">Kecepatan yang Relevan</h3>
                <p class="text-gray-600 leading-relaxed">Setiap paket menampilkan Mbps dengan jelas agar pelanggan mudah memilih sesuai jumlah perangkat dan kebiasaan pemakaian.</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl p-6">
                <div class="w-12 h-12 rounded-lg bg-green-100 text-green-700 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
                <h3 class="text-xl font-black text-gray-950 mb-2">Informasi Transparan</h3>
                <p class="text-gray-600 leading-relaxed">Harga bulanan, biaya penyambungan, dan ketentuan layanan disampaikan sejak awal supaya pelanggan tidak bingung.</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl p-6">
                <div class="w-12 h-12 rounded-lg bg-amber-100 text-amber-700 flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-xl font-black text-gray-950 mb-2">Bantuan Saat Dibutuhkan</h3>
                <p class="text-gray-600 leading-relaxed">Jika terjadi kendala, pelanggan diarahkan ke langkah pengecekan dasar dan dapat menghubungi teknisi melalui kontak resmi.</p>
            </div>
        </div>
    </div>
</section>

{{-- Process --}}
<section class="py-14 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-[0.8fr_1.2fr] gap-10 items-start">
            <div>
                <h2 class="text-3xl md:text-4xl font-black text-gray-950 mb-4">Cara Berlangganan</h2>
                <p class="text-lg text-gray-600 leading-relaxed">Proses dibuat sederhana agar calon pelanggan bisa langsung memahami langkah berikutnya.</p>
            </div>
            <div class="space-y-4">
                <div class="flex gap-4 border border-gray-200 rounded-xl p-5">
                    <span class="w-10 h-10 rounded-lg bg-primary-600 text-white flex items-center justify-center font-black flex-shrink-0">1</span>
                    <div>
                        <h3 class="text-lg font-black text-gray-950">Pilih paket</h3>
                        <p class="text-gray-600 mt-1">Tentukan kecepatan internet yang paling sesuai dengan kebutuhan rumah atau usaha.</p>
                    </div>
                </div>
                <div class="flex gap-4 border border-gray-200 rounded-xl p-5">
                    <span class="w-10 h-10 rounded-lg bg-primary-600 text-white flex items-center justify-center font-black flex-shrink-0">2</span>
                    <div>
                        <h3 class="text-lg font-black text-gray-950">Hubungi admin</h3>
                        <p class="text-gray-600 mt-1">Kirim pesan melalui WhatsApp untuk menanyakan detail pemasangan, biaya, dan jadwal.</p>
                    </div>
                </div>
                <div class="flex gap-4 border border-gray-200 rounded-xl p-5">
                    <span class="w-10 h-10 rounded-lg bg-primary-600 text-white flex items-center justify-center font-black flex-shrink-0">3</span>
                    <div>
                        <h3 class="text-lg font-black text-gray-950">Pemasangan layanan</h3>
                        <p class="text-gray-600 mt-1">Tim akan membantu proses pemasangan perangkat dan memastikan koneksi siap digunakan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

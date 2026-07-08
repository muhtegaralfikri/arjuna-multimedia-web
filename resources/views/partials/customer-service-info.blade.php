@php
    $contact = $contact ?? \App\Models\Contact::getContact();
@endphp

<section class="py-14 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8 text-center">
            <p class="text-sm font-bold uppercase tracking-[0.2em] text-primary-600">Informasi Layanan</p>
            <h2 class="mt-3 text-3xl md:text-4xl font-black text-gray-950">Hal yang Perlu Diperhatikan</h2>
            <p class="mt-3 text-gray-600 max-w-2xl mx-auto">
                Ikuti langkah berikut apabila terjadi gangguan pada layanan internet Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">
            <div class="rounded-2xl border border-green-200 bg-green-50 p-5">
                <div class="flex items-center gap-3">
                    <span class="w-12 h-12 rounded-full bg-green-600 text-white flex items-center justify-center text-2xl font-black">1</span>
                    <h3 class="text-xl font-black text-green-900">Cek modem/ONT</h3>
                </div>
                <p class="mt-4 text-green-950 font-semibold">Pastikan lampu indikator router normal dan berwarna hijau.</p>
            </div>

            <div class="rounded-2xl border border-blue-200 bg-blue-50 p-5">
                <div class="flex items-center gap-3">
                    <span class="w-12 h-12 rounded-full bg-blue-700 text-white flex items-center justify-center text-2xl font-black">2</span>
                    <h3 class="text-xl font-black text-blue-950">Restart modem</h3>
                </div>
                <p class="mt-4 text-blue-950 font-semibold">Cabut adaptor router selama 2-3 menit, lalu nyalakan kembali untuk refresh koneksi.</p>
            </div>

            <div class="rounded-2xl border border-orange-200 bg-orange-50 p-5">
                <div class="flex items-center gap-3">
                    <span class="w-12 h-12 rounded-full bg-orange-600 text-white flex items-center justify-center text-2xl font-black">3</span>
                    <h3 class="text-xl font-black text-orange-950">Ganti password</h3>
                </div>
                <p class="mt-4 text-orange-950 font-semibold">Ganti password WiFi secara berkala untuk menghindari pembobolan.</p>
            </div>

            <div class="rounded-2xl border border-purple-200 bg-purple-50 p-5">
                <div class="flex items-center gap-3">
                    <span class="w-12 h-12 rounded-full bg-purple-700 text-white flex items-center justify-center text-2xl font-black">4</span>
                    <h3 class="text-xl font-black text-purple-950">Hubungi teknisi</h3>
                </div>
                <p class="mt-4 text-purple-950 font-semibold">Jika masih ada kendala, hubungi teknisi Arjuna Net untuk pengecekan.</p>
            </div>
        </div>

        <div class="mt-6 grid grid-cols-1 lg:grid-cols-3 gap-5">
            <div class="lg:col-span-2 rounded-2xl bg-white border border-gray-200 p-6">
                <h3 class="text-2xl font-black text-gray-950">Info Perangkat</h3>
                <p class="mt-3 text-gray-700 text-lg">
                    Perangkat modem yang terpasang di rumah pelanggan sepenuhnya milik <span class="font-black text-amber-500">Arjuna Net</span>. Apabila pelanggan sudah tidak berlangganan, perangkat akan kami ambil kembali.
                </p>
            </div>

            <div class="rounded-2xl bg-gray-50 border border-gray-200 p-6">
                <h3 class="text-2xl font-black text-gray-950">Periode Bayar</h3>
                <p class="mt-3 text-gray-700 text-lg">
                    Tanggal <span class="font-black text-primary-700">2-20</span>. Lakukan pembayaran sebelum tanggal 20 untuk menghindari isolir layanan.
                </p>
            </div>
        </div>

    </div>
</section>

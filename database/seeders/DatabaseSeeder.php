<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminUser;
use App\Models\Package;
use App\Models\Faq;
use App\Models\Contact;
use App\Models\Page;
use App\Models\SiteSettings;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin User
        AdminUser::create([
            'id' => Str::uuid(),
            'name' => 'Super Admin',
            'email' => 'admin@arjuna-multimedia.com',
            'password' => Hash::make('admin123'), // Change this!
            'role' => 'super_admin',
            'is_active' => true,
        ]);

        // Create Packages
        $packages = [
            [
                'name' => 'Paket 1',
                'slug' => 'paket-1',
                'speed' => '7 Mbps',
                'speed_value' => 7,
                'price_monthly' => 150000,
                'installation_fee' => 300000,
                'quota' => 'Unlimited',
                'description' => 'Paket hemat untuk kebutuhan internet harian.',
                'features' => ['Tanpa FUP', 'Speed stabil', 'Koneksi handal', 'Cocok untuk rumah'],
                'category' => 'home',
                'is_popular' => false,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Paket 2',
                'slug' => 'paket-2',
                'speed' => '10 Mbps',
                'speed_value' => 10,
                'price_monthly' => 200000,
                'installation_fee' => 300000,
                'quota' => 'Unlimited',
                'description' => 'Paket keluarga untuk streaming, belajar, dan bekerja.',
                'features' => ['Tanpa batas download', 'Tanpa batas upload', 'Meeting lancar', 'Koneksi handal'],
                'category' => 'home',
                'is_popular' => false,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Paket 3',
                'slug' => 'paket-3',
                'speed' => '15 Mbps',
                'speed_value' => 15,
                'price_monthly' => 250000,
                'installation_fee' => 300000,
                'quota' => 'Unlimited',
                'description' => 'Paket untuk rumah dan kantor kecil.',
                'features' => ['Tanpa FUP', 'Streaming lancar', 'Gaming lancar', 'Cocok untuk rumah & kantor'],
                'category' => 'home',
                'is_popular' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Paket 4',
                'slug' => 'paket-4',
                'speed' => '20 Mbps',
                'speed_value' => 20,
                'price_monthly' => 300000,
                'installation_fee' => 300000,
                'quota' => 'Unlimited',
                'description' => 'Paket kencang untuk aktivitas multi-perangkat.',
                'features' => ['Tanpa batas kuota', 'Streaming lancar', 'Gaming lancar', 'Meeting lancar'],
                'category' => 'home',
                'is_popular' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($packages as $package) {
            Package::create(array_merge($package, ['id' => Str::uuid()]));
        }

        // Create FAQs
        $faqs = [
            [
                'question' => 'Bagaimana cara daftar internet Arjuna Net?',
                'answer' => 'Anda bisa menghubungi kami via WhatsApp di nomor yang tertera di halaman kontak. Admin kami akan membantu proses pendaftaran dengan cepat dan mudah.',
                'category' => 'general',
                'sort_order' => 1,
            ],
            [
                'question' => 'Apa saja pilihan paket internet Arjuna Net?',
                'answer' => 'Pilihan paket internet Arjuna Net adalah Paket 1 7 Mbps Rp 150.000/bulan, Paket 2 10 Mbps Rp 200.000/bulan, Paket 3 15 Mbps Rp 250.000/bulan, dan Paket 4 20 Mbps Rp 300.000/bulan.',
                'category' => 'general',
                'sort_order' => 2,
            ],
            [
                'question' => 'Berapa biaya penyambungan?',
                'answer' => 'Biaya penyambungan internet Arjuna Net adalah Rp 300.000.',
                'category' => 'billing',
                'sort_order' => 3,
            ],
            [
                'question' => 'Berapa lama proses pemasangan?',
                'answer' => 'Proses pemasangan menyesuaikan ketersediaan teknisi dan kondisi titik pemasangan. Admin akan mengonfirmasi jadwal setelah data pelanggan dan area pemasangan dicek.',
                'category' => 'installation',
                'sort_order' => 4,
            ],
            [
                'question' => 'Apa yang harus dilakukan jika internet gangguan?',
                'answer' => 'Cek lampu indikator modem/ONT dan pastikan normal berwarna hijau. Jika masih bermasalah, cabut adaptor router selama 2-3 menit lalu nyalakan kembali. Jika kendala belum selesai, hubungi teknisi Arjuna Net.',
                'category' => 'technical',
                'sort_order' => 5,
            ],
            [
                'question' => 'Kapan periode pembayaran layanan?',
                'answer' => 'Periode pembayaran adalah tanggal 2 sampai 20 setiap bulan. Lakukan pembayaran sebelum tanggal 20 untuk menghindari isolir layanan.',
                'category' => 'billing',
                'sort_order' => 6,
            ],
            [
                'question' => 'Apakah ada batasan kuota (FUP)?',
                'answer' => 'Semua paket Arjuna Net tanpa FUP, tanpa batas download, dan tanpa batas upload.',
                'category' => 'technical',
                'sort_order' => 7,
            ],
            [
                'question' => 'Apakah modem menjadi milik pelanggan?',
                'answer' => 'Perangkat modem yang terpasang di rumah pelanggan sepenuhnya milik Arjuna Net. Jika pelanggan sudah tidak berlangganan, perangkat akan kami ambil kembali.',
                'category' => 'general',
                'sort_order' => 8,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create(array_merge($faq, ['id' => Str::uuid()]));
        }

        // Create Contact (singleton)
        Contact::create([
            'id' => Str::uuid(),
            'whatsapp_number' => '08972367999',
            'phone_number' => '081342785222',
            'email' => 'info@arjunanet.id',
            'address' => 'Desa Bunde, Kec. Sampaga',
            'google_maps_link' => 'https://maps.google.com/',
            'operating_hours' => 'Senin - Minggu: 08:00 - 20:00',
        ]);

        // Create Pages
        $pages = [
            [
                'slug' => 'home',
                'title' => 'Beranda',
                'hero_title' => 'Internet Kencang, Bebas FUP',
                'hero_subtitle' => 'Paket internet Arjuna Net mulai Rp 150 ribu per bulan. Tanpa batas kuota, tanpa batas download, dan tanpa batas upload.',
                'meta_title' => 'Arjuna Net - Internet Kencang Bebas FUP',
                'meta_description' => 'Paket internet Arjuna Net mulai Rp 150.000/bulan. Speed stabil, koneksi handal, tanpa FUP.',
            ],
            [
                'slug' => 'about',
                'title' => 'Tentang Kami',
                'hero_title' => 'Tentang Arjuna Net',
                'hero_subtitle' => 'Mengenal lebih dekat penyedia internet lokal terpercaya',
                'meta_title' => 'Tentang Arjuna Net',
                'meta_description' => 'Mengenal lebih dekat Arjuna Net - penyedia layanan internet lokal terpercaya untuk rumah dan usaha kecil.',
            ],
            [
                'slug' => 'package',
                'title' => 'Paket Internet',
                'hero_title' => 'Paket Internet Bebas FUP',
                'hero_subtitle' => 'Internet kencang, bebas batas kuota untuk rumah dan kantor',
                'meta_title' => 'Paket Internet Arjuna Net',
                'meta_description' => 'Paket internet Arjuna Net 7 Mbps, 10 Mbps, 15 Mbps, dan 20 Mbps. Mulai Rp 150.000/bulan tanpa FUP.',
            ],
            [
                'slug' => 'contact',
                'title' => 'Kontak',
                'hero_title' => 'Hubungi Kami',
                'hero_subtitle' => 'Kami siap membantu Anda',
                'meta_title' => 'Hubungi Arjuna Net',
                'meta_description' => 'Hubungi kami untuk pemasangan internet baru atau pertanyaan lainnya. WhatsApp dan telepon tersedia.',
            ],
            [
                'slug' => 'faq',
                'title' => 'FAQ',
                'hero_title' => 'Pertanyaan yang Sering Diajukan',
                'hero_subtitle' => 'Jawaban untuk pertanyaan umum',
                'meta_title' => 'FAQ - Arjuna Net',
                'meta_description' => 'Pertanyaan yang sering diajukan tentang layanan internet Arjuna Net.',
            ],
        ];

        foreach ($pages as $page) {
            Page::create(array_merge($page, ['id' => Str::uuid()]));
        }

        // Create Site Settings (singleton)
        SiteSettings::create([
            'id' => Str::uuid(),
            'site_name' => 'Arjuna Net',
            'site_url' => 'https://arjuna-multimedia.com',
            'logo_url' => 'logo.png',
            'favicon_url' => 'favicon.ico',
            'brand_color_primary' => '#2563EB',
            'brand_color_secondary' => '#1E40AF',
        ]);
    }
}

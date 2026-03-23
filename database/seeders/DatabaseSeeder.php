<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminUser;
use App\Models\Package;
use App\Models\ServiceArea;
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
                'name' => 'Paket Basic',
                'slug' => 'paket-basic',
                'speed' => '10 Mbps',
                'speed_value' => 10,
                'price_monthly' => 150000,
                'installation_fee' => 100000,
                'quota' => 'Unlimited',
                'description' => 'Paket terjangkau untuk penggunaan harian',
                'features' => ['YouTube SD', 'Browsing', 'Chat', 'Social Media'],
                'category' => 'home',
                'is_popular' => false,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Paket Family',
                'slug' => 'paket-family',
                'speed' => '20 Mbps',
                'speed_value' => 20,
                'price_monthly' => 250000,
                'installation_fee' => 100000,
                'quota' => 'Unlimited',
                'description' => 'Cocok untuk keluarga dengan 2-4 perangkat',
                'features' => ['YouTube HD', 'Zoom Meeting', 'Social Media', 'Streaming'],
                'category' => 'home',
                'is_popular' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Paket Gaming',
                'slug' => 'paket-gaming',
                'speed' => '50 Mbps',
                'speed_value' => 50,
                'price_monthly' => 400000,
                'installation_fee' => 150000,
                'quota' => 'Unlimited',
                'description' => 'Untuk gamer dan streaming',
                'features' => ['Gaming Low Ping', 'Streaming HD', 'Multi-device', 'Prioritas Support'],
                'category' => 'home',
                'is_popular' => false,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Paket Bisnis',
                'slug' => 'paket-bisnis',
                'speed' => '100 Mbps',
                'speed_value' => 100,
                'price_monthly' => 600000,
                'installation_fee' => 200000,
                'quota' => 'Unlimited',
                'description' => 'Untuk kebutuhan kantor dan usaha',
                'features' => ['Static IP (opsional)', 'Prioritas Support', 'Backup Connection', 'SLA Guarantee'],
                'category' => 'business',
                'is_popular' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($packages as $package) {
            Package::create(array_merge($package, ['id' => Str::uuid()]));
        }

        // Create Service Areas
        $areas = [
            [
                'name' => 'Desa Sukamaju',
                'slug' => 'desa-sukamaju',
                'description' => 'Area Desa Sukamaju RT 01-10',
                'status' => 'available',
                'coverage_detail' => 'RT 01-10',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Desa Sukamaju Baru',
                'slug' => 'desa-sukamaju-baru',
                'description' => 'Area perumahan baru',
                'status' => 'coming_soon',
                'coverage_detail' => 'RT 01-05',
                'estimated_available' => now()->addMonths(2),
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Kelurahan Harapan',
                'slug' => 'kelurahan-harapan',
                'description' => 'Area kelurahan',
                'status' => 'available',
                'coverage_detail' => 'RW 01-03',
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($areas as $area) {
            ServiceArea::create(array_merge($area, ['id' => Str::uuid()]));
        }

        // Create FAQs
        $faqs = [
            [
                'question' => 'Bagaimana cara daftar internet Arjuna Multimedia?',
                'answer' => 'Anda bisa menghubungi kami via WhatsApp di nomor yang tertera di halaman kontak. Admin kami akan membantu proses pendaftaran dengan cepat dan mudah.',
                'category' => 'general',
                'sort_order' => 1,
            ],
            [
                'question' => 'Berapa biaya pemasangan?',
                'answer' => 'Biaya pemasangan bervariasi tergantung paket, mulai dari Rp 100.000. Detail biaya tertera di setiap paket internet yang kami tawarkan.',
                'category' => 'billing',
                'sort_order' => 2,
            ],
            [
                'question' => 'Berapa lama proses pemasangan?',
                'answer' => 'Proses pemasangan biasanya memakan waktu 1-3 hari kerja setelah konfirmasi pembayaran biaya pemasangan. Tim kami akan menjadwalkan kunjungan sesuai ketersediaan.',
                'category' => 'installation',
                'sort_order' => 3,
            ],
            [
                'question' => 'Bagaimana jika internet gangguan?',
                'answer' => 'Anda bisa menghubungi support kami via WhatsApp atau telepon yang tersedia di halaman kontak. Tim kami akan merespons dan membantu menyelesaikan masalah secepat mungkin.',
                'category' => 'technical',
                'sort_order' => 4,
            ],
            [
                'question' => 'Kapan waktu pembayaran?',
                'answer' => 'Pembayaran dilakukan setiap tanggal 1-5 setiap bulan. Anda bisa transfer ke rekening yang kami berikan atau bayar langsung ke kantor kami.',
                'category' => 'billing',
                'sort_order' => 5,
            ],
            [
                'question' => 'Apakah ada batasan kuota (FUP)?',
                'answer' => 'Untuk saat ini semua paket kami adalah Unlimited tanpa FUP (Fair Usage Policy). Anda bisa browsing sepuasnya tanpa khawatir kecepatan turun.',
                'category' => 'technical',
                'sort_order' => 6,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create(array_merge($faq, ['id' => Str::uuid()]));
        }

        // Create Contact (singleton)
        Contact::create([
            'id' => Str::uuid(),
            'whatsapp_number' => '6281234567890', // Ganti dengan nomor asli
            'phone_number' => '02112345678',
            'email' => 'info@arjuna-multimedia.com',
            'address' => 'Jl. Contoh No. 123, Kec. Contoh, Kab. Contoh',
            'google_maps_link' => 'https://maps.google.com/',
            'operating_hours' => 'Senin - Minggu: 08:00 - 20:00',
        ]);

        // Create Pages
        $pages = [
            [
                'slug' => 'home',
                'title' => 'Beranda',
                'hero_title' => 'Internet Cepat & Stabil untuk Area Perkampungan',
                'hero_subtitle' => 'Nikmati internet berkualitas dengan harga terjangkau. Langganan sekarang!',
                'meta_title' => 'Arjuna Multimedia - Internet Lokal Cepat & Stabil',
                'meta_description' => 'Layanan internet lokal untuk area perkampungan. Cepat, stabil, dan terjangkau. Paket mulai Rp 150.000/bulan.',
            ],
            [
                'slug' => 'about',
                'title' => 'Tentang Kami',
                'hero_title' => 'Tentang Arjuna Multimedia',
                'hero_subtitle' => 'Mengenal lebih dekat penyedia internet lokal terpercaya',
                'meta_title' => 'Tentang Arjuna Multimedia',
                'meta_description' => 'Mengenal lebih dekat Arjuna Multimedia - penyedia layanan internet lokal terpercaya untuk area perkampungan.',
            ],
            [
                'slug' => 'package',
                'title' => 'Paket Internet',
                'hero_title' => 'Pilihan Paket Internet',
                'hero_subtitle' => 'Pilih paket yang sesuai dengan kebutuhan Anda',
                'meta_title' => 'Paket Internet Arjuna Multimedia',
                'meta_description' => 'Pilihan paket internet terjangkau untuk kebutuhan rumah dan bisnis Anda. Mulai Rp 150.000/bulan.',
            ],
            [
                'slug' => 'area',
                'title' => 'Area Layanan',
                'hero_title' => 'Area Layanan Kami',
                'hero_subtitle' => 'Cek apakah area Anda sudah tercover',
                'meta_title' => 'Area Layanan Arjuna Multimedia',
                'meta_description' => 'Cek apakah area Anda sudah tercover layanan internet Arjuna Multimedia. Terus meluas!',
            ],
            [
                'slug' => 'contact',
                'title' => 'Kontak',
                'hero_title' => 'Hubungi Kami',
                'hero_subtitle' => 'Kami siap membantu Anda',
                'meta_title' => 'Hubungi Arjuna Multimedia',
                'meta_description' => 'Hubungi kami untuk pemasangan internet baru atau pertanyaan lainnya. WhatsApp dan telepon tersedia.',
            ],
            [
                'slug' => 'faq',
                'title' => 'FAQ',
                'hero_title' => 'Pertanyaan yang Sering Diajukan',
                'hero_subtitle' => 'Jawaban untuk pertanyaan umum',
                'meta_title' => 'FAQ - Arjuna Multimedia',
                'meta_description' => 'Pertanyaan yang sering diajukan tentang layanan internet Arjuna Multimedia.',
            ],
        ];

        foreach ($pages as $page) {
            Page::create(array_merge($page, ['id' => Str::uuid()]));
        }

        // Create Site Settings (singleton)
        SiteSettings::create([
            'id' => Str::uuid(),
            'site_name' => 'Arjuna Multimedia',
            'site_url' => 'https://arjuna-multimedia.com',
            'brand_color_primary' => '#2563EB',
            'brand_color_secondary' => '#1E40AF',
        ]);
    }
}

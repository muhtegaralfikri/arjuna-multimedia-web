<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InitialDataSeeder extends Seeder
{
    public function run(): void
    {
        // Insert default contact
        if (DB::table('contacts')->count() === 0) {
            DB::table('contacts')->insert([
                'id' => Str::uuid()->toString(),
                'whatsapp_number' => '6281234567890',
                'phone_number' => '081234567890',
                'email' => 'info@arjunamultimedia.com',
                'address' => 'Jalan Internet No. 123, Indonesia',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $this->command('✅ Default contact created');
        }

        // Insert default pages
        $pages = [
            [
                'home' => [
                    'title' => 'Beranda',
                    'hero_title' => 'Selamat Datang di Arjuna Net',
                    'hero_subtitle' => 'Internet cepat dan terjangkau untuk Anda',
                    'content' => '<p>Selamat datang di website resmi Arjuna Net. Kami menyediakan layanan internet berkualitas dengan harga terjangkau.</p>',
                ],
                'about' => [
                    'title' => 'Tentang Kami',
                    'hero_title' => 'Tentang Kami',
                    'hero_subtitle' => 'Mengenal lebih dekat Arjuna Net',
                    'content' => '<h2>Visi Kami</h2><p>Menjadi penyedia layanan internet terpercaya yang menghubungkan masyarakat dengan dunia digital.</p><h2>Misi Kami</h2><ul><li>Memberikan layanan internet cepat dan stabil</li><li>Harga terjangkau untuk semua kalangan</li><li>Layanan pelanggan yang responsif</li><li>Teknologi terkini dan handal</li></ul>',
                ],
                'package' => [
                    'title' => 'Paket Internet',
                    'hero_title' => 'Paket Internet Kami',
                    'hero_subtitle' => 'Pilihan paket internet terbaik untuk kebutuhan Anda',
                    'content' => '<p>Pilih paket internet yang sesuai dengan kebutuhan dan budget Anda.</p>',
                ],
                'area' => [
                    'title' => 'Area Layanan',
                    'hero_title' => 'Area Cakupan Kami',
                    'hero_subtitle' => 'Kami melayani berbagai area di Indonesia',
                    'content' => '<p>Layanan kami tersedia di berbagai area. Cek apakah lokasi Anda sudah tercover.</p>',
                ],
                'faq' => [
                    'title' => 'FAQ',
                    'hero_title' => 'Pertanyaan Umum',
                    'hero_subtitle' => 'Jawaban untuk pertanyaan yang sering diajukan',
                    'content' => '<p>Temukan jawaban untuk pertanyaan umum seputar layanan kami.</p>',
                ],
                'contact' => [
                    'title' => 'Hubungi Kami',
                    'hero_title' => 'Jangan ragu untuk menghubungi kami',
                    'hero_subtitle' => 'Informasi kontak lengkap',
                    'content' => '<p>Hubungi kami untuk informasi lebih lanjut.</p>',
                ],
            ],
        ];

        foreach ($pages as $slug => $data) {
            $exists = DB::table('pages')->where('slug', $slug)->first();
            if (!$exists) {
                DB::table('pages')->insert([
                    'id' => Str::uuid()->toString(),
                    'slug' => $slug,
                    'title' => $data['title'],
                    'hero_title' => $data['hero_title'],
                    'hero_subtitle' => $data['hero_subtitle'],
                    'content' => $data['content'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $this->command("✅ Page '{$slug}' created");
            }
        }

        $this->command('✅ Initial data seeding completed!');
    }
}

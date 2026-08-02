<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InitialDataSeeder extends Seeder
{
    public function run(): void
    {
        if (DB::table('contacts')->count() === 0) {
            DB::table('contacts')->insert([
                'whatsapp_number' => '08972367999',
                'phone_number' => '081342785222',
                'email' => 'info@arjunanet.id',
                'address' => 'Desa Bunde, Kec. Sampaga',
                'operating_hours' => 'Senin - Minggu: 08:00 - 20:00',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $this->command?->info('Default contact created');
        }

        $pages = [
            [
                'slug' => 'home',
                'title' => 'Beranda',
                'hero_title' => 'Internet Kencang, Bebas FUP',
                'hero_subtitle' => 'Paket internet Arjuna Net mulai Rp 150 ribu per bulan.',
            ],
            [
                'slug' => 'about',
                'title' => 'Tentang Kami',
                'hero_title' => 'Tentang Arjuna Net',
                'hero_subtitle' => 'Internet lokal untuk kebutuhan rumah, kantor, dan aktivitas harian.',
            ],
            [
                'slug' => 'package',
                'title' => 'Paket Internet',
                'hero_title' => 'Paket Internet Bebas FUP',
                'hero_subtitle' => 'Internet kencang, bebas batas kuota untuk rumah dan kantor.',
            ],
            [
                'slug' => 'faq',
                'title' => 'FAQ',
                'hero_title' => 'Pertanyaan Umum',
                'hero_subtitle' => 'Jawaban untuk pertanyaan yang sering diajukan.',
            ],
            [
                'slug' => 'contact',
                'title' => 'Hubungi Kami',
                'hero_title' => 'Hubungi Arjuna Net',
                'hero_subtitle' => 'Informasi kontak resmi Arjuna Net.',
            ],
        ];

        foreach ($pages as $page) {
            if (DB::table('pages')->where('slug', $page['slug'])->exists()) {
                continue;
            }

            DB::table('pages')->insert([
                'slug' => $page['slug'],
                'title' => $page['title'],
                'hero_title' => $page['hero_title'],
                'hero_subtitle' => $page['hero_subtitle'],
                'content' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $this->command?->info("Page '{$page['slug']}' created");
        }

        $this->command?->info('Initial data seeding completed');
    }
}

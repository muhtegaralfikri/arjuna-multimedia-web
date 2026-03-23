# Arjuna Multimedia - Website & CMS

Website profil perusahaan dan sistem manajemen konten (CMS) untuk **Arjuna Multimedia**, penyedia layanan internet (ISP) yang melayani area perumahan dan perkampungan.

## ![Laravel](https://img.shields.io/badge/Laravel-10.10-FF2D20?style=flat&logo=laravel) ![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php) ![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=flat&logo=mysql) ![Tailwind CSS](https://img.shields.io/badge/Tailwind-3.x-38B2AC?style=flat&logo=tailwind-css)

## Fitur Utama

### Website Publik
- **Profil Perusahaan** - Halaman beranda dengan hero section dan highlight layanan
- **Daftar Paket Internet** - Menampilkan berbagai paket internet dengan kecepatan, harga, dan fitur
- **Area Layanan** - Menampilkan jangkauan area dengan status ketersediaan
- **FAQ** - Pertanyaan yang sering diajukan tentang layanan
- **Kontak & Informasi** - Integrasi WhatsApp, telepon, email, dan jam operasional
- **Formulir Minat** - Formulir untuk customer yang tertarik berlangganan
- **SEO Friendly** - Meta tags kustom, Open Graph, sitemap, dan robots.txt
- **Responsive Design** - Tampilan mobile-friendly dengan floating WhatsApp button

### Admin CMS
- **Dashboard** - Ringkasan statistik website
- **Manajemen Paket** - Tambah, edit, hapus paket internet
- **Manajemen Area** - Kelola area layanan dengan status ketersediaan
- **Manajemen FAQ** - Buat dan kelola pertanyaan umum
- **Pengaturan Kontak** - Update informasi kontak dan link media sosial
- **Manajemen Halaman** - Edit konten halaman melalui sistem slug
- **Formulir Masukan** - Lihat dan kelola inquiry customer
- **Pengaturan Website** - Konfigurasi nama situs, warna, logo, Google Analytics, dll
- **Log Aktivitas** - Trek aksi dan perubahan admin
- **Role-based Access** - Hak akses berbeda untuk admin (super_admin, editor, viewer)

## Teknologi yang Digunakan

### Backend
- **Laravel 10.10** - PHP Framework
- **MySQL 8.0+** - Database
- **Eloquent ORM** - Database interactions
- **UUID Primary Keys** - Untuk semua model
- **Laravel Vite** - Asset compilation

### Frontend
- **Blade Template** - PHP templating engine
- **Tailwind CSS 3.x** - Utility-first CSS framework
- **Bootstrap 5** - UI components tambahan
- **Alpine.js** - Reactive UI components
- **Vite** - Build tool & dev server
- **Inter Font** - Typography dari Google Fonts

## Persyaratan Sistem

- PHP >= 8.2
- MySQL >= 8.0
- Node.js >= 18
- Composer
- NPM atau Yarn

## Instalasi

1. **Clone repository**
   ```bash
   git clone https://github.com/muhtegaralfikri/arjuna-multimedia-web.git
   cd arjuna-multimedia-web
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

   Edit `.env` dan sesuaikan:
   ```env
   DB_HOST=localhost
   DB_DATABASE=arjuna_multimedia
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

4. **Jalankan migrasi database**
   ```bash
   php artisan migrate --seed
   ```

5. **Build assets**
   ```bash
   npm run build
   ```

6. **Jalankan development server**
   ```bash
   php artisan serve
   ```

   Website akan tersedia di `http://localhost:8000`

## Struktur Proyek

```
arjuna-multimedia-web/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          # Admin controllers
│   │   └── Public/         # Public-facing controllers
│   └── Models/             # Eloquent models
├── database/
│   ├── migrations/         # Database migrations
│   └── seeders/            # Database seeders
├── resources/
│   ├── views/
│   │   ├── layouts/        # Master layouts
│   │   ├── admin/          # Admin panel views
│   │   └── public/         # Public pages
│   ├── js/                 # JavaScript files
│   └── css/                # CSS files
├── routes/
│   ├── web.php             # Public routes
│   └── api.php             # API routes
└── vite.config.js          # Vite configuration
```

## Routes

### Public Routes
- `/` - Beranda
- `/tentang` - Tentang Kami
- `/paket` - Paket Internet
- `/area` - Area Layanan
- `/faq` - FAQ
- `/kontak` - Kontak

### Admin Routes
- `/admin/login` - Login Admin
- `/admin/dashboard` - Dashboard
- `/admin/packages` - Manajemen Paket
- `/admin/areas` - Manajemen Area
- `/admin/faqs` - Manajemen FAQ
- `/admin/settings` - Pengaturan Website

## Deployment

Project ini menggunakan GitHub Actions untuk auto-deployment ke server via SSH. Lihat `.github/workflows/deploy.yml` untuk konfigurasi.

## Lisensi

Proyek ini adalah properti dari Arjuna Multimedia. Hak cipta dilindungi undang-undang.

## Dukungan

Untuk pertanyaan atau dukungan, hubungi:
- Email: info@arjunamultimedia.com
- WhatsApp: +62 812-3456-7890

---

Dibuat dengan :heart: menggunakan [Laravel](https://laravel.com)

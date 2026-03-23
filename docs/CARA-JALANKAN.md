# Cara Menjalankan Proyek Arjuna Multimedia Web

Dokumen ini menjelaskan langkah-langkah untuk menjalankan proyek Arjuna Multimedia Web di lokal.

---

## 📋 Prasyarat

Sebelum memulai, pastikan Anda sudah menginstal:
- PHP 8.3 atau lebih tinggi
- Composer
- Node.js & NPM
- Podman atau Docker
- Git (opsional)

---

## 🚀 Langkah-Langkah Menjalankan Proyek

### 1. Start Database (MariaDB via Podman)

Jalankan container MariaDB:

```bash
podman start arjuna-db
```

**Jika container belum ada, buat dulu:**

```bash
podman run --name arjuna-db \
  -e MYSQL_ROOT_PASSWORD=secret \
  -e MYSQL_DATABASE=arjuna_net \
  -p 3306:3306 \
  -d mariadb:10.6
```

**Untuk melihat status container:**

```bash
podman ps
```

**Untuk menghentikan database:**

```bash
podman stop arjuna-db
```

---

### 2. Install Dependencies

Install Composer dependencies:

```bash
composer install
```

Install NPM dependencies:

```bash
npm install
```

---

### 3. Setup Environment

Copy file environment example:

```bash
copy .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

**Verifikasi file `.env`:**

Pastikan konfigurasi database di `.env` sudah benar:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=arjuna_net
DB_USERNAME=root
DB_PASSWORD=secret
```

---

### 4. Run Migrations & Seed Data

Jalankan migration dan seeding:

```bash
php artisan migrate:fresh --seed
```

Ini akan:
- Membuat semua tabel database
- Mengisi data awal (admin user, packages, areas, FAQs, dll)

---

### 5. Build Assets

Build CSS dan JS assets:

```bash
npm run build
```

**Untuk development (dengan hot reload):**

```bash
npm run dev
```

---

### 6. Start Development Server

Jalankan Laravel development server:

```bash
php artisan serve
```

Server akan berjalan di: **http://127.0.0.1:8000**

**Atau dengan port khusus:**

```bash
php artisan serve --host=127.0.0.1 --port=8000
```

---

## 🌐 Akses Website

### Frontend (Publik)

| Halaman | URL |
|---------|-----|
| Beranda | http://127.0.0.1:8000/ |
| Tentang Kami | http://127.0.0.1:8000/tentang |
| Paket Internet | http://127.0.0.1:8000/paket |
| Area Layanan | http://127.0.0.1:8000/area |
| FAQ | http://127.0.0.1:8000/faq |
| Kontak | http://127.0.0.1:8000/kontak |

### Admin Panel

| Fitur | URL |
|-------|-----|
| Login Admin | http://127.0.0.1:8000/admin/login |
| Dashboard | http://127.0.0.1:8000/admin/dashboard |
| Kelola Paket | http://127.0.0.1:8000/admin/packages |
| Kelola Area | http://127.0.0.1:8000/admin/areas |
| Kelola FAQ | http://127.0.0.1:8000/admin/faqs |
| Kelola Kontak | http://127.0.0.1:8000/admin/contacts/edit |
| Kelola Halaman | http://127.0.0.1:8000/admin/pages |
| Pengaturan | http://127.0.0.1:8000/admin/settings/edit |
| Form Minat | http://127.0.0.1:8000/admin/forms |

### Kredensial Admin

Cek di file `database/seeders/AdminUserSeeder.php` untuk admin user yang telah di-seed.

Default (jika ada):
- **Email:** admin@arjuna-net.com
- **Password:** password

---

## 📝 Commands Berguna

### Clear Caches

```bash
# Clear semua caches
php artisan optimize:clear

# Atau clear satu per satu
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

### View Routes

```bash
# Lihat semua routes
php artisan route:list

# Lihat routes untuk admin saja
php artisan route:list --path=admin
```

### Cek Log Laravel

```bash
# Tail log file
tail -f storage/logs/laravel.log

# Atau view log
cat storage/logs/laravel.log
```

### Database Commands

```bash
# Run migration
php artisan migrate

# Rollback migration
php artisan migrate:rollback

# Reset dan ulangi migration
php artisan migrate:fresh

# Reset, ulangi, dan seed
php artisan migrate:fresh --seed
```

### Debug Mode

Untuk mengaktifkan debug mode, ubah di file `.env`:

```env
APP_DEBUG=true
```

Untuk production:

```env
APP_DEBUG=false
```

---

## 🔧 Troubleshooting

### Masalah: Database connection failed

**Solusi:**
1. Pastikan container MariaDB berjalan: `podman ps`
2. Cek koneksi di `.env` (host, port, username, password)
3. Restart container: `podman restart arjuna-db`

### Masalah: Permission denied

**Solusi:**
1. Pastikan folder `storage` dan `bootstrap/cache` writable:

```bash
# Windows
icacls storage /grant Everyone:F
icacls bootstrap/cache /grant Everyone:F
```

### Masalah: Assets not loading

**Solusi:**
1. Rebuild assets: `npm run build`
2. Clear caches: `php artisan optimize:clear`

### Masalah: 404 Not Found

**Solusi:**
1. Pastikan development server berjalan
2. Cek route: `php artisan route:list`
3. Clear route cache: `php artisan route:clear`

---

## 📦 Struktur Project

```
arjuna-multimedia-web/
├── app/                  # Aplikasi Laravel
│   ├── Http/Controllers/   # Controllers (frontend & admin)
│   ├── Models/             # Models database
│   ├── Middleware/         # Middleware (auth, admin, dll)
│   └── Providers/         # Service providers
├── config/               # Konfigurasi Laravel
├── database/             # Database migrations & seeders
├── public/              # File publik (index.php, assets)
├── resources/           # Views, CSS, JS
│   ├── views/           # Blade templates
│   │   ├── layouts/    # Layout templates
│   │   ├── partials/   # Partial views
│   │   └── admin/      # Admin panel views
│   ├── css/            # Tailwind CSS
│   └── js/             # JavaScript
├── routes/              # Routes (web.php, api.php)
├── storage/             # Storage (logs, cache, uploads)
├── .env                 # Environment variables
├── composer.json        # PHP dependencies
├── package.json         # Node.js dependencies
└── artisan              # Laravel CLI
```

---

## 🎯 Fitur Utama

### Frontend
- ✅ Responsive design (mobile, tablet, desktop)
- ✅ Navigasi dengan mobile hamburger menu
- ✅ Hero section di setiap halaman
- ✅ Paket internet dengan card layout
- ✅ Area layanan dengan status dan search
- ✅ FAQ dengan accordion dan kategori
- ✅ Form minat pemasangan
- ✅ WhatsApp integration dengan template pesan
- ✅ Google Maps integration
- ✅ Schema markup (LocalBusiness, FAQPage)
- ✅ SEO friendly (meta tags, canonical URL, sitemap, robots.txt)

### Admin Panel
- ✅ Authentication (Login, Logout, Session)
- ✅ Dashboard dengan summary cards
- ✅ Package Manager (CRUD)
- ✅ Area Manager (CRUD)
- ✅ FAQ Manager (CRUD)
- ✅ Contact Manager (Edit)
- ✅ Page Editor (Edit halaman & SEO)
- ✅ Settings Manager (Site settings, branding, analytics)
- ✅ Form Manager (View submissions, update status)

---

## 📚 Dokumentasi Lainnya

- [PRD](./PRD.md) - Product Requirements Document
- [PROGRESS](./PROGRESS.md) - Progress tracking
- [README](./README.md) - Project overview

---

## 🤝 Support

Jika mengalami masalah atau punya pertanyaan:

1. Cek file [PROGRESS.md](./PROGRESS.md) untuk status dan known issues
2. Lihat Laravel documentation: https://laravel.com/docs
3. Cek error log di `storage/logs/laravel.log`

---

**Last Updated:** 23 Maret 2026

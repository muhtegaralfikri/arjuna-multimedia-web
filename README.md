# Arjuna Net - Website & CMS Ringan

Website profil dan CMS ringan untuk Arjuna Net, penyedia layanan internet lokal. Fokus project ini adalah membantu calon pelanggan memahami paket, mengecek coverage, menghubungi admin via WhatsApp, dan mendapat bantuan gangguan dasar.

## Stack

- Laravel 10
- PHP 8.2+
- Blade template
- Tailwind CSS 3
- SQLite untuk development lokal
- MySQL untuk production jika dibutuhkan
- Vite hanya untuk build CSS

Project ini tidak membutuhkan Node/Vite berjalan terus saat development harian. Jalankan Node hanya saat perlu rebuild asset.

## Fitur Publik

- Beranda dengan highlight layanan dan paket internet
- Paket internet dinamis dari admin
- Cek coverage via WhatsApp dengan format pesan siap isi
- Bantuan gangguan internet
- Ketentuan layanan, pembayaran, dan perangkat
- FAQ
- Kontak WhatsApp, telepon, email, jam operasional, dan peta
- Testimoni pelanggan jika sudah diisi admin
- Sitemap dan robots.txt

## Fitur Admin

- Login admin
- Dashboard ringkas
- Manajemen paket internet
- Manajemen FAQ
- Manajemen testimoni
- Edit kontak
- Edit halaman
- Pengaturan website
- Tracking klik WhatsApp 30 hari terakhir
- Paket paling banyak diklik via WhatsApp

## Instalasi Lokal

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Gunakan SQLite untuk development ringan:

```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

Buat file database dan jalankan migration:

```powershell
New-Item -ItemType File -Path database/database.sqlite -Force
php artisan migrate --seed
```

Build CSS:

```bash
npm run build
```

Jalankan server:

```bash
php artisan serve
```

Website lokal tersedia di:

```text
http://127.0.0.1:8000
```

## Workflow Development Ringan

Untuk perubahan konten dari admin, cukup jalankan:

```bash
php artisan serve
```

Jika mengubah Blade atau class Tailwind yang belum masuk build, jalankan:

```bash
npm run build
```

Tidak perlu menjalankan `npm run dev` terus-menerus kecuali sedang mengerjakan styling interaktif secara aktif.

## Akun Admin Seed

```text
Email: admin@arjuna-multimedia.com
Password: admin123
```

Ganti password sebelum production.

## Route Utama

- `/` - Beranda
- `/tentang` - Tentang Kami
- `/paket` - Paket Internet
- `/cek-coverage` - Cek coverage pemasangan
- `/bantuan` - Bantuan gangguan internet
- `/ketentuan-layanan` - Ketentuan layanan
- `/faq` - FAQ
- `/kontak` - Kontak
- `/admin/login` - Login admin

## Catatan Maintenance

- Form minat publik sudah dipensiunkan karena alur utama diarahkan ke WhatsApp.
- Area layanan publik belum dipakai, sehingga kode area lama dipensiunkan.
- Sisa Filament sudah dihapus karena admin panel yang dipakai adalah Blade custom.
- Tracking WhatsApp dibuat ringan melalui redirect internal, bukan analytics berat.


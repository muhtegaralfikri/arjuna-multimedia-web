# PRD - Arjuna Multimedia (Versi Lengkap)
## Website Company Profile + CMS Admin untuk Layanan Internet Lokal

---

## Context

Dokumen ini adalah PRD (Product Requirements Document) lengkap untuk proyek website Arjuna Multimedia. PRD ini diperbarui dari versi sebelumnya dengan tambahan spesifikasi detail untuk SEO, struktur database CMS, dan constraints deployment spesifik (aaPanel pada VPS Ubuntu dengan resource terbatas).

Proyek ini bertujuan membuat website company profile sederhana untuk usaha layanan internet lokal di area perkampungan, dengan fokus pada:
- Mobile-first design
- SEO-friendly (termasuk local SEO)
- CMS admin sederhana untuk pengelolaan konten
- Deployment ringan pada VPS kecil

---

## 1. Judul Dokumen

**Product Requirements Document (PRD)**
**Nama Proyek:** Arjuna Multimedia Website & Admin CMS
**Versi Dokumen:** 2.0 (Updated)
**Tanggal:** 23 Maret 2026
**Status:** Draft - Pending Approval

---

## 2. Ringkasan Produk / Product Overview

| Atribut | Deskripsi |
|---------|-----------|
| **Nama Produk** | Arjuna Multimedia Website & Admin CMS |
| **Jenis Produk** | Company Profile Website dengan Admin CMS |
| **Kategori** | Layanan Internet / ISP Lokal |
| **Target Lokasi** | Area perkampungan |
| **Platform** | Web (Responsive: Mobile, Tablet, Desktop) |
| **Stack Teknologi** | TBD (dipilih berdasarkan constraints VPS) |
| **Deployment** | aaPanel pada VPS Ubuntu (2 vCPU, 2GB RAM, 15GB storage) |

### 2.1 Value Proposition

Arjuna Multimedia adalah platform web yang berfungsi sebagai:
1. **Identitas Resmi** - Keberadaan online kredibel untuk usaha layanan internet lokal
2. **Pusat Informasi** - Sumber informasi lengkap tentang paket, area layanan, dan kontak
3. **Pengarah Kontak** - Mengarahkan calon pelanggan untuk menghubungi via WhatsApp/Telepon
4. **CMS Mandiri** - Memungkinkan admin mengelola konten tanpa coding

### 2.2 Target Pengguna

| Segmen | Deskripsi |
|--------|-----------|
| **Primary** | Calon pelanggan internet di area perkampungan |
| **Secondary** | Admin internal yang mengelola website |

---

## 3. Latar Belakang / Background

### 3.1 Konteks Bisnis

Arjuna Multimedia adalah usaha layanan internet/WiFi skala lokal yang melayani area perkampungan. Berdasarkan observasi lapangan:

| Faktor | Detail |
|--------|--------|
| **Perilaku Calon Pelanggan** | Lebih sering menghubungi via WhatsApp, telepon, atau datang langsung |
| **Literasi Digital** | Terbatas, tidak terbiasa dengan sistem transaksi online kompleks |
| **Perangkat Utama** | Smartphone (Android) |
| **Kebutuhan Informasi** | Paket, harga, area jangkauan, cara hubungi |

### 3.2 Alasan Pembuatan Website

1. **Kredibilitas Bisnis** - Memiliki keberadaan online resmi yang dapat diverifikasi
2. **Efisiensi Informasi** - Mengurangi pertanyaan berulang tentang paket dan area
3. **Jangkauan Pemasaran** - Menjangkau calon pelanggan yang mencari layanan internet via Google
4. **Professional Image** - Membangun citra profesional untuk bisnis lokal
5. **Kemandirian Konten** - Admin dapat memperbarui informasi tanpa developer

### 3.3 Non-Goals

Website ini **BUKAN** untuk:
- Platform transaksi/pembayaran online
- Sistem billing otomatis
- Aplikasi mobile (Flutter/React Native)
- Portal pelanggan dengan login
- Integrasi real-time dengan jaringan
- Social media atau forum komunitas

---

## 4. Problem Statement

### 4.1 Masalah Utama

| # | Masalah | Dampak pada Bisnis | Tingkat Urgensi |
|---|--------|-------------------|----------------|
| 1 | Tidak ada keberadaan online resmi | Calon pelanggan sulit memverifikasi keberadaan usaha | Tinggi |
| 2 | Informasi paket/harga sering ditanyakan ulang | Waktu admin habis menjawab pertanyaan berulang | Tinggi |
| 3 | Area layanan tidak terdokumentasi jelas | Calon pelanggan ragu untuk menghubungi | Sedang |
| 4 | Tidak muncul di pencarian Google lokal | Kehilangan pelanggan ke kompetitor | Tinggi |
| 5 | Perubahan info sulit diperbarui | Informasi kadang usang/tidak up-to-date | Sedang |

---

## 5. Goals / Tujuan Produk

### 5.1 Goals Utama (Business Goals)

| Goal | Success Metric |
|------|----------------|
| Memberikan keberadaan online resmi dan kredibel | Website muncul di Google untuk brand keywords |
| Menyediakan informasi lengkap dan terkini | Bounce rate < 60%, avg session duration > 1 menit |
| Memfasilitasi komunikasi cepat | WhatsApp CTR > 20% dari visitor |
| Memudahkan admin mengelola konten | Admin dapat update konten tanpa developer |

### 5.2 Goals Teknis (Technical Goals)

| Goal | Target |
|------|--------|
| Mobile-first responsive | Tampilan optimal di 320px - 1920px |
| Loading time cepat | < 3 detik di jaringan 4G |
| SEO-friendly | Lighthouse SEO score > 80 |
| Ringan untuk VPS kecil | RAM usage < 512MB idle |

### 5.3 Goals Pengalaman Pengguna (UX Goals)

| Goal | Deskripsi |
|------|----------|
| Simpel | Navigasi tidak lebih dari 2 level |
| Cepat | Informasi ditemukan < 5 detik |
| Jelas | CTA WhatsApp/Telepon selalu visible |
| Ramah | Bahasa mudah dipahami, font readable |

---

## 6. Non-Goals / Out of Scope (MVP)

### 6.1 Out of Scope - MVP

| Fitur | Alasan | Roadmap |
|-------|--------|---------|
| Registrasi/pemesanan online | Calon pelanggan prefer WA/Telp | Post-MVP Phase 2 |
| Payment gateway | Tidak ada transaksi online | Post-MVP Phase 3 |
| User account pelanggan | Tidak diperlukan untuk company profile | - |
| Live chat widget | WhatsApp sudah mencukupi | - |
| Blog/Artikel | Bisa ditambahkan post-MVP | Post-MVP Phase 2 |
| Testimoni/Rating | Nice to have, bukan prioritas | Post-MVP Phase 2 |
| Aplikasi mobile (Flutter) | Di luar scope MVP | - |
| Billing system | Sistem terpisah | - |
| Integrasi jaringan real-time | Kompleksitas tinggi | - |
| Multi-language | Target lokal Indonesia | - |

---

## 7. User Persona

### 7.1 Calon Pelanggan - Primary Persona

**Nama:** Budi Santoso
**Archetype:** Pencari Praktis

**Demografi:**
- Usia: 25-45 tahun
- Lokasi: Tinggal di area perkampungan/desa
- Pendidikan: SMA - S1
- Pekerjaan: Wiraswasta, PNS, Guru, Ibu Rumah Tangga

**Tujuan Mengunjungi Website:**
1. Cek apakah area mereka tercover layanan
2. Bandingkan paket dan harga
3. Dapatkan nomor WhatsApp/Telepon untuk bertanya
4. Lihat kredibilitas usaha

### 7.2 Admin Internal - Secondary Persona

**Nama:** Sari Wulandari
**Role:** Admin Operasional

**Tujuan Menggunakan CMS:**
1. Update paket/harga dengan cepat
2. Tambah area baru saat ekspansi
3. Edit FAQ berdasarkan pertanyaan sering muncul
4. Ganti nomor kontak jika berubah

---

## 8. User Stories

### 8.1 User Stories - Calon Pelanggan (Frontend)

| Epic | ID | User Story | Priority |
|------|----|------------|----------|
| **Beranda** | US-01 | Sebagai calon pelanggan, saya ingin melihat ringkasan layanan di beranda agar cepat memahami apa yang ditawarkan | High |
| **Beranda** | US-02 | Sebagai calon pelanggan, saya ingin tombol CTA ke WhatsApp di beranda agar bisa langsung bertanya | High |
| **Paket** | US-04 | Sebagai calon pelanggan, saya ingin melihat semua paket dengan harga, kecepatan, dan biaya pasang agar bisa membandingkan | High |
| **Area** | US-07 | Sebagai calon pelanggan, saya ingin mencari apakah area saya terlayani | High |
| **Kontak** | US-10 | Sebagai calon pelanggan, saya ingin melihat semua opsi kontak (WA, Telepon, Alamat, Maps) | High |
| **SEO** | US-13 | Sebagai pencari, saya ingin menemukan website ini saat mencari "Arjuna Multimedia" di Google | High |

### 8.2 User Stories - Admin (Backend)

| Epic | ID | User Story | Priority |
|------|----|------------|----------|
| **Login** | US-20 | Sebagai admin, saya ingin login dengan email dan password yang aman | High |
| **Paket** | US-22 | Sebagai admin, saya ingin menambah paket baru | High |
| **Area** | US-26 | Sebagai admin, saya ingin menambah area layanan baru | High |
| **FAQ** | US-29 | Sebagai admin, saya ingin menambah FAQ baru | Medium |
| **SEO** | US-34 | Sebagai admin, saya ingin mengatur meta title dan description per halaman | Medium |

---

## 9. Scope MVP

### 9.1 In-Scope - Frontend (Publik)

| Halaman | Komponen Wajib |
|---------|---------------|
| **Beranda** | Hero, Navigasi, Highlight Layanan (3-4), Preview Paket (2-3), CTA WA, CTA Telepon, Footer |
| **Tentang Kami** | Profil usaha, Cerita singkat, Area operasional, Nilai/komitmen, Tim |
| **Paket Internet** | Daftar paket (Card/Grid), Nama paket, Kecepatan, Harga/bulan, Biaya pasang, Deskripsi, CTA WA |
| **Area Layanan** | Daftar wilayah/kampung/RT/RW, Status (Tersedia/Segera), Search bar |
| **Kontak** | No WhatsApp, No Telepon, Alamat, Jam layanan, Link Google Maps, Sosial media |
| **FAQ** | Accordion, Kategori (Umum/Teknis/Billing), Search |
| **Form Minat** | Nama, No WA, Paket diminati, Alamat, Pesan |

### 9.2 In-Scope - Backend (Admin CMS)

| Modul | Fitur CRUD | Fitur Tambahan |
|-------|-----------|----------------|
| **Autentikasi** | Login, Logout | Remember me, Session timeout |
| **Dashboard** | - | Summary cards, Recent activity |
| **Kelola Paket** | CRUD | Toggle status, Sort order |
| **Kelola Area** | CRUD | Toggle status, Sort order |
| **Kelola FAQ** | CRUD | Kategori, Sort order, Toggle publish |
| **Kelola Kontak** | Update | Preview perubahan |
| **Kelola Halaman** | Update | Hero title, content, WYSIWYG editor |
| **Kelola SEO** | Update | Meta title, description, OG tags |

---

## 10. Fitur In-Scope dan Out-of-Scope (Detail)

| Fitur | Frontend | Backend | CMS | SEO | Priority | Status |
|-------|----------|---------|-----|-----|----------|--------|
| Beranda | ✓ | - | ✓ | ✓ | P0 | MVP |
| Tentang Kami | ✓ | - | ✓ | ✓ | P0 | MVP |
| Paket Internet | ✓ | ✓ | ✓ | ✓ | P0 | MVP |
| Area Layanan | ✓ | ✓ | ✓ | ✓ | P0 | MVP |
| Kontak | ✓ | - | ✓ | ✓ | P0 | MVP |
| FAQ | ✓ | ✓ | ✓ | ✓ | P1 | MVP |
| Form Minat | ✓ | ✓ | ✓ | - | P1 | MVP |
| Login Admin | - | ✓ | - | - | P0 | MVP |

---

## 11. Sitemap / Information Architecture

```
arjuna-multimedia.com
│
├── (/) Beranda
│   ├── Header (Logo, Navigasi, CTA)
│   ├── Hero Section
│   ├── Highlight Layanan (4 cards)
│   ├── Preview Paket Populer
│   ├── Area Coverage Preview
│   └── Footer
│
├── (/tentang) Tentang Kami
│   ├── Profil Usaha
│   ├── Sejarah, Visi, Misi
│   ├── Tim
│   └── Nilai & Komitmen
│
├── (/paket) Paket Internet
│   ├── Filter/Kategori
│   └── Daftar Paket (Card Layout)
│
├── (/area) Area Layanan
│   ├── Search Bar
│   ├── Filter Area
│   └── Daftar Area dengan Status
│
├── (/kontak) Kontak
│   ├── WhatsApp Section
│   ├── Telepon Section
│   ├── Alamat & Maps
│   └── Form Minat Pemasangan
│
├── (/faq) FAQ
│   ├── Search Bar
│   ├── Kategori
│   └── Accordion Items
│
└── (/admin) Admin Panel
    ├── Login
    ├── Dashboard
    ├── Paket Internet (CRUD)
    ├── Area Layanan (CRUD)
    ├── FAQ (CRUD)
    ├── Kontak (Edit)
    ├── Halaman (Edit)
    ├── SEO Settings
    └── Branding
```

---

## 12. Functional Requirements

### 12.1 Functional Requirements - Frontend (FR)

| ID | Requirement | Priority |
|----|-------------|----------|
| FR-01 | Halaman Beranda dengan hero, highlight, preview paket, CTA | P0 |
| FR-02 | Navigasi Responsive dengan hamburger untuk mobile | P0 |
| FR-03 | Header Sticky dengan CTA button | P1 |
| FR-04 | Hero Section dengan headline, subheadline, CTA | P0 |
| FR-05 | Highlight Layanan (4 card dengan icon) | P0 |
| FR-06 | Preview Paket di beranda (2-3 paket) | P1 |
| FR-07 | Halaman Tentang Kami (profil, visi misi, tim) | P0 |
| FR-08 | Halaman Paket dengan list semua paket | P0 |
| FR-09 | Kartu Paket (nama, kecepatan, harga, biaya pasang, CTA WA) | P0 |
| FR-10 | Halaman Area dengan search dan filter status | P0 |
| FR-11 | Halaman Kontak (WhatsApp, Telepon, Alamat, Maps) | P0 |
| FR-12 | Link WhatsApp klik-able dengan template pesan | P0 |
| FR-13 | Halaman FAQ dengan accordion dan search | P1 |
| FR-14 | Form Minat Pemasangan dengan validation | P1 |
| FR-15 | Responsive Design (mobile, tablet, desktop) | P0 |
| FR-16 | Touch-Friendly (touch target min 44x44px) | P1 |

### 12.2 Functional Requirements - Backend (BR)

| ID | Requirement | Priority |
|----|-------------|----------|
| BR-01 | Autentikasi Admin dengan bcrypt/argon2 | P0 |
| BR-02 | Session Management dengan proteksi route | P0 |
| BR-03 | Dashboard dengan summary cards | P1 |
| BR-04 | CRUD Paket (Create, Read, Update, Delete, Soft delete) | P0 |
| BR-05 | CRUD Area dengan toggle status | P0 |
| BR-06 | CRUD FAQ dengan kategori | P1 |
| BR-07 | Update Kontak | P0 |
| BR-08 | Update Halaman (Beranda, Tentang Kami) | P1 |
| BR-09 | Update SEO (meta tags, OG tags per halaman) | P1 |
| BR-10 | Form Submission save dan list view | P1 |
| BR-11 | Input Validation server-side | P0 |
| BR-12 | Sort Order field untuk tampilan | P1 |

---

## 13. Non-Functional Requirements

### 13.1 Performance Requirements

| Metric | Target |
|--------|--------|
| Page Load Time | < 3 detik (4G) |
| Time to Interactive | < 5 detik |
| First Contentful Paint | < 1.5 detik |
| Lighthouse Mobile Score | > 90 |
| Lighthouse SEO Score | > 80 |

### 13.2 Usability Requirements

| Requirement | Specification |
|-------------|---------------|
| Mobile-First | Desain dioptimalkan untuk mobile (320px - 768px) |
| Accessibility | WCAG 2.1 Level AA (basic) |
| Touch Targets | Minimum 44x44px |
| Font Size | Minimum 16px body text |
| Color Contrast | Ratio minimum 4.5:1 |

### 13.3 Security Requirements

| Requirement | Specification |
|-------------|---------------|
| Password Hashing | bcrypt (cost 10+) atau argon2 |
| Session Security | HttpOnly, Secure, SameSite cookies |
| CSRF Protection | CSRF token untuk form POST |
| XSS Protection | Input sanitization, output encoding |
| Rate Limiting | Login attempt limit (5/15 menit) |
| HTTPS | Wajib di production |

---

## 14. SEO Requirements

### 14.1 Technical SEO Requirements

| Requirement | Specification | Priority |
|-------------|---------------|----------|
| Meta Title | Unique per halaman, 50-60 karakter | P0 |
| Meta Description | Unique per halaman, 150-160 karakter | P0 |
| H1 Heading | Satu H1 unik per halaman | P0 |
| URL Structure | Clean, readable, dengan kata kunci | P0 |
| Canonical URL | Canonical tag per halaman | P1 |
| Robots.txt | Allow crawling, disallow /admin | P0 |
| Sitemap XML | Auto-generated, include semua halaman | P0 |
| Schema Markup | LocalBusiness, Organization, FAQPage | P1 |
| Open Graph Tags | OG title, description, image | P1 |

### 14.2 Local SEO Requirements

| Requirement | Specification | Priority |
|-------------|---------------|----------|
| NAP Consistency | Nama, Alamat, No Telepon konsisten | P0 |
| Google Business Profile | Link ke GB Profile di footer/kontak | P0 |
| Local Schema | LocalBusiness schema dengan address | P0 |
| Local Keywords | "internet desa", "WiFi kampung" | P1 |

### 14.3 Sitemap XML Structure

```xml
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc>https://arjuna-multimedia.com/</loc>
    <lastmod>2026-03-23</lastmod>
    <changefreq>weekly</changefreq>
    <priority>1.0</priority>
  </url>
  <!-- ... other pages ... -->
</urlset>
```

### 14.4 Robots.txt

```
User-agent: *
Allow: /
Disallow: /admin
Disallow: /api/admin
Sitemap: https://arjuna-multimedia.com/sitemap.xml
```

### 14.5 Schema Markup - LocalBusiness

```json
{
  "@context": "https://schema.org",
  "@type": "InternetServiceProvider",
  "name": "Arjuna Multimedia",
  "description": "Layanan internet lokal untuk area perkampungan",
  "telephone": "+6281234567890",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Jl. Contoh No. 123",
    "addressLocality": "Nama Kecamatan",
    "addressRegion": "Nama Kabupaten",
    "addressCountry": "ID"
  }
}
```

---

## 15. Admin/CMS Requirements

### 15.1 CMS Feature Requirements

| Module | Features | Priority |
|--------|----------|----------|
| Authentication | Login, Logout, Session Management | P0 |
| Dashboard | Summary Cards, Quick Actions | P1 |
| Package Manager | CRUD, Status Toggle, Sort Order | P0 |
| Area Manager | CRUD, Status Toggle, Sort Order | P0 |
| FAQ Manager | CRUD, Category, Sort Order | P1 |
| Contact Manager | Edit Contact Info, Preview | P0 |
| Page Editor | Edit Homepage, About Page Content | P1 |
| SEO Manager | Meta Tags, OG Tags per Page | P1 |
| Branding | Logo, Favicon, Brand Colors | P2 |
| Form Manager | View Submissions, Export | P1 |

### 15.2 UI/UX Requirements untuk Admin

| Requirement | Specification |
|-------------|---------------|
| Responsive | Mobile-friendly admin dashboard |
| Sidebar Navigation | Collapsible sidebar dengan menu |
| Data Tables | Sortable, searchable, paginated |
| Form Validation | Real-time validation |
| Success/Error Feedback | Toast notifications |
| Confirm Dialogs | Konfirmasi untuk delete |
| Rich Text Editor | WYSIWYG editor untuk konten |

---

## 16. Content Model / Struktur Data CMS

### 16.1 Package Model

```yaml
name: Package
fields:
  - id: string (UUID)
  - name: string (required)
  - slug: string (unique)
  - speed: string (e.g., "10 Mbps")
  - speed_value: number (for sorting)
  - price_monthly: number (required)
  - installation_fee: number (required)
  - quota: string (e.g., "Unlimited")
  - description: text
  - features: array of strings
  - category: enum (home, business)
  - is_popular: boolean
  - is_active: boolean
  - sort_order: number
```

### 16.2 ServiceArea Model

```yaml
name: ServiceArea
fields:
  - id: string (UUID)
  - name: string (required)
  - slug: string (unique)
  - description: text
  - status: enum (available, coming_soon, paused)
  - coverage_detail: text
  - is_active: boolean
  - sort_order: number
```

### 16.3 FAQ Model

```yaml
name: FAQ
fields:
  - id: string (UUID)
  - question: string (required)
  - answer: text (required)
  - category: enum (general, technical, billing, installation)
  - sort_order: number
  - is_published: boolean
```

### 16.4 Contact Model (Singleton)

```yaml
name: Contact
fields:
  - whatsapp_number: string (required)
  - phone_number: string (required)
  - email: string
  - address: text (required)
  - google_maps_link: string
  - google_maps_embed: text
  - operating_hours: text
  - social_media_links: object
```

### 16.5 Page Model

```yaml
name: Page
fields:
  - slug: string (unique, enum: home, about, package, area, contact, faq)
  - title: string (required)
  - hero_title: string
  - hero_subtitle: string
  - content: text (rich text)
  - meta_title: string
  - meta_description: text
  - og_image: string
  - canonical_url: string
```

### 16.6 FormSubmission Model

```yaml
name: FormSubmission
fields:
  - id: string (UUID)
  - name: string (required)
  - whatsapp: string (required)
  - package_interest: string
  - address: text (required)
  - message: text
  - status: enum (new, contacted, converted, lost)
  - notes: text
```

### 16.7 AdminUser Model

```yaml
name: AdminUser
fields:
  - id: string (UUID)
  - name: string (required)
  - email: string (unique, required)
  - password_hash: string (required)
  - role: enum (super_admin, editor, viewer)
  - last_login: datetime
  - is_active: boolean
```

### 16.8 SiteSettings Model (Singleton)

```yaml
name: SiteSettings
fields:
  - site_name: string
  - site_url: string
  - logo_url: string
  - favicon_url: string
  - brand_color_primary: string (hex)
  - brand_color_secondary: string (hex)
  - google_analytics_id: string
  - gtm_id: string
  - google_business_profile_url: string
  - maintenance_mode: boolean
```

---

## 17. Initial Database Entities

### 17.1 Database Schema Summary

| Table | Purpose | Primary Key |
|-------|---------|-------------|
| admin_users | Admin authentication | UUID |
| packages | Internet packages | UUID |
| service_areas | Coverage areas | UUID |
| faqs | Frequently asked questions | UUID |
| contacts | Contact information (singleton) | UUID |
| pages | Page content & SEO | UUID |
| form_submissions | Form submissions | UUID |
| site_settings | Global settings (singleton) | UUID |
| activity_logs | Audit trail (optional) | UUID |

### 17.2 Key Relationships

```
admin_users (1:N) activity_logs
packages (standalone)
service_areas (standalone)
faqs (standalone)
contacts (singleton - 1 record only)
pages (1 per slug)
form_submissions (standalone)
site_settings (singleton - 1 record only)
```

### 17.3 Seed Data Examples

**Packages:**
- Paket Basic - 10 Mbps, Rp 150.000/bulan
- Paket Family - 20 Mbps, Rp 250.000/bulan
- Paket Gaming - 50 Mbps, Rp 400.000/bulan
- Paket Bisnis - 100 Mbps, Rp 600.000/bulan

**Areas:**
- Desa Sukamaju (Available)
- Desa Sukamaju Baru (Coming Soon)
- Kelurahan Harapan (Available)

**FAQs:**
- Cara daftar
- Biaya pemasangan
- Waktu pemasangan
- Kontak gangguan
- Jadwal pembayaran

---

## 18. Deployment & Technical Stack

### 18.1 Deployment Environment

| Atribut | Spesifikasi |
|---------|-------------|
| **Panel** | aaPanel |
| **OS** | Ubuntu 22.04 LTS |
| **CPU** | 2 vCPU |
| **RAM** | 2 GB |
| **Storage** | 15 GB SSD |
| **Web Server** | Nginx (recommended) |
| **Database** | MySQL 8.0+ atau PostgreSQL 14+ |
| **SSL** | Let's Encrypt (via aaPanel) |

### 18.2 Recommended Tech Stack Options

| Option | Frontend | Backend | Database | Pro |
|--------|----------|---------|----------|-----|
| **A** | HTML/Tailwind | PHP (Laravel) | MySQL | Mature, mudah di-aaPanel |
| **B** | React/Next.js | Node.js (Express) | PostgreSQL | Modern, fullstack JS |
| **C** | Vanilla JS + Tailwind | PHP native | MySQL | Paling ringan, simple |
| **D** | Astro + Vue | Node.js | PostgreSQL | Static-friendly, fast |

**Rekomendasi:** Option A (Laravel) atau Option C (PHP Native) untuk VPS kecil.

### 18.3 Server Resource Requirements

| Resource | Usage Estimate | Headroom |
|----------|----------------|----------|
| **RAM Idle** | ~200-300MB | ~1.7GB free |
| **RAM Peak** | ~500-800MB | ~1.2GB free |
| **Storage** | ~500MB app + ~100MB DB | ~14GB free |

---

## 19. Development Roadmap

### 19.1 MVP Roadmap (7-8 Minggu)

```
Phase 1: Foundation (Minggu 1-2)
├── Setup project structure
├── Setup database & migrations
├── Setup basic authentication
└── Setup aaPanel deployment config

Phase 2: Admin CMS Core (Minggu 2-3)
├── Dashboard, Login/Logout
├── CRUD Packages, Areas, FAQs
└── Contact Manager

Phase 3: Frontend Public (Minggu 3-5)
├── Beranda, Tentang Kami
├── Paket, Area, Kontak, FAQ
└── Form Minat (opsional)

Phase 4: SEO & Integration (Minggu 5-6)
├── Meta tags, Sitemap, Schema
├── WhatsApp, Google Maps integration
└── Open Graph tags

Phase 5: Testing & Polish (Minggu 6-7)
├── Cross-browser & mobile testing
├── Performance & SEO audit
└── Bug fixes

Phase 6: Deployment & Handover (Minggu 7-8)
├── Deploy to aaPanel, SSL setup
├── Admin training, Documentation
└── Support period
```

---

## 20. Glossary

| Term | Definition |
|------|------------|
| MVP | Minimum Viable Product |
| CRUD | Create, Read, Update, Delete |
| CMS | Content Management System |
| SEO | Search Engine Optimization |
| NAP | Name, Address, Phone Number (Local SEO) |
| CTA | Call to Action |
| FUP | Fair Usage Policy |
| WCAG | Web Content Accessibility Guidelines |
| OG Tags | Open Graph Tags (untuk social media) |
| Schema Markup | Structured data untuk search engines |
| Sitemap XML | File XML yang berisi daftar halaman website |
| Soft Delete | Menghapus data dengan menandai deleted_at |
| Singleton | Pattern di mana hanya 1 record yang ada |
| WYSIWYG | What You See Is What You Get (rich text editor) |
| aaPanel | Control panel untuk web server management |
| VPS | Virtual Private Server |

---

## 21. Appendix

### 21.1 SEO Checklist

```
On-Page SEO:
☑ Meta title unik per halaman (50-60 char)
☑ Meta description unik per halaman (150-160 char)
☑ H1 tag unik per halaman
☑ Heading structure yang benar
☑ Clean URL dengan kata kunci
☑ Image alt text
☑ Internal linking
☑ Mobile-friendly
☑ Page speed < 3 detik
☑ HTTPS enabled

Technical SEO:
☑ Sitemap XML
☑ Robots.txt
☑ Canonical tags
☑ Schema markup (LocalBusiness, FAQPage)
☑ Open Graph tags

Local SEO:
☑ NAP konsisten di semua halaman
☑ Link ke Google Business Profile
☑ LocalBusiness schema
```

### 21.2 WhatsApp Link Template

```
Global CTA:
https://wa.me/6281234567890?text=Halo%20Arjuna%20Multimedia,%20saya%20tertarik%20dengan%20paket%20internet%20Anda.%20Mohon%20infonya.

Per Paket:
https://wa.me/6281234567890?text=Halo%20Arjuna%20Multimedia,%20saya%20tertarik%20dengan%20[Nama%20Paket].%20Apakah%20area%20saya%20sudah%20tercover?
```

---

**Dokumen Version:** 2.0
**Last Updated:** 23 Maret 2026
**Status:** Final - Approved for Development
**Project:** Arjuna Multimedia Website & Admin CMS

---

*End of PRD Version 2.0*

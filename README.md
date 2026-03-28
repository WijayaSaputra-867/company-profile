# {{ config('app.name', 'Company Profile') }}

Website Company Profile premium yang dibangun dengan **Laravel 13**, **Livewire 4**, dan **Flux UI**. Proyek ini dirancang dengan estetika modern, performa tinggi, dan kemudahan manajemen konten.

## Fitur Utama

-   💎 **Premium Landing Page**: Desain modern dengan glassmorphism dan animasi halus.
-   🛠️ **Admin Dashboard**: Dashboard manajemen konten yang lengkap dan responsif.
-   📄 **Manajemen Halaman**: Buat dan edit halaman statis seperti "Tentang Kami".
-   💼 **Manajemen Portfolio**: Kelola proyek dan galeri foto portfolio.
-   🔧 **Manajemen Layanan**: Kelola daftar layanan bisnis perusahaan.
-   📧 **Pesan Masuk**: Sistem formulir kontak terintegrasi dengan dashboard.
-   👤 **Manajemen Admin**: Kelola pengguna administrator sistem.
-   🔒 **Keamanan**: Autentikasi menggunakan Laravel Fortify.

## Persyaratan Sistem

-   PHP >= 8.4
-   Composer
-   Node.js & NPM
-   Driver Database (SQLite/MySQL/PostgreSQL)

## Instalasi Cepat

Anda dapat menginstal seluruh dependensi dan menyiapkan environment hanya dengan satu perintah:

```bash
composer setup
```

Perintah di atas akan otomatis melakukan:
1.  Menginstal dependensi Composer.
2.  Menyalin `.env.example` ke `.env`.
3.  Membuat Application Key.
4.  Menjalankan Migrasi Database.
5.  Menginstal dependensi NPM.
6.  Membangun aset front-end (Build).

> [!IMPORTANT]
> Pastikan koneksi database sudah dikonfigurasi di file `.env` sebelum menjalankan `composer setup` jika Anda tidak menggunakan SQLite default.

## Menjalankan Proyek

Setelah instalasi selesai, jalankan server pengembangan:

```bash
composer dev
```

Akses website melalui browser di: `http://localhost:8000`

## Akses Admin

Gunakan kredensial default berikut untuk masuk ke dashboard admin:

-   **URL**: `/login`
-   **Email**: `admin@example.com`
-   **Password**: `password`

## Struktur Teknologi

-   **Framework**: [Laravel 13](https://laravel.com)
-   **Front-end**: [Livewire 4](https://livewire.laravel.com) & [Flux UI](https://fluxui.dev)
-   **Styling**: [Tailwind CSS v4](https://tailwindcss.com)
-   **Authentication**: [Laravel Fortify](https://laravel.com/docs/fortify)

---
&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Managed by Antigravity.

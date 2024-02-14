# SiTukang.id - Sistem Penyedia Portofolio Tukang Bangunan
![Logo](https://raw.githubusercontent.com/hudaputrasantosa/hudaputrasantosa.github.io/main/assets/img/projects/project-4.png)


## ⚡ Deskripsi
Situkang.id merupakan aplikasi inovatif yang kami tawarkan bertujuan untuk mengatasi kesulitan yang sering dihadapi masyarakat dalam mendapatkan dan mencari informasi terkait keahlian, pengalaman, serta rentang harga dari tukang bangunan, baik secara individu maupun kelompok. Aplikasi ini dirancang sebagai solusi yang efektif untuk memenuhi kebutuhan masyarakat dalam menemukan tukang bangunan yang sesuai dengan kebutuhan mereka.

## ✨ Fitur

- Autentikasi dan authorisasi pengguna (pelanggan dan tukang bangunan)
- Landing page pelanggan
- Halaman jenis tukang bangunan
- Halaman tentang
- dashbor pelanggan (profil dan riwayat sewa)
- dashbor tukang bangunan (profil, pengalaman dan penyewaan)

## ✅ Requirement and tools
 - PHP min 8.1
 - MariaDB/MySQL
 - Laravel 10
 - NodeJS v16+
 - NPM v8+
 - Vite
 - AlpineJS
 - Jquery v3.7
 - TailwindCSS v3.4
 - Pusher
 - Xendit Payment Gateway

## 🔥 Install & running local dev
Clone Repository

```bash
git clone https://github.com/hudaputrasantosa/situkang-app.git
cd situkang-app
```
Copy .env from .env.example
```bash
cp .env.example .env
```
Installation from Composer & Npm
```bash
composer Install && npm install
```
Generate Key
```bash
php artisan key:generate
```
Create Symlink storage
```bash
php artisan storage:link
```
Create migration table and data
```bash
php artisan migrate --seed
```
Running Frontend
```bash
npm run dev
```
Running Laravel
```bash
php artisan serve
```

## Authors

- [@hudaputrasantosa](https://www.github.com/hudaputrasantosa)


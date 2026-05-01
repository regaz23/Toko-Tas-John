Aplikasi web berbasis jaringan lokal (localhost) ini dirancang khusus untuk Toko Tas John, dengan tujuan mempermudah pemilik dan karyawan dalam mengelola inventaris produk tas di toko. 

## 📋 Prasyarat

Sebelum menjalankan aplikasi ini, pastikan Anda telah menginstal :
* PHP (Minimal versi 8.2)
* Composer
* Node.js
* Database SQlite (DB browser)

## ⚙️ Instalasi

Jalankan perintah berikut untuk mengunduh dan mengatur aplikasi di terminal :
### Install Dependencies Backend (PHP) :
```bash 
composer install
```
### Install Dependencies Frontend (Node.js) :
```bash 
npm install
```
### Generate Application Key :
```bash 
php artisan key:generate
```
### Setup & Migrate Database (SQLite) :
```bash 
php artisan migrate
```
### Setup database.sqlite :
```bash 
php artisan db:seed
```

## ⚙️ Menjalankan aplikasi 

Jika sudah menjalankan perintah diatas, jalankan aplikasi dari terminal
### Menjalankan Aplikasi di terminal pertama :
```bash 
php artisan serve
```
### Menjalankan Aplikasi di terminal kedua :
```bash 
npm run dev
```

## 🖼️ Gambar Diagram Toko Tas John :

<img width="2783" height="2778" alt="Use Case Toko Tas John 1" src="https://github.com/user-attachments/assets/6557fab8-2e42-4d9a-8293-433414165026" />


## ➡️ ALUR KINERJA SISTEM :
1. LOGIN
###  Admin :   
```bash
id : admin@example.com
pass : rega123
```
###  Karyawan :
```bash
id : karyawan@example.com
pass : karyawan123
```
2. MASUK KE DASHBOARD
3. MEMASUKKAN KATEGORI TERLEBIH DAHULU PADA INSERT DATA
4. MEMBUAT DATA PRODUK PADA INSERT DATA
5. KETIKA PEMILIK USAHA INGIN MENYUPLAI, PEMILIK USAHA KE MENU TRANSAKSI PEMBELIAN UNTUK MENGISI STOK PADA DATA PRODUK YANG SUDAH DIBUAT PADA NOMER 4
6. KETIKA PEMBELI SUDAH MELAKUKAN TRANSAKSI, MENUJU KE HALAMAN TRANSAKSI PENJUALAN UNTUK NANTINYA DICATAT KE LAPORAN PENJUALAN
7. LAPORAN PENJUALAN BISA DICARI PADA TABEL SEARCH
8. MENU SETTING UNTUK MENGUBAH NAMA TOKO

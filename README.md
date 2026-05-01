Aplikasi web berbasis jaringan lokal (localhost) ini dirancang khusus untuk Toko Tas John, dengan tujuan mempermudah pemilik dan karyawan dalam mengelola inventaris produk tas di toko. 

## 📋 Prasyarat

Sebelum menjalankan aplikasi ini, pastikan Anda telah menginstal :
* PHP (Minimal versi 8.2)
* Composer
* Node.js
* Database SQlite (DB browser)

## ⚙️ Instalasi

Jalankan perintah berikut untuk mengunduh dan mengatur aplikasi di terminal :

```bash
composer install
```

Gambar Diagram Toko Tas John :
<img width="2783" height="2778" alt="Use Case Toko Tas John 1" src="https://github.com/user-attachments/assets/6557fab8-2e42-4d9a-8293-433414165026" />


ALUR KINERJA SISTEM :
1. LOGIN
2. MASUK KE DASHBOARD
3. MEMASUKKAN KATEGORI LEWAT INSERT DATA
4. MEMBUAT DATA PRODUK TERLEBIH DAHULU PADA INSERT DATA
5. KETIKA PEMILIK USAHA MENYUPLAI, PEMILIK USAHA DI ARAHKAN KE TRANSAKSI PEMBELIAN UNTUK MENGISI STOK PADA DATA PRODUK YANG SUDAH DIBUAT PADA NOMER 4
6. KETIKA PEMBELI SUDAH MELAKUKAN TRANSAKSI, MENUJU KE HALAMAN TRANSAKSI PENJUALAN UNTUK NANTINYA DICATAT KE LAPORAN PENJUALAN
7. LAPORAN PENJUALAN BISA DICARI 2 OPSI : 1.) PILIH HARI, BULAN, TAHUN DAN BULAN 2.) BULAN DAN TAHUN SAJA
8. PROFIL TOKO UNTUK MENGISI BIO TOKO

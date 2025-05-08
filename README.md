
<p align="center"><strong>Sistem Informasi Transportasi Wilayah Sulawesi Barat</strong></p>

<div align="center">

![logo_unsulbar](public/logo.jpg)



<b>Presli Akhasya Putri</b><br>
<b>D0222039</b><br>
<b>Framework Web Based</b><br>
<b>2025</b>
</div>

# 🚍 Sistem Informasi Transportasi Wilayah Sulawesi Barat

Sistem ini dirancang untuk mengelola layanan transportasi (rental mobil) di wilayah Sulawesi Barat dengan tiga role utama: **Admin**, **Driver (Pemilik Rental)**, dan **User (Pelanggan)**.

---

## 🧑‍💼 Role & Akses

### 1. Admin
- Mengelola data transportasi (tambah, edit, hapus)
- Melihat dan mengelola data driver & user
- Menghubungi driver
- Melihat transaksi dan aktivitas sistem

### 2. Driver
- Mengelola data kendaraan miliknya
- Melihat penyewaan dan status pembayaran
- Mengelola profil rental
- Membalas pesan pelanggan

### 3. User
- Registrasi dan login
- Menjelajah daftar rental dan mobil
- Melakukan penyewaan mobil
- Melakukan pembayaran via BRIVA
- Cetak surat bukti pembayaran
- Kirim pesan ke driver atau admin

---

## 🗃️ Struktur Database

### 📁 Tabel: `users`
| Field      | Tipe Data       | Keterangan              |
|------------|------------------|--------------------------|
| id         | INT, PK, AI      | ID unik user             |
| name       | VARCHAR(100)     | Nama lengkap             |
| email      | VARCHAR(100)     | Email user               |
| password   | VARCHAR(255)     | Password terenkripsi     |
| phone      | VARCHAR(20)      | Nomor telepon            |
| address    | TEXT             | Alamat lengkap           |
| created_at | TIMESTAMP        | Tanggal registrasi       |

---

### 📁 Tabel: `drivers`
| Field        | Tipe Data       | Keterangan                |
|--------------|------------------|----------------------------|
| id           | INT, PK, AI      | ID unik driver             |
| name         | VARCHAR(100)     | Nama pemilik rental        |
| email        | VARCHAR(100)     | Email login                |
| password     | VARCHAR(255)     | Password                   |
| phone        | VARCHAR(20)      | Nomor telepon              |
| rental_name  | VARCHAR(100)     | Nama usaha rental          |
| address      | TEXT             | Alamat rental              |
| created_at   | TIMESTAMP        | Tanggal registrasi         |

---

### 📁 Tabel: `vehicles`
| Field         | Tipe Data       | Keterangan                      |
|---------------|------------------|----------------------------------|
| id            | INT, PK, AI      | ID kendaraan                     |
| driver_id     | INT, FK          | Relasi ke tabel `drivers`        |
| name          | VARCHAR(100)     | Nama kendaraan                   |
| plate_number  | VARCHAR(20)      | Nomor polisi                     |
| capacity      | INT              | Kapasitas penumpang              |
| price_per_day | DECIMAL(10,2)    | Harga sewa per hari              |
| description   | TEXT             | Deskripsi kendaraan              |
| image_url     | VARCHAR(255)     | URL gambar kendaraan             |
| status        | ENUM('tersedia', 'disewa') | Status sewa         |
| created_at    | TIMESTAMP        | Tanggal input data               |

---

### 📁 Tabel: `rentals`
| Field         | Tipe Data       | Keterangan                        |
|---------------|------------------|------------------------------------|
| id            | INT, PK, AI      | ID penyewaan                       |
| user_id       | INT, FK          | Relasi ke `users`                  |
| vehicle_id    | INT, FK          | Relasi ke `vehicles`               |
| start_date    | DATE             | Tanggal mulai sewa                 |
| end_date      | DATE             | Tanggal selesai sewa               |
| total_price   | DECIMAL(10,2)    | Total biaya sewa                   |
| status        | ENUM('pending', 'paid', 'canceled') | Status sewa  |
| created_at    | TIMESTAMP        | Waktu pemesanan                    |

---

### 📁 Tabel: `payments`
| Field         | Tipe Data       | Keterangan                        |
|---------------|------------------|------------------------------------|
| id            | INT, PK, AI      | ID pembayaran                      |
| rental_id     | INT, FK          | Relasi ke `rentals`                |
| payment_method| VARCHAR(50)      | Contoh: BRIVA                      |
| payment_time  | TIMESTAMP        | Waktu pembayaran                   |
| status        | ENUM('pending', 'success', 'failed') | Status       |

---

### 📁 Tabel: `messages`
| Field         | Tipe Data       | Keterangan                        |
|---------------|------------------|------------------------------------|
| id            | INT, PK, AI      | ID pesan                           |
| sender_id     | INT              | ID pengirim (user/admin/driver)    |
| receiver_id   | INT              | ID penerima                        |
| message       | TEXT             | Isi pesan                          |
| sent_at       | TIMESTAMP        | Waktu pengiriman                   |

---

## 📌 Catatan
- Sistem ini dapat dikembangkan lebih lanjut dengan modul notifikasi, integrasi email, rating kendaraan, dan fitur laporan otomatis.
- Gunakan enkripsi untuk password (`bcrypt` / `hashing`) demi keamanan akun.

---

## 🔗 Relasi Antar Tabel

Dokumentasi relasi antar tabel dalam Sistem Informasi Transportasi Wilayah Sulawesi Barat:

---

### 1. `users` ↔ `rentals` (One-to-Many)
- **Satu user** dapat melakukan banyak penyewaan.
- Relasi: `rentals.user_id` → `users.id`

---

### 2. `drivers` ↔ `vehicles` (One-to-Many)
- **Satu driver** dapat memiliki banyak kendaraan..]
- Relasi: `vehicles.driver_id` → `drivers.id`

---

3. `vehicles` ↔ `rentals` (One-to-Many)
- Satu kendaraan** dapat disewa oleh banyak user dalam transaksi berbeda.
- Relasi: `rentals.vehicle_id` → `vehicles.id`

---

### 4. `rentals` ↔ `payments` (One-to-One)
- **Satu penyewaan** hanya memiliki **satu pembayaran**.
- Relasi: `payments.rental_id` → `rentals.id`

---

### 5. `users` / `drivers` / `admin` ↔ `messages` (Many-to-Many melalui peran)
- Semua role (user, driver, admin) dapat **berkirim pesan satu sama lain**.
- Implementasi menggunakan:
  - `sender_id` (ID pengirim)
  - `sender_role_



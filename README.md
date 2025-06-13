# 🛠️ Langkah Eksekusi Backend CodeIgniter 
Berikut ini adalah tahapan yang dilakukan untuk membangun backend CodeIgniter pada tugas UAS:

## 1. Clone Repository
Clone repositori backend ke dalam direktori lokal:
```
git clone https://github.com/abdau88/eval_pbf_backend.git eval_pbf_backend
cd eval_pbf_backend
```

## 2. Install Dependensi
Install semua dependensi yang dibutuhkan menggunakan Composer:
```
composer install
```
### 📌 Catatan tambahan
Solusi jika composer install gagal di VS Code atau CMD :
Apabila proses composer install gagal dijalankan melalui Visual Studio Code (VSCode) atau Command Prompt, silakan gunakan terminal bawaan Laragon.
Caranya:

1. Buka Laragon.
2. Klik menu Terminal.
3. Masuk ke direktori project backend (misalnya Simon-kehadiran).
4. Jalankan kembali:
```
composer install
```
Jika error tetap muncul terkait ekstensi PHP seperti intl, maka dapat menggunakan opsi tambahan:
```
composer update --ignore-platform-req=ext-intl
```

## 3. Konfigurasi Environment
Salin file .env.example menjadi .env dan atur konfigurasi database:
```
cp env .env
```

Edit file .env dan sesuaikan dengan koneksi database lokal:
```
database.default.hostname = localhost
database.default.database = db_uas_230102015
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```

## 4. Buat Database dan Import Dummy Data
Buat database baru di MySQL, dengan nama: db_uas_230102015
Import file SQL berikut ke dalam database tersebut:
```
-- SETUP
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table: mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `npm` INT NOT NULL,
  `nama_mahasiswa` VARCHAR(30) NOT NULL,
  `email` VARCHAR(40) NOT NULL,
  PRIMARY KEY (`npm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Sample data
INSERT INTO `mahasiswa` (`npm`, `nama_mahasiswa`, `email`) VALUES
(330102065, 'Ji Rizky Cahyusna', 'jicantik12@gmail.com'),
(330102066, 'Ibnu Zaki', 'ibnuzaki@gmail.com'),
(330102067, 'Amelia Zahra', 'amelia@gmail.com'),
(330102068, 'Santosa Setiya', 'santosa@gmail.com'),
(330102069, 'Sarah Amaleya', 'sarah@gmail.com');

-- ----------------------------
-- Table: matkul
-- ----------------------------
DROP TABLE IF EXISTS `matkul`;
CREATE TABLE `matkul` (
  `kode_matkul` VARCHAR(5) NOT NULL,
  `nama_matkul` VARCHAR(30) NOT NULL,
  `sks` INT NOT NULL,
  PRIMARY KEY (`kode_matkul`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Sample data
INSERT INTO `matkul` (`kode_matkul`, `nama_matkul`, `sks`) VALUES
('FIS02', 'Fisika', 2),
('JRM05', 'Jaringan Komputer', 3),
('MTK01', 'Matematika Dasar', 3),
('PGR03', 'Pemrograman Web', 4),
('SBD04', 'Sistem Basis Data', 3);

-- ENABLE FK AGAIN
SET FOREIGN_KEY_CHECKS = 1;
```

## 5. Jalankan Server Development
```
php spark serve
```
Server akan berjalan di http://localhost:8080

## 6. Cek Endpoint API Menggunakan Postman
Gunakan Postman untuk mengetes endpoint berikut:

A. Mahasiswa
- GET mahasiswa : http://localhost:8080/mahasiswa
- POST mahasiswa : http://localhost:8080/mahasiswa
- PUT mahasiswa : http://localhost:8080/mahasiswa/{npm}
- DELETE mahasiswa : http://localhost:8080/mahasiswa/{npm}

B. Matkul
- GET matkul : http://localhost:8080/matkul
- POST matkul : http://localhost:8080/matkul
- PUT matkul : http://localhost:8080/matkul/{kode_matkul}
- DELETE matkul : http://localhost:8080/matkul/{kode_matkul}


# 🛠️ Langkah Eksekusi Frontend Laravel
Berikut ini adalah tahapan yang dilakukan untuk membangun frontend Laravel pada tugas UAS:

## 1. Install Laravel
Terdapat dua cara untuk menginstal Laravel,  gunakan salah satu saja:

✅ Cara 1: Menggunakan Composer (umum dan direkomendasikan)
```
composer create-project laravel/laravel frontend-uas-230102015
```

✅ Cara 2: Menggunakan Laravel Installer (jika sudah terpasang)
```
laravel new frontend-uas-230102015
```
Keterangan:

- `frontend-uas-230102015` adalah nama folder project Laravel. Silakan ganti sesuai kebutuhan.

- Setelah berhasil, masuk ke folder project:
```
cd frontend-uas-230102015
```

## 2. Buka Kode di Visual Studio Code
```
code .
```

## 3. Buat Controller
```
php artisan make:controller MahasiswaController
php artisan make:controller MatkulController
```
## 4. Pasang Template Star Bootstrap
- Unduh template Star Bootstrap
- Ekstrak dan salin folder `startbootstrap-sb-admin-2-gh-pages` ke folder `public/`
- Tambahkan link CSS dan JS ke `layouts/app.blade.php`

## 5. Struktur Folder View
```
resources/views/
├── layouts/
│   └── app.blade.php         # Layout utama
├── dashboard/
│   └── index.blade.php       # Tampilan dashboard
├── mahasiswa/
│   ├── index.blade.php       # Lihat mahasiswa
│   ├── create.blade.php      # Tambah mahasiswa
│   └── edit.blade.php        # Edit mahasiswa
└── matkul/
    ├── index.blade.php       # Lihat matkul
    ├── create.blade.php      # Tambah matkul
    └── edit.blade.php        # Edit matkul
```

## 6. 🎁 Fitur Tambahan (Bonus Kreativitas)
### ✅ Tampilan Tanggal Hari Ini di Dashboard
Menampilkan tanggal secara otomatis di bagian dashboard seperti:
```
Hari ini: Friday, 13 June 2025
```

## 7. Jalankan Server Development
Untuk menjalankan frontend Laravel-nya dalam mode development, gunakan perintah berikut:
```
php artisan serve
```
Setelah itu akan muncul output seperti ini di terminal:
```
Starting Laravel development server: http://127.0.0.1:8000
```
Lalu bisa akses frontend-nya di browser lewat:
```
http://localhost:8000
```
### 📌 Catatan tambahan
Jika sudah mengganti port Laravel di .env atau ingin menjalankan di port tertentu, bisa pakai:
```
php artisan serve --port=9700
```
Ini sering dipakai jika port 8000 sudah digunakan aplikasi lain.


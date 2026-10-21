# Tugas PHP 1 - Form Processing & Struktur Kendali

Repositori ini berisi implementasi materi form processing dan struktur kendali menggunakan bahasa pemrograman PHP.

## Fitur
- Form input interaktif:
  - **Nama Lengkap**
  - **Alamat Email**
  - **Nilai Ujian**
- Sanitasi dan validasi input data (`htmlspecialchars`, `filter_input`).
- Struktur kendali kelulusan:
  - Nilai ujian `> 70` $\rightarrow$ **Lulus**
  - Nilai ujian `<= 70` $\rightarrow$ **Remedial**
- Tampilan antarmuka responsif dan modern.

## Cara Menjalankan

### Menggunakan PHP Built-in Server
1. Buka terminal di direktori proyek ini.
2. Jalankan perintah:
   ```bash
   php -S localhost:8000
   ```
3. Buka browser dan kunjungi `http://localhost:8000`.

### Menggunakan XAMPP
1. Salin atau pindahkan folder proyek ke `htdocs` (misal: `C:\xampp\htdocs\tugasphp1` atau `D:\xampp\htdocs\tugasphp1`).
2. Aktifkan modul **Apache** melalui XAMPP Control Panel.
3. Akses melalui browser pada URL `http://localhost/tugasphp1`.

# SKILLSYNC
Skillsynce adalah platform pemetaan dan sinkronisasi kompetensi mahasiswa dengan kebutuhan industri. Jadi semua fitur berpusat pada pengukuran skill, analisis kesenjangan, dan peningkatan kompetensi.

## Deskripsi
SkillSync merupakan platform edukasi yang digunakan untuk membantu pengguna dalam memetakan kompetensi, skill, dan career path. 

Aplikasi ini dibuat sebagai bagian dari studi kasus pada mata kuliah Pemrograman Web, Manajemen Proyek Sistem Informasi (MPSI), dan E-Business, serta diimplementasikan dalam bentuk website.

Pada tugas ini, sistem SkillSync dikembangkan dengan menambahkan fitur Session dan Cookies untuk mengelola proses login pengguna.

---

## Fitur Sistem
Fitur yang terdapat pada website SkillSync:
- Login User
- Logout
- Session Login
- Cookies (Remember Me)
- Session Timeout (Auto Logout)
- Koneksi Database 

---

## Implementasi Session
Session digunakan untuk menyimpan data login pengguna di server sehingga pengguna tetap dalam kondisi login selama session masih aktif.

Session digunakan pada:
- Menyimpan ID User
- Menyimpan Nama User
- Menjaga status login
- Session timeout (logout otomatis)

Contoh penggunaan session pada kode:
```php
session_start();
$_SESSION['id_user'] = $data['id_user'];
$_SESSION['nama'] = $data['nama'];
```
## Implementasi Cookies
Cookies digunakan pada fitur **Remember Me** saat login. 
Jika pengguna mencentang Remember Me, maka email pengguna akan disimpan pada browser selama beberapa waktu sehingga pengguna tidak perlu menginput email kembali saat login.

Implementasi cookies terdapat pada file:
- login.php

Contoh kode implementasi cookies pada login.php:
```php
if (isset($_POST['remember'])) {
    setcookie("email_user", $email, time() + (86400 * 7), "/");
}
```
## Perbedaan Session dan Cookies

| Session | Cookies |
|--------|--------|
| Disimpan di Server | Disimpan di Browser |
| Untuk menyimpan data login | Untuk remember me |
| Lebih aman | Kurang aman |
| Mengatur hak akses | Menyimpan data sementara |

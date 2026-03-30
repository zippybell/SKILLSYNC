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
- Koneksi Database MySQL

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

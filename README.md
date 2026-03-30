SKILLSYNC
Skillsync merupakan platform edukasi pemetaan kompetensi yang menganalisis kesenjangan skill yang dimiliki dengan kebutuhan industri
SKILLSYNC

 Deskripsi
SkillSync merupakan platform edukasi pemetaan kompetensi yang menganalisis kesenjangan skill yang dimiliki mahasiswa dengan kebutuhan industri. Sistem ini membantu pengguna mengetahui skill yang dimiliki, skill yang dibutuhkan, serta memberikan gambaran career path yang sesuai.

Pada pengembangan sistem ini, ditambahkan fitur autentikasi login menggunakan Session dan Cookies untuk mengelola data pengguna dan meningkatkan keamanan serta kenyamanan pengguna.

---

 Fitur Sistem
- Login
- Logout
- Session Login
- Session Timeout (Logout otomatis)
- Remember Me (Cookies)
- Dashboard Skill
- Career Gap Scanner

---

 Implementasi Session
Session digunakan untuk:
- Menyimpan data pengguna saat login
- Menjaga status login pengguna
- Menampilkan nama pengguna pada halaman utama
- Mengatur session timeout (logout otomatis jika tidak aktif)
- Menghapus session saat logout

Session diimplementasikan pada file:
- `login.php`
- `index.php`
- `logout.php`

Contoh kode session:
```php
$_SESSION['id_user'] = $data['id_user'];
$_SESSION['nama'] = $data['nama'];
$_SESSION['expired'] = time() + 30;

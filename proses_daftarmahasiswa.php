<?php
session_start();

// Koneksi
include 'koneksi.php';

// Ambil data
$nama       = $_POST['nama'];
$nim        = $_POST['nim'];
$jurusan    = $_POST['jurusan'];
$email      = $_POST['email'];
$password   = $_POST['password'];
$konfirmasi = $_POST['konfirmasi'];

// Validasi password
if ($password !== $konfirmasi) {
    echo "<script>
        alert('Konfirmasi password tidak sesuai!');
        window.location='daftar_mahasiswa.php';
    </script>";
    exit;
}

// Hash password
$password_hash = $password;

// Cek email
$cek = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>
        alert('Email sudah terdaftar!');
        window.location='daftar_mahasiswa.php';
    </script>";
    exit;
}

// Simpan ke tabel user
$query = "INSERT INTO users (nama, nim, jurusan, email, password, role) 
          VALUES ('$nama', '$nim', '$jurusan', '$email', '$password_hash', 'mahasiswa')";

if (mysqli_query($koneksi, $query)) {
    echo "<script>
        alert('Pendaftaran berhasil!');
        window.location='login_form.php';
    </script>";
} else {
    echo "Gagal: " . mysqli_error($koneksi);
}
?>
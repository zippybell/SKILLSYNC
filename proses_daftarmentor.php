<?php
session_start();
include 'koneksi.php';

$nama       = $_POST['nama'];
$nip        = $_POST['nip'];
$institusi  = $_POST['institusi'];
$keahlian   = $_POST['keahlian'];
$email      = $_POST['email'];
$password   = $_POST['password'];
$konfirmasi = $_POST['konfirmasi'];

// cek password
if ($password !== $konfirmasi) {
    echo "<script>alert('Password tidak sama!'); window.location='daftar_mentor.php';</script>";
    exit;
}

// hash password
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// cek email
$cek = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Email sudah terdaftar!'); window.location='daftar_mentor.php';</script>";
    exit;
}

// insert ke tabel users
$query = "INSERT INTO users (nama, nip, institusi, bidang_keahlian, email, password, role) 
VALUES ('$nama','$nip','$institusi','$keahlian','$email','$password_hash','mentor')";

if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Pendaftaran berhasil!'); window.location='login_form.php';</script>";
} else {
    echo "Gagal: " . mysqli_error($koneksi);
}
?>
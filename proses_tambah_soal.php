<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

$kategori   = $_POST['kategori'] ?? '';
$pertanyaan = $_POST['pertanyaan'] ?? '';
$opsi_a     = $_POST['opsi_a'] ?? '';
$opsi_b     = $_POST['opsi_b'] ?? '';
$opsi_c     = $_POST['opsi_c'] ?? '';
$opsi_d     = $_POST['opsi_d'] ?? '';

// validasi sederhana
if($pertanyaan == '' || $opsi_a == ''){
    echo "Data tidak lengkap!";
    exit;
}

$query = mysqli_query($koneksi, "
    INSERT INTO soal_kepribadian 
    (kategori, pertanyaan, opsi_a, opsi_b, opsi_c, opsi_d)
    VALUES 
    ('$kategori', '$pertanyaan', '$opsi_a', '$opsi_b', '$opsi_c', '$opsi_d')
");

if($query){
    header("Location: admin_soal_kepribadian.php");
} else {
    echo "Gagal: " . mysqli_error($koneksi);
}
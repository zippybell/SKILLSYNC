<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

$skill_id = $_POST['skill_id'] ?? '';
$pertanyaan = $_POST['pertanyaan'] ?? '';
$opsi_a = $_POST['opsi_a'] ?? '';
$opsi_b = $_POST['opsi_b'] ?? '';
$opsi_c = $_POST['opsi_c'] ?? '';
$opsi_d = $_POST['opsi_d'] ?? '';
$jawaban = $_POST['jawaban_benar'] ?? '';

// validasi
if($pertanyaan == '' || $opsi_a == '' || $jawaban == ''){
    echo "Data tidak lengkap!";
    exit;
}

$query = mysqli_query($koneksi, "
    INSERT INTO soal_skill 
    (skill_id, pertanyaan, opsi_a, opsi_b, opsi_c, opsi_d, jawaban_benar)
    VALUES 
    ('$skill_id', '$pertanyaan', '$opsi_a', '$opsi_b', '$opsi_c', '$opsi_d', '$jawaban')
");

if($query){
    header("Location: admin_soal_skill.php");
} else {
    echo "Gagal: " . mysqli_error($koneksi);
}
?>
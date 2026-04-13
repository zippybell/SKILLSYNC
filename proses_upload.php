<?php
session_start();
include 'koneksi.php';

$mentor_id = $_SESSION['user_id'];
$judul     = $_POST['judul'];
$kategori  = $_POST['kategori'];

// file
$file_name = $_FILES['file']['name'];
$tmp       = $_FILES['file']['tmp_name'];
$size      = $_FILES['file']['size'];

// folder tujuan
$folder = "uploads/";
$path   = $folder . $file_name;

// upload file
move_uploaded_file($tmp, $path);

// convert size ke KB
$ukuran = round($size / 1024) . " KB";

// simpan ke database
$query = "INSERT INTO upload_mentor 
(mentor_id, judul, kategori, file, ukuran) 
VALUES 
('$mentor_id', '$judul', '$kategori', '$file_name', '$ukuran')";

if(mysqli_query($koneksi, $query)){
    header("Location: dashboard_mentor.php");
} else {
    echo "Gagal upload: " . mysqli_error($koneksi);
}
?>
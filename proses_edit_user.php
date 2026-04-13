<?php
session_start();
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$role = $_POST['role'];
$jurusan = $_POST['jurusan'];

mysqli_query($koneksi, "
    UPDATE users SET
    nama='$nama',
    email='$email',
    role='$role',
    jurusan='$jurusan'
    WHERE id_user='$id'
");

header("Location: user.php");
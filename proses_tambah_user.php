<?php
session_start();
include 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
$jurusan = $_POST['jurusan'];

mysqli_query($koneksi, "
    INSERT INTO users (nama, email, password, role, jurusan)
    VALUES ('$nama', '$email', '$password', '$role', '$jurusan')
");

header("Location: user.php");
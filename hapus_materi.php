<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM upload_mentor WHERE id='$id'"));

// HAPUS FILE (FIX KOLOM)
unlink("uploads/" . $data['file']);

mysqli_query($koneksi, "DELETE FROM upload_mentor WHERE id='$id'");

header("Location: dashboard_mentor.php");
exit;
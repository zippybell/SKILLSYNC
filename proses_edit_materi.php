<?php
include 'koneksi.php';

$id = $_POST['id'];
$judul = $_POST['judul'];

if($_FILES['file']['name'] != ""){
    $file = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];

    move_uploaded_file($tmp, "uploads/" . $file);

    mysqli_query($koneksi, "UPDATE upload_mentor 
        SET judul='$judul', file='$file' 
        WHERE id='$id'");
} else {
    mysqli_query($koneksi, "UPDATE upload_mentor 
        SET judul='$judul' 
        WHERE id='$id'");
}

header("Location: dashboard_mentor.php");
exit;
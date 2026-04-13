<?php
session_start();
include 'koneksi.php';

if(!isset($_GET['id'])){
    header("Location: admin_soal_kepribadian.php");
    exit;
}

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM soal_kepribadian WHERE id='$id'");

header("Location: admin_soal_kepribadian.php");
exit;
?>
<?php
include 'koneksi.php';

$id         = $_POST['id'];
$kategori   = $_POST['kategori'];
$pertanyaan = $_POST['pertanyaan'];
$opsi_a     = $_POST['opsi_a'];
$opsi_b     = $_POST['opsi_b'];
$opsi_c     = $_POST['opsi_c'];
$opsi_d     = $_POST['opsi_d'];

mysqli_query($koneksi, "
    UPDATE soal_kepribadian SET
    kategori='$kategori',
    pertanyaan='$pertanyaan',
    opsi_a='$opsi_a',
    opsi_b='$opsi_b',
    opsi_c='$opsi_c',
    opsi_d='$opsi_d'
    WHERE id='$id'
");

header("Location: admin_soal_kepribadian.php");
exit;
?>
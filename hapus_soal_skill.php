<?php
include 'koneksi.php';

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM soal_skill WHERE id='$id'");

header("Location: admin_soal_skill.php");
?>
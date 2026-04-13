<?php
$koneksi = mysqli_connect("localhost", "root", "", "skillsync_db");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
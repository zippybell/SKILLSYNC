<?php
session_start();
include 'koneksi.php';

$user_id = $_SESSION['user_id'];
$skill_id = $_GET['skill_id'];
$paket = $_GET['paket'];

// ambil hasil terakhir
$query = mysqli_query($koneksi, "
    SELECT * FROM hasil_tes 
    WHERE user_id='$user_id' AND skill_id='$skill_id'
    ORDER BY id_hasil DESC LIMIT 1
");
$data = mysqli_fetch_assoc($query);

$hasil_id = $data['id_hasil'];

// =======================
// CEK JENIS PEMBAYARAN
// =======================

// 1. BAYAR PER HASIL
if($paket == "Bayar Per Hasil"){

    mysqli_query($koneksi, "
        INSERT INTO pembayaran_hasil (user_id, hasil_id)
        VALUES ('$user_id', '$hasil_id')
    ");
}

// 2. PREMIUM
if($paket == "Premium"){

    $expired = date('Y-m-d', strtotime('+30 days'));

    mysqli_query($koneksi, "
        INSERT INTO akses_user (user_id, premium_expired)
        VALUES ('$user_id', '$expired')
        ON DUPLICATE KEY UPDATE premium_expired='$expired'
    ");
}

// balik ke hasil tes
header("Location: hasil_tes_skill.php?skill_id=".$skill_id);
exit;
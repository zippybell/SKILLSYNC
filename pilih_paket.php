<?php
session_start();
include 'koneksi.php';

$user_id = $_SESSION['user_id'];
$skill_id = $_GET['skill_id']; // biar tau mau bayar hasil yg mana
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pilih Paket</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 min-h-screen">

<!-- NAVBAR -->
<div class="bg-white px-6 py-4 shadow flex justify-between items-center">
    <div class="flex items-center gap-2">
        <div class="w-8 h-8 bg-blue-500 text-white flex items-center justify-center rounded">S</div>
        <h1 class="text-blue-600 font-semibold">SkillSync</h1>
    </div>

    <a href="hasil_tes_skill.php?skill_id=<?= $skill_id ?>" 
       class="border px-4 py-2 rounded-lg text-blue-600">
       ← Kembali
    </a>
</div>

<div class="max-w-6xl mx-auto p-6">

    <!-- STEP -->
    <div class="flex items-center justify-center gap-6 text-sm text-blue-500 mb-10">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-blue-500 text-white rounded-full flex items-center justify-center">1</div>
            Pilih Paket
        </div>
        <div class="w-10 h-0.5 bg-blue-200"></div>
        <div class="flex items-center gap-2 opacity-50">
            <div class="w-8 h-8 bg-blue-200 rounded-full flex items-center justify-center">2</div>
            Metode Bayar
        </div>
        <div class="w-10 h-0.5 bg-blue-200"></div>
        <div class="flex items-center gap-2 opacity-50">
            <div class="w-8 h-8 bg-blue-200 rounded-full flex items-center justify-center">3</div>
            Konfirmasi
        </div>
    </div>

    <!-- TITLE -->
    <div class="text-center mb-10">
        <h2 class="text-2xl font-bold text-blue-700 mb-2">
            Pilih Paket Pembayaran
        </h2>
        <p class="text-blue-500">
            Pilih paket yang sesuai dengan kebutuhan Anda
        </p>
    </div>

    <!-- CARD -->
    <div class="grid md:grid-cols-2 gap-6">

        <!-- BAYAR PER HASIL -->
        <div class="bg-white border rounded-2xl p-8 shadow-sm">

            <span class="bg-blue-100 text-blue-600 text-xs px-3 py-1 rounded-full">
                Fleksibel
            </span>

            <h3 class="text-blue-700 font-semibold mt-4 mb-2 text-lg">
                Bayar Per Hasil
            </h3>

            <p class="text-blue-500 mb-6">
                Bayar hanya untuk hasil yang Anda butuhkan
            </p>

            <h1 class="text-4xl font-bold text-blue-700 mb-2">
                Rp 25.000 <span class="text-base font-normal">/ hasil</span>
            </h1>

            <ul class="text-sm text-blue-700 space-y-2 mt-6 mb-8">
                <li>✔ 1x Akses fitur pilihan</li>
                <li>✔ Hasil tes tersimpan permanen</li>
                <li>✔ Download laporan PDF</li>
                <li>✔ Valid 30 hari</li>
            </ul>

            <a href="pembayaran.php?paket=Bayar Per Hasil&harga=25000&skill_id=<?= $skill_id ?>"
               class="block text-center border border-blue-400 text-blue-600 py-2 rounded-lg">
               Pilih Paket Ini
            </a>

        </div>

        <!-- PREMIUM -->
        <div class="bg-white border-2 border-blue-400 rounded-2xl p-8 shadow relative">

            <!-- badge -->
            <span class="absolute -top-3 left-1/2 -translate-x-1/2 bg-yellow-400 text-white text-xs px-3 py-1 rounded-full">
                ⭐ Paling Populer
            </span>

            <span class="bg-yellow-100 text-yellow-600 text-xs px-3 py-1 rounded-full">
                Hemat 60%
            </span>

            <h3 class="text-blue-700 font-semibold mt-4 mb-2 text-lg">
                Berlangganan Bulanan
            </h3>

            <p class="text-blue-500 mb-6">
                Akses unlimited ke semua fitur platform
            </p>

            <h1 class="text-4xl font-bold text-blue-700 mb-1">
                Rp 99.000 <span class="text-base font-normal">/ bulan</span>
            </h1>

            <p class="text-sm text-blue-400 mb-6">
                Setara Rp 3.300/hari
            </p>

            <ul class="text-sm text-blue-700 space-y-2 mb-8">
                <li>✔ Unlimited akses semua fitur</li>
                <li>✔ Tes kompetensi unlimited</li>
                <li>✔ Career gap scanner unlimited</li>
                <li>✔ Upload proyek unlimited</li>
                <li>✔ Rekomendasi pembelajaran personal</li>
                <li>✔ Prioritas support</li>
                <li>✔ Sertifikat digital</li>
                <li>✔ Akses materi eksklusif</li>
            </ul>

           <a href="pembayaran.php?paket=Premium&harga=99000&skill_id=<?= $skill_id ?>" 
            class="block text-center bg-blue-500 text-white py-3 rounded-lg font-semibold">
             ⚡ Pilih Paket Ini
            </a>
        </div>

    </div>

    <!-- FOOTER INFO -->
    <div class="flex justify-center gap-10 mt-10 text-sm text-blue-500">
        <span>🛡 Pembayaran Aman</span>
        <span>🔒 Data Terenkripsi</span>
        <span>✔ Garansi 7 Hari</span>
    </div>

</div>

</body>
</html>
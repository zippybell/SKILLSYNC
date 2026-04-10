<?php
session_start();

// proteksi role perusahaan
if (!isset($_SESSION['id_user']) || $_SESSION['role'] != 'mentor') {
    header("Location: login_form.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Perusahaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<!-- NAVBAR -->
<nav class="bg-indigo-600 text-white p-4 flex justify-between">
    <h1 class="text-xl font-bold">Dashboard Perusahaan</h1>

    <div>
        <span class="mr-4">Halo, <?php echo $_SESSION['nama']; ?></span>
        <a href="logout.php" class="bg-red-500 px-3 py-1 rounded">Logout</a>
    </div>
</nav>

<!-- CONTENT -->
<div class="max-w-5xl mx-auto mt-10 px-6">

    <h2 class="text-2xl font-bold mb-6">Panel HRD / Perusahaan</h2>

    <div class="grid md:grid-cols-2 gap-6">

        <!-- LIHAT SKILL MAHASISWA -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold mb-2">Data Skill Mahasiswa</h3>
            <p class="text-gray-600 mb-4">
                Melihat daftar skill yang dimiliki mahasiswa.
            </p>
            <a href="lihat_skill.php" class="bg-indigo-600 text-white px-4 py-2 rounded">
                Lihat Data
            </a>
        </div>

        <!-- HASIL TES -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold mb-2">Hasil Tes Mahasiswa</h3>
            <p class="text-gray-600 mb-4">
                Melihat nilai kompetensi mahasiswa.
            </p>
            <a href="lihat_hasil.php" class="bg-blue-600 text-white px-4 py-2 rounded">
                Lihat Hasil
            </a>
        </div>

        <!-- PROYEK -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold mb-2">Proyek Mahasiswa</h3>
            <p class="text-gray-600 mb-4">
                Melihat portofolio proyek mahasiswa.
            </p>
            <a href="lihat_proyek.php" class="bg-green-600 text-white px-4 py-2 rounded">
                Lihat Proyek
            </a>
        </div>

        <!-- POSISI KERJA / SKILL YANG DIBUTUHKAN -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold mb-2">Kebutuhan Skill</h3>
            <p class="text-gray-600 mb-4">
                Menentukan skill yang dibutuhkan perusahaan.
            </p>
            <a href="posisi.php" class="bg-purple-600 text-white px-4 py-2 rounded">
                Kelola Posisi
            </a>
        </div>

    </div>

</div>

</body>
</html>
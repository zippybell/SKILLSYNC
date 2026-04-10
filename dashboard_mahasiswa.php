<?php
session_start();

// proteksi role mahasiswa
if (!isset($_SESSION['id_user']) || $_SESSION['role'] != 'mahasiswa') {
    header("Location: login_form.php");
    exit;
}

// cek waktu session
if (isset($_SESSION['expired']) && time() > $_SESSION['expired']) {
    session_unset();
    session_destroy();
    header("Location: login_form.php");
    exit();
}

// reset waktu
$_SESSION['expired'] = time() + 3600;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<!-- NAVBAR -->
<nav class="bg-white shadow-md p-4 flex justify-between">
    <h1 class="text-xl font-bold text-blue-600">SkillSync</h1>

    <div>
        <span class="mr-4">Halo, <?php echo $_SESSION['nama']; ?></span>
        <a href="logout.php" class="bg-red-500 text-white px-3 py-1 rounded">Logout</a>
    </div>
</nav>

<!-- DASHBOARD -->
<div class="max-w-5xl mx-auto mt-10 px-6">

    <h2 class="text-2xl font-bold mb-6">Dashboard Mahasiswa</h2>

    <!-- MENU FITUR -->
    <div class="grid md:grid-cols-2 gap-6">

        <!-- TES DIAGNOSTIK -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold mb-2">Tes Diagnostik</h3>
            <p class="text-gray-600 mb-4">
                Isi tes untuk mengetahui tingkat penguasaan skill kamu.
            </p>
            <a href="tes.php" class="bg-blue-600 text-white px-4 py-2 rounded">
                Mulai Tes
            </a>
        </div>

        <!-- UPLOAD PROYEK -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold mb-2">Upload Proyek</h3>
            <p class="text-gray-600 mb-4">
                Tambahkan proyek sebagai bukti kompetensi kamu.
            </p>
            <a href="proyek.php" class="bg-green-600 text-white px-4 py-2 rounded">
                Upload Proyek
            </a>
        </div>

        <!-- PETA KOMPETENSI -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold mb-2">Peta Kompetensi</h3>
            <p class="text-gray-600 mb-4">
                Lihat level skill kamu berdasarkan hasil tes.
            </p>
            <a href="peta.php" class="bg-purple-600 text-white px-4 py-2 rounded">
                Lihat Peta
            </a>
        </div>

        <!-- CAREER GAP -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold mb-2">Career Gap</h3>
            <p class="text-gray-600 mb-4">
                Analisis gap skill dengan kebutuhan industri.
            </p>
            <a href="gap.php" class="bg-indigo-600 text-white px-4 py-2 rounded">
                Cek Gap
            </a>
        </div>

    </div>

</div>

</body>
</html>
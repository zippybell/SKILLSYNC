<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

if(time() > $_SESSION['expired']){
    session_destroy();
    header("Location: login.php");
    exit;
}

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<!-- NAVBAR -->
<nav class="bg-blue-600 text-white p-4 flex justify-between">
    <h1 class="text-xl font-bold">Admin SkillSync</h1>

    <div>
        <span class="mr-4">Halo, <?php echo $_SESSION['nama']; ?></span>
        <a href="logout.php" class="bg-red-500 px-3 py-1 rounded">Logout</a>
    </div>
</nav>

<!-- CONTENT -->
<div class="max-w-5xl mx-auto mt-10 px-6">

    <h2 class="text-2xl font-bold mb-6">Dashboard Admin</h2>

    <div class="grid md:grid-cols-2 gap-6">

        <!-- SOAL KEPRIBADIAN -->
<div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
    <h3 class="text-lg font-semibold mb-2">Soal Kepribadian</h3>
    <p class="text-gray-600 mb-4">
        Tambah, edit, dan hapus soal tes kepribadian.
    </p>
    <a href="admin_soal_kepribadian.php" class="bg-yellow-500 text-white px-4 py-2 rounded">
        Kelola Soal
    </a>
</div>
        <!-- DATA USER -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold mb-2">Manajemen User</h3>
            <p class="text-gray-600 mb-4">
                Lihat dan kelola data pengguna.
            </p>
            <a href="user.php" class="bg-green-600 text-white px-4 py-2 rounded">
                Kelola User
            </a>
        </div>

        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
    <h3 class="text-lg font-semibold mb-2">Soal Kompetensi</h3>
    <p class="text-gray-600 mb-4">
        Kelola soal tes skill kompetensi
    </p>
    <a href="admin_soal_skill.php" class="bg-blue-600 text-white px-4 py-2 rounded">
        Kelola Soal
    </a>
</div>

        <!-- CRUD SKILL -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold mb-2">Manajemen Skill</h3>
            <p class="text-gray-600 mb-4">
                Tambah, edit, dan hapus data skill.
            </p>
            <a href="skill.php" class="bg-blue-600 text-white px-4 py-2 rounded">
                Kelola Skill
            </a>
        </div>

        <!-- DATA HASIL TES -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold mb-2">Hasil Tes</h3>
            <p class="text-gray-600 mb-4">
                Lihat hasil tes mahasiswa.
            </p>
            <a href="hasil_tes.php" class="bg-purple-600 text-white px-4 py-2 rounded">
                Lihat Hasil
            </a>
        </div>

        <!-- DATA PROYEK -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-lg font-semibold mb-2">Data Proyek</h3>
            <p class="text-gray-600 mb-4">
                Melihat proyek yang diupload mahasiswa.
            </p>
            <a href="proyek_admin.php" class="bg-indigo-600 text-white px-4 py-2 rounded">
                Lihat Proyek
            </a>
        </div>

    </div>

</div>

</body>
</html>
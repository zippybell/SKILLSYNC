<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Soal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 min-h-screen">

<!-- NAVBAR -->
<div class="bg-white px-6 py-4 shadow flex items-center gap-2">
    <div class="w-8 h-8 bg-blue-500 text-white flex items-center justify-center rounded">S</div>
    <h1 class="text-blue-600 font-semibold">SkillSync Admin</h1>
</div>

<div class="max-w-2xl mx-auto p-6">

    <h2 class="text-xl font-bold text-blue-700 mb-6">Tambah Soal Kepribadian</h2>

    <form method="POST" action="proses_tambah_soal.php" class="bg-white p-6 rounded-xl shadow space-y-4">

        <!-- KATEGORI -->
        <div>
            <label class="text-blue-600 text-sm">Kategori</label>
            <input type="text" name="kategori" required
                class="w-full border p-2 rounded">
        </div>

        <!-- PERTANYAAN -->
        <div>
            <label class="text-blue-600 text-sm">Pertanyaan</label>
            <textarea name="pertanyaan" required
                class="w-full border p-2 rounded"></textarea>
        </div>

        <!-- OPSI -->
        <div>
            <label class="text-blue-600 text-sm">Opsi A</label>
            <input type="text" name="opsi_a" required class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="text-blue-600 text-sm">Opsi B</label>
            <input type="text" name="opsi_b" required class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="text-blue-600 text-sm">Opsi C</label>
            <input type="text" name="opsi_c" required class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="text-blue-600 text-sm">Opsi D</label>
            <input type="text" name="opsi_d" required class="w-full border p-2 rounded">
        </div>

        <!-- BUTTON -->
        <button type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded-lg">
            Simpan Soal
        </button>

    </form>

</div>

</body>
</html>
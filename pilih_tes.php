<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tes Diagnostik - SkillSync</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 text-gray-800 min-h-screen flex flex-col">

<!-- NAVBAR -->
<div class="bg-white shadow-sm px-6 py-4 flex justify-between items-center">
    <div class="flex items-center gap-2">
       <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center text-white font-bold">
                S
            </div>
        <h1 class="text-xl font-semibold text-blue-600">SkillSync</h1>
    </div>

    <div class="flex gap-3">
        <a href="login.php" class="px-4 py-2 border border-blue-500 text-blue-500 rounded-lg hover:bg-blue-50">Login</a>
        <a href="register.php" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Daftar</a>
    </div>
</div>

<!-- CONTENT -->
<div class="flex-grow px-6 py-10">

    <!-- BACK -->
    <a href="dashboard_mahasiswa.php" class="text-blue-500 hover:underline mb-6 inline-block">← Kembali</a>

    <!-- TITLE -->
    <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-blue-700">Tes Diagnostik Awal</h2>
        <p class="text-blue-500 mt-2">
            Ikuti tes untuk mengetahui kepribadian dan level skill Anda
        </p>
    </div>

    <!-- CARD CONTAINER -->
    <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">

        <!-- CARD 1 -->
        <div class="bg-white p-8 rounded-2xl shadow-md text-center">
            <div class="bg-blue-100 w-20 h-20 mx-auto flex items-center justify-center rounded-full text-3xl">
                🧠
            </div>

            <h3 class="text-xl font-semibold text-blue-600 mt-5">Test Kepribadian</h3>

            <p class="text-blue-500 mt-3 text-sm leading-relaxed">
                Kenali tipe kepribadian Anda melalui serangkaian pertanyaan yang dirancang 
                untuk memahami karakteristik dan preferensi kerja Anda
            </p>

            <div class="text-left mt-5 text-sm text-blue-600 space-y-2">
                <p>✓ 20 pertanyaan</p>
                <p>✓ Durasi ±10 menit</p>
                <p>✓ Analisis kepribadian</p>
                <p>✓ Rekomendasi karir</p>
            </div>

            <a href="tes_kepribadian.php" 
               class="block mt-6 bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
               Mulai Test Kepribadian
            </a>
        </div>

        <!-- CARD 2 -->
        <div class="bg-white p-8 rounded-2xl shadow-md text-center">
            <div class="bg-blue-100 w-20 h-20 mx-auto flex items-center justify-center rounded-full text-3xl">
                &lt;/&gt;
            </div>

            <h3 class="text-xl font-semibold text-blue-600 mt-5">Test Skill Kompetensi</h3>

            <p class="text-blue-500 mt-3 text-sm leading-relaxed">
                Uji kemampuan teknis Anda melalui studi kasus dan proyek sesuai 
                dengan jurusan yang Anda pilih
            </p>

            <div class="text-left mt-5 text-sm text-blue-600 space-y-2">
                <p>✓ Pilih jurusan Anda</p>
                <p>✓ Studi kasus relevan</p>
                <p>✓ Evaluasi skill teknis</p>
                <p>✓ Pemetaan kompetensi</p>
            </div>

            <a href="pilih_tes_skill.php" 
               class="block mt-6 bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
               Mulai Test Skill
            </a>
        </div>

    </div>

    <!-- NOTE -->
    <div class="max-w-4xl mx-auto mt-10 bg-white p-5 rounded-xl shadow text-center text-blue-600 text-sm">
        💡 <span class="font-semibold">Catatan:</span> 
        Hasil tes akan ditampilkan di halaman <span class="font-semibold">Peta Kompetensi Mahasiswa</span> 
        dalam bentuk grafik dan pemetaan skill
    </div>

</div>

<!-- FOOTER -->
<div class="bg-white text-center py-6 text-sm text-blue-600">
    <p class="font-semibold">Hubungi Kami</p>
    <p>Email: info@skillsync.com</p>
    <p>Telepon: +62 812-3456-7890</p>
    <p class="mt-3 text-gray-500">
        © 2026 SkillSync. Platform pembelajaran untuk masa depan Anda.
    </p>
</div>

</body>
</html>
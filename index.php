<?php
session_start();

// cek expired aja (opsional)
if (isset($_SESSION['expired']) && time() > $_SESSION['expired']) {
    session_unset();
    session_destroy();
}


// cek waktu
if (isset($_SESSION['expired']) && time() > $_SESSION['expired']) {
    session_unset();
    session_destroy();
    header("Location: login.html");
    exit();
}

// reset waktu
$_SESSION['expired'] = time() + 30;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillSync</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800">

<!-- NAVBAR -->
<nav class="bg-white shadow-md fixed w-full z-10">
    <div class="max-w-6xl mx-auto flex justify-between items-center p-4">
        <h1 class="text-2xl font-bold text-blue-600">SkillSync</h1>

        <div class="space-x-6 hidden md:flex items-center">
            <a href="#fitur" class="hover:text-blue-600">Fitur</a>
            <a href="#tentang" class="hover:text-blue-600">Tentang</a>
            <a href="#kontak" class="hover:text-blue-600">Kontak</a>

            <?php if (isset($_SESSION['nama'])): ?>
                <span class="ml-4 font-medium">Halo, <?php echo $_SESSION['nama']; ?></span>
                <a href="logout.php" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">Logout</a>
            <?php else: ?>
                <a href="login.html" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white text-center pt-32 pb-24">
    <h1 class="text-5xl font-extrabold mb-4">Upgrade Skillmu 🚀</h1>
    <p class="text-lg mb-8">Kelola, pelajari, dan kembangkan skill dengan cara yang lebih terarah</p>

    <?php if (!isset($_SESSION['nama'])): ?>
        <a href="login.html" class="bg-white text-blue-600 px-8 py-3 rounded-xl font-semibold shadow hover:scale-105 transition">
            Mulai Sekarang
        </a>
    <?php else: ?>
        <p class="text-green-200 text-lg font-semibold">Selamat datang kembali 🎉</p>
    <?php endif; ?>
</section>

<!-- FITUR -->
<section id="fitur" class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto text-center px-6">
        <h2 class="text-3xl font-bold mb-4">Fitur Utama SkillMap Kampus</h2>
        <p class="text-gray-600 mb-12 max-w-2xl mx-auto">
            Platform ini berfokus pada pemetaan kompetensi mahasiswa dan analisis kesenjangan skill terhadap kebutuhan industri.
        </p>

        <div class="grid md:grid-cols-3 gap-8">
    
    <!-- PETA KOMPETENSI -->
    <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition text-left">
        <div class="mb-4 text-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-6h13M9 7h13M5 7h.01M5 17h.01M3 12h18" />
            </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">Peta Kompetensi Mahasiswa</h3>
        <p class="text-gray-600">
            Menampilkan skill berdasarkan program studi lengkap dengan tingkat penguasaan.
        </p>
    </div>

    <!-- GAP SCANNER (PALING MENONJOL) -->
    <div class="bg-blue-600 text-white p-8 rounded-2xl shadow-2xl scale-105 hover:scale-110 transition text-left">
        <div class="mb-4 text-white drop-shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3M12 2a10 10 0 100 20 10 10 0 000-20z" />
            </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">Career Gap Scanner</h3>
        <p class="text-blue-100">
            Menganalisis gap antara skill mahasiswa dan kebutuhan industri serta memberikan rekomendasi.
        </p>
    </div>

    <!-- RAPOR -->
    <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition text-left">
        <div class="mb-4 text-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v18h18M9 17V9m4 8v-4m4 4v-6" />
            </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">Rapor Kompetensi</h3>
        <p class="text-gray-600">
            Penilaian berbasis proyek yang meningkatkan level skill secara nyata.
        </p>
    </div>

</div>

        </div>

        <!-- SUB FITUR -->
        <div class="mt-16">
            <h3 class="text-xl font-semibold mb-4">Fitur Pendukung</h3>
            <p class="text-gray-600">
                Upload proyek, validasi skill, tes diagnostik, dan rekomendasi pembelajaran.
            </p>
        </div>
    </div>
</section>

<!-- TENTANG -->
<section id="tentang" class="bg-white py-20">
    <div class="max-w-4xl mx-auto text-center px-6">
        <h2 class="text-3xl font-bold mb-6">Tentang SkillSync</h2>
        <p class="text-gray-600 leading-relaxed">
            SkillSync membantu kamu mengelola dan mengembangkan skill agar lebih siap menghadapi dunia kerja.
            Platform ini dirancang untuk memberikan pengalaman belajar yang terarah dan efektif.
        </p>
    </div>
</section>

<!-- KONTAK -->
<section id="kontak" class="py-20 text-center">
    <h2 class="text-3xl font-bold mb-6">Kontak</h2>
    <p class="text-gray-600">Email: skillsync@gmail.com</p>
    <p class="text-gray-600">Instagram: @skillsync.id</p>
</section>

<!-- FOOTER -->
<footer class="bg-gray-900 text-white text-center p-6">
    <p>© 2026 SkillSync. All rights reserved.</p>
</footer>

</body>
</html>
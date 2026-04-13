<?php
session_start();

// ================== CEK ROLE ==================
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: dashboard_admin.php");
        exit;
    } elseif ($_SESSION['role'] == 'mahasiswa') {
        header("Location: dashboard_mahasiswa.php");
        exit;
    } elseif ($_SESSION['role'] == 'perusahaan') {
        header("Location: dashboard_perusahaan.php");
        exit;
    }
}

// ================== CEK EXPIRED ==================
if (isset($_SESSION['expired']) && time() > $_SESSION['expired']) {
    session_unset();
    session_destroy();
    header("Location: login_form.php");
    exit;
}

// ================== RESET SESSION ==================
$_SESSION['expired'] = time() + 3600;
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
<nav class="bg-white shadow-sm fixed w-full z-10">
    <div class="max-w-6xl mx-auto flex justify-between items-center p-4">
        <div class="flex items-center gap-2">
            <div class="w-9 h-9 bg-blue-500 rounded-xl flex items-center justify-center text-white font-bold">
                S
            </div>
            <h1 class="text-lg font-semibold text-blue-500">SkillSync</h1>
        </div>

        <div class="space-x-3">
            <a href="login_form.php" class="border border-blue-400 text-blue-500 px-4 py-1 rounded-lg hover:bg-blue-50">
                Login
            </a>
            <a href="pilih_role.php" class="bg-blue-500 text-white px-4 py-1 rounded-lg hover:bg-blue-600">
                Daftar
            </a>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="bg-[#eef5f9] text-center pt-32 pb-16">
    <h1 class="text-4xl font-semibold text-blue-700 mb-3">
        Selamat Datang di SkillSync
    </h1>
    <p class="text-blue-600">
        Platform pembelajaran online untuk meningkatkan skill Anda
    </p>
</section>

<!-- FITUR -->
<section class="bg-[#eef5f9] pb-20">
    <div class="max-w-6xl mx-auto px-6 text-center">

        <h2 class="text-2xl font-semibold text-blue-700 mb-12">
            Fitur Unggulan
        </h2>

        <div class="grid md:grid-cols-3 gap-8">

            <?php
            $fitur = [
                ["Login & Register","Masuk ke akun untuk akses fitur"],
                ["Peta Kompetensi","Visualisasi skill kamu"],
                ["Career Gap","Analisis gap skill"],
                ["Upload Proyek","Validasi skill"],
                ["Tes Diagnostik","Cek kemampuan awal"],
                ["Rekomendasi","Materi belajar personal"]
            ];

            foreach ($fitur as $item) :
            ?>
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-md">
                    <h3 class="font-semibold text-blue-600 mb-2">
                        <?php echo $item[0]; ?>
                    </h3>
                    <p class="text-sm text-gray-500">
                        <?php echo $item[1]; ?>
                    </p>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-white text-center py-10 text-blue-400 border-t">
    <p>© 2026 SkillSync</p>
</footer>

</body>
</html>
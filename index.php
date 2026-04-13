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

<body class="bg-[#eef5f9] text-gray-800">

<!-- NAVBAR -->
<nav class="bg-white shadow-sm fixed w-full z-10">
    <div class="max-w-6xl mx-auto flex justify-between items-center px-6 py-4">
        
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-blue-500 rounded-xl flex items-center justify-center text-white font-bold text-lg">
                S
            </div>
            <h1 class="text-xl font-semibold text-blue-500">SkillSync</h1>
        </div>

        <div class="space-x-3">
            <a href="login_form.php" class="border border-blue-400 text-blue-500 px-5 py-2 rounded-lg hover:bg-blue-50 transition">
                Login
            </a>
            <a href="pilih_role.php" class="bg-blue-500 text-white px-5 py-2 rounded-lg hover:bg-blue-600 transition">
                Daftar
            </a>
        </div>

    </div>
</nav>

<!-- HERO -->
<section class="text-center pt-36 pb-20">
    <h1 class="text-4xl font-semibold text-blue-700 mb-4">
        Selamat Datang di SkillSync
    </h1>
    <p class="text-blue-600 text-lg">
        Platform pembelajaran online untuk meningkatkan skill Anda
    </p>
</section>

<!-- FITUR -->
<section class="pb-24">
    <div class="max-w-6xl mx-auto px-6 text-center">

        <h2 class="text-2xl font-semibold text-blue-700 mb-14">
            Fitur Unggulan
        </h2>

        <div class="grid md:grid-cols-3 gap-10">

            <?php
            $fitur = [
                ["👤","Login & Register","Daftar dan masuk ke akun Anda untuk mengakses semua fitur platform"],
                ["📈","Peta Kompetensi Mahasiswa","Dashboard interaktif untuk memvisualisasikan skill dan kompetensi Anda"],
                ["🏅","Career Gap Scanner","Analisis kesenjangan antara skill Anda dengan kebutuhan karir impian"],
                ["📘","Upload Proyek & Validasi Skill","Unggah portofolio proyek dan dapatkan validasi skill dari sistem"],
                ["📅","Tes Diagnostik Awal","Ikuti tes untuk mengetahui level kemampuan dan skill Anda saat ini"],
                ["💬","Rekomendasi Materi Pembelajaran","Dapatkan rekomendasi materi belajar yang sesuai dengan kebutuhan Anda"]
            ];

            foreach ($fitur as $item) :
            ?>
             <a href="login_form.php">
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition">

                    <!-- ICON -->
                    <div class="w-16 h-16 mx-auto mb-5 bg-blue-100 text-blue-500 flex items-center justify-center rounded-full text-2xl">
                        <?php echo $item[0]; ?>
                    </div>

                    <!-- TITLE -->
                    <h3 class="font-semibold text-blue-700 text-lg mb-2">
                        <?php echo $item[1]; ?>
                    </h3>

                    <!-- DESC -->
                    <p class="text-sm text-gray-500 leading-relaxed">
                        <?php echo $item[2]; ?>
                    </p>

                </div>
                  </a>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="bg-white text-center py-12 text-blue-500 border-t">
    <p class="mb-2 font-medium">Hubungi Kami</p>
    <p class="text-sm">Email: info@skillsync.com</p>
    <p class="text-sm mb-4">Telepon: +62 812-3456-7890</p>
    <p class="text-xs text-blue-400">© 2026 SkillSync. Platform pembelajaran untuk masa depan Anda.</p>
</footer>

</body>
</html>
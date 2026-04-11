<?php
session_start();

// kalau sudah login, redirect ke dashboard sesuai role
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
                ["user","Login & Register","Daftar dan masuk ke akun Anda untuk mengakses semua fitur platform"],
                ["chart","Peta Kompetensi Mahasiswa","Dashboard interaktif untuk memvisualisasikan skill dan kompetensi Anda"],
                ["award","Career Gap Scanner","Analisis kesenjangan antara skill Anda dengan kebutuhan karir impian"],
                ["book","Upload Proyek & Validasi Skill","Unggah portofolio proyek dan dapatkan validasi skill dari sistem"],
                ["calendar","Tes Diagnostik Awal","Ikuti tes untuk mengetahui level kemampuan dan skill Anda saat ini"],
                ["chat","Rekomendasi Materi Pembelajaran","Dapatkan rekomendasi materi belajar yang sesuai dengan kebutuhan Anda"]
            ];

            function icon($type) {
                switch($type) {
                    case "user":
                        return '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 20h5v-1a4 4 0 00-3-3.87M9 20H4v-1a4 4 0 013-3.87m10-6a4 4 0 11-8 0 4 4 0 018 0z"/></svg>';
                    case "chart":
                        return '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 17l6-6 4 4 8-8"/></svg>';
                    case "award":
                        return '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 8v4l3 3"/><circle cx="12" cy="12" r="10"/></svg>';
                    case "book":
                        return '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 016.5 17H20"/><path d="M6.5 2H20v15H6.5A2.5 2.5 0 004 19.5V4.5A2.5 2.5 0 016.5 2z"/></svg>';
                    case "calendar":
                        return '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>';
                    case "chat":
                        return '<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a4 4 0 01-4 4H7l-4 4V5a4 4 0 014-4h10a4 4 0 014 4z"/></svg>';
                }
            }

            foreach ($fitur as $item) :
            ?>
                <div class="bg-white p-8 rounded-2xl border border-gray-200 shadow-sm hover:shadow-md transition">
                    
                    <div class="w-16 h-16 mx-auto mb-5 bg-blue-100 rounded-full flex items-center justify-center">
                        <?php echo icon($item[0]); ?>
                    </div>

                    <h3 class="font-semibold text-blue-700 mb-2 text-lg">
                        <?php echo $item[1]; ?>
                    </h3>

                    <p class="text-sm text-gray-500 leading-relaxed">
                        <?php echo $item[2]; ?>
                    </p>

                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<!-- FOOTER (SESUAI GAMBAR) -->
<footer class="bg-white text-center py-10 text-blue-400 border-t">
    <h3 class="text-lg font-semibold mb-3">Hubungi Kami</h3>
    <p>Email: info@skillsync.com</p>
    <p>Telepon: +62 812-3456-7890</p>
    <p class="mt-6 text-sm text-blue-300">
        © 2026 SkillSync. Platform pembelajaran untuk masa depan Anda.
    </p>
</footer>
</body>
</html>
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
include 'koneksi.php';

$user_id = $_SESSION['user_id'];
// ambil data hasil tes
$query = mysqli_query($koneksi, "SELECT * FROM hasil_tes_kepribadian WHERE user_id='$user_id' ORDER BY id DESC LIMIT 1");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 text-gray-800">

<!-- NAVBAR -->
<div class="bg-white shadow px-6 py-4 flex justify-between">
    
    <h1 class="text-xl font-bold text-blue-600">SkillSync</h1>
    <div>
        Halo, Mahasiswa
        <a href="logout.php" class="ml-4 bg-blue-500 text-white px-3 py-1 rounded">Logout</a>
    </div>
</div>

<!-- HASIL TES -->
<div class="p-6">
    <h2 class="text-lg font-semibold mb-4">Hasil Tes Kepribadian</h2>

    <?php if($data) { ?>
        
        <!-- TAMPILAN ADA HASIL -->
        <div class="bg-white rounded-xl shadow p-6 flex gap-6">
            
            <div class="bg-blue-500 text-white flex flex-col justify-center items-center p-6 rounded-xl w-40">
                <h1 class="text-3xl font-bold"><?php echo $data['tipe_kepribadian']; ?></h1>
                <p class="text-sm">Arsitek</p>
            </div>

            <div class="flex-1">
                <p class="mb-4"><?php echo $data['deskripsi']; ?></p>

                <?php
                function bar($label, $value){
                    echo "
                    <div class='mb-3'>
                        <div class='flex justify-between text-sm'>
                            <span>$label</span>
                            <span>$value%</span>
                        </div>
                        <div class='w-full bg-gray-200 h-2 rounded'>
                            <div class='bg-blue-500 h-2 rounded' style='width:$value%'></div>
                        </div>
                    </div>
                    ";
                }

                bar("Analitis", $data['analitis']);
                bar("Kreatif", $data['kreatif']);
                bar("Mandiri", $data['mandiri']);
                bar("Visioner", $data['visioner']);
                ?>

            </div>
        </div>

    <?php } else { ?>

        <!-- TAMPILAN BELUM ADA HASIL -->
        <div class="bg-white border-2 border-dashed border-blue-200 rounded-xl p-10 text-center">
            
            <div class="flex justify-center mb-4">
                <div class="bg-blue-100 p-4 rounded-full">
                    <!-- icon -->
                    <span class="text-blue-500 text-2xl">🧠</span>
                </div>
            </div>

            <h3 class="text-lg font-semibold text-blue-600 mb-2">
                Belum Ada Hasil Tes Kepribadian
            </h3>

            <p class="text-gray-500 text-sm mb-6">
                Kenali kepribadian Anda lebih dalam dengan tes kami.
                Dapatkan insight tentang kekuatan, preferensi kerja,
                dan rekomendasi karir yang sesuai.
            </p>

            <a href="tes_kepribadian.php" 
               class="bg-blue-500 text-white px-5 py-2 rounded-lg inline-block">
                Mulai Tes Kepribadian Gratis
            </a>

            <p class="text-xs text-gray-400 mt-3">
                Gratis selamanya • 15-20 menit
            </p>

        </div>

    <?php } ?>
</div>

<!-- FITUR -->
<div class="p-6 max-w-7xl mx-auto">
    <h2 class="text-lg font-semibold mb-4">Fitur Platform</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        <!-- Tes Diagnostik -->
        <a href="pilih_tes.php" class="block">
            <div class="bg-white p-6 rounded-2xl shadow border border-blue-400 hover:shadow-md transition min-h-[140px] cursor-pointer">
                <div class="flex justify-between items-start mb-4">
                    <div class="bg-blue-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <span class="bg-green-100 text-green-600 text-xs px-3 py-1 rounded-full">
                        Gratis
                    </span>
                </div>
                <h3 class="font-semibold text-lg mb-1 text-blue-600">Tes Diagnostik Awal</h3>
                <p class="text-sm text-blue-400">Tes Kepribadian & Tes Skill Kompetensi</p>
            </div>
        </a>

        <!-- Peta Kompetensi -->
        <a href="peta_kompetensi.php" class="block">
            <div class="bg-white p-6 rounded-2xl shadow border hover:shadow-md transition min-h-[140px] cursor-pointer">
                <div class="flex justify-between items-start mb-4">
                    <div class="bg-blue-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 17l6-6 4 4 8-8"/>
                        </svg>
                    </div>
                    <span class="bg-blue-100 text-blue-600 text-xs px-3 py-1 rounded-full">
                        1x Gratis
                    </span>
                </div>
                <h3 class="font-semibold text-lg mb-1">Peta Kompetensi</h3>
                <p class="text-sm text-blue-400">Visualisasi skill dan Level Kompetensi Anda</p>
            </div>
        </a>

        <!-- Career Gap -->
        <a href="career_gap.php" class="block">
            <div class="bg-white p-6 rounded-2xl shadow border hover:shadow-md transition min-h-[140px] cursor-pointer">
                <div class="flex justify-between items-start mb-4">
                    <div class="bg-blue-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <span class="bg-blue-100 text-blue-600 text-xs px-3 py-1 rounded-full">
                        1x Gratis
                    </span>
                </div>
                <h3 class="font-semibold text-lg mb-1">Career Gap Scanner</h3>
                <p class="text-sm text-blue-400">Analisis kesenjangan skill untuk karir impian</p>
            </div>
        </a>

        <!-- Upload Proyek -->
        <a href="upload_proyek.php" class="block">
            <div class="bg-white p-6 rounded-2xl shadow border hover:shadow-md transition min-h-[140px] cursor-pointer">
                <div class="flex justify-between items-start mb-4">
                    <div class="bg-blue-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M12 12V3m0 0l-3 3m3-3l3 3"/>
                        </svg>
                    </div>
                    <span class="bg-blue-100 text-blue-600 text-xs px-3 py-1 rounded-full">
                        1x Gratis
                    </span>
                </div>
                <h3 class="font-semibold text-lg mb-1">Upload Proyek & Validasi</h3>
                <p class="text-sm text-blue-400">Upload portfolio</p>
            </div>
        </a>

        <!-- Rekomendasi -->
        <a href="rekomendasi.php" class="block">
            <div class="bg-white p-6 rounded-2xl shadow border hover:shadow-md transition min-h-[140px] cursor-pointer">
                <div class="flex justify-between items-start mb-4">
                    <div class="bg-blue-100 p-3 rounded-xl">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.77 9.77 0 01-4-.8L3 20l1.8-4A7.962 7.962 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                    <span class="bg-blue-100 text-blue-600 text-xs px-3 py-1 rounded-full">
                        1x Gratis
                    </span>
                </div>
                <h3 class="font-semibold text-lg mb-1">Rekomendasi Pembelajaran</h3>
                <p class="text-sm text-blue-400">Materi belajar personal sesuai kebutuhan</p>
            </div>
        </a>

    </div>
</div>
<!-- PREMIUM -->
<div class="bg-white rounded-xl shadow p-6 flex justify-between items-end">
    
    <div>
        <h3 class="font-semibold text-gray-800">Paket Premium</h3>
        <p class="text-sm text-gray-500">Akses unlimited semua fitur</p>
    </div>

    <div class="text-right">
        <p class="text-sm text-gray-700">Rp 25.000 / hasil</p>
        <p class="text-sm text-gray-700 mb-2">Rp 99.000 / bulan</p>

        <a href="pilih_paket.php" class="bg-yellow-500 text-white px-4 py-1 rounded hover:bg-yellow-600">
            Upgrade
        </a>
    </div>

</div>
</div>

</body>
</html>
<?php
session_start();
include 'koneksi.php';

$user_id = $_SESSION['user_id'];
$skill_id = $_GET['skill_id'];

// ambil hasil terakhir
$query = mysqli_query($koneksi, "
    SELECT h.*, s.nama_skill 
    FROM hasil_tes h
    JOIN skills s ON h.skill_id = s.id_skill
    WHERE h.user_id='$user_id' AND h.skill_id='$skill_id'
    ORDER BY h.id_hasil DESC LIMIT 1
");
$data = mysqli_fetch_assoc($query);

if(!$data){
    echo "Belum ada hasil";
    exit;
}

// ======================
// 🔥 CEK AKSES USER
// ======================
$boleh_lihat = false;

$cek = mysqli_query($koneksi, "SELECT * FROM akses_user WHERE user_id='$user_id'");
$akses = mysqli_fetch_assoc($cek);

// 1. GRATIS 1x
if(!$akses || $akses['free_used'] == 0){
    $boleh_lihat = true;

    mysqli_query($koneksi, "
        INSERT INTO akses_user (user_id, free_used)
        VALUES ('$user_id', 1)
        ON DUPLICATE KEY UPDATE free_used=1
    ");
}

// 2. PREMIUM
elseif($akses['premium_expired'] && $akses['premium_expired'] >= date('Y-m-d H:i:s')){
    $boleh_lihat = true;
}

// 3. SUDAH BELI HASIL INI
else {
    $cek_beli = mysqli_query($koneksi, "
        SELECT * FROM pembayaran_hasil 
        WHERE user_id='$user_id' 
        AND hasil_id='".$data['id_hasil']."'
    ");

    if(mysqli_num_rows($cek_beli) > 0){
        $boleh_lihat = true;
    }
}

// ambil breakdown kalau boleh lihat
$detail = mysqli_query($koneksi, "
    SELECT * FROM hasil_detail_skill 
    WHERE user_id='$user_id' 
    AND skill_id='$skill_id'
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Tes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 min-h-screen">

<!-- NAVBAR -->
<div class="bg-white px-6 py-4 shadow flex items-center gap-2">
    <div class="w-8 h-8 bg-blue-500 text-white flex items-center justify-center rounded">S</div>
    <h1 class="text-blue-600 font-semibold">SkillSync</h1>
</div>

<div class="max-w-4xl mx-auto p-6 text-center">

    <a href="dashboard_mahasiswa.php" class="text-blue-500">← Kembali</a>

    <h2 class="text-2xl font-bold text-blue-700 mt-6">
        Hasil Test Skill - <?= $data['nama_skill'] ?>
    </h2>

    <p class="text-blue-500 mt-2">Berikut adalah hasil evaluasi kompetensi Anda</p>

    <?php if($boleh_lihat){ ?>

    <!-- SKOR -->
    <div class="bg-white mt-8 p-8 rounded-xl shadow">
        <h3 class="text-blue-700 font-semibold mb-4">Skor Keseluruhan</h3>
        <div class="text-5xl font-bold text-blue-600">
            <?= $data['skor_total'] ?>
        </div>
    </div>

    <!-- BREAKDOWN -->
    <div class="bg-white mt-6 p-6 rounded-xl shadow text-left">
        <h3 class="text-blue-700 font-semibold mb-4">Breakdown Kemampuan</h3>

        <?php while($d = mysqli_fetch_assoc($detail)) { ?>
            <p class="text-sm">
                <?= $d['nama_aspek'] ?> 
                <span class="float-right"><?= $d['skor'] ?>/100</span>
            </p>
            <div class="w-full bg-gray-200 h-2 rounded mb-4">
                <div class="bg-blue-500 h-2 rounded" style="width: <?= $d['skor'] ?>%"></div>
            </div>
        <?php } ?>
    </div>

    <!-- REKOMENDASI -->
    <div class="bg-white mt-6 p-6 rounded-xl shadow text-left">
        <h3 class="text-blue-700 font-semibold mb-4">Rekomendasi</h3>
        <p>✓ Tingkatkan kemampuan pada skor di bawah 75</p>
        <p>✓ Ambil kursus lanjutan</p>
        <p>✓ Kerjakan project nyata</p>
    </div>

    <?php } else { ?>

<div class="bg-white mt-10 p-8 rounded-2xl shadow max-w-3xl mx-auto text-center">

    <!-- ICON -->
    <div class="w-20 h-20 mx-auto bg-yellow-100 rounded-full flex items-center justify-center text-3xl mb-6">
        🔒
    </div>

    <!-- TITLE -->
    <h2 class="text-2xl font-bold text-blue-700 mb-3">
        Test Selesai! Pilih Cara Akses Hasil
    </h2>

    <p class="text-blue-500 mb-8">
        Anda telah menyelesaikan test skill kompetensi. Untuk melihat hasil test berikutnya, 
        pilih salah satu opsi pembayaran di bawah.
    </p>

    <!-- PILIHAN -->
    <div class="grid md:grid-cols-2 gap-6 mb-8">

        <!-- BAYAR PER HASIL -->
        <div class="border-2 border-blue-200 rounded-xl p-6">
            <h3 class="text-blue-600 font-semibold mb-2">Bayar Per Hasil</h3>

            <p class="text-3xl font-bold text-blue-700 mb-2">
                Rp 25.000
            </p>

            <p class="text-sm text-blue-400 mb-4">
                Sekali bayar untuk hasil ini saja
            </p>

            <a href="pilih_paket.php?hasil_id=<?= $data['id_hasil'] ?>&skill_id=<?= $skill_id ?>" 
                class="block bg-blue-500 text-white py-2 rounded-lg">
                Pilih
            </a>
        </div> <!-- ✅ INI YANG TADI KURANG -->

        <!-- PREMIUM -->
        <div class="border-2 border-yellow-400 bg-yellow-50 rounded-xl p-6 relative">

            <span class="absolute -top-3 left-1/2 -translate-x-1/2 bg-orange-400 text-white text-xs px-3 py-1 rounded-full">
                HEMAT
            </span>

            <h3 class="text-yellow-600 font-semibold mb-2">Berlangganan</h3>

            <p class="text-3xl font-bold text-yellow-700 mb-2">
                Rp 99.000
            </p>

            <p class="text-sm text-yellow-600 mb-4">
                Per bulan + semua fitur premium
            </p>

            <a href="pilih_paket.php"
               class="block bg-yellow-500 text-white py-2 rounded-lg">
               Pilih
            </a>
        </div>

    </div>

    <!-- FEATURE -->
    <div class="bg-yellow-50 p-6 rounded-xl text-left mb-6">
        <h3 class="text-yellow-700 font-semibold mb-4 text-lg">
            👑 Premium Features
        </h3>

        <ul class="space-y-2 text-sm text-blue-700">
            <li>✓ Unlimited test skill kompetensi dengan hasil lengkap</li>
            <li>✓ Peta Kompetensi - Dashboard visualisasi skill</li>
            <li>✓ Career Gap Scanner - Analisis kesenjangan karir</li>
            <li>✓ Upload Proyek & Validasi dari mentor profesional</li>
            <li>✓ Rekomendasi Materi Pembelajaran personalisasi</li>
            <li>✓ Mentoring 1-on-1 dengan ahli dan support prioritas</li>
        </ul>
    </div>

    <!-- BUTTON -->
    <div class="space-y-3">

        <a href="pilih_paket.php"
           class="block bg-orange-400 text-white py-3 rounded-lg font-semibold">
           👑 Pilih Paket Pembayaran
        </a>

        <a href="pilih_tes_skill.php"
           class="block border border-blue-400 text-blue-600 py-2 rounded-lg">
           Kembali ke Tes Diagnostic
        </a>

        <a href="dashboard_mahasiswa.php"
           class="block text-blue-500 text-sm">
           Kembali ke Beranda
        </a>

    </div>

</div>

<?php } ?>

</div>

</body>
</html>
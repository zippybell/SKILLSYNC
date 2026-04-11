<?php
session_start();
include 'koneksi.php';

// cek login
if (!isset($_SESSION['user_id'])) {
    header("Location: login_form.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// =======================
// DATA RINGKASAN
// =======================

// pending (sementara 0)
$d_pending = ['total' => 0];

// total materi
$q_materi = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM upload_mentor WHERE mentor_id='$user_id'");
$d_materi = mysqli_fetch_assoc($q_materi);

// total views
$q_views = mysqli_query($koneksi, "SELECT SUM(views) as total FROM upload_mentor WHERE mentor_id='$user_id'");
$d_views = mysqli_fetch_assoc($q_views);

// =======================
// DATA VALIDASI (dummy kosong)
// =======================
$data_validasi = [];

// =======================
// DATA MATERI
// =======================
$q_materi_list = mysqli_query($koneksi, "
    SELECT * FROM upload_mentor 
    WHERE mentor_id='$user_id'
    ORDER BY created_at DESC
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Mentor</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-blue-50 text-gray-800">

<!-- NAVBAR -->
<div class="bg-white shadow px-6 py-4 flex justify-between">
    <h1 class="text-xl font-bold text-blue-600 flex items-center gap-2">
    <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center text-white font-bold">
                S
            </div>
            <span class="text-blue-600 font-semibold text-lg">SkillSync</span>
    <div>
        Halo, Mentor
        <a href="logout.php" class="ml-4 border px-3 py-1 rounded text-blue-500">Logout</a>
    </div>
</div>

<div class="p-6 max-w-7xl mx-auto">

<!-- ===================== -->
<!-- SUMMARY -->
<!-- ===================== -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    <div class="bg-white p-6 rounded-xl shadow flex justify-between items-center">
        <div>
            <p class="text-sm  font-semibold text-blue-400">Pending Validasi</p>
            <h2 class="text-2xl font-bold"><?php echo $d_pending['total']; ?></h2>
        </div>
        <div class="bg-yellow-100 p-3 rounded-lg">
            <i data-lucide="clock"></i>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow flex justify-between items-center">
        <div>
            <p class="text-sm font-semibold text-blue-400">Total Materi</p>
            <h2 class="text-2xl font-bold"><?php echo $d_materi['total'] ?? 0; ?></h2>
        </div>
        <div class="bg-blue-100 p-3 rounded-lg">
            <i data-lucide="file-text"></i>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow flex justify-between items-center">
        <div>
            <p class="text-sm font-semibold text-blue-400">Total Views</p>
            <h2 class="text-2xl font-bold"><?php echo $d_views['total'] ?? 0; ?></h2>
        </div>
        <div class="bg-green-100 p-3 rounded-lg">
            <i data-lucide="eye"></i>
        </div>
    </div>

</div>

<!-- ===================== -->
<!-- VALIDASI -->
<!-- ===================== -->
<h2 class="font-semibold text-lg mb-3 flex items-center gap-2 text-blue-500">
    <i data-lucide="award"></i> Validasi Tes Kompetensi
</h2>

<?php if(count($data_validasi) > 0){ ?>

    <?php foreach($data_validasi as $v){ ?>
        <div class="bg-white p-5 rounded-xl shadow mb-4 flex justify-between items-center">
            <div class="flex gap-4 items-center">
                <div class="bg-blue-100 p-3 rounded-lg">
                    <i data-lucide="users"></i>
                </div>
                <div>
                    <h3 class="font-semibold"><?php echo $v['nama']; ?></h3>
                    <p class="text-sm text-blue-500"><?php echo $v['judul']; ?></p>
                    <p class="text-xs text-gray-400"><?php echo $v['tanggal']; ?></p>
                </div>
            </div>
            <button class="bg-blue-500 text-white px-4 py-1 rounded">Review</button>
        </div>
    <?php } ?>

<?php } else { ?>

    <div class="bg-white border-2 border-dashed rounded-xl p-8 text-center mb-6">
        <div class="text-3xl mb-2">📭</div>
        <p class="text-gray-500">Belum ada data validasi</p>
        <p class="text-xs text-gray-400">Nanti muncul saat mahasiswa submit</p>
    </div>

<?php } ?>


<!-- ===================== -->
<!-- UPLOAD -->
<!-- ===================== -->
<div class="flex justify-between items-center mt-8 mb-4">
    <h2 class="font-semibold text-lg flex items-center gap-2 text-blue-500">
        <i data-lucide="upload"></i> Upload Materi Pembelajaran
    </h2>

    <a href="upload_materi.php" class="bg-blue-500 text-white px-4 py-2 rounded flex items-center gap-2">
        <i data-lucide="plus"></i> Upload Materi Baru
    </a>
</div>


<!-- ===================== -->
<!-- LIST MATERI -->
<!-- ===================== -->
<h2 class="font-semibold text-lg mb-3 flex items-center gap-2 text-blue-500">
    <i data-lucide="file-text"></i> Materi yang Sudah Diupload
</h2>

<?php if(mysqli_num_rows($q_materi_list) > 0){ ?>
    
    <?php while($m = mysqli_fetch_assoc($q_materi_list)){ ?>

        <div class="bg-white p-5 rounded-xl shadow mb-4 flex justify-between items-center">
            
            <div class="flex gap-4">
                <div class="bg-purple-100 p-3 rounded-lg">
                    <i data-lucide="file"></i>
                </div>

                <div>
                    <h3 class="font-semibold">
                        <a href="uploads/<?php echo $m['file']; ?>" target="_blank" class="text-blue-600 hover:underline">
                        <?php echo $m['judul']; ?>
                        </a>
                    </h3>
                    <p class="text-sm text-gray-500">
                        <?php echo $m['kategori']; ?> • <?php echo $m['ukuran']; ?>
                    </p>
                    <p class="text-xs text-gray-400">
                        👁 <?php echo $m['views'] ?? 0; ?> views • 
                        ⬇ <?php echo $m['downloads'] ?? 0; ?> downloads • 
                        <?php echo $m['created_at']; ?>
                    </p>
                </div>
            </div>

            <div class="flex gap-2">
                <a href="#" class="border px-3 py-1 rounded text-blue-500">Edit</a>
                <a href="#" class="border px-3 py-1 rounded text-red-500">Hapus</a>
            </div>

        </div>

    <?php } ?>

<?php } else { ?>

    <div class="bg-white border-2 border-dashed rounded-xl p-8 text-center">
        <div class="text-3xl mb-2">📂</div>
        <p class="text-gray-500">Belum ada materi yang diupload</p>
    </div>

<?php } ?>

</div>

<script>
    lucide.createIcons();
</script>

</body>
</html>
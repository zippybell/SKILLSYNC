<?php
include 'koneksi.php';

$data = mysqli_query($koneksi, "SELECT * FROM soal_kepribadian ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Soal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 min-h-screen">

<!-- NAVBAR -->
<div class="bg-white px-6 py-4 shadow flex justify-between items-center">
    <h1 class="text-blue-600 font-bold text-lg">SkillSync Admin</h1>

    <a href="tambah_soal_kepribadian.php"
       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
       + Tambah Soal
    </a>
</div>

<div class="max-w-4xl mx-auto p-6">

    <h2 class="text-xl font-bold text-blue-700 mb-6">
        Daftar Soal Kepribadian
    </h2>

    <?php if(mysqli_num_rows($data) > 0) { ?>

        <?php while($d = mysqli_fetch_assoc($data)) { ?>

        <div class="bg-white p-6 rounded-xl shadow mb-4 text-left">

            <!-- KATEGORI -->
            <p class="text-sm text-gray-500 mb-1">
                <?= htmlspecialchars($d['kategori']) ?>
            </p>

            <!-- PERTANYAAN -->
            <h3 class="font-semibold text-blue-700 mb-3">
                <?= htmlspecialchars($d['pertanyaan']) ?>
            </h3>

            <!-- OPSI -->
            <div class="space-y-1 text-sm">
                <p><b>A.</b> <?= htmlspecialchars($d['opsi_a']) ?></p>
                <p><b>B.</b> <?= htmlspecialchars($d['opsi_b']) ?></p>
                <p><b>C.</b> <?= htmlspecialchars($d['opsi_c']) ?></p>
                <p><b>D.</b> <?= htmlspecialchars($d['opsi_d']) ?></p>
            </div>

            <!-- ACTION -->
            <div class="mt-4 flex gap-2">
                <a href="edit_soal.php?id=<?= $d['id'] ?>"
                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                   ✏ Edit
                </a>

                <a href="hapus_soal.php?id=<?= $d['id'] ?>"
                   class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded"
                   onclick="return confirm('Yakin mau hapus soal ini?')">
                   🗑 Hapus
                </a>
            </div>

        </div>

        <?php } ?>

    <?php } else { ?>

        <!-- KALAU BELUM ADA DATA -->
        <div class="bg-white p-6 rounded-xl shadow text-center">
            <p class="text-gray-500">Belum ada soal ditambahkan.</p>
        </div>

    <?php } ?>

</div>

</body>
</html>
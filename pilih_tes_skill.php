<?php
session_start();
include 'koneksi.php';

// ambil user login
$user_id = $_SESSION['user_id'];

// ambil jurusan user
$queryUsers = mysqli_query($koneksi, "SELECT jurusan FROM users WHERE id_user = '$user_id'");
$dataUsers = mysqli_fetch_assoc($queryUsers);
$jurusan = $dataUsers['jurusan'];

// ambil skill sesuai jurusan
$querySkills = mysqli_query($koneksi, "SELECT * FROM skills WHERE jurusan = '$jurusan'");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pilih Skill</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 min-h-screen">

<!-- NAVBAR -->
<div class="bg-white shadow px-6 py-4 flex items-center gap-2">
    <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center text-white font-bold">
        S
    </div>
    <h1 class="text-blue-600 font-semibold text-lg">SkillSync</h1>
</div>

<div class="p-6 max-w-6xl mx-auto">

    <!-- BACK -->
    <a href="pilih_tes.php" class="text-blue-500 mb-6 inline-block">← Kembali</a>

    <!-- HEADER -->
    <div class="text-center mb-10">
        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm">
            <?= $jurusan ?>
        </span>

        <h2 class="text-2xl font-bold text-blue-700 mt-3">
            Pilih Fokus Skill
        </h2>

        <p class="text-blue-500 mt-1">
            Pilih fokus skill yang ingin Anda tes
        </p>
    </div>

    <!-- LIST SKILL -->
    <div class="grid md:grid-cols-2 gap-6">

        <?php while($skill = mysqli_fetch_assoc($querySkills)) { ?>
       
        <a href="soal_skill.php?skill_id=<?= $skill['id_skill'] ?>" class="block">
            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-md transition flex items-center justify-between cursor-pointer">

                <div class="flex items-center gap-4">
                    <div>
                        <h3 class="font-semibold text-blue-700 text-lg">
                            <?= $skill['nama_skill'] ?>
                        </h3>
                        <p class="text-sm text-blue-400">
                            <?= $skill['deskripsi'] ?>
                        </p>

                        <span class="bg-blue-100 text-blue-600 text-xs px-3 py-1 rounded-full inline-block mt-2">
                            15 Soal
                        </span>
                    </div>
                </div>

                <div class="text-blue-400 text-xl">→</div>

            </div>
        </a>

        <?php } ?>

    </div>

</div>

</body>
</html>
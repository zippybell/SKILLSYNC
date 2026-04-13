<?php
include 'koneksi.php';
$data = mysqli_query($koneksi, "
    SELECT s.*, sk.nama_skill 
    FROM soal_skill s
    JOIN skills sk ON s.skill_id = sk.id_skill
    ORDER BY s.id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Soal Skill</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 p-6">

<h1 class="text-xl font-bold mb-4">Soal Kompetensi</h1>

<a href="tambah_soal_skill.php" class="bg-blue-500 text-white px-4 py-2 rounded">
+ Tambah Soal
</a>

<?php while($d = mysqli_fetch_assoc($data)) { ?>
<div class="bg-white p-4 rounded shadow mt-4">

    <p class="text-sm text-gray-500"><?= $d['nama_skill'] ?></p>
    <h3 class="font-semibold"><?= $d['pertanyaan'] ?></h3>

    <p>A. <?= $d['opsi_a'] ?></p>
    <p>B. <?= $d['opsi_b'] ?></p>
    <p>C. <?= $d['opsi_c'] ?></p>
    <p>D. <?= $d['opsi_d'] ?></p>

    <div class="mt-2">
        <a href="edit_soal_skill.php?id=<?= $d['id'] ?>" class="text-yellow-500">Edit</a> |
        <a href="hapus_soal_skill.php?id=<?= $d['id'] ?>" class="text-red-500">Hapus</a>
    </div>

</div>
<?php } ?>

</body>
</html>
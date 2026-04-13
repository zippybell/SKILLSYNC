<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM soal_skill WHERE id='$id'"));
$skill = mysqli_query($koneksi, "SELECT * FROM skills");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Soal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 min-h-screen p-6">

<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">

    <h2 class="text-xl font-bold text-yellow-600 mb-4">Edit Soal Kompetensi</h2>

    <form action="proses_edit_soal_skill.php" method="POST" class="space-y-4">

        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <!-- SKILL -->
        <select name="skill_id" class="w-full border p-2 rounded">
            <?php while($s = mysqli_fetch_assoc($skill)) { ?>
                <option value="<?= $s['id_skill'] ?>" 
                <?= $data['skill_id'] == $s['id_skill'] ? 'selected' : '' ?>>
                <?= $s['nama_skill'] ?>
                </option>
            <?php } ?>
        </select>

        <!-- PERTANYAAN -->
        <textarea name="pertanyaan" class="w-full border p-2 rounded"><?= $data['pertanyaan'] ?></textarea>

        <!-- OPSI -->
        <input type="text" name="opsi_a" value="<?= $data['opsi_a'] ?>" class="w-full border p-2 rounded">
        <input type="text" name="opsi_b" value="<?= $data['opsi_b'] ?>" class="w-full border p-2 rounded">
        <input type="text" name="opsi_c" value="<?= $data['opsi_c'] ?>" class="w-full border p-2 rounded">
        <input type="text" name="opsi_d" value="<?= $data['opsi_d'] ?>" class="w-full border p-2 rounded">

        <!-- JAWABAN -->
        <select name="jawaban_benar" class="w-full border p-2 rounded">
            <option <?= $data['jawaban_benar']=='A'?'selected':'' ?>>A</option>
            <option <?= $data['jawaban_benar']=='B'?'selected':'' ?>>B</option>
            <option <?= $data['jawaban_benar']=='C'?'selected':'' ?>>C</option>
            <option <?= $data['jawaban_benar']=='D'?'selected':'' ?>>D</option>
        </select>

        <!-- BUTTON -->
        <button class="bg-yellow-500 text-white px-4 py-2 rounded w-full">
            Update Soal
        </button>

    </form>

</div>

</body>
</html>
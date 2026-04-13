<?php
include 'koneksi.php';
$skill = mysqli_query($koneksi, "SELECT * FROM skills");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Soal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 min-h-screen p-6">

<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow">

    <h2 class="text-xl font-bold text-blue-700 mb-4">Tambah Soal Kompetensi</h2>

    <form action="proses_tambah_soal_skill.php" method="POST" class="space-y-4">

        <!-- SKILL -->
        <select name="skill_id" class="w-full border p-2 rounded">
            <option value="">Pilih Skill</option>
            <?php while($s = mysqli_fetch_assoc($skill)) { ?>
                <option value="<?= $s['id_skill'] ?>"><?= $s['nama_skill'] ?></option>
            <?php } ?>
        </select>

        <!-- PERTANYAAN -->
        <textarea name="pertanyaan" placeholder="Masukkan pertanyaan"
            class="w-full border p-2 rounded"></textarea>

        <!-- OPSI -->
        <input type="text" name="opsi_a" placeholder="Opsi A" class="w-full border p-2 rounded">
        <input type="text" name="opsi_b" placeholder="Opsi B" class="w-full border p-2 rounded">
        <input type="text" name="opsi_c" placeholder="Opsi C" class="w-full border p-2 rounded">
        <input type="text" name="opsi_d" placeholder="Opsi D" class="w-full border p-2 rounded">

        <!-- JAWABAN -->
        <select name="jawaban_benar" class="w-full border p-2 rounded">
            <option value="">Pilih Jawaban Benar</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
        </select>

        <!-- BUTTON -->
        <button class="bg-blue-500 text-white px-4 py-2 rounded w-full">
            Simpan Soal
        </button>

    </form>

</div>

</body>
</html>
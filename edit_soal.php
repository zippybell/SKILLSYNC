<?php
include 'koneksi.php';

if(!isset($_GET['id'])){
    header("Location: admin_soal_kepribadian.php");
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM soal_kepribadian WHERE id='$id'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Soal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 min-h-screen">

<div class="max-w-2xl mx-auto p-6">

    <h2 class="text-xl font-bold text-blue-700 mb-6">Edit Soal</h2>

    <form method="POST" action="proses_edit_soal.php" class="bg-white p-6 rounded-xl shadow space-y-4">

        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <input type="text" name="kategori" value="<?= $data['kategori'] ?>" class="w-full border p-2 rounded">

        <textarea name="pertanyaan" class="w-full border p-2 rounded"><?= $data['pertanyaan'] ?></textarea>

        <input type="text" name="opsi_a" value="<?= $data['opsi_a'] ?>" class="w-full border p-2 rounded">
        <input type="text" name="opsi_b" value="<?= $data['opsi_b'] ?>" class="w-full border p-2 rounded">
        <input type="text" name="opsi_c" value="<?= $data['opsi_c'] ?>" class="w-full border p-2 rounded">
        <input type="text" name="opsi_d" value="<?= $data['opsi_d'] ?>" class="w-full border p-2 rounded">

        <button class="bg-blue-500 text-white px-4 py-2 rounded">
            Update
        </button>

    </form>

</div>

</body>
</html>
<?php
include 'koneksi.php';

if(!isset($_GET['id'])){
    echo "ID tidak ditemukan!";
    exit;
}

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM upload_mentor WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if(!$data){
    echo "Data tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Materi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 min-h-screen flex items-center justify-center">

<div class="w-full max-w-md">

    <!-- HEADER -->
    <div class="text-center mb-6">
        <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center text-white text-xl mx-auto mb-2">
            ✏️
        </div>
        <h1 class="text-xl font-semibold text-blue-600">Edit Materi</h1>
        <p class="text-sm text-blue-400">Perbarui materi pembelajaran kamu</p>
    </div>

    <!-- CARD -->
    <form action="proses_edit_materi.php" method="POST" enctype="multipart/form-data"
          class="bg-white p-6 rounded-xl shadow">

        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <!-- INPUT JUDUL -->
        <label class="text-sm text-gray-600">Judul Materi</label>
        <input type="text" name="judul" value="<?= $data['judul']; ?>"
            class="w-full mb-4 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">

        <!-- FILE -->
        <label class="text-sm text-gray-600">Upload File Baru (opsional)</label>
        <input type="file" name="file"
            class="w-full mb-4">

        <!-- BUTTON -->
        <button class="bg-blue-500 hover:bg-blue-600 text-white w-full py-2 rounded-lg transition">
            Update Materi
        </button>

        <!-- BACK -->
        <a href="dashboard_mentor.php"
           class="block text-center text-sm text-blue-400 mt-3 hover:underline">
           ← Kembali ke Dashboard
        </a>

    </form>

</div>

</body>
</html>
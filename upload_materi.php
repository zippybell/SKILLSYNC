<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login_form.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Materi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 flex justify-center items-center h-screen">

<div class="bg-white p-8 rounded-xl shadow w-96">

    <h2 class="text-xl font-semibold mb-4 text-blue-600">Upload Materi</h2>

    <form action="proses_upload.php" method="POST" enctype="multipart/form-data">

        <input type="text" name="judul" placeholder="Judul Materi"
            class="w-full mb-3 p-2 border rounded" required>

        <select name="kategori" class="w-full mb-3 p-2 border rounded" required>
            <option value="">Pilih Kategori</option>
            <option value="Dokumen">Dokumen</option>
            <option value="Video">Video</option>
            <option value="Link">Link</option>
        </select>

        <input type="file" name="file" class="w-full mb-4" required>

        <button type="submit"
            class="bg-blue-500 text-white w-full py-2 rounded">
            Upload
        </button>

    </form>

</div>

</body>
</html>
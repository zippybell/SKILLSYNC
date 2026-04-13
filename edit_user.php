<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM users WHERE id_user='$id'"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 min-h-screen flex items-center justify-center">

<div class="bg-white p-8 rounded-2xl shadow w-full max-w-lg">

    <h2 class="text-2xl font-bold text-blue-600 mb-6 text-center">
        Edit Data User
    </h2>

    <form action="proses_edit_user.php" method="POST">

        <input type="hidden" name="id" value="<?= $data['id_user'] ?>">

        <!-- NAMA -->
        <div class="mb-4">
            <label class="block text-sm text-gray-600 mb-1">Nama</label>
            <input type="text" name="nama"
                value="<?= $data['nama'] ?>"
                class="w-full border p-2 rounded-lg focus:ring-2 focus:ring-blue-400"
                required>
        </div>

        <!-- EMAIL -->
        <div class="mb-4">
            <label class="block text-sm text-gray-600 mb-1">Email</label>
            <input type="email" name="email"
                value="<?= $data['email'] ?>"
                class="w-full border p-2 rounded-lg focus:ring-2 focus:ring-blue-400"
                required>
        </div>

        <!-- ROLE -->
        <div class="mb-4">
            <label class="block text-sm text-gray-600 mb-1">Role</label>
            <select name="role"
                class="w-full border p-2 rounded-lg focus:ring-2 focus:ring-blue-400">

                <option value="mahasiswa" <?= $data['role']=='mahasiswa' ? 'selected' : '' ?>>Mahasiswa</option>
                <option value="mentor" <?= $data['role']=='mentor' ? 'selected' : '' ?>>Mentor</option>
                <option value="admin" <?= $data['role']=='admin' ? 'selected' : '' ?>>Admin</option>

            </select>
        </div>

        <!-- JURUSAN -->
        <div class="mb-6">
            <label class="block text-sm text-gray-600 mb-1">Jurusan</label>
            <input type="text" name="jurusan"
                value="<?= $data['jurusan'] ?>"
                class="w-full border p-2 rounded-lg focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- BUTTON -->
        <div class="flex justify-between">
            <a href="user.php"
               class="bg-gray-300 px-4 py-2 rounded-lg">
               Kembali
            </a>

            <button type="submit"
                class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                Update
            </button>
        </div>

    </form>

</div>

</body>
</html>
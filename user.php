<?php
include 'koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM users ORDER BY id_user DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manajemen User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<!-- NAVBAR -->
<div class="bg-blue-600 text-white p-4 flex justify-between">
    <h1 class="font-bold">Manajemen User</h1>
    <a href="dashboard_admin.php" class="bg-white text-blue-600 px-3 py-1 rounded">Kembali</a>
</div>

<div class="max-w-6xl mx-auto p-6">

    <a href="tambah_user.php"
       class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">
       + Tambah User
    </a>

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="p-3">Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
            <?php while($d = mysqli_fetch_assoc($data)) { ?>
                <tr class="border-b">
                    <td class="p-3"><?= $d['nama'] ?></td>
                    <td><?= $d['email'] ?></td>
                    <td><?= $d['role'] ?></td>
                    <td><?= $d['jurusan'] ?></td>
                    <td>
                        <a href="edit_user.php?id=<?= $d['id_user'] ?>" class="text-yellow-500">Edit</a> |
                        <a href="hapus_user.php?id=<?= $d['id_user'] ?>" 
                           onclick="return confirm('Yakin?')" 
                           class="text-red-500">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>
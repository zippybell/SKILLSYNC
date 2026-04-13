<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 flex justify-center items-center h-screen">

<form action="proses_tambah_user.php" method="POST"
      class="bg-white p-6 rounded-xl shadow w-full max-w-md">

    <h2 class="text-xl font-bold mb-4 text-blue-600">Tambah User</h2>

    <input type="text" name="nama" placeholder="Nama"
        class="w-full border p-2 rounded mb-3" required>

    <input type="email" name="email" placeholder="Email"
        class="w-full border p-2 rounded mb-3" required>

    <input type="password" name="password" placeholder="Password"
        class="w-full border p-2 rounded mb-3" required>

    <select name="role" class="w-full border p-2 rounded mb-3">
        <option value="mahasiswa">Mahasiswa</option>
        <option value="mentor">Mentor</option>
        <option value="admin">Admin</option>
    </select>

    <input type="text" name="jurusan" placeholder="Jurusan"
        class="w-full border p-2 rounded mb-3">

    <button class="bg-blue-500 text-white w-full py-2 rounded">
        Simpan
    </button>

</form>

</body>
</html>
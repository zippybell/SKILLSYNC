<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mentor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 text-gray-800 min-h-screen flex flex-col">

    <!-- NAVBAR -->
    <div class="bg-white shadow-sm px-6 py-4 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center text-white font-bold">
                S
            </div>
            <span class="text-blue-600 font-semibold text-lg">SkillSync</span>
        </div>

        <a href="login_form.php" 
           class="border border-blue-500 text-blue-500 px-4 py-1 rounded-lg text-sm hover:bg-blue-50">
            Login
        </a>
    </div>

    <!-- KEMBALI -->
    <div class="max-w-6xl mx-auto w-full px-6 mt-4">
        <a href="pilih_role.php" class="text-blue-500 text-sm hover:underline">
            ← Kembali
        </a>
    </div>

    <!-- CONTENT -->
    <div class="flex-1 flex justify-center items-start pt-10 pb-32">

        <!-- CARD -->
        <div class="bg-white p-8 rounded-2xl shadow-lg w-96">

            <!-- TITLE -->
            <h2 class="text-2xl font-bold text-center text-[#2C7DA0] mb-2">
                Daftar Mentor
            </h2>
            <p class="text-center text-sm text-[#2C7DA0] mb-6">
                Bergabunglah sebagai mentor untuk membimbing mahasiswa
            </p>

            <form action="proses_daftarmentor.php" method="POST">

                <!-- Nama -->
                <label class="text-sm text-blue-500 font-semibold">Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Masukkan nama lengkap"
                    class="w-full p-2 mb-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>

                <!-- NIP -->
                <label class="text-sm text-blue-500 font-semibold">NIP / ID Pegawai</label>
                <input type="text" name="nip" placeholder="Masukkan NIP"
                    class="w-full p-2 mb-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>

                <!-- Institusi -->
                <label class="text-sm text-blue-500 font-semibold">Institusi</label>
                <input type="text" name="institusi" placeholder="Masukkan institusi"
                    class="w-full p-2 mb-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>

                <!-- Keahlian -->
                <label class="text-sm text-blue-500 font-semibold">Bidang Keahlian</label>
                <input type="text" name="bidang_keahlian" placeholder="Contoh: Web Development"
                    class="w-full p-2 mb-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>

                <!-- Email -->
                <label class="text-sm text-blue-500 font-semibold">Email</label>
                <input type="email" name="email" placeholder="nama@email.com"
                    class="w-full p-2 mb-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>

                <!-- Password -->
                <label class="text-sm text-blue-500 font-semibold">Password</label>
                <input type="password" name="password" placeholder="Masukkan password"
                    class="w-full p-2 mb-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>

                <!-- Konfirmasi -->
                <label class="text-sm text-blue-500 font-semibold">Konfirmasi Password</label>
                <input type="password" name="konfirmasi" placeholder="Konfirmasi password"
                    class="w-full p-2 mb-5 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>

                <!-- BUTTON -->
                <button type="submit"
                    class="w-full bg-[#1FA9D6] hover:bg-[#189ac2] text-white p-2 rounded-lg">
                    Daftar Sekarang
                </button>

            </form>

            <!-- LOGIN -->
            <p class="text-center text-sm text-gray-600 mt-5">
                Sudah punya akun?
                <a href="login_form.php" class="text-blue-500 hover:underline">
                    Login di sini
                </a>
            </p>

        </div>

    </div>

    <!-- FOOTER -->
    <footer class="bg-white text-center py-6 text-blue-400 border-t">
        <p>Hubungi Kami</p>
        <p>Email: info@skillsync.com</p>
        <p>Telepon: +62 812-3456-7890</p>
        <p class="mt-2 text-sm">
            © 2026 SkillSync. Platform pembelajaran untuk masa depan Anda.
        </p>
    </footer>

</body>
</html>
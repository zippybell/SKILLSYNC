<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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

        <a href="pilih_role.php" 
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded-lg text-sm">
            Daftar
        </a>
    </div>

    <!-- KEMBALI -->
    <div class="max-w-6xl mx-auto w-full px-6 mt-4">
        <a href="index.php" class="text-blue-500 text-sm hover:underline">
            ← Kembali
        </a>
    </div>

    <!-- CONTENT -->
    <div class="flex-1 flex justify-center items-start pt-16 pb-24">

        <div class="bg-white p-8 rounded-2xl shadow-lg w-80">

            <!-- TITLE -->
            <h2 class="text-2xl font-bold text-center text-[#2C7DA0] mb-2">
                Login
            </h2>
            <p class="text-center text-sm text-[#2C7DA0] mb-5">
                Masuk ke akun SkillSync Anda
            </p>

            <form action="login.php" method="POST">

                <!-- email -->
                <label class="text-sm text-blue-500 font-semibold">Email</label>
                <input type="text" name="email" placeholder="Masukkan Email"
                    class="w-full p-2 mb-4 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>

                <!-- password -->
                <label class="text-sm text-blue-500 font-semibold">Password</label>
                <input type="password" name="password" placeholder="Masukkan password"
                    class="w-full p-2 mb-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    required>

                <!-- remember -->
                <div class="flex justify-between items-center mb-4 text-sm">
                    <label class="flex items-center text-blue-500 font-semibold">
                        <input type="checkbox" name="remember" class="mr-2">
                        Ingat saya
                    </label>

                    <a href="#" class="text-blue-500 hover:underline">
                        Lupa password?
                    </a>
                </div>

                <!-- button -->
                <button type="submit"
                    class="w-full bg-[#1FA9D6] hover:bg-[#189ac2] text-white p-2 rounded-lg">
                    Masuk
                </button>

            </form>

            <!-- daftar -->
            <p class="text-center text-sm text-gray-600 mt-5">
                Belum punya akun?
                <a href="pilih_role.php" class="text-blue-500 hover:underline">
                    Daftar di sini
                </a>
            </p>

        </div>

    </div>

    <!-- FOOTER -->
    <footer class="bg-white text-center py-6 text-blue-400 border-t">
        <h3 class="text-lg font-semibold mb-3">Hubungi Kami</h3>
        <p>Email: info@skillsync.com</p>
        <p>Telepon: +62 812-3456-7890</p>
        <p class="mt-6 text-sm text-blue-300">
            © 2026 SkillSync. Platform pembelajaran untuk masa depan Anda.
        </p>
    </footer>

</body>
</html>
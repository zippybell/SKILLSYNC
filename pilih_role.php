<!DOCTYPE html>
<html>
<head>
    <title>Daftar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 text-gray-800 min-h-screen">

    <!-- container -->
    <div class="max-w-3xl mx-auto pt-16 pb-10 text-center relative">

        <!-- kembali -->
        <a href="index.php" 
            class="absolute top-6 left-6 text-blue-500 text-sm">
             ← Kembali
        </a>

        <!-- title -->
        <h1 class="text-3xl font-semibold text-[#2C7DA0] mb-2">
            Daftar Sebagai
        </h1>
        <p class="text-[#2C7DA0] mb-10">
            Pilih peran yang sesuai dengan Anda
        </p>

        <!-- card wrapper -->
        <div class="grid md:grid-cols-2 gap-6 px-10">

            <!-- MAHASISWA -->
            <div class="bg-white px-6 py-10 rounded-2xl shadow-md flex flex-col justifiy between min-h- [500px]">

                <div class="w-20 h-20 mx-auto bg-blue-100 rounded-full flex items-center justify-center mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="1.8" 
                        stroke="#2C7DA0" 
                        class="w-10 h-10">
                        <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3L2 9l10 6 10-6-10-6z"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 12v4c0 1.5 3 3 6 3s6-1.5 6-3v-4"/>
                    </svg>
                </div>

                <h2 class="text-xl font-semibold text-[#2C7DA0] mb-3">
                    Mahasiswa
                </h2>

                <p class="text-sm text-gray-600 mb-5 leading-relaxed">
                    Daftar sebagai mahasiswa untuk mengakses berbagai fitur pembelajaran,
                    peta kompetensi, dan rekomendasi materi yang dipersonalisasi
                </p>

                <ul class="text-sm text-gray-600 text-left mb-6 space-y-1">
                    <li>✓ Akses peta kompetensi</li>
                    <li>✓ Career gap scanner</li>
                    <li>✓ Upload proyek & validasi skill</li>
                    <li>✓ Tes diagnostik awal</li>
                    <li>✓ Rekomendasi pembelajaran</li>
                </ul>

               <a href="daftar_mahasiswa.php" 
                class="block text-center w-full bg-[#1FA9D6] hover:bg-[#189ac2] text-white p-2 rounded-lg">
                Daftar sebagai Mahasiswa
                </a>
            </div>

            <!-- MENTOR -->
            <div class="bg-white p-8 rounded-2xl shadow-md flex flex-col justifiy between min-h- [500px]">

               <div class="w-20 h-20 mx-auto bg-blue-100 rounded-full flex items-center justify-center mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="1.8" 
                        stroke="#2C7DA0" 
                        class="w-10 h-10">
                        <circle cx="12" cy="8" r="4" stroke-linecap="round" stroke-linejoin="round"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 20c0-4 4-6 8-6s8 2 8 6"/>
                    </svg>
                </div>

                <h2 class="text-xl font-semibold text-[#2C7DA0] mb-3">
                    Mentor
                </h2>

                <p class="text-sm text-gray-600 mb-5 leading-relaxed">
                    Daftar sebagai mentor untuk berbagi pengetahuan, membimbing mahasiswa,
                    dan membantu validasi skill mereka
                </p>

                <ul class="text-sm text-gray-600 text-left mb-6 space-y-1">
                    <li>✓ Bimbingan mahasiswa</li>
                    <li>✓ Validasi proyek mahasiswa</li>
                    <li>✓ Berbagi materi pembelajaran</li>
                    <li>✓ Monitoring progress</li>
                    <li>✓ Dashboard mentor</li>
                </ul>

                <a href="daftar_mentor.php" 
                class="block text-center w-full bg-[#1FA9D6] hover:bg-[#189ac2] text-white p-2 rounded-lg">
                Daftar sebagai Mentor
                </a>
            </div>

        </div>

        <!-- footer -->
        <p class="mt-10 text-sm text-gray-600">
            Sudah punya akun?
            <a href="login_form.php" class="text-[#2C7DA0] hover:underline">
                Login di sini
            </a>
        </p>

    </div>

</body>
</html>
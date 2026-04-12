<?php
session_start();

// ambil data dari URL (biar dinamis)
$paket = $_GET['paket'] ?? 'Bayar Per Hasil';
$harga = $_GET['harga'] ?? 25000;

// bikin nomor pesanan random
$order_id = "SS" . rand(10000000,99999999);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 min-h-screen">

<!-- NAVBAR -->
<div class="bg-white px-6 py-4 shadow flex justify-between items-center">
    <h1 class="text-blue-600 font-semibold text-lg">SkillSync</h1>
    <a href="javascript:history.back()" class="text-blue-500">← Kembali</a>
</div>

<div class="max-w-3xl mx-auto p-6">

    <!-- TIMER -->
    <div class="bg-blue-100 text-blue-700 p-4 rounded-lg flex justify-between items-center mb-6">
        <span>⏱️ Selesaikan pembayaran dalam:</span>
        <span id="timer" class="font-semibold">15:00</span>
    </div>

    <!-- QR -->
    <div class="bg-white p-6 rounded-xl shadow text-center mb-6">

        <h2 class="text-xl font-semibold text-blue-700 mb-2">
            Scan QR Code untuk Bayar
        </h2>

        <p class="text-blue-500 mb-6">
            Gunakan aplikasi pembayaran yang mendukung QRIS
        </p>

        <!-- QR DUMMY -->
        <div class="w-48 h-48 mx-auto border-4 border-blue-400 rounded-xl flex items-center justify-center text-4xl">
            ⬛
        </div>

        <button class="mt-4 border border-blue-400 text-blue-600 px-4 py-2 rounded">
            ⬇️ Download QR
        </button>

        <!-- APP -->
        <div class="mt-6 bg-blue-50 p-4 rounded-lg">
            <p class="text-sm text-blue-700 mb-2">Aplikasi yang Mendukung QRIS:</p>

            <div class="flex flex-wrap gap-2 justify-center text-sm">
                <span class="px-3 py-1 border rounded">GoPay</span>
                <span class="px-3 py-1 border rounded">OVO</span>
                <span class="px-3 py-1 border rounded">DANA</span>
                <span class="px-3 py-1 border rounded">ShopeePay</span>
                <span class="px-3 py-1 border rounded">LinkAja</span>
            </div>
        </div>
    </div>

    <!-- CARA BAYAR -->
    <div class="bg-white p-6 rounded-xl shadow mb-6">

        <h3 class="text-blue-700 font-semibold mb-4">📱 Cara Pembayaran</h3>

        <ol class="space-y-2 text-blue-600 text-sm">
            <li>1. Buka aplikasi pembayaran digital Anda</li>
            <li>2. Pilih menu Scan QR / QRIS</li>
            <li>3. Scan QR Code di atas</li>
            <li>4. Konfirmasi pembayaran</li>
            <li>5. Klik tombol "Sudah Bayar"</li>
        </ol>

    </div>

    <!-- DETAIL -->
    <div class="bg-white p-6 rounded-xl shadow mb-6">

        <h3 class="text-blue-700 font-semibold mb-4">Detail Pesanan</h3>

        <p class="text-sm text-gray-500">Nomor Pesanan</p>
        <div class="bg-gray-100 p-2 rounded mb-4 flex justify-between">
            <span><?= $order_id ?></span>
            <button onclick="copyText('<?= $order_id ?>')">📋</button>
        </div>

        <p class="text-sm text-gray-500">Paket</p>
        <p class="mb-3"><?= $paket ?></p>

        <p class="text-sm text-gray-500">Metode Pembayaran</p>
        <p class="mb-4">QRIS</p>

        <hr class="my-4">

        <div class="flex justify-between text-sm">
            <span>Subtotal</span>
            <span>Rp <?= number_format($harga) ?></span>
        </div>

        <div class="flex justify-between text-sm text-green-600">
            <span>Biaya Admin</span>
            <span>Gratis</span>
        </div>

        <div class="flex justify-between font-bold text-lg mt-2">
            <span>Total</span>
            <span>Rp <?= number_format($harga) ?></span>
        </div>

        <!-- BUTTON -->
        <a href="proses_pembayaran.php?skill_id=<?= $_GET['skill_id'] ?>&paket=<?= $paket ?>" 
            class="block mt-6 bg-blue-500 text-white py-3 text-center rounded-lg">
            ✔️ Sudah Bayar
        </a>

        <p class="text-xs text-center text-blue-400 mt-2">
            Klik tombol ini setelah Anda menyelesaikan pembayaran
        </p>

    </div>

    <!-- WARNING -->
    <div class="bg-yellow-50 border border-yellow-300 p-4 rounded-lg text-sm text-yellow-700">
        <b>Penting:</b>
        <ul class="list-disc ml-5 mt-2">
            <li>Pastikan nominal sesuai</li>
            <li>Jangan refresh halaman</li>
            <li>Simpan nomor pesanan</li>
        </ul>
    </div>

</div>

<!-- SCRIPT -->
<script>
// TIMER 15 MENIT
let time = 900;

setInterval(() => {
    let min = Math.floor(time / 60);
    let sec = time % 60;

    document.getElementById("timer").innerHTML =
        `${min}:${sec < 10 ? '0' : ''}${sec}`;

    if(time > 0) time--;
}, 1000);

// COPY
function copyText(text){
    navigator.clipboard.writeText(text);
    alert("Nomor pesanan disalin!");
}
</script>

</body>
</html>
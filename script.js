// Alert sederhana saat klik tombol utama
const btnMulai = document.querySelector(".btn-primary");

btnMulai.addEventListener("click", function () {
    alert("Fitur analisis skill akan segera tersedia!");
});

// Efek angka statistik sederhana
let counter1 = document.getElementById("counter1");
let counter2 = document.getElementById("counter2");

counter1.innerText = "85%";
counter2.innerText = "100+";
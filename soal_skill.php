<?php
session_start();
include 'koneksi.php';

// ambil skill dari URL
if(!isset($_GET['skill_id'])){
    header("Location: pilih_tes_skill.php");
    exit;
}

$skill_id = $_GET['skill_id'];

// ambil soal
$query = mysqli_query($koneksi, "SELECT * FROM soal_skill WHERE skill_id = '$skill_id'");
$soal = mysqli_fetch_all($query, MYSQLI_ASSOC);

$total = count($soal);
$current = isset($_GET['no']) ? $_GET['no'] : 1;

// kalau tidak ada soal
if($total == 0){
    echo "Soal belum tersedia untuk skill ini";
    exit;
}
// ================== PROSES JAWABAN ==================
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // simpan jawaban ke session
    $_SESSION['jawaban'][$current] = $_POST['jawaban'];

    // kalau belum soal terakhir
    if($current < $total){
        header("Location: soal_skill.php?skill_id=$skill_id&no=".($current+1));
        exit;
    } 
    else {
        // hitung skor
        $benar = 0;

        foreach($soal as $index => $s){
            $no = $index + 1;

            if(isset($_SESSION['jawaban'][$no]) && $_SESSION['jawaban'][$no] == $s['jawaban_benar']){
                $benar++;
            }
        }

        $skor = ($benar / $total) * 100;

        // simpan ke database
        mysqli_query($koneksi, "
            INSERT INTO hasil_tes (user_id, skill_id, skor_total)
            VALUES ('".$_SESSION['user_id']."', '$skill_id', '$skor')
        ");

        // hapus session jawaban
        unset($_SESSION['jawaban']);

        // redirect ke hasil
        header("Location: hasil_tes_skill.php?skill_id=$skill_id");
        exit;
    }
}
// ====================================================


// ambil soal sekarang
$data = $soal[$current - 1];
$progress = ($current / $total) * 100;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Soal Skill</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50 min-h-screen">

<!-- NAVBAR -->
<div class="bg-white px-6 py-4 shadow flex items-center gap-2">
    <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center text-white font-bold">
        S
    </div>
    <h1 class="text-blue-600 font-semibold text-lg">SkillSync</h1>
</div>

<div class="max-w-4xl mx-auto p-6">

    <!-- PROGRESS -->
    <div class="mb-6">
        <div class="flex justify-between text-sm text-blue-600 mb-1">
            <span>Soal <?= $current ?> dari <?= $total ?></span>
            <span><?= round($progress) ?>%</span>
        </div>
        <div class="w-full bg-blue-100 rounded-full h-2">
            <div class="bg-blue-500 h-2 rounded-full" style="width: <?= $progress ?>%"></div>
        </div>
    </div>

    <!-- CARD -->
    <form method="POST">
    <div class="bg-white p-6 rounded-2xl shadow">

        <!-- TAG -->
        <div class="mb-4">
            <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm">Skill</span>
            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-sm">Pilihan Ganda</span>
        </div>

        <!-- PERTANYAAN -->
        <h2 class="text-blue-700 font-semibold text-lg mb-6">
            <?= $data['pertanyaan'] ?>
        </h2>

        <!-- OPSI -->
        <?php foreach(['a','b','c','d'] as $opsi) { ?>
            <label class="block border rounded-xl p-4 mb-3 cursor-pointer hover:bg-blue-50">
                <input type="radio" name="jawaban" value="<?= strtoupper($opsi) ?>" class="mr-3" required>
                <?= $data['opsi_'.$opsi] ?>
            </label>
        <?php } ?>

    </div>

    <!-- NAVIGATION -->
    <div class="flex justify-between items-center mt-6">

        <!-- SEBELUMNYA -->
        <?php if($current > 1) { ?>
            <a href="?skill_id=<?= $skill_id ?>&no=<?= $current-1 ?>"  
               class="px-4 py-2 border rounded-lg text-blue-600">
               ← Sebelumnya
            </a>
        <?php } else { ?>
            <div></div>
        <?php } ?>

        <!-- NOMOR -->
        <div class="flex gap-2">
            <?php for($i=1; $i<=$total; $i++) { ?>
               <a href="?skill_id=<?= $skill_id ?>&no=<?= $i ?>"
                   class="w-8 h-8 flex items-center justify-center rounded-lg 
                   <?= $i == $current ? 'bg-blue-500 text-white' : 'border text-blue-600' ?>">
                   <?= $i ?>
                </a>
            <?php } ?>
        </div>

        <!-- NEXT / SELESAI (FIX DI SINI) -->
        <?php if($current < $total) { ?>
            <button type="submit" 
               class="px-4 py-2 bg-blue-500 text-white rounded-lg">
               Selanjutnya →
            </button>
        <?php } else { ?>
            <button type="submit" 
                class="px-4 py-2 bg-green-500 text-white rounded-lg">
                Selesai
            </button>
        <?php } ?>

    </div>

    <?php if($current > 1) { ?>
    <a href="?skill_id=<?= $skill_id ?>&no=<?= $current-1 ?>" 
       class="text-blue-500 hover:underline inline-block mb-4">
       ← Kembali
    </a>
    <?php } else { ?>
    <a href="pilih_tes_skill.php" 
       class="text-blue-500 hover:underline inline-block mb-4">
       ← Kembali ke Pilih Skill
    </a>
    <?php } ?>

    </form>

</div>

</body>
</html>
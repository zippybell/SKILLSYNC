<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

// ambil user berdasarkan email saja
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
$data = mysqli_fetch_assoc($query);

if ($data) {

    // cek password
    if ($password == $data['password']) {

        // SESSION
        $_SESSION['user_id'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['role'] = $data['role'];
        $_SESSION['expired'] = time() + 3600;

        // COOKIE
        if (isset($_POST['remember'])) {
            setcookie("email_user", $email, time() + (86400 * 7), "/");
        }

        // REDIRECT
        if ($data['role'] == 'admin') {
            header("Location: dashboard_admin.php");
        } elseif ($data['role'] == 'mahasiswa') {
            header("Location: dashboard_mahasiswa.php");
        } elseif ($data['role'] == 'mentor') {
            header("Location: dashboard_mentor.php");
        } else {
            echo "Role tidak dikenali!";
        }

    } else {
        echo "Password salah!";
    }

} else {
    echo "Email tidak ditemukan!";
}
?>
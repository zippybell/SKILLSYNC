<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email' AND password='$password'");
$data = mysqli_fetch_assoc($query);

if ($data) {

    // SESSION
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['expired'] = time() + 30;

    // COOKIES (remember me)
    if (isset($_POST['remember'])) {
        setcookie("email_user", $email, time() + (86400 * 7), "/");
    }

    header("Location: index.php");
} else {
    echo "Login gagal!";
}
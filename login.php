<?php
session_start();
include 'koneksi.php';

// ================== VALIDASI REQUEST ==================
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // ================== AMBIL DATA USER ==================
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {

        // ================== CEK PASSWORD ==================
        // (sementara masih plain text)
        if ($password == $data['password']) {

            // ================== SET SESSION ==================
            $_SESSION['user_id'] = $data['id_user'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['role'] = $data['role'];
            $_SESSION['expired'] = time() + 3600; // 1 jam

            // ================== REMEMBER ME ==================
            if (isset($_POST['remember'])) {
                setcookie("email_user", $email, time() + (86400 * 7), "/");
            }

            // ================== REDIRECT ROLE ==================
            switch ($data['role']) {

                case 'admin':
                    header("Location: dashboard_admin.php");
                    break;

                case 'mahasiswa':
                    header("Location: dashboard_mahasiswa.php");
                    break;

                case 'mentor':
                    header("Location: dashboard_mentor.php");
                    break;

                default:
                    echo "Role tidak dikenali!";
                    break;
            }

            exit;

        } else {
            echo "Password salah!";
        }

    } else {
        echo "Email tidak ditemukan!";
    }

} else {
    // kalau akses langsung tanpa POST
    header("Location: login_form.php");
    exit;
}
?>
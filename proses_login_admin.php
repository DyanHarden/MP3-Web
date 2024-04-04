<?php
session_start(); // Mulai sesi

include 'koneksi.php'; // Menghubungkan ke database

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login_admin"])) {
    // Lakukan autentikasi login admin
    $username_admin = $_POST["username_admin"];
    $password_admin = $_POST["password_admin"];

    // Query untuk mengambil data admin berdasarkan username
    $sql = "SELECT * FROM admin WHERE username='$username_admin'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Admin ditemukan, verifikasi password
        $row = mysqli_fetch_assoc($result);
        if ($password_admin == $row["password"]) { // Perhatikan bahwa dalam kasus ini kita tidak menggunakan hash untuk password admin
            // Password benar, login berhasil
            $_SESSION["admin_logged_in"] = true;
            $_SESSION["admin_username"] = $username_admin; // Simpan username admin ke dalam session
            header("Location: dashboard_admin.php");
            exit();
        } else {
            // Password salah
            $_SESSION["login_error"] = "Password salah. Silakan coba lagi.";
            header("Location: login_admin.php");
            exit();
        }
    } else {
        // Admin tidak ditemukan
        $_SESSION["login_error"] = "Username tidak ditemukan. Silakan coba lagi.";
        header("Location: login_admin.php");
        exit();
    }
}

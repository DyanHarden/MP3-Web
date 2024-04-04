<?php
session_start();

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_pelanggan'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa keberadaan username dan password dalam tabel pelanggan
    $query = "SELECT * FROM pelanggan WHERE username_pelanggan='$username' AND password_pelanggan='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Login berhasil
        session_start();
        $_SESSION['username_pelanggan'] = $username;
        header("Location: dashboard_pelanggan.php"); // Redirect ke halaman dashboard pelanggan
        exit();
    } else {
        // Login gagal
        $login_error = "Username atau password salah. Silakan coba lagi.";
    }
}

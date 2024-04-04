<?php
session_start(); // Mulai sesi

// Hapus semua data sesi
session_unset();

// Hapus sesi
session_destroy();

// Redirect ke halaman login
header("Location: ../index.php");
exit();

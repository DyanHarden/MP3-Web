<?php

function check_admin_login()
{
}

// Fungsi untuk memeriksa apakah admin sudah login. Jika belum, alihkan ke halaman login
function redirect_if_not_logged_in()
{
    if (!check_admin_login()) {
        header("Location: login_admin.php");
        exit;
    }
}

// Handle proses login pelanggan
include 'login_pelanggan.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TechyComputer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylecss/idx.css">
    <style>
        body {
            background-image: url('asset/1308043.jpg');
            background-size: cover;
            /* background-position: center; */
        }
    </style>
</head>

<!-- Login Page -->

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark shadow">
        <div class="container-fluid">
            <a class="navbar-brand navbar-dark" href="#"><i class="fas fa-desktop"></i></a>
            <a class="navbar-brand navbar-dark" href="#">Techy Computer</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-3 mb-3" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <button type="button" class="btn btn-warning nav-link " onclick="window.location.href='index.php'"></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


<div class="container mt-3 mb-5">
    <div class="row justify-content-center flex-column">
        <div class="col-md-6 mx-auto">
            <div class="card shadow border-warning">
                <div class="card-body bg-dark">
                    <h5 class="card-title text-center mb-4 text-light">Login Admin</h5>
                    <form method="post" action="login_admin.php">
                        <button type="submit" class="btn btn-warning btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 mx-auto">
            <div class="card shadow border-warning">
                <div class="card-body bg-dark">
                    <h5 class="card-title text-center mb-4 text-light">Login Pelanggan</h5>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <!-- Login Form -->
                        <div class="mb-3">
                            <input type="text" class="form-control border-warning" id="username" name="username" placeholder="Username" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control border-warning" id="password" name="password" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block" name="login_pelanggan">Login</button>
                    </form>

                    <div class="text-center mt-3 text-light">
                        Belum memiliki akun? <a href="register_pelanggan.php">Registrasi disini</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="bg-dark text-center text-lg-start fixed-bottom mt-5">
    <!-- Copyright -->
    <div class="text-center text-light p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2024 Copyright:
        <a class="text-light" href="#">TechyComputer.com</a>
    </div>
    <!-- Copyright -->
</footer>
</body>

</html>
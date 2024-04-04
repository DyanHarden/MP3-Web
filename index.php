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
    <link rel="stylesheet" href="stylecss/idx.css">
</head>

<body style="background-image: url('asset/bgcomputer.jpg'); background-size: cover;">>
    <!-- Login Page -->
    <div class="container mb-3 mt-1">
        <div class="row justify-content-center flex-column">
            <div class="col-md-6 mx-auto">
                <div class="card shadow border-primary">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Login Admin</h5>
                        <form method="post" action="login_admin.php">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mx-auto">
                <div class="card shadow border-primary">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Login Pelanggan</h5>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <!-- Login Form -->
                            <div class="mb-3">
                                <input type="text" class="form-control border-primary" id="username" name="username" placeholder="Username" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control border-primary" id="password" name="password" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="login_pelanggan">Login</button>
                        </form>

                        <div class="text-center mt-3">
                            Belum memiliki akun? <a href="register_pelanggan.php">Registrasi disini</a>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
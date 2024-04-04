<?php
session_start(); // Mulai sesi

// Periksa jika ada pesan kesalahan login
$login_error = isset($_SESSION["login_error"]) ? $_SESSION["login_error"] : "";
unset($_SESSION["login_error"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Techy Computer</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse mt-3 mb-3" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <button type="button" class="btn btn-warning nav-link " onclick="window.location.href='index.php'">Login Page</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Login Page -->
    <section class="p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="card border-light-subtle shadow mt-5">
                <div class="row g-0">
                    <div class="col-12 col-md-6 text-bg-primary">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <div class="col-10 col-xl-8 py-3 text-center">
                                <img class="img-fluid rounded-circle mb-4 d-block mx-auto" loading="lazy" src="asset/adminimg.jpg" width="245" height="80" alt="BootstrapBrain Logo">
                                <hr class="border-primary-subtle mb-4">
                                <h2 class="h1 mb-4">Techy Computer</h2>
                                <p class="lead m-0">Rekomendasi Rakitan dan Hardware PC.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <div class="card">
                                            <div class="card-body">
                                                <h2 class="card-title text-center mb-4">Login Admin</h2>
                                                <?php if (!empty($login_error)) : ?>
                                                    <div class="alert alert-danger" role="alert">
                                                        <?php echo $login_error; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <form method="post" action="proses_login_admin.php">
                                                    <div class="form-group mt-3">
                                                        <label for="username">Username</label>
                                                        <input type="text" class="form-control" id="username" name="username_admin" placeholder="Masukkan username admin" required>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label for="password">Password</label>
                                                        <input type="password" class="form-control" id="password" name="password_admin" placeholder="Masukkan password admin" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-block mt-3" name="login_admin">Login</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
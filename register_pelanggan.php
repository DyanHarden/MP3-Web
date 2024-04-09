<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_pelanggan'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email_reg'];
    $username = $_POST['username_reg'];
    $password = $_POST['password_reg'];

    // Periksa apakah username sudah ada dalam database
    $check_query = "SELECT * FROM pelanggan WHERE username_pelanggan='$username'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Jika username sudah ada, tampilkan pesan kesalahan
        $register_error = "Username sudah digunakan. Silakan gunakan username lain.";
    } else {
        // Jika username belum ada, tambahkan data baru ke dalam tabel pelanggan
        $insert_query = "INSERT INTO pelanggan (nama, email, username_pelanggan, password_pelanggan) VALUES ('$nama', '$email', '$username', '$password')";
        $insert_result = mysqli_query($conn, $insert_query);

        if ($insert_result) {
            // Registrasi berhasil
            $register_success = "Registrasi berhasil. Silakan login untuk melanjutkan.";
        } else {
            // Registrasi gagal
            $register_error = "Registrasi gagal. Silakan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Register Pelanggan</title>
</head>

<body>
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
                            <button type="button" class="btn btn-warning nav-link " onclick="window.location.href='index.php'">Login Page</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section>
            <div class="b-example-divider"></div>

            <div class="container col-xxl-8 px-4 py-5 mt-3">
                <div class="row flex-lg-row-reverse align-items-center g-5 py-5 shadow-sm">
                    <div class="col-10 col-sm-8 col-lg-6">
                        <img src="asset/whitesetup.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                    </div>
                    <div class="col-lg-6">
                        <h2 class="display-5 fw-bold lh-1 mb-3">Registrasi User</h2>
                        <p class="lead">Silahkan lakukan registrasi akun jika anda belum memilikinya, isilah form registrasi dibawah.</p>
                        <p class="lead">Jika anda ingin kembali ke halaman login, silahkan tekan tombol login page diatas.</p>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row justify-content-center mt-3 mb-5">
                    <div class="col-md-6">
                        <div class="card shadow">
                            <div class="card-body">
                                <h3 class="card-title text-center mb-4">Registrasi Pelanggan</h3>
                                <?php if (isset($register_success)) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo $register_success; ?>
                                    </div>
                                <?php } ?>
                                <?php if (isset($register_error)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $register_error; ?>
                                    </div>
                                <?php } ?>
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" class="form-control" id="email_reg" name="email_reg" placeholder="Email" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="username_reg" name="username_reg" placeholder="Username" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" id="password_reg" name="password_reg" placeholder="Password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block" name="register_pelanggan">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-dark text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center text-light p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Copyright:
            <a class="text-light" href="#">TechyComputer.com</a>
        </div>
        <!-- Copyright -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
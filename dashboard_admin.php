<?php
session_start(); // Mulai sesi

// Periksa apakah admin sudah login
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    // Jika belum, alihkan ke halaman login_admin.php
    header("Location: login_admin.php");
    exit();
}

// Ambil informasi admin yang sedang login dari session
$admin_username = $_SESSION["admin_username"];

include 'koneksi.php';

// Read Data Barang
$query = "SELECT * FROM barang";
$result = mysqli_query($conn, $query);

// Mendefinisikan variabel keyword dari inputan form pencarian
$keyword = "";
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}

// Query untuk mencari barang berdasarkan keyword
$sql = "SELECT * FROM barang WHERE nama_barang LIKE '%$keyword%' OR vendor LIKE '%$keyword%'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - CRUD Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="">
</head>

<body>

    <!-- Header -->
    <header class="p-3 mb-3 border-bottom shadow-sm">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <!-- Logo -->
                <!-- <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <img src="asset/logosaya.jpeg" alt="Logo" width="40" height="32" class="rounded-circle"> -->
                <span class="fw-bold fs-3 text ms-3">Dashboard Admin</span>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="dashboard_admin.php" class="nav-link px-2 link-dark"></a></li>
                    <li><a href="#" class="nav-link px-2 link-dark">CRUD Barang</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark">Rekomendasi Barang</a></li>
                </ul>

                <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form> -->

                <div class="dropdown text-center">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="asset/user-icon-on-transparent-background-free-png.png" alt="admin" width="32" height="22" class="rounded-circle">
                    </a>
                    <a href="#" class="nav-link px-2 link-dark text-center fw-bold">Selamat datang, <?php echo $admin_username; ?></a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#" onclick="confirmLogout()">Sign out</a></li>
                    </ul>
                    <!-- Alert Bootstrap untuk konfirmasi -->
                    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="confirmAlert" style="display: none;">
                        Apakah Anda yakin ingin keluar?
                        <button type="button" class="btn btn-warning ms-2" onclick="redirectToLogout()">Ya</button>
                        <button type="button" class="btn btn-primary" onclick="cancelLogout()">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <!-- Jumbtron -->
        <section class="py-5 text-center container jumbotron mt-3 shadow-sm" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('asset/adminjumbotron.png') no-repeat center center / cover; color: white; text-shadow: 4px 4px 8px #000;">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="display-4">Hello!</h1>
                    <p class="lead">Silahkan mengelola data barang yang ada pada toko.</p>
                </div>
            </div>
        </section>
        <!-- End -->

        <!-- Section Display Barang -->
        <section>
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title mb-5">Data Barang</h3>

                        <!-- Form Pencarian -->
                        <form method="GET" action="">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control border-primary" placeholder="Cari Barang Tertentu: " name="keyword">
                                <button class="btn btn-outline-primary" type="submit">Cari</button>
                                <a href="dashboard_admin.php" class="btn btn-outline-warning">Refresh</a>
                            </div>
                        </form>

                        <!-- Tabel untuk Menampilkan Data Barang -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Vendor</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Perubahan Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id_barang'] . "</td>";
                                    echo "<td>" . $row['nama_barang'] . "</td>";
                                    echo "<td>" . $row['vendor'] . "</td>";
                                    echo "<td>" . $row['stok'] . "</td>";
                                    echo "<td>" . $row['harga'] . "</td>";
                                    echo "<td>
                            <a href='crudbarang/edit_barang.php?id=" . $row['id_barang'] . "' class='btn btn-primary btn-sm'>Edit</a>
                            <a href='crudbarang/hapus_barang.php?id=" . $row['id_barang'] . "' class='btn btn-danger btn-sm'>Hapus</a>
                        </td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>

                        <!-- Tombol untuk Tambah Data Barang -->
                        <a href="crudbarang/tambah_barang.php" class="btn btn-success">Tambah Barang</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End -->
    </main>

    <!-- Footer -->
    <footer class="bg-body-tertiary text-center text-lg-start mt-5">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Copyright:
            <a class="text-body" href="https://mdbootstrap.com/">TechyComputer.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- End -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="scripts.js"></script>
</body>

</html>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylecss/dashboardadm.css">
    <title>Dashboard Admin</title>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Techy Computer</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="dashboard_admin.php">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#displaytoko">
                                <span data-feather="file"></span>
                                Data Barang Toko
                            </a>
                        <li class="nav-item">
                            <a class="nav-link" href="#grafikpenjualan">
                                <span data-feather="file"></span>
                                Grafik Penjualan
                            </a>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard Admin (<?php echo $admin_username; ?>)</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-danger border-danger" id="signOutBtn">Sign out</button>
                        </div>
                    </div>
                </div>

                <!-- Sign out -->
                <div class="modal fade" id="signOutModal" tabindex="-1" aria-labelledby="signOutModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="signOutModalLabel">Peringatan!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah admin ingin keluar?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                <button type="button" class="btn btn-primary" id="confirmSignOut">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="py-5 text-center container jumbotron mt-3 shadow-sm" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('asset/adminjumbotron.png') no-repeat center center / cover; color: white; text-shadow: 4px 4px 8px #000;">
                    <div class="row py-lg-5">
                        <div class="col-lg-6 col-md-8 mx-auto">
                            <h1 class="display-4">Hello!</h1>
                            <p class="lead">Silahkan mengelola data barang yang ada pada toko.</p>
                        </div>
                    </div>
                </section>

                <!-- Section Display Barang -->
                <section id="displaytoko">
                    <div class="container mt-5 mb-3">
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

                <section id="grafikpenjualan">
                    <div class="container mt-5 mb-3">
                        <h3>Grafik Penjualan Hardware Bulan Ini: </h3>
                        <canvas id="salesChart" width="400" height="200"></canvas>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <footer class="bg-dark text-light text-center text-lg-start ms-5 me-5 mt-5">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            2024 Copyright:
            <a class="text-light" href="#">™TechyComputer.com</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        document.getElementById("signOutBtn").addEventListener("click", function(event) {
            event.preventDefault();
            var signOutModal = new bootstrap.Modal(document.getElementById('signOutModal'));
            signOutModal.show();
        });

        document.getElementById("confirmSignOut").addEventListener("click", function(event) {
            window.location.href = "logout/logoutadmin.php";
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data penjualan hardware bulan ini
        var salesData = {
            labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
            datasets: [{
                label: 'Penjualan Hardware dan Rakitan',
                data: [250, 320, 400, 300],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        // Konfigurasi grafik
        var salesConfig = {
            type: 'line',
            data: salesData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        var salesChart = new Chart(document.getElementById('salesChart'), salesConfig);
    </script>
</body>

</html>
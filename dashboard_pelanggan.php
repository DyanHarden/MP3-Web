<?php
session_start(); // Mulai sesi

// Periksa apakah pelanggan sudah login
if (!isset($_SESSION["username_pelanggan"])) {
    // Jika belum, alihkan ke halaman login_pelanggan.php
    header("Location: index.php");
    exit();
}

include 'koneksi.php';

// Query untuk mengambil data barang
$sql = "SELECT * FROM barang";
$result = mysqli_query($conn, $sql);

// Mencari barang
$keyword = "";
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}

// Query untuk mencari barang berdasarkan keyword
$sql = "SELECT * FROM barang WHERE nama_barang LIKE '%$keyword%' OR vendor LIKE '%$keyword%'";
$result = mysqli_query($conn, $sql);
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard Pelanggan</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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

    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">About</h4>
                        <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                        <path d="M8 21V12h8v9"></path>
                        <circle cx="12" cy="17" r="4"></circle>
                    </svg>
                    <strong>TechyComputer</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>

    <main>
        <section>
            <div class="b-example-divider"></div>

            <div class="container col-xxl-8 px-4 py-5">
                <div class="row flex-lg-row-reverse align-items-center g-5 py-5 shadow-sm">
                    <div class="col-10 col-sm-8 col-lg-6">
                        <img src="asset/bgcomputer.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                    </div>
                    <div class="col-lg-6">
                        <h2 class="display-5 fw-bold lh-1 mb-3">Techy Computer</h2>
                        <p class="lead">Kami menjual berbagai hardware dan rakitan komputer, sesuai dengan kebutuhan dan budget pengguna.</p>
                        <p class="lead">Kami selalu memberikan update terbaru tentang barang terbaru dan ketersedian barang.</p>
                    </div>
                </div>
            </div>
        </section>


        <!-- End -->

        <!-- Tabel Display Barang -->
        <section>
            <div class="container mt-5 mb-3 shadow-sm">
                <!-- <h1 class="text-center mb-4">Selamat Datang di Dashboard Pelanggan</h1> -->
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title text-center mb-4">Daftar Barang Tersedia</h3>

                                <!-- Form Pencarian -->
                                <form method="GET" action="">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control border-primary" placeholder="Cari Barang Tertentu: " name="keyword">
                                        <button class="btn btn-outline-success" type="submit">Cari</button>
                                        <a href="dashboard_pelanggan.php" class="btn btn-outline-danger">Refresh</a>
                                    </div>
                                </form>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Vendor</th>
                                                <th>Stok</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $row['id_barang']; ?></td>
                                                    <td><?php echo $row['nama_barang']; ?></td>
                                                    <td><?php echo $row['vendor']; ?></td>
                                                    <td><?php echo $row['stok']; ?></td>
                                                    <td><?php echo $row['harga']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End -->

        <!-- Rekomendasi Rakitan PC -->
        <section>
            <h3 class="text-center mt-5">Galeri Rekomendasi Rakitan PC Terkini</h3>
            <div class="album py-5 bg-light">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <div class="col">
                            <div class="card shadow">
                                <img src="asset/pc1.jpg" class="card-img-top img-fluid" alt="PC Image" style="height: 275px;">
                                <!-- Deskripsi Spesifikasi PC -->
                                <div class="card-body">
                                    <h5 class="card-title">Rakitan PC ROG x Ryzen</h5>
                                    <p class="card-text">
                                        Spesifikasi:
                                    <ul>
                                        <li>Prosesor: AMD Ryzen 7 5800X</li>
                                        <li>RAM: 32GB DDR4</li>
                                        <li>GPU: NVIDIA GeForce RTX 3070</li>
                                        <li>Storage: 1TB NVMe SSD</li>
                                        <li>Harga: Rp17.000.000</li>
                                    </ul>
                                    </p>
                                    <small class="text-muted">Harga termasuk jasa rakit dan pajak.</small>
                                </div>
                            </div>
                        </div>



                        <div class="col">
                            <div class="card shadow">
                                <img src="asset/intel_pc_rakitan_gaming_core_i5_9400f-16gb_ddr4-gtx_1650_4gb-ssd_240gb_full04_x9zeq1d.png" class="card-img-top img-fluid" alt="PC Image" style="height: 275px;">
                                <!-- Deskripsi Spesifikasi PC -->
                                <div class="card-body">
                                    <h5 class="card-title">Rakitan PC Armagedon V1</h5>
                                    <p class="card-text">
                                        Spesifikasi:
                                    <ul>
                                        <li>Prosesor: Intel Core i5 9400f</li>
                                        <li>RAM: 16GB DDR4</li>
                                        <li>GPU: NVIDIA GeForce GTX 1650 Ti</li>
                                        <li>Storage: 500GB NVMe SSD</li>
                                        <li>Harga: Rp7.500.000</li>
                                    </ul>
                                    </p>
                                    <small class="text-muted">Harga termasuk jasa rakit dan pajak.</small>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card shadow">
                                <img src="asset/msi office pc.png" class="card-img-top img-fluid" alt="PC Image" style="height: 275px;">
                                <!-- Deskripsi Spesifikasi PC -->
                                <div class="card-body">
                                    <h5 class="card-title">Rakitan PC MSI-Office</h5>
                                    <p class="card-text">
                                        Spesifikasi:
                                    <ul>
                                        <li>Prosesor: Intel Core i3 10100f</li>
                                        <li>RAM: 8GB DDR4</li>
                                        <li>GPU: NVIDIA GeForce GTX 750 Ti</li>
                                        <li>Storage: 256GB NVMe SSD + HDD 1TB</li>
                                        <li>Harga: Rp5.500.000</li>
                                    </ul>
                                    </p>
                                    <small class="text-muted">Harga termasuk jasa rakit dan pajak.</small>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card shadow">
                                <img src="asset/pc4 - ryzen 5 5600 compe.jpeg" class="card-img-top img-fluid" alt="PC Image" style="height: 275px;">
                                <!-- Deskripsi Spesifikasi PC -->
                                <div class="card-body">
                                    <h5 class="card-title">Rakitan PC Competitive Gamers</h5>
                                    <p class="card-text">
                                        Spesifikasi:
                                    <ul>
                                        <li>Prosesor: AMD Ryzen 5 5600</li>
                                        <li>RAM: 16GB DDR4</li>
                                        <li>GPU: NVIDIA GeForce RTX 2060 Super</li>
                                        <li>Storage: 500GB NVMe SSD + HDD 1TB</li>
                                        <li>Harga: Rp9.000.000</li>
                                    </ul>
                                    </p>
                                    <small class="text-muted">Harga termasuk jasa rakit dan pajak.</small>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card shadow">
                                <img src="asset/pc-5 bluemoon.png" class="card-img-top img-fluid" alt="PC Image" style="height: 275px;">
                                <!-- Deskripsi Spesifikasi PC -->
                                <div class="card-body">
                                    <h5 class="card-title">Rakitan PC Bluemoon OC-Edition</h5>
                                    <p class="card-text">
                                        Spesifikasi:
                                    <ul>
                                        <li>Prosesor: Intel Core i7 11700KF</li>
                                        <li>RAM: 16GB DDR4</li>
                                        <li>GPU: NVIDIA GeForce RTX 3060</li>
                                        <li>Storage: 1TB NVMe SSD + HDD 2TB</li>
                                        <li>Harga: Rp16.200.000</li>
                                    </ul>
                                    </p>
                                    <small class="text-muted">Harga termasuk jasa rakit dan pajak.</small>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card shadow">
                                <img src="asset/pc-6 black luxe.png" class="card-img-top img-fluid" alt="PC Image" style="height: 275px;">
                                <!-- Deskripsi Spesifikasi PC -->
                                <div class="card-body">
                                    <h5 class="card-title">Rakitan PC AMD B-Luxury</h5>
                                    <p class="card-text">
                                        Spesifikasi:
                                    <ul>
                                        <li>Prosesor: AMD Ryzen 5 8600G</li>
                                        <li>RAM: 16GB DDR4</li>
                                        <li>GPU: AMD Radeon RX 6500XT</li>
                                        <li>Storage: 500GB NVMe SSD + HDD 1TB</li>
                                        <li>Harga: Rp12.000.000</li>
                                    </ul>
                                    </p>
                                    <small class="text-muted">Harga termasuk jasa rakit dan pajak.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted shadow">

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-md-start mt-5 text-center">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>ABOUT US
                        </h6>
                        <p>
                            Kami menjual berbagai hardware dan rakitan komputer, sesuai dengan kebutuhan dan budget pengguna.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- GMAPS -->
                    <!-- <div class="card col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 text-center">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d356933.8714888409!2d10.413661869378636!3d45.65994086120074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4781eca8aec020b9%3A0x91dcf07c1c969bb8!2sGarda!5e0!3m2!1spl!2spl!4v1672244147501!5m2!1spl!2spl" class="card-img-top h-100" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div> -->
                    <!-- End -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 text-center">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Settings</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 text-center">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@example.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <div class="text-center p-4">
            © 2024 Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">TechyComputer.com</a>
        </div>
    </footer>
    <!-- Footer -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="scripts.js"></script>

</body>

</html>
<?php
session_start();
include '../koneksi.php';

// 
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: ../login_admin.php");
    exit;
}

$error_message = ""; // Inisialisasi pesan error

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tambah_barang'])) {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $vendor = $_POST['vendor'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    // Query untuk mengecek apakah ID barang sudah digunakan
    $check_query = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
    $check_result = mysqli_query($conn, $check_query);

    // Jika ID barang sudah digunakan, tampilkan pesan error
    if (mysqli_num_rows($check_result) > 0) {
        $error_message = "ID barang sudah digunakan. Silakan gunakan ID barang lain.";
    } else {
        // Jika ID barang belum digunakan, tambahkan data barang baru
        $query = "INSERT INTO barang (id_barang, nama_barang, vendor, stok, harga) VALUES ('$id_barang', '$nama_barang', '$vendor', '$stok', '$harga')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Redirect ke halaman dashboard_admin.php jika tambah barang berhasil
            header("Location: ../dashboard_admin.php");
            exit();
        } else {
            $error_message = "Gagal menambahkan barang. Silakan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Techy Computer</a>
                <a class="navbar-brand" href="#"><i class="fas fa-desktop me-2"></i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse mt-3 mb-3" id="navbarNav">
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title mb-3 text-center">Menambah Data Barang: </h3>
                <?php if (!empty($error_message)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                <?php } ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="mb-3">
                        <label for="id_barang" class="form-label">ID Barang</label>
                        <input type="text" class="form-control" id="id_barang" name="id_barang" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                    </div>
                    <div class="mb-3">
                        <label for="vendor" class="form-label">Vendor</label>
                        <input type="text" class="form-control" id="vendor" name="vendor" required>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="text" class="form-control" id="stok" name="stok" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="tambah_barang">Tambah</button>
                    <button type="button" class="btn btn-warning" onclick="window.location.href='../dashboard_admin.php'">Batal</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
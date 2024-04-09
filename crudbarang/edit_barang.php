<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_barang'])) {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $vendor = $_POST['vendor'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    // Query untuk mengupdate data barang
    $query = "UPDATE barang SET nama_barang='$nama_barang', vendor='$vendor', stok='$stok', harga='$harga' WHERE id_barang='$id_barang'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect ke halaman dashboard_admin.php jika edit barang berhasil
        header("Location: ../dashboard_admin.php");
        exit();
    } else {
        $error_message = "Gagal mengedit barang. Silakan coba lagi.";
    }
} else {
    // Ambil ID barang dari parameter URL
    $id_barang = $_GET['id'];
    // Query untuk mendapatkan data barang berdasarkan ID
    $query = "SELECT * FROM barang WHERE id_barang='$id_barang'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
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
                <h2 class="card-title mb-3 text-center">Memperbarui Data Barang: </h2>
                <?php if (isset($error_message)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                <?php } ?>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="id_barang" value="<?php echo $row['id_barang']; ?>">
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="vendor" class="form-label">Vendor</label>
                        <input type="text" class="form-control" id="vendor" name="vendor" value="<?php echo $row['vendor']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="text" class="form-control" id="stok" name="stok" value="<?php echo $row['stok']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $row['harga']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="edit_barang">Simpan Perubahan</button>
                    <button type="button" class="btn btn-warning" onclick="window.location.href='../dashboard_admin.php'">Batal</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tambah_barang'])) {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $vendor = $_POST['vendor'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    // Query untuk menambahkan data barang baru
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Tambah Barang</h2>
        <?php if (isset($error_message)) { ?>
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
        </form>
    </div>
</body>

</html>
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
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Barang</h2>
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
        </form>
    </div>
</body>

</html>
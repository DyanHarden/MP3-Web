<?php
include '../koneksi.php';

// Ambil ID barang dari parameter URL
$id_barang = $_GET['id'];

// Query untuk menghapus data barang berdasarkan ID
$query = "DELETE FROM barang WHERE id_barang='$id_barang'";
$result = mysqli_query($conn, $query);

if ($result) {
    // Redirect ke halaman dashboard_admin.php jika hapus barang berhasil
    header("Location: ../dashboard_admin.php");
    exit();
} else {
    $error_message = "Gagal menghapus barang. Silakan coba lagi.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <?php if (isset($error_message)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php } ?>
    </div>
</body>

</html>
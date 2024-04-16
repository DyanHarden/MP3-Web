<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: ../login_admin.php");
    exit;
}

// Ambil ID barang dari parameter URL
$id_barang = $_GET['id'];

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Jika admin telah mengkonfirmasi penghapusan, lanjutkan dengan proses penghapusan
    if ($_POST["confirm_delete"] == "yes") {
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
    }
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

        <!-- Konfirmasi sebelum menghapus barang -->
        <div class="alert alert-warning" role="alert">
            Anda yakin ingin menghapus barang ini?
        </div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id_barang; ?>">
            <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>">
            <input type="hidden" name="confirm_delete" value="yes">
            <button type="submit" class="btn btn-danger">Ya</button>
            <a href="../dashboard_admin.php" class="btn btn-secondary">Tidak</a>
        </form>
    </div>

    <!-- Script -->
    <script>
        function confirmDelete() {
            return confirm("Anda yakin ingin menghapus barang ini?");
        }
    </script>
</body>

</html>
// Alert Log-out Admin
function confirmLogout() {
  document.getElementById("confirmAlert").style.display = "block";
}

// Fungsi untuk mengarahkan ke halaman logout jika pengguna mengonfirmasi
function redirectToLogout() {
  window.location.href = "logout/logoutadmin.php";
}

// Fungsi untuk menyembunyikan alert jika pengguna memilih batal
function cancelLogout() {
  document.getElementById("confirmAlert").style.display = "none";
}
// End

// Simpan data tabel awal
let originalTable = document.getElementById("barangTable").innerHTML;

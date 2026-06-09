<?php
// Hubungkan ke file koneksi database
include 'koneksi.php';

// Cek apakah ada parameter 'id' yang dikirim lewat URL
if (isset($_GET['id'])) {
    // Amankan parameter ID
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);

    // Query untuk menghapus data berdasarkan ID
    $query = "DELETE FROM pusat_data WHERE id = '$id'";
    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        echo "<script>
                alert('Data dokumen berhasil dihapus!');
                window.location.href = 'dashboard.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data.');
                window.location.href = 'dashboard.php';
              </script>";
    }
} else {
    // Jika diakses tanpa parameter id, lempar balik ke dashboard
    header("Location: dashboard.php");
}
?>
<?php
// Hubungkan ke file koneksi database
include 'koneksi.php';

// Cek apakah tombol simpan di klik
if (isset($_POST['simpan_dokumen'])) {
    // Ambil data dari form
    $id           = mysqli_real_escape_string($koneksi, $_POST['id_dokumen']);
    $nama_dokumen = mysqli_real_escape_string($koneksi, $_POST['nama_dokumen']);
    $url_link     = mysqli_real_escape_string($koneksi, $_POST['url_link']);

    // Validasi agar data tidak kosong
    if (!empty($id) && !empty($nama_dokumen) && !empty($url_link)) {
        
        // Query untuk memperbarui data berdasarkan ID
        $query = "UPDATE pusat_data SET nama_dokumen = '$nama_dokumen', url_link = '$url_link' WHERE id = '$id'";
        $hasil = mysqli_query($koneksi, $query);

        if ($hasil) {
            echo "<script>
                    alert('Data dokumen berhasil diperbarui!');
                    window.location.href = 'dashboard.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal memperbarui data.');
                    window.location.href = 'dashboard.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Semua data wajib diisi!');
                window.location.href = 'dashboard.php';
              </script>";
    }
} else {
    header("Location: dashboard.php");
}
?>
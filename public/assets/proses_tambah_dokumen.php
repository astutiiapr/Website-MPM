<?php
// Hubungkan ke file koneksi database
include 'koneksi.php';

// Cek apakah tombol simpan di klik
if (isset($_POST['simpan_dokumen'])) {
    // Ambil data dari form dan amankan dari input berbahaya
    $nama_dokumen = mysqli_real_escape_string($koneksi, $_POST['nama_dokumen']);
    $url_link     = mysqli_real_escape_string($koneksi, $_POST['url_link']);

    // Validasi sederhana agar input tidak kosong
    if (!empty($nama_dokumen) && !empty($url_link)) {
        
        // Query untuk memasukkan data ke tabel pusat_data
        $query = "INSERT INTO pusat_data (nama_dokumen, url_link) VALUES ('$nama_dokumen', '$url_link')";
        $hasil = mysqli_query($koneksi, $query);

        if ($hasil) {
            // Jika berhasil, munculkan notifikasi dan balik ke halaman dashboard
            echo "<script>
                    alert('Data dokumen berhasil ditambahkan!');
                    window.location.href = 'dashboard.php';
                  </script>";
        } else {
            // Jika gagal query
            echo "<script>
                    alert('Gagal menyimpan data ke database.');
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
    // Jika diakses ilegal tanpa klik tombol form
    header("Location: dashboard.php");
}
?>
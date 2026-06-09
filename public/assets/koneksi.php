<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_mpm"; // Harus sama dengan nama database di phpMyAdmin

// Membuat koneksi ke MySQL
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek apakah koneksi berhasil atau gagal
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
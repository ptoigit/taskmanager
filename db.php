<?php
$host = "localhost";      // Nama host
$user = "root";           // Username database
$pass = "Otsuk@123";               // Password database
$dbname = "test_db";      // Nama database

$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

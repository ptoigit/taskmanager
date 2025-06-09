<?php
include 'db.php';

$nama = 'admin';
$email = 'admin@example.com';
$password = password_hash('admin123', PASSWORD_DEFAULT);

$sql = "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$password')";

if ($conn->query($sql)) {
    echo "User admin berhasil ditambahkan.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>


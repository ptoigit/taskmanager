<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $conn->real_escape_string($_POST['nama']);
    $email = $conn->real_escape_string($_POST['email']);
    $jeniskelamin = $conn->real_escape_string($_POST['jeniskelamin']);

    $sql = "INSERT INTO users (nama, email, jeniskelamin) VALUES ('$nama', '$email', '$jeniskelamin')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


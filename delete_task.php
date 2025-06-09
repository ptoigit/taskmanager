<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Hapus task dari database
    $sql = "DELETE FROM tasks WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redirect ke list dengan status sukses
        header("Location: list_task.php?status=deleted");
        exit;
    } else {
        echo "Error saat menghapus: " . $conn->error;
    }

    $conn->close();
} else {
    // Jika ID tidak ada, kembali ke daftar
    header("Location: list_task.php");
    exit;
}
?>


<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int) $_POST['id'];
    $judul = $conn->real_escape_string($_POST['judul']);
    $user_id = (int) $_POST['user_id'];

    $sql = "UPDATE tasks SET judul = '$judul', user_id = $user_id WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: list_task.php?status=updated");
        exit;
    } else {
        echo "Error saat update: " . $conn->error;
    }

    $conn->close();
}
?>


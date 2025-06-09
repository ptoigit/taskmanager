<?php
include 'db.php';

$message = "";
$alertType = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $conn->real_escape_string($_POST['judul']);
    $user_id = (int) $_POST['user_id'];

    $sql = "INSERT INTO tasks (judul, user_id) VALUES ('$judul', $user_id)";

    if ($conn->query($sql) === TRUE) {
        $message = "Task berhasil disimpan.";
        $alertType = "success";
    } else {
        $message = "Gagal menyimpan task: " . $conn->error;
        $alertType = "danger";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hasil Simpan Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <?php if ($message): ?>
                <div class="alert alert-<?= $alertType ?> alert-dismissible fade show" role="alert">
                    <?= htmlspecialchars($message) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <a href="task.php" class="btn btn-primary">Kembali ke Form</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<?php
include 'db.php';
include 'auth.php';

// Ambil data user dari tabel
$sql = "SELECT id, nama FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Task</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow rounded">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Form Tambah Task</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="submit.php">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Task</label>
                    <input type="text" class="form-control" name="judul" id="judul" required>
                </div>

                <div class="mb-3">
                    <label for="user_id" class="form-label">Pilih User</label>
                    <select class="form-select" name="user_id" id="user_id" required>
                        <option value="">-- Pilih User --</option>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['nama']) ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Simpan Task</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS (opsional, untuk komponen interaktif) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>


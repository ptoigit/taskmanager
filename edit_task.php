<?php
include 'db.php';

// Ambil data task berdasarkan ID
if (!isset($_GET['id'])) {
    header("Location: list_task.php");
    exit;
}

$id = (int) $_GET['id'];
$sql_task = "SELECT * FROM tasks WHERE id = $id";
$result_task = $conn->query($sql_task);
$task = $result_task->fetch_assoc();

if (!$task) {
    echo "Task tidak ditemukan.";
    exit;
}

// Ambil semua user untuk dropdown
$sql_users = "SELECT id, nama FROM users";
$result_users = $conn->query($sql_users);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow rounded">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Edit Task</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="update_task.php">
                <input type="hidden" name="id" value="<?= $task['id'] ?>">

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Task</label>
                    <input type="text" class="form-control" name="judul" id="judul" value="<?= htmlspecialchars($task['judul']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="user_id" class="form-label">Pilih User</label>
                    <select class="form-select" name="user_id" id="user_id" required>
                        <option value="">-- Pilih User --</option>
                        <?php while ($row = $result_users->fetch_assoc()): ?>
                            <option value="<?= $row['id'] ?>" <?= $row['id'] == $task['user_id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($row['nama']) ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="list_task.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>


<?php
include 'db.php';
include 'auth.php';

;







$sql = "SELECT tasks.id, tasks.judul, users.nama AS user_nama
        FROM tasks
        LEFT JOIN users ON tasks.user_id = users.id
        ORDER BY tasks.id DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <span class="me-2">Halo, <?= htmlspecialchars($_SESSION['user_nama']) ?></span>
        <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
    </div>
</div>






<?php if (isset($_GET['status']) && $_GET['status'] == 'deleted'): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Task berhasil dihapus.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (isset($_GET['status']) && $_GET['status'] == 'updated'): ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        Task berhasil diperbarui.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>



    <div c
ass="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Task</h3>
        <a href="form_task.php" class="btn btn-primary">+ Tambah Task</a>
    </div>

    <?php if ($result->num_rows > 0): ?>
        <table class="table table-bordered table-hover bg-white">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>User</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['judul']) ?></td>
                    <td><?= htmlspecialchars($row['user_nama']) ?></td>
                    <td>
                        <a href="edit_task.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete_task.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus task ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Belum ada task.</div>
    <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>


<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM tasks ORDER BY due_date ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="css_for_index/style.css">
</head>
<body>
    <div class="navbar">
        <h1>To-Do List</h1>
    </div>
    <div class="button-container">
        <a href="add_task.php" class="btn-add">Add Task</a>
        <a href="about.php" class="btn-about">About Me</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Task</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Change</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row['task_name']; ?></td>
                    <td><?= $row['due_date']; ?></td>
                    <td>
                        <span class="status <?= strtolower($row['status']); ?>">
                            <?= $row['status']; ?>
                        </span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="update_task.php?id=<?= $row['id']; ?>" class="btn-update">Update</a>
                            <a href="delete_task.php?id=<?= $row['id']; ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>

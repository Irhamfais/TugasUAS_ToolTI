<?php
include 'db.php';

// Ambil data tugas berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tasks WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $task = mysqli_fetch_assoc($result);
    } else {
        echo "Tugas tidak ditemukan.";
        exit;
    }
}

// Proses update data tugas
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task_name = $_POST['task_name'];
    $due_date = $_POST['due_date'];
    $status = $_POST['status'];

    $update_query = "UPDATE tasks SET task_name = '$task_name', due_date = '$due_date', status = '$status' WHERE id = $id";
    mysqli_query($conn, $update_query);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update Task</title>
</head>
<body>
    <div class="container">
        <h1>Update Task</h1>
        <form action="" method="POST">
            <label for="task-name">Taks:</label>
            <input type="text" name="task_name" value="<?= $task['task_name']; ?>" required>
            <br>
            <label for="deadline">Deadline:</label>
            <input type="date" name="due_date" value="<?= $task['due_date']; ?>" required>
            <br>
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="Pending" <?= $task['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                <option value="Completed" <?= $task['status'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
            </select>
            <br>
            <button type="submit">Save</button>
        </form>
    </div>
</body>
</html>

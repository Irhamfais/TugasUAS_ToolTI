<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task_name = $_POST['task_name'];
    $due_date = $_POST['due_date'];

    $query = "INSERT INTO tasks (task_name, due_date) VALUES ('$task_name', '$due_date')";
    mysqli_query($conn, $query);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Task</title>
</head>
<body>
    <div class="container">
        <h1>Add Task</h1>
        <form action="add_task.php" method="post">
            <label for="task-name">Task:</label>
            <input type="text" id="task-name" name="task_name" required>
            <br>
            <label for="deadline">Deadline:</label>
            <input type="date" name="due_date" required><br>
            <br>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>

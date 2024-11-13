<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>To-Do List App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>To-Do List</h1>
    <form action="add_task.php" method="post">
        <input type="text" name="task_name" placeholder="Enter Task name" required>
        <textarea name="task_description" placeholder="Enter Task description"></textarea>
        <button class="btn" type="submit">Add Task</button>
    </form>

    <h2>List of your Tasks</h2>
    <?php
    $stmt = $pdo->query("SELECT * FROM tasks");
    while ($task = $stmt->fetch()) {
        echo "<div class='task'>";
        echo "<h3>" . htmlspecialchars($task['task_name']) . "</h3>";
        echo "<p>" . htmlspecialchars($task['task_description']) . "</p>";
        echo "<a href='edit_task.php?id=" . $task['id'] . "'>Edit</a> ";
        echo "<a href='delete_task.php?id=" . $task['id'] . "' onclick='return confirm(\"Are you sure?\");'>Delete</a>";
        echo "</div>";
    }
    ?>
</body>
</html>


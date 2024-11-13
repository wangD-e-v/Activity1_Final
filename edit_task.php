<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = ?");
    $stmt->execute([$id]);
    $task = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $task_name = $_POST['task_name'];
    $task_description = $_POST['task_description'];

    $stmt = $pdo->prepare("UPDATE tasks SET task_name = ?, task_description = ? WHERE id = ?");
    $stmt->execute([$task_name, $task_description, $id]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>
    <form action="edit_task.php" method="post">
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
        <input type="text" name="task_name" value="<?php echo htmlspecialchars($task['task_name']); ?>" required>
        <textarea name="task_description"><?php echo htmlspecialchars($task['task_description']); ?></textarea>
        <button type="submit">Update Task</button>
    </form>
</body>
</html>


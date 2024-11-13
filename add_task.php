<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_name = $_POST['task_name'];
    $task_description = $_POST['task_description'];

    $stmt = $pdo->prepare("INSERT INTO tasks (task_name, task_description) VALUES (?, ?)");
    $stmt->execute([$task_name, $task_description]);

    header("Location: index.php");
    exit;
}
?>


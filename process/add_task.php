<?php
session_start();

require_once('db.php');

if (isset($_POST['new_task']) && !empty($_POST['new_task'])) {
    $newTask = $_POST['new_task'];
} else {
    header('Location: ../index.php');
    exit();
}

$sql = "INSERT INTO task_list (user_id, task_name)
        VALUES (?, ?)";

$stmt = $db->prepare($sql);
$data = [$_SESSION['user_id'], $newTask];
$stmt->execute($data);

header('Location: ../index.php');

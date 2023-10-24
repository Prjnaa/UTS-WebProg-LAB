<?php
session_start();

require_once('db.php');

if (isset($_POST['priority'], $_POST['task_name'], $_POST['task_desc'], $_POST['status'])) {
    $priority = $_POST['priority'];
    $taskName = $_POST['task_name'];
    $taskDesc = $_POST['task_desc'];
    $status = $_POST['status'];
} else {
    header('Location: ../add_task_form.php');
    exit();
}

if (isset($_POST['id'])) {
    $taskId = $_POST['id'];
    $sql = "UPDATE task_list SET priority = ?, task_name = ?, task_desc = ?, status = ? WHERE id = ?";
    $stmt = $db->prepare($sql);
    $data = [$priority, $taskName, $taskDesc, $status, $taskId];
} else {
    $sql = "INSERT INTO task_list (user_id, priority, task_name, task_desc, status) VALUES (?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $data = [$_SESSION['user_id'], $priority, $taskName, $taskDesc, $status];
}

$stmt->execute($data);
header('Location: ../todolist.php');
?>

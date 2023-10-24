<?php
session_start();
require_once('db.php');

var_dump($_POST['done_check']);

if(isset($_POST['done_check']) && $_POST['done_check'] == "not-done") {
    $sql = "UPDATE task_list
            SET status = 'Done'
            WHERE id = ?";
} else {
    $sql = "UPDATE task_list
            SET status = 'Not Started'
            WHERE id = ?";
}

$task_id = $_POST['id'];

$stmt = $db->prepare($sql);
$stmt->execute([$task_id]);

header('Location: ../todolist.php');
exit();

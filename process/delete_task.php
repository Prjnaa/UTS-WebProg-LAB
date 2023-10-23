<?php
session_start();

require_once('db.php');

$del_id = $_POST['del_id'];

$sql = "DELETE FROM task_list
        WHERE id = ?";

$stmt = $db->prepare($sql);
$stmt->execute([$del_id]);

header('Location: ../index.php');
exit();
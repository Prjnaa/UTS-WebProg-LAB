<?php
session_start();
require_once('db.php');

$username = $_POST['username'];
$password = $_POST['pass'];

$sql = "SELECT * FROM user
        WHERE username = ? OR email = ?";

$stmt = $db->prepare($sql);
$stmt->execute([$username, $username]);
$data_row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data_row) {
    header('Location: ../signin.php?error=1');
    exit();
} else {
    if(!password_verify($password, $data_row['password'])) {
        header('Location: ../signin.php?error=2');
        exit();
    }
    else {
        $_SESSION['user_id'] = $data_row['id'];
        $_SESSION['user_name'] = $data_row['username'];
        header('Location: ../index.php');
    }
}

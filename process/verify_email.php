<?php
require_once('db.php');

if (!isset($_POST['email']) || empty($_POST['email'])) {
    header('Location: ../forgot-pass.php?error=1');
    exit();
}

$email = $_POST['email'];

$sql = "SELECT * FROM user WHERE email = :email";
$stmt = $db->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    header('Location: ../forgot-pass.php?succ=1');
    exit();
} else {
    header('Location: ../forgot-pass.php?error=2');
    exit();
}

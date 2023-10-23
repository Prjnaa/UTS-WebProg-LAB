<?php
require_once ('db.php');

if (
    !isset($_POST['username']) || empty($_POST['username']) ||
    !isset($_POST['email']) || empty($_POST['email']) ||
    !isset($_POST['pass']) || empty($_POST['pass']) ||
    !isset($_POST['pass_confirm']) || empty($_POST['pass_confirm'])
) {
    header('Location: ../signup.php?error=1');
    exit();
}
else {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass_tmp = $_POST['pass'];
    $confirm = $_POST['pass_confirm'];

    if ($confirm == $pass_tmp){
        $password = $pass_tmp;
    }
    else {
        header('Location: ../register.php?error=2');
        exit();
    }

    if (strlen($password) < 8) {
        header('Location: ../signup.php?error=3');
        exit();
    }
}

$en_pass = password_hash($password, PASSWORD_BCRYPT);

$sql = "INSERT INTO user (username, email, password)
        VALUES (?, ?, ?)";

$stmt = $db->prepare($sql);
$data = [$username, $email, $en_pass];
$stmt->execute($data);

header('Location: ../signin.php');

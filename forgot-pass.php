<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Reset Password</title>
    <style>
        .center-div {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container center-div">
        <?php
        if(isset($_GET['succ']) && $_GET['succ'] == 1) {
        ?>
        <div class=" text-center">
            <form action="forgot-pass.php" method="post">
                <label for="password">New Password</label>
                <input id="password" name="pass" type="password">
                <label for="password">Confirm New Password</label>
                <input id="password" name="confirm" type="password">
                <button type="submit">Submit</button>
            </form>
        </div>
        <?php
        }
        else {
        ?>
        <div class=" text-center">
            <form action="process/verify_email.php" method="post">
                <label for="email">Your Email</label>
                <input id="email" name="email" type="email">
                <button type="submit">Submit</button>
            </form>
        </div>
        <?php
        }
        ?>
    </div>
</body>
</html>
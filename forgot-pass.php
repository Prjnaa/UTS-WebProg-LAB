<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\fpass.css">   
    <title>Reset Password</title>
</head>
<body>
    <div class="login-box">
        <?php
        if(isset($_GET['succ']) && $_GET['succ'] == 1) {
        ?>
        <div>
            <form action="forgot-pass.php" method="post">
                <div class="user-box">
                <input id="password" name="pass" type="password">
                    <label for="password">New Password</label>      
                </div>

                <div class="user-box">
                <input id="password" name="confirm" type="password">
                    <label for="password">Confirm New Password</label>   
                </div>

                <button type="submit" class="btt">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Submit</button>

            </form>
        </div>
        
        <?php
        }
        else {
        ?>
        <div  class="user-box">
            <form action="process/verify_email.php" method="post">
                <input id="email" name="email" type="email"  autocomplete="off">
                    <label for="email">Your Email</label>   
            
                <button type="submit" class="btt">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Submit</button>
            </form>
        </div>
        <?php
        }
        ?>
    </div>
</body>
</html>

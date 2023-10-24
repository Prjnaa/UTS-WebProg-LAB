<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\signin.css">
    <title>Sign Up</title>

</head>
<body>
<div class="login-box">
        <h2>Sign Up</h2>
        <div>
            <form action="process/signup_process.php" method="post">
            <div class="user-box">
                    <input type="text" name="username" required autocomplete="off">
                    <label for="username">Username</label>
                </div>
                <div class="user-box">
                    <input type="email" name="email" id="email" required autocomplete="off">
                    <label for="email">Email</label>
                </div>
                <div class="user-box">
                <input type="password" name="pass" id="password" required>
                <label  for="password">Password</label>
                </div>
                <div class="user-box">
                <input type="password" name="pass_confirm" class="form-control" id="confirm" required>
                    <label for="confirm">Confirm Password</label>
                    
                </div>
                <button type="submit" class="btt">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Sign
                </button>
            </form>
        </div>
    </div>
</body>
</html>

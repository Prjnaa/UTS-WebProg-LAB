<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\signin.css">
    <title>Sign In</title>
</head>
<body>
    <div class="login-box">
        <h2>Sign In</h2>
        <div>
            <form action="process/signin_process.php" method="post">
                <div class="user-box">
                <a>-</a>
                    <input type="text" name="username" required autocomplete="off">
                    <label for="username">Username</label>
                </div>
                <div class="user-box">
                <a>-</a>
                    <input type="password" name="pass" required>
                    <label for="password">Password</label>
                </div>
                <a href="forgot-pass.php">Forgot Password?</a>
                <button type="submit" class="btt">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Login
                </button>
                <a href="signup.php" style="display: block; text-align: center;">or Doesn't Have an Account?</a>
            </form>
        </div>
    </div>
</body>
</html>

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
                    <input type="text" name="username" required>
                    <label>Username</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" required>
                    <label>Password</label>
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

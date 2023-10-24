<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\signin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Sign In</title>
</head>
<body class="bg-dark">
    <div class="login-box">
        <h2>Sign In</h2>
        <div>
            <form action="process/signin_process.php" method="post">
                <div class="user-box">
                    <input type="text" name="username" required class="" autocomplete="off">
                    <label>Username / Email</label>
                </div>
                <div class="user-box">
                    <input type="password" name="pass" required>
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
                <div class=" p-5 ">
                    <a href="signup.php" style="display: block; text-align: center;">don't Have an Account?</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

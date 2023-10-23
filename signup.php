<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">


</head>
<body>

    <div class="login-wrapper">

        <div class="sign-up">
            <form action="proses-signup.php" method="post" novalidate>
            <h1>Sign-Up</h1>
                <div>
                    <label for="name">
                        <input placeholder="Full Name" type="text" id="name" name="name">
                    </label>
                </div>
                <div>
                    <label for="email">
                        <input placeholder="example@gmail.com" type="email" id="email">
                    </label>
                </div>
                <div>
                    <label for="password">
                        <input placeholder="Password" type="password" id="password" name="password">
                    </label>
                </div>
                <div>
                    <label for="password_confirmation">
                        <input placeholder="Confirm Password" type="password" id="password_confirmation" name="password">
                    </label>
                </div>
                <button type="submit">Register</button>
            </form>
        </div>

        <div class="image-check-list">
            <img src="Checklist.jpg" class="image-check-list" />
        </div>

    </div>    

</body>
</html>
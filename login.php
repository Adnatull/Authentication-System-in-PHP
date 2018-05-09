<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/main.css" />
    <script src="assets/main.js"></script>
</head>
<body>
    <div class="header">
        <h2>Login</h2>
    </div>
    <form method="post" action="login.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username">
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>

        <div class="input-group">
            <button type="submit" name="login" class="btn">Login</button>
        </div>
        <p>
            Not yet a member? <a href="register.php"> Sign Up</a>
        </p>
    </form>
    
</body>
</html>
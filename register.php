<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Registration Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/main.css" />
    <script src="assets/main.js"></script>
</head>
<body>
    <div class="header">
        <h2>Register</h2>
    </div>
    <form method="post" action="register.php">

        <?php include('errors.php'); ?>

        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>

        <div class="input-group">
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password1">
        </div>

        <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="password2">
        </div>

        <div class="input-group">
            <button type="submit" name="register" class="btn">Register</button>
        </div>
        <p>
            Already a member? <a href="login.php"> Sign in</a>
        </p>
    </form>
    
</body>
</html>
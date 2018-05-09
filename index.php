<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/main.css" />
    <script src="assets/main.js"></script>
</head>
<body>
    <div class="header">
        <h2>Home</h2>
    </div>
    
    <div class="content">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="error success">
                <h3>
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <?php if (isset($_SESSION["username"])): ?>
            <p> Welcome <strong> <?php echo $_SESSION['username']; ?> </strong></p>
            <p> <a href = "index.php?logout='1'" style="color: red;">Logout</a></p>
        <?php else: ?>
        <p>
             <a href="register.php"> Sign Up</a>
             &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp;    &nbsp;&nbsp; 
            <a href="login.php"> Sign in</a>
        </p>
        <?php endif ?>
    </div>
    
</body>
</html>
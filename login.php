<?php include ('header.php') ?> 
<?php include ('navbar.php') ?>


<?php if (isset($_SESSION["username"])): ?>
    <h3 align = "center" class="content success"> You are already Logged in </h3>
<?php else: ?>
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
<?php endif ?>  

<?php include('footer.php') ?>
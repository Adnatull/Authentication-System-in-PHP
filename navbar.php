<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <div class="topnav-right">    
        <?php if (isset($_SESSION["username"])): ?>
            <a> <?php echo $_SESSION['username']; ?> </a>
            <a href = "index.php?logout='1'" style="color: red;">Logout</a>
        <?php else: ?>
            <a href="register.php">Register</a>
            <a href="login.php">Sign in</a>    
        <?php endif ?>
  </div>
</div>
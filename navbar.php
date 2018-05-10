<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <div class="topnav-right"> 
      <a>
      <?php
          echo '<script type="text/javascript">
          var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
          var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

          var d = new Date();
          var day = days[d.getDay()];
          var hr = d.getHours();
          var min = d.getMinutes();
          if (min < 10) {
            min = "0" + min;
          }
          var ampm = "am";
          if( hr > 12 ) {
              hr -= 12;
              ampm = "pm";
          }
          var date = d.getDate();
          var month = months[d.getMonth()];
          var year = d.getFullYear();
          var x = document.getElementById("time");
          document.write("<b>" + day + " " + hr + ":" + min + ampm + " " + date + " " + month + " " + year + "</b>");
          </script>';                
      ?>
      </a>
        <?php if (isset($_SESSION["username"])): ?>
            <a href = "profile.php"> <?php echo $_SESSION['username']; ?> </a>
            <a href = "index.php?logout='1'" style="color: red;">Logout</a>
        <?php else: ?>
            <a href="register.php">Register</a>
            <a href="login.php">Sign in</a>    
        <?php endif ?>
  </div>
</div>
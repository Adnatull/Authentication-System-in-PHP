<?php

    session_start();

    $username = "";
    $email = "";
    $errors = array();

    $db = mysqli_connect('localhost', 'root', '', 'auth_system');
    if (isset($_POST['register'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $pass1 = mysqli_real_escape_string($db, $_POST['password1']);
        $pass2 = mysqli_real_escape_string($db, $_POST['password2']);

        if (empty($username)) {
            array_push($errors, "Username is required");
        }

        if (empty($email)) {
            array_push($errors, "Email is required");
        }

        if (empty($pass1)) {
            array_push($errors, "Password is required");
        }

        if ($pass1 != $pass2) {
            array_push($errors, "Passwords mismatch");
        }

        if (count($errors) == 0) {
            $password = md5($pass1);
            $sql = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";
            mysqli_query($db, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are logged in";
            header('location: index.php');
        }
    }

    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $pass = mysqli_real_escape_string($db, $_POST['password']);

        if (empty($username)) {
            array_push($errors, "Username is required");
        }

        if (empty($pass)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
            $password = md5($pass);
            $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = mysqli_query($db, $query);

            if (mysqli_num_rows($result) == 1 ) {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are logged in";
                header('location: index.php');
            }else{
                array_push($errors, "Wrong Username/Password");
                
            }

            
        }
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }

?>
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

        if (strlen($username) < 5) {
            array_push($errors, "Length of Username must be atleast 5");
        }

        if (empty($email)) {
            array_push($errors, "Email is required");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "The email is invalid!");
        }

        if (empty($pass1)) {
            array_push($errors, "Password is required");
        }

        if ($pass1 != $pass2) {
            array_push($errors, "Passwords mismatch");
        }

        if (strlen($pass1)<6) {
            array_push($errors, "Password length must be 6");
        }

        $alpha = false;
        $digit = false;
        for ($i=0; $i<strlen($pass1); $i++) {
            if (ctype_alpha( $pass1[$i] )) {
                $alpha = true;
            } else if (ctype_digit( $pass1[$i] )) {
                $digit = true;
            }
        }
        if (!$alpha) {
            array_push($errors, "Password must contains atleast one alphabet!");
        }
        if (!$digit) {
            array_push($errors, "Password must contains atleast one numeric number!");
        }


        if (count($errors) == 0) {
            $password = md5($pass1);
            $sql = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";
            $result = mysqli_query($db, $sql);

            if (!$result) {
                array_push($errors, "The username/email already exist!");
            }
            else {
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are logged in";
                header('location: index.php');
            }
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

                $userdata = $result->fetch_object();
                $_SESSION['name'] = $userdata->firstname . $userdata->lastname;
                $_SESSION['profession'] = $userdata->profession;
                $_SESSION['birthdate'] = $userdata->birthdate;
                $_SESSION['gender'] = $userdata->gender;
                $_SESSION['location'] = $userdata->location;
                $_SESSION['email'] = $userdata->email;
                $_SESSION['mobile'] = $userdata->mobile;
            }else{
                array_push($errors, "Wrong Username/Password");
                
            }

            
        }
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: index.php');
    }

?>
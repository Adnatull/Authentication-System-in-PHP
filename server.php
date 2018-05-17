<?php

    session_start();

    $username = "";
    $email = "";
    $id = "";
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

                $userdata = $result->fetch_object();
                $_SESSION['id'] = $userdata->id;
                $id = $userdata->id;
                echo $_SESSION['username'];
                $_SESSION['name'] = $userdata->firstname . ' ' . $userdata->lastname;
                $_SESSION['firstname'] = $userdata->firstname;
                $_SESSION['lastname'] = $userdata->lastname;
                $_SESSION['profession'] = $userdata->profession;
                $_SESSION['birthdate'] = $userdata->birthdate;
                $_SESSION['gender'] = $userdata->gender;
                $_SESSION['location'] = $userdata->location;
                $_SESSION['email'] = $userdata->email;
                $_SESSION['mobile'] = $userdata->mobile;
                $_SESSION['img'] = $userdata->img;
                echo "HELLO ".$userdata->img;
                echo $userdata->img;
                header('location: index.php');
            }else{
                array_push($errors, "Wrong Username/Password");               
            }   
        }
    }

    if (isset($_POST['update'])) {
        $img = "";
        //$tmpusername = $username;
        $imgextension = "";
        if (!empty($_FILES['img'])){
            $img = $_FILES['img']['name'];
            $tmp = strrev($img);
            for ($i=0; $i<strlen($tmp); $i++) {
                $imgextension = $tmp[$i].$imgextension;
                if ($tmp[$i]=='.') {
                    break;
                }
            }

            
        }
        
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $pass1 = mysqli_real_escape_string($db, $_POST['password1']);
        $pass2 = mysqli_real_escape_string($db, $_POST['password2']);
        $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
        $profession = mysqli_real_escape_string($db, $_POST['profession']);
        $birthdate = mysqli_real_escape_string($db, $_POST['birthdate']);
        $gender = mysqli_real_escape_string($db, $_POST['gender']);
        $location = mysqli_real_escape_string($db, $_POST['location']);
        $mobile = mysqli_real_escape_string($db, $_POST['mobile']);


        

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

        if(strlen($img)>0) {
            $img = $username.md5($img).$imgextension;
            $target = "images/profile/".basename($img);
            if ( !move_uploaded_file($_FILES['img']['tmp_name'], $target) ) {      
                array_push($errors, "Failed to upload photo!");
            } 
              
        }

        if (count($errors) == 0)  {
            $password = md5($pass1);

            $tmp = $_SESSION['username'];
            $sql = "UPDATE users SET username = '$username', img = '$img', email='$email', password='$password', firstname='$firstname', lastname = '$lastname', profession = '$profession', birthdate = $birthdate, gender = '$gender', location = '$location', mobile = '$mobile' WHERE username = '$tmp'";
           
            
            if ($db->query($sql) == FALSE) {

                if (file_exists($target)) {
                    unlink($target);
                }
            
                array_push($errors, "The username/email already exist!");
            }
            else {
                if ($_SESSION['img']!=null && $_SESSION['username'] != $username){
                    $pastimg = $_SESSION['img'];
                    if (file_exists("images/profile/".basename($pastimg))) {
                        unlink("images/profile/".basename($pastimg));
                    }
                }
                
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "information updated";

                $_SESSION['name'] = $firstname . ' ' . $lastname;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['profession'] = $profession;
                $_SESSION['birthdate'] = $birthdate;
                $_SESSION['gender'] = $gender;
                $_SESSION['location'] = $location;
                $_SESSION['email'] = $email;
                $_SESSION['mobile'] = $mobile;
                $_SESSION['img'] = $img;
                


                header('location: index.php');
            }
        } else if (file_exists($target)) {
            unlink($target);
        }
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);

        unset($_SESSION['name']);
        unset($_SESSION['birthdate']);
        unset($_SESSION['profession']);
        unset($_SESSION['gender']);
        unset($_SESSION['location']);
        unset($_SESSION['email']);
        unset($_SESSION['mobile']);
        unset($_SESSION['img']);



        header('location: index.php');
    }

?>
<?php
session_start();
$username = "";
$email = "";
$password = "";
$errors = array();
    // connect to the database
    $db = mysqli_connect("localhost", "root", "Pass4phpmy@admin", "registration");
    
    // if submit button is clicked
    if(isset($_POST["register"])){
        $username = isset($_POST["username"]) ? $_POST["username"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";
        $confirm_pass = isset($_POST["confirm_pass"]) ? $_POST["confirm_pass"] : "";

        if(empty($username) || empty($email) || empty($password)){
            array_push($errors, "all fields are require");
        }

        if($password != $confirm_pass){
            array_push($errors, "two passwords don't match");
        }

        // if there aren't errors save data to database
        if(count($errors) == 0){
            $password = md5($password);
            $sql = "INSERT INTO users (username, email, password) VALUES ('$username','$email','$password')";
            mysqli_query($db, $sql);
            $_SESSION["username"] = $username;
            $_SESSION["success"] = "you are logged in";
            header("location: home.php");
        }

    }

    // Login
    if(isset($_POST["login"])){
        $username = isset($_POST["username"]) ? $_POST["username"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";
        
        // all fields full
        if(empty($username) || empty($password)){
            array_push($errors, "all fields are require");
        }

        if(count($errors) == 0){
            $password = md5($password);
            $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = mysqli_query($db, $query);
            if(mysqli_num_rows($result) == 1){
                $_SESSION["username"] = $username;
                $_SESSION["seccess"] = "Logged in";
                header("location: home.php");
            } else{
                array_push($errors, "wrong username or password");
                header("location: login.php");

            }
        }
        
    }


    // Logout
    if(isset($_GET["logout"])){
        session_destroy();
        unset($_SESSION["username"]);
        header("location: login.php");
    }




 
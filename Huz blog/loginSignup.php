<?php

    session_start();

    include("connection.php");

    $loginActive = $_POST['loginActivephp'];
    $email = $_POST['emailphp'];
    $password = $_POST['passwordphp'];
    $buttonClicked = $_POST['buttonClicked'];

    $emailError = "";
    $passwordError = "";
    $userExistsError = "";
    $successMessage = "";
    $userNotFound = "";
    $passwordIncorrect = "";


    if ($buttonClicked == '1'){

        if($email == ""){
            $emailError = "Please enter an email. <br>";
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailError = "Please enter a valid email. <br>";
        }

        if($password == ''){
            $passwordError = "Please enter a password. <br>";
        }

        if($passwordError != "" || $emailError != ""){
            echo $emailError.$passwordError;
            exit();
        }

        if($loginActive == '1'){
            $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
            $result = mysqli_query($link,$query);
            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_assoc($result);
                if ($row['password'] == md5(md5($password))){
                    $_SESSION['userid'] = $row['id'];
                    $_SESSION['useremail'] = $row['email'];
                    echo 1;
                }
                else{
                    $passwordIncorrect = "Password is incorrect. Try again. </br>";
                }
            }
            else{
                $userNotFound = "This username does not exist. Please try again.<br>";
            }
            if($userNotFound != ""||$passwordIncorrect != ""){
                echo $userNotFound.$passwordIncorrect;
            }

        }

        if ($loginActive == '0'){
            $query = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($link,$query);

            if(mysqli_num_rows($result) > 0){
                $userExistsError = "This email is already taken. <br>";
                if($userExistsError != ""){
                    echo $userExistsError;
                    exit();
                }
            }
            else{
                $query1 = "INSERT into users (email, password) VALUES ('$email', '$password')";
                if(mysqli_query($link,$query1)){
                    $query3 = "UPDATE users SET password = md5(md5('$password')) WHERE email='$email' LIMIT 1";
                    mysqli_query($link,$query3);
                    $successMessage = "Successfully registered. Please log in.";
                    if($successMessage != ""){
                        echo $successMessage;
                    }
                }

            }





        }
    }




?>
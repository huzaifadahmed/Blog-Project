<?php

    session_start();

    include("connection.php");

    $email = mysqli_real_escape_string($link,$_POST['emailphp']);
    $password = mysqli_real_escape_string($link,$_POST['passwordphp']);
    $hashedPassword = md5(md5($password));
    $loginActive = mysqli_real_escape_string($link,$_POST['loginActivephp']);


    $loginSuccess = false;

    $noEmailError = "";
    $noPasswordError = "";
    $invalidEmailError = "";
    $emailTaken = "";
    $incorrectPassword = "";
    $userNotExist = "";
    $accountCreated = "";


    //If login/signup button is clicked, perform form validation
    if($_POST['buttonClicked']){

        if(!$email){
            $noEmailError = "Please enter an email.<br>";
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $invalidEmailError = "Please enter a valid email. <br>";
        }
        if(!$password){
            $noPasswordError = "Please enter a password.<br>";
        }
    }

    //combine error messages if they exist.
    if ($noEmailError !=""|| $noPasswordError !="" || $invalidEmailError !=""){
        echo $noEmailError.$noPasswordError.$invalidEmailError;
        exit();
    }

    //Check to see if user is on the login screen or signup screen--------------------------------------
    //user is on login screen
    if($_POST['loginActivephp']=='1'){
        //checks to see if the email already exists in database
        $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($link,$query);
        if(mysqli_num_rows($result)>0){
            //gets the row associated with the email
            $row = mysqli_fetch_assoc($result);
            if ($row['password']==$hashedPassword){
                $_SESSION['userid'] = $row['id'];
                $_SESSION['useremail'] = $row['email'];
                $loginSuccess = true;
                echo $loginSuccess;
            }
            else{
                $incorrectPassword = "Password is incorrect. <br>";
            }
            if($incorrectPassword !=""){
                echo $incorrectPassword;
                exit();
            }

        }
        else{
            $userNotExist = "The username does not exist. <br>";
        }
        if($userNotExist !=""){
            echo $userNotExist;
            exit();
        }
    }

    //user is on signup screen
    else if ($_POST['loginActivephp']=='0'){
        $query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($link,$query);
        if(mysqli_num_rows($result)>0){
            $emailTaken = "That email is already taken. <br>";
        }
        else{
            $query = "INSERT INTO users (email, password) VALUES ('$email', '$hashedPassword')";
            if(mysqli_query($link,$query)){
                $accountCreated = "An account has been successfully created. You may now log in. <br>";
            }
        }
        if($emailTaken !=""){
            echo $emailTaken;
            exit();
        }
        if($accountCreated !=""){
            echo $accountCreated;
            exit();
        }

    }

    //-------------------------------------------------------------------------------------------------------


?>
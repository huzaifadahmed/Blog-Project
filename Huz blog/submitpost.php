<?php
    session_start();

    include("connection.php");

    $title = $_POST['titlephp'];
    $input = $_POST['inputphp'];
    $owner = $_SESSION['userid'];
    $email = $_SESSION['useremail'];
    $time = date("y-m-d H:i:s");
    $noTitleError = "";
    $noInputError = "";
    $successMessage = "";

    //Check to see if the input fields are empty.
    if($_POST['buttonClicked']){

        if($title==""){
            $noTitleError = "Please enter a title for your post. <br>";
        }

        if($input==""){
            $noInputError = "You cannot submit an empty post. <br>";
        }

        if ($noTitleError != "" || $noInputError != ""){
            echo $noTitleError.$noInputError;
            exit();
        }

        $query = "INSERT into posts (owner, email, title, content, timestamp) VALUES ('$owner', '$email', '$title', '$input', '$time')";
        if(mysqli_query($link,$query)){
            //$successMessage = "Your post has been submitted!";
            echo 1;
        }

        if ($successMessage != ""){
            echo $successMessage;
            exit();
        }
    }
?>
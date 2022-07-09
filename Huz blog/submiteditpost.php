<?php
    session_start();

    include("connection.php");

    $editedTitle = $_POST['editTitlephp'];
    $editedInput = $_POST['editArticlephp'];
    $owner = $_SESSION['userid'];
    $time = date("y-m-d H:i:s");
    $noTitleError = "";
    $noInputError = "";
    $successMessage = "";

    $blogpostedited = $_POST['blogpostedited'];


    //Check to see if the input fields are empty.
    if($_POST['buttonClicked']){

        if($editedTitle==""){
            $noTitleError = "Please enter a title for your post. <br>";
        }

        if($editedInput==""){
            $noInputError = "You cannot submit an empty post. <br>";
        }

        if ($noTitleError != "" || $noInputError != ""){
            echo $noTitleError.$noInputError;
            exit();
        }

        $query = "UPDATE posts SET title='$editedTitle', content='$editedInput' WHERE id='$blogpostedited'";
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
<?php

    include("connection.php");
    $fileError = "";

    //echo $_POST['img'];



    //if($_FILES['file']['error']=='4'){

        //echo "hi";
        // $fileName = $_FILES['file']['name'];
        // $fileTmpName = $_FILES['file']['tmp_name'];
        // $fileSize = $_FILES['file']['size'];

        // $fileExt = explode('.',$filename);
        // $fileActualExt = strlower(end($fileExt));

        // if($fileSize < 2000000){
        //     $fileNameNew = uniqid('', true).".".$fileActualExt;
        //     $fileDestination = 'uploads/'.$fileNameNew;
        //     move_uploaded_file($fileTmpName, $fileDestination);
        //     $queryimg = "INSERT into posts (img) VALUES ('$fileDestination')";
        //     mysqli_query($link,$queryimg);
        //     $fileError = "File uploaded.";
        // }

        // else{
        //     $fileError = "The image size cannot exceed 2 MB.";
        // }

        // if($fileError != ""){
        //     echo $fileError;
        //     exit();
        // }
    //}



?>
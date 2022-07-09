<?php
    $user='root';
    $pass='';
    $db='huz blog';

    $link = mysqli_connect("localhost",$user,$pass,$db);

    if(mysqli_connect_error()){
        die ("There was an error connecting to the database");
    }
?>
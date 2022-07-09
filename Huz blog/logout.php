<?php

    session_start();

    unset($_SESSION['userid']);
    unset($_SESSION['useremail']);
    session_destroy();
    header('Location:index.php');
    exit();

?>
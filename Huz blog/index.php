<?php
    session_start();
    if(isset($_SESSION['userid'])){
        header('Location:loggedinpage.php');
        exit();
    }
?>
<?php include ("header.php"); ?>
<?php include ("home.php"); ?>
<?php include("footer.php"); ?>


<?php

    session_start();
    
    //If user is not logged in currently, take them to the index (home page)
    if(!isset($_SESSION['userid'])){
        header('Location:index.php');
        exit();
    }



?>


<?php include ("header.php"); ?>


<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="navbar">
        <a class="navbar-brand" href="index.php">Community Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#">About Me</a>
            <a class="nav-item nav-link" href="#">Contact</a>
            </div>
        </div>
        <button type="button" class="btn btn-info" id="writeButton" ><a href="write.php">Write Post</button>
        <button type="button" class="btn btn-dark" id="logoutButton"><a href="logout.php">Logout</a></button>
    </nav>

</body>

<?php include ("body.php"); ?>

<?php include("footer.php"); ?>
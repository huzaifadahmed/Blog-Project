<?php

    session_start();

    include("connection.php");
    
    //If user is not logged in currently, take them to the index (home page)
    if(!isset($_SESSION['userid'])){
        header('Location:index.php');
        exit();
    }

//you must be logged in to view the article. *Find out how to display a timed message popup*

    $blogpost = $_GET["blogpost"];
    $query = "SELECT title,content FROM posts WHERE id='$blogpost'";
    $result = mysqli_query($link,$query);
    $row = mysqli_fetch_assoc($result);




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

    <div class="blogContainer">

        <button type="button" name="editButton" id="editButton" class="btn btn-light"><a href="<?php echo 'editarticle.php?blogpost='.$blogpost ?>">Edit Post</a></button>

        <h2 id="blogTitle"><?php 
            echo $row['title'];
        ?></h2>

        <p id="blogArticle"><?php 
            echo $row['content'];
        ?></p>

    </div>

    <div class="footer">
        Footer
    </div>


</body>

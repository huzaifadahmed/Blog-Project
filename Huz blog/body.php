<?php

    include("connection.php");

    $query = "SELECT * FROM posts";
    $result = mysqli_query($link,$query);
    $numRows = mysqli_num_rows($result);

    $query2 = "SELECT * FROM posts ORDER BY timestamp DESC";
    $result2 = mysqli_query($link,$query2);
    $row2 = mysqli_fetch_assoc($result2);

?>


<body>
    <div class="jumbotron">
        <h1 class="display-4">Welcome to the Community Blog!</h1>
        <p class="lead">Write about whatever interests you and share it with the world!</p>
        <hr class="my-4">
        <p>Join the mailing list to get updates on when a new article is posted!</p>
        <form class="form-inline my-2 my-lg-0 justify-content-center">
            <input class="form-control mr-sm-2" type="email" placeholder="Email" aria-label="Email">
            <button type="button" class="btn btn-primary">Sign up</button>
        </form>
    </div>

    <!--displays the latest post. -->
    <div id="featuredContentContainer">
        <?php 
        $id = $row2['id'];
        $title = $row2["title"];
        $content = $row2["content"];
        echo "<h1><a href=article.php?blogpost=$id>$title</a></h1>
            <p> $content<p>"; ?>
    </div>

    <div class="card-columns">

        <?php
            while($row = mysqli_fetch_assoc($result)){
                    echo '<div class="card text-truncate">
                    <div class="card-body">
                        <h5 class="card-title"><a href=article.php?blogpost='.$row["id"].'>'.$row["title"].'</a></h5>
                        <p class="card-text">'.$row["content"].'</p>
                        <p class="card-text"><small class="text-muted">Written by: '.$row["email"].'</small></p>
                        <p class="card-text"><small class="text-muted">Last updated '.$row["timestamp"].'</small></p>
                    </div>
                </div>';
            }
        ?>

    </div>

    <div class="footer">
        <p id="loggedInAs">Logged in as: <?php echo $_SESSION['useremail']; ?> </p>
    </div>
</body>

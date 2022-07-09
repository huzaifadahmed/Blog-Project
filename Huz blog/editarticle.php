<style>

    #error2{
        font-size:18px;
        display:none;
    }

</style>
<?php

    session_start();

    include("connection.php");

    $blogpost = $_GET['blogpost'];
    $owner = $_SESSION['userid'];

    //if users id equals owner of that post.
    $query = "SELECT * FROM posts WHERE id='$blogpost'";
    $result = mysqli_query($link,$query);

    $query2 = "SELECT title,content FROM posts WHERE id='$blogpost'";
    $result2 = mysqli_query($link,$query2);
    $row2 = mysqli_fetch_assoc($result2);

    while($row = mysqli_fetch_assoc($result)){

        if($row['owner']==$_SESSION['userid']){
            echo '<div class="blogContainer container-fluid">
            <h2> 
                <div id="error2" class="alert alert-danger" role="alert"></div>

                <textarea id="editBlogTitle" class="form-control editTitle" type="text">'.$row2["title"].'</textarea>
            </h2>
    
            <p>
                <textarea id="editBlogArticle" class="form-control editInput" type="text">'.$row2["content"].'</textarea>
            </p>
    
            <button type="button" name="saveEditButton" id="saveEditButton" class="btn btn-primary">Save Edit</button>
        </div>';
        }

        else{
            echo '<div class="blogContainer container-fluid">
            <div class="alert alert-danger" role="alert">
                This post can only be edited by the owner.
            </div>
            <h2 id="editBlogTitle"> 
                <textarea class="form-control editTitle" type="text" placeholder ="'.$row2['title'].'" readonly></textarea>
            </h2>
    
            <p id="editBlogArticle">
                <textarea class="form-control editInput" type="text" placeholder ="'.$row2['content'].'" readonly></textarea>
            </p>
    
            <button type="button" name="saveEditButton" id="saveEditButton" class="btn btn-primary" disabled>Save Edit</button>
        </div>';

        }

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


    <div class="footer">
        Footer
    </div>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        var blogpostno = location.search.split('blogpost=')[1];
        $("#saveEditButton").click(function(){
            $.ajax({
                method: 'POST',
                url: 'submiteditpost.php',
                data:{
                    editTitlephp: $("#editBlogTitle").val(),
                    editArticlephp: $("#editBlogArticle").val(),
                    buttonClicked:1,
                    blogpostedited: blogpostno,
                },
                success:function(result){
                    //if inserting edited blog is successful, take user back to the article post.
                    if(result=='1'){
                        window.location = 'article.php?blogpost='+blogpostno;
                    }
                    else{
                        $("#error2").html(result).show();

                    }
                    
                }
            })
        })

    </script>

</body>
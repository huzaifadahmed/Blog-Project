<?php

    session_start();

    //If user is not logged in currently, take them to the index (home page)
    if(!isset($_SESSION['userid'])){
        header('Location:index.php');
        exit();
    }

?>

<?php include ("header.php"); ?>

<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

        a:hover{
            text-decoration:none;
        }

        #logoutButton{
            width: 100px;

        }

        textarea{
            resize:none;
        }

        #inputHeader{
            margin-top:60px;
            margin-left:20px;
        }

        #inputTitle{
            height:60px;
            font-size:30px;
            font-weight:bold;
        }

        #input{
            height:500px;
            margin-top:20px;
        }

        #submitPost{
            float:right;
            margin-right: 20px;
            margin-top: 7px;
        }

        #uploadimg{
            margin-top: 15px;
        }

        #error{
            display:none;
        }

    </style>

</head>

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
        <button type="button" class="btn btn-dark" id="logoutButton"><a href="logout.php">Logout</a></button>
    </nav>

    <h1 id="inputHeader">Write Blog Post</h1>

    <div id="error" class='alert alert-danger' role='alert'></div>

    <div class="container-fluid" id="textContainer">
            <textarea id="inputTitle" class="form-control" placeholder="Enter your post title here..."></textarea>
            <!-- <form method="post" enctype="multipart/form-data">
                <input type="file" name="submitimg" id="submitimg" accept=".png, .jpg">
                <button type="button" class="btn btn-dark" id="uploadimg" name="uploadimg">Upload Image</button>
            </form> -->
            <textarea id="input" class="form-control" placeholder="Enter your post here..."></textarea>
    </div>

    <button type="button" class="btn btn-dark" id="submitPost"><a href="#">Submit Post</a></button>

    <div class="footer">
        Footer
    </div>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">

        // $("#uploadimg").click(function(){
        //     $.ajax({
        //         url: 'submitimg.php',
        //         data:{img:$("#submitimg").val()},
        //         type: 'post',
            
        //     success: function(fileuploaded){
        //         $("#error").html(fileuploaded).show();
        //         }
        //     }
        //     )
        // })


        $("#submitPost").click(function(){
            
            $.ajax({
                method:'POST',
                url: 'submitpost.php',
                data:{
                    titlephp: $("#inputTitle").val(),
                    inputphp: $("#input").val(),
                    buttonClicked:1,
                },
                success: function(result){
                    if(result == '1'){
                        window.location = 'loggedinpage.php'
                    }
                    else{
                        $("#error").html(result).show();
                    }       
                }
            })
        })

    </script>

</body>

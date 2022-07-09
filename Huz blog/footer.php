<body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modalBackground">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalTitle">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="error" class='alert alert-danger' role='alert'></div>
                <form id="inputForm" method="POST">
                    <input type="hidden" name="loginActive" id="loginActive" value="1">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>                    
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" id="toggleLogin">Sign Up</a>
                <button type="button" class="btn btn-primary" id="loginSignupButton" name="loginSignupButton" value="submit">Login</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>

            </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">

        //toogles between login and signup forms
        $("#toggleLogin").click(function(){
            if($("#loginActive").val()=="1"){
                $("#loginActive").val("0");
                $("#loginModalTitle").html("Sign up");
                $("#loginSignupButton").html("Sign up");
                $("#toggleLogin").html("Login");
                document.forms["inputForm"].reset();


            }
            else{
                $("#loginActive").val("1");
                $("#loginModalTitle").html("Login");
                $("#loginSignupButton").html("Login");
                $("#toggleLogin").html("Sign Up");                
                document.forms["inputForm"].reset();

            }
        })

        $("#loginSignupButton").click(function(){
            $.ajax({
                url: 'loginSignup.php',
                method: 'POST',
                data:{
                    loginActivephp: $("#loginActive").val(),
                    emailphp: $("#email").val(),
                    passwordphp: $("#password").val(),
                    buttonClicked: 1,
                },
                success: function(result){
                    if(result=='1'){
                        window.location = 'loggedinpage.php';
                    }
                    else{
                        $("#error").html(result).show();

                    }
                }

            })
        })

        

    </script>

</body>

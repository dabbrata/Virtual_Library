<?php
    session_start();
     if(isset($_SESSION["profile"]) || isset($_SESSION["dashboard"])){ 
        session_destroy();
        header("Location:login_page.php");
    }
   
       
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="navandtopbarStyle.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    
    
    <title>Sign In</title>

    <style>
        .leftSide {
            height: 77vh;
            background-image: url("images/login_page_image.png");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            z-index: -1;
            
        }

        .rightSide {
            height: auto;
            border: 0px solid black;
            

        }
        

        .signupF {
            box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.5);
            transition: .3s;
            border-radius: 10px;
        }

        .signupF:hover {
            box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.7);
        }
        .forget a:hover{
            font-weight:bold;
        }


        @media only screen and (max-width: 767px) {
            .leftSide {
                display: none;
            }

            .signupF {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <!-------------------------------------start all type of heading------------------------------------------------------------------>

    <?php
        include("header.php");
    ?>
    <!-------------------------------------end all type of heading------------------------------------------------------------------>
    

    <!--------------- start container login body part------------------------>



    <div class="container containerDiv">
        <div class="contentDiv">
            <div class="row mt-4">
                <div
                    class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-4 rightSide d-flex flex-column justify-content-center align-items-center signupF">



                    <!----login form---->

                    <div class="signupForm d-flex flex-column justify-content-center align-items-center w-100">

                        <div class="formName">
                            <h3 class="mb-5">Sign In</h3>
                        </div>
                        <form class="mainform " style="width: 95%;" action="login_data_core.php" method="POST">

                            <!-- Email input -->
                            <div class="form-outline mb-2">
                                <label class="form-label" for="email">Email address</label>
                                <input type="email" id="email" name="email" class="form-control" value="" required />

                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-2">

                                <label class="form-label" for="password">Password</label>
                                <div class="input-group">
                                <input type="password" id="password" name="password" class="form-control" value="" required />
                                <span class="input-group-text">
                                    <i class="fa fa-eye" id="togglePassword" 
                                   style="cursor: pointer"></i>
                                </span>
                                </div>

                            </div>
                            <!-- check me for remember  -->
                            <div class="form-check">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                              <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                            </div>

                            <br>
                            <?php
                            if(isset($_REQUEST['incorrect'])){
                            echo '<div class="alert alert-warning alert-dismissible fade show">
                            <strong>Warning!</strong> Your email or password is incorrect.
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>';
                            }
                            else if(isset($_REQUEST['success']))
                            {
                                echo '<div class="alert alert-success alert-dismissible fade show">
                            <strong>Success!</strong> Your password is updated.
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>';
                            }
                            else if(isset($_REQUEST["success_register"]))
                            {
                                echo '<div class="alert alertsuccess alert-dismissible d-flex align-items-center fade show">
                                <i class="bi-check-circle-fill"></i>
                                <strong class="mx-2">Success!</strong> Registration Successful.
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>';
                            }
                            ?>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-success btn-block mb-4"
                                style="width:100%;">Login</button>

                            <!-- Register buttons -->
                            <div class="text-center">
                                <p>or login with:</p>
                                <button type="button" class="btn btn-primary btn-floating mx-1">
                                    <i class="fa fa-facebook"></i>
                                </button>

                                <button type="button" class="btn btn-danger btn-floating mx-1">
                                    <i class="fa fa-google"></i>
                                </button>

                                <button type="button" class="btn btn-primary btn-floating mx-1">
                                    <i class="fa fa-twitter"></i>
                                </button>

                                <button type="button" class="btn btn-dark btn-floating mx-1">
                                    <i class="fa fa-github"></i>
                                </button>
                            </div>
                        </form>

                        <div class="forget mt-4">
                                <a href="reset_pass_email.php" style="text-decoration:none;transition:.1s;">Forgot Password?</a>
                        </div>

                    </div>


                </div>
                <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-8  leftSide ">



                </div>
            </div>
        </div>
    </div>

    <!--------end container login page part----------------------------------->



    <!------------------------------------start footer part--------------------------------------------------------->

        <?php
            include("footer.php");
        ?>
    <!------------------------------------end footer part--------------------------------------------------------->


    <script src="toogleLogin.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
   
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        // toggle the eye icon
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
       });
    </script>  
</body>

</html>


<!-- to find id,,this code will be given last here -->

<?php
    if(isset($_COOKIE['email']) && isset($_COOKIE['pass'])){
        $email = $_COOKIE['email'];
        $pass = $_COOKIE['pass'];
        echo "<script>
                document.getElementById('email').value = '$email' ;
                document.getElementById('password').value = '$pass';
             </script>";
    }
?>




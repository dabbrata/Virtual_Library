<?php
    session_start();
   
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
    

    <title>Sign Up</title>

    <style>
        .leftSide {
            height: 85vh;
            background-image: url("images/signup_page_image.png");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
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

        
        @media only screen and (max-width: 767px) {
            .leftSide{
                display:none;
            }
            .signupF{
                padding:20px;
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



    <!--- start container signup body part------------------------>



    <div class="container containerDiv">
        <div class="contentDiv">
            <div class="row mt-4">
                <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-8 leftSide">


                </div>
                <div
                    class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-4 rightSide d-flex flex-column justify-content-center align-items-center signupF">

                    <!----signUp form---->

                    <div class="signupForm d-flex flex-column justify-content-center align-items-center">

                        <div class="formName mt-3">
                            <h3 class="mb-5">Sign Up</h3>
                        </div>
                        <form class="mainform" action="verify_email_core.php" method="POST">
                            <!-- 2 column grid layout with text inputs for the first and last names -->

                            <!-- Email input -->
                            <div class="form-outline mb-2">
                                <label class="form-label" for="form3Example3">Email address</label>
                                <input type="email" id="form3Example3" class="form-control" name="email" required/>

                            </div>


                            <!-- Submit button -->
                            <button type="submit" class="btn btn-success btn-block mb-4" style="width:100%;">Verify</button>

                            
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!--------end container signup page part----------------------------------->



    <!------------------------------------start footer part--------------------------------------------------------->

        <?php
            include("footer.php");
        ?>
     <!------------------------------------end footer part--------------------------------------------------------->


    <script src="toogleLogin.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous">
    </script>

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
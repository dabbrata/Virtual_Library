<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
   

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="navandtopbarStyle.css">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">


       

    <title>Verify Your Email</title>

    <style>

      .outer{
        display:flex;
        justify-content:center;
        align-items:center;
        margin-top:20px;
      }

      .box{
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column;
        width:40%
      }
      .form_box{
        width:70%;
      }
      .form_box > .s_button{
        width:100%;
      }

      @media only screen and (max-width: 600px) {
            .box{
              width:50%;
            }
            

        }
      
    </style>
</head>
<body>
    <?php
        include("header.php");
    ?>

<div class="outer"> 
    <div class="form-control box">
          <h3><i class="fa fa-lock fa-4x"></i></h3>
          <h2 class="text-center">Forgot Password?</h2>
          <p>Please set a new password.</p>



      <form class="form_box" action="new_pass_core.php" method="POST">
  <!-- Email input -->
          <div class="form-outline mb-3">

              <label class="form-label" for="password">New Password</label>
              <div class="input-group">
                    <input type="password" id="password" pattern=".{6,}" title="Minimun 6 characters required!" class="form-control" name="new_password" required />
                    <span class="input-group-text">
                            <i class="fa fa-eye" id="togglePassword" 
                            style="cursor: pointer"></i>
                    </span>
              </div>
          </div>

          <div class="form-outline mb-4">

              <label class="form-label" for="con_password">Confirm Password</label>
              <div class="input-group">
                   <input type="password" id="con_password" pattern=".{6,}" title="Minimun 6 characters required!" class="form-control confirm_pass" name="confirm_password" required />
                    <span class="input-group-text">
                            <i class="fa fa-eye" id="togglePassword2" 
                            style="cursor: pointer"></i>
                    </span>
              </div>     
    
          </div>
          <?php
            if(isset($_REQUEST['not_matched']))
            {
              echo '<div class="alert alert-warning alert-dismissible fade show">
              <strong>Sorry!</strong> Both Passwords are not same.
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
            }
          ?>
  <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block mb-4 s_button">SAVE</button>
      </form>


    </div>
  </div>  

    <?php
        include("footer.php");
    ?>

<script src="toogleLogin.js"></script>

<script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
   
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        // toggle the eye icon
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash')
     });


        //script for confirm pass visibility..........

        const togglePassword2 = document.querySelector("#togglePassword2");
        const c_password = document.querySelector("#con_password");

         togglePassword2.addEventListener("click", function () {
   
        // toggle the type attribute
          const type = c_password.getAttribute("type") === "password" ? "text" : "password";
          c_password.setAttribute("type", type);
       // toggle the eye icon
          this.classList.toggle('fa-eye');
          this.classList.toggle('fa-eye-slash');
       });
 </script>   

</body>
</html>
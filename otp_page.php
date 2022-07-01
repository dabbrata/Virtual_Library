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
          <p>Provide OTP code from your registered email inbox.</p>


      <form class="form_box" action="otp_core.php" method="POST">
  <!-- Email input -->
          <div class="form-outline mb-4">

              <input type="number" id="form4Example2" class="form-control" placeholder="OTP" name="otp" required />
    
          </div>
          <?php
          if(isset($_REQUEST['wrong']))
          {
            echo '<div class="alert alert-warning alert-dismissible fade show">
            <strong>Sorry!</strong> Please provide correct otp.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>';
          }
          ?>
  <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block mb-4 s_button">Send OTP</button>
      </form>

    </div>
  </div>  

    <?php
        include("footer.php");
    ?>

<script src="toogleLogin.js"></script>

</body>
</html>
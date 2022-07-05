
<?php

  session_start();
  if(!isset($_SESSION["profile"])){
       header("Location:login_page.php");
   }
  $profile = $_SESSION["profile"];
  $email_address = $_SESSION["email_address"];
  
?>
<?php
    include("session_timeout.php");
?>

<?php

  include("dbconnection.php");

  if(isset($_REQUEST["submit_profile"]))
  {
    $image_name = $_FILES['image_file']['name'];
    $tmp_name = $_FILES['image_file']['tmp_name'];
    $upload = 'profile_images/'.$image_name;

    $myQueryShow = "SELECT * FROM profile_image_info WHERE email='$email_address'";
    $runQuerySeen = mysqli_query($conn, $myQueryShow);
    $count = mysqli_num_rows($runQuerySeen);
    
    if($count == 0){
    $insertQuery = "INSERT INTO profile_image_info (email,image_name) VALUES ('$email_address','$image_name')";
    $runQuery = mysqli_query($conn,$insertQuery);
    if($runQuery)
    { 
    move_uploaded_file($tmp_name,$upload);   
    header("Location:profile_page.php?upload_profile=Successfully uploaded");
    }
    else echo mysqli_error($connect);
    }
    else{
      $updateQuery = "UPDATE profile_image_info SET image_name = '$image_name' WHERE email='$email_address'";
      $runQuery = mysqli_query($conn,$updateQuery);
      if($runQuery){
        move_uploaded_file($tmp_name,$upload);
        header("Location:profile_page.php?upload_profile=Successfully uploaded");
      }
      else echo mysqli_error($connect);
    }
  }

?>

<?php

    $myQueryShow = "SELECT * FROM profile_image_info WHERE email='$email_address'";
    $runQuerySeen = mysqli_query($conn, $myQueryShow);
    $rows = mysqli_fetch_assoc($runQuerySeen);  
    //$count = mysqli_number_rows($runQuerySeen);
    if($rows){
    $profile_pic = $rows["image_name"];
    }
    else
    $profile_pic = "default-user-icon.jpg";
   
 ?>


 <?php
  
   $myQueryShow = "SELECT * FROM user_info WHERE email = '$email_address'";
   $runQuerySeen = mysqli_query($conn, $myQueryShow);
   $rows = mysqli_fetch_array($runQuerySeen);
   if($rows){
   $user_profile = $rows["fname"];
   $user_email_address = $rows["email"];
   }
   else{
    $user_profile = "user name";
    $user_email_address = "user email";
   }
 ?>

<?php

   include('dbconnection.php');

   if(isset($_REQUEST["book_submit"]))
   {
     $book_name = str_replace("'", "\'", $_REQUEST["book_name"]);
     $writer_name = str_replace("'", "\'", $_REQUEST["writer_name"]);


     $cover_photo_name = $_FILES['cover_photo']['name'];
     $tmp_book_name = $_FILES['cover_photo']['tmp_name'];
     $upload = 'book_images/'.$cover_photo_name;

     $pdf_file_name = $_FILES['pdf_file']['name'];
     $tmp_file_name = $_FILES['pdf_file']['tmp_name'];
     $uplocation = 'pdf_files/'.$pdf_file_name;

     $book_details = str_replace("'", "\'", $_REQUEST['book_details']);

     //save file to hosting folderss...
     move_uploaded_file($tmp_book_name,$upload);
     move_uploaded_file($tmp_file_name,$uplocation);
    //store data to database...

    //to ensure quation and other symbol to store dtabase....
    $cover_photo_name = str_replace("'", "\'",$_FILES['cover_photo']['name']);
    $pdf_file_name = str_replace("'", "\'", $_FILES['pdf_file']['name']);

    $insertQuery = "INSERT INTO book_info (email,book_name,writer_name,cover_photo_name,pdf_file_name,details) VALUES ('$email_address','$book_name','$writer_name','$cover_photo_name','$pdf_file_name','$book_details')";
    $runQuery = mysqli_query($conn,$insertQuery);
    if($runQuery){
      header("Location:profile_page.php?success_upload=uploaded successfully");
    }
    else{
      header("Location:profile_page.php?unsuccess_upload=uploaded unsuccessfully");
    }



   }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="navandtopbarStyle.css">

  <title>profile</title>
  <style>

    .profile_box{
      box-shadow: 5px 5px 15px 5px rgb(203, 176, 176),
                  4px 3px 20px 3px rgb(210, 183, 183);  

    }
    #small_card{
      position: absolute;
      z-index: 2;
      width: 90%;
      height: 150px;
      border: 1px solid rgb(151, 117, 117);
      border-radius: 0.5rem;
      background-color: #f8f9fa;
      box-sizing: border-box;
      left:0px;
      right:0;
      top:280px;
      margin: auto;
      box-shadow: 2px 5px 23px 3px rgb(129, 113, 113);
      display: none;
      
    }
    #small_card > .container{
      margin-left: 0;
      margin-top:10px;
    }

    .crd {
            transition: .3s;
            
        }

        .crd:hover {
            box-shadow: 0 7px 15px 0 rgba(0, 0, 0, 0.4);
        }
    
    
  
  </style>
</head>
<body>

<!-- start header code for only profile page........-->

<header class="header sticky-top" style="z-index:2;">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-dark pos">
                <div class="container-fluid">
                    <button class="navbar-toggler buton" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" class="listStyle">

                        
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link txt active" aria-current="page" href="home_page.php?profile_name=<?php echo $profile?>&email=<?php echo $email_address?>">Home</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link txt" href="#">Service</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle txt" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Delivery
                                </a>
                                <ul class="dropdown-menu bg-dark textColor" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item lastElement" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link txt" href="#" tabindex="-1" aria-disabled="true">Contact</a>
                            </li>
                        </ul>
                        <form class="d-flex srcBtn">
                            <input class="form-control me-2"" type=" search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success " type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </header>

<!-- end header code for only profile page........-->

  <section class="h-100 gradient-custom-2" id="topId">
    <div class="container-fluid py-1 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-9 col-xl-7">
          <div class="card  profile_box">

            <div id="small_card">
              <div class="container col-md-6">
                <div class="content">

                  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                    <label for="Image" class="form-label">Upload a new profile image</label>
                    <input class="form-control" type="file" id="formFile" name="image_file" required>
                    <button type="submit" class="btn btn-primary mt-3" name="submit_profile">save</button>
                  </form>

                </div>
              </div>
            </div>

            <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
             <div class="d-flex flex-column"  style="background-color: #000; height:200px;">
              <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                
                <?php
                  echo '<img src=profile_images/'.$profile_pic.' alt="default-user-icon.jpg" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; height: 170px; z-index: 1">';
                ?>
                
                <button type="button" id="buttonid" class="btn btn-outline-dark" data-mdb-ripple-color="dark" style="z-index: 1;">
                  Edit profile
                </button> 
              </div>
             </div>
              
              <div class="ms-3" style="margin-top: 130px;">
              
                <?php
                    echo '<h5>'.$user_profile.'</h5>';
                    echo '<p>'.$user_email_address.'</p>';
                ?>
                
              </div>
            </div>
            <div class="p-4 text-black" style="background-color: #f8f9fa;">
              <div class="d-flex justify-content-end text-center py-1">
                <div>
                  <p class="mb-1 h5">253</p>
                  <p class="small text-muted mb-0">Books</p>
                </div>
                <div class="px-3">
                  <p class="mb-1 h5">1026</p>
                  <p class="small text-muted mb-0">Downloads</p>
                </div>
                <div>
                  <p class="mb-1 h5">478</p>
                  <p class="small text-muted mb-0">Uploads</p>
                </div>
              </div>
            </div>
            <div class="card-body p-4 text-black">
              <div class="mb-4">
                <p class="lead fw-normal mb-1">About</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                  <p class="font-italic mb-1">Hello,name this is your profile page from where you can manupulate your library books.</p>
                </div>
              </div>

              <div class="mb-5">
                <p class="lead fw-normal mb-1">Upload Your Book</p>
                <div class="p-4" style="background-color: #f8f9fa;">


                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                  <div class="form-group mb-3">
                    <label for="formGroupExampleInput">Book's Name:</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="book_name" required>
                  </div>

                  <div class="form-group mb-3">
                    <label for="formGroupExampleInputw">Writers's Name:</label>
                    <input type="text" class="form-control" id="formGroupExampleInputw" name="writer_name" required>
                  </div>

                  <div class="form-group mb-3">
                    <label for="formFileSm">Cover Photo:</label>
                    <input class="form-control form-control-sm" id="formFileSm" name="cover_photo" type="file" required>
                  </div>
                  <div class="form-group mb-3">
                    <label for="formFileSm">Soft Copy(pdf):</label>
                    <input class="form-control form-control-sm" id="formFileSm" name="pdf_file" type="file" required>
                  </div>

                  <div class="form-group mb-3">
                    <label for="exampleFormControlTextarea1">Book's Details:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="book_details" required></textarea>
                  </div>

                  <button type="submit" name="book_submit" class="btn btn-primary mb-2">Upload</button>
                  <?php
                    if(isset($_REQUEST['success_upload']))
                    {
                      echo '<p style="color:green;">Your book is uploaded successfully!</p>';
                    }
                    else if(isset($_REQUEST['unsuccess_upload'])){
                      echo '<p style="color:red;">Failed to upload the book!</p>';
                    }
                  ?>

                </form>




                </div>
              </div>

              <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="lead fw-normal mb-0">Your Uploaded books</p>
                <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
              </div>
              <hr>
              <div class="row g-2">
                <div class="col mb-2 d-flex flex-wrap">
                  <!--<img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(112).webp" alt="image 1" class="w-100 rounded-3">-->
                <?php

                  include('dbconnection.php');

                  $myQueryShow = "SELECT * FROM book_info WHERE email = '$email_address'";
                  $runQuerySeen = mysqli_query($conn, $myQueryShow);
                  while($rows = mysqli_fetch_array($runQuerySeen))
                  {
                    $bookName = $rows['book_name'];
                    $coverPhotoName = $rows['cover_photo_name'];
                    $pdf_file = $rows['pdf_file_name'];
                    $book_detail = $rows['details'];
                    $timestamp = $rows['upload_date'];
                    $uploadTime = date('M d, Y'.' (h : i A)',strtotime($timestamp));
                    $uploaderEmail = $rows['email'];
                    $bookWriter = $rows['writer_name'];
                    $id = $rows['id'];

                    echo '<div class="m-3">
                         <div class="card crd" style="width: 14rem;">
                         <img class="card-img-top" src="book_images/'.$coverPhotoName.'" alt="Cover image cap" style="height:210px;">
                         <div class="card-body">
                         <h5 class="card-title">'.$bookName.'</h5><p class="card-text">'.$bookWriter.'</p>
                         <a href="book_download.php?file='.$pdf_file.'" class="btn btn-success btn-sm" style="margin-left:2px;width:90px;">Download</a>
                         <a href="book_delete.php?identity='.$id.'" class="btn btn-danger btn-sm" style="width:90px;">Delete</a>
                         <a href="book_detail_page.php?detail='.$book_detail.'&cover='.$coverPhotoName.'&name='.$bookName.'&time='.$uploadTime.'&email='.$uploaderEmail.'&writer='.$bookWriter.'" class="btn btn-outline-secondary btn-sm" style="width:183px; margin:7px 3px;">View</a>
                         </div>
                         </div>
                         </div>';
                  }
                
                ?>
                  
              </div>

                
              </div>
        
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--  start footer for only profile page..........-->


  <div class="footer mt-5">
        <footer class="bg-dark text-center text-white">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                            class="fa fa-facebook"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                            class="fa fa-twitter"></i></a>

                    <!-- Google -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                            class="fa fa-google"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                            class="fa fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                            class="fa fa-linkedin"></i></a>

                    <!-- Github -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                            class="fa fa-github"></i></a>
                </section>


                <!-- Section: Social media -->
            </div>

            <div class="upperBtn mb-3">
                <a href="#topId">
                    <Button class="btn btn-light btnTop"><i class="fa fa-angle-double-up"
                            style="font-size: 25px;"></i></Button>
                </a>
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2020 Copyright:
                <a class="text-white" href="home_page.php">www.virtuallibrary.com</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>


  <!--  end footer for only profile page..........-->
  
  <script>
    var ep = document.querySelector("#small_card");
    var button = document.querySelector("#buttonid");
    var bool = true;
    button.addEventListener('click',function(){
      if (bool) {
            ep.style.display = "block";
            bool = false;
      } 
      else {
          ep.style.display = "none";
          bool = true;
      }
    });
  </script>
</body>
</html>

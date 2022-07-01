
<?php
     session_start();

     
     if(isset($_REQUEST['profile_name']) && isset($_REQUEST['email']) && !empty($_REQUEST['profile_name']))
     {
                            
         $profile = $_REQUEST["profile_name"];
         $email_address = $_REQUEST["email"];
         $_SESSION["profile"]= $profile;
         $_SESSION["email_address"] = $email_address;
         
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
    
    <title>Home</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .productRow {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            overflow: auto;

        }

        .secondCol {
            background-image: url("https://images.ctfassets.net/3s5io6mnxfqz/1XlwukYHS0bCYStWDptLe6/393e6e83f74628f95f6123eaf39b5b19/afterword-explained.jpeg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: flex-end;
            
        }

        .secondCol .tagImage {
            width: 100%;
            display: flex;
            background-color: #1f2429;
            justify-content: space-between;
            align-items: center;
            color: white;
            
        }
        

        .tagImage div p {
            padding: 15px;
            margin: auto;
            
           
        }

        

        .crd {
            transition: .3s;
            
        }

        .crd:hover {
            box-shadow: 0 7px 15px 0 rgba(0, 0, 0, 0.4);
        }

        

        .productMenu a {
            color: black;
            margin-right: 10px;
            text-decoration: none;
            font-weight: bold;
            padding: 5px 10px;
            transition: .3s;
            border-radius: 20px;
            font-size: 15px;
        }

        .productMenu a:hover {
            background-color: rgba(0, 0, 0, 0.7);
            color: seashell;
        }

        .productMenu .activate {
            background-color: rgba(0, 0, 0, 0.7);
            color: seashell;

        }

        




        @media only screen and (max-width: 600px) {
            .productMenu a {
                color: black;
                margin-right: 1px;
                text-decoration: none;
                font-weight: bold;
                padding: 3px 6px;
                transition: .3s;
                border-radius: 15px;
                font-size: 10px;
            }
            

        }
    </style>
</head>

<body>

   <?php
   include("header.php");
   ?>



    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 col-sm-12 itemSmall">
                <ul class="list-group mt-3">
                    <li class="list-group-item bg-info text-dark"><i
                            class="bi bi-list p-3 fs-4"></i><strong>CATEGORIES</strong></li>
                    <li class="list-group-item text-dark"><i class="bi bi-book p-3"></i>Commedy</li>
                    <li class="list-group-item text-dark"><i class="bi bi-book-fill p-3"></i>Thrillar</li>
                    <li class="list-group-item text-dark"><i class="bi bi-book p-3"></i>Horror</li>
                    <li class="list-group-item text-dark"><i class="bi bi-book p-3"></i>Funny</li>
                    <li class="list-group-item text-dark"><i class="bi bi-box p-3"></i>Mystery</li>
                    <li class="list-group-item text-dark"><i class="bi bi-box p-3"></i>Educative</li>
                    <li class="list-group-item text-dark"><i class="bi bi-book-fill p-3"></i>Informative</li>
                    <li class="list-group-item text-dark"><i class="bi bi-book p-3"></i>Newspaper</li>
                </ul>
            </div>
            <div class="col-12 col-md-9 col-sm-12 mt-3 secondCol">
                <div class="d-flex justify-content-end align-items-center m-5">
                    <div class="content">
                        <Button class="btn btn-dark mt-2">Download Now</Button><br>
                        <h4 class="text-light mt-1">ALL type of books are here</h4>
                        <p style="color:white;">Enjoy your reading here</p>
                    </div>
                </div>

                <div class="tagImage">
                    <div class="text1">
                        <p>Find</p>
                    </div>
                    <div class="text2">
                        <p>Read</p>
                    </div>
                    <div class="text3">
                        <p>Enjoy</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <div class="allProducts mt-5">
                    <div class="productTitle mb-3 d-flex align-items-center justify-content-between">
                        <h4>All Books</h4>
                        <div class="productMenu d-flex justify-content-end">
                            <a class="activate" href="#">All</a>
                            <a href="#">Literature</a>
                            <a href="#">Story</a>
                            <a href="#">Poems</a>
                        </div>
                    </div>
                    

                </div>
                <hr style="width:100%", size="4", color=black>  
            </div>
        </div>

        
             <div class="col mb-2 d-flex flex-wrap">

                     <?php
                 
                     include("dbconnection.php");
                 
                     $myQueryShow = "SELECT * FROM book_info";
                     $runQuerySeen = mysqli_query($conn, $myQueryShow);


                     //start pagination...
                     $total_rows = mysqli_num_rows($runQuerySeen);
                     $book_per_page = 12;
                     $page_number = ceil($total_rows/$book_per_page);
                     $caught_page=1;
                     if(isset($_REQUEST['page']))
                     {
                        $caught_page = $_REQUEST['page'];
                        $page = ($caught_page-1)*$book_per_page;
                        $myQueryShow = "SELECT * FROM book_info LIMIT $page,$book_per_page";
                        $runQuerySeen2 = mysqli_query($conn, $myQueryShow);

                     }
                     else{
                        $page = 0;
                        $myQueryShow = "SELECT * FROM book_info LIMIT $page,$book_per_page";
                        $runQuerySeen2 = mysqli_query($conn, $myQueryShow);
                     }
                     //end of pagination...

                     
                     while($rows = mysqli_fetch_array($runQuerySeen2))
                     {
                       $bookName = $rows['book_name'];
                       $coverPhotoName = $rows['cover_photo_name'];
                       $pdf_file = $rows['pdf_file_name'];
                       $book_detail = $rows['details'];
                       $uploadTime = $rows['upload_date'];
                       $uploaderEmail = $rows['email'];
                       $bookWriter = $rows['writer_name'];

                       if(isset($_SESSION["profile"])){ 
                       echo '<div class="m-5">
                             <div class="card crd" style="width: 14rem;">
                             <img class="card-img-top" src="book_images/'.$coverPhotoName.'" alt="Cover image cap" style="height:200px;">
                             <div class="card-body">
                             <h5 class="card-title">'.$bookName.'</h5><p class="card-text">'.$bookWriter.'</p>
                             <a href="book_download.php?file='.$pdf_file.'" class="btn btn-secondary">Download</a>
                             <a href="book_detail_page.php?detail='.$book_detail.'&cover='.$coverPhotoName.'&name='.$bookName.'&time='.$uploadTime.'&email='.$uploaderEmail.'&writer='.$bookWriter.'" class="btn btn-outline-secondary" style="margin-left:26px;">View</a>
                             </div>
                             </div>
                             </div>';
                       }
                       else{

                        echo '<div class="m-5">
                             <div class="card crd" style="width: 14rem;">
                             <img class="card-img-top" src="book_images/'.$coverPhotoName.'" alt="Cover image cap" style="height:200px;">
                             <div class="card-body">
                             <h5 class="card-title">'.$bookName.'</h5><p class="card-text">'.$bookWriter.'</p>
                             <a href="#" class="btn btn-secondary"  id="person" style="opacity:.5;">Download</a>
                             <a href="book_detail_page.php?detail='.$book_detail.'&cover='.$coverPhotoName.'&name='.$bookName.'&time='.$uploadTime.'&email='.$uploaderEmail.'&writer='.$bookWriter.'" class="btn btn-outline-secondary" style="margin-left:26px;">View</a>
                             </div>
                             </div>
                             </div>';

                       }
                     }

                   ?>

            </div>



    </div>

    </div>

    <!--pagination...............-->
    <div class="page_div d-flex justify-content-center mt-4" style="width:100%;">
     <nav aria-label="...">
       <ul class="pagination">
         <!--show active page..-->
          <p class="m-2" style="color:rgba(0,0,0,0.6);"><strong>Active Page</strong></p><br>
          <li class="page-item <?php if($caught_page)echo "active";?>" style="margin-right:35px;">
          <a class="page-link"><?php echo $caught_page;?></a>
          </li>
          <!--end show active running page-->
          <?php
          if(isset($_REQUEST['profile_name']) && isset($_REQUEST['email'])){
          $profileName = $_REQUEST['profile_name'];
          $email = $_REQUEST['email'];
          }
          
          ?>

           <li class="page-item <?php if($caught_page == 1)echo "disabled";?>">

           <a class="page-link" href="home_page.php?page=<?php if($caught_page > 1)echo $caught_page-1;?>&profile_name=<?php echo $profileName ?>&email=<?php echo $email ?>">Previous</a>
           </li>
           
            <?php
            
            for($i=1;$i<=$page_number;$i++){

            if(isset($_REQUEST['profile_name']) && isset($_REQUEST['email']))
            echo '<li class="page-item"><a class="page-link" href="home_page.php?page='.$i.'&profile_name='.$profileName.'&email='.$email.'">'.$i.'</a></li>';   
            else
            echo '<li class="page-item"><a class="page-link" href="home_page.php?page='.$i.'">'.$i.'</a></li>';
   
            
            }
            ?>
        
           <li class="page-item <?php if($caught_page == $page_number)echo "disabled";?>">
              <a class="page-link" href="home_page.php?page=<?php if($caught_page < $page_number)echo $caught_page+1;?>&profile_name=<?php if(isset($profileName))echo $profileName ?>&email=<?php if(isset($email))echo $email ?>">Next</a>
           </li>
         

       </ul>
     </nav>
    </div>
    <!--end pagination...........-->

    <?php
    include("footer.php");
    ?>

    <script src="toogleLogin.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

        
</body>

</html>
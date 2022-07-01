<?php
    session_start();
    if(isset($_REQUEST['item'])){
    $value = $_REQUEST['item'];
    }
    else{
        $value="s";
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

    <title>Search</title>

    <style>
        .items{
            display:flex;
            flex-direction:column;
        }
        .cards{
            display:flex;
            overflow:auto;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }
        .r-cards{
            display:flex;
            flex-wrap:wrap;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }
    </style>
</head>
<body>
    <?php
        include("header.php");
    ?>

    <div class="container">
    <div class="items">
        <div class="itm">
        <br>
        <h4>Search items</h4>
        <hr>
        </div>
        <div class="cards">
        <?php
            include("dbconnection.php");


            $search_sql = "SELECT * FROM book_info WHERE book_name LIKE '%$value%'";
            $runQuery  = mysqli_query($conn,$search_sql);
            while($rows = mysqli_fetch_array($runQuery))
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
        <br><br>
        <h4>Related Books</h4><br>

        <div class="r-cards">
            <?php
                 $search_sql = "SELECT * FROM book_info WHERE book_name LIKE '%$value%' ORDER BY book_name DESC";
                 $runQuery  = mysqli_query($conn,$search_sql);
                 while($rows = mysqli_fetch_array($runQuery))
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

    <?php
        include("footer.php");
    ?>
</body>
</html>
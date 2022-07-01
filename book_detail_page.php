
<?php


    session_start();

    include("dbconnection.php");

    if(isset($_REQUEST['detail']) && isset($_REQUEST['cover']) && isset($_REQUEST['name']) && isset($_REQUEST['email']) && isset($_REQUEST['writer']))
    {
        $bookName = $_REQUEST['name'];
        $coverImageName = $_REQUEST['cover'];
        $bookDetail = $_REQUEST['detail'];
        $uploadTime = $_REQUEST['time'];
        $uploaderEmail = $_REQUEST['email'];
        $writerName = $_REQUEST['writer'];

    }
    else{
        if(!isset($_SESSION["profile"])){
            header("Location:home_page.php");
        }
        $bookName = "Book name";
        $coverImageName = "image";
        $bookDetail = "book details"; 
        $uploadTime= "01/01/2001";
        $uploaderEmail = "das123@gmail.com";
        $run = "Sign in";
        $writerName = "henry";
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
    <title>product</title>
</head>

<style>
    .checked {
        color: orange;
    }

    .rate span {
        font-size: 20px;
    }
    .icon a{
        margin-right: 10px;
    }
    .listText{
        width:100%;
        margin-top:50px;
        text-align: center;
        height: auto;
        
    }
    .listText ul li a{
        text-decoration: none;
        color: black;
        padding: 10px;
        font-weight: 600;  
    }
    .listText ul li{
        border-bottom: 3px solid rgb(83, 75, 75);
        
        border-radius: 3px;
        margin-bottom: 15px;
        padding: 8px;
        padding-bottom: 5px;
        transition: .3s;
    }
    .listText li:hover{
        background-color: rgb(240, 245, 247);
    }
    .listText ul{
        list-style: none;
        margin:0;
        padding:0;
    }
    
</style>

<body>

    <!-------- start nav and top bar---------------------------------->

    <?php
       include("header.php");
    ?>

    <!-------- end nav and top bar---------------------------------->


    <!-------- start body part---------------------------------->

    <div class="container">

        <div class="row mt-3">
            
            <div class="col-12 col-lg-6">

                <img src="book_images/<?php echo $coverImageName ?>" width="100%" height="600px">
                
                

            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                <div class="productDetail mt-3">
                    <h3><?php echo $bookName ?></h3>
                    <h5>Written by "<?php echo $writerName;?>"</h5>
                    <p style="color:rgba(0,0,0,0.6);">
                    Uploaded At <?php echo $uploadTime ?><br>
                    Uploader Email : <?php echo $uploaderEmail ?>
                    </p>
                    <br>
                    <p class="lead fw-normal mb-1">About</p>
                    <p><?php echo $bookDetail ?></p>
                    <div class="rate d-flex mt-5">
                        <div class="star" style="margin-right: 30px;">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <a href="#">All Reviews</a>
                        </div>
                        

                        <div class="icon">
                            <!-- Facebook -->
                            <a style="color: #3b5998;" href="#!" role="button"><i class="fa fa-facebook-f fa-lg"></i></a>
                            
                            <!-- Twitter -->
                            <a style="color: #55acee;" href="#!" role="button"><i class="fa fa-twitter fa-lg"></i></a>
                            
                            <!-- Google -->
                            <a style="color: #dd4b39;" href="#!" role="button"><i class="fa fa-google fa-lg"></i></a>
                            
                            <!-- Instagram -->
                            <a style="color: #ac2bac;" href="#!" role="button"><i class="fa fa-instagram fa-lg"></i></a>
                        </div>
                    </div>
                    <p style="margin-top: 20px; color: rgb(107, 113, 167); font-weight: 700;">BDT *** TK</p>
                </div>

                <div class="addcountProduct d-flex " style="width:100%;" >

                <p>
                    <strong>If</strong> you want to buy the hard copy of this book.Please contact with <a href="https://mail.google.com/"><?php echo $uploaderEmail ?></a> the email address.
                </p>
                    
                </div>
                <p>For <strong>downloading</strong> the book,you have to <strong>login</strong> your account firstly. </p>    
               


                <div class="listText">
                    <ul>
                        <li><a href="#"> This is a good book to make u satisfied.</a></li>
                        <li><a href="#">You can download the book freely.</a></li>
                    </ul>
                </div>
            </div>

            <!--slider....-->
            <div class="slider mt-5">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height:500px;">
                            <img src="https://wallpaperaccess.com/full/552884.jpg"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" style="height:500px;">
                            <img src="https://www.orissapost.com/wp-content/uploads/2020/08/books.jpg"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" style="height:500px;">
                            <img src="https://rtrfm.com.au/wp-content/uploads/2021/09/old-book-flying-letters-magic-light-background-bookshelf-library-ancient-books-as-symbol-knowledge-history-218640948.jpg" class="d-block w-100"
                                alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!--end slider..-->
        </div>

    </div>

    <!-------- end body part---------------------------------->

    <!-------- start footer bar---------------------------------->

    <?php
       include("footer.php");
    ?>
    <!-------- end footer bar---------------------------------->


    <script src="toogleLogin.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>
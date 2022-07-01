<?php
    include("../dbconnection.php");

    if(isset($_REQUEST["email"])){
    $email = $_REQUEST["email"];

    $deleteQuery1 = "DELETE  FROM user_info WHERE email = '$email' ";
    $runQuery1 = mysqli_query($conn,$deleteQuery1);

    $deleteQuery2 = "DELETE  FROM book_info WHERE email = '$email' ";
    $runQuery2 = mysqli_query($conn,$deleteQuery2);

    $deleteQuery3 = "DELETE  FROM verify_email_info WHERE email = '$email' ";
    $runQuery3 = mysqli_query($conn,$deleteQuery3);

    $deleteQuery4 = "DELETE  FROM profile_image_info WHERE email = '$email' ";
    $runQuery4 = mysqli_query($conn,$deleteQuery4);
    
        echo "deleted";
        header("Location:index.php");
    
    }
    

?>
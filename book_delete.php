<?php
    include("dbconnection.php");

    $id_number = $_REQUEST['identity'];

    $delete = "DELETE FROM book_info WHERE id = '$id_number'";
    $runQuery = mysqli_query($conn,$delete);

    if($runQuery){
        header("Location:profile_page.php");
    }
?>
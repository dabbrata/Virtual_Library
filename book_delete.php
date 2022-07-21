<?php
    include("dbconnection.php");

    $id_number = $_REQUEST['identity'];

    $sql = "SELECT * FROM book_info WHERE id = '$id_number'";
    $run = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($run);

    $delete = "DELETE FROM book_info WHERE id = '$id_number'";
    $runQuery = mysqli_query($conn,$delete);
    

    if($runQuery){
        if(isset($_REQUEST['delete_from_dash'])){
            unlink("book_images/".$row['cover_photo_name']);
            header("Location:Sidebar-menu/index.php");
        }
        else{ 
        unlink("book_images/".$row['cover_photo_name']);                                                          //here click is deleted from dashboard then redirect there otherwise redirect to profile page.Because there are only two two delete way, one is from dashboard and other is from profile oage of user.
        header("Location:profile_page.php");
        }
    }
?>
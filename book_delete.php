<?php
    include("dbconnection.php");

    $id_number = $_REQUEST['identity'];

    $delete = "DELETE FROM book_info WHERE id = '$id_number'";
    $runQuery = mysqli_query($conn,$delete);

    if($runQuery){
        if(isset($_REQUEST['delete_from_dash'])){
            header("Location:Sidebar-menu/index.php");
        }
        else{                                                       //here click is deleted from dashboard then redirect there otherwise redirect to profile page.Because there are only two two delete way, one is from dashboard and other is from profile oage of user.
        header("Location:profile_page.php");
        }
    }
?>
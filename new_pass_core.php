<?php
    session_start();
    include("dbconnection.php");
    $email = $_SESSION['email'];
    if(isset($_REQUEST['new_password']) && isset($_REQUEST['confirm_password']))
    {
        $new_pass = md5($_REQUEST['new_password']);
        $confirm_pass = md5($_REQUEST['confirm_password']);

        if($new_pass == $confirm_pass)
        {

            $updateQuery = "UPDATE user_info SET password = '$new_pass' WHERE email='$email'";
            $runQuery = mysqli_query($conn,$updateQuery);
            if($runQuery)
            header("Location:login_page.php?success=update successfully");
            else echo mysqli_error($connect);
        }
        else{
            header("Location:new_pass_page.php?not_matched=not matched");
        }

        

    }
?>
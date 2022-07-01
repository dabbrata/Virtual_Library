<?php
session_start();
    $email_addr = $_SESSION['email'];
    include("dbconnection.php");
    if(isset($_REQUEST['verification_code']))
    {
        $verify_code = $_REQUEST['verification_code'];

        $myQueryShow = "SELECT * FROM verify_email_info where email='$email_addr'";
        $runQuerySeen = mysqli_query($conn, $myQueryShow);
        $rows = mysqli_fetch_array($runQuerySeen);
        if($rows['verification_code'] === $verify_code)
        {
            header("Location:signup_all_info.php?verify_email=$email_addr");
        }
        else
        {
            header("Location:verify_email_page.php?incorrect=not matched");
        }

    }
?>
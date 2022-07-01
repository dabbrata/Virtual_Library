<?php
    session_start();
    include("dbconnection.php");

    if(isset($_REQUEST['otp']))
    {
        $email = $_SESSION['email'];
        $input_otp = $_REQUEST['otp'];

        $myQueryShow = "SELECT * FROM otp_info WHERE email = '$email'";
        $runQuerySeen = mysqli_query($conn, $myQueryShow);

        if($runQuerySeen){
            $rows = mysqli_fetch_array($runQuerySeen);
           if($rows['otp'] == $input_otp)
           {
               header("Location:new_pass_page.php");
           }
           else{
               header("Location:otp_page.php?wrong=not matched otp");
           }
        }
        else echo "Error query run";
        
    }
?>
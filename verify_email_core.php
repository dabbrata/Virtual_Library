<?php
    session_start();
    $email_addr = $_REQUEST['email'];
    $_SESSION['email'] = $email_addr;
    include("dbconnection.php");
    if(isset($_REQUEST['email']))
    {
        $email = $_REQUEST['email'];
        $verify_code = rand(11111,99999);
        
        //send code to my email.......
        echo smtp_mailer($email,'Verification code','Your Verification code is '.$verify_code);

        //first check email exist kina ,jodi age thekei exist thake taile otp just oi email a update hbe otherwise insert hobe...
        $myQueryShow = "SELECT * FROM verify_email_info where email='$email'";
        $runQuerySeen = mysqli_query($conn, $myQueryShow);
        $count = mysqli_num_rows($runQuerySeen);

        //store otp to database...
        if($count==0){
        $insertQuery = "INSERT INTO verify_email_info (email,verification_code) VALUES ('$email','$verify_code')";
        $runQuery = mysqli_query($conn,$insertQuery);
           if($runQuery)
           {  
               header("Location:verify_email_page.php?success=code sent successfully");
           }
           else echo mysqli_error($connect);
        }
        else{
            $updateQuery = "UPDATE verify_email_info SET verification_code = '$verify_code' WHERE email='$email'";
            $runQuery = mysqli_query($conn,$updateQuery);
            if($runQuery)
            header("Location:verify_email_page.php?success=code sent successfully");
            else echo mysqli_error($connect);

        }
    }


     //smtp mailer function...
     function smtp_mailer($to,$subject, $msg){
        require_once("smtp/PHPMailerAutoload.php");
        $mail = new PHPMailer;
        $mail -> isSMTP();
        $mail -> SMTPDebug = 3;
        $mail -> SMTPAuth = true;
        $mail -> SMTPSecure = 'TLS';
        $mail -> Host = "smtp.gmail.com";
        $mail -> Port = 587;
        $mail -> isHTML(true);
        $mail -> CharSet = 'UTF-8';
        $mail -> Username = "shuvrodas109@gmail.com";
        $mail -> Password = "zvqcpscuyxxouldq";
        $mail -> setFrom("shuvrodas109@gmail.com");
        $mail -> Subject = $subject;
        $mail -> Body = $msg;
        $mail -> addAddress($to);
        if(!$mail->Send()){
            echo $mail->ErrorInfo;
            echo "<br>";
            echo "Not sent";
        }
        else echo "Sent";
        
    }
    
?>
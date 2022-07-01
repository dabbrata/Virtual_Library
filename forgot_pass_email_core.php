<?php
    session_start();
    include("dbconnection.php");
    if(isset($_REQUEST["email"])){

        $email = $_REQUEST["email"];

        $_SESSION['email']=$email;

        $myQueryShow = "SELECT * FROM user_info";
        $runQuerySeen = mysqli_query($conn, $myQueryShow);
        $count=0;
        while($rows = mysqli_fetch_array($runQuerySeen)){
            if($rows['email'] === $email){
                $count++;
                break;              
             }
        }
        if($count != 0)
        {
            $otp = rand(111111,999999);
            //send otp to the email address by mailer....

            //code for sending mail...

            echo smtp_mailer($email,'Your otp code is','OTP code '.$otp);


            //first check email exist kina ,jodi age thekei exist thake taile otp just oi email a update hbe otherwise insert hobe...
            $myQueryShow = "SELECT * FROM otp_info where email='$email'";
            $runQuerySeen = mysqli_query($conn, $myQueryShow);
            $count = mysqli_num_rows($runQuerySeen);

            //store otp to database...
            if($count==0){
            $insertQuery = "INSERT INTO otp_info (email,otp) VALUES ('$email','$otp')";
            $runQuery = mysqli_query($conn,$insertQuery);
               if($runQuery)
               {  
                   header("Location:otp_page.php?success=otp sent successfully");
               }
               else echo mysqli_error($connect);
            }
            else{
                $updateQuery = "UPDATE otp_info SET otp = '$otp' WHERE email='$email'";
                $runQuery = mysqli_query($conn,$updateQuery);
                if($runQuery)
                header("Location:otp_page.php?success=otp sent successfully");
                else echo mysqli_error($connect);

            }

        }
        else{
            header("Location:reset_pass_email.php?not_found=email not found");
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
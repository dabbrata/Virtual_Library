<?php
session_start();
include('dbconnection.php');
$email = $_SESSION['email'];

if(isset($_REQUEST["fname"]) && isset($_REQUEST["lname"]) && isset($_REQUEST["password"])){

$first_name = $_REQUEST["fname"];
$last_name = $_REQUEST["lname"];
$password = md5($_REQUEST["password"]);

//find all data especially email from database for checking duplicate email existed or not,if not existed then insert all data to database table..//
$myQueryShow = "SELECT * FROM user_info";
$runQuerySeen = mysqli_query($conn, $myQueryShow);
$count=0;
while($rows = mysqli_fetch_array($runQuerySeen)){
    if($rows['email'] === $email){
        $count++;
        break;
    }
        
}
if($count == 0){
        
    $insertQuery = "INSERT INTO user_info (fname,lname,email,password) VALUES ('$first_name','$last_name','$email','$password')";
    $runQuery = mysqli_query($conn,$insertQuery);
    if($runQuery)
    {  
    header("Location:login_page.php?success_register=Successfully Registered");
    }
    else echo mysqli_error($connect);
        
    }
else{
    
    header("Location:signup_all_info.php?exist=already_exist&verify_email=$email");
    }
}

?>
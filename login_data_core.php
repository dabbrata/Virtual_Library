<?php

include('dbconnection.php');
if(isset($_REQUEST["email"]) && isset($_REQUEST["password"])){

$email = $_REQUEST["email"];
$password = md5($_REQUEST["password"]);

//find all data especially email and password from database for checking existance of those data//
$myQueryShow = "SELECT * FROM user_info";
$runQuerySeen = mysqli_query($conn, $myQueryShow);
$count=0;$dash=0;
while($rows = mysqli_fetch_array($runQuerySeen)){
    if(($rows['dashboard'] != 0) && ($rows['email'] === $email && $rows['password'] === $password)){
        $dash++;
        break;
    }
    else if($rows['email'] === $email && $rows['password'] === $password && $rows['dashboard'] == 0){
        $count++;
        $first_name = $rows['fname']; 
        break;
    }
        
}
if($dash != 0){
        
    header("Location:home_page.php?dashboard=dashboard page");
        
    }
else{
    if($count == 0){
    header("Location:login_page.php?incorrect=Email and password are incorrect");
    }
    else {
    header("Location:home_page.php?profile_name=$first_name&email=$email");
    }

    }
}

?>
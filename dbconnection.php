<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "virtuallibrary";

    

    //create connection object
    $conn = mysqli_connect($server,$username,$password,$dbname);
    if($conn == false)
    {
        echo "Fail to database connection";
        exit(0);
    }

?>
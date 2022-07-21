<?php
        if(isset($_SESSION['hold'])){
            $current = time();
            if($current-$_SESSION['hold'] > 86400){
                session_destroy();
                header("Location:login_page.php");
            }
           
        }
    ?>
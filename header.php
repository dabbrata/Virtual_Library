
<div class="topBar" id="topId">
        <div class="container">
            <div class="topper">
                <a href="home_page.php" style="text-decoration: none;">
                    <h2><span style="font-family:cursive;font-size:40px;">V</span><span style="font-family:fantasy;">irtual</span>Library</h2>
                </a>

                
                
                <div class="iconGrp">

                <div class="signinup;" style="color:white; margin-right:10px;">
                    <?php
                        $bool = true;
                        if(isset($_REQUEST['dashboard']) || isset($_SESSION['dashboard']))
                        {
                            echo '<a style="color:wheat;text-decoration:none;" href="Sidebar-menu/index.php">DASHBOARD</a>'.'  |  '.'<a style="color:wheat;text-decoration:none;" href="login_page.php?logout=log out">LOGOUT</a>';
                        }
                        else{
                        //extra logic
                        if(isset($_SESSION["profile"])){
                            echo '<a style="color:wheat;text-decoration:none;" href="profile_page.php?profile_name=profile_pic">'.$_SESSION["profile"].'</a>'.'  |  '.'<a style="color:wheat;text-decoration:none;" href="login_page.php?logout=log out">LOGOUT</a>';
                        }
                        else{
                            echo '<a style="color:wheat;text-decoration:none;" href="signup_page.php">Create Account </a>  |  <a style="color:wheat;text-decoration:none;" href="login_page.php"> Sign in</a>';
                        }
                        }
                        

                        //logout..
                        
                    ?>
                    
                </div>
                
                   <div class="Icon">
                        <i class="bi bi-person" id="person" data-toggle="tooltip" data-placement="bottom"
                            title="Login account"></i>
                    </div>
                    <div class="Icon">
                        <i class="bi bi-bell" data-toggle="tooltip" data-placement="bottom" title="Notifications"></i>
                    </div>
                    
                   
                </div>
            </div>
        </div>
    </div>

    <div class="container d-flex justify-content-end loginBox">
        <div class="accountBox" id="accnBox">

            <div class=" d-flex flex-column align-items-center">
                <div class="boxName mt-4">
                    <h3 style="color:wheat;">Login</h3>
                </div>

                <form action="login_data_core.php" method="POST" class="d-flex flex-column mt-3" style="width: 90%;">
                    <div class="form-group mt-2">
                        <label for="exampleInputEmail1" class="color">Email address</label>
                        <input type="email" name="email" class="form-control iField" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter email" required>
                    </div>
                    <div class="form-group mt-2">
                        <label for="exampleInputPassword1" class="color">Password</label>
                        <input type="password" name="password" class="form-control iField" id="exampleInputPassword1"
                            placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-success mt-4">Login</button>
                </form>

                <div class="mt-3 text-light">Dont't have an account?<span><a href="signup_page.php">Sign Up</a></span>
                </div>
                <a href="reset_pass_email.php">Forgot Password</a>
            </div>

        </div>
    </div>






    <header class="header sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-dark pos">
                <div class="container-fluid">
                    <button class="navbar-toggler buton" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" class="listStyle">

                        
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link txt active" aria-current="page" href="home_page.php">Home</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link txt" href="delivary_page.php">Service</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle txt" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Delivery
                                </a>
                                <ul class="dropdown-menu bg-dark textColor" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="delivary_page.php">Action</a></li>
                                    <li><a class="dropdown-item" href="delivary_page.php">Facility</a></li>
                                    <li><a class="dropdown-item lastElement" href="delivary_page.php">Availability</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link txt" href="contact_page.php" tabindex="-1" aria-disabled="true">Contact</a>
                            </li>
                        </ul>
                        <form class="d-flex srcBtn" action="search_item_page.php" method = "POST">
                            <input class="form-control me-2"" type="search" placeholder="Search" name = "item"  aria-label="Search">
                            <button class="btn btn-outline-success " type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </header>
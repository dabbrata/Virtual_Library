<!-- Coding by CodingLab | www.codinglabweb.com -->
<?php
    include("../dbconnection.php");
    session_start();
    $_SESSION['dashboard'] = "dashboard";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- chart-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!--  cdn bootstrap -->

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Dashboard</title>

    <style>
        .alluser{
            width:100%;
            margin-left:60px;
            
        }
        .row{
            margin-right:50px;
            margin-left:3px;
            
        }
        .table{
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            background:white;
        }
        .table th,td{
            padding:15px !important;
        }
        
        
    </style>
</head>
<body>

    <nav class="sidebar open">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="booklogo.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">VirtualLibrary</span>
                    <span class="profession">Adminstrator</span>
                </div>
            </div>

            <!-- <i class='bx bx-chevron-right toggle'></i> -->
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links" >
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Survey</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Notifications</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">Analytics</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-heart icon' ></i>
                            <span class="text nav-text">Likes</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#user_id">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Users</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="../home_page.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Exit</span>
                    </a>
                </li>

                <!-- <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li> -->
                
            </div>
        </div>

    </nav>

    <section class="home">
        <div class="text m-4" style=" padding:0px; margin-top:0px !important;"><span style="font-size:20px;">Welcome to </span>Virtual Library</div>
        <div class="rateValue d-flex justify-content-between row m-4" style="width:95%;">
            <div class="col-12 col-md-6 col-lg-4 bg-white rounded p-4  m-2 d-flex justify-content-start flex-column" style="border-bottom:3px solid purple; margin: 10px 0 !important; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <p style="color:gray;">Total Books</p>
                <h5>
                    <?php
                        $select_books = "SELECT * FROM book_info";
                        $runQuerySeen = mysqli_query($conn,$select_books);
                        $tot_books = mysqli_num_rows($runQuerySeen);
                        echo $tot_books;
                    ?>
                </h5>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style=<?php echo "width:".$tot_books."%";?> aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $tot_books." %";?></div>
                </div>

            </div>
            <div class="col-12 col-md-6 col-lg-3 bg-white rounded p-4  m-2 d-flex justify-content-start flex-column" style="border-bottom:3px solid purple; margin: 10px 0 !important; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <p style="color:gray;">Total Users</p>
                <h5>
                    <?php
                        $select_users = "SELECT * FROM user_info";
                        $runQuerySeen = mysqli_query($conn,$select_users);
                        $tot_users = mysqli_num_rows($runQuerySeen);
                        echo $tot_users;
                    ?>
                </h5>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style=<?php echo "width:".$tot_users."%";?> aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $tot_users." %";?></div>
                </div>
            </div>
            <div class="col-12 col-lg-2 bg-white rounded p-4 m-2 d-flex justify-content-start flex-column" style="border-bottom:3px solid purple;margin: 10px 0 !important;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <p style="color:gray;">Uploads</p>
                <h5>
                    <?php
                        $select_books = "SELECT * FROM book_info";
                        $runQuerySeen = mysqli_query($conn,$select_books);
                        $tot_books = mysqli_num_rows($runQuerySeen);
                        echo $tot_books;
                    ?>
                </h5>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style=<?php echo "width:".$tot_books."%";?> aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $tot_books." %";?></div>
                </div>
            </div>
            <div class="col-12 col-lg-2 bg-white rounded p-4 m-2 d-flex justify-content-start flex-column" style="border-bottom:3px solid purple;margin: 10px 0 !important;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                <p style="color:gray;">Downloads</p>
                <h5>
                    <?php                
                        $tot_downloads = 850;
                        echo $tot_downloads;
                    ?>
                </h5>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style=<?php echo "width:".($tot_downloads)."%";?> aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo ($tot_downloads)." %";?></div>
                </div>
            </div>

        </div>

        <div class="chart row m-4">
            <div class="text" style=" padding:0px; font-size:25px; margin-bottom:10px;">Survey</div>
            <div class="col-12 col-md-7 d-flex justify-content-center align-items-center" style="background:white; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
            <canvas id="myChart" style="width:90%;max-width:600px;"></canvas>

                <script>
                var xValues = ["Users","Uploads","Downloads","Books","Reviews","Amounts","Revenue"];
                var yValues = [50,300,250,500,450,900,850];
                
                new Chart("myChart", {
                  type: "line",
                  data: {
                    labels: xValues,
                    datasets: [{
                      fill: false,
                      lineTension: 0,
                      backgroundColor: "rgba(0,0,255,1.0)",
                      borderColor: "rgba(0,0,255,0.1)",
                      data: yValues
                    }]
                  },
                  options: {
                    legend: {display: false},
                    scales: {
                      yAxes: [{ticks: {min: 1, max:1000}}],
                    }
                  }
                });
                </script>
            </div>
            <div class="col-12 col-md-5">
               <div id="myChart2" style="width:100%; max-width:600px; height:400px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
               </div>
                  
               <script>
               google.charts.load('current', {'packages':['corechart']});
               google.charts.setOnLoadCallback(drawChart);
               
               function drawChart() {
               var data = google.visualization.arrayToDataTable([
                 ['Comics', 'Mhl'],
                 ['Poems',54.8],
                 ['Horror',48.6],
                 ['Sci-fi',44.4],
                 ['Story',23.9],
                 ['Mystry',14.5]
               ]);
               
               var options = {
                 title:'Cstegories of downloaded books',
                 is3D:true
               };
               
               var chart = new google.visualization.PieChart(document.getElementById('myChart2'));
                 chart.draw(data, options);
               }
               </script>
            </div>
        </div>
        <div class="alluser m-4" id="userd_id">
       
         <div class="text" style="padding:0;margin-left:4px;margin-top:30px; font-size:25px;">All Users</div><br>
            <div class="row">
             
              <table class="table" style="text-align:center;">
                <thead class="bg-dark" style="color:white;">
                 <tr>
                    <th scope="col">Id</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Uploaded Books</th>
                    <th scope="col">Check</th>
                    <th scope="col">Delete</th>
                 </tr>
                </thead>
                <tbody>
                <?php
                $myQueryShow = "SELECT * FROM user_info";
                $runQuerySeen = mysqli_query($conn, $myQueryShow);
                while($rows = mysqli_fetch_array($runQuerySeen)){
                    if($rows["dashboard"] != 109){
                       $f_email = $rows["email"];
                       $individual_books = "SELECT * FROM book_info WHERE email = '$f_email'";
                       $result = mysqli_query($conn,$individual_books);
                       $upload_books = mysqli_num_rows($result);
                       echo '<tr>
                             <td>'.$rows["id"].'</td>
                             <td>'.$rows["fname"].'</td>
                             <td>'.$rows["lname"].'</td>
                             <td>'.$rows["email"].'</td>
                             <td>'.$upload_books.'</td>
                             <td><a href="index.php?check='.$rows["email"].'"><button type="button" class="btn btn-primary">Check</button></a></td>
                             <td><a href="delete_from_admin.php?email='.$f_email.'&delete_from_dash=dashboard"><button type="button" class="btn btn-secondary">Delete</button></a></td>
                             </tr>';
                             echo "<br>";
                       }
                }
                ?>

                </tbody>
                
              </table>

              
              
            </div>  
            

        </div>

        <div class="details_book ">
            <div class="title">
               <?php
                     if(isset($_REQUEST['check'])){
                        
                        echo " <div class='text' style=' padding:0px;margin-left:24px; font-size:25px;margin-bottom:5px;'><span style='font-size:15px;'>These books are uploaded from, <br></span>".$_REQUEST['check']."</div>";
                     }
               ?>
            </div>
            <div class="book_info d-flex bg-secondary justify-content-start" style="width:97%;margin-left:25px;">
            <div class="books d-flex flex-wrap" style="width:95%;">
            <?php
                    if(isset($_REQUEST['check']))
                    {
                       $email = $_REQUEST['check'];  
                       $sql = "SELECT * FROM book_info WHERE email = '$email'";
                       $runQuery = mysqli_query($conn,$sql);

                       while($rows = mysqli_fetch_array($runQuery))
                       {
                         $bookName = $rows['book_name'];
                         $coverPhotoName = $rows['cover_photo_name'];
                         $pdf_file = $rows['pdf_file_name'];
                         $book_detail = $rows['details'];
                         $timestamp = $rows['upload_date'];
                         $uploadTime = date('M d, Y'.' (h : i A)',strtotime($timestamp));
                         $uploaderEmail = $rows['email'];
                         $bookWriter = $rows['writer_name'];
                         $id = $rows['id'];
     
                         echo '<div class="m-3">
                              <div class="card crd" style="width: 14rem;">
                              <img class="card-img-top" src="../book_images/'.$coverPhotoName.'" alt="Cover image cap" style="height:210px;">
                              <div class="card-body">
                              <h5 class="card-title">'.$bookName.'</h5><p class="card-text">'.$bookWriter.'</p>
                              <a href="../book_download.php?file='.$pdf_file.'" class="btn btn-success btn-sm" style="margin-left:2px;width:90px;">Download</a>
                              <a href="../book_delete.php?identity='.$id.'&delete_from_dash=dashboard" class="btn btn-danger btn-sm" style="width:90px;">Delete</a>
                              <a href="../book_detail_page.php?detail='.$book_detail.'&cover='.$coverPhotoName.'&name='.$bookName.'&time='.$uploadTime.'&email='.$uploaderEmail.'&writer='.$bookWriter.'" class="btn btn-outline-secondary btn-sm" style="width:183px; margin:7px 3px;">View</a>
                              </div>
                              </div>
                              </div>';
                       }
                    }
                ?>
                </div>
            </div>
        </div>
        
        
    </section>

    <script src="script.js"></script>

</body>
</html>


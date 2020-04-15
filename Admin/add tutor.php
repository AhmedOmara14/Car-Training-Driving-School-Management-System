<?php
      include 'Databases.php';
      $data_insert=new Databases;
      if(isset($_POST["insert"]))  
      {  
      $target="images/".basename($_POST['img']);
      $conn= mysqli_connect("localhost","root","admin","info");
      $name=$_POST['name'];
      $pass=$_POST['pass'];
      $image=$_POST['img'];  
      $email=$_POST['email'];  
      $packagenum=$_POST['packagenum']; 
      $table_name="info";
      $data = array('image' => $image ,'name' => $name,'pass' => $pass,'email' => $email,
        'groupid' => '2','Regstatus' => '0');
    
      $data_insert->insert($table_name,$data);
      $sql = 
      "UPDATE package set instructoroflesson = '$name' WHERE packagenum ='$packagenum' "; 
      $h=mysqli_query($conn,$sql); 
      
  }
  ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="title icon" href="images/title-img.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Admin Dashboard</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-light">
      <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="myNavbar">
        <div class="container-fluid">
          <div class="row">
            <!-- sidebar -->
            <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top">
              <a href="#" class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border">Admin Dashboard</a>
            <div class="bottom-border pb-3">
                <?php 
                   session_start();
                   $id=$_SESSION['id'];
                   $pass=$_SESSION['pass'];
                 
                  $conn=mysqli_connect("localhost","root","admin","info");
                 $select="SELECT * from info WHERE email='$id' AND pass='$pass' ";
                  $result= mysqli_query($conn,$select);
                 while ($row = mysqli_fetch_array($result)) {
                
                   echo '<a class="text-white" href="Profile.php" >Username :'.$row['name'].'</a>';
                  }

                 ?>
              
              </div>

              <ul 
                class="navbar-nav flex-column mt-4">
                <li 
                  class="nav-item">
                  <a href="index.php" class="nav-link text-white p-3 mb-2 sidebar-link "><i class="fas fa-home text-light fa-lg mr-2"></i>Dashboard</a>

                </li>
                <li 
                   class="nav-item"><a href="Profile.php" class="nav-link text-white p-3 mb-2 sidebar-link">
                   <i class="fas fa-user text-light fa-lg mr-2 "></i>
                   update Profile</a> 
                </li>
                <li 
                   class="nav-item"><a href="addpackage.php" class="nav-link text-white p-3 mb-2 sidebar-link">
                   <i class="fas fa-table text-light fa-lg mr-2 "></i>
                   Add Package</a> 
                </li>
                <li
                   class="nav-item">
                   <a 
                       href="viewstudents.php" class="nav-link text-white p-3 mb-2 sidebar-link"

                       >
                   <i class="fas fa-users text-light fa-lg mr-2"></i>
                     View students
                 
                    </a>  

                </li>
               
                <li 
                   class="nav-item">
                   <a href="#" 

                       class="nav-link text-white p-3 mb-2 sidebar-link"
                       class="btn btn-secondary dropdown-toggle"
                       data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false"
                       style="width: 250px;" 
                      >
                   <i class="fas fa-car text-light fa-lg mr-2"  ></i>Manage car Details 
                
                 </a>
                <div class="dropdown-menu"
                     x-placement="right-start" 
                     style="position: absolute; transform: translate3d(108px, 0px, 0px); top: 390px; left: 143px;">
                <a class="dropdown-item" href="viewcars.php">view cars</a>
                <a class="dropdown-item" href="updateinfoofcar.php">update info about car</a>
                <a class="dropdown-item" href="deleteinfoofcar.php">delete info about cars</a>
              </div>
                </li>
                <li 
                   class="nav-item hover dropdown">
                   <a  href="#" class="nav-link text-white p-3 mb-2 sidebar-link"
                       class="btn btn-secondary dropdown-toggle"
                       data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false"

                   > 
                   <i class="fas fa-chalkboard-teacher fa-1x text-light fa-lg mr-2"></i>
                   Manage Tutor 
                   </a>
                    <div class="dropdown-menu"
                     x-placement="right-start" 
                     style="position: absolute; transform: translate3d(106px, 0px, 0px); top: 0px; left: 130px;">
                <a class="dropdown-item" href="add tutor.php">add local tutor</a>
                <a class="dropdown-item" href="approveordisapproveaboutremote.php">approve remote tutor</a>
                
               </div>
                </li>
                <li 
                   class="nav-item">
                   <a href="viewsession.php" class="nav-link text-white p-3 mb-2 sidebar-link">
                   <i class="fas fa-table text-light fa-lg mr-2"></i>
                   view sessions</a>
                </li>
                
                             
              </ul>

            </div>
          <div class="col-xl-10 col-lg-9 col-md-8 ml-auto bg-dark fixed-top py-2 top-navbar">
              <div class="row align-items-center">
                <div class="col-md-4">
                  <h4 class="text-light text-uppercase mb-0">Dashboard</h4>
                </div>
                <div class="col-md-5">
                  <form>
                    <div class="input-group">
                      <input type="text" class="form-control search-input" placeholder="Search...">
                      <button type="button" class="btn btn-white search-button"><i class="fas fa-search text-danger"></i></button>
                    </div>
                  </form>
                </div>
                <div class="col-md-3">
                  <ul class="navbar-nav">
                 
                    <li class="nav-item icon-parent"><a href="#" class="nav-link icon-bullet"><i class="fas fa-bell text-muted fa-lg"></i></a></li>
                    <li class="nav-item ml-md-auto"><a href="/car/Home.php" class="nav-link"><i class="fas fa-sign-out-alt text-danger fa-lg"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </nav>
   
    
    <div>
    <form method="post" class="form1" style="
    width: 10000px;
    height: 10000px;
    margin-top: 100px;
">
    <input type="file" name="img" class="img_res">

    <p class="restaurantnam" style="
    margin-bottom: 20px;
    ">User name of local tutor</p>
    <input type="text" name="name"style="margin-left:350px; " required="">
    
    <p class="restaurantdes" style="
    height: 30px;
">Password</p>
    <input type="Password" name="pass" class="desname" required="">
    <p class="age" style="
    margin-top: -158px;
    height: 30px;
    margin-bottom: 10px;
">Email</p>
    <input type="text" name="email" class="ageinput" required="" style="
    margin-top: 0px;
">
    <p class="email" style="margin-left: 650px; margin-top: 20px;">package num</p>
    <input type="text" name="packagenum" class="emailinput" required="" style="
    margin-top: ‒1;
    margin-top: -3;
">
    
    <br>
     <input type="submit" name="insert" style="margin-left: 572px;margin-top: 30px;width: 66px;" class="Submit" value="Add">  
   </form>
   </div>        
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="script.js"></script>

  </body>
</html>







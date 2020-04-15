<?php 
     include 'Admin Dashbord\Databases.php';
     $data=new Databases;
    if(isset($_POST["login"])){     
      $myusername = mysqli_real_escape_string($data->con,$_POST['id']);
      $mypassword = mysqli_real_escape_string($data->con,$_POST['password']); 
      
      $sql = "SELECT email,groupid,Regstatus FROM info WHERE email = '$myusername' and pass = '$mypassword'";
      $result = mysqli_query($data->con,$sql);
      $row =   mysqli_fetch_array($result);
      $groupid=$row['groupid'];
      $Regstatus=$row['Regstatus'];
      $count = mysqli_num_rows($result);
             
      if($count == true) {
        if ($groupid==0) {
          header("location: Admin Dashbord/index.php");
        }
         else if ($groupid==1) {
          header("location: Admin/index.php");
        }
        else if ($groupid==4 AND $Regstatus==1) {
          echo '<script>alert("Waiting for your approval !")</script>';
        }
       else if ($groupid==4 AND $Regstatus==0) {
          header("location: Remote tutor/index.php");
        }
        else if ($groupid==2) {
          header("location: Local student/index.php");
        }
        else if ($groupid==3) {
          header("location: remote student/index.php");
        }
        else if ($groupid==4) {
          header("location: remote tutor/index.php");
        }
      
        
      }else {
      }
   }

    if(isset($_POST["register"])){   
      $user_name=$_POST['Username'];
      $user_pass=$_POST['password'];
      $user_id=$_POST['id'];
      $data_localstu = array('name' =>$user_name ,'email' =>$user_id,'pass' =>$user_pass ,'groupid' =>'2','Regstatus' =>'0' );
      $data_remotestu = array('name' =>$user_name ,'email' =>$user_id,'pass' =>$user_pass ,'groupid' =>'3','Regstatus' =>'0' );
      $data_remotetutor = array('name' =>$user_name ,'email' =>$user_id,'pass' =>$user_pass ,'groupid' =>'4','Regstatus' =>'1');

        if(isset($_POST['postion']))
        {
            if ($_POST['postion']=='remotestudent') {
              $data->insert('info',$data_remotestu);

            } 
            else if ($_POST['postion']=='localstudent') {
              $data->insert('info',$data_localstu);

            }
             else if ($_POST['postion']=='remotetutor') {
             echo "<script type='text/javascript'>alert('Wait an hour for your approval
              ');</script>";
              $data->insert('info',$data_remotetutor);
            }
        }
        else{
           echo "error"; 
        }
    }
    
?>


<!DOCTYPE html>
<html lang="en">
 <head>
      <title>Homepage</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
      <link rel="alternate" type="application/json+oembed" href="http://start14.drivingschool.marketing/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fstart14.drivingschool.marketing%2Fpricing%2F">
      <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <style id="wp-block-library-inline-css" type="text/css">
        .has-text-align-justify{text-align:justify;}
      </style>
      <link rel="stylesheet" href="css\login.css">

      <script type="text/javascript" charset="UTF-8" src="http://maps.google.com/maps-api-v3/api/js/40/5/util.js"></script>
      <script type="text/javascript" charset="UTF-8" src="http://maps.google.com/maps-api-v3/api/js/40/5/common.js"></script>
      <link rel="alternate" type="text/xml+oembed" href="http://start14.drivingschool.marketing/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fstart14.drivingschool.marketing%2Fpricing%2F&format=xml">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/ bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
      <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
      <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
      <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
      <link rel="stylesheet" href="css/animate.css">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="css/magnific-popup.css">
      <link rel="stylesheet" href="css/aos.css">
      <link rel="stylesheet" href="css/ionicons.min.css">
      <link rel="stylesheet" href="css/bootstrap-datepicker.css">
      <link rel="stylesheet" href="css/jquery.timepicker.css">
      <link rel="stylesheet" href="css/flaticon.css">
      <link rel="stylesheet" href="css/icomoon.css">
      <link rel="stylesheet" href="css/style.css">
 </head>
 <body     
     class="goto-here" data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0"   data-gr-c-s-loaded="true">
     <div class="py-1 bg-primary" style="
       height: 28px;
       padding-bottom: 5px;
       ">
      <div class="container" style="
       padding-bottom: 100px;
       height: 116px;
       padding-top: 0px;
       padding-top: 5px;
      ">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
          <div class="col-lg-12 d-block">
            <div class="row d-flex">
              <div class="col-md pr-4 d-flex topper align-items-center">
                <div class="icon mr-2 d-flex justify-content-center align-items-center">
                  <span class="icon-phone2"></span></div>
                <span class="text">+ 01093473057</span>
              </div>
              <div class="col-md pr-4 d-flex topper align-items-center">
                <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                <span class="text">ahmedomaea53@email.com</span>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light scrolled sleep awake" id="ftco-navbar">
      <div class="container">
        <a  class="navbar-brand" style="width: 150px;height: 30px; margin-bottom: 30px;"><img src="images/pro.PNG"></a>
      
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item " style="background-color: #fff0; "><a href="Home.php" class="nav-link">Home</a></li>
            
            <li class="nav-item "><a href="About.php" class="nav-link">About</a></li>
           <li class="nav-item active" style="background-color: #fff0; color: #82ae46"><a href="ourpackages.php" class="nav-link">Our Packages</a></li>
            <li class="nav-item"><a href="#"class="nav-link" onclick="document.getElementById('id01').style.display='block'" style="margin-bottom: 5px;">
             Login</a></li>

        <div id="id01" class="modal">

             <form class="modal-content animate" style="height: 500px; width: 600px;"method="POST">
             <div class="container">
             <input type="text" placeholder="Enter ID" name="id" required>
             <input type="password" placeholder="Enter Password" name="password" required>    
             <input type="submit" name="login" value="Login" class="btn btn-primary" style="width: 100%;font-size: 20px; margin-top: 20px">
             <br>
             <label>
             <input type="checkbox" checked=""> Remember me
             </label>        
             <div class="container" style="background-color:#f1f1f1 ;margin-top: 10px; height: 100px;">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw"><a href="###">Forgot password?</a></span>
            </div>
            </div>
            </form>
        </div>            
          </ul>
        </div>
            <div class="sidebar-box2">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon ion-ios-search"></span>
                  <input type="Sumbit" class="form-control" placeholder="Search">
                </div>
              </form>
            </div>
      </div>
    </nav>
    <div class="hero-wrap hero-bread" style="background-image: url('images/about1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>About us</span></p>
            <h1 class="mb-0 bread">our packages</h1>
          </div>
        </div>
      </div>
    </div>
      <h1 style="text-align: center; font-size: 25px;font-weight: 500;margin-top: 20px;">Driving Packages</h1>
      <p style="text-align: center; margin-left:150px;margin-right: 150px; font-size: 20px;">Listed below is our syllabus you will be covering and will be taught by an instructor whose instructions will be clear and concise. You will be able to keep a close eye on your progress day by day by visiting our pupil training website.</p>

 <table
    class="table table-striped table-striped" style="margin-left: 250px;margin-top:     45px;width: 900px;">
    <thead>
    <tr>
      <th scope="col" style="color: #000;">Package num</th>
      <th scope="col" style="color: #000;">Package price</th>
      <th scope="col" style="color: #000;">vechial of lesson</th>
      <th scope="col" style="color: #000;">instructor</th>
      <th scope="col" style="color: #000;">Rate</th>
      <th scope="col" style="color: #000;">Final Exam</th>
      <th scope="col" style="color: #000;">hours of lesson</th>

    </tr>
    </thead>
    <tbody>
       
        
    <?php
         
          $result=$data->select('package');
              foreach ($result as $row ) {
              
                echo "
                   <tr>
                    <td>".$row['packagenum']."</td>
                    <td>".$row['packageprice']."</td>
                    <td>".$row['vechialsoflesson']."</td>
                    <td>".$row['instructoroflesson']."</td>
                    <td>".$row['rate']."</td>
                    <td>".$row['finalexam']."</td>
                    <td>".$row['hoursoflesson']."</td>
                   </tr>
                ";
              }
            
          
      ?>
    </tbody>
 </table>

    <button type="submit"  class="btn btn-primary" onclick="document.getElementById('id02').style.display='block'" style="width: 230px; height: 45px; margin-left: 640px; font-weight: 500;font-size: 18px;">Go on !</button>
     <div id="id02" class="modal">
             <form class="modal-content animate" style="height: 600px; width: 600px;" method="POST">
               <div class="container">
                <input type="text" placeholder="Username" name="Username" required>
                <input type="text" placeholder="ID" name="id" required>
                <input type="password" placeholder="Enter Password" name="password" required>
                <form method="POST" >
                <input type="radio" style="margin-left: 50px; " name="postion" value="localstudent">
                <label for="localstudent">Local student </label>
                <input type="radio" style="margin-left: 50px; " name="postion" value="remotestudent">
                <label for="remotestudent">Remote Student</label>
                 <input type="radio" style="margin-left: 50px;  " name="postion" value="remotetutor">
                <label for="remotetutor">Remote tutor</label>
                </form>      
                <input type="submit" name="register" class="btn btn-primary" style="width: 100%;font-size: 20px; margin-top: 20px" value="Register now !">
                <br>
            
          

            <div class="container" style="background-color:#f1f1f1 ;margin-top: 10px; height: 100px;">
                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
            </div>
          </div>
        </form>
            </div>  
    <footer class="ftco-footer ftco-section" style="
    margin-top: 100px;
      ">
      <div class="container">
        <div class="row">
          <div class="mouse">
            <a href="#" class="mouse-icon">
              <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
            </a>
          </div>
        </div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">chalak driving school</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate fadeInUp ftco-animated"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate fadeInUp ftco-animated"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate fadeInUp ftco-animated"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Home</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Our Instructor</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
                <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                  <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                  <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                  <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                  <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                </ul>
                <ul class="list-unstyled">
                  <li><a href="#" class="py-2 d-block">FAQs</a></li>
                  <li><a href="#" class="py-2 d-block">Contact</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">Helwan,cairo</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+01093473057</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text"> ahmedomaea53@gmail.com</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>
              Copyright ©<script>document.write(new Date().getFullYear());</script>2020 All rights reserved 
              
            </p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <div id="ftco-loader" class="fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"></circle><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"></circle></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&amp;sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  
</body>
</html>
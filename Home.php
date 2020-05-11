<?php  
   session_start();
   $con = mysqli_connect("localhost","root","","info");  
    if(isset($_POST["login"])){     
      $myusername = mysqli_real_escape_string($con,$_POST['id']);
      $mypassword = mysqli_real_escape_string($con,$_POST['password']); 
      
      $sql = "SELECT email,groupid,Regstatus,pass FROM info WHERE email = '$myusername' and pass = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row =   mysqli_fetch_array($result);
      $groupid=$row['groupid'];
      $email=$row['email'];
      $Regstatus=$row['Regstatus'];
      $pass=$row['pass'];

      $_SESSION['id']=$email;
      $_SESSION['pass']=$pass;
      $count = mysqli_num_rows($result);
       if($count == true) {
        if ($groupid==0) {
          header("location: Admin Dashbord/index.php");
          action("Admin Dashbord/index.php");
        }
         else if ($groupid==1) {
          header("location: Admin/index.php");
          
        }
         else if ($groupid==5) {
          header("location: localtutor/index.php");
          
        }
        else if ($groupid==4 AND $Regstatus==1) {
          echo '<script>alert("Waiting for your approval !")</script>';
        }
       else if ($groupid==4 AND $Regstatus==0) {
          header("location: Remote tutor/index.php");
        }
        else if ($groupid==2) {
          header("location: Localstudent/home.php");
        }
        else if ($groupid==3) {
          header("location: remotestudent/homeremote.php");
        }
        }
      }else {
      }
 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Homepage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css\login.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
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
 <body class="goto-here" data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0" data-gr-c-s-loaded="true">
    <div class="py-1 bg-primary" style="
    height: 28px;
    padding-bottom: 5px;
">
      <div class="container" style="
    padding-bottom: 100px;
    height: 116px;
    padding-top: 0\;
    padding-top: 0px;
    padding-top: 5px;
">
    <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
          <div class="col-lg-12 d-block">
            <div class="row d-flex">
              <div class="col-md pr-4 d-flex topper align-items-center">
                <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                <span class="text">+ 020</span>
              </div>
              <div class="col-md pr-4 d-flex topper align-items-center">
                <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                <span class="text">teamsw1@email.com</span>

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
            <li class="nav-item active"style="background-color: #fff0; color: #82ae46"><a href="Home.php" class="nav-link">Home</a></li>
            
            <li class="nav-item "><a href="About.php" class="nav-link">About</a></li>
            <li class="nav-item"><a href="ourpackages.php"class="nav-link" >Our Packages</a></li>
            <li class="nav-item"><a href="#"class="nav-link" onclick="document.getElementById('id01').style.display='block'" style="margin-bottom: 5px;">
             Login</a></li>

            <div id="id01" class="modal">

             <form class="modal-content animate" action="" style="height: 500px; width: 600px;"method="POST">
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
    <img class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" src="Admin Dashbord/images/A.jpg" 
   data-bgrepeat="no-repeat" data-lazydone="undefined" style="margin-bottom: 20px; background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-size: cover;margin-top: 15px; background-position: center center; width: 100%; height: 500px; opacity:2; visibility: inherit;">
     
      <div class="container">
   <div class="row" id="homeBlocks">
    <div class="col-lg-4 col-md-4 col-sm-4 margin-top-30px">
        <div class="home-blocks">
          <a href="About.php">
            <p><i class="fa fa-bus" style="font-size:50px;margin-left: 100px;"></i></p>
            <h3>What We Offer</h3>
            <p>James Keller Driving School offers a comprehensive list of services for teenage first-time drivers, new adult learners and existing drivers with lapsed licenses.</p>
            </a>
        </div>
    </div>
    
    <div class="col-lg-4 col-md-4 col-sm-4 margin-top-30px ">
        <div class="home-blocks">
          <a href="About.php">
            <p><i class="fa fa-home"style="font-size:50px;margin-left: 130px;" ></i></p>
            <h3>Expert Driver Preparation</h3>
            <p>We offer top-notch driving instruction designed to help prepare you for the challenges of driving, avoid aggressive drivers and observe road signs and laws.</p>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 margin-top-30px ">
        <div class="home-blocks">
          <a href="About.php">
            <p><i class="fa fa-users"style="font-size:50px;margin-left: 130px;" ></i></p>
            <h3>Drive Safer For Parents</h3>
            <p>We've taught hundreds of local teenagers to drive safely. You can trust us with your son's or daughter's driver education - we take pride in helping our drivers stay crash-free.</p>
            </a>
        </div>
    </div>
    
    
    
</div></div>
<div class="greyc">
<div class="container" id="home-test">
  <div class="row margin-top-30px" style="margin-bottom:0px !important;">
        <div class="col-lg-12 text-center">
            <p style="font-weight: 500;font-size: 20px; color: #000;margin-top: 200px; ">Our team has many years of instructing experience combined, both behind-the-wheel and in the classroom. Isn’t this who you'd want your son or daughter to learn driving skills from?</p>
 
        </div>
    </div>

  <div class="col-lg-6 no-padding-left">

<h3 class="homeat" style="text-transform:none !important;">Ready for a safe, fun driving experience?</h3>
<p>The school offers the following services for teenage first-time drivers, new adult learners and existing drivers with lapsed licenses.</p>
<ul class="huls">
<li><i class="fa fa-angle-right"></i> Basic driving skills</li>
<li><i class="fa fa-angle-right"></i> Highway and city driving </li>
<li><i class="fa fa-angle-right"></i> Parallel parking</li>
<li><i class="fa fa-angle-right"></i> Making proper turns and lane changes</li>
<li><i class="fa fa-angle-right"></i> Expressway/Beltway Driving</li>
<li><i class="fa fa-angle-right"></i> Road test preparation</li>
<li><i class="fa fa-angle-right"></i> Road test vehicle usage</li>
</ul>


<div class="centertxt"><p class="afterul">Ready to learn to drive?</p>

<a href="Home.php" class="btn recls btn-success homea">View Lesson Pricing</a>
</div>
</div>
  <div class="col-lg-6">

<img src="images/About.png"  alt="az" width="100%" height="auto" style="margin-left: 600px;margin-top: -350px;" class="homeimgs imgborder">

</div>

</div></div>
    <footer class="ftco-footer ftco-section" style="margin-top: 800px;">
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
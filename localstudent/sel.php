<?php 
    session_start();
    $id=$_SESSION['id'];
    $pass=$_SESSION['pass']; 
    $conn=mysqli_connect("localhost","root","","info");

                 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Package Select</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>
     .myclass{
    display:inline-block;
    width: 80px;
    height: 40px;
    background-color:#4CAF50; 
    color: black;
    
}
.net{
background-color: #4CAF50;


}
 

  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>          
  <table class="table">
    <thead>
      <tr class="net">
      <th scope="col">Package num</th>
      <th scope="col">Package price</th>
      <th scope="col">vechial of lesson</th>
      <th scope="col">instructor</th>
      <th scope="col">Rate</th>
      <th scope="col">Final Exam</th>
      <th scope="col">hours of lesson</th>

    </tr>
          
    <?php
         $conn=mysqli_connect("localhost","root","","info");
            $sql1="SELECT * from packages_selection WHERE id= '$id'";
            $result1=mysqli_query($conn,$sql1); 
            $row1 =   mysqli_fetch_array($result1);
            $num=$row1['packagenum']; 
            $sql="SELECT * from package WHERE packagenum= '$num'";
            $result=mysqli_query($conn,$sql); 
             $sr=1;
              while ( $row = $result-> fetch_assoc()) {
                   ?>
                   <tr>
                    <form method="post">
                     
                     <td><input   type="text" id="country" name="pack_num" value=<?php echo $row['packagenum']?> readonly></td>

                    <td><?php echo $row['packageprice']?></td>
                    <td><?php echo $row['vechialsoflesson']?></td>
                    <td><?php echo $row['vechialsoflesson']?></td>
                    <td><?php echo $row['rate']?></td>
                    <td><?php echo $row['finalexam']?></td>
                    <td><?php echo $row['hoursoflesson']?></td>
        
                     </form>
                   </tr>
               
      
               <?php
                $sr++;}
                ?>  
  </table>
</body>

</html>
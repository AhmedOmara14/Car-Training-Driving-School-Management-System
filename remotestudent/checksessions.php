<?php
      include 'function.php';
      $data_insert=new Databases;
    session_start();
    $id=$_SESSION['id'];
    $pass=$_SESSION['pass'];              

    $conn=mysqli_connect("localhost","root","","info");
    if (isset($_POST['approve'])) {
          $rate=$_POST['mm'];              

     $sql = 
      "UPDATE packages_selection set rate = '$rate' WHERE id ='$id' "; 
      $h=mysqli_query($conn,$sql);     
 }


?>
 <html>
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
.star{
          color: goldenrod;
          font-size: 2.0rem;
          padding: 0 1rem; /* space out the stars */
        }
        .star::before{
          content: '\2606';    /* star outline */
          cursor: pointer;
        }
        .star.rated::before{
          /* the style for a selected star */
          content: '\2605';  /* filled star */
        }
        
        .stars{
            counter-reset: rateme 0;   
            font-size: 2.0rem;
            font-weight: 900;
        }
        .star.rated{
            counter-increment: rateme 1;
        }
        .stars::after{
            content: counter(rateme) '/5';
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
      <th scope="col">Day Of Session</th>
      <th scope="col">Place Of Session</th>
      <th scope="col">Time Of Session</th>
      <th scope="col">hours of lesson</th>
      <th scope="col">Rate</th>
      <th scope="col">Update Rate</th>

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

                    <td><?php echo $row['dayofsession']?></td>
                    <td><?php echo $row['placeofsession']?></td>
                    <td><?php echo $row['timeofsession']?></td>
                    <td><?php echo $row['hoursoflesson']?></td>
                    <td><input type='text' name='mm'></td>

                        <td>
                       <input type='submit' name='approve' value='Update Rate' class='btn btn-success' data-dismiss='modal'>
                       </td>
                     </form>
                   </tr>
               
      
               <?php
                $sr++;}
                ?>  
  </table>
 
</body>

</html>


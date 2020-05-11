<?php
      include 'function.php';
      $data_insert=new Databases;
    session_start();
    $id=$_SESSION['id'];
    $pass=$_SESSION['pass'];              
    $conn=mysqli_connect("localhost","root","","info");
    if (isset($_POST['approve'])) {
    $pack_num=$_POST['pack_num'];
    $data = array('id' => $id ,'packagenum' => $pack_num);
    $data_insert->insert('packages_selection',$data);
    
 }
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log In and Registration </title>

<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'> 




<style>
body, html{
     height: 100%;
    background-repeat: no-repeat;
    background-image: "eslam.jpg";
    font-family: 'Lato', Verdana;
}

.main{
    margin-top: 20px;
}
.form-group{
    margin-bottom: 15px;
}



input,
input::-webkit-input-placeholder {
    font-size: 11px;
    padding-top: 3px;
}

.main-login{
    background-color: #E1FFE1;
    /* shadows and rounded borders */
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

}

label{
    margin-bottom: 15px;
    font-size:18px;
}
.main-center{
    margin-top: 30px;
    margin:20px auto;
    max-width: 900px;
    padding: 60px 40px;

}

.login-button{
    margin-top: 5px;
}

.login-register{
    font-size: 12px;
    text-align: center;
    text-decoration:underline;
    color:#5CB85C;
    font-weight:bold;
}
.iconbk{
    background-color:#5CB85C;
}

</style>
 <script>
function checkID(va) {
$.ajax({
type: "POST",
url: "check_availability.php",
data:'ID='+va,
success: function(data){
$("#IDavailblty").html(data);
}
});

}
</script>        
</head>

<body>          
  <table class="table">
    <thead>
      <tr class="net">
      <th scope="col">Package num</th>
      <th scope="col">Package price</th>
      <th scope="col">vechial of lesson</th>
      <th scope="col">instructor</th>
      <th scope="col">Final Exam</th>
      <th scope="col">hours of lesson</th>
      <th scope="col">Select</th>

    </tr>
          
    <?php
         $conn=mysqli_connect("localhost","root","","info");
            $sql="SELECT * from package";
            $result=mysqli_query($conn,$sql); 
             $sr=1;
              while ( $row = $result-> fetch_assoc()) {
                   ?>
                   <tr>
                    <form method="post">

                     <td><input   type="text" id="country" name="pack_num" value=<?php echo $row['packagenum']?> readonly></td>

                    <td><?php echo $row['packageprice']?></td>
                    <td><?php echo $row['vechialsoflesson']?></td>
                      <td><?php echo $row['instructoroflesson']?></td>

                    <td><?php echo $row['finalexam']?></td>
                    <td><?php echo $row['hoursoflesson']?></td>
                     <td>
                       <input type='submit' name='approve' value='Select' class='btn btn-success' data-dismiss='modal'>
                       </td>
                     </form>
                   </tr>
               
      
               <?php
                $sr++;}
                ?>  
  </table>
</table>

</body>
</html>
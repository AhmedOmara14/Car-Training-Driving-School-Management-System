<?php
  session_start();
  include "db-connection.php"; 
    $id=$_SESSION['id'];
    $pass=$_SESSION['pass'];              
?>
<!DOCTYPE html>
<html>

	<head>
	    <title>Welcome at Home</title>
	    <meta charset="utf-8">
	    <link rel="stylesheet" href="sayed.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .table {
              font-family: arial, sans-serif;
              border-collapse: collapse;
              width: 100%;
            }

            .td, .th {
              border: 1px solid #dddddd;
              text-align: left;
              padding: 8px;
            }

            .tr:nth-child(even) {
              background-color: #dddddd;
            }
        </style>
	</head>
	
	<body>
        <?php $sql = "SELECT * FROM info WHERE email =$id AND pass=$pass";
          $query= mysqli_query($conn,$sql);    
          if ( $row = mysqli_fetch_assoc($query)){
            ?>
		<div class="main">
			
	        <div id="navigation">
	            <ul>
	                <li>

	                    <i class="fa fa-home fa-2x " aria-hidden="true">
	                        <b>
	                            <button class="iconn">
	                                <a class="edit" href="#home"></a>

	                            </button>
	                        </b>
	                    </i>
	                </li>
	                <li>
	                    <i class="fa fa-flag fa-2x popup" aria-hidden="true">
	                        <b>
	                            <button class="iconn" onclick="anmi">
	                                <a class="edit" href="#reports"></a>

	                            </button>
	                        </b>
	                    </i>

	                </li>
	            </ul>
	        </div>
	        <div>
                <h3 style="color: white">
	              Personal Information | MR:  <?php echo $row["name"]; ?>
          </h3>
                <form>
                    <fieldset id="home">
                        <div class="img">
                            <img src="c.jpg" alt="it's me" style="width:200px; height: 250px">
                       
                        </div>
                        <h1> 
                            <?php
                  echo $row["name"];
              ?>
                      
                        </h1>
                        <h2>
                   <?php echo "driving license " . $row["drivinglicense"] ?> 
                          
                      </h2>
                        <i class="fa fa-pencil-square-o" aria-hidden="true">
                          <b>
                            <a class="edit" href="#" onclick="document.getElementById('id01').style.display='block'">
                              Edit
                            </a>
                          </b>
                    </i>
                        <hr>
        <div class="pro-container">
            <table> 
  						    	<tr>
								    <td>PHONE: </td>
								    <td> <?php echo $row["phone"]; ?>   </td>
							    </tr>
							    <tr>
							    	<td>ADDRESS: </td>
								    <td> <?php echo $row["address"]; ?> </td>
							    </tr>
							    <tr>
							    	<td>E-MAIL: </td>
								    <td> <?php echo $row["email"]; ?>   </td>
							    </tr>
							    <tr>
							    	<td>DOB: </td>
								    <td> <?php echo $row["dob"]; ?>     </td>
							    </tr>
                   <?php 
                    }
                            else {
                                echo "no data selected";
                            }
                            ?>
						</table>
    </div>
                        <hr>
                          <?php 
                          $sql = "SELECT * FROM `packages_selection` ";
                          $query= mysqli_query($conn,$sql);    
                          if ( $row = mysqli_fetch_assoc($query)){
                            ?>

                        <h1>achievements</h1>
                        <table class="table">
                          <tr class="tr">
                            <th class="th">ID OF Student</th>
                            <th class="th">Package Number</th>
                            <th class="th">Rate</th>
                          </tr>
                            <tr class="tr">
                                <th class="th"> <?php echo $row["id"]; ?>     </th>
                                <th class="th"> <?php echo $row["packagenum"]; ?></th>
                                <th class="th"> <?php echo $row["rate"]; ?></th>

                            </tr>

                        </table>
                             <?php 
                                      }
                            else {
                                echo "no data selected";
                            }
                            ?>
                        <hr>
                          <?php 
                          $sql = "SELECT * FROM `package` ";
                          $query= mysqli_query($conn,$sql);    
                          if ( $row = mysqli_fetch_assoc($query)){
                            ?>
                        <h1>Sessions</h1>
                        <table class="table">
                          <tr class="tr">
                            <th class="th">package num</th>
                            <th class="th">Day of session</th>
                            <th class="th">Time of session</th>
                            <th class="th">Place of session</th>

                          </tr>
                          <tr class="tr">
                            <th class="th"> <?php echo $row["packagenum"]; ?></th>
                            <th class="th"> <?php echo $row["dayofsession"]; ?></th>
                            <th class="th"> <?php echo $row["timeofsession"]; ?></th>
                            <th class="th"> <?php echo $row["placeofsession"]; ?></th>

                        </tr>
                        </table>
                         <?php 
                                      }
                            else {
                                echo "no data selected";
                            }
                            ?>
                    </fieldset>
                    <br>
                    <br>
                    <fieldset id="reports">
                        <h1>REPORTS</h1>
                        <div>
                            <div>
                                <form name="contactform" method="post" >
                                    <input type="text" placeholder="CC">
                                    <input type="email" placeholder="EMAIL" required>
                                    <textarea name="Message" placeholder="MESSAGE" required></textarea>
                                    <div>
                                        <button type="submit" name="send" >SEND</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
		</div>
		<div id="id01" class="modal">

          <form class="modal-content animate" autocomplete="on", method="post" >
              <div class="container">
                  <input type="text" placeholder="Name" name="name">
                  <br>
                    <input type="text" placeholder="Phone" name="phone1">
                  <br>
                    <input type="text" placeholder="driving license"
                     name="drivinglicense">
                  <br>
                    <input type="text" placeholder="Address" name="adress">
                  <br>
                  <input type="text" placeholder="E-mail" name="email">
                  <br>
                  <input type="date" name="data" >
                  <br>
                  <input type="password" placeholder="Enter Password" 
                  name="pass" required>
                  <br>
              </div>
              <div class="container" style="background-color:#f1f1f1">
                  <button type="submit" name="update" class="savebtn">Save</button>
                    <button type="button" class="cancelbtn" onclick="document.getElementById('id01').style.display='none'" >Cancel</button>
                    
              </div>
      </form>
            </div>
            <div >
                <?php
                if (isset($_POST['update'])) {
                   $m= " UPDATE info SET name='$_POST[name]',email='$_POST[email]',
                     pass='$_POST[pass]',
                     drivinglicense ='$_POST[drivinglicense]',
                     phone='$_POST[phone1]',
                     address='$_POST[adress]'

                     WHERE email=$id AND pass=$pass";
                  
                    if ( mysqli_query($conn,$m)) {
                        echo "updata";

                    }}
                    elseif (isset($_POST['send'])){
                        echo "done";
                    }
                
                else{
                        echo "no updata";
                    }
                    ?>
                
          </div>
           
            
	</body>
</html>
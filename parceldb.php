<!DOCTYPE html>
<html>
<?php
    $conn = mysqli_connect("localhost","root","","hand2hand");
    
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      session_start();
      $_SESSION['customer_id'];
      $_SESSION['email'];
    ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="col" style="color: rgb(248,248,248);background-color: white;">
        <h1 class="text-center"style="color:black;" >Own parcels</h1>
    </div>
    <div class="col">
        <div class="table-responsive">
        <table class="table table-bordered">
                <thead>

                <?PHP
              
              $name=$surname=$cellno=$staffno="";

            


                $email=$_SESSION['email'];

                $query="select * FROM customer WHERE email='$email'";
                $result=mysqli_query($conn,$query);
                $rows=mysqli_num_rows($result);
                while ($rows=mysqli_fetch_array($result)) {
                
                  
                   $staffno = $_SESSION['customer_id']= $rows['customer_id']; 
                   $name = $_SESSION['name']= $rows['name'];  
                   $surname = $_SESSION['surname']= $rows['surname'];
                   //$dob = $_SESSION['dob']= $rows['dob']; 
                   $cellno = $_SESSION['cellno']=$rows['phone_number'];
                   
                
                }
              
                ?>
                    <tr>
                    <?PHP
              
                

               

                              

              $query="SELECT parcel.parcel_id as id,parcel.parcel_name as nam,parcel.picture as pic,parcel.parcel_desc as dsc,parcel.parcel_weight as wei
              
                      FROM   parcel
                      WHERE parcel.del='1'
                      AND
                      parcel.customer_id='$staffno'";

                      
              $result=mysqli_query($conn,$query);
              
              $rows=mysqli_num_rows($result);
              
             
              
              if ($rows>0) {
                
                ?>
                        <th><button  class="btn btn-light submit-button" type="button" style="background-color: rgb(0,16,33);color :white;">
                        <a class="button button-reversed" style="color:white;" href="custprofile.php">Back</button></th>
                       
                       <th style="font-size: 13px;">#</th>
                        <th style="font-size: 13px;">Parcel Image</th>
                       
                       
                        <th style="font-size: 13px;">Parcel Name</th>
                        <th style="font-size: 13px;">Parcel description</th>
                        <th style="font-size: 13px;">Parcel Weight</th>
                        <th style="font-size: 13px;">options</th>
                        
                    </tr>
                </thead>
                <?php
                while ($rows=mysqli_fetch_array($result)) {

                  
              ?>
                <tbody>
                    <tr style="font-size: 14px;">
                        <td></td>
                        <td><?php echo $rows['id'];?></td>
                        <th class="text-right"><img src="parcels/<?php echo $rows['pic'];?>" style="width: 150px;height: 150px;"></th>
                        
                        <td><?php echo $rows['nam'];?></td>
                        <td><?php echo $rows['dsc'];?></td>
                        <td><?php echo $rows['wei'];?></td>
                        
                        <td><button  class="btn btn-light submit-button" type="button" style="background-color: rgb(0,16,33);color :white;font-size: 13px;"><a class="button button-reversed" style="color:white;" href="location.php?edt=<?php echo $rows['id'];?>">Add location</button>
                        <button  class="btn btn-light submit-button" type="button" style="background-color: rgb(0,16,33);color :white;font-size: 13px;"><a class="button button-reversed" style="color:white;" href="payment.php?edt=<?php echo $rows['id'];?>">Payment</button>
                        <button  class="btn btn-light submit-button" type="button" style="background-color: rgb(0,16,33);color :white;font-size: 13px;"><a class="button button-reversed" style="color:white;" href="parceldel.php?edt=<?php echo $rows['id'];?>">Delete</button>

                    </tr>
                </tbody>
                <?php
                  
            }
            ?>
            </table>
            <?php
          }else{
            ?>
            <h3>No record(s)</h3>
            <?php
          }
          
        
          ?>
            </table>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
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
      $_SESSION['shipper_id'];
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
    <div class="col" style="color: white;background-color: white">
        <h1 class="text-center" style="color:black;" >List of parcels</h1>
    </div>
    <div class="col">
        <div class="table-responsive">
        <table class="table table-bordered">
                <thead>

                <?PHP
              
              $name=$surname=$cellno=$staffno="";

            


                $email=$_SESSION['email'];

                $query="select * FROM shipper WHERE email='$email'";
                $result=mysqli_query($conn,$query);
                $rows=mysqli_num_rows($result);
                while ($rows=mysqli_fetch_array($result)) {
                
                  
                   $staffno = $_SESSION['shipper_id']= $rows['shipper_id']; 
                   $name = $_SESSION['name']= $rows['name'];  
                   $surname = $_SESSION['surname']= $rows['surname'];
                   //$dob = $_SESSION['dob']= $rows['dob']; 
                   $cellno = $_SESSION['cellno']=$rows['phone_number'];
                   
                
                }
              
                ?>
                    <tr>
                    <?PHP
              
                

               

                              

              $query="SELECT parcel.parcel_id as parcel_no,customer.surname as surname,customer.name as name,parcel.parcel_name as Parcel_name,parcel.picture as parcel_image,parcel.parcel_desc as Parcel_description,parcel.parcel_weight as Parcel_weight,parcel.time as posted_time,location.pick_up_location as Pick_up,location.destination as place,location.pick_up_link as link 
              FROM customer,location,parcel,shipper
              WHERE customer.customer_id=parcel.customer_id 
              AND
              parcel.parcel_id=location.parcel_id
              AND
              parcel.del='1'
              AND location.shipper_id=shipper.shipper_id
              AND location.shipper_id='$staffno'
              ";





            //refer
            $query3="SELECT parcel.parcel_id as parcel_no,customer.surname as surname,customer.name as name,parcel.parcel_name as Parcel_name,parcel.picture as parcel_image,parcel.parcel_desc as Parcel_description,parcel.parcel_weight as Parcel_weight,parcel.time as posted_time,location.pick_up_location as Pick_up,location.destination as place,location.pick_up_link as link 
              FROM customer,location,parcel,shipper
              WHERE customer.customer_id=parcel.customer_id 
              AND
              parcel.parcel_id=location.parcel_id
              AND
              parcel.del='1'
              AND location.shipper_id=shipper.shipper_id
              AND location.shipper_id='$staffno'
              ";


              $result3=mysqli_query($conn,$query3);
              
              $rows3=mysqli_fetch_array($result3);;
             
             $ref= $rows3['parcel_no'];

            //refer

                      
              $result=mysqli_query($conn,$query);
              
              $rows=mysqli_num_rows($result);
              
              
              
              

              $query1="SELECT  * from payment where parcel_id='$ref'";

                      
              $result1=mysqli_query($conn,$query1);
              
              $line2=mysqli_num_rows($result1);

             
              
              if ($rows>0) {

               // session_start();
                $_SESSION['shipper_id'];
                //$_SESSION['email'];
                
                ?>
                        <th><button class="btn btn-light submit-button" type="button" style="background-color: rgb(0,16,33);color :white;">
                        <a class="button button-reversed" style="color:white;" href="shipperprofile.php">Back</button></th>
                       
                      
                      
                        <th >Parcel No.</th>
                        <th >Parcel Image</th>
                        <th >customer Surname</th>
                        <th >customer Name</th>
                        
                        <th >Parcel Name</th>
                        <th >Parcel description</th>
                        <th >Parcel Weight</th>
                        
                        <th >Pick Up Location</th>
                        <th >Destination Address</th>
                        <th >Time Posted</th>
                        <th >Deliver</th>
                        <th >Payment status</th>
                        
                        
                    </tr>
                </thead>
                <?php
                while ($rows=mysqli_fetch_array($result)) {

                  $line2=mysqli_fetch_array($result1);
                
                  $pid=$rows['parcel_no'];

                  if($line2['pay_status']=='1')
                 {

                    $mess='<span style="color:green;">Paid</span>';    
                    
                         
                 }else
                 {
                      $mess='<span style="color:red;">Not Paid</span>';
               

                 }
              ?>
                <tbody>
                    <tr style="font-size: 12px;">
                        <td></td>
                        <td><?php echo $rows['parcel_no'];?></td>
                        <th class="text-right"><img src="parcels/<?php echo $rows['parcel_image'];?>" style="width: 150px;height: 150px;"></th>
                        
                        <td><?php echo $rows['surname'];?></td>
                        <td><?php echo $rows['name'];?></td>

                        <td><?php echo $rows['Parcel_name'];?></td>
                        <td><?php echo $rows['Parcel_description'];?></td>
                        <td><?php echo $rows['Parcel_weight'];?></td>

                        
                        <td><a style="color: black;" href="<?php echo $rows['link'];?>"><?php echo $rows['Pick_up'];?></a></td>
                        <td><?php echo $rows['place'];?></td>
                        <td><?php echo $rows['posted_time'];?></td>
                        
                        
                        
                        <td><button  type="button" class="btn btn-light submit-button"  type="button" style="background-color: rgb(0,16,33);color :white;"><a class="button button-reversed" style="color:white;text-decoration:none;"  href="delivered.php?edt=<?php echo $rows['parcel_no'];?>">Delivered</button>
                        <td style="font-size: 16px;"><?php echo $mess;?></td>
                    </tr>
                </tbody>
                <?php
                  
            }
            ?>
            </table>
            <?php
          }else{
            ?>
            <h3 style="color:purple;text-align:center;">No record(s)</h3>
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
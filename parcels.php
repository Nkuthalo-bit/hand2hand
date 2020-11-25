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
<body>
    <div class="col" style="color: rgb(248,248,248);background-color: #343a40;">
        <h1 class="text-center">Parcel information</h1>
    </div>
    <div class="col">
        <div class="table-responsive table-borderless" style="font-size: 12px;">
            <table class="table table-striped table-bordered table-dark table-sm">
                <thead>
                    <?PHP
              
                

               

                              

                        $query="SELECT parcel.parcel_id as id,parcel.parcel_name as name,parcel.picture as pic,parcel.parcel_desc as dsc,parcel.parcel_weight as wei
                        
                                FROM   parcel
                                WHERE 
                                parcel.customer_id='$staffno'";

                                
                        $result=mysqli_query($conn,$query);
                        
                        $rows=mysqli_num_rows($result);
                        
                       
                        
                        if ($rows>0) {
                          
                          ?>
                    <tr>
                        <?php
                        while ($rows=mysqli_fetch_array($result)) {
                      ?>
                        <th><br></th>
                        <th class="text-right"><img src="parcels/<?php echo $rows['pic'];?>" style="width: 150px;height: 150px;"></th>
                        <th></th>
                    </tr>
                </thead>
               
                <tbody>
                <tr>
                        <td></td>
                        <td>parcel Id&nbsp;</td>
                        <td><?php echo $rows['id'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>parcel name&nbsp;</td>
                        <td><?php echo $rows['name'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Parcel Description</td>
                        <td><?php echo $rows['dsc'];?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Parcel Weight</td>
                        <td><?php echo $rows['wei'];?></td>
                    </tr>
                    
                    <tr>
                        <td></td>
                       
                        
                    </td>
                    </tr>
                    
                </tbody>
            
                <?php
                   
                    }
                    ?>
                    </table>
                </div>
            </div>
            <?php
              }else{
                ?>
                <h3>No record(s)</h3>
                <?php
              } ?>
            </table>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
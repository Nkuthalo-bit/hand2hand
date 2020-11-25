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
    <div class="col" style="color:black;background-color:white;">
        <h1 class="text-center">notifications page</h1>
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
              
                

               

                              

              $query="SELECT customer.customer_id as id,parcel.picture as image,
              parcel.parcel_id as pid,parcel.parcel_name as pname,parcel.delivered_stat as stats,
              shipper.surname as ssur,shipper.name  as snam
              FROM shipper,parcel,customer,location
              WHERE shipper.shipper_id=location.shipper_id
              AND customer.customer_id=parcel.customer_id
              AND location.parcel_id=parcel.parcel_id
              
              AND parcel.customer_id='$staffno'";

                      
              $result=mysqli_query($conn,$query);
              
              $rows=mysqli_num_rows($result);
              
             
              
              if ($rows>0) {
                
                ?>
                        <th><button class="btn btn-light submit-button" type="button" style="background-color: rgb(0,16,33);color :white;">
                        <a class="button button-reversed" style="color:white;" href="custprofile.php">Back</button></th>
                       
                      
                        <th>Parcel Image</th>
                       
                      
                        <th >notifications</th>
                        <th >Status Message</th>
                        
                        
                    </tr>
                </thead>
                <?php
                while ($rows=mysqli_fetch_array($result)) {
                  
                 if($rows['stats']=='0')
                 {

                    $mess='<span style="color:red;">Not delivered</span>';                     
                 }else
                 {
                      $mess='<span style="color:green;">Delivered</span>';

                 }
              ?>
                <tbody>
                    <tr style="font-size: 12px;">
                        <td></td>

                        <th class="text-right"><img src="parcels/<?php echo $rows['image'];?>" style="width: 150px;height: 150px;"></th>
                        <td style="font-size: 18px;">Your Parcel Named "<?php echo $rows['pname'];?>" with an Id "<?php echo $rows['pid'];?>" was accepted by shipper 
                        <?php echo $rows['ssur'].' '.$rows['snam'];?> <th  style="font-size: 18px;"><?php echo $mess;?></th></td>
                    </tr>
                </tbody>
                <?php
                  
            }
            ?>
            </table>
            <?php
          }else{
            ?>
            <h3>No one accepted your parcels yet check notifications in a while.</h3>
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

<?php

$connect=mysqli_connect("localhost","root","","hand2hand");

//$id=$_GET['edt'];

//session_start();

$alert=$_SESSION['customer_id'];



$command="UPDATE parcel
 SET 
 message_read='1'
 WHERE customer_id='$alert'";


$edit=mysqli_query($connect,$command);

  

if($edit){
mysqli_close($connect);

echo '<script>alert("<----Welcome to notification(s) platform--->");</script>';

exit;

}
else
{
    echo mysqli_error();

}

?>






<?php




$conn=mysqli_connect("localhost","root","","hand2hand");

//$id=$_GET['edt'];

session_start();
$email=$_SESSION['email'];

$qry2=mysqli_query($conn,"select * from admin WHERE email='$email'");
$data2=mysqli_fetch_array($qry2);

//$data=mysqli_fetch_array($qry);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/dh-row-text-image-right.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/FORM.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Pretty-Login-Form.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean" style="background-color: rgb(0,16,33);">
        <div class="container"><a class="navbar-brand" href="#" style="color: rgb(255,255,255);"><i class="icon ion-android-mail"></i>&nbsp;<strong>Hand2Ha</strong>nd</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="AdminView.php" style="color: rgb(255,255,255);"><i class="fa fa-home"></i>&nbsp;Admin View</a></li>
                    <li class="nav-item" role="presentation"><p class="btn btn-light submit-button" style="background-color:rgb(0,16,33);color:white;"><?php echo($data2['surname']." ".$data2['name']) ?></p></li>
                
                </ul>
        </div>
        </div>
    </nav>
    <div>
   
<body>
    <div class="col" style="color: rgb(248,248,248);background-color: white;">
    <h1 style="color:black;" class="text-center">List of parcels</h1>
       
    </div>
    <div class="col">
        <div class="table-responsive">
        <table class="table table-bordered">
                <thead>

                
                    <tr>
                    <?PHP
              
                

               

                              

              $query="SELECT customer.surname as custsur,customer.name as custnam,customer.phone_number as custphone,parcel.parcel_id as id,
              parcel.picture as image,parcel.parcel_name as parcname,
              parcel.parcel_desc as parcdesc,parcel.parcel_weight parcweight,
              location.pick_up_location as pickup,location.destination as place,location.pick_up_link as link,
              shipper.surname as shipsur,shipper.name shipname,shipper.phone_number as shipphone
              
              FROM shipper,customer,parcel,location
              WHERE
              shipper.shipper_id=location.shipper_id
              AND
              customer.customer_id=parcel.customer_id
              AND
              parcel.parcel_id=location.parcel_id
              ";

                      
              $result=mysqli_query($conn,$query);
              
              $rows=mysqli_num_rows($result);
              
             
              
              if ($rows>0) {

               // session_start();
                //$_SESSION['shipper_id'];
                //$_SESSION['email'];
                
                ?>
                        <th><button class="btn btn-light submit-button" type="button" style="background-color: rgb(0,16,33);color :white;">
                        <a class="button button-reversed" style="color:white;" href="AdminView.php">Back</button></th>
                       
                      
                        <th style="font-size: 13px;">Parcel No.</th>
                        
                        <th style="font-size: 13px;">Parcel image</th>
                        <th style="font-size: 13px;">customer Surname</th>
                        <th style="font-size: 13px;">customer Name</th>
                        <th style="font-size: 13px;">customer Phone</th>
                        

                        
                        <th style="font-size: 13px;">Parcel Name</th>
                        <th style="font-size: 13px;">Parcel description</th>
                        <th style="font-size: 13px;">Parcel Weight</th>
                        
                        <th style="font-size: 13px;">Pick Up Location</th>
                        <th style="font-size: 13px;">Destination Address</th>
                       
                        <th style="font-size: 13px;">shipper Surname</th>
                        <th style="font-size: 13px;">shipper Name</th>
                        <th style="font-size: 13px;">shipper Phone</th>
                        
                        
                    </tr>
                </thead>
                <?php
                while ($rows=mysqli_fetch_array($result)) {
              ?>
                <tbody>
                    <tr style="font-size: 12px;">
                        <td></td>
                       
                        
                        <td><?php echo $rows['id'];?></td>
                        <th class="text-right"><img src="parcels/<?php echo $rows['image'];?>" style="width: 100px;height: 100px;"></th>
                        <td><?php echo $rows['custsur'];?></td>
                        <td><?php echo $rows['custnam'];?></td>
                        <td><?php echo $rows['custphone'];?></td>

                        <td><?php echo $rows['parcname'];?></td>
                        <td><?php echo $rows['parcdesc'];?></td>
                        <td><?php echo $rows['parcweight'];?></td>

                        
                        <td><?php echo $rows['pickup'];?></td>
                        <td><?php echo $rows['place'];?></td>
                        
                        <td><?php echo $rows['shipsur'];?></td>
                        <td><?php echo $rows['shipname'];?></td>
                        <td><?php echo $rows['shipphone'];?></td>
                        
                        
                        
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
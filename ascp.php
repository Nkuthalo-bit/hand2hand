



<!DOCTYPE html>
<html>
<?php




$conn=mysqli_connect("localhost","root","","hand2hand");

//$id=$_GET['edt'];

session_start();
$email=$_SESSION['email'];

$qry2=mysqli_query($conn,"select * from admin WHERE email='$email'");
$data2=mysqli_fetch_array($qry2);

//$data=mysqli_fetch_array($qry);

?>
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
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php" style="color: rgb(255,255,255);"><i class="fa fa-home"></i>&nbsp;Home</a></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="color: rgb(255,255,255);"><i class="fa fa-american-sign-language-interpreting"></i>&nbsp;Sign</a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="Admin.php" style="color: rgb(0,0,0);"><i class="fa fa-user"></i>&nbsp;Admin</a><a class="dropdown-item" role="presentation" href="shipper.php" style="color: rgb(0,0,0);"><i class="fa fa-motorcycle"></i>&nbsp;Register Shipper</a>
                            <a
                                class="dropdown-item" role="presentation" href="loginShipper.php" style="color: rgb(0,0,0);"><i class="fa fa-motorcycle"></i>&nbsp;Login Shipper</a><a class="dropdown-item" role="presentation" href="customer.php" style="color: rgb(0,0,0);"><i class="fa fa-cart-arrow-down"></i>&nbsp;Register Customer&nbsp;</a><a class="dropdown-item"
                                    role="presentation" href="loginCustomer.php" style="color: rgb(0,0,0);"><i class="fa fa-cart-arrow-down"></i>&nbsp;Login Customer&nbsp;</a></div>
                    </li>
                    <li class="nav-item" role="presentation"><p class="btn btn-light submit-button" style="background-color:rgb(0,16,33);color:white;"><?php echo($data2['surname']." ".$data2['name']) ?></p></li>
                
                </ul>
        </div>
        </div>
    </nav>
    <div>
    <body>
    
    <div class="col" style="color: rgb(248,248,248);background-color: white;">
<br><br>
    <form action="search.php" method="post" style="text-align:center;">
    <select name="field" style="height:35px;">
        <option value="">Select Field</option>
        <option value="(customer.surname)">Customer surname</option>
        <option value="(customer.name)">customer name</option>
        <option value="(customer.phone_number)">Customer Phone number </option>
        <option value="(parcel.parcel_name)">Parcel Name </option>
        <option value="(location.pick_up_location)">Collection Location</option>
        <option value="(location.destination)">Destination</option>
        <option value="(shipper.name)">Shipper Name</option>
        <option value="(shipper.surname)">Shipper Surname</option>
        <option value="(shipper.phone_number)">Shipper phone number</option>
       
    </select>&nbsp;
    <input placeholder="Search Here" name="search" style="height:35px;"></input>&nbsp;
    <input type="submit" placeholder="Search Here" class="btn btn-light submit-button" type="button" style="background-color: rgb(0,16,33);color :white;" value="search" style="height:35px;"></input>&nbsp;
    <select onchange="location=this.value;" style="height:35px;">
        <option>--Sort--</option>
        <option value="ascp.php">By weight ASC</option>
        <option value="descp.php">By weight DESC</option>
    </select>&nbsp;
    <select onchange="location=this.value;" style="height:35px;">
        <option>Reports</option>
        <option value="dailyp.php">Daily Report</option>
        <option value="weeklyp.php">Weekly Report</option>
        <option value="monthlyp.php">Monthly Report</option>
    </select>

</form>
<br><br>
    
        <h1 style="color:black;" class="text-center">Sorted By Parcel weight In ASC Order</h1>
      
        <br>
    </div>
    <form class="custom-form" style="color: rgb(100,109,230);border-top:white;">
            
            <div class="col">
    <div class="col">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>

                
                    <tr>
                    <?PHP
              
                

               

                              

              $query="SELECT customer.surname as custsur,customer.name as custnam,customer.phone_number as custphone,parcel.parcel_id as id,
                parcel.picture as image,parcel.parcel_name as parcname,
                parcel.parcel_desc as parcdesc,parcel.parcel_weight parcweight,
                location.pick_up_location as pickup,location.destination as place,
                shipper.surname as shipsur,shipper.name shipname,shipper.phone_number as shipphone,parcel.time as time
                
                FROM shipper,customer,parcel,location
                WHERE
                shipper.shipper_id=location.shipper_id
                AND
                customer.customer_id=parcel.customer_id
                AND
                parcel.parcel_id=location.parcel_id
                ORDER BY parcel.parcel_weight ASC
                
                
                ";
            
//AND date_format(parcel.time,'%Y-%m-%d')=date_format(sysdate(),'%Y-%m-%d')
                      
              $result=mysqli_query($conn,$query);
              
              $rows=mysqli_num_rows($result);
              
             
              
              if ($rows>0) {

               // session_start();
                //$_SESSION['shipper_id'];
                //$_SESSION['email'];
                
                ?>
                        <th><button class="btn btn-light submit-button" type="button" style="background-color: rgb(0,16,33);color :white;">
              <a style="color:white;"  class="button button-reversed"  href="AdminView.php">Back</button></th>
                       
                      <th style="font-size: 13px;">Parcel No.</th>
                        <th style="font-size: 13px;">Parcel Image</th>
                       
                        
                       
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
                        <th style="font-size: 13px;">Time</th>
                        
                    </tr>
                </thead>
                <?php
                while ($rows=mysqli_fetch_array($result)) {
              ?>
                <tbody>
                    <tr style="font-size: 12px;">
                        <td></td>
                        <td><?php echo $rows['id'];?></td>
                        <th class="text-right"><img src="parcels/<?php echo $rows['image'];?>" style="width: 150px;height: 150px;"></th>
                        
                        <td><?php echo $rows['custsur'];?></td>
                        <td><?php echo $rows['custnam'];?></td>
                        <td><?php echo $rows['custphone'];?></td>

                        <td><?php echo $rows['parcname'];?></td>
                        <td><?php echo $rows['parcdesc'];?></td>
                        <td style="color:Blue;"><?php echo $rows['parcweight'];?></td>

                        
                        <td><?php echo $rows['pickup'];?></td>
                        <td><?php echo $rows['place'];?></td>
                        
                        <td><?php echo $rows['shipsur'];?></td>
                        <td><?php echo $rows['shipname'];?></td>
                        <td><?php echo $rows['shipphone'];?></td>
                        <td><?php echo $rows['time'];?></td>
                        
                        
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
                           
<p style="text-align:center;">
            <button class="btn btn-light submit-button" style="background-color: rgb(0,16,33);color :white;" onclick="$('table').table2csv();">Export csv</button>
            <button class="btn btn-light submit-button" style="background-color: rgb(0,16,33);color :white;"onclick="$('table').wordExport({font:20});">Export Doc</button>
            <button class="btn btn-light submit-button" style="background-color: rgb(0,16,33);color :white;" onclick="$('table').tblToExcel();">Export xls</button></p>                        
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="table2csv.js"></script>
<script src="jspdf.js"></script>
<script src="jspdf/libs/base64.js"></script>
<script src="jspdf/libs/sprintf.js"></script>
<script src="jquery.base64.js"></script>
<script src="tableExport.js"></script>
<script src="jquery.tableToExcel.js"></script>
<script src="FileSaver.js"></script> 
<script src="jquery.wordexport.js"></script>
    

</html>
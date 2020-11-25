<!DOCTYPE html>
<html>
    <?php
    $conn = mysqli_connect("localhost","root","","hand2hand");
    
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      //session_start();
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
        <h1 class="text-center" style="color: black;">Customers</h1>
    </div>
    <div class="col">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>

                    <?PHP
           
                    $query="SELECT * from customer";
                    $result=mysqli_query($conn,$query);
                    
                    $rows=mysqli_num_rows($result);
                    
                   
                    
                    if ($rows>0) {
                      
                      ?>
                    <tr>
                        <th><button  class="btn btn-light submit-button" type="button" style="background-color: rgb(0,16,33);color :white;"><a style="color:white;" class="button button-reversed" href="AdminView.php">Back</button></th>
                        <th>#</th>
               
                        <th style="font-size: 13px;">Surname</th>
                        <th style="font-size: 13px;">Name</th>
                        <th style="font-size: 13px;">Id Number</th>
                        <th style="font-size: 13px;">Email</th>
                        <th style="font-size: 13px;">Phone</th>
                        <th style="font-size: 13px;">Update</th>
                        <th style="font-size: 13px;">Activate</th>
                        <th style="font-size: 13px;">Deactivate</th>
                    </tr>
                </thead>
                <?php
                while ($rows=mysqli_fetch_array($result)) {
              ?>
                <tbody>
                    <tr style="font-size: 14px; ">
                        <td></td>
                        <td><?php echo $rows['customer_id'];?></td>
                        <td><?php echo $rows['surname'];?></td>
                        <td><?php echo $rows['name'];?></td>
                        <td><?php echo $rows['id_number'];?></td>
                        <td><?php echo $rows['email'];?></td>
                        <td><?php echo $rows['phone_number'];?></td>
                        <td><button class="btn btn-primary border-white" type="button" style="background-color: rgb(0,16,33);color :white;" style="font-size: 12px;background-color: rgb(255,255,255);color: rgb(0,0,0);"><a style="color:white; class="button button-reversed" href="edit.php?edt=<?php echo $rows['customer_id'];?>">edit</button></td>
                        <td><button class="btn btn-primary border-white" type="button" style="background-color: rgb(0,16,33);color :white;" style="font-size: 13px;background-color: rgb(255,255,255);"><a style="color:white; class="button button-reversed" href=" activecust.php?edt=<?php echo $rows['customer_id'];?>"><i class="fa fa-unlock" style="color:white;font-size: 16px;"></i></button></td>
                   
                        <td><button class="btn btn-primary border-white" type="button" style="background-color: rgb(0,16,33);color :white;" style="font-size: 13px;background-color: rgb(255,255,255);"><a style="color:white; class="button button-reversed" href="suspendcustomer.php?edt=<?php echo $rows['customer_id'];?>"><i  class="fa fa-lock" style="color:white;font-size: 16px;"></i></button></td>
                       
                   
                   
                   
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
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
     // $_SESSION['shipper_id'];
      $_SESSION['email'];
    ?>

<head>
<style>


a {
    color: #fdfdfd;
    text-decoration: none;
    background-color: transparent;
}


</style> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
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
                </ul>
        </div>
        </div>
    </nav>
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


<body>
    <div class="login-clean">
        <form method="post" style="width:350px;">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="far fa-user-circle" style="color: rgb(71,71,98);"></i></div>
            <div class="form-group">
                <div class="table-responsive table-borderless" style="font-size: 11px;">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr></tr>
                        </thead>

                        <?PHP
              
                

               

                              

                        $query="SELECT shipper.shipper_id as id,shipper.surname as surname,shipper.name as name,shipper.email as email,
                                       shipper.phone_number as cellno,shipper.id_number as idno,shipper.gender as gender
                                FROM   shipper 
                                WHERE  shipper.shipper_id='$staffno' ";
                        $result=mysqli_query($conn,$query);
                        
                        $rows=mysqli_num_rows($result);
                        
                       

                        $query2="SELECT count(shipper_id) as mess From location WHERE shipper_id='$staffno'";
                         $result2=mysqli_query($conn,$query2);
                        $rows2=mysqli_num_rows($result2);
                        
                      

                        if ($rows>0 && $rows2) {
                          
                          ?>
                        <tbody> 
                            <?php
                            while ($rows=mysqli_fetch_array($result)) {
                                $rows2=mysqli_fetch_array($result2);
                                $show=$rows2['mess'];

                           

                          ?>
                          <tr>
                                <td>shipper Id</td>
                                <td><?php echo $rows['id'];?></td>
                            </tr>
                            <tr>
                                <td>Surname&amp; Name</td>
                                <td><?php echo $rows['surname'].' '. $rows['name'];?></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><?php echo $rows['gender'];?></td>
                            </tr>
                            <tr>
                                <td>Id number</td>
                                <td><?php echo $rows['idno'];?></td>
                            </tr>
                            <tr>
                                <td>Email</td> 
                                <td><?php echo $rows['email'];?></td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td><?php echo $rows['cellno'];?></td>
                            </tr>
                            <tr>
                                <td><button class="btn btn-light submit-button" type="submit" style="background-color: rgb(0,16,33); font-size: 11px;"><a class="button button-reversed" style="color: white;" href="shipedit.php?edt=<?php echo $rows['id'];?>">update</button>
                                <button class="btn btn-light submit-button" type="submit" style="background-color: rgb(0,16,33); font-size: 11px;"><a class="button button-reversed" style="color: white;" href="shipdelete.php?edt=<?php echo $rows['id'];?>">Delete Account</button></td>
                                <td><button class="btn btn-light submit-button" type="submit" style="background-color: rgb(0,16,33); font-size: 11px;"><a class="button button-reversed" style="color: white;" href="parcel2ship.php?edt=<?php echo $rows['id'];?>">View Parcel(s)</button>
                                <button class="btn btn-light submit-button" type="submit" style="background-color: rgb(0,16,33); font-size: 11px;"><a class="button button-reversed" style="color: white;" href="accepted.php?edt=<?php echo $rows['id'];?>">Accepted<p style="color: rgb(0,16,33);background-color:white;border-radius:50%;width:15px;height:50%;"><?php echo $show;?></p></button>
                                <button class="btn btn-primary" type="button" style="background-color: rgb(0,16,33); font-size: 11px;"><a href="logout.php" style="color: white;">Log Out</a></button></div>
        
                                <td><button class="btn btn-light submit-button" type="submit" style="background-color: rgb(0,16,33); font-size: 11px;"><a class="button button-reversed" style="color: white;" href="shipcomment.php?edt=<?php echo $rows['id'];?>">Complain</button>
                                
                                <button class="btn btn-light submit-button" type="submit" style="background-color: rgb(0,16,33); font-size: 11px;"><a class="button button-reversed" style="color: white;" href="swap.php?edt=<?php echo $rows['id'];?>">Switch to Customer</button>
                                </td>
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
            <div class="form-group text-center"></form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php




$conn=mysqli_connect("localhost","root","","hand2hand");

//$id=$_GET['edt'];

if(!isset($_SESSION)) 
    { 
        session_start(); 
        $email=$_SESSION['email'];
    }

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
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php" style="color: rgb(255,255,255);"><i class="fa fa-home"></i>&nbsp;Home</a></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="color: rgb(255,255,255);"><i class="fa fa-american-sign-language-interpreting"></i>&nbsp;Sign</a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="Admin.php" style="color: rgb(0,0,0);"><i class="fa fa-user"></i>&nbsp;Admin</a><a class="dropdown-item" role="presentation" href="shipper.php" style="color: rgb(0,0,0);"><i class="fa fa-motorcycle"></i>&nbsp;Register Shipper</a>
                            <a
                                class="dropdown-item" role="presentation" href="loginShipper.php" style="color: rgb(0,0,0);"><i class="fa fa-motorcycle"></i>&nbsp;Login Shipper</a><a class="dropdown-item" role="presentation" href="customer.php" style="color: rgb(0,0,0);"><i class="fa fa-cart-arrow-down"></i>&nbsp;Register Customer&nbsp;</a><a class="dropdown-item"
                                    role="presentation" href="loginCustomer.php" style="color: rgb(0,0,0);"><i class="fa fa-cart-arrow-down"></i>&nbsp;Login Customer&nbsp;</a></div>
                    </li>
                    <li class="nav-item" role="presentation"><p class="btn btn-light submit-button" style="background-color:rgb(0,16,33);color:white;";"><?php echo($data2['surname']." ".$data2['name']) ?></p></li>
                
                </ul>
        </div>
        </div>
    </nav>
    <div>
    <?php 
    
    include 'view.php';
    ?>

    

</html>
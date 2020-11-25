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
                </ul>
        </div>
        </div>
    </nav>

    <script>

    
function validateForm() 
{
var uerror=document.getElementById("uerror");
var perror=document.getElementById("perror");


if(document.forms["form"]["email"].value=="" && document.forms["form"]["password"].value=="")
{

uerror.innerHTML="<span style='color:red;''>"+" email required *</span>"
perror.innerHTML="<span style='color:red;''>"+" password required *</span>"

return false;

}else
if(document.forms["form"]["email"].value=="")
{

uerror.innerHTML="<span style='color:red;''>"+"email required *</span>"

return false;

}else if(document.forms["form"]["password"].value=="")
{


perror.innerHTML="<span style='color:red;''>"+" password required *</span>"

return false;

}

}
</script>


  

    <div class="row register-form">
        <div class="col-md-8 offset-md-2">
            
                
                <form class="custom-form" style="color: rgb(100,109,230);" action="adminlogin.php" name="form" onsubmit="return validateForm();" method="post">
                <h2 style="color:black;">Admin</h2>
                <br><br>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="email-input-field">Email </label></div>
                    <div class="col-sm-6 input-column"><input name="email" id="email" class="form-control" type="email"><span id="uerror"></span></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="pawssword-input-field">Password </label></div>
                    <div class="col-sm-6 input-column"><input name="password" id="password" class="form-control" type="password"><span id="perror"></span></div>
                </div><input type="submit" style="background-color: rgb(0,16,33);" class="btn btn-light submit-button" value="Login"><a style="color: rgb(0,16,33);" href="adminpassnew.php">forgot password?</a></form>
        </div>
    </div>
    <div class="footer-dark" style="background-color: rgb(0,16,33);">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <ul>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text"></div>
                </div>
                <p class="copyright" style="color: rgb(255,255,255);opacity: 1;">Hand2Hand © 2020</p>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
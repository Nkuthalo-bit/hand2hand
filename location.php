
<?php

$connect=mysqli_connect("localhost","root","","hand2hand");

$id=$_GET['edt'];


$qry=mysqli_query($connect,"select location.parcel_id as parcid from location
WHERE parcel_id='$id'");

$data=mysqli_fetch_array($qry);


if($data['parcid'] == $id)
  {
    echo '<script>alert(" parcel location info already added.");window.location = "parceldb.php";</script>';

    exit;
    

}else
  {

    if(isset($_POST['Update']))
    {
        
        
        $loc=$_POST['loc'];
        $link=$_POST['link'];
        $address=$_POST['address'];
        
       
    
      
    
    $command="insert into location (parcel_id,shipper_id,pick_up_location,pick_up_link,destination)
    values ('$id','0','$loc','$link','$address')";
    
    $edit=mysqli_query($connect,$command);  
     
    
    if($edit){
    mysqli_close($connect);
    
    echo '<script>alert(" parcel info updated");window.location = "parceldb.php";</script>';
    
    exit;
    
    }
    
    }



  }

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
<script>

    
    function validateForm() 
    {
  var nerror=document.getElementById("nerror");
  var serror=document.getElementById("serror");
  var linkerror=document.getElementById("linkerror");
  
 

  if(document.forms["form"]["address"].value==""&&
     document.forms["form"]["loc"].value==""&&
     document.forms["form"]["link"].value==""
    
     )
  {

    nerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
    serror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
    linkerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
   
    
    return false;
    

  }else
  {
  //name 
   var name=document.forms["form"]["loc"].value;
   

   if(name=="")
   {

       nerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
      return false;
  
   }else if(!name.match(/[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/))
   {
    nerror.innerHTML="<span style='color:red;''>"+" field should contain alphabetical characters.*</span>";
    return false;

   }else
   {

    nerror.innerHTML=""; 
   }

   //map link


var findme=document.forms["form"]["link"].value;
   
     
   if(findme.substring(0,22)!="https://www.google.com" && findme.substring(0,24)!="https://www.google.co.za")
       {
     
           linkerror.innerHTML="<span style='color:red;''>"+" Error link.*</span>";
       return false;
   
       }else
      {
   
       linkerror.innerHTML="";  
      }
   
//surname

var surname=document.forms["form"]["address"].value;
   

   if(surname=="")
   {

       serror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
      return false;
  
   }
   else if(!surname.match(/[a-zA-Z0-9\s\,\''\-]*$/))
   {
    serror.innerHTML="<span style='color:red;''>"+" field should contain alphabetical characters.*</span>";
    return false;

   }else
   {

    serror.innerHTML="";  
   }

   }
}
  </script>
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
    

    <div class="row register-form">
        <div class="col-md-8 offset-md-2">
            <form action="" class="custom-form" name="form" onsubmit="return validateForm();" method="post">

                <h2>&nbsp;Insert parcel location</h2>
                <br><br>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Pick Up Location</label></div>
                    <div class="col-sm-6 input-column"><input value="" name="loc" id="loc" class="form-control" type="text" ><span id="nerror"></span></div>
                </div>

                <div class="form-row form-group">

                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Pick Up Location Link</label></div>
                    <div class="col-sm-6 input-column"><input value="" name="link" id="link" class="form-control" type="text" ><span id="linkerror"></span>
                    <br>
                    <p class="border-white" style="font-size: 11px;color: rgb(255,0,0);">NB:Paste the link here.</p>
                </div>
                    
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Destination</label></div>
                    <div class="col-sm-6 input-column"><textarea class="form-control" name="address" id="address" style="height: 90px;"></textarea><span id="serror"></span><br><p class="border-white" style="font-size: 11px;color: rgb(255,0,0);">*street name and Street Address</p>
</div>
                               </div>
               
               
                <input name="Update" type="submit" class="btn btn-light submit-button" style="background-color: rgb(0,16,33);" value="Update">
                <a href="custprofile.php" ><input type="button" class="btn btn-light submit-button" style="background-color: rgb(0,16,33);" value="Cancel"></a>
                
            </form>
        </div>
    </div>
   




    <div class="footer-dark" style="background-color: rgb(0,16,33);">
        <footer>
            <div class="container">
                
                    
                <p class="copyright" style="color: rgb(255,255,255);opacity: 1;">Hand2Hand © 2020</p>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
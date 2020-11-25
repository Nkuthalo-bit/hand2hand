<?php

$connect=mysqli_connect("localhost","root","","hand2hand");

$id=$_GET['edt'];


$qry=mysqli_query($connect,"select payment.parcel_id as parcid from payment
WHERE parcel_id='$id'");

$data=mysqli_fetch_array($qry);


if($data['parcid'] == $id)
  {
    echo '<script>alert(" parcel paid already.");window.location = "parceldb.php";</script>';

    exit;
    

}else
  {

    if(isset($_POST['Update']))
    {
        
        
        $paytype=$_POST['pay_type'];
        $amount=$_POST['amount'];
        //$address=$_POST['address'];
        
       
    
      
    
    $command="insert into payment (parcel_id,payment_type,amount)
                           values ('$id','$paytype','$amount')";
    
    $edit=mysqli_query($connect,$command);  
     
    
    if($edit){
    mysqli_close($connect);
    
    echo '<script>alert(" parcel payment successful");window.location = "parceldb.php";</script>';
    
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

                <h2>&nbsp;Payment Form</h2>
                <br><br>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">payment Type</label></div>
                    <div class="col-sm-6 input-column">
                    <select class="form-control" name="pay_type">
                    <option value="Cash">Cash</option>
                    </select>
                    
                    
                    </div>
                </div>

                <div class="form-row form-group">

                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Amount</label></div>
                    <div class="col-sm-6 input-column"><input value="" name="amount" id="amount" class="form-control" type="Number" min="1" step="0.01"  ><span id="linkerror"></span>
                    <br>
                   
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
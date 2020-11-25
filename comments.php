<?php

$connect=mysqli_connect("localhost","root","","hand2hand");

$id=$_GET['edt'];


$qry=mysqli_query($connect,"select customer.surname as surname,customer.name as name,customer.id_number as idno ,customer.email as email,customer.phone_number as cellno from customer 
WHERE customer_id='$id'");

$data=mysqli_fetch_array($qry);

if(isset($_POST['Update']))
{

    
  
    $name=$_POST['name'];
   
  

  
$command="insert into complaints (customer_id,message)
values ('$id','$name')";


$edit=mysqli_query($connect,$command);    

if($edit){
mysqli_close($connect);

echo '<script>alert(" complain sent.");window.location = "custprofile.php";</script>';

exit;

}

}


?>






<!DOCTYPE html>
<html>




<script>

    
    function validateForm() 
    {
  
  var serror=document.getElementById("serror");
 

  if(
     document.forms["form"]["name"].value==""
     
     )
  {

   
    serror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
    
    
    return false;
    

  }else
  {
 
//surname

var surname=document.forms["form"]["name"].value;
   

   if(surname=="")
   {

       serror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
      return false;
  
   }
   else if(!surname.match(/[a-zA-Z ]$/))
   {
    serror.innerHTML="<span style='color:red;''>"+" field should contain alphabetical characters.*</span>";
    return false;

   }else
   {

    serror.innerHTML="";  
   }


//cellno
   var cellno=document.forms["form"]["cellno"].value;
 
  if(cellno=="")
   {

       cerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
      return false;
  
   }
   else if(cellno.substring(0,1)!="0")
    {
 

 cerror.innerHTML="<span style='color:red;''>"+" Cell number must start with 0.*</span>";
 return false;
 }
 else
 if(!cellno.match(/^[0-9]+$/))
 {

 cerror.innerHTML="<span style='color:red;''>"+"field should be filled with number only.*</span>";
 return false;   
 }
 else
 if(cellno.toString().length!=10)
 {
    cerror.innerHTML="<span style='color:red;''>"+"field should be 10 characters.*</span>";    

 return false;   
 }
else
{
    cerror.innerHTML="";

}

//idnumber

var Idno=document.forms["form"]["idno"].value;
if(Idno=="")
{

  ierror.innerHTML="<span style='color:red;''>"+" field should not be empty. *</span>"
return false;

}else
if(Idno.toString().length!=13)
{

ierror.innerHTML="<span style='color:red;''>"+" Please check your Id number length,it should be 13. *</span>"
return false;

}
else 
if(!Idno.match(/^[0-9]+$/))
{

ierror.innerHTML="<span style='color:red;''>"+" Id number field should be filled with number only. *</span>"
return false;  
}
//addtional
var cit=Idno.slice(10,11);
   if(cit!="0")
   {
 
   ierror.innerHTML="<span style='color:red;''>"+" Invalid Id Number. *</span>"
return false;    
   }

var cite=Idno.slice(11,12);
   if(cite!="8")
   {
    ierror.innerHTML="<span style='color:red;''>"+" Invalid Id Number. *</span>"
return false;    
   }  
  else
{
  ierror.innerHTML="";

}

//email

   var email=document.forms["form"]["email"].value;
  
   if(email=="")
   {

       error.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
      return false;
  
   }
  else
  if(!((email.indexOf(".") > 0) && (email.indexOf("@") > 0)) ||/[^a-zA-Z0-9.@_-]/.test(email))
   {
    error.innerHTML="<span style='color:red;''>"+" Invalid email.*</span>";
   
    return false;
   }
  else
   {
   error.innerHTML="";
   }

   //
    var passd=document.forms["form"]["password"].value;
    var cpassd=document.forms["form"]["cpwd"].value;
   
   
   
   
   var cerrormessage=document.getElementById("cerrorpass");
   var pass=document.getElementById("password").value;

   if(pass=="")
   {

       errormessage.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
      return false;
  
   }else
   {
    errormessage.innerHTML="";
   }
  //contain atleast 1 lowercase

  if(!pass.match(/^(?=.*[a-z])/))
  {
      errormessage.innerHTML="<span style='color:red;''>"+" Password should contain atleast 1 lowercase alphabetical character.*</span>";
  return false;
    }
    else
   {
    errormessage.innerHTML="";
   }
//contain atleast 1 uppercase
   if(!pass.match(/^(?=.*[A-Z])/))
  {
      errormessage.innerHTML="<span style='color:red;''>"+" Password should contain atleast 1 uppercase alphabetical character.*</span>";
  return false;
    }
    else
   {
    errormessage.innerHTML="";
   }
//contain atleast 1 numeric
if(!pass.match(/^(?=.*[0-9])/))
  {
      errormessage.innerHTML="<span style='color:red;''>"+" Password should contain atleast 1 numeric character.*</span>"
  return false;
    }
    else
   {
    errormessage.innerHTML="";
   }
//contain special character
if(!pass.match(/^(?=.*[!@#\$%\^&\*])/))
  {
      errormessage.innerHTML="<span style='color:red;''>"+" Password should contain special character.*</span>";
  return false;
    }
    else
   {
    errormessage.innerHTML="";
   }
   //contain 8 or more characters
if(!pass.match(/^(?=.{8,})/))
  {
      errormessage.innerHTML="<span style='color:red;''>"+" Password shouldcontain 8 or more characters.*</span>";
  return false;
    }
    else
   {
    errormessage.innerHTML="";
   }
   //confirm password
//step 1
if(cpassd==""){

cerrormessage.innerHTML="<span style='color:red;''>"+" confirm Password.*</span>";
return false;   
}else
{

cerrormessage.innerHTML="";
}




   if(cpassd!=passd){

    errormessage.innerHTML="<span style='color:red;''>"+" Password doesnt match.*</span>"
    cerrormessage.innerHTML="<span style='color:red;''>"+" Password doesnt match.*</span>"
    return false;   
   }else
   {
    errormessage.innerHTML=""
    cerrormessage.innerHTML=""
   }
  }
   }
  </script>


<body>
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


    <div class="row register-form">
        <div class="col-md-8 offset-md-2">
            <form action="" class="custom-form" name="form" onsubmit="return validateForm();" method="post">

                <h2>&nbsp;Send Your Complain</h2>
                <br><br>
                

                
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Message </label></div>
                    <div class="col-sm-6 input-column"><textarea rows="10" col="5" class="form-control" name="name" id="name"></textarea><span id="serror"></span></div>
                    
                </div>
             
               
                <input name="Update" type="submit" class="btn btn-light submit-button" style="background-color: rgb(0,16,33);" value="Update">
                <a href="custprofile.php" ><input type="button" style="background-color: rgb(0,16,33);" class="btn btn-light submit-button" value="Exit"></a>
                
            </form>
        </div>
    </div>
   
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Bold-BS4-Jumbotron-with-Particles-js.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>

</html>
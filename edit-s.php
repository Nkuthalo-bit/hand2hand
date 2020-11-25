<?php

$connect=mysqli_connect("localhost","root","","hand2hand");

$id=$_GET['edt'];


$qry=mysqli_query($connect,"select shipper.surname as surname,shipper.name as name,shipper.id_number as idno ,shipper.email as email,shipper.phone_number as cellno from shipper 
WHERE shipper_id='$id'");

$data=mysqli_fetch_array($qry);

if(isset($_POST['Update']))
{

    
    $surname=$_POST['surname'];
    $name=$_POST['name'];
  //  $idno=$_POST['idno'];
    //$email=$_POST['email'];
    $cellno=$_POST['cellno'];

  
$command="UPDATE  shipper
 SET 
 surname='$surname',name='$name',phone_number='$cellno' 
 WHERE shipper_id='$id'";


$edit=mysqli_query($connect,$command);    

if($edit){
mysqli_close($connect);

echo '<script>alert("Information Updated.");window.location = "shipper prev.php";</script>';

exit;

}
else
{
    //echo mysqli_error();

}
}


?>






<!DOCTYPE html>
<html>

   

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>comride</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/line-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/best-carousel-slide.css">
    <link rel="stylesheet" href="assets/css/Bold-BS4-Footer-Big-Logo.css">
    <link rel="stylesheet" href="assets/css/Bold-BS4-Jumbotron-with-Particles-js-1.css">
    <link rel="stylesheet" href="assets/css/Bold-BS4-Jumbotron-with-Particles-js.css">
    <link rel="stylesheet" href="assets/css/Community-ChatComments.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">
   
</head>


<script>

    
    function validateForm() 
    {
  var nerror=document.getElementById("nerror");
  var serror=document.getElementById("serror");
  var cerror=document.getElementById("cerror");
  var error=document.getElementById("error");
  var errormessage=document.getElementById("errorpass");
  var ierror=document.getElementById("ierror");

  if(document.forms["form"]["name"].value==""&&
     document.forms["form"]["surname"].value==""&&
     document.forms["form"]["cellno"].value==""&&
     document.forms["form"]["idno"].value==""&&
     document.forms["form"]["email"].value==""&&
     document.forms["form"]["password"].value=="")
  {

    nerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
    serror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
    cerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
    error.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
    ierror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
    errormessage.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
    
    return false;
    

  }else
  {
  //name 
   var name=document.forms["form"]["name"].value;
   

   if(name=="")
   {

       nerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
      return false;
  
   }else if(!name.match(/^[a-zA-Z]*$/))
   {
    nerror.innerHTML="<span style='color:red;''>"+" field should contain alphabetical characters.*</span>";
    return false;

   }else
   {

    nerror.innerHTML=""; 
   }
//surname

var surname=document.forms["form"]["surname"].value;
   

   if(surname=="")
   {

       serror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
      return false;
  
   }
   else if(!surname.match(/[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/))
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
 else if(cellno.substring(0,3)!='071'&& cellno.substring(0,3)!='072'&&
       cellno.substring(0,3)!='073'&& cellno.substring(0,3)!='074'&&
       cellno.substring(0,3)!='079'&&
       cellno.substring(0,3)!='076'&& cellno.substring(0,3)!='060'&&
       cellno.substring(0,3)!='061'&& cellno.substring(0,3)!='062'&&
       cellno.substring(0,3)!='063'&& cellno.substring(0,3)!='064'&&
       cellno.substring(0,3)!='065'&& cellno.substring(0,3)!='066'&&
       cellno.substring(0,3)!='067'&& cellno.substring(0,3)!='068'&&
       cellno.substring(0,3)!='081'&& cellno.substring(0,3)!='082'&&
       cellno.substring(0,3)!='083'&& cellno.substring(0,3)!='084')
       {

     cerror.innerHTML="<span style='color:red;''>"+" Surfix of phone number invalid. *</span>"
        return false;
       
    }else
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


<body><nav class="navbar navbar-light navbar-expand-md navigation-clean" style="background-color: rgb(0,16,33);">
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
                                class="dropdown-item" role="presentation" href="loginShipper.php" style="color: rgb(0,0,0);"><i class="fa fa-motorcycle"></i>&nbsp;Login Shipper</a><a class="dropdown-item" role="presentation" href="shipper.php" style="color: rgb(0,0,0);"><i class="fa fa-cart-arrow-down"></i>&nbsp;Register shipper&nbsp;</a><a class="dropdown-item"
                                    role="presentation" href="loginshipper.php" style="color: rgb(0,0,0);"><i class="fa fa-cart-arrow-down"></i>&nbsp;Login shipper&nbsp;</a></div>
                    </li>
                </ul>
        </div>
        </div>
    </nav>
   


    <div class="row register-form">
        <div class="col-md-8 offset-md-2">
            <form action="" class="custom-form" name="form" onsubmit="return validateForm();" method="post">

                <h2>&nbsp;Update shipper Details</h2>
                <br><br>
                

                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Name </label></div>
                    <div class="col-sm-6 input-column"><input value="<?php echo $data['name']?>" name="name" id="name" class="form-control" type="text"><span id="nerror"></span></div>
                    
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Surname</label></div>
                    <div class="col-sm-6 input-column"><input value="<?php echo $data['surname']?>" name="surname" id="surname" class="form-control" type="text"><span id="serror"></span></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Id Number&nbsp;</label></div>
                    <div class="col-sm-6 input-column"><p class="form-control"><?php echo $data['idno']?></p></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Phone Number</label></div>
                    <div class="col-sm-6 input-column"><input value="<?php echo $data['cellno']?>" name="cellno" id="cellno" class="form-control" type="text"><span id="cerror"></span></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="email-input-field">Email </label></div>
                    <div class="col-sm-6 input-column"><p class="form-control"><?php echo $data['email']?></p></div>
                </div>
                <input name="Update" type="submit" style="background-color: rgb(0,16,33);" class="btn btn-light submit-button" value="Update">
                <a href="shipper prev.php" ><input style="background-color: rgb(0,16,33);" type="button" class="btn btn-light submit-button" value="Cancel"></a>
                
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
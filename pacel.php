
<?php

$connect=mysqli_connect("localhost","root","","hand2hand");

$id=$_GET['edt'];


$qry=mysqli_query($connect,"select customer.surname as surname,customer.name as name,customer.id_number as idno,customer.email as email,customer.phone_number as cellno from customer 
WHERE customer_id='$id'");

$data=mysqli_fetch_array($qry);

if(isset($_POST['Update']))
{
    
    
$allow=array('jpg');
$temp=explode(".",$_FILES['pic']['name']);
$extension=end($temp);
$upload_file=$_FILES['pic']['name'];
move_uploaded_file($_FILES['pic']['tmp_name'],"parcels/".$_FILES['pic']['name']);

//$qry=mysqli_query($con,"Insert into `pdf`(`file`) VALUES('".$upload_file."')");

    
    $name=$_POST['name'];
    $desc=$_POST['desc'];
    $weight=$_POST['weight'];
    //$loc=$_POST['loc'];
    //$link=$_POST['link'];
    //$address=$_POST['address'];
    //$idno=$_POST['idno'];
   $doc="$upload_file";


    
    $query="select * from parcel where customer_id='$id'";
    
    $result=mysqli_query($connect,$query) or die(mysqli_error($conn));
    
    $row=mysqli_fetch_array($result);
    
    
    if($row['parcel_name']==$name &&  $row['picture']==$doc)
    {
    
    
      echo '<script type="text/javascript">alert("The item already exist."); window.location = "custprofile.php";</script>';
      exit;
     
    }                         
    else{

  
$command="insert into parcel (customer_id,parcel_name,picture,parcel_desc,parcel_weight,del,delivered_stat)
values ('$id','$name','".$upload_file."','$desc','$weight','1','0')";

//$command2="insert into location (parcel_id,pick_up_location,pick_up_link,destination)
//values ('$id','$name','$loc','$link',$address')";

$edit=mysqli_query($connect,$command);  
//$edit2=mysqli_query($connect,$command2);  

if($edit){
mysqli_close($connect);

echo '<script>alert(" parcel info updated");window.location = "custprofile.php";</script>';

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
  var cerror=document.getElementById("cerror");
  var error=document.getElementById("error");
  var errormessage=document.getElementById("errorpass");
  var ierror=document.getElementById("ierror");

  if(document.forms["form"]["name"].value==""&&
     document.forms["form"]["desc"].value==""
     )
  {

    nerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
    serror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
   
    return false;
    

  }else
  {
  //name 
   var name=document.forms["form"]["name"].value;
   

   if(name=="")
   {

       nerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
      return false;
  
   }else if(!name.match(/[a-zA-Z ][a-zA-Z ]+[a-zA-Z]$/))
   {
    nerror.innerHTML="<span style='color:red;''>"+" field should contain alphabetical characters.*</span>";
    return false;

   }else
   {

    nerror.innerHTML=""; 
   }
//surname

var surname=document.forms["form"]["desc"].value;
   

   if(surname=="")
   {

       serror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
      return false;
  
   }
   else if(!surname.match(/[a-zA-Z ][a-zA-Z ]+[a-zA-Z]$/))
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
            <form class="custom-form" action="" class="custom-form" name="form"  enctype="multipart/form-data" onsubmit="return validateForm();" method="post">
                <h2 class="border-white">Pacel Form</h2>
                <br><br>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Pacel Name&nbsp;</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" name="name" id="name" type="text" ><span id="nerror"></span></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Pacel Description&nbsp;</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="desc" id="desc"><span id="serror"></span></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Pacel Weight</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="number" min="0" step="0.1" name="weight" id="weight" required></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Pacel Picture</label></div>
                    <div class="col-sm-6 input-column"><input type="file" accept="image/x-png,image/jpeg,image/jpg" name="pic" id="pic" required></div>
                </div>
                
                <input name="Update" type="submit" class="btn btn-light submit-button" style="background-color: rgb(0,16,33);" value="Update">
                
                
                
            </form>
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
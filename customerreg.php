<?php
  
  //connection
  $conn = mysqli_connect("localhost","root","","hand2hand");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$name=$_POST['name'];
$surname=$_POST['surname'];
$idno=$_POST['idno'];
$gender=$_POST['gender'];
$cellno=$_POST['cellno'];
$email=$_POST['email'];
$default_stat='1';
$password=md5($_POST['password']);


$query="select * from customer where email='$email'";

$result=mysqli_query($conn,$query) or die(mysqli_error($conn));

$row=mysqli_fetch_array($result);

if($row['email']==$email)
{


  echo '<script type="text/javascript">alert("Email Account exist Please login"); window.location = "loginCustomer.php";</script>';
 
}                         
else{

$sql="insert into customer(surname,name,id_number,gender,phone_number,email,password,account_status)
                     values ('$surname','$name','$idno','$gender','$cellno','$email','$password','$default_stat')";

             if(mysqli_query($conn,$sql))
             {
     
       echo '<script type="text/javascript">alert("You Succesfully Registered Please Login Your Account"); window.location = "loginCustomer.php";</script>';
          
                                                          
           }
           else{
             
            die("<h3>unsuccessfully not registered </h3>".mysqli_error($conn));
          
          }
        }
      
    
?>
    
    
    
    
<?php



if(isset($_POST['email']) && isset($_POST['cellno']) &&isset($_POST['password'])){
 //Assign
 $cellno=$_POST['cellno'];
$email=$_POST['email'];
$password=md5($_POST['password']);
//check record
$connect=mysqli_connect("localhost","root","","hand2hand");

$query="select * from customer where email='$email'and phone_number='$cellno'";

$result=mysqli_query($connect,$query) or die(mysqli_error($connect));


$row=mysqli_fetch_array($result);


if($row['email']==$email && $row['phone_number']==$cellno)
{
     

    $command="UPDATE  customer SET password='$password'
    WHERE customer.email='$email'";
    
    
    $edit=mysqli_query($connect,$command);    
    
    if($edit){
    mysqli_close($connect);
    
    echo '<script>alert("Information password Updated.");window.location = "loginCustomer.php";</script>';
    
    exit;
    
    }
    else
    {
        echo mysqli_error();
    
    }
  
   
    
   

}else
{

    echo'<script>alert("Make sure your email and cell number is correct.")</script>';
     
    //header("Location:customer.php");  
    require 'recovercustomerpass.php'; 
  
}

}

?>
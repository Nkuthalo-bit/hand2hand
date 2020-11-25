<?php
 
if(isset($_POST['email']) && isset($_POST['password'])){
 //Assign
$email=$_POST['email'];
$password=md5($_POST['password']);
//check record
$connect=mysqli_connect("localhost","root","","hand2hand");

$query="select * from customer where email='$email'and password='$password'";

$result=mysqli_query($connect,$query) or die(mysqli_error($connect));


$row=mysqli_fetch_array($result);

$active='1';
$inactive='0';

if($row['email']==$email && $row['password']==$password && $row['account_status']==$active)
{
    echo'<script>alert("Login was successful.")</script>';
    
    session_start();

     $_SESSION['customer_id']=$row['customer_id'];
     $_SESSION['email']=$row['email'];
     
     header("Location:custprofile.php");


}else
if($row['email']==$email && $row['password']==$password && $row['account_status']==$inactive)
{
    echo'<script>alert("your account  is suspended.")</script>';

    require 'loginCustomer.php'; 


}else
{

    echo'<script>alert("Wrong password or email.")</script>';    
    require 'loginCustomer.php'; 

}

}

?>


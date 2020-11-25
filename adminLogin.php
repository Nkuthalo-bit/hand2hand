<?php
 
if(isset($_POST['email']) && isset($_POST['password'])){
 //Assign
$email=$_POST['email'];
$password=md5($_POST['password']);
//check record
session_start();
$connect=mysqli_connect("localhost","root","","hand2hand");

$query="select * from admin where email='$email'and password='$password'";

$result=mysqli_query($connect,$query) or die(mysqli_error($connect));


$row=mysqli_fetch_array($result);


if($row['email']==$email && $row['password']==$password)
{ 
    
    
    $_SESSION['email']=$row['email'];
    $email=$_SESSION['email'];

    echo'<script>alert("Login was successful")</script>'; 
   
    require 'AdminView.php';

}else
{
 echo'<script>alert("Wrong email or password")</script>';    
 require 'Admin.php'; 
}

}

?>


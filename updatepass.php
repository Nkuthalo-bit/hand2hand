<?php



if(isset($_POST['email']) &&isset($_POST['password'])){
 //Assign
 //$cellno=$_POST['cellno'];
$email=$_POST['email'];
$password=md5($_POST['password']);
//check record
$connect=mysqli_connect("localhost","root","","hand2hand");

$query="select * from admin where email='$email'";

$result=mysqli_query($connect,$query) or die(mysqli_error($connect));


$row=mysqli_fetch_array($result);


if($row['email']==$email)
{
     

    $command="UPDATE  admin SET password='$password'
    WHERE admin.email='$email'";
    
    
    $edit=mysqli_query($connect,$command);    
    
    if($edit){
    mysqli_close($connect);
    
    echo '<script>alert("Information password Updated.");window.location = "Admin.php";</script>';
    
    exit;
    
    }
    else
    {
        echo mysqli_error();
    
    }
  
   
    
   

}else
{

    echo'<script>alert("Make sure your email  is correct.")</script>';
     
    //header("Location:passenger.php");  
    require 'adminpassnew.php'; 
  
}

}

?>
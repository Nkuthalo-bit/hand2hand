<?php

$connect=mysqli_connect("localhost","root","","hand2hand");

$id=$_GET['edt'];



$qry=mysqli_query($connect,"select customer.account_status from customer WHERE customer_id='$id'");

$data=mysqli_fetch_array($qry);



$active='1';
$inactive='0';


if($data['account_status']==$active)
{


    echo '<script>alert("Account already active.");window.location = "customer prev.php";</script>';
    exit;

}else
{

$command="UPDATE  customer
 SET 
 account_status='$active'
 WHERE customer_id='$id'";


$edit=mysqli_query($connect,$command);
  

if($edit){
mysqli_close($connect);

echo '<script>alert("Account is activated.");window.location = "customer prev.php";</script>';

exit;

}
else
{
    echo mysqli_error();

}



}
  




?>

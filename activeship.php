<?php

$connect=mysqli_connect("localhost","root","","hand2hand");

$id=$_GET['edt'];



$qry=mysqli_query($connect,"select shipper.account_status from shipper WHERE shipper_id='$id'");

$data=mysqli_fetch_array($qry);



$active='1';
$inactive='0';


if($data['account_status']==$active)
{


    echo '<script>alert("Account already active.");window.location = "shipper prev.php";</script>';
    exit;

}else
{

$command="UPDATE  shipper
 SET 
 account_status='$active'
 WHERE shipper_id='$id'";


$edit=mysqli_query($connect,$command);
  

if($edit){
mysqli_close($connect);

echo '<script>alert("Account is activated.");window.location = "shipper prev.php";</script>';

exit;

}
else
{
    echo mysqli_error();

}



}
  




?>

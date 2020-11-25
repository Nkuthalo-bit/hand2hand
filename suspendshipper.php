<?php

$connect=mysqli_connect("localhost","root","","hand2hand");

$id=$_GET['edt'];



$qry=mysqli_query($connect,"select shipper.account_status from shipper WHERE shipper_id='$id'");

$data=mysqli_fetch_array($qry);



$active='1';
$inactive='0';


if($data['account_status']==$inactive)
{


    echo '<script>alert("Account already suspended.");window.location = "shipper prev.php";</script>';
    exit;

}else
{

$command="UPDATE  shipper
 SET 
 account_status='$inactive'
 WHERE shipper_id='$id'";


$edit=mysqli_query($connect,$command);
  

if($edit){
mysqli_close($connect);

echo '<script>alert("Account suspended.");window.location = "shipper prev.php";</script>';

exit;

}
else
{
    echo mysqli_error();

}



}
  




?>

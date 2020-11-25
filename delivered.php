<?php

$connect=mysqli_connect("localhost","root","","hand2hand");

$id=$_GET['edt'];

session_start();

$alert=$_SESSION['shipper_id'];


$qry=mysqli_query($connect,"select delivered_stat from parcel where parcel_id='$id'");

$data=mysqli_fetch_array($qry);


if($data['delivered_stat'] > 0)
{


    echo '<script>alert("parcel already delivered.");window.location = "accepted.php";</script>';
    exit;

}else
{

$command="UPDATE parcel
 SET 
 delivered_stat='1'
 WHERE parcel_id='$id'";


$edit=mysqli_query($connect,$command);
  

if($edit){
mysqli_close($connect);

echo '<script>alert("Parcel delivery successful .");window.location = "accepted.php";</script>';

exit;

}
else
{
    echo mysqli_error();

}



}
  



?>

<?php

$connect=mysqli_connect("localhost","root","","hand2hand");

$id=$_GET['edt'];

session_start();

$alert=$_SESSION['shipper_id'];
$email=$_SESSION['email'];



$qry=mysqli_query($connect,"select shipper_id from location where parcel_id='$id'");
$data=mysqli_fetch_array($qry);




$query="SELECT parcel.parcel_id as parcel_no,customer.surname as surname,customer.name as name,customer.email as mail,parcel.parcel_name as Parcel_name,parcel.picture as parcel_image,parcel.parcel_desc as Parcel_description,parcel.parcel_weight as Parcel_weight,parcel.time as posted_time,location.pick_up_location as Pick_up,location.destination as place,location.pick_up_link as link 
FROM customer,location,parcel
WHERE customer.customer_id=parcel.customer_id 
AND
parcel.parcel_id=location.parcel_id
AND
parcel.parcel_id='$id'
AND
parcel.del='1'
";

        
$result=mysqli_query($connect,$query);

$rows=mysqli_fetch_array($result);


if($rows['mail']==$email)
{

   
    echo '<script>alert("you cant accept your own parcel.");window.location = "parcel2ship.php";</script>';
    exit; 


}
else
{
    if($data['shipper_id'] > 0)
    {
    
    
        echo '<script>alert("parcel already taken.");window.location = "parcel2ship.php";</script>';
        exit;
    
    }else
    {
    
    $command="UPDATE location
     SET  
     shipper_id='$alert'
     WHERE parcel_id='$id'";
    
    
    $edit=mysqli_query($connect,$command);
      
    
    if($edit){
    mysqli_close($connect);
    
    echo '<script>alert("Parcel accepted .");window.location = "parcel2ship.php";</script>';
    
    exit;
    
    }
    else
    {
        echo mysqli_error();
    
    }
    
    
    
    }

    
}  



?>

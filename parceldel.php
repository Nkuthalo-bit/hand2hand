<?php

session_start();

$conn=mysqli_connect("localhost","root","","hand2hand");

$id=$_GET['edt'];

     $inactive='0';
     
    $sql2="DELETE FROM parcel WHERE parcel_id= '$id'";

    $sql3="DELETE FROM location WHERE parcel_id= '$id'";

    
    $result2=mysqli_query($conn,$sql2);
    $result3=mysqli_query($conn,$sql3);


    if (!$result2 && !$result3) {
    	echo "db access denied ".mysqli_error();
    }else{
      echo '<script>alert("Post parcel deleted.");window.location = "parceldb.php";</script>';
      exit;
  }
  

//echo ($id);




?>

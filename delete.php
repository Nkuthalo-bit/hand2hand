<?php

$conn=mysqli_connect("localhost","root","","hand2hand");

$id=$_GET['edt'];


    $sql2="DELETE From customer WHERE customer_id= '$id'";

   
    $result2=mysqli_query($conn,$sql2);


    if (!$result2) {
    	echo "db access denied ".mysqli_error();
    }else{
      echo '<script>alert("Account deleted.");window.location = "customer prev.php";</script>';
      exit;
  }
  

//echo ($id);




?>

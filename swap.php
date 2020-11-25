<?php
  
  //connection
  $conn = mysqli_connect("localhost","root","","hand2hand");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

/**/

$id=$_GET['edt'];


$query="SELECT shipper.shipper_id as id,shipper.surname as surname,shipper.name as name,shipper.email as email,
shipper.phone_number as cellno,shipper.id_number as idno,shipper.gender as gender,shipper.password as password
FROM   shipper 
WHERE  shipper.shipper_id='$id' ";

$result=mysqli_query($conn,$query);
              
$rows=mysqli_num_rows($result);



if ($rows>0) {
  
while ($rows=mysqli_fetch_array($result)) {




$name=$rows['name'];
$surname=$rows['surname'];
$idno=$rows['idno'];
$gender=$rows['gender'];
$cellno=$rows['cellno'];
$email=$rows['email'];
$password=$rows['password'];
$default_stat='1';
  
  
  }



}else{
  
    echo"<h3>No record(s)</h3>";
  
} 


$query="select * from customer where email='$email'";

$result=mysqli_query($conn,$query) or die(mysqli_error($conn));

$row=mysqli_fetch_array($result);

if($row['email']==$email)
{



  $command="UPDATE  customer SET surname='$surname',name='$name',id_number='$idno',gender='$gender',phone_number='$cellno',email='$email',password='$password',account_status='$default_stat'
  WHERE customer.email='$email'";
  
  
  $edit=mysqli_query($conn,$command);    
  
  if($edit){
  mysqli_close($conn);

  echo '<script type="text/javascript">alert("Welcome to customer page."); window.location = "custprofile.php";</script>';
  exit;
  
  }
  else
  {
      echo mysqli_error();
  
  }



 
}                         
else{

$sql="insert into customer(surname,name,id_number,gender,phone_number,email,password,account_status)
                     values ('$surname','$name','$idno','$gender','$cellno','$email','$password','$default_stat')";

             if(mysqli_query($conn,$sql))
             {
     
       echo '<script type="text/javascript">alert("Account switched dynamically"); window.location = "custprofile.php";</script>';
          
                                                          
           }
           else{
             
            die("<h3>unsuccessfully not registered </h3>".mysqli_error($conn));
          
          }
        }
      
    
?>
    
    
    
    
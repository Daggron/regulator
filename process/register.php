<?php
 $name=$_REQUEST['name'];
 $email=$_REQUEST['r_email'];
 $mob=$_REQUEST['mob'];
 $pass=$_REQUEST['pass'];
 include_once "connection.php";
 $query = "SELECT * FROM user";
 $result = mysqli_query($con,$query);
while($row = mysqli_fetch_object($result)){
    $match=0;
    if(($row->email==$email)||($row->mobile==$mob)){
    $match=1;
    break;
    }
}
if($match){

     header("Location:../index.php?error=uae");
}
else{
     $query1 = "INSERT INTO user (name, email, mobile, password) VALUES ('$name','$email','$mob','$pass')";
     $result1 = mysqli_query($con,$query1);
     if($result1>0){ 
         header("Location:../index.php?msg=success");
     }
     else{
         header("Location:../index.php?error=unsuccess");
     }
}
?>
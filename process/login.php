<?php
$email = $_REQUEST['email_l'];
$pass = $_REQUEST['password'];
include_once "connection.php";
$query = "SELECT * FROM user"; 
$result = mysqli_query($con,$query);
$user="not_found";
while($row = mysqli_fetch_object($result)){
    $user="not_found";
    if($row->email==$email){
        $user="found";
        break;
    }

}

$match="do_not_match";
    if(($row->email==$email) && ($row->password==$pass)){
    $match="match";
    }
if($user=="not_found"){
    header("Location:../index.php?error=une");
}
elseif($match=="do_not_match"){
    header("Location:../index.php?error=dnm");
    }
else{
    session_start();
     $_SESSION['login']=1;
     $_SESSION['token']=$row->name;
     
    header("Location:../homepage.php");
}


    
?>
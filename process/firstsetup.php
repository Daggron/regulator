<?php 
session_start();

$name=$_SESSION['token'];
date_default_timezone_set('Asia/Kolkata');
include_once "connection.php";
$yesday = date("Y-m-d",strtotime("-1 days"));
$nosubject = $_REQUEST['noSubjects'];
$cd = $_REQUEST['cd'];
$cd = date('Y-m-d', strtotime($cd));
$subname =  $_REQUEST['subjectname'];
$uniqid=uniqid('user_');
$_SESSION['uid']=$uniqid;
$today = date("Y_m_d",strtotime("now"));
$editQuery = "UPDATE user SET cd='$cd', uniqid='$uniqid', lastUpdate='$yesday' WHERE name='$name';";
$createTable = "CREATE TABLE ".$uniqid." ( subjectName VARCHAR(30) NOT NULL, minPercentage INT(3) NOT NULL,  totalLec INT(200)  NOT NULL, lecDay VARCHAR(255) NOT NULL, atndLec INT(200) NOT NULL";

$endDate = date('Y-m-d', strtotime("+6 months", strtotime($cd)));
$dateadd = date('Y-m-d', strtotime($cd));
$underscore = date('Y_m_d', strtotime($cd));

while($dateadd < $endDate){
   
   $createTable = $createTable.", date_".$underscore." VARCHAR(10) NOT NULL";
   $dateadd = strtotime('+1 day',strtotime($dateadd));
   $dateadd = date('Y-m-d',$dateadd);
   $underscore = date('Y_m_d', strtotime($dateadd));
}
$createTable=$createTable." )";
$combQuery = $editQuery.$createTable;
$doQuery = mysqli_multi_query($con,$combQuery);

if($doQuery>0){
    
     $con->next_result();
$percent;
$dateColumns;
$i=1;
$sum;
$ones;
$subInsertion="";
    $check;
foreach($subname as $subject){
    $percent[$i]=$_REQUEST['percent'.$i];
    $temp="s".$i."day";
    $days="day".$i;
    $$days='0';
    for($j=1;$j<7;$j++){
    if(isset($_REQUEST[$temp.$j])){
        $$days=$$days."||".$_REQUEST[$temp.$j];
        }
    }
    $dateadd = date('Y-m-d', strtotime($cd));
    $underscore = date('Y_m_d', strtotime($cd));
    $dateColumns="";
    $sum=0;
    $ones="";
    $day=explode('||',$$days);
    
    while($dateadd <= $yesday){
           $dateColumns = $dateColumns.", date_".$underscore;
            $check= date('D', strtotime($dateadd));
        if (in_array($check,$day)){
            $ones=$ones.",'p'";
            $sum++;
        }
        else{
            $ones=$ones.",'n'";
        }
           $dateadd = strtotime('+1 day',strtotime($dateadd));
           $dateadd = date('Y-m-d',$dateadd);
           $underscore = date('Y_m_d', strtotime($dateadd));
            
        
            
    }
    $subInsertion=$subInsertion."INSERT INTO ".$uniqid." (subjectName, minPercentage, lecDay, totalLec, atndLec".$dateColumns.") VALUES ('$subject','$percent[$i]','".$$days."','$sum','$sum'".$ones." );";


    $i++;
}
    $doit=mysqli_multi_query($con,$subInsertion);
    if($doit>0){
         header("Location:../homepage.php");
    }
    else{
          header("Location:../firstpage.php?error=tryagain");
    }






}
else{
    header("Location:../firstpage.php?error=tryagain");
}


?>

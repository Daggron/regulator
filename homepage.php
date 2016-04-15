<?php

session_start();
date_default_timezone_set('Asia/Kolkata');

if(!isset($_SESSION['login'])){
    header("location:index.php");
}
else{
    $name=$_SESSION['token'];
    include_once "process/connection.php";
    $query="SELECT uniqid, lastupdate FROM user WHERE name='$name'";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_object($result);
    if(($row->uniqid=="")||($row->uniqid==NULL)){
        header("Location:firstpage.php");
    }
    else{
    $uniqid=$row->uniqid;
    $_SESSION['uniqid']=$uniqid;
    $subject="";
        $percent=0;
    $lastupdate=$row->lastupdate; 
    $dateadd = date('Y-m-d', strtotime($lastupdate));
    $dateadd = strtotime('+1 day',strtotime($dateadd));
    $dateadd = date('Y-m-d',$dateadd);
    $underscore = date('Y_m_d', strtotime($dateadd));
    $query="SELECT subjectName, lecDay FROM ".$row->uniqid;
    $result=mysqli_query($con,$query);
    $days;
    $yesday=date("Y-m-d", strtotime("-1 days",strtotime("now")));
    $atndUpdation="UPDATE ".$uniqid." SET ";    
    $updation_field="";
    $sum=0;
    $ones="";
        while($row=mysqli_fetch_object($result)){
            
                    $atndUpdation="UPDATE ".$uniqid." SET ";                       
                    $dateadd = date('Y-m-d', strtotime($lastupdate));
                    $underscore = date('Y_m_d', strtotime($lastupdate));
                    $day=$row->lecDay;
                    
                    $day=explode("||",$day);
                    if($dateadd != $yesday){
                            while($dateadd <= $yesday){
                                if($updation_field==""){
                                   $updation_field = $updation_field." date_".$underscore;
                                }
                                else{
                                    $updation_field = $updation_field.", date_".$underscore;
                                }
                                    $check= date('D', strtotime($dateadd));
                                if (in_array($check,$day)){
                                    $updation_field = $updation_field."='p'";
                                    $sum++;
                                }
                                else{
                                    $updation_field = $updation_field."='n'";
                                }
                                
                                   $dateadd = strtotime('+1 day',strtotime($dateadd));
                                   $dateadd = date('Y-m-d',$dateadd);
                                   $underscore = date('Y_m_d', strtotime($dateadd));


                            }
                    }
                            
                            $atndUpdation=$atndUpdation.$updation_field." WHERE subjectName='$row->subjectName'";
                            $atndquery=mysqli_query($con,$atndUpdation);
                            
            }
                
                $editQuery1 = "UPDATE user SET lastUpdate='$yesday' WHERE name='$name'";
                $doQuery=mysqli_query($con,$editQuery1);
        if($doQuery){
           header("Location:process/updaterecord.php");
        }
        else{
             header("Location:standard/index.php?error=q2");
        }
 
        }
    
}
?>
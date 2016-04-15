<?php

session_start();
date_default_timezone_set('Asia/Kolkata');

if(!isset($_SESSION['login'])){
    header("location:index.php");
}
else{
    $name=$_SESSION['token'];
    $uniqid=$_SESSION['uniqid'];
    include_once "../process/connection.php";
    if(isset($_GET['sub'])){
        $subject=$_GET['sub'];
    }
    else{
        header("Location:../standard/index.php");
    } 
    $today = date('Y_m_d', strtotime("now"));
    $today = "date_".$today;
    $query="SELECT subjectName, totalLec, lecDay, atndLec, ".$today." FROM ".$uniqid;
    $result=mysqli_query($con,$query);
    $day;
    $atndUpdation="";
    $updation_field=$today;
        while($row=mysqli_fetch_object($result)){
            $updation_field=$today;
            
            
                if($subject==$row->subjectName){
                    $atndUpdation="UPDATE ".$uniqid." SET ";                       
                    $day=$row->lecDay;
                    $day=explode("||",$day);
                    $check= date('D', strtotime("now"));
                       if (in_array($check,$day)){
                          $updation_field = $updation_field."='a_manual'";
                
                                }
                                else{
                                    $updation_field = $updation_field."='n'";
                                }
                                

                        $atndUpdation=$atndUpdation.$updation_field." WHERE subjectName='$row->subjectName'";
                    $atndquery=mysqli_query($con,$atndUpdation);
                }
            else{
                $atnd=$row->atndLec;
                $total=$row->totalLec;
                if(!substr($row->$today,2)=='manual'){
                $atndUpdation="UPDATE ".$uniqid." SET ";                       
                    $day=$row->lecDay;
                    $day=explode("||",$day);
                    $check= date('D', strtotime("now"));
                       if (in_array($check,$day)){
                          $updation_field = $updation_field."='p'";
                    
                                }
                                else{
                                    $updation_field = $updation_field."='n'";
                                }
                                

               $atndUpdation=$atndUpdation.$updation_field." WHERE subjectName='$row->subjectName'"; 
            $atndquery=mysqli_query($con,$atndUpdation);
            }

            }
        
        
        }    
   $today = date('Y-m-d', strtotime("now"));
                $editQuery1 = "UPDATE user SET lastUpdate='$today' WHERE uniqid='$uniqid'";
                $doQuery=mysqli_query($con,$editQuery1);
        if($doQuery){
            header("Location:updaterecord.php");
        }
        else{
             header("Location:updaterecord.php");
        }

 }
    

?>
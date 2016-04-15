<?php

session_start();

date_default_timezone_set('Asia/Kolkata');

include "connection.php";

$name=$_SESSION['token'];

$uniqid=$_SESSION['uniqid'];

$bringVar="SELECT cd, lastupdate FROM user WHERE uniqid='$uniqid'";
    
$bringThem=mysqli_query($con,$bringVar);

$nameDate;
    
$row1=mysqli_fetch_object($bringThem);
    
$cd=$row1->cd;
    
$lastupdate=$row1->lastupdate;
    
$cd=date('Y-m-d',strtotime($cd));
        
$lastupdate=date('Y-m-d',strtotime($lastupdate));

$dates="";

$finalQuery="";

$totalLec=0;

$atndLec=0;

$tempvar=$row1->cd;
            
while( $tempvar <= $lastupdate)
            
        {
            
           $nameDate="date_".date('Y_m_d',strtotime($tempvar));
            
           $tempvar = strtotime('+1 day',strtotime($tempvar));
    
           $tempvar = date('Y-m-d',$tempvar);
            
           $dates.= ", ".$nameDate;
            
            
        }

$subjectQuery="SELECT subjectName, lecDay".$dates." FROM ".$uniqid;

$calcAtnd=mysqli_query($con,$subjectQuery);

while($row=mysqli_fetch_object($calcAtnd))
    
    {
        $totalLec=0;

        $atndLec=0;
    
        $tempvar=$row1->cd;

        while( $tempvar <= $lastupdate)

                {

                   $nameDate="date_".date('Y_m_d',strtotime($tempvar));
                    
                   $nameDate=$row->$nameDate;
            
                    if($nameDate[0]=='p')
                        
                    {
                        
                        $totalLec++;
                        
                        $atndLec++;
                    
                    }
            
                    elseif($nameDate[0]=='a')
                        
                    {
                        
                        $totalLec++;
                        
                    }
            

                   $tempvar = strtotime('+1 day',strtotime($tempvar));

                   $tempvar = date('Y-m-d',$tempvar);


                }
        
         $finalQuery.="UPDATE ".$uniqid." SET totalLec=".$totalLec.", atndLec=".$atndLec." WHERE subjectName='$row->subjectName';";
         
    }
        
        
$endResult=mysqli_multi_query($con,$finalQuery);

if($endResult){
    
    header("Location:../standard/index.php");
    
}



?>

<?php 
$nosubject = $_REQUEST['noSubjects'];
$cd = $_REQUEST['cd'];
$subname =  $_REQUEST['subjectname'];
$i=1;
$percent;

foreach($subname as $subject){
 $percent[$i]=$_REQUEST['percent'.$i];
    $temp="s".$i."day";
    $days="day".$i;
    $$days='';
    for($j=1;$j<7;$j++){
        if(isset($_REQUEST[$temp.$j])){
        $$days=$$days.",".$_REQUEST[$temp.$j];
            }
    }
    echo $percent[$i].$$days."<br>";
        $i++;
}
?>
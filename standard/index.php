<?php

session_start();
date_default_timezone_set('Asia/Kolkata');

if(!isset($_SESSION['login'])){
    header("location:../index.php");
}
else{
    include_once "../process/connection.php";
    $name=$_SESSION['token'];
    $uniqid=$_SESSION['uniqid'];
    include_once "../process/connection.php";
    $fetchQuery="SELECT subjectName, minPercentage, totalLec, atndLec FROM ".$uniqid;
    $dofetchquery=mysqli_query($con,$fetchQuery);
    $subjectName;$minPer;$total;$atnd;$per;$comment;$diff;
    $count=0;
     while($row=mysqli_fetch_object($dofetchquery)){
         $subjectName[$count] = $row->subjectName;
         $minPer[$count] = $row->minPercentage;
         $total[$count] = $row->totalLec;
         $atnd[$count] = $row->atndLec;
         $count++;
     }

    $percentComment = array(   "fine"    =>"Dont Think too much, Have Fun.", 
                               "justfine"  =>"Very Close, Be Carefull !",
                               "equal"     =>"On the very edge.",
                               "justless"=>"Just some more classes, hufff!",
                               "less"  =>"Forget about missing classes."
                 
    );
    if($count==1){
        $bootstrapoption = "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 l-chart-wrap text-center'>";
    }
    elseif($count==2){
        $bootstrapoption = "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12 l-chart-wrap text-center'>";
    }
    elseif($count==3){
        $bootstrapoption = "<div class='col-lg-4 col-md-4 col-sm-6 col-xs-12 l-chart-wrap text-center'>";
    }
    else{
        $bootstrapoption = "<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12 l-chart-wrap text-center'>";
    }
    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SKYER | REGULATOR</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        
        <link rel="shortcut icon" href="img/favicon.ico">
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700' rel='stylesheet' type='text/css'>
        
        <script src="inc/js/jquery-1.11.0.min.js"></script>
                       
        <link rel="stylesheet" href="inc/bootstrap/css/bootstrap.min.css">

        <link rel="stylesheet" href="inc/bootstrap/css/bootstrap-theme.min.css">
        
        <link rel="stylesheet" href="inc/bootstrap/css/bootstrap-reset.css">
               
        <link rel="stylesheet" href="inc/flexslider/flexslider.css" type="text/css">        
               
        <link rel="stylesheet" type="text/css" href="inc/easy-pie-chart/demo/style.css">
                
        <link rel="stylesheet" href="inc/magnific/dist/magnific-popup.css"> 
       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">        
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/colors.css">
        

    </head>
    <body>
        
        <div class="page-loader"></div>
        
        <div class="l-wrapper">

            <header>
                
                <div class="splash-image-wrap" id="splash-image-wrap">
                    <div class="m-splash-image col-mg-12" id="splash-image" data-0="background-position:center 0px;" data-10000="background-position:center -2000px;">

                        <div class="flexslider flexslider-splash">
                            <ul class="slides">

                                <li class="slide-background">
                                    
                                    <div class="splash-wrap slider-background">

                                        <div class="splash-content">


                                            <div class="container">
                                                <div class="col-lg-9 div-centered">                                        
                                                    <div class="splash-centering" >
                                                        <h1>SKYER<br />REGULATOR</h1>

                                                        <div class="splash-text">
                                                            <i class="fa fa-power-off fa-spin fa-5x"></i>
                                                        </div>

                                                        <a href="#skills" class="btn second-btn">Check Attendance</a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </li>                              
                                
                            </ul>
                        </div>
                        



                    </div>
                    
                </div>
                
                <div class="clearfix"></div>
                
            </header>
            
            
            
            
            <div class="l-content-wrap" id="standard-content">
    
                <section>

                    <div class="l-skills-section l-section" id="skills">

                        <div class="container">

                            <h4 class="text-center">Attendance</h4>

                            <div class="m-heading-border"></div>  


                            <div class="row">

                                <!--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 l-chart-wrap text-center">
                                    <div class="chart" data-percent="76">
                                        <span class="percent"></span>
                                    </div>

                                    <h5>English</h5>
                                    <p>Very Close, Be Carefull !</p>
                                <div class="pro_button icon-circle icon-zoom">
                                    <a href="#"><i class="fa fa-history  fa-2x" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-coffee fa-2x"></i></a>
                                    <a href="#"><i class="fa fa-book fa-2x" aria-hidden="true"></i></a> 
                                
                                </div>
                                </div>-->
                 <?php
                            for($i=0;$i<$count;$i++){
                                echo $bootstrapoption;
                                $per=(($atnd[$i]/$total[$i])*100);
                                $diff= $minPer[$i] - $per;
                                $per="data-percent='$per'";
                                
                                if($diff>=10){ $comment=$percentComment['less']; }
                            elseif(($diff<10)&&($diff>0)){ $comment=$percentComment['justless']; }
                            elseif($diff==0){ $comment=$percentComment['equal']; }
                            elseif(($diff>-10)&&($diff<0)){ $comment=$percentComment['justfine']; }
                            elseif($diff<=-10){ $comment=$percentComment['fine']; }
                                ?>
                            <div class="chart"<?php echo $per; ?>>
                                        <span class="percent"></span>
                            </div>
                                <h5><?php echo $subjectName[$i]; ?></h5>
                               <p><?php echo $comment;  ?></p> 
                            <div class="pro_button icon-circle icon-zoom">
                                <?php  echo  "<a href='../process/applybunk.php?sub=".$subjectName[$i]."'>"?><i class="fa fa-coffee fa-2x"></i></a>
                                <?php  echo  "<a href='../process/applyclass.php?sub=".$subjectName[$i]."'>"?><i class="fa fa-book fa-2x" aria-hidden="true"></i></a> 
                                
                            </div>
                             <?php
                                echo "</div>";
                            }                                                
                   ?>
                                

                        </div>

                    </div>

                </section>

                <section>

                    <div class="l-contactus-section l-section">

                 

                    <div class="l-copyright text-center">
                        
                        <div class="container">
                                <div class="m-social-icons">            
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-github"></i></a>
                                </div>
                                               
                            <p class="pull-right"><big>SKYER REGULATOR</big></p>
                        </div>
                                
                    </div>

                    </div>
                    
                </section>
            
            </div>
            
        </div>
               
        
        <script src="inc/bootstrap/js/bootstrap.min.js"></script>
        
         <script src="inc/flexslider/jquery.flexslider.js"></script>
                
         <script type="text/javascript" src="inc/skrollr/dist/skrollr.min.js"></script>

        <script src="inc/easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        
        <script src="inc/nice-scroll/jquery.nicescroll.min.js" ></script>
        
        <script src="inc/magnific/dist/jquery.magnific-popup.js"></script> 
       
         <script src="inc/waypoints/waypoints.min.js"></script>
        
        <script src="inc/form-validator/dist/jquery.validate.js"></script>
        
       <script src="inc/js/common.js"></script>        
        
    </body>   
</html>
<?php
}
?>

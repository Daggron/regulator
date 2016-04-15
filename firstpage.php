<?php

session_start();
if(!isset($_SESSION['login'])){
    header("location:index.php");
}
else{
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SKYER | REGULATOR</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/helper-elements.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
   <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    
</head>
<body>
	<!-- Page pre loader -->
    <div id="pre-loader">
        <div class="loader-holder">
            <div class="frame">
                <div class="spinner7">
                    <div class="circ1"></div>
                    <div class="circ2"></div>
                    <div class="circ3"></div>
                    <div class="circ4"></div>
                </div>
            </div>
        </div>
    </div>
	<!-- main container of all the page elements -->
	<div id="wrapper">
		<div class="w1">
			<main id="main" role="main">
				<header class="page-banner">
					<div class="container">
						<div class="row">
							
						</div>
				    </div>
					<div class="stretch">
						<p alt="image description"></p>
					</div>
				</header>
				<section class="contact-block cart container">
					<div class="row shop-calculation checkout">
                        <form id="first_form" action="process/firstSetup.php" class="update-form" method="post">
						<div class=" col-sm-offset-4 col-sm-4 col-xs-12">
							<div class="block">
								<h2>First Time Setup</h2>
								
									<fieldset>
										<select id="noSubjects" name="noSubjects"data-jcf='{"wrapNative": false}' required>
											<option value="">No of Subjects</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
										</select>
										<label class=" text-center color-shark" for="cd">&nbsp;Session Commencement Date</label>
								        <input id="cd" name="cd" class="form-control" type="date" required>
										<input id="gobutton" class="btn btn-slider" type="button" value="Go Ahead">
									</fieldset>
							</div>
						</div>
				        <div class="contentArea">
                          
                         
                            
                            </div>
							
						</form>
					</div>
				</section>
			</main>
			<!-- footer of the page -->
			<footer id="footer">
				<!-- footer top -->
				<div class="footer-top bg-shark">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="holder">
									<div class="logo"><i class="fa fa-power-off fa-4x fa-spin"></i></div>
                                    <div class="holder">
                                        <h1 class="heading text-uppercase color-white"><small class="color-white">Skyer</small> REGULATOR</h1>
                                    </div>
									<!-- foote-social -->
									<ul class="list-inline footer-social">
										<li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
										<li class="behance"><a href="#"><i class="fa fa-behance"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="footer-bottom bg-shark">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="bottom-box2">
									
									<span class="copyright">&copy; &nbsp; <a>Skyer Regulator</a></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.main.js"></script>
	<script type="text/javascript" src="js/plugins.js"></script>
	<script type="text/javascript" src="js/setup.js"></script>
    </body>
</html>
<?php
}
?>
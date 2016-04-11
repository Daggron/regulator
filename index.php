<?php

session_start();
if(isset($_SESSION['login'])){
    header("location:homepage.php");
}
else{
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1 , minimum-scale=1, maximum-scale=1">
         <title>Skyer| Regulator</title>
         <!------Css Goes Here ---->
         <link rel="stylesheet" href="css/bootstrap.css">
         <link rel="stylesheet" href="css/main.css">
         <link rel="stylesheet" href="css/main1530above.css" media="screen and (min-width:1530px)">
         <link rel="stylesheet" href="css/maintill1529.css" media="screen and (min-width:1280px) and (max-width:1529px)">
         <link rel="stylesheet" href="css/maintablet.css" media="screen and (min-width:750px) and (max-width:1280px) and (orientation: landscape)">
         <link rel="stylesheet" href="css/maintabletpotrait.css" media="screen and (min-width:450px) and (max-width:850px) and (orientation : portrait)">
         <link rel="stylesheet" href="css/mainphone.css" media="screen and (max-width:750px) and (orientation: landscape)">
         <link rel="stylesheet" href="css/mainphonepotrait.css" media="screen and (max-width:449px) and (orientation : portrait)">
         <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">

         <!-----Font Goes Here --->
         <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine">
         <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
         <!-------------------------------------------------------------------------------->
    </head>
    <body>
       <section class="content">
                    <div class="basic">

                         <div class="container">
                           <div class="row">
                             <div class="home-jumbotron jumbotron col-lg-10 col-lg-offset-1 col-sm-12">
                                  <i class="middle-circle fa fa-power-off fa-spin"></i>
                               <h2><small>SKYER</small> REGULATOR</h2>
                               <p class="lead">Got something important to say? Then make it stand out by using the jumbo headline option and get your visitor&rsquo;s attention right away.</p>

                              
                             </div>
                           </div>
                         </div>
                        
             </div>

        </section>
           <!--  Modals start -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
                <div class="modal-color-success">
                  <div class="col-xs-12">
                      <h3> Registration Successfull</h3>
                      <h5> Login to Continue</h5>
                  </div>
                  <div class="col-xs-8"></div>
                 <button class="btn outline" data-dismiss="modal"id="modalButton" type="button">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="unsuccessModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
                <div class="modal-color-success">
                  <div class="col-xs-12">
                      <h3> Registration Unsuccessfull</h3>
                      <h5> Try Again</h5>
                  </div>
                  <div class="col-xs-8"></div>
                 <button class="btn outline" data-dismiss="modal"id="modalButton" type="button">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- END Modals -->



       <footer class="footer">
         <button id="login_pop" class="btn outline" type="button">Login/Register</button>
        <button id="cross" class=" btn outline" type="button"><i class="fa fa-chevron-down cross"></i></button>
          <div id="login_box" class="login_box box">

              <form id="login_form" class="inside-box" onsubmit="return email_val_l()" method="post" action="process/login.php">

                <div class="group top">
                  <input name="email_l" id="l_email" autocomplete="off" type="text" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Email</label>
                </div>
                <div class="group">
                  <input name="password" type="password" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Password</label>
                </div>
                 <button id="login_button" class="btn outline right_button pull-right" type="submit"  >Login</button>
                <button id="register_button" class="btn outline left_button" type="button" >Register</button>
                 <p id="invalid_comb" class="btn error"> &nbsp;Invalid Combination</p>
                 <p id="une" class="btn error"> &nbsp;User Does Not Exist</p>
                 <p id="l_email_error" class="btn error"> &nbsp;Invalid Email</p>
                 <button id="facebook_login" class="btn outline" type="button"><i class="fa fa-facebook"></i> &nbsp;Login with Facebook</button>
                <button id="google_login" class="btn outline" type="button"><i class="fa fa-google-plus"></i> &nbsp;Login with Google +</button>
              </form>
          </div>
          <div id="register_box" class="register_box box">

              <form class="inside-box" id="register_form" method="post" action="process/register.php">

                <div class="group">
                  <input name="name" id="name" type="text" onchange="return name_char_check()" autocomplete="off" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Name</label>
                </div>

                 <div class="group">
                  <input id="r_email" name="r_email"type="text" onchange="return email_val_r()"  autocomplete="off" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Email</label>
                </div>
                <div class="group">
                  <input type="text" id="mob" name="mob" onchange="mob_val()" autocomplete="off" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Mobile Number</label>
                </div>

                <div class="group">
                  <input id="pass" name="pass" type="password" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Password</label>
                </div>
                <div class="group">
                  <input id="cpass" onchange="return pass_match()" type="password" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label>Confirm Password</label>
                </div>
                 <p id="password_mismatch" class="btn error"> &nbsp;Password Do Not Match</p>
                 <p id="chars_invalid" class="btn error" > &nbsp;Invalid Characters Used</p>
                 <p id="r_email_error" class="btn error" > &nbsp;Invalid Email</p>
                <p id="r_mobile_error" class="btn error" > &nbsp;Invalid Mobile Nummber</p>
                <p id="uae" class="btn error" > &nbsp;User Already Exist</p>
                <p id="uae" class="btn error" > &nbsp;Registration Unsuccessful</p>

                <button id="login_button_r" class="btn outline left_button" type="button">Login</button>
                <button id="register_button_r" class="btn outline right_button pull-right">Register</button>
              </form>


          </div>

       </footer>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <?php
                           if(isset($_GET['error']))
                             {
                                 if($_GET['error']=='dnm')
                                    {  ?>
        <script>
                    document.getElementById('invalid_comb').style.display="block";
                            $(".login_box").slideToggle(700);
                            $("#login_pop").fadeToggle(-100);
                            $("#cross").fadeToggle(-10);
          </script>
                        <?php		}
                               else if($_GET['error']=='une'){
                                   ?>
        <script>
                    document.getElementById('une').style.display="block";
                     $(".login_box").slideToggle(700);
                            $("#login_pop").fadeToggle(-100);
                            $("#cross").fadeToggle(-10);

        </script>

                                <?php
                               }
                        else if($_GET['error']=='uae'){
                            ?>
        <script>
                      document.getElementById('uae').style.display="block";
                        $(".register_box").slideToggle(700);
                            $("#login_pop").fadeToggle(-100);
                            $("#cross").fadeToggle(-10);

        </script>
                      <?php
                        }

                              }
                        else if(isset($_GET['msg'])){
                            if($_GET['msg']=='success'){
                                ?>
        <script>
                        $('#successModal').modal('show');
        </script>
                                <?php
                            }
                            else if($_GET['msg']=='unsuccess'){
                                ?>
        <script>
                        $('#unsuccessModal').modal('show');
        </script>
                                <?php
                            }

                        }
        ?>
        </script>
    </body>
</html>
<?php
}
?>

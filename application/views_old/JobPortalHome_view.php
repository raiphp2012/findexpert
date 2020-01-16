<?php
/*
 * author Visheshagya
 */
include('analytics/googleAnalytics.php');
?>
<!DOCTYPE HTML>
<html>
    <head>
<link type="text/css" href="/cometchat/cometchatcss.php" rel="stylesheet" charset="utf-8">
<script type="text/javascript" src="/cometchat/cometchatjs.php" charset="utf-8"></script>
        <title>Home :: Visheshagya</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="author" content="Visheshagya" />
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=Lato:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/css3-mediaqueries.js"></script>
        <style type="text/css">
            .col_1_of_3 {
                display: block;
                float: left;
                margin: 0% 0 0% 3.6%;
            </style>
        </head>
        <body>
            <nav class="navbar navbar-default navbar-fixed-top" style="background: whitesmoke">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>                    </div>
                        <div id="navbar" class="navbar-collapse collapse">
    <!--                        <a class="logo" href="#"> <img style="width:25%;" src="images/logo.png" title="visheshagya" /></a>-->
                            <div class="navbar-query"  style="color: black">
                                <a class="logo" href="Expert">
                                    <img style=" width: 21%;margin-top: 1%;height: 14%;" class="img-responsive" src="images/logo.png" title="visheshagya" />
                                </a>
                               <div style="font-size:23px; margin-left: 31%; margin-top: -4%;">Have a Query? | Call <span style="color:#E31E24;">7862800600</span></div>

                            <ul class="nav navbar-nav navbar-right" style="margin-top:-2%">
                                <?php if (NULL === $this->session->userdata('emailId')) { ?>
                                <li><a style="cursor: pointer" id="login"><h1 style="font-size:18px; color: black;">Employee Login</h1></a></li>
                                        <li><a  href="JobPortal/EmploypeeSignup" id="login" ><h1 style="font-size:18px;color: #E95358;">Employee Sign-up</h1></a></li>
                                    <?php } ?>
                                    <li><a href="Welcome"><h1 style="font-size:18px; color: black;">Client</h1></a></li>
                                </ul>
                            </div>
                        </div><!--/.nav-collapse -->
                    </div>
                </nav>
                <div class="header" id="download" style="height:380px">
                    <div class="wrap">
                        <div class="header-left" style="display:none">
                            <a class="logo" href="#"> <img style="width:75%;margin-top:19%" src="images/logo.png" title="visheshagya" /></a>
                        </div>
                        <div class="header-right">
                            <span  onclick="location.href = 'index.html';"> </span>
                            <a href="clientHome" style="float: right;padding-left: 10%;"><h1 style="display:block">Client</h1></a>
                            <a id="login" style="float: right;padding-left: 10%;cursor: pointer"><h1 style="display:block">Login</h1></a>
                            <a href="ExpertSignup" id="login" style="float: right"><h1 style="display:block">Signup</h1></a>
                        </div>
                        <div class="clear"> </div>
                    </div>
                </div>
                <div class="content-top" id="support" style="padding: 0%">
                    <div class="wrap">
                        <?php
                        if (NULL !== $this->session->userdata('expertSignUpSuccess')) {
                            include('popUp/SignupSuccessMessage_view.php');
                            ?>
                            <script>
                                $("#signupSuccessMessage").modal('show');
                            </script>
                            <?php
                        }
                        if (NULL !== $this->session->flashdata('expertLoginError')) {
                            include('popUp/LoginError_view.php');
                            ?>
                            <script>
                                $("#LoginError").modal('show');
                            </script>
                            <?php
                        }
                        if (NULL !== $this->session->userdata('expertResetPasswordSuccess')) {
                            include('popUp/expertResetSuccessMessage_view.php');
                            ?>
                            <script>
                                $("#resetSuccessMessage").modal('show');
                            </script>
                            <?php
                        }
                        if (NULL !== $this->session->userdata('expertResetPasswordError')) {
                            include('popUp/expertResetPasswordError_view.php');
                            ?>
                            <script>
                                $("#expertResetPasswordError").modal('show');
                            </script>
                            <?php
                        }
                        ?> 
                    </div>
                </div>
                <div class="middle-bottom" style="padding: 0px">
                    <div class="wrap">
                        <div class="box3">
                            <div class="col_1_of_3 span_1_of_3">
                                <ul class="list1">
                                    <li><img src="images/speech1.png" alt=""/>
                                        <div class="desc"><h4>Global Reach</h4><p> Enhance your visibility  to Acquire  new clients  from  across  the globe.
</p></div>
                                        <div class="clear"> </div>
                                    </li>
                                </ul>
                                <ul class="list1">
                                    <li><img src="images/graph.png" alt=""/>
                                        <div class="desc"><h4>Audio Consultation</h4><p>Client and an expert communcating through audio calling.</p></div>
                                        <div class="clear"> </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col_1_of_3 span_1_of_3">
                                <ul class="list1">
                                    <li><img src="images/time1.png" alt=""/>
                                        <div class="desc"><h4>Time Management</h4><p> Real time calendar  for easy access for client interaction.</p></div>
                                        <div class="clear"> </div>
                                    </li>
                                </ul>
                                <ul class="list1">
                                    <li><img src="images/payment.png" alt=""/>
                                        <div class="desc"><h4>Payment Assurance</h4><p>There  is guarantee of recieving the money  safely.</p></div>
                                        <div class="clear"> </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col_1_of_3 span_1_of_3">
                                <ul class="list1">
                                    <li><img src="images/user.png" alt=""/>
                                        <div class="desc"><h4>Video Consultation</h4><p>Client and an expert communcating through video calling.</p></div>
                                        <div class="clear"> </div>
                                    </li>
                                </ul>
                                <ul class="list1">
                                    <li><img src="images/notepad.png" alt=""/>
                                        <div class="desc"><h4>E-Lockers</h4><p>Facility to share and store document through the internet.</p></div>
                                        <div class="clear"> </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="clear"> </div>
                        </div>
                    </div>
                </div>        
                <div class="footer">
                    <div class="footer-bottom">
                        <div class="wrap">
                            <div class="box4">
                                <div class="col_1_of_footer-bottom span_1_of_footer-bottom">
                                    <!--<a href="index.html"><img src="images/f-logo.png" alt=""/></a>-->
                                </div>
                                <div class="col_1_of_middle-bottom span_1_of_middle-bottom">
                                    <div class="cssmenu">
                                        <ul>
                                            <li><a href="#support" class="scroll">Support</a></li>
                                            <li><a href="#privacy" class="scroll">Privacy</a></li> 
                                            <li>© 2016 </li>
                                            <li>
                                                <div class="copy">
                                                    <a href="http://visheshagya.in" target="_blank">Visheshagya</a>
                                                </div></li> 
                                        </ul>
                                    </div>
                                </div>
                                <div class="col_1_of_footer-bottom span_1_of_footer-bottom">
                                    <div class="social-icons">
                                        <ul>
                                            <li class="tw1"><a href="https://twitter.com/Visheshagya_IN"><span> </span></a></li>
                                            <li class="fb1"><a href="https://facebook.com/visheshagya.in"><span> </span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#login").click(function () {
                                $("#myModal").modal('show');
                            });
                            
                        });
                    </script>
                    <?php include('EmployeeLoginPopUp_view.php'); ?>
                </div>
    <div class="modal fade" id="checkEmployee" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">User Type </h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
     <label class="radio-inline btn btn-info">
        <input type="radio" name="usertype" class="btn btn-info" id="usertype" value="Employer"> 
            Employer 
        </label>
        <label  class="radio-inline btn btn-info">
          <input type="radio" name="inlineRadioOptions"   id="usertype" value="Employee">  Employee 
        </label>
        </div>
      </div>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
            </body>
        </html>


        <div class="modal fade" id="checkEmployee" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    Find experienced, verified and reliable candidates for your organization. Job portal to hire CA/CS/CMA.

    
    </div>
  </div>
</div>


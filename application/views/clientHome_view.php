<?php
/*
 * author Visheshagya Team
 */

?>
<!DOCTYPE HTML  PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
    <head>
<link type="text/css" href="/cometchat/cometchatcss.php" rel="stylesheet" charset="utf-8">
<script type="text/javascript" src="/cometchat/cometchatjs.php" charset="utf-8"></script>
        <title>Client Home :: Visheshagya</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="author" content="Visheshagya Team" />
        <meta name="description" content="Visheshagya is an ecommerce portal for search and video/audio appointment with various experts like CA,CS,CMA,Lawyers etc.">
        <meta name="keywords" content="CA,CS,CMA,Lawyers,CA in India,CS in India,CMA  in India,Lawyer in India">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/font-awesome.min.css" type="text/css">
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
            <div class="header" id="download">
                <div class="wrap">
                    <div class="header-left">
                        <!--<p> GUIDE BE RIDICULOUS CIRCULATE 87 EXPERT </p>-->
                        <a class="logo" href="#"> <img style="width:75%" src="images/logo.png" title="visheshagya" /></a>
                            <h1 style="color: white;font-size: 25px">Services Redefined.<br></h1> 
                        </div>
                        <div class="header-right">
                            <span  onclick="location.href = 'index.html';"> </span>
                            <a id="login" style="float: right;padding-left: 10%;cursor: pointer"><h1 style="display:block">Login</h1></a>
                            <a id="register" style="float: right;padding-left: 10%;cursor: pointer"><h1 style="display:block">Signup</h1></a>
                            <!-- <a href="ExpertSignup" id="login" style="float: right"><h1 style="display:block">Signup</h1></a> -->
                        </div>
                        <div class="clear"> </div>
                    </div>
                </div>
                <div class="content-top" id="support" style="padding: 0%">
                    <div class="wrap">
                        <h2 class="m_1">A platform for "<b>CA - CS - CMA - Lawyers</b>" to<br/><span style="font-size: 1.25em; font-weight:bold">CONNECT, ACQUIRE, GROW</span> <br/>new clients</h2>
                        <?php
                        if (NULL !== $this->session->userdata('clientSignUpSuccess')) {
                            include('popUp/SignupSuccessMessage_view.php');
                            ?>
                            <script>
                                $("#signupSuccessMessage").modal('show');
                            </script>
                            <?php
                        }


                        if (NULL !== $this->session->userdata('clientLoginError')) {
                            include('popUp/SignupErrorMessage_view.php')
                            ?> 
                            <script>
                                $("#signupErrorMessage").modal('show');
                            </script>
                            <?php
                        }
                        if (NULL !== $this->session->userdata('clientResetPasswordSuccess')) {
                            include('popUp/clientResetSuccessMessage_view.php');
                            ?>
                            <script>
                                $("#resetSuccessMessage").modal('show');
                            </script>
                            <?php
                        }
                        if (NULL !== $this->session->userdata('clientResetPasswordError')) {
                            // echo $this->session->flashdata('expertLoginError');
                            include('popUp/clientResetPasswordError_view.php');
                            ?>
                            <script>
                                $("#clientResetPasswordError").modal('show');
                            </script>
                            <?php
                        }
                        ?>
                        <div class="box1" style="margin-top:0px">                           
                            <div class="col_1_of_3 span_1_of_3" >
                                <img src="images/users.jpg" alt=""/> 
                                <h2 class="m_1">COLLABORATE</h2>
                            </div>
                            <div class="col_1_of_3 span_1_of_3">
                                <img src="images/success1.jpg" alt=""/> 
                                <h2 class="m_1">GROW</h2>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="middle-bottom" style="padding: 0px">
                    <div class="wrap">
                        <div class="box3">
                            <div class="col_1_of_2 span_1_of_2">
                                <ul class="list1">
                                    <li><img src="images/speech1.png" alt=""/>
                                        <div class="desc"><h4>Global Reach</h4><p></p></div>
                                        <div class="clear"> </div>
                                    </li>
                                </ul>
                                <ul class="list1">
                                    <li><img src="images/graph.png" alt=""/>
                                        <div class="desc"><h4>Audio Consultation</h4><p></p></div>
                                        <div class="clear"> </div>
                                    </li>
                                </ul>
                                <ul class="list1">
                                    <li><img src="images/time1.png" alt=""/>
                                        <div class="desc"><h4>Time Management</h4><p></p></div>
                                        <div class="clear"> </div>
                                    </li>
                                </ul>

                            </div>
                            <div class="col_1_of_2 span_1_of_2">
                                <ul class="list1">
                                    <li><img src="images/payment.png" alt=""/>
                                        <div class="desc"><h4>Payment Assurance</h4><p></p></div>
                                        <div class="clear"> </div>
                                    </li>
                                </ul>
                                <ul class="list1">
                                    <li><img src="images/user.png" alt=""/>
                                        <div class="desc"><h4>Video Consultation</h4><p></p></div>
                                        <div class="clear"> </div>
                                    </li>
                                </ul>
                                <ul class="list1">
                                    <li><img src="images/notepad.png" alt=""/>
                                        <div class="desc"><h4>Document Management</h4><p></p></div>
                                        <div class="clear"> </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="clear"> </div>
                        </div>
                    </div>
                </div>        
               <?php include('loginFooter.php') ?>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#login").click(function () {
                                $("#myModal").modal('show');
                            });
                        });
                    </script>
                    <?php include('ClientLoginPopUp_view.php'); ?>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#register").click(function () {
                                $("#myModalRegister").modal('show');
                            });
                        });
                    </script>
                    <?php include('ClientSignupPopUp_view.php'); ?>
                    <div class="copy">
                        <p>© 2016 <a href="http://visheshagya.in" target="_blank">Visheshagya</a></p>
                    </div>
                </div>
                <?php include('analytics/googleAnalytics.php'); ?>
            </body>
        </html>
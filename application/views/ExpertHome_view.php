<?php
/*
 * author Visheshagya
 */
include('analytics/googleAnalytics.php');
?>
<!DOCTYPE HTML>
<html>
    <head>

        
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
        
        <script src="js/jquery.tabSlideOut.v1.3.js"></script>
                <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/font-awesome.min.css" type="text/css">
         
         <script>
         $(function(){
             $('.slide-out-div').tabSlideOut({
                 tabHandle: '.handle',                              //class of the element that will be your tab
                 pathToTabImage: 'images/contact_tab.gif',          //path to the image for the tab (optionaly can be set using css)
                 imageHeight: '100%',                               //height of tab image
                 imageWidth: '100%',                               //width of tab image    
                 tabLocation: 'right',                               //side of screen where tab lives, top, right, bottom, or left
                 speed: 300,                                        //speed of animation
                 action: 'click',                                   //options: 'click' or 'hover', action to trigger animation
                 topPos: '200px',                                   //position from the top
                 fixedPosition: false                               //options: true makes it stick(fixed position) on scroll
             });
         });

         </script>
        <style type="text/css">
            .col_1_of_3 {
                display: block;
                float: left;
                margin: 0% 0 0% 3.6%;
            }

            @media (min-width: 768px) {  
                .headerClient{
                    margin-top:85px;
                }
            }
            @media (min-width: 992px) {
                .headerClient{
                    margin-top:65px;
                }
            }
            @media (min-width: 1200px) { 
                .headerClient{
                    margin-top:65px;
                }
            }
            @media screen and (max-width: 767px) {
                .headerClient{
                    margin-top:65px;
                }
            }
            @media screen and (max-width: 400px) {
                .headerClient{
                    margin-top:147px;
                }
            }
        </style>
    </head>
    <body style="overflow-x:hidden;">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background: whitesmoke;padding:0.5% 0%;border-color: white">
            <div class="navbar-inner">
                <div class="container">
                    <div class="navbar-header pull-left">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="#" class="img-responsive pull-left">
                            <img style="max-width:60%" src="images/logo.png" alt="" class="img-responsive">
                        </a>
                    </div>
                   
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a style="cursor: pointer" id="login"><h1 style="font-size:18px; color: black;">Login</h1></a></li>
                            <li><a  href="ExpertSignup" id="login" ><h1 style="font-size:18px;color: #E95358;">Signup</h1></a></li>
                            <li><a href="<?php echo  base_url();?>"><h1 style="font-size:18px; color: black;">Client</h1></a></li>
                        </ul>
                    </div>					
                </div>
            </div>
        </nav>            
        <div class="row" >
            <div class="container-fluid headerClient">
                <img src="images/header_bg.jpg" alt="" class="img-responsive">
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
                    <div class="col_1_of_3 span_1_of_3 text-left">
                        <ul class="list1">
                            <li><img src="images/speech1.png" alt=""/>
                                <div class="desc"><h4>Global Reach</h4>
                                <p style="text-align: left;" >Network without borders Create your global identity
                                Connect & Collaborate with clients globally</p></div>
                                <div class="clear"> </div>
                            </li>
                        </ul>
                        <ul class="list1">
                            <li><img src="images/graph.png" alt=""/>
                                <div class="desc"><h4>Audio Consultation</h4>
                                <p style="text-align: left;">
                                Out of office does not mean Out of action
				Manage your tasks & appointments on the go</p></div>
                                <div class="clear"> </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col_1_of_3 span_1_of_3">
                        <ul class="list1">
                            <li><img src="images/time1.png" alt=""/>
                                <div class="desc"><h4>Time Management</h4><p style="text-align: left;">
                                Work smarter, Achieve more 
				Manage your time effectively & efficiently</p></div>
                                <div class="clear"> </div>
                            </li>
                        </ul>
                        <ul class="list1">
                            <li><img src="images/payment.png" alt=""/>
                                <div class="desc"><h4>Payment Assurance</h4>
                                <p style="text-align: left;">Accelerate payments processing  
				Secure, Simple and Speedy payment gateway to get your business running</p></div>
                                <div class="clear"> </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col_1_of_3 span_1_of_3">
                        <ul class="list1">
                            <li><img src="images/user.png" alt=""/>
                                <div class="desc"><h4>Video Consultation</h4>
                                <p style="text-align: left;">Out of office does not mean Out of action
				Manage your tasks & appointments on the go</p></div>
                                <div class="clear"> </div>
                            </li>
                        </ul>
                        <ul class="list1">
                            <li><img src="images/notepad.png" alt=""/>
                                <div class="desc"><h4>E-Locker</h4>
                                <p style="text-align:left;">Safe, Secure, Simple and Smarter storage facility for documents
View, Organise, Access and Share information anytime, anywhere</p></div>
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
            <?php include('ExpertLoginPopUp_view.php'); ?>
        </div>
        
        <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5785c7a1c287f8ca2cbd0e66/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
        
    </body>
</html>
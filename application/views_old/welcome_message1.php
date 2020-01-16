<?php
/*
 * author Visheshagya
 */
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
    <head>

        <title>Client Home :: Visheshagya</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="Visheshagya, Services Redefined, is an online e-Commerce portal which acts as an aggregator to connect experts like CA, CS, CMA, Lawyers etc with potential customers.The beauty of the portal is that it not only allows you to search an expert but also allows you to book a real 
time appointment with that expert and do video and audio consultancy with that expert.Free E - Locker and E - diary facility is available to all.">
        <meta name="keywords" content="CA,CS,CMA,Lawyers,CA in India,CS in India,CMA  in India,Lawyer in India">
        <meta name="author" content="Visheshagya" />
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=Lato:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/css3-mediaqueries.js"></script>
        
                 
        <style>
        
        
        
        
       


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
            .col_1_of_3 {
                display: block;
                float: left;
                margin: 0% 0 0% 3.6%;

                .span_1_of_3 {
                    width: 22%;
                }
                .col_1_of_3 {
                    display: block;
                    float: left;
                    margin: 0% 0 0% 4%;
                }
                .box3 {
                    padding: 0% 0 0 0;
                } 
                input[type="text"],textarea[type="text"]:-moz-placeholder {
                    color:#f51;
                }  
            </style>
            <script>
                $(function () {
                    var input = $('#search'); // input text field
                    var default_value = input.val();
                    input.focus(function () {
                        if ($.trim($(input).val()) == default_value)
                            input.val('');
                    });
                    input.blur(function () {
                        if ($.trim($(input).val()) == '')
                            input.val(default_value);
                    });
                });
            </script>
        </head>
        <body>
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background:whitesmoke;padding:0.5% 0%">
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
                            <div style="font-size:23px;">Helpline :   <span style="color:#E31E24;">786-2800-600</span><span style="margin-left:3%">"Free</span><span style="margin-left:1%">Trial"</span></div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a  style="cursor: pointer" id="login"><h1 style="font-size:18px; color: black;">Login</h1></a></li>
                                   
                                <li><a  href="Expert"><h1 style="font-size:18px;    color: black;">For Expert</h1></a></li>
                                <li><a href="JobPortal"><h1 style="font-size:18px;    color: black;">JobPortal</h1></a></li>
                            </ul>
                        </div>
                </div>
                </div>
            </nav>
            <div class="headerClient" id="download" style="max-height:419px;" >
                    <div class="wrap">
                        <div class="clear"> </div>
                    </div>
                    <div class="b_searchboxForm" role="search" data-bm="2" style='padding-top: 25%;padding-left: 18%; padding-bottom: 5%;'>
                    <input class="searchbox" id="search" style='width: 54%; height: 9%;border: 6px solid rgb(227, 31, 37);    background: transparent;
                           color: white;
                           font-size: 31px;
                           text-align: center; border-radius: 21px;'  type="text"  value="What are you looking for?" >
                   
                </div>
            </div>
            <div class="content-top" id="support" style="padding: 0%">
                    <div class="wrap">
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
                            include('popUp/clientResetPasswordError_view.php');
                            ?>
                            <script>
                                $("#clientResetPasswordError").modal('show');
                            </script>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-3 col-sm-3 col-xs-6" style="padding:1% 5% 0.25%">
                            <a href="ExpertdetailsTmp/search/1">
                                            <img src="img/CA-Logo.jpg" alt=""/>
                                    </a>
                        </div>
                    <div class="col-md-3 col-sm-3 col-xs-6" style="padding:1% 5% 0.25%">
                                    <a href="ExpertdetailsTmp/search/2">
                                            <img src="img/CS-Logo.jpg">
                                    </a>
                        </div>
                    <div class="col-md-3 col-sm-3 col-xs-6" style="padding:1% 5% 0.25%">
                                    <a href="ExpertdetailsTmp/search/4">
                                            <img src="img/CMA-Logo.jpg">
                                    </a>
                        </div>
                    <div class="col-md-3 col-sm-3 col-xs-6" style="padding:1% 5% 0.25%">
                                    <a href="ExpertdetailsTmp/search/3">
                                            <img src="img/Law-logo.jpg">
                                    </a>
                        </div>
                    </div>
                </div>
            </div>        
            <div class="footer">
                <div class="footer-bottom">
                    <div class="wrap">
                        <div class="box4" style="padding-top:0%">
                            <div class="col_1_of_footer-bottom span_1_of_footer-bottom">
                                <a style="visibility:hidden"href="index.html"><img style="visibility:hidden"src="images/f-logo.png" alt=""/></a>
                                </div>
                                <div class="col_1_of_middle-bottom span_1_of_middle-bottom">
                                    <div class="cssmenu">
                                        <ul>
                                            <li><a href="#support" class="scroll">Support</a></li>
                                            <li><a href="#privacy" class="scroll">Privacy</a></li> 
                                    <li>&copy 2016 </li>
                                            <li>
                                                <div class="copy">
                                                    <a href="http://visheshagya.in" target="_blank">Visheshagya</a>
                                                </div>
                                            </li> 
                                        </ul>
                                    </div>
                                </div>
                                <div class="col_1_of_footer-bottom span_1_of_footer-bottom">
                                    <div class="social-icons">
                                        <ul>
                                            <li ><a href="https://in.linkedin.com/in/visheshagya-india-a35780117"><img src="../images/linkedin.png"></a></li>
                                            <li class="tw1"><a href="https://twitter.com/Visheshagya_IN"><span> </span></a></li>
                                            <li class="fb1"><a href="https://www.facebook.com/visheshagya/"><span> </span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    
                  
                    <?php include('ClientLoginPopUp_view.php'); ?>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#login").click(function () {
                                $("#myModal").modal('show');
                            });
                        });

                        $(document).ready(function () {
                            $("#register").click(function () {
                                $("#myModalregister").modal('show');
                            });
                        });
                        $('#search').keydown(function(e) {
    			if (e.keyCode == 13) {
    			searchExpert();

      
    }
});
                        function searchExpert()
                        {
                            var search = $("#search").val();
                            $.ajax({
                                url: 'Ajaxcalls/searchExpertCategory',
                                type: 'POST',
                                data: {'search': search},
                                async: false,
                                success: function (response) {
                                    window.location = "ExpertdetailsTmp/search/" + response.categoryId;
                                   // alert(response.categoryId);
                                }
                                ,
                                error: function(XMLHttpRequest, textStatus, errorThrown) { 
                   // alert("Status: " + textStatus); alert("Error: " + errorThrown); 
                }
                            });
                        }
                    </script>
                </div>
            <?php
            include('ClientForgotPassword_view.php');
            include('ClientSignupPopUp_view.php');
            include('analytics/googleAnalytics.php');
            ?>
           
            </body>
        </html>
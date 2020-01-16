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
            <style type="text/css">
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
        </head>
        <body>
             <nav class="navbar navbar-default navbar-fixed-top">
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
                            <a class="logo" href="#"> 
                                <img style=" width: 21%;margin-top: 1%;height: 14%;" class="img-responsive" src="images/logo.png" title="visheshagya" /></a>
                            <div style="font-size:23px;     margin-left: 31%;
    margin-top: -4%;">Have a Query? | Call <span style="color:#E31E24;">7862800600</span></div>
                        <ul class="nav navbar-nav navbar-right" style="margin-top: -2%;">
                            <?php if (NULL === $this->session->userdata('emailId')) { ?>
                            <li><a style="cursor: pointer" id="login"><h1 style="font-size:18px; color: black;">Login</h1></a></li>
                            <li><a style="cursor: pointer" id="register"><h1 style="font-size:18px;color: #E95358;">Signup</h1></a></li>
                            <?php } ?>
                            <li><a href="Expert"><h1 style="font-size:18px;    color: black;">  Expert</h1></a></li>
                        </ul>
                        </div>
                    </div><!--/.nav-collapse -->
                </div>
            </nav>            <div class="headerClient" id="download" style="height:380px;margin-top:50px" >
                    <div class="wrap">
<!--                        <div class="header-left">
                            <a class="logo" href="#"> <img style="width:75%;margin-top:19%" src="images/logo.png" title="visheshagya" /></a>
                        </div>-->
<!--                        <div class="header-right">
                            <span  onclick="location.href = 'index.html';"> </span>
                            <a href="Expert" style="float: right;padding-left: 10%;"><h1 style="display:block">Expert</h1></a>
                            <a id="login" style="float: right;padding-left: 10%;cursor: pointer"><h1 style="display:block">Login</h1></a>
                            <a href="ExpertSignup" id="login" style="float: right"><h1 style="display:block">Signup</h1></a>
                        </div>-->
                        <div class="clear"> </div>
                    </div>
                      <div class="b_searchboxForm" role="search" data-bm="2" style='padding-top: 16%;padding-left: 20%;'>
                    
                    <input class="searchbox" id="search" style='width: 72%; height: 12%;border: 6px solid rgb(227, 31, 37);    background: transparent;
    color: white;
    font-size: 31px;
    text-align: center; border-radius: 21px;'  title="Enter your search term" type="text"  placeholder="What your are  looking for?" >
                    <input type="button"   title="Search"  style='height: 11%;border: 6px solid rgb(227, 30, 36);border-radius: 21px;' value='Search' onclick="searchExpert();">
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
                <div class="middle-bottom" style="padding: 0px">
                    <div class="wrap">
                        <div class="box3">
                            <div class="col_1_of_3 span_1_of_3">
                                <ul class="list1">
                                    <li style="padding: 20%;"><a href="ExpertdetailsTmp/search/1">
                                        <div class="d-image">
                                            <img src="img/CA-Logo.jpg" alt=""/>
                                        </div>
                                    </a>
                                    <div class="clear"> </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col_1_of_3 span_1_of_3">
                            <ul class="list1">
                                <li style="padding: 20%;">
                                    <a href="ExpertdetailsTmp/search/2">
                                        <div class="d-image">
                                            <img src="img/CS-Logo.jpg">
                                        </div>
                                    </a>
                                    <div class="clear"> </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col_1_of_3 span_1_of_3">
                            <ul class="list1">
                                <li style="padding: 20%;">
                                    <a href="ExpertdetailsTmp/search/4">
                                        <div class="d-image">
                                            <img src="img/CMA-Logo.jpg">
                                        </div>
                                    </a>
                                    <div class="clear"> </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col_1_of_3 span_1_of_3">                            
                            <ul class="list1">
                                <li style="padding: 20%;">
                                    <a href="ExpertdetailsTmp/search/3">

                                        <div class="d-image">
                                            <img src="img/Law-logo.jpg">
                                        </div>
                                    </a>
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
                     function searchExpert()
                    {
                       var search=$("#search").val();
                        $.ajax({
                            url: 'Ajaxcalls/searchExpertCategory',
                            type: 'POST',
                            data: {'search': search},
                            async: false,
                            success: function (response) {
                                //console.log(response.categoryId);
                                window.location="ExpertdetailsTmp/search/"+response.categoryId;
                            }
                        });
                    }
                </script>

                <?php include('ClientSignupPopUp_view.php'); ?>
            </div>
        </body>
    </html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="description" content="Visheshagya, Services Redefined, is an online e-Commerce portal which acts as an aggregator to connect experts like CA, CS, CMA, Lawyers etc with potential customers.The beauty of the portal is that it not only allows you to search an expert but also allows you to book a real time appointment with that expert and do video and audio consultancy with that expert.Free E - Locker and E - diary facility is available to all.">
        <meta name="keywords" content="CA,CS,CMA,Lawyers,CA in India,CS in India,CMA  in India,Lawyer in India">
        <meta name="author" content="Visheshagya">
        <title>Visheshagya</title> 
        <!-- favicon -->
        <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/gif">
        <!-- font stylesheet -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo:400,700|Oswald:400,700" type="text/css" media="all">
        <link href="<?php echo base_url(); ?>assets/css/font.css" rel="stylesheet">
        <!-- fontawesome stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/font-awesome.min.css" type="text/css">
        <!-- bootstrap stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/bootstrap.min.css" type="text/css">
        <!-- custom stylesheet -->
        <link href="<?php echo base_url(); ?>css/style1.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets1/css/styles.css" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/front.css" rel="stylesheet">
        <!--[if lt IE 9]>
                <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <style>
           .panel {
                width:20%;
                float:right;
                height:360px;
                background:#d9dada;
                position:fixed;
                right:0%;
                padding-left: 1%;
                z-index: 9999;
            }

            .slider-arrow {
                padding:5px;
                width:10px;
                color:#000;
                text-decoration:none;
                cursor: pointer;
                height: 40px;
            }
        </style>
    </head>

    <body class="index-page">
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1317069248320057";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <!-- navigation bar -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><div class="logo"></div></a>
                </div><!--navbar-header end-->
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="launch-modal" href="#" data-modal-id="modal-login"  data-modal-value="normal">Login</a></li>
                        <li><a href="<?php echo base_url(); ?>Expert">For Experts</a></li>
                        <!--<li><a href="http://www.vjobs.in">Job Portal</a></li>-->
                        <li><a href="<?php echo base_url(); ?>Contact">Contact</a></li>
                        <li><a href="#" class="btn btn-primary navbar-btn active navBarBtnContact">1800-120-4741<i class="fa fa-phone" aria-hidden="true"></i></a></li>
                    </ul>
                </div><!--nav-collapse end-->
            </div><!--container end-->
        </nav><!--navbar end-->

        <!-- Banner START -->
        
            
            
            <section class="padding40" style="background-color: #fff;">
                <div class="container">
                   <h3>404 <br/>Page not found</h3>
                </div>
            </section><!-- Know more block end-->

            <!-- About Us block-->

            
            
            <!-- Featured Block-->
            
            

            <!-- footer -->

            <?php include('footer.php') ?>


            <!-- Login Modal -->
            <div class="modal fade modal-login" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" data-role="none">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4><span class="glyphicon glyphicon-lock"></span> <span id="frmLoginTitle">Login</span></h4>
                        </div>
                        <div class="modal-body">
                            <div id="frmLogin">
                                <form role="form" action="<?php echo base_url(); ?>clientHome/clientLogin" method="post">
                                    <input type="hidden" name="frmLoginOfferType" id="frmLoginOfferType">

                                    <div class="form-group">
                                        <!-- <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label> -->
                                        <input type="text" class="form-control" id="usrname" name="clientEmailId" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <!-- <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label> -->
                                        <input type="password" class="form-control" id="psw" name="clientPassword" placeholder="Enter password">
                                    </div>
                                    <div class="loginFormPopup checkbox">
                                        <label>
                                            <input type="checkbox" value="">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            Remember me
                                        </label>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                                </form>
                            </div>
                            <!--forgot -->

                            <div id="frmForgot" style="display:none;">
                                <form role="form" action="<?php echo base_url() . 'ClientForgotPass/clientPasswordRecover'; ?>" method="post">

                                    <div class="form-group">
                                        <!-- <label for="usrname"><span class="glyphicon glyphicon-user"></span> Email</label> -->
                                        <input type="email" class="form-control" id="usrname" name="clientEmailId" placeholder="Enter email" required>
                                    </div>
                                    <div class="form-group">
                                        <!-- <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Mobile</label> -->
                                        <input type="text" class="form-control" name="clientMobileNumber" id="psw" placeholder="Enter Mobile Number" pattern="[1-9]{1}[0-9]{9}" oninvalid="setCustomValidity('Mobile Number with 6-9 and remaing 9 digit with 0-9')" >
                                    </div>

                                    <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Reset Password</button>
                                </form>
                            </div>


                            <!--forgot end -->
                            <div id="frmRegister">
                                <?php echo form_open(base_url() . 'clientHome/addClient', ['class' => 'form-horizontal']) ?>
                                    <div class="form-group">
                                        <?php echo form_input(['name' => 'clientName', 'type' => 'name', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Enter Your name']); ?>
                                    </div>
                                    <div class="form-group">
                                        <?php echo form_input(['name' => 'clientEmailId', 'id' => 'clientEmailId', 'type' => 'email', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'abc@xyz.com','onchange' => 'checkClientEmailId(this.value)']); ?>
                                    </div>
                                    <div class="form-group">
                                        <?php echo form_input(['name' => 'clientMobileNumber', 'type' => 'text', 'required' => 'true', 'class' => 'form-control', 'placeholder' => 'Mobile Number']); ?>
                                    </div>
                                    <div class="loginFormPopup checkbox">
                                        <label>
                                            <input type="checkbox" value="">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            I agree with the <a href="<?= base_url(); ?>ExpertTermsAndCondition" title="Click here to read Terms and Conditions">terms and conditions</a> for Registration.
                                        </label>
                                    </div>
                                    <?php echo form_submit(['name' => 'submit', 'value' => 'Sign-Up', 'class' => 'btn btn-success btn-block']) ?>
                                </form>
                            </div><!-- forgot end -->
                        </div>

                        <!-- modal footer -->
                        <div class="modal-footer">
                            <input type="hidden" name="frmLoginOfferType2" id="frmLoginOfferType2">
                            <?php
                                //$response= base_url()."Expertdetails";
                                //$this->session->set_userdata('response',$response);
                                // echo '<a href="'.$authUrl.'" id="btnFBlogin" class="btn facebook-btn pull-left"><i class="fa fa-facebook-official" aria-hidden="true"></i> Login with Facebook</a>';
                            ?>
                            <div id="frmLoginFooter">
                                <p>New to Visheshagya? <a id="btnShowSignup" href="#">Sign Up</a></p>
                            </div>
                            <div id="frmRegisterFooter">
                                <p>Already a member? <a id="btnShowLogin" href="#">Login</a></p>
                            </div>
                            <div id="frmForgotFooter">
                                <p>Forgot <a id="btnShowForgot" href="#">Password?</a></p>
                            </div>
                        </div><!-- modal footer end -->
                    </div><!-- modal content end -->

                </div>
            </div>

            <!-- script references -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="<?php echo base_url(); ?>assets1/js/bootstrap.min.js"></script>  
            <script src="<?php echo base_url(); ?>assets1/js/matchheight.js"></script>
            <script src="<?php echo base_url(); ?>assets1/js/typeit.min.js"></script>
            <script src="<?php echo base_url(); ?>assets1/js/bootstrap-slider.js"></script>
            <script src="<?php echo base_url(); ?>assets1/js/readmore.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/js/site.js"></script>
           <script type="text/javascript">
                $('#search').keydown(function (e) {
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
                            //console.log(response.categoryId);
                            window.location = "ExpertdetailsTmp/search/" + response.categoryId;
                        }
                    });
                }
            </script>

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

    </body>
</html>